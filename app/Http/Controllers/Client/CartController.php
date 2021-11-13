<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Carts;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::guard('customer')->check()) {
            // select name, carts.quantity from carts inner join products on carts.product_id = products.id and carts.customer_id = 1
            // Lấy dữ liệu sản phẩm
            $customer_id = Auth::guard('customer')->id();
            $carts = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.customer_id', '=', $customer_id)
                ->select('products.id', 'products.image_list', 'products.name', 'carts.quantity', 'products.price', 'products.price_sale')->get();
            return view('client.cart.index', ['carts' => $carts]);
        } else {
            $cookie_data = stripslashes(Cookie::get('carts'));
            $carts = json_decode($cookie_data, true);
            return view('client.cart.index', ['carts' => $carts]);
        }
        return view('client.cart.index');
    }

    // Thêm 1 sản phẩm vào giỏ hàng
    public function add($id)
    {
        $product = Products::find($id);

        if ($product->count() > 0) {
            $quantity = $_GET['quantity'];
            if (Auth::guard('customer')->check()) {
                $cart = Carts::where('product_id', $id)->where('customer_id', Auth::guard('customer')->id());

                if ($cart->count() > 0) {
                    try {
                        $default_quantity = $cart->value('quantity');

                        $cart->update(['quantity' => $default_quantity + $quantity]);

                        return response()->json([
                            'error' => false,
                            'message' => 'Thêm vào giỏ hàng thành công'
                        ]);
                    } catch (\Exception $err) {
                        return response()->json([
                            'error' => true,
                            'message' => 'Thêm vào giỏ hàng thành công'
                        ]);
                    }
                } else {
                    try {
                        Carts::create([
                            'customer_id' => Auth::guard('customer')->id(),
                            'product_id' => $id,
                            'quantity' => $quantity
                        ]);
                        return response()->json([
                            'error' => false,
                            'message' => 'Thêm vào giỏ hàng thành công'
                        ]);
                    } catch (\Exception $err) {
                        return response()->json([
                            'error' => true,
                            'message' => 'Lỗi không thêm được sản phẩm'
                        ]);
                    }

                }
            } else {
                if (Cookie::get('carts')) {
                    $cookie_data = stripslashes(Cookie::get('carts'));
                    $cart_data = json_decode($cookie_data, true);
                } else {
                    $cart_data = array();
                }

                $item_id_list = array_column($cart_data, 'product_id');

                if (in_array($id, $item_id_list)) {
                    foreach ($cart_data as $keys => $values) {
                        if ($values['product_id']  ===  $id) {
                            $cart_data[$keys]["quantity"] += $quantity;
                            $item_data = json_encode($cart_data);
                            $minutes = 60;
                            Cookie::queue(Cookie::make('carts', $item_data, $minutes));
                            return response()->json([

                            ]);
                        }
                    }
                } else {
                    $thumb = $product->image_list;
                    $name = $product->name;
                    $price = $product->price;
                    $price_sale = $product->price_sale;

                    $item = array(
                        'product_id' => $id,
                        'name' => $name,
                        'thumb' => $thumb,
                        'price' => $price,
                        'price_sale' => $price_sale,
                        'quantity' => $quantity
                    );

                    $cart_data[] = $item;

                    $item_data = json_encode($cart_data);
                    $minutes = 60;

                    Cookie::queue(Cookie::make('carts', $item_data, $minutes));
                }

                // Tính số sản phẩm trong giỏ hàng


                return response()->json([
                    'error' => true,
                    'message' => 'Đã thêm sản phẩm vào giỏ hàng'
                ]);
            }
        }

        return response()->json([
            'error' => true,
            'message' => 'Sản phẩm không tồn tại'
        ]);

    }

    // Giảm xuống một sản phẩm
    public function delete($id)
    {
        $product = Products::find($id);

        if ($product->count() > 0) {
            $quantity = $_GET['quantity'];
            if (Auth::guard('customer')->check()) {
                $cart = Carts::where('product_id', $id)->where('customer_id', Auth::guard('customer')->id());

                if ($cart->count() > 0) {
                    try {
                        $default_quantity = $cart->value('quantity');
                        if ($default_quantity <= 1) {
                            return response()->json([
                                'error' => true,
                                'message' => 'Không thể giảm sản phẩm xuống dưới 1'
                            ]);
                        }
                        $cart->update(['quantity' => $default_quantity - $quantity]);

                        return response()->json([
                            'error' => false,
                            'message' => 'update sản phẩm thành công'
                        ]);
                    } catch (\Exception $err) {
                        return response()->json([
                            'error' => true,
                            'message' => 'update thất bại'
                        ]);
                    }
                } else {
                    try {
                        return response()->json([
                            'error' => false,
                            'message' => 'sản phẩm không tồn tại trong giỏ hàng'
                        ]);

                    } catch (\Exception $err) {
                        return response()->json([
                            'error' => true,
                            'message' => 'error'
                        ]);
                    }

                }
            } else {
                $cookie_data = stripslashes(Cookie::get('carts'));
                $cart_data = json_decode($cookie_data, true);
                $item_id_list = array_column($cart_data, 'product_id');
                if (in_array($id, $item_id_list)) {

                    foreach ($cart_data as $keys => $values) {
                        if ($cart_data[$keys]['product_id'] = $id) {
                            if ($cart_data[$keys]['quantity'] <= 1) {
                                return response()->json([
                                    'error' => true,
                                    'message' => 'Không thể giảm dưới 1'
                                ]);
                            } else {
                                $cart_data[$keys]["quantity"] -= 1;
                                $item_data = json_encode($cart_data);
                                $minutes = 60;
                                Cookie::queue(Cookie::make('carts', $item_data, $minutes));
                                return response()->json([
                                    'error' => false,
                                    'message' => 'Giảm số lượng sản phẩm khỏi cookie'
                                ]);
                            }

                        }
                    }

                }
                return response()->json([
                    'error' => true,
                    'message' => 'Làm gì có đâu mà thêm ?'
                ]);

            }
        }

        return response()->json([
            'error' => true,
            'message' => 'Sản phẩm không tồn tại'
        ]);
    }

    // Xoá 1 item khỏi giỏ hàng
    public function destroy($id)
    {
        if (Auth::guard('customer')->check()) {
            try {
                $customer_id = Auth::guard('customer')->id();
                $carts = Carts::where('carts.customer_id', $customer_id)->where('carts.product_id', $id);
                if ($carts) {
                    $carts->delete();
                    return response()->json([
                        'error' => false,
                        'message' => 'Xoá thành công'
                    ]);
                }
            } catch (\Exception $err) {
                return response()->json([
                    'error' => true,
                    'message' => 'Xoá không thành công'
                ]);
            }
        } else {

            $cookie_data = stripslashes(Cookie::get('carts'));
            $cart_data = json_decode($cookie_data, true);

            foreach ($cart_data as $keys => $values) {
                if ($values['product_id'] === $id){
                    dd($values);
                }
            }
            $cookie_items = array_values($cart_data);
            Cookie::queue(Cookie::make('carts', $cookie_items, 60));
        }

    }
}
