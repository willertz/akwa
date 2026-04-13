@extends('layouts.site')

@section('content')
    <!-- Portfolio section -->
    <section class="portfolio page">
        <!-- container -->
        <div class="container">
            <!-- Little section title -->
            <div class="page_title">
                ПОРТФОЛИО
            </div>
            <!-- Section title -->
            <div class="section_title">
                AKWAGARANT
            </div>
        </div>
        <!-- row -->
        <div class="row">
            @foreach($objects as $index => $object)
                <!-- Portfolio -->
                <a href="{{route('showObjectPage', $object)}}" class="portfolio_item {{ ($index % 6 == 0) ? 'half' : '' }}">
                    <!-- Item img -->
                    @if($object->preview_pict)
                        <img src="{{asset($object->preview_pict)}}" alt="{{$object->name}}">
                    @else
                        <img src="{{asset('img/portfolio_item.jpg')}}" alt="{{$object->name}}">
                    @endif
                    <!-- Item top hover -->
                    <div class="item_top_hover">
                        <!-- Item title -->
                        <div class="item_title">{{$object->name}}</div>
                        <!-- Item description -->
                        <div class="description">
                            <?= mb_strimwidth(strip_tags($object->content), 0, 500, '...'); ?>
                        </div>
                    </div>
                    <!-- Item hover -->
                    <div class="hover_bottom">
                        <!-- Left side -->
                        <div class="left_side">
                            <!-- Item title -->
                            <div class="item_title">
                                {{$object->name}}
                            </div>
                            <!--  Подробнее  -->
                            <div class="item_btn">
                                Подробнее <img src="{{asset('img/arrow.png')}}" alt="">
                            </div>
                            @if($object->price_per_sqm)
                            <!-- Item price -->
                            <div class="item_price">
                                от {{ number_format($object->price_per_sqm, 0, '.', ' ') }} руб/м² под ключ
                            </div>
                            @endif
                        </div>
                        @if($object->floors || $object->area)
                        <!-- Right side -->
                        <div class="right_side">
                            @if($object->floors)
                            <span class="item_floor"> {{$object->floors}} {{trans_choice('этаж|этажа|этажей', $object->floors)}}</span>
                            @endif
                            @if($object->area)
                            <div class="item_kv">
                                <img src="{{asset('img/area.png')}}" alt="">
                                {{$object->area}} м²
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
