@extends('layouts.site')

@section('content')
    <!-- Portfolio image -->
    <section class="hero image_page">
        <!-- Swiper -->
        @if($slider)
        <div class="swiper swiper_images">
            <div class="swiper-wrapper">
                @foreach($slider as $slide)
                <div class="swiper-slide">
                    <div class="item_img">
                        <img src="{{asset($slide)}}" alt="{{$object->name}}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <!-- container -->
        <div class="container">
            <div class="item_info">
                <div class="item_title">
                    {!! str_replace(' ', '<br>', $object->name) !!}
                </div>
                <div class="item_description">
                    {{$object->title}}
                </div>
                <a href="#" class="const_btn">Получить расчет</a>
            </div>
        </div>
    </section>

    <!-- Photo section -->
    <section class="info_photo">
        <div class="row" id="infogallery">
            @if($slider)
            @foreach($slider as $slide)
            <a href="{{asset($slide)}}" class="item_img">
                <img src="{{asset($slide)}}" alt="{{$object->name}}">
            </a>
            @endforeach
            @endif
        </div>
    </section>

    <section class="articles">
        <div class="container">
            <div class="information">
                {!! $object->content !!}
            </div>
        </div>
    </section>
@endsection
