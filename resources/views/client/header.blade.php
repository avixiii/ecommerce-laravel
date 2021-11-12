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
                    @include('client.login')
                    @if(\Illuminate\Support\Facades\Auth::guard('customer')->check() === false)
                        <div class="user">
                            <ion-icon name="person-circle-outline" role="img" class="md hydrated"
                                      aria-label="person circle outline"></ion-icon>
                        </div>
                        {{--    login--}}
                        @include('client.register')
                        {{--    register--}}
                    @else
                        @include('client.userlog')
                    @endif
                    <div onclick="location.href='{{ route('cart') }}'" class="cart">
                        <ion-icon name="cart-outline" role="img" class="md hydrated"
                                  aria-label="cart outline"></ion-icon>
                        <div class="quantity">5</div>
                    </div>
                    <div class="search">
                        <ion-icon name="search-outline" role="img" class="md hydrated"
                                  aria-label="search outline"></ion-icon>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    @yield('header__bottom')
</header>
