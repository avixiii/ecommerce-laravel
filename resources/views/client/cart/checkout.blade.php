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
    <section class="checkout container">
        <div class="checkout__address">
            <h3 class="title mt-8" style="float: left">ĐỊA CHỈ GIAO HÀNG</h3>
            <div style="margin-top: 60px" class="group-input flex-row">
                <input placeholder="HỌ VÀ TÊN" type="text" class="input-rectangle">
                <input placeholder="SỐ ĐIỆN THOẠI" type="number" class="input-rectangle">
            </div>
            <div class="group-input flex-row">
                <input placeholder="ĐỊA CHỈ" type="text" class="input-rectangle">
                <input placeholder="EMAIL" type="email" class="input-rectangle">
            </div>
        </div>
        <div class="checkout__info">
            <h3 class="title mt-8">YOUR ORDER</h3>
            <div class="list-order">
                <div class="order-item">
                    <div class="item-name">WOOD CHAIR</div>
                    <div class="price">100.000 VNĐ</div>

                </div>
                <hr style="color: #ccc">
                <div class="order-item">
                    <div class="item-name">WOOD CHAIR</div>
                    <div class="price">100.000 VNĐ</div>
                </div>
                <hr>
                <div class="order-item mt-8">
                    <div class="item-name">TỔNG TIỀN</div>
                    <div class="total-cost">200.000 VNĐ</div>
                </div>
            </div>

            <form class="payment-method">
                <div class="group">
                    <input name="payment-method" type="radio" value="paypal" />
                    <span>Paypal</span>
                </div>
                <div class="group">
                    <input name="payment-method" type="radio" value="Thanh toán khi nhận hàng" />
                    <span>Thanh toán khi nhận hàng</span>
                </div>
                <div class="group mt-8">
                    <a href="" class="btn btn--rectangle">ĐẶT HÀNG</a>
                </div>
            </form>
        </div>
    </section>
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
