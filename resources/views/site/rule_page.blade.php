@extends('layouts.site')
@section('content')
    <section class="hero image_page">
        <div class="swiper swiper_images">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="item_img">
                        <img src="{{asset('img/portfolio_item.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rule_page_content">
        <div class="container">
            @if($page)
                <h1 class="rule_page_title">{{ $page->title }}</h1>
                <div class="rule_page_body">
                    {!! $page->content !!}
                </div>
            @else
                <h1 class="rule_page_title">{{ $title }}</h1>
                <div class="rule_page_body">
                    <p>Страница в процессе наполнения.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
