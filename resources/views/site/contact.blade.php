@extends('layouts.site')

@section('content')
    <div id="map">
    </div>
    <script src="https://api-maps.yandex.ru/2.1/?load=package.full&lang=ru-RU" type="text/javascript"></script>

    <script type="text/javascript">
        ymaps.ready(function () {
            var mapexMap = new ymaps.Map('map', {
                    center: [51.635476, 39.173410], // центр карты
                    zoom: 14, // масштаб
                    controls: ['zoomControl']
                }),

                myPlacemark = new ymaps.Placemark(
                    [51.635476, 39.173410], // координаты маркера
                    {
                        "iconContent": "",
                        "balloonContentBody": "г. Воронеж, ул. Матросова, 6в, 3 Этаж оф. 5",
                        "balloonContentHeader": "Монтаж отопления в Воронеже"
                    }, // контент маркера
                    {
                        // Опции.
                        // Необходимо указать данный тип макета.
                        //iconLayout: 'default#image',
                        // Своё изображение иконки метки.
                        //iconImageHref: 'wp-content/themes/prokat/images/map-marker.png',
                        // Размеры метки.
                        //iconImageSize: [30, 42],
                        // Смещение левого верхнего угла иконки относительно
                        // её "ножки" (точки привязки).
                        //iconImageOffset: [-5, -38]
                    });
            mapexMap.behaviors.disable('scrollZoom');
            mapexMap.geoObjects.add(myPlacemark);
        });
    </script>

    <div id="contactbox">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <h3 class="title-section">
                        Контакты
                    </h3>
                    <p>
                        <b>Генеральный Директор:</b> Тимофеев Игорь Сергеевич<br>
                        <b>тел:</b><a href="tel:+79036516410">+7 903 651 64 10</a> <br>
                        <b>почта:</b> timofeev@akwagarant.ru <br>
                        <b>Юридический адрес:</b> г. Воронеж ул. Матросова д. 6В оф. 6 <br>
                    </p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <h3 class="title-section">
                        Реквизиты
                    </h3>
                    <p>
                        <b>Компания:</b>ООО « Аквагарант»<br>
                        <b>ИНН:</b> 3664121199<br>
                        <b>ОГРН:</b> 1123668043212<br>
                        <b>КПП:</b> 366401001<br>
                        <b>ОКПО:</b> 09520698<br>
                        <b>р\с:</b> 40702810913000064824<br>
                        <b>Банк:</b> Центрально-Чернозёмный банк ОАО «Сбербанк России» г. Воронеж<br>
                        <b>БИК:</b> 042007681<br>
                        <b>Корсчёт:</b> 30101810600000000681<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection