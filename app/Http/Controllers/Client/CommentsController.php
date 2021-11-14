<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {

        if (Auth::guard('customer')->check()) {
            $input = $request->all();
            $input['customer_id'] = Auth::guard('customer')->id();
            $input['status'] = false;
            Comments::create($input);
        }
        session()->flash('error', 'Bạn phải đăng nhập mới có thẻ bình luận');
        return back();
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $comment = Comments::find($id);
        $comment->delete();
        return back();
    }
}
