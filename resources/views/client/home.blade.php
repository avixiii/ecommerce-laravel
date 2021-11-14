@extends('client.base')
@section('content')
    @include('client.slider')
    <section class="new-arrival">
        <div class="content">
            <h2 class="title">HÀNG MỚI VỀ</h2>
            <br/>
            <p class="desc mt-8">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui
                repudiandae ea aliquam rem, aliquid, libero tempore tempora eaque
                deserunt animi temporibus!
            </p>
        </div>

        <div class="new-arrival__list">
            @foreach($data as $item)
            <div class="new-arrival__item">
                <div class="front">
                    <img
                        src="{{ $item->image_list }}"
                        alt="{{ $item->name }}"
                        class="new-arrival__item-image"
                    />
                    <div class="new-arrival__item-info">
                        <h3 class="name">{{ $item->name }}</h3>
                        <p class="desc mt-5">{{ \Illuminate\Support\Str::limit($item->description, 20, '...') }}</p>
                    </div>
                </div>
                <div class="back">
                    <div class="new-arrival__item-price">{{ $item->price_sale ? number_format($item->price_sale, 0, '.', '.') :  number_format($item->price, 0, '.', '.')}} VNĐ</div>
                    <a class="new-arrival__item-search" href="/products/{{$item->slug}}"
                    >
                        <ion-icon class="icon" name="search-outline"></ion-icon
                        >
                    </a>
                    <div class="new-arrival__item-info">
                        <h3 class="name">{{ $item->name }}</h3>
                        <p class="desc mt-5">{{ \Illuminate\Support\Str::limit($item->description, 20, '...') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </section>
    <section class="popular container">
        <div class="content">
            <h2 class="title">SẢN PHẨM PHỔ BIẾN</h2>
            <br/>
            <p class="desc mt-8">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui
                repudiandae ea aliquam rem, aliquid, libero tempore tempora eaque
                deserunt animi temporibus!
            </p>
        </div>
        <div class="popular__list">
            <div class="popular__item">
                <img
                    src="https://fakeimg.pl/270x380/"
                    alt=""
                    class="popular__item-image"
                />
                <div class="popular__item-info">
                    <h3 class="name">WOODEN CHAIR</h3>
                    <p class="desc mt-5">Lorem ipsum dolor sit amet</p>
                    <p class="price mt-8">100.000 VNĐ</p>
                </div>
            </div>
            <div class="popular__item">
                <img
                    src="https://fakeimg.pl/270x380/"
                    alt=""
                    class="popular__item-image"
                />
                <div class="popular__item-info">
                    <h3 class="name">WOODEN CHAIR</h3>
                    <p class="desc mt-5">Lorem ipsum dolor sit amet</p>
                    <p class="price mt-8">100.000 VNĐ</p>
                </div>
            </div>
            <div class="popular__item">
                <img
                    src="https://fakeimg.pl/270x380/"
                    alt=""
                    class="popular__item-image"
                />
                <div class="popular__item-info">
                    <h3 class="name">WOODEN CHAIR</h3>
                    <p class="desc mt-5">Lorem ipsum dolor sit amet</p>
                    <p class="price mt-8">100.000 VNĐ</p>
                </div>
            </div>
            <div class="popular__item">
                <img
                    src="https://fakeimg.pl/270x380/"
                    alt=""
                    class="popular__item-image"
                />
                <div class="popular__item-info">
                    <h3 class="name">WOODEN CHAIR</h3>
                    <p class="desc mt-5">Lorem ipsum dolor sit amet</p>
                    <p class="price mt-8">100.000 VNĐ</p>
                </div>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="container">
            <div class="content">
                <h2 class="title">BÀI VIẾT MỚI NHẤT</h2>
                <br/>
                <p class="desc mt-8">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui
                    repudiandae ea aliquam rem, aliquid, libero tempore tempora eaque
                    deserunt animi temporibus!
                </p>
            </div>
            <div class="news__list">
                <div class="news__item">
                    <div class="news__item-date">
                        December
                        <span class="day"> 27 </span>
                    </div>
                    <div class="news__item-title">DONECT COMMO</div>
                    <div class="news__item-desc">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="news__item-auth">by <span>admin</span></div>
                </div>
                <div class="news__item">
                    <div class="news__item-date">
                        December
                        <span class="day"> 27 </span>
                    </div>
                    <div class="news__item-title">DONECT COMMO</div>
                    <div class="news__item-desc">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="news__item-auth">by <span>admin</span></div>
                </div>
            </div>
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
            <a href="https://github.com/tuanpham5024" class="social-link">
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
    <section class="newsletter">
        <div class="content container">
            <h2 class="title">NHẬN BÀI VIẾT MỚI NHẤT</h2>
            <p class="desc mt-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui
                repudiandae ea aliquam rem, aliquid, libero tempore tempora eaque
                deserunt animi temporibus!
            </p>
        </div>
        <div class="block">
            <form action="post" class="newsletter__form container">
                <input
                    type="email"
                    class="newsletter__form-input"
                    placeholder="Vui lòng nhập địa chỉ email của bạn"
                />
                <a href="#" class="newsletter__form-btn">SEND ME</a>
            </form>
        </div>
    </section>
@endsection
