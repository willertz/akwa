@extends('layouts.site')

@section('content')
<!-- Start sevice section -->
<div id="service-section">
    <div class="container">
        <h3 class="title-section">
            Наши услуги
        </h3>
        <div class="row">
            <div class="col-md-4">
                <div class="icon-block d-md-none d-lg-block">
                    <div class="service-icon">
                        <span class="lnr lnr-drop"></span>
                    </div>
                </div>
                <div class="service-content-block">
                    <span>Проектирование систем отопления</span>
                    <ul>
                        <li><a href="https://akwagarant.ru/blog/montaj-teplogo-pola">Монтаж теплых полов</a></li>
                        <li><a href="https://akwagarant.ru/blog/montaj-radiatorov-otopleniya">Монтаж радиаторов отопления</a></li>
                        <li><a href="https://akwagarant.ru/blog/vnutripolnyiy-konvektor">Монтаж внутрипольных конвекторов</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="icon-block icon-block d-md-none d-lg-block">
                    <div class="service-icon">
                        <span class="lnr lnr-home"></span>
                    </div>
                </div>
                <div class="service-content-block">
                    <span>Монтаж котельных</span>
                    <ul>
                        <li><a href="https://akwagarant.ru/blog/montaj-kotlov">Монтаж котлов отопления</a></li>
                        <li><a href="https://akwagarant.ru/blog/montaj-boylera">Монтаж бойлеров</a></li>
                        <li><a href="https://akwagarant.ru/blog/pusko-naladka-kotelnoy">Пуско-наладочные работы</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="icon-block icon-block d-md-none d-lg-block">
                    <div class="service-icon">
                        <span class="lnr lnr-apartment"></span>
                    </div>
                </div>
                <div class="service-content-block">
                    <span>Монтаж септиков</span>
                    <ul>
                        <li><a href="https://akwagarant.ru/blog/montaj-septikov">Монтаж автономных канализационных станций</a></li>
                        <li><a href="https://akwagarant.ru/blog/pravilnyiy-montaj-kanalizatsii">Монтаж труб канализации</a></li>
                        <li><a href="https://akwagarant.ru/blog/zemlyanyie-rabotyi">Земляные работы</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="icon-block icon-block d-md-none d-lg-block">
                    <div class="service-icon">
                        <span class="lnr lnr-chart-bars"></span>
                    </div>
                </div>
                <div class="service-content-block">
                    <span>Монтаж систем отопления</span>
                    <ul>
                        <li><a href="https://akwagarant.ru/blog/prokladka-trub-otopleniya">Прокладка труб отопления</a></li>
                        <li><a href="https://akwagarant.ru/blog/proektirovanie-sistemy-otoplenie">Проектирование систем отопления</a></li>
                        <li><a href="https://akwagarant.ru/blog/montaj-polotentsesushitelya">Монтаж полотенцесушителей</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="icon-block icon-block d-md-none d-lg-block">
                    <div class="service-icon">
                        <span class="lnr lnr-laptop-phone"></span>
                    </div>
                </div>
                <div class="service-content-block">
                    <span>Монтаж автоматики</span>
                    <ul>



                        <li><a href="https://akwagarant.ru/blog/umnoe-otoplenie">Монтаж автоматики</a></li>
                        <li><a href="https://akwagarant.ru/blog/servisnoe-obslujivanie-sistemyi-otopleniya">Сервисное обслуживание</a></li>
                        <li><a href="https://akwagarant.ru/blog/gsm-modul-dlya-otopleniya">Mонтаж GSM-модулей</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="icon-block icon-block d-md-none d-lg-block">
                    <div class="service-icon">
                        <span class="lnr lnr-funnel"></span>
                    </div>
                </div>
                <div class="service-content-block">
                    <span>Сантехнические работы</span>
                    <ul>
                        <li><a href="https://akwagarant.ru/blog/ustanovka-santehniki">Монтаж смесителей</a></li>
                        <li><a href="https://akwagarant.ru/blog/ustanovka-santehniki">Монтаж раковин</a></li>
                        <li><a href="https://akwagarant.ru/blog/ustanovka-santehniki">Монтаж унитазов</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End service section -->

