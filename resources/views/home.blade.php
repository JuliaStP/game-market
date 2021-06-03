@extends('layouts.app')

@section('content')
    <div class="content-middle">
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                @if (isset($currentCategory))
                    <div class="content-head__title-wrap__title bcg-title">Products in Category
                        {{ $currentCategory->title }}
                    </div>
                @else
                    <div class="content-head__title-wrap__title bcg-title">Last Products</div>
                @endif
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
        <div class="content-main__container">
            <div class="products-columns">
                @foreach($goods as $good)
                    <div class="products-columns__item">
                        <div class="products-columns__item__title-product">
                            <a
                                href="{{ route('good', $good->id) }}"
                               class="products-columns__item__title-product__link">
                                {{ $good->title }}
                            </a>
                        </div>
                        <div class="products-columns__item__thumbnail">
                            <a
                                href="{{ route('good', $good->id) }}"
                                class="products-columns__item__thumbnail__link">
                                <img
                                    src="/img/cover/game-{{ $good->getImageId() }}.jpg"
                                    alt="Preview-image" class="products-columns__item__thumbnail__img"></a>
                        </div>
                        <div class="products-columns__item__description">
                            <span class="products-price">
                                {{ $good->price }}
                            </span>
                            <a href="{{ route('buy', $good->id) }}" class="btn btn-blue">Buy</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="content-footer__container">
            {{ $goods->links("pagination::bootstrap-4") }}
        </div>
    </div>
@endsection
