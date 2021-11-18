<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    public function login(Request $request): JsonResponse
    {

        if (Auth::guard('customer')->attempt(['username' => $request->get('username'), 'password' => $request->get('password')])) {
            return response()->json([
                'error' => false,
                'message' => 'Đăng nhập thành công'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Sai tên tài khoản hoặc mật khẩu'
            ]);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:customers',
            'email' => 'required|unique:customers',
            'password' => 'required|min:8',
            'phone' => '',
            'address' => 'required',
            'full_name' => 'required'
        ]);

        if ($validator->passes()) {
            $customer = Customer::create([
                'full_name' => $request->get('full_name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'username' => $request->get('username'),
                'password' => bcrypt($request->get('password'))
            ]);

            return response()->json([
                'error' => false,
                'message' => 'Tạo tài khoản thành công'
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => $validator->errors()->all()
        ]);


    }

    public function logout(): RedirectResponse
    {
        Auth::guard('customer')->logout();
        return redirect()->route('home');
    }

    public function profile()
    {
        return view('client.user.index');
    }

    public function update(Request $request)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        try {
            $update = DB::query('update customers set full_name = ' . $request->input('full_name' . ', email = ' . $request->input('email') . ', phone = ' . $request->email . ', address = ' . $request->input('address') . 'where id = ' . $customer_id));
            session()->flash('success', 'update thông tin thành công');
        } catch (\Exception $err) {
            session()->flash('error', 'Sảy ra lỗi, không thể update ngay bây giờ');
        }
        return back();
    }
}
