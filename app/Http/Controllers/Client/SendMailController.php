<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\EmailList;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendMailController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter'
        ]);
        try {
            EmailList::create([
                'email' => $request->input('email')
            ]);
            session()->flash('success', 'Chúng tôi sẽ gửi cho bạn bản tin và khuyến mại khi chúng tôi có');
        } catch (\Exception $err) {
            session()->flash('error', 'Sảy ra lỗi'. $err);
        }

        return back();
    }
}
