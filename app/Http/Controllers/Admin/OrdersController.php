<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function destroy(Request $request)
    {
        try {
            $id = (int)$request->input('id');
            $products = Orders::where('id', $id)->first();

            if ($products) {
                Orders::where('id', $id)->delete();
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

    public function show(Orders $order)
    {
        $status = Status::all();
        $total_price = DB::select('select total_price from orders where id=' . $order->id);


        $data = DB::select('select orders.id as code, orderdetails.id as orderdetails_id ,products.image_list, products.name as product_name, orderdetails.quantity , orderdetails.price as orderdetails_price, orderdetails.price_sale orderdetails_price_sale, orderdetails.total_price as orderdetails_total_price, orders.name as orders_name, orders.address as orders_address, orders.phone as orders_phone, orders.email as orders_email, paymentmethods.name as payment_id, orders.status_id as orders_status_id from paymentmethods ,status as tbstatus, orders join orderdetails on orders.id = orderdetails.order_id join products on orderdetails.product_id = products.id where orders.paymentmethod_id = paymentmethods.id and tbstatus.id = orders.status_id and orders.id=' . $order->id .' order by orderdetails.created_at desc ');


        return view('admin.orders.edit', [
            'title' => 'Chi tiết hoá đơn',
            'data' => $data,
            'status' => $status
        ]);
    }

    public function status(Request $request)
    {
        $id = (int)$request->input('id');
        $id_order = (int)$request->input('idOrder');


        try {
            $order = Orders::find($id_order);
            $order->update([
                'status_id' => $id
            ]);
            return response()->json([
                'error' => false,
                'message' => 'Update thành công'
            ]);
        } catch (\Exception $err) {
            return response()->json([
                'error' => true
            ]);
        }
    }

    public function inforuser(Request $request)
    {
        $order_id = $request->input('id');

        try {
            $order = Orders::find($order_id);

            $order->update([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'email' => $request->input('email')
            ]);
            session()->flash('success', 'Update thành công');
        } catch (\Exception $err) {
            session()->flash('error', 'Sảy ra lỗi không thể update');
        }

        return back();

    }

    public function remove(Request $request)
    {
        try {
            $orderdetail = OrderDetails::find($request->input('orderdetails_id'));
            if ($orderdetail->quantity <= 1) {
                session()->flash('error', 'Không thẻ giảm về 0');
            } else {
                $orderdetail->update([
                    'quantity' => (int)$orderdetail->quantity - 1
                ]);
                session()->flash('success', 'Đã update');
            }
        } catch (\Exception $err) {
            session()->flash('error', 'Lỗi, không thể thay đổi số lượng');
        }
        return back();
    }

    public function add(Request $request)
    {
        try {
            $orderdetail = OrderDetails::find($request->input('orderdetails_id'));

            if ($orderdetail) {
                $orderdetail->update([
                    'quantity' => (int)$orderdetail->quantity + 1
                ]);
                session()->flash('success', 'Đã update');
            }
        } catch (\Exception $err) {
            session()->flash('error', 'Lỗi, không thể thay đổi số lượng');
        }
        return back();
    }
}
