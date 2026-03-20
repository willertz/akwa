<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <meta name="description" content="{{$description}}">

    <!-- Style -->
    <link rel="stylesheet"  href="/assets/css/main.css">
    <!-- Swiper js -->
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Light nanogallery2 -->
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css" />

    <!-- Tel -->
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css"/>

</head>
<body>

<!-- wrapper -->
<div class="wrapper">
    <!-- Header -->
    <header>
        <!-- row -->
        <div class="row">
            <!-- Header logo -->
            <a href="/" class="header_logo">
                <!-- img -->
                <img src="/assets/img/header_logo.png" alt="">
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
                        <a href="/objects">
                            объекты
                        </a>
                    </li>
                    <li>
                        <a href="{{route('showArticlesListPage')}}">
                            Статьи
                        </a>
                    </li>
                    <li>
                        <a href="{{route('showPricePage')}}">
                            Цены
                        </a>
                    </li>
                    <li>
                        <a href="{{route('showContactPage')}}">
                            Контакты
                        </a>
                    </li>
                    <li>
                        <a href="{{route('showShopHeadPage')}}">
                            Интернет-магазин
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- Number and help button -->
            <div class="help_item" id="help_item">
                <!-- phone number -->
                <a href="tel:+79036516410" class="phone_number">+79036516410</a>
                <!-- Consultation btn -->
                <a href="#" class="const_btn" data-modal="consultation">получить консультацию</a>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="hero">
        <!-- video item -->
        <div class="video_item">
            <video autoplay loop muted playsinline>
                <source src="/assets/img/hero_video0.mp4" type="video/mp4">
            </video>
        </div>

        <!-- Dark overlay -->
        <div class="dark_overlay"></div>

        <!-- container -->
        <div class="container">
            <!-- Item information -->
            <div class="info_row">
                <!-- hero title -->
                <h2 class="hero_title">
                    Проектирование и монтаж систем отопления в Воронеже.
                </h2>

                <!-- Show me price btn -->
                <a href="#" data-modal="consultation" class="price_btn">рассчитать стоимость</a>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="services">
        <!-- container -->
        <div class="container">

            <!-- Section title -->
            <div class="section_title">Наши услуги</div>


            <!-- Wheel container -->
            <div class="wheel-container">
                <div class="center-logo active">
                    <!-- Logo item -->
                    <div class="logo_item active">
                        <img src="/assets/img/half_logo.png" alt="Icons">
                        <h3>Инженерный <br> центр<br>Аквагарант</h3>
                    </div>

                    <!-- Service information item -->
                    <div class="service_info" info-item="1">
                        <!-- item title -->
                        <div class="item_title">
                            Создание и ремонт объектов недвижимости
                        </div>
                        <!-- Item information -->
                        <div class="item_information">
                            Преобразуем ваши идеи в технологичную реальность благодаря команде профи в строительстве и отделке. Проектируем, строим и реконструируем объекты недвижимости, соблюдая высочайшие стандарты качества и применяя передовые технологии. Добиваемся безупречности результатов в кратчайшие сроки.
                        </div>
                    </div>
                    <!-- Service information item -->
                    <div class="service_info" info-item="2">
                        <!-- item title -->
                        <div class="item_title">
                            Производственные компании
                        </div>
                        <!-- Item information -->
                        <div class="item_information">
                            Инвестируем в мебельные и смежные с ними производства, обеспечивая своим клиентам доступ к высококачественной продукции без длительного ожидания. Постоянно развиваемся и ищем надёжных партнёров для повышения скорости обработки запросов заказчиков.
                        </div>
                    </div>
                    <!-- Service information item -->
                    <div class="service_info" info-item="3">
                        <!-- item title -->
                        <div class="item_title">
                            Работа с партнёрами и девелоперами
                        </div>
                        <!-- Item information -->
                        <div class="item_information">
                            Объединяем усилия с ведущими агентствами недвижимости, риэлторами, застройщиками и инвесторами, чтобы быстрее и эффективнее достигать общих целей. Предлагаем профессиональную поддержку и ценные консультации. Будем рады видеть вас среди своих партнёров, если наше видение успешной работы не расходится с вашим
                        </div>
                    </div>
                    <!-- Service information item -->
                    <div class="service_info" info-item="4">
                        <!-- item title -->
                        <div class="item_title">
                            Дизайн премиальных интерьеров
                        </div>
                        <!-- Item information -->
                        <div class="item_information">
                            Предлагаем уникальное сочетание эффектного дизайна, продуманных решений и масштабного опыта по их реализации. Превращаем мечты в реальность, создавая стильные и функциональные интерьеры в любом пространстве. Берем на себя полный цикл генподрядных работ, предлагая интегрированные решения в области частного строительства.
                        </div>
                    </div>
                    <!-- Service information item -->
                    <div class="service_info" info-item="5">
                        <!-- item title -->
                        <div class="item_title">
                            Предпродажная планировка
                        </div>
                        <!-- Item information -->
                        <div class="item_information">
                            Знаем, как важна упаковка проекта, и умеем представить ваш объект в выгодном свете. Проводим профессиональный клининг, стильное оформление и профессиональную фотосессию, что позволяет вам быстро и выгодно продать свою недвижимость. Избавляем от длительного ожидания покупателей и помогаем оптимизировать продажи
                        </div>
                    </div>
                    <!-- Service information item -->
                    <div class="service_info" info-item="6">
                        <!-- item title -->
                        <div class="item_title">
                            Умное управление проектами
                        </div>
                        <!-- Item information -->
                        <div class="item_information">
                            Берем на себя абсолютно все организационные вопросы по вашей недвижимости – от согласований проектных решений до поставки кухонной мебели. Координируем работу подрядчиков, обеспечиваем бесперебойное функционирование проекта и гарантируем его успешную реализацию в сжатые сроки. Снимаем с вас любые заботы о недвижимости.
                        </div>
                    </div>
                    <!-- Service information item -->
                    <div class="service_info" info-item="7">
                        <!-- item title -->
                        <div class="item_title">
                            Создание и ремонт объектов недвижимости
                        </div>
                        <!-- Item information -->
                        <div class="item_information">
                            Предлагаем интеллектуальные решения для владельцев земельных участков. Проводим комплексный анализ на местности, разрабатываем генпланы, осуществляем проектирование с учетом всех необходимых норм и требований. Помогаем просчитать и оптимизировать затраты, чтобы получить максимальную прибыль от проекта.
                        </div>
                    </div>
                    <!-- Service information item -->
                    <div class="service_info" info-item="8">
                        <!-- item title -->
                        <div class="item_title">
                            Создание и ремонт объектов недвижимости
                        </div>
                        <!-- Item information -->
                        <div class="item_information">
                            Преобразуем ваши идеи в технологичную реальность благодаря команде профи в строительстве и отделке. Проектируем, строим и реконструируем объекты недвижимости, соблюдая высочайшие стандарты качества и применяя передовые технологии. Добиваемся безупречности результатов в кратчайшие сроки.
                        </div>
                    </div>
                </div>


                <div class="service s7 end" main-item="6">
                    <img src="/img/1981.jpeg" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style=""><path d="M21 14V16.2C21 17.8802 21 18.7202 20.673 19.362C20.3854 19.9265 19.9265 20.3854 19.362 20.673C18.7202 21 17.8802 21 16.2 21H14M10 3H7.8C6.11984 3 5.27976 3 4.63803 3.32698C4.07354 3.6146 3.6146 4.07354 3.32698 4.63803C3 5.27976 3 6.11984 3 7.8V10M15 9L21 3M21 3H15M21 3V9M9 15L3 21M3 21H9M3 21L3 15" stroke="black" stroke-linecap="round" stroke-linejoin="round" class="MPaMxNWI_0"></path><style data-made-with="vivus-instant">.MPaMxNWI_0{stroke-dasharray:67 69;stroke-dashoffset:68;animation:MPaMxNWI_draw_0 5200ms linear 0ms infinite,MPaMxNWI_fade 5200ms linear 0ms infinite;}@keyframes MPaMxNWI_draw{100%{stroke-dashoffset:0;}}@keyframes MPaMxNWI_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}@keyframes MPaMxNWI_draw_0{15.384615384615385%{stroke-dashoffset: 68}53.84615384615385%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}</style></svg>
                    <div class="item_title half">
                            <span>
                                Монтаж <br> отопления
                            </span>
                        <p>Умное управление <br> проектами</p>

                        <!-- Item info -->
                        <ul class="item_info">
                            <!-- text -->
                            <li>
                                <a href="/blog/montaj-teplogo-pola">Монтаж тёплых полов</a>
                            </li>
                            <li>
                                <a href="/blog/montaj-radiatorov-otopleniya">Монтаж радиаторов отопления</a>
                            </li>
                            <li>
                                <a href="/blog/vnutripolnyiy-konvektor">Монтаж внутрипольных конвекторов</a>
                            </li>
                            <li>
                                <a  href="/blog/prokladka-trub-otopleniya">Прокладка труб отопления</a>
                            </li>
                            <li>
                                <a href="/blog/montaj-polotentsesushitelya">Монтаж полотенцесушителей</a>
                            </li>
                        </ul>
                        <a class="more-service-btn" href="#">подробнее
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="4" y1="12" x2="20" y2="12" stroke="#FF6B35" stroke-width="2" stroke-linecap="round"/>
                                <path d="M13 5L20 12L13 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="service s2" main-item="1">
                    <img src="/img/1982.jpeg" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style=""><path d="M19 4.5C19 4.96466 19 5.19698 18.9616 5.39018C18.8038 6.18356 18.1836 6.80376 17.3902 6.96157C17.197 7 16.9647 7 16.5 7H5.5C5.03534 7 4.80302 7 4.60982 6.96157C3.81644 6.80376 3.19624 6.18356 3.03843 5.39018C3 5.19698 3 4.96466 3 4.5C3 4.03534 3 3.80302 3.03843 3.60982C3.19624 2.81644 3.81644 2.19624 4.60982 2.03843C4.80302 2 5.03534 2 5.5 2H16.5C16.9647 2 17.197 2 17.3902 2.03843C18.1836 2.19624 18.8038 2.81644 18.9616 3.60982C19 3.80302 19 4.03534 19 4.5ZM19 4.5C19.9319 4.5 20.3978 4.5 20.7654 4.65224C21.2554 4.85523 21.6448 5.24458 21.8478 5.73463C22 6.10218 22 6.56812 22 7.5V7.8C22 8.9201 22 9.48016 21.782 9.90798C21.5903 10.2843 21.2843 10.5903 20.908 10.782C20.4802 11 19.9201 11 18.8 11H15.2C14.0799 11 13.5198 11 13.092 11.218C12.7157 11.4097 12.4097 11.7157 12.218 12.092C12 12.5198 12 13.0799 12 14.2V15M11.6 22H12.4C12.9601 22 13.2401 22 13.454 21.891C13.6422 21.7951 13.7951 21.6422 13.891 21.454C14 21.2401 14 20.9601 14 20.4V16.6C14 16.0399 14 15.7599 13.891 15.546C13.7951 15.3578 13.6422 15.2049 13.454 15.109C13.2401 15 12.9601 15 12.4 15H11.6C11.0399 15 10.7599 15 10.546 15.109C10.3578 15.2049 10.2049 15.3578 10.109 15.546C10 15.7599 10 16.0399 10 16.6V20.4C10 20.9601 10 21.2401 10.109 21.454C10.2049 21.6422 10.3578 21.7951 10.546 21.891C10.7599 22 11.0399 22 11.6 22Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" class="NhvgFXHy_0"></path><style data-made-with="vivus-instant">.NhvgFXHy_0{stroke-dasharray:80 82;stroke-dashoffset:81;animation:NhvgFXHy_draw_0 5200ms linear 0ms infinite,NhvgFXHy_fade 5200ms linear 0ms infinite;}@keyframes NhvgFXHy_draw{100%{stroke-dashoffset:0;}}@keyframes NhvgFXHy_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}@keyframes NhvgFXHy_draw_0{15.384615384615385%{stroke-dashoffset: 81}53.84615384615385%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}</style></svg>
                    <div class="item_title">
                            <span>
                                Монтаж <br> снеготаяния
                            </span>
                        <!-- Item info -->
                        <ul class="item_info">
                            <!-- text -->
                            <li>
                                Подогрев уличных дорожек
                            </li>
                            <li>
                                Расчёт мощности системы снеготаяния
                            </li>
                            <li>
                                Автоматика для системы снеготаяния
                            </li>
                        </ul>
                        <p>Создание и ремонт <br>объектов недвижимости</p>
                        <a href="#">подробнее
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="4" y1="12" x2="20" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M13 5L20 12L13 19" stroke="#FF6B35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="service s4" main-item="3">
                    <img src="/img/1983.png" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style=""><path d="M12 3H16.2C17.8802 3 18.7202 3 19.362 3.32698C19.9265 3.6146 20.3854 4.07354 20.673 4.63803C21 5.27976 21 6.11984 21 7.8V16.2C21 17.8802 21 18.7202 20.673 19.362C20.3854 19.9265 19.9265 20.3854 19.362 20.673C18.7202 21 17.8802 21 16.2 21H7.8C6.11984 21 5.27976 21 4.63803 20.673C4.07354 20.3854 3.6146 19.9265 3.32698 19.362C3 18.7202 3 17.8802 3 16.2V12M8 13V17M16 11V17M12 7V17M2 5L5 2M5 2L8 5M5 2L5 8" stroke="black" stroke-linecap="round" stroke-linejoin="round" class="yRiivwle_0"></path><style data-made-with="vivus-instant">.yRiivwle_0{stroke-dasharray:85 87;stroke-dashoffset:86;animation:yRiivwle_draw_0 5200ms linear 0ms infinite,yRiivwle_fade 5200ms linear 0ms infinite;}@keyframes yRiivwle_draw{100%{stroke-dashoffset:0;}}@keyframes yRiivwle_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}@keyframes yRiivwle_draw_0{15.384615384615385%{stroke-dashoffset: 86}53.84615384615385%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}</style></svg>
                    <div class="item_title">
                            <span>
                                Монтаж <br> септиков
                            </span>
                        <p>Работа с партнерами <br>и девелоперами</p>

                        <!-- Item info -->
                        <ul class="item_info">
                            <li><a href="/blog/montaj-septikov">Монтаж автономных канализационных станций</a></li>
                            <li><a href="/blog/pravilnyiy-montaj-kanalizatsii">Монтаж труб канализации</a></li>
                            <li><a href="/blog/zemlyanyie-rabotyi">Земляные работы</a></li>
                        </ul>
                        <a href="#">подробнее
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="4" y1="12" x2="20" y2="12" stroke="#FF6B35" stroke-width="2" stroke-linecap="round"/>
                                <path d="M13 5L20 12L13 19" stroke="#FF6B35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="service s6 end" main-item="5">
                    <img src="/img/1984.jpeg" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style=""><path d="M18 13L16.7004 6.50182C16.6278 6.13883 16.5915 5.95733 16.5032 5.80953C16.4252 5.67886 16.3183 5.56773 16.1908 5.4846C16.0466 5.39057 15.8667 5.34714 15.5069 5.26028L2 2M2 2L5.26028 15.5069C5.34714 15.8667 5.39057 16.0466 5.4846 16.1908C5.56773 16.3183 5.67886 16.4252 5.80953 16.5032C5.95733 16.5915 6.13883 16.6278 6.50182 16.7004L13 18M2 2L9.586 9.586M16.1314 20.8686L20.8686 16.1314C21.2646 15.7354 21.4627 15.5373 21.5368 15.309C21.6021 15.1082 21.6021 14.8918 21.5368 14.691C21.4627 14.4627 21.2646 14.2646 20.8686 13.8686L20.1314 13.1314C19.7354 12.7354 19.5373 12.5373 19.309 12.4632C19.1082 12.3979 18.8918 12.3979 18.691 12.4632C18.4627 12.5373 18.2646 12.7354 17.8686 13.1314L13.1314 17.8686C12.7354 18.2646 12.5373 18.4627 12.4632 18.691C12.3979 18.8918 12.3979 19.1082 12.4632 19.309C12.5373 19.5373 12.7354 19.7354 13.1314 20.1314L13.8686 20.8686C14.2646 21.2646 14.4627 21.4627 14.691 21.5368C14.8918 21.6021 15.1082 21.6021 15.309 21.5368C15.5373 21.4627 15.7354 21.2646 16.1314 20.8686ZM13 11C13 12.1046 12.1046 13 11 13C9.89543 13 9 12.1046 9 11C9 9.89543 9.89543 9 11 9C12.1046 9 13 9.89543 13 11Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" class="KQlmQEgg_0"></path><style data-made-with="vivus-instant">.KQlmQEgg_0{stroke-dasharray:95 97;stroke-dashoffset:96;animation:KQlmQEgg_draw_0 5200ms linear 0ms infinite,KQlmQEgg_fade 5200ms linear 0ms infinite;}@keyframes KQlmQEgg_draw{100%{stroke-dashoffset:0;}}@keyframes KQlmQEgg_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}@keyframes KQlmQEgg_draw_0{15.384615384615385%{stroke-dashoffset: 96}53.84615384615385%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}</style></svg>
                    <div class="item_title half">
                            <span>
                                Монтаж <br> котельных
                            </span>
                        <p>Предпродажная <br> планировка</p>
                        <!-- Item info -->
                        <ul class="item_info">
                            <li><a href="/blog/montaj-kotlov">Монтаж котлов отопления</a></li>
                            <li><a href="/blog/montaj-boylera">Монтаж бойлеров</a></li>
                            <li><a href="/blog/pusko-naladka-kotelnoy">Пуско-наладочные работы</a></li>
                        </ul>
                        <a href="#">подробнее
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="4" y1="12" x2="20" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M13 5L20 12L13 19" stroke="#FF6B35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="service s3" main-item="2">
                    <img src="/img/1985.jpeg" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style=""><path d="M9.3951 19.3711L9.97955 20.6856C10.1533 21.0768 10.4368 21.4093 10.7958 21.6426C11.1547 21.8759 11.5737 22.0001 12.0018 22C12.4299 22.0001 12.8488 21.8759 13.2078 21.6426C13.5667 21.4093 13.8503 21.0768 14.024 20.6856L14.6084 19.3711C14.8165 18.9047 15.1664 18.5159 15.6084 18.26C16.0532 18.0034 16.5678 17.8941 17.0784 17.9478L18.5084 18.1C18.9341 18.145 19.3637 18.0656 19.7451 17.8713C20.1265 17.6771 20.4434 17.3763 20.6573 17.0056C20.8715 16.635 20.9735 16.2103 20.9511 15.7829C20.9286 15.3555 20.7825 14.9438 20.5307 14.5978L19.684 13.4344C19.3825 13.0171 19.2214 12.5148 19.224 12C19.2239 11.4866 19.3865 10.9864 19.6884 10.5711L20.5351 9.40778C20.787 9.06175 20.933 8.65007 20.9555 8.22267C20.978 7.79528 20.8759 7.37054 20.6618 7C20.4479 6.62923 20.131 6.32849 19.7496 6.13423C19.3681 5.93997 18.9386 5.86053 18.5129 5.90556L17.0829 6.05778C16.5722 6.11141 16.0577 6.00212 15.6129 5.74556C15.17 5.48825 14.82 5.09736 14.6129 4.62889L14.024 3.31444C13.8503 2.92317 13.5667 2.59072 13.2078 2.3574C12.8488 2.12408 12.4299 1.99993 12.0018 2C11.5737 1.99993 11.1547 2.12408 10.7958 2.3574C10.4368 2.59072 10.1533 2.92317 9.97955 3.31444L9.3951 4.62889C9.18803 5.09736 8.83798 5.48825 8.3951 5.74556C7.95032 6.00212 7.43577 6.11141 6.9251 6.05778L5.49066 5.90556C5.06499 5.86053 4.6354 5.93997 4.25397 6.13423C3.87255 6.32849 3.55567 6.62923 3.34177 7C3.12759 7.37054 3.02555 7.79528 3.04804 8.22267C3.07052 8.65007 3.21656 9.06175 3.46844 9.40778L4.3151 10.5711C4.61704 10.9864 4.77964 11.4866 4.77955 12C4.77964 12.5134 4.61704 13.0137 4.3151 13.4289L3.46844 14.5922C3.21656 14.9382 3.07052 15.3499 3.04804 15.7773C3.02555 16.2047 3.12759 16.6295 3.34177 17C3.55589 17.3706 3.8728 17.6712 4.25417 17.8654C4.63554 18.0596 5.06502 18.1392 5.49066 18.0944L6.92066 17.9422C7.43133 17.8886 7.94587 17.9979 8.39066 18.2544C8.83519 18.511 9.18687 18.902 9.3951 19.3711Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" class="jbdVYACh_0"></path><path d="M12 15C13.6568 15 15 13.6569 15 12C15 10.3431 13.6568 9 12 9C10.3431 9 8.99998 10.3431 8.99998 12C8.99998 13.6569 10.3431 15 12 15Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" class="jbdVYACh_1"></path><style data-made-with="vivus-instant">.jbdVYACh_0{stroke-dasharray:67 69;stroke-dashoffset:68;animation:jbdVYACh_draw_0 5200ms linear 0ms infinite,jbdVYACh_fade 5200ms linear 0ms infinite;}.jbdVYACh_1{stroke-dasharray:19 21;stroke-dashoffset:20;animation:jbdVYACh_draw_1 5200ms linear 0ms infinite,jbdVYACh_fade 5200ms linear 0ms infinite;}@keyframes jbdVYACh_draw{100%{stroke-dashoffset:0;}}@keyframes jbdVYACh_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}@keyframes jbdVYACh_draw_0{15.384615384615385%{stroke-dashoffset: 68}53.84615384615385%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}@keyframes jbdVYACh_draw_1{34.61538461538461%{stroke-dashoffset: 20}73.07692307692307%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}</style></svg>
                    <div class="item_title">
                            <span>
                                Сантехнические <br> работы
                            </span>
                        <p>Производственные<br> компании</p>
                        <!-- Item info -->
                        <ul class="item_info">
                            <li><a href="/blog/ustanovka-santehniki">Монтаж смесителей</a></li>
                            <li><a href="/blog/ustanovka-santehniki">Монтаж раковин</a></li>
                            <li><a href="/blog/ustanovka-santehniki">Монтаж унитазов</a></li>
                        </ul>
                        <a href="#">подробнее
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="4" y1="12" x2="20" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M13 5L20 12L13 19" stroke="#FF6B35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="service s5 half" main-item="4">
                    <img src="/img/1986.png" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style=""><path d="M10 7L3 7M21 7L14 7M14 7.25195C17.4505 8.14004 20 11.2722 20 14.9999M4 14.9999C4 11.2722 6.54955 8.14004 10 7.25195M3.6 19H4.4C4.96005 19 5.24008 19 5.45399 18.891C5.64215 18.7951 5.79513 18.6422 5.89101 18.454C6 18.2401 6 17.9601 6 17.4V16.6C6 16.0399 6 15.7599 5.89101 15.546C5.79513 15.3578 5.64215 15.2049 5.45399 15.109C5.24008 15 4.96005 15 4.4 15H3.6C3.03995 15 2.75992 15 2.54601 15.109C2.35785 15.2049 2.20487 15.3578 2.10899 15.546C2 15.7599 2 16.0399 2 16.6V17.4C2 17.9601 2 18.2401 2.10899 18.454C2.20487 18.6422 2.35785 18.7951 2.54601 18.891C2.75992 19 3.03995 19 3.6 19ZM11.6 9H12.4C12.9601 9 13.2401 9 13.454 8.89101C13.6422 8.79513 13.7951 8.64215 13.891 8.45399C14 8.24008 14 7.96005 14 7.4V6.6C14 6.03995 14 5.75992 13.891 5.54601C13.7951 5.35785 13.6422 5.20487 13.454 5.10899C13.2401 5 12.9601 5 12.4 5H11.6C11.0399 5 10.7599 5 10.546 5.10899C10.3578 5.20487 10.2049 5.35785 10.109 5.54601C10 5.75992 10 6.03995 10 6.6V7.4C10 7.96005 10 8.24008 10.109 8.45399C10.2049 8.64215 10.3578 8.79513 10.546 8.89101C10.7599 9 11.0399 9 11.6 9ZM19.6 19H20.4C20.9601 19 21.2401 19 21.454 18.891C21.6422 18.7951 21.7951 18.6422 21.891 18.454C22 18.2401 22 17.9601 22 17.4V16.6C22 16.0399 22 15.7599 21.891 15.546C21.7951 15.3578 21.6422 15.2049 21.454 15.109C21.2401 15 20.9601 15 20.4 15H19.6C19.0399 15 18.7599 15 18.546 15.109C18.3578 15.2049 18.2049 15.3578 18.109 15.546C18 15.7599 18 16.0399 18 16.6V17.4C18 17.9601 18 18.2401 18.109 18.454C18.2049 18.6422 18.3578 18.7951 18.546 18.891C18.7599 19 19.0399 19 19.6 19ZM22 7C22 7.55228 21.5523 8 21 8C20.4477 8 20 7.55228 20 7C20 6.44772 20.4477 6 21 6C21.5523 6 22 6.44772 22 7ZM4 7C4 7.55228 3.55228 8 3 8C2.44772 8 2 7.55228 2 7C2 6.44772 2.44772 6 3 6C3.55228 6 4 6.44772 4 7Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" class="plybgvCe_0"></path><style data-made-with="vivus-instant">.plybgvCe_0{stroke-dasharray:91 93;stroke-dashoffset:92;animation:plybgvCe_draw_0 5200ms linear 0ms infinite,plybgvCe_fade 5200ms linear 0ms infinite;}@keyframes plybgvCe_draw{100%{stroke-dashoffset:0;}}@keyframes plybgvCe_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}@keyframes plybgvCe_draw_0{15.384615384615385%{stroke-dashoffset: 92}53.84615384615385%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}</style></svg>
                    <div class="item_title top">
                            <span>
                                Проектирование <br> работы
                            </span>
                        <p>Дизайн премиальных <br> интерьеров</p>
                        <!-- Item info -->
                        <ul class="item_info">
                            <!-- text -->
                            <li>
                                проектирование системы отопления
                            </li>
                            <li>
                                проектирование водопровода
                            </li>
                            <li>
                                проектирование канализации
                            </li>
                            <li>
                                расчёт теплопотерь здания
                            </li>
                            <li>
                                гидравлические расчёты
                            </li>
                        </ul>
                        <a href="#">подробнее
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="4" y1="12" x2="20" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M13 5L20 12L13 19" stroke="#FF6B35" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Our Company -->
    <section class="company parallax-window" data-parallax="scroll" data-image-src="assets/img/info_photo.jpg">

        <!-- row -->
        <div class="row" id="container">
            <!-- Left item -->
            <div class="left_item">
                <!-- Left logo -->
                <a href="/" class="left_logo">
                    <img src="assets/img/half_logo.png" alt="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="800" height="120" viewBox="0 0 800 120">
                        <style>
                            text {
                                font-family: "Sovest", Arial, sans-serif;
                                font-size: 100px;
                                fill: none;
                                stroke: #000;
                                stroke-width: 2;
                                stroke-linejoin: round;
                                stroke-dasharray: 600;
                                stroke-dashoffset: 600;
                                animation: draw 3s linear infinite;
                                text-transform: uppercase;
                            }
                            @keyframes draw {
                                0% {
                                    stroke-dashoffset: 600;
                                }
                                50% {
                                    stroke-dashoffset: 0;
                                }
                                100% {
                                    stroke-dashoffset: 600;
                                }
                            }
                        </style>
                        <text x="50%" y="85" dominant-baseline="middle" text-anchor="middle">Аквагарант</text>
                    </svg>
                    <div class="section_title">Аквагарант</div>
                </a>
                <!-- Company advantages -->
                <ul class="comp_adv">
                    <!-- Info item -->
                    <li>
                        <!-- Item title -->
                        <span class="item_title">
                                250+
                            </span>
                        <!-- Description -->
                        <div class="item_desc">
                            Домов
                        </div>
                    </li>
                    <!-- Info item -->
                    <li>
                        <!-- Item title -->
                        <span class="item_title">
                                110
                            </span>
                        <!-- Description -->
                        <div class="item_desc">
                            Квартир
                        </div>
                    </li>
                    <!-- Info item -->
                    <li>
                        <!-- Item title -->
                        <span class="item_title">
                                13
                            </span>
                        <!-- Description -->
                        <div class="item_desc">
                            лет на рынке
                        </div>
                    </li>
                    <!-- Info item -->
                    <li>
                        <!-- Item title -->
                        <span class="item_title">
                                24/7
                            </span>
                        <!-- Description -->
                        <div class="item_desc">
                            техподдержка
                        </div>
                    </li>
                    <!-- Info item -->
                    <li>
                        <!-- Item title -->
                        <span class="item_title">
                                15
                            </span>
                        <!-- Description -->
                        <div class="item_desc">
                            сотрудников
                        </div>
                    </li>
                </ul>

            </div>
            <!-- Right item -->
            <div class="right_item">
                <!-- o nas -->
                <ul class="item_description">
                    <li class="right_title one">
                        О нас
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                Входим в топ 3 компаний Воронежа по уровню эстетики монтажа и понимания систем отопления
                            </span>
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                Собственный проектный отдел
                            </span>
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                Собственный склад
                            </span>
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                С 2012 года накоплен колоссальный опыт
                            </span>
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                Разработана тройная система контроля качества работ
                            </span>
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                Гарантия 5 лет на все работы
                            </span>
                    </li>
                </ul>
                <ul class="item_description">
                    <li class="right_title">
                        Комфорт в Вашем доме
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                Душ можно принимать часами
                            </span>
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                Управление отоплением через телефон
                            </span>
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                В каждой комнате нужная температура
                            </span>
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                Ежегодное обслуживание Вашей системы
                            </span>
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                Не надо чистить снег во дворе
                            </span>
                    </li>
                    <!-- li -->
                    <li>
                        <span class="circle"></span>
                        <span>
                                В бассейне круглый год комфортная вода
                            </span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <section class="portfolio">
        <!-- container -->
        <div class="container">
            <!-- section title -->
            <div class="section_title">
                ПОРтФОЛИо
            </div>

            <!-- company title -->
            <svg xmlns="http://www.w3.org/2000/svg" width="800" class="company_title" height="120" viewBox="0 0 800 120">
                <style>
                    text {
                        font-family: "Sovest", Arial, sans-serif;
                        font-size: 100px;
                        fill: none;
                        stroke: #fff;
                        stroke-width: 2;
                        stroke-linejoin: round;
                        stroke-dasharray: 600;
                        stroke-dashoffset: 600;
                        animation: draw 3s linear infinite;
                        text-transform: uppercase;
                        margin: 0 auto;
                    }
                    @keyframes draw {
                        0% {
                            stroke-dashoffset: 600;
                        }
                        50% {
                            stroke-dashoffset: 0;
                        }
                        100% {
                            stroke-dashoffset: 600;
                        }
                    }
                </style>
                <text x="50%" y="85" dominant-baseline="middle" text-anchor="middle">Аквагарант</text>
            </svg>


            @foreach($objects as $object)
            <div class="item_swiper">
                <!-- swiper -->
                <div class="swiper swiper-portfolio portfolio_one">
                    <!-- dark overlay -->
                    <div class="dark_overlay"></div>
                    <!-- swiper wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Swiper-slide -->
                        <div class="swiper-slide">
                            <!-- Swiper photo gallery -->
                            <a href="{{route('showObjectPage',[$object->id])}}" class="photo">
                                <img src="{{$object->preview_pict}}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- item texts -->
                    <div class="item_texts">
                        <!-- Item info -->
                        <div class="item_info">
                            <!-- Item title -->
                            <div class="item_title">
                                {{$object->name}}
                            </div>

                        </div>
                        <!-- More btn -->
                        <a href="{{route('showObjectPage',[$object->id])}}" class="more_btn">Подробнее</a>
                    </div>
                </div>
                <!-- Swiper buttons -->
                <div class="swiper_buttons">
                    <!-- left btn -->
                    <div class="l_button">
                        <svg class="t-null__slds-arrow t-null__slds-arrow_1" width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(255, 255, 255);"></path></svg>
                    </div>
                    <!-- right btn -->
                    <div class="r_button">
                        <svg class="t-null__slds-arrow t-null__slds-arrow_1" width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(255, 255, 255);"></path></svg>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>

