@extends('client.base')
@section('header__bottom')

    <div class="header__bottom">
        <div class="header__content">
            <h1 class="title-page">CHECK OUT</h1>
            <p class="desc-page">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus eligendi esse eum incidunt, ipsa
                magni natus odit quibusdam quis quo quod quos repellendus suscipit!
            </p>
            <div class="breadcrumbs">
                <a class="breadcrumbs__link" href="{{ route('home') }}">Trang chủ</a>
                <span class="breadcrumbs__next">
                  <ion-icon name="arrow-forward-circle-outline" role="img" class="md hydrated"
                            aria-label="arrow forward circle outline"></ion-icon>
                </span>
                <a href="{{ route('products') }}" class="breadcrumbs__link">SHOP</a>
                <span class="breadcrumbs__next">
                  <ion-icon name="arrow-forward-circle-outline" role="img" class="md hydrated"
                            aria-label="arrow forward circle outline"></ion-icon>
                </span>
                <a href="{{ route('cart') }}" class="breadcrumbs__link">CHECKOUT</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form method="post" action="{{ route('payment.store') }}" class="checkout container">
        @csrf
            <div class="checkout__address">
                <h3 class="title mt-8" style="float: left">ĐỊA CHỈ GIAO HÀNG</h3>
                @if(\Illuminate\Support\Facades\Auth::guard('customer')->check())
                    <div style="margin-top: 60px" class="group-input flex-row">

                        <input value="{{ Auth::guard('customer')->user()->full_name }}" name="name" placeholder="HỌ VÀ TÊN" type="text" class="input-rectangle">
                        <input value="{{ Auth::guard('customer')->user()->phone }}" name="phone" placeholder="SỐ ĐIỆN THOẠI" type="number" class="input-rectangle">
                    </div>
                    <div class="group-input flex-row">
                        <input value="{{ Auth::guard('customer')->user()->address }}" name="address" placeholder="ĐỊA CHỈ" type="text" class="input-rectangle">
                        <input value="{{ Auth::guard('customer')->user()->email }}" name="email" placeholder="EMAIL" type="email" class="input-rectangle">
                    </div>
                    <div class="group-input">
                    <textarea name="note" placeholder="GHI CHÚ" type="text"
                              style="width: 96%; padding: 12px; font-size: 1.3rem;"></textarea>
                    </div>
                @else
                    <div style="margin-top: 60px" class="group-input flex-row">

                        <input value="" name="name" placeholder="HỌ VÀ TÊN" type="text" class="input-rectangle">
                        <input value="" name="phone" placeholder="SỐ ĐIỆN THOẠI" type="number" class="input-rectangle">
                    </div>
                    <div class="group-input flex-row">
                        <input value="" name="address" placeholder="ĐỊA CHỈ" type="text" class="input-rectangle">
                        <input value="" name="email" placeholder="EMAIL" type="email" class="input-rectangle">
                    </div>
                    <div class="group-input">
                    <textarea name="note" placeholder="GHI CHÚ" type="text"
                              style="width: 96%; padding: 12px; font-size: 1.3rem;"></textarea>
                    </div>
                @endif

            </div>
            <div class="checkout__info">
                <h3 class="title mt-8">YOUR ORDER</h3>
                @if(\Illuminate\Support\Facades\Auth::guard('customer')->check())
                    <div class="list-order">
                        @foreach($carts as $item)
                            <div class="order-item">
                                <div class="item-name">{{ $item->name }}</div>
                                <div
                                    class="price">{{ $item->price_sale ? number_format( $item->quantity * $item->price_sale , 0, '.', '.') : number_format( $item->quantity * $item->price , 0, '.', '.') }}
                                    VNĐ
                                </div>
                            </div>
                            <hr style="color: #ccc">
                        @endforeach
                        <div class="order-item mt-8">
                            <div class="item-name">TỔNG TIỀN</div>
                            <div class="total-cost">{{ number_format( $total_price , 0, '.', '.') }} VNĐ</div>
                        </div>
                    </div>
                @else
                    <div class="list-order">
                        @foreach($carts as $item)
                            <div class="order-item">
                                <div class="item-name">{{ $item['name'] }}</div>
                                <div class="price">
                                    {{ $item['price_sale'] ? number_format( $item['quantity'] * $item['price_sale'] , 0, '.', '.') : number_format($item['quantity'] * $item['price'] , 0, '.', '.') }}
                                    VNĐ
                                </div>
                            </div>
                            <hr style="color: #ccc">
                        @endforeach
                        <div class="order-item mt-8">
                            <div class="item-name">TỔNG TIỀN</div>
                            <div class="total-cost">{{ number_format( $total_price , 0, '.', '.') }} VNĐ</div>
                        </div>
                    </div>
                @endif
                <div class="payment-method">
                    @foreach($payment_method as $method)
                        <div class="group">
                            <input Checked name="payment-method" type="radio" value="{{ $method->id }}"/>
                            <span>{{ $method->name }}</span>
                        </div>
                    @endforeach
                    <div class="group mt-8">
                        <button style="cursor: pointer; border: none" class="btn btn--rectangle">ĐẶT HÀNG</button>
                    </div>
                </div>
            </div>
    </form>
    <section class="about">
        <div class="content container">
            <h2 class="title">THÔNG TIN CỬA HÀNG</h2>
            <br/>
            <p class="desc mt-8">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui
                repudiandae ea aliquam rem, aliquid, libero tempore tempora eaque
                deserunt animi temporibus!
            </p>
        </div>
        <div class="social container">
            <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a href="#" class="social-link">
                <ion-icon name="logo-github"></ion-icon>
            </a>
            <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
            </a>
            <a href="#" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
        </div>
    </section>
@endsection
