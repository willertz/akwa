<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <style>
        @font-face {
            font-family: 'Sovest';
            src: url('{{asset('fonts/sovest/sovest.woff2')}}') format('woff2'),
                 url('{{asset('fonts/sovest/sovest.woff')}}') format('woff'),
                 url('{{asset('fonts/sovest/sovest.ttf')}}') format('truetype');
        }
    </style>
    @if(config('app.env') !== 'local' && config('services.yandex_metrika.id'))
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym({{ config('services.yandex_metrika.id') }}, "init", {
            id:{{ config('services.yandex_metrika.id') }},
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/{{ config('services.yandex_metrika.id') }}" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    @endif
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Content Security Policy -->
    @if(config('app.env') !== 'local')
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-inline' https://www.youtube.com https://s.ytimg.com https://mc.yandex.ru; font-src 'self' data:; frame-src 'self' https://www.youtube.com https://yandex.ru;">
    @endif


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type='text/javascript' src='{{asset('js/jquery.min.js')}}'></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
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
                        <!-- Cart icon -->
                        <li class="cart-link-wrapper" style="display:none;">
                            <a href="{{route('showBasket')}}" class="cart-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                <span class="cart-count">0</span>
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
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row top">
                    <!-- Header logo -->
                    <a href="{{route('showIndexPage')}}" class="header_logo">
                        <img src="{{asset('img/half_logo.png')}}" alt="Инженерный центр Аквагарант">
                        Инженерный центр Аквагарант
                    </a>
                    <!-- phone  -->
                    <div class="work_phone">
                        <a href="tel:+79036516410" class="phone">+7 903 651 64 10</a>
                        <a href="tel:+79202136645" class="phone">+7 920 213 66 45</a>
                        <div class="work_day">
                            пн-пт 10:00 - 20:00&nbsp;&nbsp; сб-вс 11:00 - 18:00
                        </div>
                    </div>
                </div>
                <!-- row bottom -->
                <div class="row bottom">
                    <!-- Map -->
                    <div class="map">
                        @if(app()->environment('production'))
                            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A50586e7cba09cfae1a9b567d1b4a82886fc17a59ff70c5d3e8229adfe0c001b5&amp;source=constructor" width="100%" height="100%" frameborder="0" loading="lazy"></iframe>
                        @endif
                    </div>
                    <!-- Location -->
                    <ul class="location">
                        <li>
                            г. Воронеж,<br>
                            п-т Патриотов 49Б/3<br>
                        </li>
                        {{--<li>
                            ООО «ГУД-СТОУН» <br>
                            ИНН/КПП 9725012747/772501001 <br>
                            ОГРН 1197746370524 <br>
                        </li>--}}
                    </ul>
                    <!-- Social networks -->
                    <ul class="social_networks">
                        <li>
                            Напишите нам, если у вас есть вопросы или предложения <br>
                            <a href="mailto:info@akwagarant.ru">info@akwagarant.ru</a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/@akwagarant" target="_blank" rel="noopener">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="none">
                                    <rect width="24" height="24" rx="6" fill="#2196F3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0224 6.35806C18.6886 6.5613 19.2145 7.14194 19.3898 7.87742C19.7142 9.2129 19.7142 12 19.7142 12C19.7142 12 19.7142 14.7871 19.3986 16.1226C19.2145 16.8677 18.6973 17.4484 18.0311 17.6419C16.8214 18 11.9999 18 11.9999 18C11.9999 18 7.1785 18 5.97751 17.6419C5.31131 17.4387 4.78534 16.8581 4.61001 16.1226C4.28564 14.7871 4.28564 12 4.28564 12C4.28564 12 4.28564 9.2129 4.60124 7.87742C4.78564 7.13225 5.30254 6.55161 5.96878 6.35806C7.1785 6 11.9999 6 11.9999 6C11.9999 6 16.8214 6 18.0224 6.35806Z" fill="white"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5714 12L10.2856 13.7143V10.2857L14.5714 12Z" fill="#2196F3"/>
                                </svg>
                            </a>
                            <a href="https://vk.com/akwagarant" target="_blank" rel="noopener">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="#2196F3" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_footer)">
                                    <path d="M0 11.5C0 6.07885 0 3.36827 1.68413 1.68413C3.36827 0 6.07885 0 11.5 0H12.5C17.9212 0 20.6318 0 22.3158 1.68413C24 3.36827 24 6.07885 24 11.5V12.5C24 17.9212 24 20.6318 22.3158 22.3158C20.6318 24 17.9212 24 12.5 24H11.5C6.07885 24 3.36827 24 1.68413 22.3158C0 20.6318 0 17.9212 0 12.5L0 11.5Z" fill="#2196F3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.50045 7.5H4.75005C4.24993 7.5 4.1499 7.7354 4.1499 7.9949C4.1499 8.45845 4.74333 10.7574 6.913 13.798C8.35945 15.8744 10.3974 17 12.2518 17C13.3645 17 13.5021 16.75 13.5021 16.3194V14.75C13.5021 14.25 13.6075 14.1502 13.9598 14.1502C14.2195 14.1502 14.6645 14.28 15.703 15.2812C16.8899 16.4677 17.0855 17 17.7531 17H19.5035C20.0036 17 20.2537 16.75 20.1094 16.2567C19.9516 15.765 19.3849 15.0515 18.633 14.2059C18.225 13.7238 17.6131 13.2047 17.4276 12.9451C17.168 12.6114 17.2422 12.4631 17.4276 12.1665C17.4276 12.1665 19.5602 9.16295 19.7828 8.1433C19.894 7.77245 19.7828 7.5 19.2534 7.5H17.503C17.058 7.5 16.8528 7.7354 16.7415 7.9949C16.7415 7.9949 15.8514 10.1641 14.5904 11.5732C14.1824 11.981 13.9969 12.1108 13.7744 12.1108C13.6631 12.1108 13.5021 11.981 13.5021 11.6103V8.1433C13.5021 7.6983 13.3729 7.5 13.002 7.5H10.2513C9.9732 7.5 9.8059 7.7065 9.8059 7.90225C9.8059 8.32405 10.4364 8.42135 10.5014 9.6079V12.185C10.5014 12.75 10.3993 12.8525 10.1768 12.8525C9.5834 12.8525 8.13995 10.6736 7.28385 8.18035C7.1161 7.69575 6.9478 7.5 6.50045 7.5Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_footer">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                            <a href="https://t.me/akwagarant" target="_blank" rel="noopener">
                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="48" height="48" rx="12" fill="#2196F3"/>
                                    <path d="M16 14v20l16-10-16-10z" fill="white"/>
                                    <circle cx="32" cy="16" r="2" fill="white"/>
                                </svg>
                            </a>
                            <a href="https://rutube.ru/channel/43603810/" target="_blank" rel="noopener">
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
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Footer bottom links -->
            <div class="footer_bottom_links">
                <a href="{{ route('showPolicyPage') }}">Политика конфиденциальности</a>
                <a href="{{ route('showPersonalDataPage') }}">Обработка персональных данных</a>
            </div>
        </footer>
    </div>

    <!-- Modal -->
    <div class="modal" id="myModal">
        <div class="modal_close" id="closeModal">
            <svg role="presentation" class="t-popup__close-icon" width="23px" height="23px" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill="#cfa382" fill-rule="evenodd"> <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> </g> </svg>
        </div>
        <form class="modal_container" id="consultationForm">
            <div class="modal_title">Получить консультацию</div>
            <input type="text" name="website" style="display:none;" tabindex="-1" autocomplete="off">
            <div class="inputs">
                <input type="text" name="name" id="consultationFormName" placeholder="Имя">
                <input id="consultationFormPhone" type="tel" placeholder="Телефон (например: 9851234567)"/>
            </div>
            <div class="options">
                <div class="item_title">Предпочитаемый способ связи:</div>
                <div class="inputs">
                    <label for="tel_modal"><input type="checkbox" id="tel_modal"><span>Позвонить</span></label>
                    <label for="max"><input type="checkbox" id="max"><span>Написать Max</span></label>
                    <label for="telegram"><input type="checkbox" id="telegram"><span>Написать Telegram</span></label>
                </div>
            </div>
            <div class="terms consent_row" style="margin-bottom:10px;">
                <label class="consent_label">
                    <input type="checkbox" id="consultationFormConsent" class="consent_checkbox">
                    <span>Даю согласие на обработку своих персональных данных в соответствии с <a href="{{ route('showPolicyPage') }}" target="_blank" class="consent_link">политикой конфиденциальности</a>.</span>
                </label>
                <div id="consultationFormConsentError" class="consent_error" style="display:none;">Необходимо дать согласие на обработку персональных данных</div>
            </div>
            <a href="#" class="order_btn" id="consultationFormSubmit">Получить консультацию</a>
            <div id="consultationFormMessage" style="display:none; margin-top:10px; color:#4caf50; font-weight:500;"></div>
        </form>
    </div>

    <!-- Cart notification -->
    <div class="notice-add-item-in-cart" style="display:none;">Товар добавлен в корзину</div>
    <!-- Meeting/Consultation success popup -->
    <div id="meeting-success-popup-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.4); z-index:9998;"></div>
    <div id="meeting-success-popup" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%,-50%); z-index:9999; background:#fff; border-radius:12px; box-shadow:0 8px 40px rgba(0,0,0,0.18); padding:40px 48px; text-align:center; max-width:420px; width:90%;">
        <div style="font-size:20px; font-weight:700; color:#222; margin-bottom:12px;">Заявка принята!</div>
        <div style="font-size:15px; color:#555;">В ближайшее время менеджер свяжется с вами.</div>
    </div>
    <!-- Scripts -->
    @vite(['resources/sass/main.scss', 'resources/js/site.js'])
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
