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
                        <div class="quantity">4</div>
                    </div>
                    <div class="search">
                        <div class="search">
                            <ion-icon name="search-outline" role="img" class="md hydrated"
                                      aria-label="search outline"></ion-icon>
                        </div>
                        <form  class="form-search" action="{{ route('search') }}" method="post">
                            <div style="display: flex" class="from-group">
                                <input name="value" type="text" class="input-rectangle" placeholder="Nhập vào sản phẩm">
                                <a onclick='this.parentNode.parentNode.submit(); return false;' style="width: 100px; font-size: 1.2rem" href="" class="btn btn--rectangle">TÌM KIẾM</a>
                            </div>
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    @include('client.alert')
    @yield('header__bottom')
</header>
