<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = Categories::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.categories.index', ['title' => 'Danh sách danh mục', 'categories' => $data]);
    }

    public function show(Categories $category)
    {
        return view('admin.categories.edit', ['title' => 'Chỉnh sửa danh mục', 'category' => $category]);
    }

    public function update(CategoryRequest $request, Categories $category)
    {
        $category->update($request->only('name', 'description', 'status', 'user_id'));
        session()->flash('success', 'Chỉnh sửa danh mục thành công');
        return redirect()->route('dashboard.categories');
    }

    public function create()
    {
        return view('admin.categories.add', ['title' => 'Thêm danh mục mới']);
    }

    public function store(CategoryRequest $request)
    {
        try {
            Categories::create($request->all() + [
                    'slug' => Str::slug($request->input('name'), '-'),
                    'user_id' => Auth::id(),
                ]);
            session()->flash('success', 'Thêm danh mục thành công');
            return redirect()->route('dashboard.categories');
        } catch (\Exception $err) {
            session()->flash('error', $err->getMessage());
            return redirect()->back();
        }

    }

    public function destroy(Request $request)
    {
        try {
            $id = (int)$request->input('id');

            $category = Categories::where('id', $id)->first();

            if ($category) {
                Categories::where('id', $id)->delete();
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