<div class="parallax-window indicators-container" data-parallax="scroll" data-image-src="{{asset('img/liveNumbersBg.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="num" data-speed="2500" data-num="82">
                    42
                </div>
                <div class="title-border trasnparent ">
						<span class="txt">
							<span>
								Коттеджей							</span>
						</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="num" data-speed="2500" data-num="27">
                    27					</div>
                <div class="title-border trasnparent ">
						<span class="txt">
							<span>
								Квартир							</span>
						</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="num" data-speed="2500" data-num="12">
                    12					</div>
                <div class="title-border trasnparent ">
						<span class="txt">
							<span>
								Лет на рынке							</span>
						</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="num" data-speed="2500" data-num="27">
                    24/7					</div>
                <div class="title-border trasnparent ">
						<span class="txt">
							<span>
								Техподдержка							</span>
						</span>
                </div>
            </div>
        </div>
    </div>
    <!-- end indicators-container -->
</div>


<div id="projects-container">
    <div class="container">
        <h3 class="title-section">
            Наши последние объекты
        </h3>

            <div class="placeholder-obj">
            @foreach($objects as $object)
                    <a href="{{route('showObjectPage',[$object->id])}}" class="disDecor">
                    <div class="square-object" style="background-image: url({{$object->preview_pict}})">
                        {{$object->name}}
                    </div>
                    </a>
            @endforeach
            </div>


</div>
</div>

<div class="youtoube-container">
    <div class="container">
        <h3 class="title-section">
            Видео о нас
        </h3>
        <div class="row">
             <div class="col-md-6 col-xs-12">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/5wkNP9d5pVM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>  
            <div class="col-md-6">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/NDNU9JrKKeU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-6">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/Zgc6bNzqK-4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-6 col-xs-12">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/Cc50DmsTxiY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <a href="https://akwagarant.ru/video" style="margin: 0 auto">
                <button class="btn btn-outline-dark">
                Смотреть другие видео
            </button>
            </a>
        </div>
    </div>

</div>


    <div class="container new-price-wrapper">
        <div class="row">
            <div class="col-md-12 new-price-title">
                <h3 class="title-section">
                    Примерный расчет стоимости отопления
                </h3>
                <span>для дома 150 кв.м. с двумя сан.узлами</span>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="img">
                    <h3 class="title">Эконом</h3>
                </div> <!-- /.img -->

                <div class="table akwa-column">

                    <table class="worktypes" cellpadding="0" cellspacing="0">

                        <tbody><tr>
                            <td>Алюминиевые секционные радиаторы</td>
                            <td>10 шт</td>
                        </tr>


                        <tr>
                            <td>Теплые полы из труб PE-RT</td>
                            <td>50 m2</td>
                        </tr>


                        <tr>
                            <td>Полипропиленовые трубы</td>
                            <td>80 м.п</td>
                        </tr>


                        <tr>
                            <td>Настенный 2-x контурный котел BUDERUS (Германия)</td>
                            <td>1 шт</td>
                        </tr>
                        </tbody>
                    </table>


                    <div class="stuff-price">
                        <span class="material-price">Стоимость материалов:</span>
                        <p>230 тыс. руб.</p>
                        <span class="material-price">Стоимость работы:</span>
                        <p>90 тыс. руб.</p>
                    </div> <!-- /.stuff-price -->


                </div>
            </div>


            <div class="col-md-4">
                <div class="img">
                    <h3 class="title">Стандарт</h3>
                </div> <!-- /.img -->

                <div class="table akwa-column">

                    <table class="worktypes" cellpadding="0" cellspacing="0">

                        <tbody><tr>
                            <td>Алюминиевые секционные радиаторы</td>
                            <td>10 шт</td>
                        </tr>


                        <tr>
                            <td>Теплые полы из труб PE-XA с кислородной защитой</td>
                            <td>50 m2</td>
                        </tr>


                        <tr>
                            <td>Полипропиленовые трубы</td>
                            <td>80 м.п</td>
                        </tr>


                        <tr>
                            <td>Настенный одноконтурный котел с бойлером косвенного нагрева 200 литров BUDERUS (Германия)</td>
                            <td>1 шт</td>
                        </tr>
                        </tbody>
                    </table>


                    <div class="stuff-price">
                        <span class="material-price">Стоимость материалов:</span>
                        <p>370 тыс. руб.</p>
                        <span class="material-price">Стоимость работы:</span>
                        <p>180 тыс. руб.</p>
                    </div> <!-- /.stuff-price -->


                </div>
            </div>


            <div class="col-md-4">
                <div class="img">
                    <h3 class="title">Премиум</h3>
                </div> <!-- /.img -->

                <div class="table akwa-column">

                    <table class="worktypes" cellpadding="0" cellspacing="0">

                        <tbody><tr>
                            <td>Стальные панельные радиаторы</td>
                            <td>10 шт</td>
                        </tr>


                        <tr>
                            <td>Теплые полы из труб PE-XA с кислородной защитой</td>
                            <td>50 m2</td>
                        </tr>


                        <tr>
                            <td>Трубы из сшитого полиэтилена REHAU PE-XA на разводку отопления и водопровод</td>
                            <td>80 м.п</td>
                        </tr>


                        <tr>
                            <td>Напольный чугунный котел +<br> Бойлер косвенного нагрева 200л +<br>
                                Полная автоматизация +<br>Управление через интернет
                            </td>
                            <td>1 шт</td>
                        </tr>
                        </tbody>
                    </table>


                    <div class="stuff-price">
                        <span class="material-price">Стоимость материалов:</span>
                        <p>650 тыс. руб.</p>
                        <span class="material-price">Стоимость работы:</span>
                        <p>280 тыс. руб.</p>
                    </div> <!-- /.stuff-price -->


                </div>

            </div>


        </div>
    </div>

