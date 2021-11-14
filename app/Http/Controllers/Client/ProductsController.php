<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $data = Products::orderBy('created_at', 'DESC')->paginate(12);
        $title = 'Danh sách sản phẩm';

        if ($request->input('sort_by') == 'tang_dan') {
            $data = Products::orderBy('price', 'ASC')->paginate(12);
        }

        if ($request->input('sort_by') == 'giam_dan') {
            $data = Products::orderBy('price', 'DESC')->paginate(12);
        }

        if ($request->input('sort_by') == 'name') {
            $data = Products::orderBy('name', 'DESC')->paginate(12);
        }

        return view('client.product.index', ['title' => $title, 'products' => $data]);
    }

    public function show($slug = '')
    {
        $product = Products::where('slug', $slug)->where('status', 1)->first();
        return view('client.product.details', ['product' => $product, 'comments' => $product->comments]);
    }
}
