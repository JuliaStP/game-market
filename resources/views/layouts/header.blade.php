<header class="main-header">
    <div class="logotype-container"><a href="/" class="logotype-link"><img src="/img/logo.png" alt="Логотип"></a></div>
    <nav class="main-navigation">
        <ul class="nav-list">
            <li class="nav-list__item"><a href="{{ route('home') }}" class="nav-list__item__link">Main</a></li>
            <li class="nav-list__item"><a href="{{ route('order.previous') }}" class="nav-list__item__link">Order history</a></li>
            <li class="nav-list__item"><a href="{{ route('news') }}" class="nav-list__item__link">News</a></li>
            <li class="nav-list__item"><a href="{{ route('about') }}" class="nav-list__item__link">About</a></li>
            <li class="nav-list__item"><a href="{{ route('admin.orders') }}" class="nav-list__item__link">Admin</a></li>
        </ul>
    </nav>
    <div class="header-contact">
        <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Phone: 33-333-33</a></div>
    </div>
    <div class="header-container">
        <div class="payment-container">
            <div class="payment-basket__status">
                <div class="payment-basket__status__icon-block"><a href="{{ route('order.current') }}" class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
                <div class="payment-basket__status__basket"><span class="payment-basket__status__basket-value">
                        {{ $basketGoods }}
                    </span><span class="payment-basket__status__basket-value-descr">товаров</span></div>
            </div>
        </div>
        <div class="authorization-block">
            @if(Auth::user())
                Hello, {{ Auth::user()->name }}
                <a href="{{ route('logout') }}"
                   class="authorization-block__link"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <a href="{{ route('register')}}" class="authorization-block__link">Register</a>
                <a href="{{ route('login') }}" class="authorization-block__link">Log in</a>
            @endif
        </div>
    </div>
</header>
