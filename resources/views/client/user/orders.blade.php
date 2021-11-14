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
    <section class="profile container">
        <h1 class="title"></h1>
        <h2></h2>
    </section>
@endsection
