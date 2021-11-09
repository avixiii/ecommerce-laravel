<header class="header wrapper">
    <div class="container header__container">
        <a href="#" class="header__logo">
            <img srcset="/client/images/logo@2x.png 2x" alt="">
        </a>
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Sản phẩm</a>
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
                    <div class="cart">
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
