@extends('layouts.site')

@section('content')

        <!-- Portfolio image -->
        <section class="hero image_page">
            <!-- Swiper -->
            <div class="swiper swiper_images">
                <!-- Swiper-wrapper -->
                <div class="swiper-wrapper">
                    <!-- Swiper-slide -->
                    <div class="swiper-slide">
                        <!-- Swiper img -->
                        <div class="item_img">
                            <img src="{{asset('img/portfolio_item.jpg')}}" alt="">
                        </div>
                    </div>
                    <!-- Swiper-slide -->
                    <div class="swiper-slide">
                        <!-- Swiper img -->
                        <div class="item_img">
                            <img src="{{asset('img/portfolio_item2.jpg')}}" alt="">
                        </div>
                    </div>
                    <!-- Swiper-slide -->
                    <div class="swiper-slide">
                        <!-- Swiper img -->
                        <div class="item_img">
                            <img src="{{asset('img/portfolio_item.jpg')}}" alt="">
                        </div>
                    </div>
                    <!-- Swiper-slide -->
                    <div class="swiper-slide">
                        <!-- Swiper img -->
                        <div class="item_img">
                            <img src="{{asset('img/portfolio_item2.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- container -->
            <div class="container">
                <!-- item title and description -->
                <div class="item_info">
                    <!-- item title -->
                    <div class="item_title">
                        Зеленый мыс <br> 540
                    </div>
                    <!-- Item description -->
                    <div class="item_description">
                        дизайн и ремонт
                    </div>
                    <a href="#" class="const_btn">Получить расчет</a>
                </div>
            </div>
        </section>

        <!-- Photo section -->
        <section class="info_photo">
            <!-- container row -->
            <div class="row" id="infogallery">
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item2.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item2.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item2.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item2.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item2.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item2.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item2.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item2.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item2.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item2.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item.jpg')}}" alt="">
                </a>
                <!-- Info item img -->
                <a href="{{asset('img/portfolio_item2.jpg')}}" class="item_img">
                    <!-- img -->
                    <img src="{{asset('img/portfolio_item2.jpg')}}" alt="">
                </a>
            </div>
            <!-- More items -->
            <a href="{{route('showObjectsListPage')}}" class="more_buttons const_btn">Посмотреть больше работ</a>

            <!-- container -->
            <div class="container">
                <div class="item_top">
                    <!-- Logo -->
                    <a href="index.html" class="item_logo">
                        <img src="{{asset('img/header_logo.png')}}" alt="">
                    </a>
                    <!-- Item description -->
                    <div class="item_description">
                        Этот проект – идеальное сочетание комфорта, индивидуальности и современного подхода к дизайну, где каждая деталь продумана до мелочей.
                    </div>
                </div>
                <div class="item_bottom">
                    <!-- Left side -->
                    <div class="left_side">
                        <img src="{{asset('img/portfolio_item2.jpg')}}" alt="">
                    </div>
                    <!-- Right side -->
                    <div class="right_side">
                        <!-- top side -->
                        <ul class="item_info">
                            <!-- li -->
                            <li>
                                <div class="item_title_desc">
                                    <span class="number">01</span>
                                    <span class="title">Смарт-стекло</span>
                                </div>
                                <div class="description">
                                    между библиотекой и игровой зоной, которое добавляет современности и функциональности
                                </div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="item_title_desc">
                                    <span class="number">02</span>
                                    <span class="title">Натуральные <br> материалы</span>
                                </div>
                                <div class="description">
                                    подчеркивающие экологичность и эстетику интерьера.
                                </div>
                            </li>
                        </ul>
                        <div class="border"></div>
                        <ul class="item_info">
                            <!-- li -->
                            <li>
                                <div class="item_title_desc">
                                    <span class="number">03</span>
                                    <span class="title">Винная комната</span>
                                </div>
                                <div class="description">
                                    становится изюминкой дома, создавая атмосферу утонченного стиля и роскоши.
                                </div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="item_title_desc">
                                    <span class="number">04</span>
                                    <span class="title">Профессиональная реализация</span>
                                </div>
                                <div class="description">
                                    Полный спектр услуг от инженерных сетей до ландшафтного дизайна, от ремонта до клининга.
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Item big description -->
                <div class="big_description">
                    Стиль эклектика воплощает гармонию вкусов и предпочтений каждого члена семьи, создавая по-настоящему уникальные и неповторимые интерьеры. Мягкая, умиротворяющая цветовая гамма, уютная мебель и насыщенные акценты в деталях придают пространству особый шарм. В таком интерьере ценится натуральность материалов и деликатность в декоре. Здесь органично сочетаются элементы неоклассики, модерна и ар-деко, создавая уютные пространства с акцентной мебелью и изысканным декором.
                    <br>
                    Современные технологии гармонично вплетаются в интерьер: смарт-стекло между библиотекой и игровой зоной добавляет легкости и функциональности, позволяя легко трансформировать пространство. Библиотека с высокими стеллажами и удобными креслами для чтения становится местом уединения, а игровая зона, оформленная с учетом интересов всех поколений, сочетает яркие акценты и практичность.
                    <br>
                    Особое внимание уделено натуральным материалам: паркетная доска из элитных пород дерева, шелковые текстуры в декоре и каменные поверхности создают атмосферу уюта и роскоши. Каминная зона
                    <br>
                    с латунными элементами ручной работы добавляет тепла и уюта в гостиную, а винная комната становится изюминкой дома, предлагая идеальные условия для хранения коллекции и создавая атмосферу утонченного стиля.
                    <br>
                    Этот проект – идеальное сочетание комфорта, индивидуальности и современного подхода к дизайну, где каждая деталь продумана до мелочей. Дом становится не просто местом для жизни, а пространством, где каждый уголок вдохновляет и радует глаз.
                </div>
            </div>
        </section>

        <!-- Portfolio -->
        <section class="portfolio half">
            <!-- container -->
            <div class="container">

                <!-- form -->
                <form class="free_design">
                    <!-- Left side -->
                    <div class="left_side">
                        <!-- Item title -->
                        <div class="item_title">
                            Запишитесь на встречу с нами
                        </div>
                        <!-- Item info -->
                        <ul class="item_desc">
                            <!-- description -->
                            <li>
                                Проработаем для вас стиль интерьера с учетом индивидуальных условий
                            </li>
                            <!-- description -->
                            <li>
                                Разработаем планировочное решение с расстановкой мебели
                            </li>
                            <!-- description -->
                            <li>
                                Обсудим подробности и возможные особые условия сотрудничества
                            </li>
                        </ul>
                    </div>
                    <!-- right side -->
                    <div class="right_side">
                        <!-- Inputs -->
                        <div class="inputs">
                            <input type="text" name="name" placeholder="Имя">
                            <input id="phone" type="tel" />
                        </div>
                        <!-- Button -->
                        <a href="#" class="follow_btn" id="contactFormSubmit">Записаться</a>
                        <!-- terms -->
                        <div class="terms consent_row">
                            <label class="consent_label">
                                <input type="checkbox" id="contactConsent" class="consent_checkbox">
                                <span>Даю согласие на обработку своих персональных данных в соответствии с <a href="{{ route('showPolicyPage') }}" target="_blank" class="consent_link">политикой конфиденциальности</a>.</span>
                            </label>
                            <div id="contactConsentError" class="consent_error" style="display:none;">Необходимо дать согласие на обработку персональных данных</div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Footer -->
@endsection
