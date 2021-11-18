<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $data = Products::orderBy('created_at', 'DESC')->paginate(8);
        return view('client.home', ['data' => $data]);
    }

    // Sản phẩm phổ biến -> Top sản phẩm được mua nhiều nhất

    public function popular()
    {
        $data = DB::query('select product_id, count(product_id)from orderdetails
group by product_id order by count(product_id) DESC limit 4');

        $product_popular = array();

        foreach ($data as $id) {
            $product = DB::query('select * from products where id = ' . $id);
            array_push($product_popular, $product);
        }

        return view('client.home', ['product_popular' => $product_popular]);

    }

    // search
    public function search(Request $request)
    {
        $products = DB::table('products')
            ->where('name', 'like', $request->input('value') . '%')->get();

        return view('client.product.resultsearch', ['products' => $products]);
    }
}
