<div style="cursor: pointer" class="user-log">
    <ion-icon name="person-circle-outline" role="img" class="md hydrated"
              aria-label="person circle outline"></ion-icon>
</div>
<div class="form-user form-user-log">
    <div class="user-info">
        <img class="user-avatar" src="{{ Auth::guard('customer')->user()->avatar ? Auth::guard('customer')->user()->avatar : 'https://fakeimg.pl/50/'}}">
        <div>
            <p class="user-name">{{ Auth::guard('customer')->user()->full_name }}</p>
            <p class="change-pass">đổi mật khẩu</p>
        </div>
    </div>
    <div class="group-info">

        <ul class="user__list-item">

            <li class="item"><a href="{{ route('profile.orders') }}">Đơn hàng của tôi</a></li>
            <li class="item"><a href="{{ route('profile') }}">Tài khoản của tôi</a></li>
            <li class="item"><a href="">Nhận xét sản phẩm đã mua</a></li>
        </ul>
    </div>
    <div class="group-button">
        <a href="/logout" class="btn btn--rectangle red btn-logout">ĐĂNG XUẤT</a>
    </div>
</div>
