<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = DB::table('comments')
            ->join('customers', 'comments.customer_id', '=', 'customers.id')
            ->join('products', 'products.id', '=', 'comments.product_id')
            ->get(['comments.id as comment_id','username', 'products.name AS product_name', 'comments.content as comment_content', 'comments.status AS comment_status']);
        return view('admin.comments.index', ['comments' => $comments]);
    }


    public function status(Request $request)
    {
        $id = $request->input('id');
        try {
            $comment = Comments::find($id);
            if ($comment->status) {
                $comment->update([
                    'status' => false
                ]);
            } else {
                $comment->update([
                    'status' => true
                ]);
            }
            session()->flash('success', 'Update thành công');
        } catch (\Exception $err) {
            session()->flash('error', 'Update lỗi');
        }
        return back();
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        try {
            $comment = Comments::find($id);
            $comment->delete();
            session()->flash('success', 'xoá thành công');
        } catch (\Exception $err) {
            session()->flash('error', 'xoá lỗi');
        }
        return back();
    }
}