{{--    <!-- Copleted tasks -->--}}
{{--    <section class="tasks">--}}
{{--        <!-- container -->--}}
{{--        <div class="container">--}}

{{--            <!-- Video title -->--}}
{{--            <div class="video_title">Видео о нас</div>--}}
{{--            <!-- video row -->--}}
{{--            <div class="video_row">--}}

{{--                <!-- video item -->--}}
{{--                <div class="video_item">--}}
{{--                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/pzxUwkLX-1c?list=RDBgBNLX_3afs" title="lost hope. - the beach (slowed + reverb + filtered)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>--}}
{{--                </div>--}}

{{--                <!-- video item -->--}}
{{--                <div class="video_item">--}}
{{--                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/pzxUwkLX-1c?list=RDBgBNLX_3afs" title="lost hope. - the beach (slowed + reverb + filtered)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>--}}
{{--                </div>--}}

{{--                <!-- video item -->--}}
{{--                <div class="video_item">--}}
{{--                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/pzxUwkLX-1c?list=RDBgBNLX_3afs" title="lost hope. - the beach (slowed + reverb + filtered)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>--}}
{{--                </div>--}}

{{--                <!-- video item -->--}}
{{--                <div class="video_item">--}}
{{--                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/pzxUwkLX-1c?list=RDBgBNLX_3afs" title="lost hope. - the beach (slowed + reverb + filtered)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>--}}
{{--                </div>--}}


