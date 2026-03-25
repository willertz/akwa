@extends('layouts.site')

@section('breadcrumbs')
    <ul class="old_page">
        <li><a href="{{route('showIndexPage')}}">Главная</a></li>
        <li>></li>
        <li><a href="{{route('showShopHeadPage')}}" class="active">Каталог</a></li>
    </ul>
@endsection

@section('content')
    <section class="articles new_shop">
        <div class="container">
            <div class="section_info">
                {{$topText}}
            </div>
        </div>
    </section>

    <section class="shop">
        <div class="container">
            <div class="row">
                <div class="left_side">
                    <ul class="menu">
                        @foreach($categories as $category)
                        <li>
                            <a href="/catalog/{{$category->slug}}" class="link">{{$category->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="right_side">
                    <div class="right_row">
                        @foreach($categories as $category)
                        <a href="/catalog/{{$category->slug}}" class="shop_item">
                            <div class="item_img">
                                @if($category->preview)
                                    <img src="{{asset($category->preview)}}" alt="{{$category->name}}">
                                @else
                                    <img src="{{asset('userfiles/system/no_product.png')}}" alt="{{$category->name}}">
                                @endif
                            </div>
                            <div class="item_title">{{$category->name}}</div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
