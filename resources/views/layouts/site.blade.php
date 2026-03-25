<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(52522438, "init", {
            id:52522438,
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/52522438" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/sass/main.scss', 'resources/js/site.js'])
    <!-- Optional JavaScript -->
    <!-- Swiper js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Light nanogallery2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css" />

    <!-- Tel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css"/>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('js/parallax.min.js')}}"></script>


    <meta name="yandex-verification" content="e196649b6a88f7a9" />
    <title>{{$title}}</title>
    <meta name="keywords" content="монтаж отопления Воронеж, системы отопления Воронеж,отопление Воронеж, отопление коттеджа, отопление частного дома, проектирование систем отопления, проектирование отопления Воронеж, монтаж водоснабжения,монтаж котлов,водопровод Воронеж, водоснабжение Воронеж, установка радиаторов, котлы отопления, твердотопливные котлы в Воронеже, энергосберегающее отопление, монтаж автономной канализации, дизайн радиаторы отопления, дизайн-радиаторы ванных комнат, купить дизайн радиаторы в Воронеже, алмазное сверление Воронеж, алмазное бурение Воронеж. Монтажные работы.">
    <meta name="description" content="{{$description}}">
    <meta name="mailru-domain" content="8x0JZjs9ipQSrWs1" />
</head>
<body class="hidden">
    <!-- Loader -->
    <div class="loading">
        <!-- Loader -->
        <span class="loader">
        </span>
    </div>

    <!-- wrapper -->
    <div class="wrapper">
        <!-- Header -->
        <header @if(request()->is('internet-magazin*') || request()->is('catalog*') || request()->is('goods*') || request()->is('cart*')) class="shop_header" @endif>
            <!-- row -->
            <div class="row">
                <!-- Header logo -->
                <a href="{{route('showIndexPage')}}" class="header_logo">
                    <!-- img -->
                    <img src="{{asset('img/header_logo.png')}}" alt="">
                </a>
                <button class="hamburger" id="hamburger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </button>
                <!-- nav -->
                <nav id="nav">
                    <!-- Links -->
                    <ul class="links">
                        <!-- Link -->
                        <li>
                            <a href="{{route('showIndexPage')}}">
                                о нас
                            </a>
                        </li>
                        <!-- Link -->
                        <li>
                            <a href="#">
                                услуги <span class="tmenu"></span>
                            </a>
                            <!-- Submenu -->
                            <ul class="submenu">
                                <!-- Link -->
                                <li>
                                    <!-- A -->
                                    <a href="/#services">Монтаж  отопления</a>
                                </li>
                                <!-- Link -->
                                <li>
                                    <!-- A -->
                                    <a href="/#services">
                                        Монтаж
                                        снеготаяния
                                    </a>
                                </li>
                                <!-- Link -->
                                <li>
                                    <!-- A -->
                                    <a href="/#services">
                                        Монтаж
                                        септиков
                                    </a>
                                </li>
                                <!-- Link -->
                                <li>
                                    <!-- A -->
                                    <a href="/#services">
                                        Монтаж
                                        котельных
                                    </a>
                                </li>
                                <!-- Link -->
                                <li>
                                    <!-- A -->
                                    <a href="/#services">
                                        Сантехнические
                                        работы
                                    </a>
                                </li>
                                <!-- Link -->
                                <li>
                                    <!-- A -->
                                    <a href="/#services">
                                        Проектирование
                                        работы
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Link -->
                        <li>
                            <a href="{{route('showObjectsListPage')}}">
                                портфолио
                            </a>
                        </li>
                        <!-- Link -->
                        <li>
                            <a href="{{route('showContactPage')}}">
                                контакты
                            </a>
                        </li>
                        <!-- Link -->
                        <li>
                            <a href="{{route('showShopHeadPage')}}">
                                интернет-магазин
                            </a>
                        </li>
                        <!-- Link -->
                        <li>
                            <a href="{{route('showArticlesListPage')}}">
                                статьи
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Number and help button -->
                <div class="help_item" id="help_item">
                    <!-- phone number -->
                    <a href="tel:+79036516410" class="phone_number">+7 903 651 64 10</a>
                    <!-- Consultation btn -->
                    <a href="#" class="const_btn" id="openModal">получить консультацию</a>
                </div>
            </div>
            @yield('breadcrumbs')
        </header>

@yield('content')

        <footer>
            <div class="container">
                <div class="footer_row">
                    <div class="footer_logo">
                        <img src="{{asset('img/header_logo.png')}}" alt="">
                    </div>
                    <ul class="footer_links">
                        <li>
                            <a href="{{route('showIndexPage')}}">О нас</a>
                        </li>
                        <li>
                            <a href="{{route('showObjectsListPage')}}">Объекты</a>
                        </li>
                        <li>
                            <a href="{{route('showArticlesListPage')}}">Статьи</a>
                        </li>
                        <li>
                            <a href="{{route('showPricePage')}}">Цены</a>
                        </li>
                        <li>
                            <a href="{{route('showContactPage')}}">Контакты</a>
                        </li>
                        <li>
                            <a href="{{route('showShopHeadPage')}}">Магазин</a>
                        </li>
                    </ul>
                    <div class="footer_contacts">
                        <a href="tel:+79036516410">+7 903 651 64 10</a>
                        <a href="mailto:info@akwagarant.ru">info@akwagarant.ru</a>
                    </div>
                    <div class="footer_social">
                        <a href="https://www.instagram.com/akwagarant.ru/">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="48" rx="12" fill="#2196F3"/>
                                <defs>
                                  <linearGradient id="instagram-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#FF5722"/>
                                    <stop offset="50%" style="stop-color:#E91E63"/>
                                    <stop offset="100%" style="stop-color:#9C27B0"/>
                                  </linearGradient>
                                </defs>
                                <rect x="12" y="12" width="24" height="24" rx="6" stroke="white" stroke-width="2" fill="none"/>
                                <circle cx="24" cy="24" r="6" stroke="white" stroke-width="2" fill="none"/>
                                <circle cx="32" cy="16" r="2" fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Modal -->
    <div class="modal" id="myModal">
        <div class="modal_close" id="closeModal">
            <svg role="presentation" class="t-popup__close-icon" width="23px" height="23px" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill="#cfa382" fill-rule="evenodd"> <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> </g> </svg>
        </div>
        <form class="modal_container">
            <div class="modal_title">Получить консультацию</div>
            <div class="inputs">
                <input type="text" name="name" placeholder="Имя">
                <input id="phone_mobile" type="tel"/>
            </div>
            <div class="options">
                <div class="item_title">Предпочитаемый способ связи:</div>
                <div class="inputs">
                    <label for="tel_modal"><input type="checkbox" id="tel_modal"><span>Позвонить</span></label>
                    <label for="whatsapp"><input type="checkbox" id="whatsapp"><span>Написать WhatsApp</span></label>
                    <label for="telegram"><input type="checkbox" id="telegram"><span>Написать Telegram</span></label>
                </div>
            </div>
            <a href="#" class="order_btn">Получить консультацию</a>
            <div class="terms">Нажимая на кнопку "Получить консультацию" вы даете свое согласие на обработку персональных данных</div>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/zoom/lg-zoom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
