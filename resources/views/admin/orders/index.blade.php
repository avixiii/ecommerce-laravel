@extends('admin.main')
@section('content')
    <div class="body table-responsive">
        <table class="table m-b-0 table-category">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Payment</th>
                <th>Trạng thái</th>
                <th>DELETE</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr  height="20px" style="cursor: pointer;">
                    <th onClick="location.href='/dashboard/orders/edit/{{ $order->id }}'" scope="row">{{$order->id}}</th>
                    <td onClick="location.href='/dashboard/orders/edit/{{ $order->id }}'">{{ $order->name }}</td>
                    <td onClick="location.href='/dashboard/orders/edit/{{ $order->id }}'">{{$order->phone}}</td>
                    <td onClick="location.href='/dashboard/orders/edit/{{ $order->id }}'">{{number_format($order->total_price, 0, '.', '.')}} VNĐ</td>
                    <th onClick="location.href='/dashboard/orders/edit/{{ $order->id }}'">{{$order->payment->name }}</th>
                    <th onClick="location.href='/dashboard/orders/edit/{{ $order->id }}'">{{$order->status->name }}</th>
                    <td onClick="location.href='/dashboard/orders/edit/{{ $order->id }}'">
                        <a onclick="removeRow('{{$order->id, }}', '/dashboard/orders/destroy')"
                           style="cursor: pointer; color: darkred" class="button button-small ml-2"
                           title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
