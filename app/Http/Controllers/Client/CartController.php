<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Products;
use http\Cookie;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        //$cart = unserialize(Cookie::get('cart'));
    }

    public function add($id)
    {
        $product = Products::find($id);
        $quantity = $_GET['quantity'];
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + $quantity;
        } else {
            $cart[$id] = [
                'product_id' => $id,
                'quantity' => $quantity
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'error' => false,
            'message' => 'Thêm vào giỏ hàng thành công'
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
