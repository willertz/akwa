@extends('layouts.site')

@section('content')

        <!-- Hero -->
        <section class="hero">
            <!-- video item -->
            <div class="video_item">
                <video autoplay loop muted playsinline>
                    <source src="{{asset('img/hero_video0.mp4')}}" type="video/mp4">
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
                    <a href="#" class="price_btn">рассчитать стоимость</a>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="services" id="services">
            <!-- container -->
            <div class="container">

                <!-- Section title -->
                <div class="section_title">Наши услуги</div>


                <!-- Wheel container -->
                <div class="wheel-container">
                    <div class="center-logo active">
                        <!-- Logo item -->
                        <div class="logo_item active">
                            <img src="{{asset('img/half_logo.png')}}" alt="Icons">
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

                    <!-- <div class="service s1">
                        <h4>Монтаж отопления</h4>
                        <p>Умное управление проектами</p>
                        <a href="#">подробнее →</a>
                    </div> -->

                    <div class="service s7 end" main-item="6">
                        <img src="{{asset('img/g2.webp')}}" alt="">
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
                                    Монтаж тёплых полов
                                </li>
                                <li>
                                    Монтаж радиаторов отопления
                                </li>
                                <li>
                                    Монтаж внутрипольных конвекторов
                                </li>
                                <li>
                                    Прокладка труб отопления
                                </li>
                                <li>
                                    Монтаж полотенцесушителей
                                </li>
                            </ul>
                            <a href="#">подробнее
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="4" y1="12" x2="20" y2="12" stroke="#FF6B35" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M13 5L20 12L13 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="service s2" main-item="1">
                        <img src="{{asset('img/g3.jpg')}}" alt="">
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
                        <img src="{{asset('img/g4.png')}}" alt="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style=""><path d="M12 3H16.2C17.8802 3 18.7202 3 19.362 3.32698C19.9265 3.6146 20.3854 4.07354 20.673 4.63803C21 5.27976 21 6.11984 21 7.8V16.2C21 17.8802 21 18.7202 20.673 19.362C20.3854 19.9265 19.9265 20.3854 19.362 20.673C18.7202 21 17.8802 21 16.2 21H7.8C6.11984 21 5.27976 21 4.63803 20.673C4.07354 20.3854 3.6146 19.9265 3.32698 19.362C3 18.7202 3 17.8802 3 16.2V12M8 13V17M16 11V17M12 7V17M2 5L5 2M5 2L8 5M5 2L5 8" stroke="black" stroke-linecap="round" stroke-linejoin="round" class="yRiivwle_0"></path><style data-made-with="vivus-instant">.yRiivwle_0{stroke-dasharray:85 87;stroke-dashoffset:86;animation:yRiivwle_draw_0 5200ms linear 0ms infinite,yRiivwle_fade 5200ms linear 0ms infinite;}@keyframes yRiivwle_draw{100%{stroke-dashoffset:0;}}@keyframes yRiivwle_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}@keyframes yRiivwle_draw_0{15.384615384615385%{stroke-dashoffset: 86}53.84615384615385%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}</style></svg>
                        <div class="item_title">
                            <span>
                                Монтаж <br> септиков
                            </span>
                            <p>Работа с партнерами <br>и девелоперами</p>

                            <!-- Item info -->
                            <ul class="item_info">
                                <!-- text -->
                                <li>
                                    Монтаж станции биологической очистки
                                </li>
                                <li>
                                    Монтаж труб канализации
                                </li>
                                <li>
                                    Земляные работы
                                </li>
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
                        <img src="{{asset('img/g5.jpg')}}" alt="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style=""><path d="M18 13L16.7004 6.50182C16.6278 6.13883 16.5915 5.95733 16.5032 5.80953C16.4252 5.67886 16.3183 5.56773 16.1908 5.4846C16.0466 5.39057 15.8667 5.34714 15.5069 5.26028L2 2M2 2L5.26028 15.5069C5.34714 15.8667 5.39057 16.0466 5.4846 16.1908C5.56773 16.3183 5.67886 16.4252 5.80953 16.5032C5.95733 16.5915 6.13883 16.6278 6.50182 16.7004L13 18M2 2L9.586 9.586M16.1314 20.8686L20.8686 16.1314C21.2646 15.7354 21.4627 15.5373 21.5368 15.309C21.6021 15.1082 21.6021 14.8918 21.5368 14.691C21.4627 14.4627 21.2646 14.2646 20.8686 13.8686L20.1314 13.1314C19.7354 12.7354 19.5373 12.5373 19.309 12.4632C19.1082 12.3979 18.8918 12.3979 18.691 12.4632C18.4627 12.5373 18.2646 12.7354 17.8686 13.1314L13.1314 17.8686C12.7354 18.2646 12.5373 18.4627 12.4632 18.691C12.3979 18.8918 12.3979 19.1082 12.4632 19.309C12.5373 19.5373 12.7354 19.7354 13.1314 20.1314L13.8686 20.8686C14.2646 21.2646 14.4627 21.4627 14.691 21.5368C14.8918 21.6021 15.1082 21.6021 15.309 21.5368C15.5373 21.4627 15.7354 21.2646 16.1314 20.8686ZM13 11C13 12.1046 12.1046 13 11 13C9.89543 13 9 12.1046 9 11C9 9.89543 9.89543 9 11 9C12.1046 9 13 9.89543 13 11Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" class="KQlmQEgg_0"></path><style data-made-with="vivus-instant">.KQlmQEgg_0{stroke-dasharray:95 97;stroke-dashoffset:96;animation:KQlmQEgg_draw_0 5200ms linear 0ms infinite,KQlmQEgg_fade 5200ms linear 0ms infinite;}@keyframes KQlmQEgg_draw{100%{stroke-dashoffset:0;}}@keyframes KQlmQEgg_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}@keyframes KQlmQEgg_draw_0{15.384615384615385%{stroke-dashoffset: 96}53.84615384615385%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}</style></svg>
                        <div class="item_title half">
                            <span>
                                Монтаж <br> котельных
                            </span>
                            <p>Предпродажная <br> планировка</p>
                            <!-- Item info -->
                            <ul class="item_info">
                                <!-- text -->
                                <li>
                                    Монтаж котлов отопления
                                </li>
                                <li>
                                    Монтаж бойлеров
                                </li>
                                <li>
                                    Пуско-наладочные работы
                                </li>
                                <li>
                                    Монтаж автоматики отопления
                                </li>
                                <li>
                                    Сервисное обслуживание
                                </li>
                                <li>
                                    Удалённое управление отоплением
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

                    <div class="service s3" main-item="2">
                        <img src="{{asset('img/g6.jpg')}}" alt="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style=""><path d="M9.3951 19.3711L9.97955 20.6856C10.1533 21.0768 10.4368 21.4093 10.7958 21.6426C11.1547 21.8759 11.5737 22.0001 12.0018 22C12.4299 22.0001 12.8488 21.8759 13.2078 21.6426C13.5667 21.4093 13.8503 21.0768 14.024 20.6856L14.6084 19.3711C14.8165 18.9047 15.1664 18.5159 15.6084 18.26C16.0532 18.0034 16.5678 17.8941 17.0784 17.9478L18.5084 18.1C18.9341 18.145 19.3637 18.0656 19.7451 17.8713C20.1265 17.6771 20.4434 17.3763 20.6573 17.0056C20.8715 16.635 20.9735 16.2103 20.9511 15.7829C20.9286 15.3555 20.7825 14.9438 20.5307 14.5978L19.684 13.4344C19.3825 13.0171 19.2214 12.5148 19.224 12C19.2239 11.4866 19.3865 10.9864 19.6884 10.5711L20.5351 9.40778C20.787 9.06175 20.933 8.65007 20.9555 8.22267C20.978 7.79528 20.8759 7.37054 20.6618 7C20.4479 6.62923 20.131 6.32849 19.7496 6.13423C19.3681 5.93997 18.9386 5.86053 18.5129 5.90556L17.0829 6.05778C16.5722 6.11141 16.0577 6.00212 15.6129 5.74556C15.17 5.48825 14.82 5.09736 14.6129 4.62889L14.024 3.31444C13.8503 2.92317 13.5667 2.59072 13.2078 2.3574C12.8488 2.12408 12.4299 1.99993 12.0018 2C11.5737 1.99993 11.1547 2.12408 10.7958 2.3574C10.4368 2.59072 10.1533 2.92317 9.97955 3.31444L9.3951 4.62889C9.18803 5.09736 8.83798 5.48825 8.3951 5.74556C7.95032 6.00212 7.43577 6.11141 6.9251 6.05778L5.49066 5.90556C5.06499 5.86053 4.6354 5.93997 4.25397 6.13423C3.87255 6.32849 3.55567 6.62923 3.34177 7C3.12759 7.37054 3.02555 7.79528 3.04804 8.22267C3.07052 8.65007 3.21656 9.06175 3.46844 9.40778L4.3151 10.5711C4.61704 10.9864 4.77964 11.4866 4.77955 12C4.77964 12.5134 4.61704 13.0137 4.3151 13.4289L3.46844 14.5922C3.21656 14.9382 3.07052 15.3499 3.04804 15.7773C3.02555 16.2047 3.12759 16.6295 3.34177 17C3.55589 17.3706 3.8728 17.6712 4.25417 17.8654C4.63554 18.0596 5.06502 18.1392 5.49066 18.0944L6.92066 17.9422C7.43133 17.8886 7.94587 17.9979 8.39066 18.2544C8.83519 18.511 9.18687 18.902 9.3951 19.3711Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" class="jbdVYACh_0"></path><path d="M12 15C13.6568 15 15 13.6569 15 12C15 10.3431 13.6568 9 12 9C10.3431 9 8.99998 10.3431 8.99998 12C8.99998 13.6569 10.3431 15 12 15Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" class="jbdVYACh_1"></path><style data-made-with="vivus-instant">.jbdVYACh_0{stroke-dasharray:67 69;stroke-dashoffset:68;animation:jbdVYACh_draw_0 5200ms linear 0ms infinite,jbdVYACh_fade 5200ms linear 0ms infinite;}.jbdVYACh_1{stroke-dasharray:19 21;stroke-dashoffset:20;animation:jbdVYACh_draw_1 5200ms linear 0ms infinite,jbdVYACh_fade 5200ms linear 0ms infinite;}@keyframes jbdVYACh_draw{100%{stroke-dashoffset:0;}}@keyframes jbdVYACh_fade{0%{stroke-opacity:1;}92.3076923076923%{stroke-opacity:1;}100%{stroke-opacity:0;}}@keyframes jbdVYACh_draw_0{15.384615384615385%{stroke-dashoffset: 68}53.84615384615385%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}@keyframes jbdVYACh_draw_1{34.61538461538461%{stroke-dashoffset: 20}73.07692307692307%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}</style></svg>
                        <div class="item_title">
                            <span>
                                Сантехнические <br> работы
                            </span>
                            <p>Производственные<br> компании</p>
                            <!-- Item info -->
                            <ul class="item_info">
                                <!-- text -->
                                <li>
                                    Монтаж смесителей
                                </li>
                                <li>
                                    Монтаж раковин
                                </li>
                                <li>
                                    Монтаж унитазов
                                </li>
                                <li>
                                    Монтаж душевых
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
                    <div class="service s5 half" main-item="4">
                    <img src="{{asset('img/g7.png')}}" alt="">
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
        <section class="company parallax-window" data-parallax="scroll" data-image-src="{{asset('img/info_photo.jpg')}}">

            <!-- row -->
            <div class="row" id="container">
                <!-- Left item -->
                <div class="left_item">
                    <!-- Left logo -->
                    <a href="index.html" class="left_logo">
                        <img src="{{asset('img/half_logo.png')}}" alt="">
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


                <!-- item swiper -->
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
                                <a href="{{asset('img/swiper1.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper1.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper2.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper2.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper3.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper3.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper4.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper4.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- item texts -->
                        <div class="item_texts">
                            <!-- Item info -->
                            <div class="item_info">
                                <!-- Item title -->
                                <div class="item_title">
                                    Алые Паруса
                                </div>
                                <!-- Item advantages -->
                                <ul class="adv_item">
                                    <!-- text -->
                                    <li>
                                        — Площадь: 170 м. кв.
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Срок разработки: 3 месяца
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Срок реализации: 12 месяцев
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Архитектура: Ар-деко
                                    </li>
                                </ul>
                            </div>
                            <!-- More btn -->
                            <a href="#" class="more_btn more_one">Подробнее</a>
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

                <!-- item swiper -->
                <div class="item_swiper half">
                    <!-- swiper -->
                    <div class="swiper swiper-portfolio portfolio_two">
                        <!-- dark overlay -->
                        <div class="dark_overlay"></div>
                        <!-- swiper wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper5.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper5.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper2.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper2.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper3.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper3.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper4.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper4.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- item texts -->
                        <div class="item_texts">
                            <!-- Item info -->
                            <div class="item_info">
                                <!-- Item title -->
                                <div class="item_title">
                                    Алые Паруса
                                </div>
                                <!-- Item advantages -->
                                <ul class="adv_item">
                                    <!-- text -->
                                    <li>
                                        — Площадь: 170 м. кв.
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Срок разработки: 3 месяца
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Срок реализации: 12 месяцев
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Архитектура: Ар-деко
                                    </li>
                                </ul>
                            </div>
                            <!-- More btn -->
                            <a href="#" class="more_btn more_two">Подробнее</a>
                        </div>
                    </div>
                        <!-- Swiper buttons -->
                        <div class="swiper_buttons">
                        <!-- left btn -->
                        <div class="left_button">
                            <svg class="t-null__slds-arrow t-null__slds-arrow_1" width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(255, 255, 255);"></path></svg>
                        </div>
                        <!-- right btn -->
                        <div class="right_button">
                            <svg class="t-null__slds-arrow t-null__slds-arrow_1" width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(255, 255, 255);"></path></svg>
                        </div>
                    </div>

                </div>

                <!-- item swiper -->
                <div class="item_swiper top">
                    <!-- swiper -->
                    <div class="swiper swiper-portfolio portfolio_three">
                        <!-- dark overlay -->
                        <div class="dark_overlay"></div>
                        <!-- swiper wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper6.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper6.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper5.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper5.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper3.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper3.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper4.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper4.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- item texts -->
                        <div class="item_texts">
                            <!-- Item info -->
                            <div class="item_info">
                                <!-- Item title -->
                                <div class="item_title">
                                    Алые Паруса
                                </div>
                                <!-- Item advantages -->
                                <ul class="adv_item">
                                    <!-- text -->
                                    <li>
                                        — Площадь: 170 м. кв.
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Срок разработки: 3 месяца
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Срок реализации: 12 месяцев
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Архитектура: Ар-деко
                                    </li>
                                </ul>
                            </div>
                            <!-- More btn -->
                            <a href="#" class="more_btn more_three">Подробнее</a>
                        </div>
                    </div>
                        <!-- Swiper buttons -->
                        <div class="swiper_buttons">
                        <!-- left btn -->
                        <div class="left_butt">
                            <svg class="t-null__slds-arrow t-null__slds-arrow_1" width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(255, 255, 255);"></path></svg>
                        </div>
                        <!-- right btn -->
                        <div class="right_butt">
                            <svg class="t-null__slds-arrow t-null__slds-arrow_1" width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(255, 255, 255);"></path></svg>
                        </div>
                    </div>

                </div>

                <!-- item swiper -->
                <div class="item_swiper">
                    <!-- swiper -->
                    <div class="swiper swiper-portfolio portfolio_four">
                        <!-- dark overlay -->
                        <div class="dark_overlay"></div>
                        <!-- swiper wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper7.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper7.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper6.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper6.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper5.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper5.jpg')}}" alt="">
                                </a>
                            </div>

                            <!-- Swiper-slide -->
                            <div class="swiper-slide">
                                <!-- Swiper photo gallery -->
                                <a href="{{asset('img/swiper4.jpg')}}" class="photo">
                                    <img src="{{asset('img/swiper4.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- item texts -->
                        <div class="item_texts">
                            <!-- Item info -->
                            <div class="item_info">
                                <!-- Item title -->
                                <div class="item_title">
                                    Алые Паруса
                                </div>
                                <!-- Item advantages -->
                                <ul class="adv_item">
                                    <!-- text -->
                                    <li>
                                        — Площадь: 170 м. кв.
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Срок разработки: 3 месяца
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Срок реализации: 12 месяцев
                                    </li>
                                    <!-- text -->
                                    <li>
                                        — Архитектура: Ар-деко
                                    </li>
                                </ul>
                            </div>
                            <!-- More btn -->
                            <a href="#" class="more_btn more_four">Подробнее</a>
                        </div>
                    </div>
                        <!-- Swiper buttons -->
                        <div class="swiper_buttons">
                        <!-- left btn -->
                        <div class="left_butto">
                            <svg class="t-null__slds-arrow t-null__slds-arrow_1" width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(255, 255, 255);"></path></svg>
                        </div>
                        <!-- right btn -->
                        <div class="right_butto">
                            <svg class="t-null__slds-arrow t-null__slds-arrow_1" width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(255, 255, 255);"></path></svg>
                        </div>
                    </div>

                </div>

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
                        <a href="#" class="follow_btn">Записаться</a>
                        <!-- terms -->
                        <div class="terms">
                            Нажимая на кнопку "Записаться", я соглашаюсь с политикой конфиденциальности
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Copleted tasks -->
        <section class="tasks">
            <!-- container -->
            <div class="container">

                <!-- Video title -->
                <div class="video_title">Видео о нас</div>
                <!-- video row -->
                <div class="video_row">

                    <!-- video item -->
                    <div class="video_item">
                        <video width="100%" height="100%" poster="{{asset('img/preview1.png')}}" controls preload="none">
                            <source src="{{asset('video/glulam_house_heating_installation_in_Voronezh.mp4')}}" type="video/mp4">
                        </video>
                    </div>

                    <!-- video item -->
                    <div class="video_item">
                        <video width="100%" height="100%" poster="{{asset('img/preview3.png')}}" controls preload="none">
                            <source src="{{asset('video/house_is_made_of_gluedbeams.mp4')}}" type="video/mp4">
                        </video>
                    </div>

                    <!-- video item -->
                    <div class="video_item">
                        <video width="100%" height="100%" poster="{{asset('img/preview2.png')}}" controls preload="none">
                            <source src="{{asset('video/obzor_doma_1.mp4')}}" type="video/mp4">
                        </video>
                    </div>

                    <!-- video item -->
                    <div class="video_item">
                        <video width="100%" height="100%" poster="{{asset('img/preview4.png')}}" controls preload="none">
                            <source src="{{asset('video/obzor_doma.mp4')}}" type="video/mp4">
                        </video>
                    </div>


                    <!-- video item -->
                    <div class="video_item">
                        <video width="100%" height="100%" poster="{{asset('img/preview5.png')}}" controls preload="none">
                            <source src="{{asset('video/overview_of_the_building_with_a_swimming_pool.mp4')}}" type="video/mp4">
                        </video>
                    </div>

                    <!-- video item -->
                    <div class="video_item">
                        <video width="100%" height="100%" poster="{{asset('img/preview6.png')}}" controls preload="none">
                            <source src="{{asset('video/very_cool_engineering_plumbing_in_the_house.mp4')}}" type="video/mp4">
                        </video>
                    </div>

                </div>

                <!-- Button -->
                <a href="#" class="more_video">
                    Больше видео
                </a>

                <!-- Item title -->
                <!-- <div class="comment_title">
                    Отзывы наших клиентов
                </div>  -->

                <!-- Followers comments -->
                <div class="comments">
                    <!-- comment item -->
                    <div class="com_item">
                        <!-- Item description -->
                        <div class="item_desc">
                            Превосходная услуга! Результат оказался даже лучше, чем я ожидал.
                        </div>
                        <!-- Item name -->
                        <div class="item_name">
                            Мария
                        </div>
                    </div>

                    <!-- comment item -->
                    <div class="com_item">
                        <!-- Item description -->
                        <div class="item_desc">
                            Превосходная услуга! Результат оказался даже лучше, чем я ожидал.
                        </div>
                        <!-- Item name -->
                        <div class="item_name">
                            Мария
                        </div>
                    </div>

                    <!-- comment item -->
                    <div class="com_item">
                        <!-- Item description -->
                        <div class="item_desc">
                            Превосходная услуга! Результат оказался даже лучше, чем я ожидал.
                        </div>
                        <!-- Item name -->
                        <div class="item_name">
                            Мария
                        </div>
                    </div>

                    <!-- comment item -->
                    <div class="com_item">
                        <!-- Item description -->
                        <div class="item_desc">
                            Превосходная услуга! Результат оказался даже лучше, чем я ожидал.
                        </div>
                        <!-- Item name -->
                        <div class="item_name">
                            Мария
                        </div>
                    </div>

                    <!-- comment item -->
                    <div class="com_item">
                        <!-- Item description -->
                        <div class="item_desc">
                            Превосходная услуга! Результат оказался даже лучше, чем я ожидал.
                        </div>
                        <!-- Item name -->
                        <div class="item_name">
                            Мария
                        </div>
                    </div>

                    <!-- comment item -->
                    <div class="com_item">
                        <!-- Item description -->
                        <div class="item_desc">
                            Превосходная услуга! Результат оказался даже лучше, чем я ожидал.
                        </div>
                        <!-- Item name -->
                        <div class="item_name">
                            Мария
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                        <a href="#" class="much_btn">
                            Подробнее
                        </a>
                    </div>
                    <!-- Right side -->
                    <div class="right_side swiper swiper_team">
                        <!-- swiper wrapper -->
                        <div class="swiper-wrapper">
                            <!-- swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('img/team.jpg')}}" alt="">
                            </div>
                            <!-- swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('img/team.jpg')}}" alt="">
                            </div>
                            <!-- swiper-slide -->
                            <div class="swiper-slide">
                                <img src="{{asset('img/team.jpg')}}" alt="">
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
                            <img src="{{asset('img/project.png')}}" alt="" class="left_side">
                            <img src="{{asset('img/project2.png')}}" alt="">
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
                            <a href="#" class="example_btn">
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
                            <img src="{{asset('img/project3.jpg')}}" alt="" class="left_side">
                            <img src="{{asset('img/project4.jpg')}}" alt="">
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
                            <a href="#" class="example_btn">
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
                            <img src="{{asset('img/project5.jpg')}}" alt="" class="left_side">
                            <img src="{{asset('img/project6.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
@endsection
