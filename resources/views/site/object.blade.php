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
                        <img src="{{$slide}}" alt="{{$object->name}}">
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
                    {{$object->name}}
                </div>
                @if($object->description)
                <div class="item_description">
                    {{$object->description}}
                </div>
                @endif
                <a href="#" class="const_btn">Получить расчет</a>
            </div>
        </div>
    </section>
    <!-- Photo section -->
    <section class="info_photo">
        <div class="row" id="infogallery">
            @if($slider)
            @foreach($slider as $slide)
            <a href="{{$slide}}" class="item_img">
                <img src="{{$slide}}" alt="{{$object->name}}">
            </a>
            @endforeach
            @endif
        </div>
        <!-- More items -->
        <a href="{{route('showObjectsListPage')}}" class="more_buttons const_btn">Посмотреть больше работ</a>
        <!-- container -->
        <div class="container">
            <div class="item_top">
                <div class="object_section_title">Задачи заказчика</div>
            </div>
            <div class="item_bottom">
                <!-- Left side -->
                <div class="left_side">
                    @if($object->left_image)
                    <img src="{{$object->left_image}}" alt="{{$object->name}}">
                    @elseif($object->preview_pict)
                    <img src="{{$object->preview_pict}}" alt="{{$object->name}}">
                    @endif
                </div>
                <!-- Right side -->
                <div class="right_side">
                    @php
                        $features = $object->features ?? [];
                        $firstHalf = array_slice($features, 0, 2);
                        $secondHalf = array_slice($features, 2);
                    @endphp
                    @if(count($firstHalf))
                    <ul class="item_info">
                        @foreach($firstHalf as $feature)
                        <li>
                            <div class="item_title_desc">
                                <span class="number">{{$feature['number'] ?? ''}}</span>
                                <span class="title">{!! nl2br(e($feature['title'] ?? '')) !!}</span>
                            </div>
                            <div class="description">
                                {{$feature['description'] ?? ''}}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    @if(count($secondHalf))
                    <div class="border"></div>
                    <ul class="item_info">
                        @foreach($secondHalf as $feature)
                        <li>
                            <div class="item_title_desc">
                                <span class="number">{{$feature['number'] ?? ''}}</span>
                                <span class="title">{!! nl2br(e($feature['title'] ?? '')) !!}</span>
                            </div>
                            <div class="description">
                                {{$feature['description'] ?? ''}}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    @if($object->content)
                    <div class="item_content">
                        {!! $object->content !!}
                    </div>
                    @endif
                </div>
            </div>
            @if($object->big_description)
            <!-- Item big description -->
            <div class="big_description">
                {!! nl2br(e($object->big_description)) !!}
            </div>
            @endif
        </div>
    </section>

    <!-- Portfolio half form -->
    <section class="portfolio half">
        <div class="container">
            <form class="free_design" id="objectContactForm">
                <!-- Left side -->
                <div class="left_side">
                    <div class="item_title">
                        Запишитесь на встречу с нами
                    </div>
                    <ul class="item_desc">
                        <li>Проработаем для вас стиль интерьера с учетом индивидуальных условий</li>
                        <li>Разработаем планировочное решение с расстановкой мебели</li>
                        <li>Обсудим подробности и возможные особые условия сотрудничества</li>
                    </ul>
                </div>
                <!-- right side -->
                <div class="right_side">
                    <div class="inputs">
                        <input type="text" name="name" id="objectFormName" placeholder="Имя">
                        <input id="objectFormPhone" type="tel" />
                    </div>
                    <a href="#" class="follow_btn" id="objectFormSubmit">Записаться</a>
                    <div class="terms consent_row">
                        <label class="consent_label">
                            <input type="checkbox" id="objectConsent" class="consent_checkbox">
                            <span>Даю согласие на обработку своих персональных данных в соответствии с <a href="{{ route('showPolicyPage') }}" target="_blank" class="consent_link">политикой конфиденциальности</a>.</span>
                        </label>
                        <div id="objectConsentError" class="consent_error" style="display:none;">Необходимо дать согласие на обработку персональных данных</div>
                    </div>
                    <div id="objectFormMessage" style="display:none; margin-top:10px; color: #4caf50; font-weight:500;"></div>
                </div>
            </form>
        </div>
    </section>
@endsection
