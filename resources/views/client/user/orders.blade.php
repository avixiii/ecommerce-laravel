@extends('client.base')
@section('header__bottom')

    <div class="header__bottom">
        <div class="header__content">
            <h1 class="title-page">TRANG CÁ NHÂN</h1>
            <p class="desc-page">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus eligendi esse eum incidunt, ipsa
                magni natus odit quibusdam quis quo quod quos repellendus suscipit! Accusamus eos error impedit nostrum
                pariatur!
            </p>
            <div class="breadcrumbs">
                <a class="breadcrumbs__link" href="{{ route('home') }}">Trang chủ</a>
                <span class="breadcrumbs__next">
                  <ion-icon name="arrow-forward-circle-outline" role="img" class="md hydrated"
                            aria-label="arrow forward circle outline"></ion-icon>
                </span>
                <a href="{{ route('products') }}" class="breadcrumbs__link">Sản phẩm</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="profile container" style="margin-bottom: 20rem">
        <h1 class="title">Danh sách đơn hàng</h1>
        <table style="font-size: 1.6rem">
            <thead style="padding-bottom: 5rem">
            <tr>
                <th>ID ĐẶT HÀNG</th>
                <th width="200px">Ngày mua</th>
                <th width="200px">Tổng tiền</th>
                <th width="200px">Trạng thái đơn hàng</th>
                <th>Huỷ đơn hàng</th>
            </tr>
            </thead>
            <tbody style="transform: translateY(18px);">
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_id }}</td>
                    <th>{{ $order->date }}</th>
                    <th>{{ number_format($order->price, 0, '.', '.')  }} <VNĐ></VNĐ></th>
                    <th>{{ $order->status }}</th>
                    <form method="post" id="{{ $order->order_id }}" action="{{ route('order.cancel') }}" hidden>
                        <input name="order_id" hidden value="{{ $order->order_id }}">
                        @csrf
                    </form>
                    <th><a onclick="document.getElementById('{{$order->order_id}}').submit(); return false;"
                           style="font-size: 1.2rem; width: 105px;" href="" class="btn btn--rectangle">HUỶ ĐƠN HÀNG</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </section>
@endsection
