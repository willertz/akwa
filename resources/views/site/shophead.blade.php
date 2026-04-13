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
                <div class="selected">Сначала дешевые</div>
                <div class="select_options">
                    <div class="option active">Сначала дешевые</div>
                    <div class="option">Сначала дорогие</div>
                    <div class="option">Сначала новинки</div>
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
                        @foreach($categories as $category)
                        <!-- Shop item -->
                        <a href="{{$category->getUrl()}}" class="shop_item">
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
                                <!-- Item price -->
                                <div class="price"></div>
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
