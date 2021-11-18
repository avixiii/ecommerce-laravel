@extends('client.base')
@section('header__bottom')

    <div class="header__bottom">
        <div class="header__content">
            <h1 class="title-page">SẢN PHẨM</h1>
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
    <section class="product container">
        <div class="title">Kết quả tìm kiếm</div>
        <div class="product__list">
            @foreach($products as $product)
                @if($product->status == 1)
                    <div class="product__item">
                        <div class="product__item-top product__front">
                            <img
                                src="{{ $product->image_list }}"
                                alt=""
                                class="product__item-image"
                            />
                            @if($product->price_sale != 0)

                                <div
                                    class="sale">{{ (($product->price - $product->price_sale) / ($product->price)) * 100 }}
                                    <sup>%</sup></div>
                            @endif
                        </div>
                        <div class="product__item-info product__back">
                            <div class="product__item-feat">
                                <a  href="/products/{{ $product->slug }}">
                                    <ion-icon class="icon md hydrated" name="search-outline" role="img"
                                              aria-label="search outline"></ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </a>
                                <input value="1" type="number" hidden id="quantity">
                                <a data-value="1" data-url="{{ route('addToCart', ['id' => $product->id, 'quantity' => '']) }}" class="add_to_cart">
                                    <ion-icon name="cart-outline"></ion-icon>
                                </a>
                            </div>
                        </div>
                        <div class="product__item-bottom">
                            <div onclick="window.location='/products/{{ $product->slug }}';"
                                 class="name mt-8">{{ \Illuminate\Support\Str::limit($product->name , 15, '...') }}</div>
                            <div
                                class="desc mt-8">{{ \Illuminate\Support\Str::limit($product->description, 25, '...') }}</div>
                            @if($product->price_sale != 0)
                                <div
                                    class="price price-sale mt-8">{{number_format($product->price_sale, 0, '.', '.')}}</div>
                                <div style="font-size: 14px; font-weight: 300 " class="price mt-8">
                                    <strike> {{number_format($product->price, 0, '.', '.')}} VNĐ</strike></div>
                            @else
                                <div class="price mt-8">{{number_format($product->price, 0, '.', '.')}} VNĐ</div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <section class="about">
        <hr/>
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
