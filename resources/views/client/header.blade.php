<header class="header wrapper">
    <div class="container header__container">
        <a href="{{ route('home') }}" class="header__logo">
            <img srcset="/client/images/logo@2x.png 2x" alt="">
        </a>
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products') }}">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
                <li class="nav-feat">
                    <div class="user">
                        <ion-icon name="person-circle-outline" role="img" class="md hydrated" aria-label="person circle outline"></ion-icon>
                    </div>

{{--                    login--}}
                    <form class="form-user form-login" method="POST">

                        <div class="group-input">
                            <input class="input-rectangle" name="username" placeholder="USERNAME" type="text">
                            <input class="input-rectangle" name="password" placeholder="PASSWORD" type="password">
                            <span class="forget-password">Quên mật khẩu</span>
                        </div>

                        <div class="group-button">
                            <a href="" class="btn btn--rectangle">ĐĂNG NHẬP</a>
                            <a href="" class="btn btn--rectangle red switch-register">ĐĂNG KÝ</a>
                        </div>
                    </form>
{{--                    register--}}
                    <form class="form-user form-register" method="POST">
                        <div class="group-input">
                            <input class="input-rectangle" name="username" placeholder="USERNAME" type="text">
                            <input class="input-rectangle" name="full_name" placeholder="PASSWORD" type="text">
                            <input class="input-rectangle" name="email" placeholder="PASSWORD" type="email">
                            <input class="input-rectangle" name="phone" placeholder="PASSWORD" type="number">
                            <input class="input-rectangle" name="address" placeholder="PASSWORD" type="text">
                            <input class="input-rectangle" name="password" placeholder="PASSWORD" type="password">
                            <input class="input-rectangle" name="password" placeholder="PASSWORD" type="password">
                        </div>
                        <div class="group-button">
                            <a href="" class="btn btn--rectangle red register">ĐĂNG KÝ</a>
                            <a href="" class="btn btn--rectangle login switch-login">ĐĂNG NHẬP</a>
                        </div>
                    </form>
                    <div onclick="location.href='{{ route('cart') }}'" class="cart">
                        <ion-icon name="cart-outline" role="img" class="md hydrated" aria-label="cart outline"></ion-icon>
                        <div class="quantity">5</div>
                    </div>
                    <div class="search">
                        <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    @yield('header__bottom')
</header>