{{--                <!-- video item -->--}}
{{--                <div class="video_item">--}}
{{--                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/pzxUwkLX-1c?list=RDBgBNLX_3afs" title="lost hope. - the beach (slowed + reverb + filtered)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>--}}
{{--                </div>--}}

{{--                <!-- video item -->--}}
{{--                <div class="video_item">--}}
{{--                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/pzxUwkLX-1c?list=RDBgBNLX_3afs" title="lost hope. - the beach (slowed + reverb + filtered)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            <!-- Button -->--}}
{{--            <a href="/video" class="more_video">--}}
{{--                Больше видео--}}
{{--            </a>--}}

{{--            <!-- Item title -->--}}
{{--            <!-- <div class="comment_title">--}}
{{--                Отзывы наших клиентов--}}
{{--            </div>  -->--}}

{{--            <!-- Followers comments -->--}}
{{--            <div class="comments">--}}
{{--                <!-- comment item -->--}}
{{--                <div class="com_item">--}}
{{--                    <!-- Item description -->--}}
{{--                    <div class="item_desc">--}}
{{--                        Превосходная услуга! Результат оказался даже лучше, чем я ожидал.--}}
{{--                    </div>--}}
{{--                    <!-- Item name -->--}}
{{--                    <div class="item_name">--}}
{{--                        Мария--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- comment item -->--}}
{{--                <div class="com_item">--}}
{{--                    <!-- Item description -->--}}
{{--                    <div class="item_desc">--}}
{{--                        Превосходная услуга! Результат оказался даже лучше, чем я ожидал.--}}
{{--                    </div>--}}
{{--                    <!-- Item name -->--}}
{{--                    <div class="item_name">--}}
{{--                        Мария--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- comment item -->--}}
{{--                <div class="com_item">--}}
{{--                    <!-- Item description -->--}}
{{--                    <div class="item_desc">--}}
{{--                        Превосходная услуга! Результат оказался даже лучше, чем я ожидал.--}}
{{--                    </div>--}}
{{--                    <!-- Item name -->--}}
{{--                    <div class="item_name">--}}
{{--                        Мария--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- comment item -->--}}
{{--                <div class="com_item">--}}
{{--                    <!-- Item description -->--}}
{{--                    <div class="item_desc">--}}
{{--                        Превосходная услуга! Результат оказался даже лучше, чем я ожидал.--}}
{{--                    </div>--}}
{{--                    <!-- Item name -->--}}
{{--                    <div class="item_name">--}}
{{--                        Мария--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- comment item -->--}}
{{--                <div class="com_item">--}}
{{--                    <!-- Item description -->--}}
{{--                    <div class="item_desc">--}}
{{--                        Превосходная услуга! Результат оказался даже лучше, чем я ожидал.--}}
{{--                    </div>--}}
{{--                    <!-- Item name -->--}}
{{--                    <div class="item_name">--}}
{{--                        Мария--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- comment item -->--}}
{{--                <div class="com_item">--}}
{{--                    <!-- Item description -->--}}
{{--                    <div class="item_desc">--}}
{{--                        Превосходная услуга! Результат оказался даже лучше, чем я ожидал.--}}
{{--                    </div>--}}
{{--                    <!-- Item name -->--}}
{{--                    <div class="item_name">--}}
{{--                        Мария--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <!-- our team -->
    <section class="team">
        <!-- container -->
        <div class="container">

            <!-- team item -->
            <div class="team_item first_team">
                <!-- Left side -->
                <div class="left_side">
                    <!-- item title -->
                    <div class="item_title">
                        Команда Аквагарант
                    </div>
                    <!-- item description -->
                    <div class="item_description">
                        В нашем штате 15 человек :
                        директор, проектировщики, менеджеры, бухгалтер и руководители проектов.
                        Нас ценят, за то, что :
                        <ul>
                            <li>
                                ✓ имеем колоссальный опыт
                            </li>
                            <li>
                                ✓ сдаём всё в срок
                            </li>
                            <li>
                                ✓ компания полного цикла
                            </li>
                            <li>
                                ✓ внедряем современные айти решения для поддержания микроклимата в доме
                            </li>
                            <li>
                                ✓ ведём финансовую деятельность через мобильное приложение
                            </li>
                            <li>
                                ✓ которое видит и заказчик по своему проекту.
                            </li>
                        </ul>
                    </div>
                    <!-- BUTTON -->
                    <a href="#" data-modal="consultation" class="much_btn">
                        Подробнее
                    </a>
                </div>
                <!-- Right side -->
                <div class="right_side swiper swiper_team">
                    <!-- swiper wrapper -->
                    <div class="swiper-wrapper">
                        <!-- swiper-slide -->
                        <div class="swiper-slide">
                            <img src="photo_2026-02-01_00-03-10.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>


            <!-- Team row -->
            <div class="team_row">

                <!-- Team item -->
                <div class="team_item current_info">
                    <!-- item head title  -->
                    <div class="item_head step">
                        3 шага к комфорту в Вашем доме
                    </div>
                    <!-- item title and button -->
                    <div class="item_title_btn">
                        <!-- item name -->
                        <div class="item_name">
                            1. Проектирование
                        </div>

                        <!-- Btn -->
                        <a href="#" class="example_btn">
                            Примеры проектов
                        </a>
                    </div>
                    <!-- Item infos -->
                    <div class="team_info">
                        <!-- Left side -->
                        <div class="left_side step">
                            Проекты выполняем в 3D - программа REVIT. <br>
                            В проект включены разделы :
                        </div>
                        <!-- Right side -->
                        <ul class="right_side step">
                            <!-- Text -->
                            <li>
                                -радиаторная система
                            </li>
                            <!-- Text -->
                            <li>
                                -тёплые полы
                            </li>
                            <!-- Text -->
                            <li>
                                -водопроводная система
                            </li>
                            <!-- Text -->
                            <li>
                                -канализация
                            </li>
                            <!-- Text -->
                            <li>
                                -наружние коммуникации
                            </li>
                            <!-- Text -->
                            <li>
                                -теплопотери каждого помещения
                            </li>
                            <!-- Text -->
                            <li>
                                -спецификация
                            </li>
                        </ul>
                    </div>
                    <!-- Team img -->
                    <div class="team_img step">
                        <img src="assets/img/team2.jpg" alt="" class="left_side">
                        <img src="assets/img/team3.png" alt="">
                    </div>
                </div>

                <!-- Team item -->
                <div class="team_item current_info">
                    <!-- item title and button -->
                    <div class="item_title_btn">
                        <!-- item name -->
                        <div class="item_name">
                            2. Реализация проекта
                        </div>

                        <!-- Btn -->
                        <a href="#" data-modal="consultation" class="example_btn">
                            Оставить заявку
                        </a>
                    </div>
                    <!-- Item infos -->
                    <div class="team_info">
                        <!-- Left side -->
                        <div class="left_side step">
                            Мы разработали трёхступенчатую систему проверки качества выполнения работ на объекте. Так же через мобильное приложение заказчик раз в несколько дней получает отчёт о объёме выполненных работ, фото и видео.
                        </div>
                        <!-- Right side -->
                        <ul class="right_side step">
                            <!-- Text -->
                            <li>
                                - во время монтажа используются два документа : дизайн проект и наш инженерный проект
                            </li>
                            <!-- Text -->
                            <li>
                                - перед залитием бетонной стяжки, все трубы опрессовываются проверочным давлением в несколько раз превышающее рабочее
                            </li>
                        </ul>
                    </div>
                    <!-- Team img -->
                    <div class="team_img step">
                        <img src="assets/img/team4.jpg" alt="" class="left_side">
                        <img src="assets/img/team5.jpg" alt="">
                    </div>
                </div>

                <!-- Team item -->
                <div class="team_item current_info">
                    <!-- item title and button -->
                    <div class="item_title_btn">
                        <!-- item name -->
                        <div class="item_name ">
                            3. Установка сантехники
                        </div>

                        <!-- Btn -->
                        <a href="#" data-modal="consultation" class="example_btn">
                            Узнать больше
                        </a>
                    </div>
                    <!-- Item infos -->
                    <div class="team_info">
                        <!-- Left side -->
                        <div class="left_side step">
                            После всех отделочных работ наступает последний этап - монтаж чистовой сантехники, после чего можно заселяться
                        </div>
                        <!-- Right side -->
                        <ul class="right_side step">
                            <!-- Text -->
                            <li>
                                - установка унитазов
                            </li>
                            <!-- Text -->
                            <li>
                                - установка раковин
                            </li>
                            <!-- Text -->
                            <li>
                                - установка смесителей
                            </li>
                            <!-- Text -->
                            <li>
                                - установка зеркал в санузлах
                            </li>
                            <!-- Text -->
                            <li>
                                - установка тумбочек
                            </li>
                            <!-- Text -->
                            <li>
                                - установка ванн
                            </li>
                            <!-- Text -->
                            <li>
                                - установка душевых кабин
                            </li>
                        </ul>
                    </div>
                    <!-- Team img -->
                    <div class="team_img step">
                        <img src="assets/img/team6.jpg" alt="" class="left_side">
                        <img src="assets/img/team7.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row top">
                <!-- Header logo -->
                <a href="index.html" class="header_logo">
                    <img src="assets/img/half_logo.png" alt="">
                    Инженерный центр Аквагарант
                </a>
                <!-- phone  -->
                <div class="work_phone">
                    <a href="tel:+79036516410" class="phone">+79036516410</a>
                    <a href="tel:+79036516410" class="phone">+79202136645</a>
                    <div class="work_day">
                        пн-пт 10:00 - 20:00   сб-вс 11:00 - 18:00
                    </div>
                </div>
            </div>
            <!-- row bottom -->
            <div class="row bottom">
                <!-- Map -->
                <div class="map">
                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ae238225e86a37c4bbb741f797fce1707c4fd222e30cb5ca2d90eef801dc4f548&amp;source=constructor" width="800" height="300" frameborder="0"></iframe>
                </div>
                <!-- Location -->
                <ul class="location">
                    <li>
                        г. Воронеж,<br>
                        пр-т Патриотов 49Б<br>
                    </li>
                </ul>
                <!-- Social networks -->
                <ul class="social_networks">
                    <li>
                        Напишите нам, если у вас есть вопросы или предложения <br>
                        <a href="#"> info@akwagarant.ru</a>
                    </li>
                    <li>
                        <a href="https://youtube.com/@akwagarant?si=3S-3s0rbY037Nu0Y">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" rx="6" fill="#2196F3"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0224 6.35806C18.6886 6.5613 19.2145 7.14194 19.3898 7.87742C19.7142 9.2129 19.7142 12 19.7142 12C19.7142 12 19.7142 14.7871 19.3986 16.1226C19.2145 16.8677 18.6973 17.4484 18.0311 17.6419C16.8214 18 11.9999 18 11.9999 18C11.9999 18 7.1785 18 5.97751 17.6419C5.31131 17.4387 4.78534 16.8581 4.61001 16.1226C4.28564 14.7871 4.28564 12 4.28564 12C4.28564 12 4.28564 9.2129 4.60124 7.87742C4.78534 7.13225 5.30254 6.55161 5.96878 6.35806C7.1785 6 11.9999 6 11.9999 6C11.9999 6 16.8214 6 18.0224 6.35806Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5714 12L10.2856 13.7143V10.2857L14.5714 12Z" fill="#2196F3"/>
                            </svg>
                        </a>
                        <a href="https://vk.com/akwagarant">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="#2196F3" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                    <path d="M0 11.5C0 6.07885 0 3.36827 1.68413 1.68413C3.36827 0 6.07885 0 11.5 0H12.5C17.9212 0 20.6318 0 22.3158 1.68413C24 3.36827 24 6.07885 24 11.5V12.5C24 17.9212 24 20.6318 22.3158 22.3158C20.6318 24 17.9212 24 12.5 24H11.5C6.07885 24 3.36827 24 1.68413 22.3158C0 20.6318 0 17.9212 0 12.5L0 11.5Z" fill="#2196F3"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.50045 7.5H4.75005C4.24993 7.5 4.1499 7.7354 4.1499 7.9949C4.1499 8.45845 4.74333 10.7574 6.913 13.798C8.35945 15.8744 10.3974 17 12.2518 17C13.3645 17 13.5021 16.75 13.5021 16.3194V14.75C13.5021 14.25 13.6075 14.1502 13.9598 14.1502C14.2195 14.1502 14.6645 14.28 15.703 15.2812C16.8899 16.4677 17.0855 17 17.7531 17H19.5035C20.0036 17 20.2537 16.75 20.1094 16.2567C19.9516 15.765 19.3849 15.0515 18.633 14.2059C18.225 13.7238 17.6131 13.2047 17.4276 12.9451C17.168 12.6114 17.2422 12.4631 17.4276 12.1665C17.4276 12.1665 19.5602 9.16295 19.7828 8.1433C19.894 7.77245 19.7828 7.5 19.2534 7.5H17.503C17.058 7.5 16.8528 7.7354 16.7415 7.9949C16.7415 7.9949 15.8514 10.1641 14.5904 11.5732C14.1824 11.981 13.9969 12.1108 13.7744 12.1108C13.6631 12.1108 13.5021 11.981 13.5021 11.6103V8.1433C13.5021 7.6983 13.3729 7.5 13.002 7.5H10.2513C9.9732 7.5 9.8059 7.7065 9.8059 7.90225C9.8059 8.32405 10.4364 8.42135 10.5014 9.6079V12.185C10.5014 12.75 10.3993 12.8525 10.1768 12.8525C9.5834 12.8525 8.13995 10.6736 7.28385 8.18035C7.1161 7.69575 6.9478 7.5 6.50045 7.5Z" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="24" height="24" fill="2196F3"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                        <a href="https://rutube.ru/channel/43603810/">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="48" height="48" rx="12" fill="#2196F3"/>
                                <path d="M16 14v20l16-10-16-10z" fill="white"/>
                                <circle cx="32" cy="16" r="2" fill="white"/>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/akwagarant.ru?utm_source=qr&igsh=MW04eGE5bDM3aWV4dw==">
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
    </footer>

</div>

<!-- Assets -->
<!-- Modal -->
<div class="modal" id="myModal">
    <!-- Modal close -->
    <div class="modal_close" id="closeModal">
        <svg role="presentation" class="t-popup__close-icon" width="23px" height="23px" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <g stroke="none" stroke-width="1" fill="#cfa382" fill-rule="evenodd"> <rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> <rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect> </g> </svg>
    </div>
    <!-- modal container -->
    <form action="/api" method="POST" class="modal_container">
        @csrf
        <!-- MODAL title -->
        <div class="modal_title">
            Получить консультацию
        </div>
        <!-- Inputs -->
        <div class="inputs">
            <!-- Input -->
            <input type="text" name="name" placeholder="Имя">
            <input id="phone_mobile" name="phone" type="tel"/>
            <input type="hidden" name="mail" value="">
            <input type="hidden" name="apiMethod" value="sendMail">
        </div>

        <!-- Button -->
        <button  class="order_btn">
            Получить консультацию
        </button>
        <!-- terms -->
        <div class="terms">
            Нажимая на кнопку "Получить консультацию" вы даете свое согласие на обработку персональных данных

        </div>
    </form>
</div>



<!-- Scripts -->
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<!-- Nanogallery -->
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
<script  src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/zoom/lg-zoom.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/thumbnail/lg-thumbnail.min.js"></script>

<!-- Parallax -->
<script  src="/assets/js/parallax.min.js"></script>

<!-- tel -->
<script  src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Main script -->
<script  src="/assets/js/main.js"></script>


</body>
</html>