<div id="calc">
    <div class="parallax-window indicators-container" data-parallax="scroll" data-image-src="{{asset('img/liveNumbersBg.jpg')}}">
        <div class="container">
            <div id="contact-form-8">
                <div class="row">
                    <div class="col-md-12 new-price-title">
                        <h3 class="title-section" id="contact-title">
                            Оставить заявку на расчет стоимости
                        </h3>
                        <h3 id="thanks-form" style="display: none;">
                            Заявка успешно отправлена!<br>
                            Мы свяжемся с вами в ближайшее время
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form id="contact-head-form">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <input type="text" id="person-name" class="form-control required" required placeholder="Имя">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="person-phone" class="form-control required" required placeholder="Телефон">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="person-email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-3">
                                    <button  class="btn btn-primary btn-block" id="send-form-contact">Отправить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="head-price-block">
        <div class="container">
            <div class="row" style="margin-bottom: 25px; text-align: center">
                <div class="col-md-12 new-price-title">
                    <h3 class="title-section">
                        ПРАЙС ЦЕН НА ОТДЕЛЬНЫЕ ВИДЫ РАБОТ
                    </h3>
                </div>
            </div>
            <div class="container head-price-container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped akwa-price-table">
                            <tbody>
                            <tr>
                                <td>Монтаж отопительного прибора (радиатор, полотенцесушитель)</td>
                                <td width="25%">3000 руб. / шт.</td>
                            </tr>
                            <tr>
                                <td colspan="2">В цену входит: накрутить комплектующие (краны 2 шт, заглушки),
                                    подключить готовые трубы.</td>
                            </tr>

                            <tr>
                                <td>Монтаж встроенного в пол конвектора</td>
                                <td width="25%">3500 руб. / шт.</td>
                            </tr>
                            <tr>
                                <td colspan="2">В цену входит: накрутить комплектующие (краны 2 шт, заглушки),
                                    подключить готовые трубы.</td>
                            </tr>

                            <tr>
                                <td>Монтаж тёплого пола (без стяжки)</td>
                                <td width="25%">500 руб. / м.кв.</td>
                            </tr>
                            <tr>
                                <td colspan="2">В монтаж тёплого пола входит — укладка пенополистирола на черновой пол с помощью «грибов»; раскатка труб по пенополистеролу, фиксируя их с помощью шпилек или
                                    стяжками к сетке</td>
                            </tr>

                            <tr>
                                <td>Монтаж настенного котла</td>
                                <td width="25%">7000 руб. / шт.</td>
                            </tr>
                            <tr>
                                <td colspan="2">В монтаж настенного котла входит — подключение внутреннего дымохода,
                                    монтаж 4 кранов (не посредственно в котле), монтаж фго и 1 крана после
                                    фго, подключение всех труб (2 отопление и 2 водопровода)</td>
                            </tr>

                            <tr>
                                <td>Монтаж бойлера</td>
                                <td width="25%">8000 руб. / шт.</td>
                            </tr>
                            <tr>
                                <td colspan="2">В монтаж бойлера входит — закрытие всех отверстий запорной арматурой
                                    и заглушками, установка латунных тройников с воздухоотводчиками,
                                    монтаж сливной арматуры с бойлера и группы безопасности бойлера. </td>
                            </tr>
                            <tr>
                                <td>Монтаж точки водоснабжения</td>
                                <td width="25%">600 руб. / шт.</td>
                            </tr>
                            <tr>
                                <td colspan="2">Вывод холодной или горячей воды.
                                    В монтаж точки водопровода включается — установка водоразетки под
                                    сантехнический прибор с накрученной на неё заглушкой (или краном мини).
                                    Монтаж трубы отдельно, согласно м.п. монтажа трубы. </td>
                            </tr>

                            <tr>
                                <td>Монтаж трубопровода отопления до D25</td>
                                <td width="25%">150 руб. / п.м.</td>
                            </tr>
                            <tr>
                                <td colspan="2">Монтаж труб — в метраж входит монтаж фитингов (уголков, тройников и т. д.),
                                    утеплителя и крепежа. </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px">
            <a href="https://akwagarant.ru/price" style="margin: 0 auto">
                <button class="btn btn-outline-dark">
                    Полный прайс лист
                </button>
            </a>
        </div>
    </div>
