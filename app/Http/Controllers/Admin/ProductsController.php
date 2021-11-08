<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function index()
    {

        $data = Products::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.products.index', ['title' => 'Danh sách sản phẩm', 'products' => $data]);
    }

    public function create()
    {
        $categories = Categories::all();
        return view('admin.products.add', ['title' => 'Thêm sản phẩm', 'categories' => $categories]);
    }

    public function store(ProductRequest $request)
    {
        try {
            Products::create($request->all() + [
                    'slug' => Str::slug($request->input('name'), '-'),
                    'user_id' => Auth::id(),
                ]);
            session()->flash('success', 'Thêm sản phẩm thành công');
            return redirect()->route('dashboard.products');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return redirect()->back();
        }
    }

    public function show(Products $product)
    {
        $categories = Categories::all();
        return view('admin.products.edit', [
            'title' => 'Chỉnh sửa sản phẩm',
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(ProductRequest $request, Products $product)
    {
        $data =
            $product->update($request->only(
                    'name',
                    'description',
                    'category_id',
                    'image_list',
                    'price',
                    'price_sale',
                    'quantity',
                    'content',
                    'status',
                ) + [
                    'slug' => Str::slug($request->input('name'), '-'),
                    'user_id' => Auth::id(),
                ]);
        session()->flash('success', 'Chỉnh sửa sản phẩm thành công thành công');
        return redirect()->route('dashboard.products');
    }

    public function destroy(Request $request)
    {
        try {
            $id = (int)$request->input('id');
            $products = Products::where('id', $id)->first();

            if ($products) {
                Products::where('id', $id)->delete();
            }
            return response()->json([
                'error' => false,
                'message' => 'Xoá thành công'
            ]);
        } catch (\Exception $err) {
            return response()->json([
                'error' => true
            ]);
        }
    }

}
