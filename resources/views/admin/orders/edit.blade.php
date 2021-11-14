@extends('admin.main')
@section('content')
    @include('admin.alert')
    <div class="row clearfix">
        <h3 class="title">Chi tiết đơn hàng</h3>
        <table class="table m-b-0">
            <thead>
            <tr>
                <th>#</th>
                <th>ẢNH SẢN PHẨM</th>
                <th>TÊN SẢN PHẨM</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr style="cursor: pointer;">
                    <th scope="row">{{ $item->code }}</th>
                    <td>
                        <div class="media-object"><img alt="{{ $item->product_name }}" height="60px" src="{{$item->image_list}}">
                        </div>
                    </td>
                    <td>
                        {{ $item->product_name }}
                    </td>
                    <td style="display: flex; gap: 0 10px">
                        <form method="post" action="{{route('dashboard.orders.remove')}}" id="form-remove">
                            <input name="orderdetails_id" value="{{ $item->orderdetails_id }}" type="text" hidden>
                            <a href="" onclick="$('#form-remove').submit()" class="remove-item">
                                <i class="zmdi zmdi-minus-circle-outline"></i>
                            </a>
                            @csrf
                        </form>
                        {{ $item->quantity }}
                        <form method="post" action="{{ route('dashboard.orders.add') }}" id="form-add">
                            <input name="orderdetails_id" value="{{ $item->orderdetails_id }}" type="text" hidden>
                            <a value="{{ $item->orderdetails_id }}" href="" onclick="$('#form-add').submit()" class="add-item">
                                <i class="zmdi zmdi-plus-circle-o"></i>
                            </a>
                            @csrf
                        </form>
                    </td>
                    <td>
                        @if($item->orderdetails_price_sale)
                            {{ number_format($item->orderdetails_price_sale, 0, '.', '.') }} VNĐ
                        @else
                            {{ number_format($item->orderdetails_price, 0, '.', '.') }} VNĐ
                        @endif
                    </td>
                    <td>
                        {{ number_format($item->orderdetails_total_price,0, '.', '.' )}} VNĐ
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <form action="" method="POST">

        </form>
    </div>
    <div class="row clearfix" style="margin-top: 20px">
        <form class="ml-4 mt-12" style="width: 100%" method="post" action="{{ route('dashboard.orders.inforuser') }}">
            <h5 class="title">Thông tin thanh toán</h5>
            <input hidden name="id" value="{{ $data[0]->code }}">
            <div class="form-group">
                <input value="{{ $data[0]->orders_name }}" type="text" name="name" class="form-control" placeholder="Họ Và Tên">
            </div>
            <div class="form-group mt-4">
                <input value="{{ $data[0]->orders_address }}" type="text" name="address" class="form-control" placeholder="Địa chỉ">
            </div>
            <div class="form-group mt-4">
                <input value="{{ $data[0]->orders_phone }}" type="number" name="phone" class="form-control" placeholder="Số điện thoại">
            </div>
            <div class="form-group mt-4">
                <input value="{{ $data[0]->orders_email }}" type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <button class="btn btn-raised btn-primary btn-round waves-effect float-right" type="submit">Thay đổi thông tin địa chỉ thanh toán</button>
            @csrf
        </form>
    </div>

    <div class="row clearfix mt-5">
        <h6>Phương thức thanh toán: <span style="color: #0f9d58">{{ $data[0]->payment_id }}</span></h6>
    </div>
    <div class="row clearfix" style="margin-top: 40px;">
        <h6>Trạng thái đơn hàng</h6>
        <label>

        </label>
    </div>

        @foreach($status as $item)
            @if($item->id == $data[0]->orders_status_id)
                <div class="form-check">
                    <input data-url="{{ route('dashboard.orders.status') }}" checked value="{{ $item->id }}" class="form-check-input" type="radio" name="order_status">
                    <label class="form-check-label" for="flexRadioDefault1">
                        {{ $item->name }}
                    </label>
                </div>
            @else
                <div class="form-check">
                    <input data-url="{{ route('dashboard.orders.status') }}" value="{{ $item->id }}" class="form-check-input" type="radio" name="order_status">
                    <label class="form-check-label" for="flexRadioDefault1">
                        {{ $item->name }}
                    </label>
                </div>
            @endif
        @endforeach

@endsection
