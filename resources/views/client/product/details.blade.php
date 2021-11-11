@extends('client.base')
@section('header__bottom')
    <div class="header__bottom">
        <div class="header__content">
            <h1 class="title-page">{{ \Illuminate\Support\Str::limit($product->name, 20, '...') }}</h1>
            <p class="desc-page">
                {{ $product->description }}
            </p>
            <div class="breadcrumbs">
                <a class="breadcrumbs__link" href="">Trang chủ</a>
                <span class="breadcrumbs__next">
              <ion-icon name="arrow-forward-circle-outline" role="img" class="md hydrated"
                        aria-label="arrow forward circle outline"></ion-icon>
            </span>
                <a href="#" class="breadcrumbs__link">{{ $product->category->name }}</a>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <section class="product-details container">
        <div class="product-details__top">
            <div class="product-details__image">
                <img src="{{ $product->image_list }}" alt="" class="img-fluid"/>
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img
                            src="https://fakeimg.pl/170x170"
                            alt=""
                            class="small-img"
                        />
                    </div>
                    <div class="small-img-col">
                        <img
                            src="https://fakeimg.pl/170x170"
                            alt=""
                            class="small-img"
                        />
                    </div>
                    <div class="small-img-col">
                        <img
                            src="https://fakeimg.pl/170x170"
                            alt=""
                            class="small-img"
                        />
                    </div>
                </div>
            </div>
            <div class="product-details__info">
                <div class="top">
                    <div class="left">
                        <h3 class="product-details__info-title">{{ $product->name }}</h3>
                        <p class="product-details__info-price">{{number_format($product->price_sale, 0, '.', '.')}}
                            VNĐ</p>
                        <br/>
                        <hr/>
                        <p class="product-details__info-category">
                            Category: <span> {{ $product->category->name }}</span>
                        </p>
                        <hr/>
                    </div>
                    <div class="right">
                        <div class="sale">{{ (($product->price - $product->price_sale) / ($product->price)) * 100 }}
                            <sup>%</sup></div>
                    </div>
                </div>
                <div class="bottom">
                    <p class="product-details__info-description">
                        {{ $product->description }}
                    </p>
                    <br/>
                    <form action="">
                        <input
                            min="1"
                            value="1"
                            name="quantity"
                            type="number"
                            class="select-quantity mb-5"
                            id="quantity"
                        />

                        <a data-url="{{ route('addToCart', ['id' => $product->id, 'quantity' => ""]) }}"
                           href=""  class="btn btn--rectangle mt-8 add_to_cart">THÊM VÀO GIỎ HÀNG</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="product-details__bottom">
            <h5 class="title">Nội dung</h5>
            <div class="product-details__bottom-content">
                {!! $product->content !!}
            </div>
        </div>
        <div class="product-details__feedback">
            <h3 class="title">FEEDBACK</h3>
            <div class="feedback">
                <div class="feedback-item">
                    <div class="feedback__author">
                        Lâm Anh <span class="date">11/8/2021</span>
                    </div>
                    <div class="feedback__content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                        ipsum blanditiis inventore corrupti praesentium aspernatur
                        voluptas qui debitis sint ipsam, sed sit dolore quisquam maiores
                        aliquid! Dolorem distinctio architecto sint.
                    </div>
                </div>
                <hr style="margin-bottom: 4rem"/>
                <div class="feedback-item">
                    <div class="feedback__author">
                        Lâm Anh <span class="date">11/8/2021</span>
                    </div>

                    <div class="feedback__content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod
                        ipsum blanditiis inventore corrupti praesentium aspernatur
                        voluptas qui debitis sint ipsam, sed sit dolore quisquam maiores
                        aliquid! Dolorem distinctio architecto sint.
                    </div>
                </div>
            </div>
            <form class="form-horizontal" action="">
                <!-- Cho người dùng không đăng nhập -->
                <input
                    class="input-rectangle"
                    placeholder="Nhập tên của bạn"
                    type="text"
                />
                <input
                    class="input-rectangle"
                    type="email"
                    placeholder="Nhập địa chỉ email của bạn"
                />
                <textarea
                    class="textarea-rectangle"
                    placeholder="Nhập nội dung"
                    name=""
                    id=""
                    cols="30"
                    rows="10"
                ></textarea>
                <a href="#" class="btn btn--rectangle">GỬI PHẢN HỒI</a>
            </form>
        </div>
    </section>

    <section class="popular container">
        <h2 class="title">CÓ THỂ BẠN CŨNG THÍCH</h2>
        <div class="product__list">
            <div class="product__item">
                <div class="product__item-top product__front">
                    <img
                        src="https://fakeimg.pl/270x500"
                        alt=""
                        class="product__item-image"
                    />
                    <div class="sale">10<sup>%</sup></div>
                </div>
                <div class="product__item-info product__back">
                    <div class="product__item-feat">
                        <a href="#">
                            <ion-icon name="heart-outline"></ion-icon>
                        </a>
                        <a href="" class="">
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="product__item-bottom">
                    <div class="name mt-8">STONE CUP</div>
                    <div class="desc mt-8">lorem ipsum dolor sit</div>
                    <div class="price mt-8">100.000 VNĐ</div>
                </div>
            </div>
            <div class="product__item">
                <div class="product__item-top product__front">
                    <img
                        src="https://fakeimg.pl/270x500"
                        alt=""
                        class="product__item-image"
                    />
                </div>
                <div class="product__item-info product__back">
                    <div class="product__item-feat">
                        <a href="#">
                            <ion-icon name="heart-outline"></ion-icon>
                        </a>
                        <a href="" class="">
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="product__item-bottom">
                    <div class="name mt-8">STONE CUP</div>
                    <div class="desc mt-8">lorem ipsum dolor sit</div>
                    <div class="price mt-8">100.000 VNĐ</div>
                </div>
            </div>
            <div class="product__item">
                <div class="product__item-top product__front">
                    <img
                        src="https://fakeimg.pl/270x500"
                        alt=""
                        class="product__item-image"
                    />
                </div>
                <div class="product__item-info product__back">
                    <div class="product__item-feat">
                        <a href="#">
                            <ion-icon name="heart-outline"></ion-icon>
                        </a>
                        <a href="" class="">
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="product__item-bottom">
                    <div class="name mt-8">STONE CUP</div>
                    <div class="desc mt-8">lorem ipsum dolor sit</div>
                    <div class="price mt-8">100.000 VNĐ</div>
                </div>
            </div>
            <div class="product__item">
                <div class="product__item-top product__front">
                    <img
                        src="https://fakeimg.pl/270x500"
                        alt=""
                        class="product__item-image"
                    />
                </div>
                <div class="product__item-info product__back">
                    <div class="product__item-feat">
                        <a href="#">
                            <ion-icon name="heart-outline"></ion-icon>
                        </a>
                        <a href="" class="">
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="product__item-bottom">
                    <div class="name mt-8">STONE CUP</div>
                    <div class="desc mt-8">lorem ipsum dolor sit</div>
                    <div class="price mt-8">100.000 VNĐ</div>
                </div>
            </div>
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
