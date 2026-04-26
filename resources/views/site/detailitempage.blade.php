@extends('layouts.site')
@section('breadcrumbs')
    <ul class="old_page">
        <li><a href="{{route('showIndexPage')}}">Главная</a></li>
        <li>></li>
        <li><a href="{{route('showShopHeadPage')}}">Каталог</a></li>
        <li>></li>
        <li><a href="#" class="active">{{$item->name}}</a></li>
    </ul>
@endsection
@section('content')
    @php
        $price = null;
        $currency = app(\App\Services\CurrencyService::class);
        if ($item->price) {
            $price = (float)$item->price;
        } elseif ($item->price_usd) {
            $price = $currency->convertToRub('USD', (float)$item->price_usd);
        } elseif ($item->price_eur) {
            $price = $currency->convertToRub('EUR', (float)$item->price_eur);
        }
    @endphp
    <!-- Product -->
    <section class="product">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- left side -->
                <div class="left_side">
                    <!-- Main image swiper -->
                    <div class="top_item swiper">
                        <!-- swiper-wrapper -->
                        <div class="swiper-wrapper">
                            @if($item->preview)
                            <!-- swiper slide -->
                            <div class="swiper-slide">
                                <!-- img -->
                                <img src="{{asset($item->preview)}}" alt="{{$item->name}}">
                            </div>
                            @else
                            <!-- swiper slide -->
                            <div class="swiper-slide">
                                <!-- img -->
                                <img src="{{asset('assets/img/no_product.png')}}" alt="{{$item->name}}">
                            </div>
                            @endif
                        </div>
                        <!-- Swiper btn -->
                        <div class="swiper_btn">
                            <!-- left btn -->
                            <div class="left_btn">
                                <img src="{{asset('img/next_arrow.png')}}" alt="">
                            </div>
                            <!-- right btn -->
                            <div class="right_btn">
                                <img src="{{asset('img/next_arrow.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Thumbnail swiper -->
                    <div class="top_item swiper item_bottom">
                        <!-- swiper-wrapper -->
                        <div class="swiper-wrapper">
                            @if($item->preview)
                            <!-- swiper slide -->
                            <div class="swiper-slide">
                                <!-- img -->
                                <img src="{{asset($item->preview)}}" alt="{{$item->name}}">
                            </div>
                            @else
                            <!-- swiper slide -->
                            <div class="swiper-slide">
                                <!-- img -->
                                <img src="{{asset('assets/img/no_product.png')}}" alt="{{$item->name}}">
                            </div>
                            @endif
                        </div>
                        <!-- Swiper btn -->
                        <div class="swiper_btn">
                            <!-- left btn -->
                            <div class="left_btn">
                                <img src="{{asset('img/next_arrow.png')}}" alt="">
                            </div>
                            <!-- right btn -->
                            <div class="right_btn">
                                <img src="{{asset('img/next_arrow.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right side -->
                <div class="right_side">
                    <!-- item title -->
                    <div class="item_title">
                        {{$item->name}}
                    </div>
                    <!-- row -->
                    <div class="row">
                        <!-- left side -->
                        <div class="left_item">
                            <!-- information -->
                            <ul class="information">
                                @if($item->art)
                                <li>
                                    <!-- item title -->
                                    <span class="item_title">Артикул:</span>
                                    <!-- item info -->
                                    <span class="item_info">{{$item->art}}</span>
                                </li>
                                @endif
                                @if($item->country)
                                <li>
                                    <!-- item title -->
                                    <span class="item_title">Страна бренда:</span>
                                    <!-- item info -->
                                    <span class="item_info">{{$item->country}}</span>
                                </li>
                                @endif
                                <li>
                                    <!-- description -->
                                    <span class="description">
                                        Оплата банковской картой в магазине или наличными при получении
                                    </span>
                                </li>
                                <li>
                                    <!-- pay -->
                                    <span class="pay">
                                        <img src="{{asset('img/payments.png')}}" alt="">
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <!-- right side -->
                        <ul class="right_item">
                            <li>
                                <!-- item title -->
                                <div class="item_title">Бесплатная доставка</div>
                                <!-- item description -->
                                <div class="item_description">
                                    По Воронежу до подъезда при заказе от 20 000 ₽. В иных случаях стоимость доставки по Воронежу – 500 ₽.
                                </div>
                            </li>
                            <li>
                                <!-- item title -->
                                <div class="item_title">Самовывоз</div>
                                <!-- item description -->
                                <div class="item_description">
                                    Вы можете самостоятельно забрать товар на нашем складе по адресу: г. Воронеж, Московский пр., дом 11, литер З. Узнать, поступил ли ваш товар в пункт выдачи можно по телефону +7 (473) 300-31-39
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- item price -->
                    <div class="item_price">
                        @if($price)
                        <!-- number -->
                        <div class="number">
                            {{number_format($price, 0, '.', ' ')}} ₽
                        </div>
                        <a href="#" class="error_btn">Нашли дешевле?</a>
                        @endif
                    </div>
                    <!-- Buttons -->
                    <div class="buttons">
                        <!-- order btn -->
                        <a href="{{route('showCart')}}" class="order_btn">
                            Заказать товар
                        </a>
                        <!-- basket btn -->
                        <a href="{{route('showCart')}}" class="basket_btn">В корзине</a>
                        <!-- favourite btn -->
                        <a href="#" class="item_favourito"></a>
                    </div>
                    @if($item->description)
                    <!-- product infos -->
                    <ul class="product_infos">
                        <!-- li -->
                        <li>
                            <span class="title">Описание</span>
                        </li>
                        <li>
                            <span class="info">{!! $item->description !!}</span>
                        </li>
                    </ul>
                    @endif
                    @if($item->full_description)
                    <!-- full description -->
                    <div class="full_description">
                        {!! $item->full_description !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <section class="portfolio half">
        <!-- container -->
        <div class="container">
            <!-- form -->
            <form class="free_design" id="consultation-form" action="/api/send-mail" method="POST">
                @csrf
                <!-- Left side -->
                <div class="left_side">
                    <!-- Item title -->
                    <div class="item_title">
                        Запишитесь на встречу с нами
                    </div>
                    <!-- Item info -->
                    <ul class="item_desc">
                        <!-- description -->
                        <li>
                            Проработаем для вас стиль интерьера с учетом индивидуальных условий
                        </li>
                        <!-- description -->
                        <li>
                            Разработаем планировочное решение с расстановкой мебели
                        </li>
                        <!-- description -->
                        <li>
                            Обсудим подробности и возможные особые условия сотрудничества
                        </li>
                    </ul>
                </div>
                <!-- right side -->
                <div class="right_side">
                    <!-- Inputs -->
                    <div class="inputs">
                        <input type="text" name="name" placeholder="Имя">
                        <input id="phone" type="tel" />
                    </div>
                    <!-- Button -->
                    <a href="#" class="follow_btn">Записаться</a>
                    <!-- terms -->
                    <div class="terms">
                        Нажимая на кнопку "Записаться", я соглашаюсь с политикой конфиденциальности
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
