@extends('layouts.site')
@section('breadcrumbs')
    <ul class="old_page">
        <li><a href="{{route('showIndexPage')}}">Главная</a></li>
        <li>></li>
        <li><a href="{{route('showShopHeadPage')}}">Каталог</a></li>
        <li>></li>
        <li><a href="#" class="active">{{$h1}}</a></li>
    </ul>
@endsection
@section('content')
    <!-- Articles -->
    <section class="articles new_shop">
        <!-- container -->
        <div class="container">
            <!-- section info -->
            <div class="section_info">
                {{$topText}}
            </div>
        </div>
    </section>

    <!-- Shop -->
    <section class="shop">
        <!-- container -->
        <div class="container">
            <!-- shop sort -->
            <div class="custom_select">
                <div class="selected">Сначала дешевые</div>
                <div class="select_options">
                    <div class="option active">Сначала дешевые</div>
                    <div class="option">Сначала дорогие</div>
                    <div class="option">Сначала новинки</div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <!-- Right side -->
                <div class="right_side">
                    <!-- row -->
                    <div class="right_row">
                        @foreach($categories as $category)
                        <!-- Shop item (subcategory) -->
                        <a href="{{$urls[$category->id]}}" class="shop_item">
                            <!-- Item img -->
                            <div class="item_img">
                                @if($category->preview)
                                    <img src="{{asset($category->preview)}}" alt="{{$category->name}}">
                                @else
                                    <img src="{{asset('userfiles/system/no_product.png')}}" alt="{{$category->name}}">
                                @endif
                            </div>
                            <!-- Item name -->
                            <div class="item_name">
                                {{$category->name}}
                            </div>
                            <!-- Item buttons -->
                            <div class="item_buttons">
                                <div class="price"></div>
                                <div class="item_favourito"></div>
                                <div class="item_basket"></div>
                            </div>
                        </a>
                        @endforeach

                        @foreach($items['main'] as $item)
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
                        <!-- Shop item (product) -->
                        <a href="{{route('showItemPage', $item)}}" class="shop_item">
                            <!-- Item img -->
                            <div class="item_img">
                                @if($item->preview)
                                    <img src="{{asset($item->preview)}}" alt="{{$item->name}}">
                                @else
                                    <img src="{{asset('userfiles/system/no_product.png')}}" alt="{{$item->name}}">
                                @endif
                            </div>
                            <!-- Item name -->
                            <div class="item_name">
                                {{$item->name}}
                            </div>
                            @if($item->country)
                            <!-- Mark -->
                            <div class="mark_name">
                                {{$item->country}}
                            </div>
                            @endif
                            <!-- Item buttons -->
                            <div class="item_buttons">
                                <!-- Item price -->
                                <div class="price">
                                    @if($price)
                                        {{number_format($price, 0, '.', ' ')}} ₽
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
@endsection
