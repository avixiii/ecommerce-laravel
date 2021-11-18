@extends('client.base')
@section('header__bottom')
    @include('client.alert')
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
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="profile container"  style="margin-bottom: 50px">
        <h1 class="title">
            Trang cá nhân
        </h1>
        <form method="post" class="from-group" action="{{ route('profile.update') }}">
            <div class="form-control">
                <label class="label" for="">Họ và Tên</label>
                <input name="full_name" value="{{ Auth::guard('customer')->user()->full_name }}" placeholder="Họ Và Tên" class="input input-rectangle">
            </div>
            <div class="form-control">
                <label class="label" for="">Email</label>
                <input name="email" value="{{ Auth::guard('customer')->user()->email }}" placeholder="Email" class="input input-rectangle">
            </div>
            <div class="form-control">
                <label class="label" for="">Số điện thoại</label>
                <input name="phone" value="{{ Auth::guard('customer')->user()->phone }}" placeholder="Số điện thoại" class="input input-rectangle">
            </div>
            <div class="form-control">
                <label class="label" for="">Địa chỉ</label>
                <input name="address" value="{{ Auth::guard('customer')->user()->address }}" placeholder="Địa chỉ" class="input input-rectangle">
            </div>

            <a style="margin-left: 105px; cursor: pointer" onclick="this.parentNode.submit(); return false;" class="btn btn--rectangle">LƯU LẠI</a>
            @csrf
        </form>
    </section>
@endsection
