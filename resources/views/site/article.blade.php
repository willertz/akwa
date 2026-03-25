@extends('layouts.site')

@section('content')
    <!-- Portfolio image -->
    <section class="hero image_page art art_page">
        <!-- Background -->
        <div class="hero_bg">
            <img src="{{asset('img/hero_bg_img.jpg')}}" alt="{{$article->name}}">
        </div>
        <!-- container -->
        <div class="container">
            <!-- item title and description -->
            <div class="item_info">
                <!-- item title -->
                <div class="item_title">
                    {!! str_replace(' ', '<br>', $article->name) !!}
                </div>
                <a href="#" class="const_btn">Рассчитать стоимость отопления</a>
            </div>
        </div>
    </section>

    <!-- Articles -->
    <section class="articles">
        <!-- container -->
        <div class="container">
            <!-- Articles information -->
            <div class="information">
                {!! $article->content !!}
            </div>
        </div>
    </section>
@endsection
