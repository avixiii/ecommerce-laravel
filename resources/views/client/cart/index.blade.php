@extends('client.base')
@section('header__bottom')

    <div class="header__bottom">
        <div class="header__content">
            <h1 class="title-page">SHOPPING CART</h1>
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
                <a href="{{ route('cart') }}" class="breadcrumbs__link">SHOPPING CART</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="cart__container container">
        <div class="title">
            <h3 class="cart__title title">SHOPPING CART</h3>
        </div>
        <table class="cart__list" id="cart">
            <thead border="1" class="cart__header">
            <tr class="cart__header">
                <th class="cart__list-title">SẢN PHẨM</th>
                <th class="cart__list-title">TÊN SẢN PHẨM</th>
                <th class="cart__list-title">SỐ LƯỢNG</th>
                <th class="cart__list-title">TỔNG TIỀN</th>
                <th class="cart__list-title"></th>
            </tr>

            </thead>
            <tbody>
            @if(Auth::guard('customer')->check() === true)
                @foreach($carts as $item)
                    <tr class="cart__item" id="item-{{$item->id}}" data-item="{{$item->id}}">
                        <th class="cart__item-image">
                            <img src="{{ $item->image_list }}">
                        </th>
                        <th class="cart__item-title">
                            {{ $item->name }}
                        </th>
                        <th class="cart__item-quantity">
                            <span data-url="{{ route('deleteOneItem', ['id' => $item->id, 'quantity' => '']) }}" class="remove"><ion-icon name="remove-circle-outline"></ion-icon></span>
                            <input disabled value="{{ $item->quantity }}" class="select-quantity quantity"
                                   type="number">
                            <span data-url="{{ route('addToCart', ['id' => $item->id, 'quantity' => '']) }}" class="add"><ion-icon name="add-circle-outline"></ion-icon></span>
                        </th>
                        <th class="cart__item-price">
                            {{ $item->price_sale ? number_format($item->price_sale * $item->quantity, 0, '.', '.')  : number_format($item->price * $item->quantity, 0, '.', '.') }}
                            VNĐ
                        </th>
                        <th>
                            <a data-url="{{ route('deleteItemCart', ['id' => $item->id]) }}"
                               href=""
                               class="cart__item-delete delete_item">
                                <ion-icon name="close-circle-outline"></ion-icon>
                            </a>
                        </th>
                    </tr>
                @endforeach
            @else
                @if(isset($carts))
                    @foreach($carts as $item)
                        <tr class="cart__item">
                    <th class="cart__item-image">
                        <img src="{{ $item['thumb'] }}">
                    </th>
                    <th class="cart__item-title">
                        {!! $item['name'] !!}
                    </th>
                    <th class="cart__item-quantity">
                        <span data-url="{{ route('deleteOneItem', ['id' => $item['product_id'], 'quantity' => '']) }}" class="remove"><ion-icon name="remove-circle-outline"></ion-icon></span>
                        <input disabled value="{{ $item['quantity'] }}" class="select-quantity quantity" type="number">
                        <span data-url="{{ route('addToCart', ['id' => $item['product_id'], 'quantity' => '']) }}" class="add"><ion-icon name="add-circle-outline"></ion-icon></span>
                    </th>
                    <th class="cart__item-price">
                        {{ $item['price_sale'] ? number_format((int)$item['price_sale'] * (int)$item['quantity'], 0, '.', '.')  : number_format((int)$item['price'] * (int)$item['quantity'], 0, '.', '.') }} VNĐ
                    </th>
                    <th>
                        <a data-url="{{ route('deleteItemCart', ['id' => $item['product_id']]) }}"
                           class="cart__item-delete delete_item">
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </a>
                    </th>
                </tr>
                    @endforeach
                @endif
            @endif
            </tbody>
        </table>
    </section>
    @if(Auth::guard('customer')->check() === true)
        @if($carts->count() !== 0)
            <section class="checkout container" style="margin-bottom: 20rem">
                <div class="total-cost"></div>
                <a href="{{ route('payment') }}" style="float: right; background-color: #ffe115; color: white; cursor: pointer" class="btn btn--rectangle">CHECK OUT</a>
            </section>
        @endif
    @else
        @if(isset($carts))
        <section class="checkout container" style="margin-bottom: 20rem">
            <div class="total-cost"></div>
            <a href="{{ route('payment') }}" style="float: right; background-color: #ffe115; color: white; cursor: pointer" class="btn btn--rectangle">CHECK OUT</a>
        </section>
        @endif
    @endif
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
