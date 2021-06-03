@extends('layouts.app')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">My orders</div>
            </div>
            <div class="content-head__search-block">
                <div class="search-container">
                    <form class="search-container__form">
                        <input type="text" class="search-container__form__input">
                        <button class="search-container__form__btn">search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="cart-product-list">
            @forelse($goods as $good)
                <div class="cart-product-list__item">
                    <div class="cart-product__item__product-photo"><img src="/img/cover/game-{{ $good->getImageId() }}.jpg" class="cart-product__item__product-photo__image"></div>
                    <div class="cart-product__item__product-name">
                        <div class="cart-product__item__product-name__content"><a href="#">{{ $good->title }}</a></div>
                    </div>
                    <div class="cart-product__item__cart-date">
                        <div class="cart-product__item__cart-date__content">{{ $good->created_at->format('m.d.Y') }}</div>
                    </div>
                    <div class="cart-product__item__product-price"><span class="product-price__value">{{ $good->price }} rubles</span></div>
                </div>
            @empty
                <div class="sidebar-category__item__link">
                    No orders in your basket
                </div>
            @endforelse
            <div class="cart-product-list__result-item">
                <div class="cart-product-list__result-item__text">Total</div>
                <div class="cart-product-list__result-item__value">{{ $sum }} rubles</div>
            </div>
        </div>
        <div class="content-footer__container">
            @if($goods)
                <div class="btn-buy-wrap"><a href="{{ route('order.process') }}" class="btn-buy-wrap__btn-link">Proceed to checkout</a></div>
            @endif
        </div>
    </div>
@endsection