</div>
<div id="about_us">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about_us_title">
                    Меня зовут Тимофеев Игорь Сергеевич.<br>
                    Я являюсь руководителем проектов в компании.
                </div>
                <div class="about_us_text">
                    Я лично регулярно приезжаю на объект и осуществляю контроль за работами, которые проводятся специалистами нашей компании и несу ответственность
                    за нашу репутацию перед каждым клиентом. Для меня очень важно, чтобы качество работ было на самом высоком уровне. Именно поэтому наша компания
                    является одной из лучших в Воронеже по монтажу инженерных систем. Всех наших клиентов мы продолжаем вести и дальше - от консультативных звонков
                    до аварийных выездов. Постоянная техподдержка с нашей стороны.
                    Если у Вас есть какие-либо вопросы или пожелания - Вы можете обратиться прямо ко мне.
                    <br>
                    Моя почта <b>timofeev@akwagarant.ru</b>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{asset('img/photo.jpg')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<script>
    $(function($){
        $('#contact-head-form').submit(function(e) {
            e.preventDefault();
            $('#contact-head-form').hide();
            $('#contact-title').hide();
            $('#thanks-form').show();
            var name = $('#person-name').val();
            var  phone = $('#person-phone').val();
            var email = $('#person-email').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                url: '/api',
                method: 'post',
                data: {
                    apiMethod: 'sendMail',
                    name: name,
                    phone: phone,
                    mail: email
                }
            })
        })
        var max_col_height = 0; // максимальная высота, первоначально 0
        $('.akwa-column').each(function(){ // цикл "для каждой из колонок"
            if ($(this).height() > max_col_height) { // если высота колонки больше значения максимальной высоты,
                max_col_height = $(this).height(); // то она сама становится новой максимальной высотой
            }
        });
        console.log(max_col_height)
        $('.akwa-column').height(max_col_height); // устанавливаем высоту каждой колонки равной значению максимальной высоты
    });
</script>
@endsection
