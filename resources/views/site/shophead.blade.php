@extends('layouts.site')
@section('breadcrumbs')
    <ul class="old_page">
        <li><a href="{{route('showIndexPage')}}">Главная</a></li>
        <li>></li>
        <li><a href="{{route('showShopHeadPage')}}" class="active">Каталог</a></li>
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
                <div class="selected">
                    @if($currentSort == 'price_desc')
                        Сначала дорогие
                    @elseif($currentSort == 'newest')
                        Сначала новинки
                    @else
                        Сначала дешевые
                    @endif
                </div>
                <div class="select_options">
                    <div class="option {{ $currentSort == 'price_asc' || !$currentSort ? 'active' : '' }}" data-sort="price_asc">Сначала дешевые</div>
                    <div class="option {{ $currentSort == 'price_desc' ? 'active' : '' }}" data-sort="price_desc">Сначала дорогие</div>
                    <div class="option {{ $currentSort == 'newest' ? 'active' : '' }}" data-sort="newest">Сначала новинки</div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <!-- Left side -->
                <div class="left_side">
                    <!-- menu -->
                    <ul class="menu">
                        @foreach($categories as $category)
                        <!-- List -->
                        <li>
                            <!-- Link -->
                            <a href="{{$category->getUrl()}}" class="link">
                                {{$category->name}}
                            </a>
                            @if($category->children->isNotEmpty())
                            <!-- Child menu -->
                            <ul class="child_menu">
                                @foreach($category->children as $child)
                                <li>
                                    <a href="{{$child->getUrl()}}">{{$child->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Right side -->
                <div class="right_side">
                    <!-- row -->
                    <div class="right_row">
                        @foreach($items['main'] as $item)
                        @php $price = $item->price ? (float)$item->price : null; @endphp
                        <!-- Shop item -->
                        <a href="{{route('showItemPage', $item)}}" class="shop_item">
                            <!-- Item img -->
                            <div class="item_img">
                                @if($item->preview)
                                    <img src="{{asset($item->preview)}}" alt="{{$item->name}}">
                                @else
                                    <img src="{{asset('assets/img/no_product.png')}}" alt="{{$item->name}}">
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
                                <div class="item_basket add-to-cart"
                                     data-id="{{$item->id}}"
                                     data-name="{{$item->name}}"
                                     data-price="{{$price ?? 0}}"></div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
