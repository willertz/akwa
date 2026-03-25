@php use App\Http\Controllers\PriceController; @endphp
@extends('layouts.site')
@section('content')
    @php
        $unit = $item->unit;
        $price = null;
        $priceController = new PriceController();
        if ($item->price) {
            $price = $item->price;
        } elseif ($item->price_usd) {
            $price = $priceController->getPrice('USD', $item->price_usd);
        } elseif ($item->price_eur) {
            $price = $priceController->getPrice('EUR', $item->price_eur);
        }
        if ($price) {
            $price = (float)str_replace(' ', '', $price);
            $price_formatted = number_format($price, 0, '', ' ') . ' ₽';
        } else {
            $price_formatted = 'Уточнить у менеджера';
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
                        <div class="top_item swiper">
                            <!-- swiper-wrapper -->
                            <div class="swiper-wrapper">
                                <!-- swiper slide -->
                                <div class="swiper-slide">
                                    <!-- img -->
                                    @if($item->preview)
                                        <img src="{{$item->preview}}" alt="{{$item->name}}">
                                    @else
                                        <img src="{{asset('img/no_product.png')}}" alt="{{$item->name}}">
                                    @endif
                                </div>
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
                                    @if($item->id)
                                    <li>
                                        <!-- item title -->
                                        <span class="item_title">
                                            Код товара:
                                        </span>
                                        <!-- item info -->
                                        <span class="item_info">
                                            {{$item->id}}
                                        </span>
                                    </li>
                                    @endif
                                    @if($item->art)
                                    <li>
                                        <!-- item title -->
                                        <span class="item_title">
                                            Артикул:
                                        </span>
                                        <!-- item info -->
                                        <span class="item_info">
                                            {{$item->art}}
                                        </span>
                                    </li>
                                    @endif
                                    @if($item->country)
                                    <li>
                                        <!-- item title -->
                                        <span class="item_title">
                                            Производитель:
                                        </span>
                                        <!-- item info -->
                                        <span class="item_info">
                                            {{$item->country}}
                                        </span>
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
                                    <div class="item_title">
                                        Бесплатная доставка
                                    </div>
                                    <!-- item description -->
                                    <div class="item_description">
                                        По Воронежу до подъезда при заказе от 20 000 ₽. В иных случаях стоимость доставки по Воронежу – 500 ₽.
                                    </div>
                                </li>
                                <li>
                                    <!-- item title -->
                                    <div class="item_title">
                                        Самовывоз
                                    </div>
                                    <!-- item description -->
                                    <div class="item_description">
                                        Вы можете самостоятельно забрать товар на нашем складе по адресу: г. Воронеж, Московский пр., дом 11.
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- item price -->
                        <div class="item_price">
                            <!-- number -->
                            <div class="number">
                                {!! $price_formatted !!}
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div class="buttons">
                            <!-- order btn -->
                            <a href="#" class="order_btn add-to-cart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$price}}">
                                Заказать товар
                            </a>
                            <a href="#" class="item_favourito"></a>
                        </div>
                        <!-- product infos -->
                        <div class="product_infos_wrapper" style="margin-top: 20px;">
                            @if($item->description)
                                <div class="short_description" style="margin-bottom: 20px;">
                                    <strong>Короткое описание:</strong><br>
                                    {!! $item->description !!}
                                </div>
                            @endif
                            @if($item->full_description)
                                <div class="full_description">
                                    <strong>Полное описание:</strong><br>
                                    {!! $item->full_description !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
