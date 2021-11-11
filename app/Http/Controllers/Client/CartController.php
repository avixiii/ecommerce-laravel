<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::guard('customer')->check()) {
            return view('client.cart.index');
        } else {

        }
    }

    public function add($id)
    {
        $product = Products::find($id);

        if ($product->count() > 0) {
            $quantity = $_GET['quantity'];
            $customer_id = Auth::guard('customer')->id();
            if (Auth::guard('customer')->check()) {
                $cart = Carts::where('product_id', $id)->where('customer_id', Auth::guard('customer')->id());

                if ($cart->count() > 0) {
                    try {
                        $default_quantity = $cart->value('quantity');

                        $cart->update(['quantity' => $default_quantity + $quantity]);

                        return response()->json([
                            'error' => false,
                            'message' => 'Update số lượng thành công'
                        ]);
                    } catch (\Exception $err) {
                        return response()->json([
                            'error' => true,
                            'message' => 'Update số lượng thất bại'
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
                $cart = session()->get('cart');
                if (isset($cart[$id])) {
                    $cart[$id]['quantity'] = $cart[$id]['quantity'] + $quantity;
                } else {
                    $cart[$id] = [
                        'product_id' => $id,
                        'quantity' => $quantity
                    ];
                    return response()->json([
                        'error' => false,
                        'message' => 'Update giỏ hàng thành công'
                    ]);
                }
                session()->put('cart', $cart);
                return response()->json([
                    'error' => false,
                    'message' => 'Thêm vào giỏ hàng thành công'
                ]);
            }
        }

        return response()->json([
            'error' => true,
            'message' => 'Sản phẩm không tồn tại'
        ]);

    }

    public function quantity($id, Request $request)
    {

    }

    public function delete($id)
    {

    }

    public function deleteAll()
    {

    }
}
