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
                <th class="cart__list-title">GIÁ</th>
                <th class="cart__list-title">SỐ LƯỢNG</th>
                <th class="cart__list-title">TỔNG TIỀN</th>
                <th class="cart__list-title"></th>
            </tr>

            </thead>
            <tbody>
                <tr class="cart__item">
                    <th class="cart__item-image">
                        <img src="https://fakeimg.pl/170x170/">
                    </th>
                    <th class="cart__item-title">
                        Giày Nike AF1
                    </th>
                    <th class="cart__item-quantity">
                        <span class="remove"><ion-icon name="remove-circle-outline"></ion-icon></span>
                        <input disabled value="1" class="select-quantity quantity" type="number">
                        <span class="add"><ion-icon name="add-circle-outline"></ion-icon></span>
                    </th>
                    <th class="cart__item-price">
                        100.000 VNĐ
                    </th>
                    <th>
                        <a class="cart__item-delete delete_item" href="">
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </a>
                    </th>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
