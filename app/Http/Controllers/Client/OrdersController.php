<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Paymentmethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class OrdersController extends Controller
{
    private static $total_price = 0;

    public function index()
    {
        // GET PAYMENT METHOD
        $payment_method = Paymentmethods::all();

        // GET CART - LOGIN AND NON LOGIN

        if (Auth::guard('customer')->check()) {
            $customer_id = Auth::guard('customer')->id();
            $carts = DB::table('carts')
                ->join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.customer_id', '=', $customer_id)
                ->select('products.id', 'carts.quantity', 'products.name', 'products.price', 'products.price_sale')->get();

            foreach ($carts as $item) {
                if ($item->price_sale) {
                    self::$total_price += ($item->quantity * $item->price_sale);
                } else {
                    self::$total_price += ($item->quantity * $item->price);
                }
            }
        } else {
            $cookie_data = stripslashes(Cookie::get('carts'));
            $carts = json_decode($cookie_data, true);

            foreach ($carts as $item => $values) {
                if ($values['price_sale']) {
                    self::$total_price += ($values['quantity'] * (int)$values['price_sale']);
                } else {
                    self::$total_price += ($values['quantity'] * (int)$values['price']);
                }
            }
        }

        // CALCULATOR TOTAL COST

        return view('client.cart.checkout', ['carts' => $carts, 'payment_method' => $payment_method, 'total_price' => self::$total_price]);

    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $phone = $request->input('address');
        $address = $request->input('address');
        $email = $request->input('email');
        $note = $request->input('note');
        $payment_method = $request->input('payment-method');

        // tinh total price

        if ($payment_method == 2) {
            try {
                $customer_id = Auth::guard('customer')->id();
                if ($customer_id) {
                    $carts = DB::table('carts')
                        ->join('products', 'carts.product_id', '=', 'products.id')
                        ->where('carts.customer_id', '=', $customer_id)
                        ->select('products.id', 'carts.quantity', 'products.name', 'products.price', 'products.price_sale')->get();

                    foreach ($carts as $item) {
                        if ($item->price_sale) {
                            self::$total_price += ($item->quantity * $item->price_sale);
                        } else {
                            self::$total_price += ($item->quantity * $item->price);
                        }
                    }

                } else {
                    $cookie_data = stripslashes(Cookie::get('carts'));
                    $carts = json_decode($cookie_data, true);

                    foreach ($carts as $item => $values) {
                        if ($values['price_sale']) {
                            self::$total_price += ($values['quantity'] * (int)$values['price_sale']);
                        } else {
                            self::$total_price += ($values['quantity'] * (int)$values['price']);
                        }
                    }

                }

                DB::beginTransaction();
                // insert order
                $order = Orders::create([
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email,
                    'note' => $note,
                    'customer_id' => $customer_id,
                    'paymentmethod_id' => $payment_method,
                    'total_price' => self::$total_price,
                    'status_id' => 1
                ]);

                // insert order details
                $carts = DB::table('carts')
                    ->join('products', 'carts.product_id', '=', 'products.id')
                    ->where('carts.customer_id', '=', $customer_id)
                    ->select('products.id', 'carts.quantity', 'products.price', 'products.price_sale')->get();

                foreach ($carts as $item) {
                    if ($item->price_sale) {
                        OrderDetails::create([
                            'product_id' => $item->id,
                            'quantity' => $item->quantity,
                            'price' => $item->price,
                            'price_sale' => $item->price_sale,
                            'total_price' => $item->price_sale * $item->quantity
                        ]);
                    } else {
                        OrderDetails::create([
                            'product_id' => $item->id,
                            'quantity' => $item->quantity,
                            'price' => $item->price,
                            'price_sale' => $item->price_sale,
                            'total_price' => $item->price * $item->quantity
                        ]);
                    }

                }

                // xoá giỏ hàng
                if ($customer_id) {
                    DB::table('carts')->where('customer_id', $customer_id)->delete();
                } else {

                }
                DB::commit();
                Cookie::queue(Cookie::forget('carts'));
                session()->flash('success', 'Đặt hàng thành công!');
                return redirect()->route('home');

            } catch (Exception $err) {
                DB::rollBack();
                session()->flash('error', 'Đặt hàng lỗi, xin vui lòng thử lại sau');
                return redirect()->back();
            }
        }

    }
}
