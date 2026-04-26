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
    <!-- Product -->
    <section class="product">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- left side -->
                <div class="left_side">
                    <div class="top_item swiper">
                        <!-- swiper-wrapper -->
                        <div class="swiper-wrapper">
                            @if($item->preview)
                                <!-- swiper slide -->
                                <div class="swiper-slide">
                                    <img src="{{asset($item->preview)}}" alt="{{$item->name}}">
                                </div>
                            @else
                                <!-- swiper slide -->
                                <div class="swiper-slide">
                                    <img src="{{asset('assets/img/no_product.png')}}" alt="{{$item->name}}">
                                </div>
                            @endif
                        </div>
                        <!-- Swiper btn -->
                        <div class="swiper_btn">
                            <!-- left btn -->
                            <div class="left_btn">
                                <img src="{{asset('assets/img/next_arrow.png')}}" alt="">
                            </div>
                            <!-- right btn -->
                            <div class="right_btn">
                                <img src="{{asset('assets/img/next_arrow.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- bottom item -->
                    <div class="top_item swiper item_bottom">
                        <!-- swiper-wrapper -->
                        <div class="swiper-wrapper">
                            @if($item->preview)
                                <div class="swiper-slide">
                                    <img src="{{asset($item->preview)}}" alt="{{$item->name}}">
                                </div>
                            @else
                                <div class="swiper-slide">
                                    <img src="{{asset('assets/img/no_product.png')}}" alt="{{$item->name}}">
                                </div>
                            @endif
                        </div>
                        <!-- Swiper btn -->
                        <div class="swiper_btn">
                            <!-- left btn -->
                            <div class="left_btn">
                                <img src="{{asset('assets/img/next_arrow.png')}}" alt="">
                            </div>
                            <!-- right btn -->
                            <div class="right_btn">
                                <img src="{{asset('assets/img/next_arrow.png')}}" alt="">
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
                                    <span class="item_title">Артикул:</span>
                                    <span class="item_info">{{$item->art}}</span>
                                </li>
                                @endif
                                @if($item->country)
                                <li>
                                    <span class="item_title">Бренд:</span>
                                    <span class="item_info">{{$item->country}}</span>
                                </li>
                                @endif
                                @if($item->description)
                                <li>
                                    <a href="#description" class="all_information">Все характеристики</a>
                                </li>
                                <li>
                                    <span class="description">
                                        Оплата банковской картой в магазине или наличными при получении
                                    </span>
                                </li>
                                <li>
                                    <span class="pay">
                                        <img src="{{asset('assets/img/payments.png')}}" alt="">
                                    </span>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <!-- right side -->
                        <ul class="right_item">
                            <li>
                                <div class="item_title">Бесплатная доставка</div>
                                <div class="item_description">
                                    По Воронежу до подъезда при заказе от 20 000 ₽. В иных случаях стоимость доставки по Воронежу – 500 ₽.
                                </div>
                            </li>
                            <li>
                                <div class="item_title">Самовывоз</div>
                                <div class="item_description">
                                    Вы можете самостоятельно забрать товар на нашем складе по адресу: г. Воронеж, Московский пр., дом 11, литер З. Узнать, поступил ли ваш товар в пункт выдачи можно по телефону +7 (473) 300-31-39
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- item price -->
                    <div class="item_price">
                        <!-- number -->
                        <div class="number">
                            @if($item->price)
                                {{number_format((float)$item->price, 0, '.', ' ')}} ₽
                            @else
                                По запросу
                            @endif
                        </div>
                        <a href="#" class="error_btn">Нашли дешевле?</a>
                    </div>
                    <!-- Buttons -->
                    <div class="buttons">
                        <!-- order btn -->
                        <a href="{{route('showBasket')}}" class="order_btn add-to-cart"
                           data-id="{{$item->id}}"
                           data-name="{{$item->name}}"
                           data-price="{{$item->price}}">
                            Заказать товар
                        </a>
                        <!-- basket btn -->
                        <a href="#" class="basket_btn add-to-cart"
                           data-id="{{$item->id}}"
                           data-name="{{$item->name}}"
                           data-price="{{$item->price}}">В корзину</a>
                        <!-- favourite btn -->
                        <a href="#" class="item_favourito"></a>
                    </div>
                    <!-- product infos -->
                    @if($item->description)
                    <ul class="product_infos" id="description">
                        <li>
                            <span class="title">Характеристики</span>
                        </li>
                        <li>
                            <div class="description_text">{!!$item->description!!}</div>
                        </li>
                    </ul>
                    @endif

                    @if(count($subitems) > 0)
                    <!-- Subitems -->
                    <ul class="product_infos">
                        <li>
                            <span class="title">Варианты товара</span>
                        </li>
                        @foreach($subitems as $subitem)
                        <li>
                            <span class="title">
                                <a href="{{route('showItemPage', $subitem)}}">{{$subitem->name}}</a>
                            </span>
                            <span class="info">
                                @if($subitem->price)
                                    {{number_format((float)$subitem->price, 0, '.', ' ')}} ₽
                                @else
                                    По запросу
                                @endif
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if($viewedItems->isNotEmpty())
    <!-- Вы смотрели -->
    <section class="shop viewed">
        <!-- container -->
        <div class="container">
            <!-- item title -->
            <div class="item_title">
                Вы смотрели
            </div>
            <!-- row -->
            <div class="row">
                <!-- Right side -->
                <div class="right_side">
                    <!-- row -->
                    <div class="right_row">
                        @foreach($viewedItems as $viewedItem)
                        @php $viewedPrice = $viewedItem->price ? (float)$viewedItem->price : null; @endphp
                        <!-- Shop item -->
                        <a href="{{ route('showItemPage', $viewedItem) }}" class="shop_item">
                            <!-- Item img -->
                            <div class="item_img">
                                @if($viewedItem->preview)
                                    <img src="{{ asset($viewedItem->preview) }}" alt="{{ $viewedItem->name }}">
                                @else
                                    <img src="{{ asset('assets/img/no_product.png') }}" alt="{{ $viewedItem->name }}">
                                @endif
                            </div>
                            <!-- Item name -->
                            <div class="item_name">
                                {{ $viewedItem->name }}
                            </div>
                            @if($viewedItem->country)
                            <!-- Mark -->
                            <div class="mark_name">
                                {{ $viewedItem->country }}
                            </div>
                            @endif
                            <!-- Item buttons -->
                            <div class="item_buttons">
                                <!-- Item price -->
                                <div class="price">
                                    @if($viewedPrice)
                                        {{ number_format($viewedPrice, 0, '.', ' ') }} ₽
                                    @else
                                        По запросу
                                    @endif
                                </div>
                                <!-- Item favourite -->
                                <div class="item_favourito"></div>
                                <!-- Item basket -->
                                <div class="item_basket"></div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @include('site.partials.meeting_form', ['formId' => 'productMeetingForm'])
@endsection
