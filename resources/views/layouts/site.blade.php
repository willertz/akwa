<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

    @vite(['resources/sass/app.scss'])
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('js/parallax.min.js')}}"></script>


    <meta name="yandex-verification" content="e196649b6a88f7a9" />
    <title>{{$title}}</title>
    <meta name="keywords" content="монтаж отопления Воронеж, системы отопления Воронеж,отопление Воронеж, отопление коттеджа, отопление частного дома, проектирование систем отопления, проектирование отопления Воронеж, монтаж водоснабжения,монтаж котлов,водопровод Воронеж, водоснабжение Воронеж, установка радиаторов, котлы отопления, твердотопливные котлы в Воронеже, энергосберегающее отопление, монтаж автономной канализации, дизайн радиаторы отопления, дизайн-радиаторы ванных комнат, купить дизайн радиаторы в Воронеже, алмазное сверление Воронеж, алмазное бурение Воронеж. Монтажные работы.">
    <meta name="description" content="{{$description}}">
    <style>
        .square-object {
            width: 100%;
            height: 250px;
            object-fit: cover;
            background-size: cover;
            color: #fff;
            font-size: 33px;
            font-weight: bold;
            display: grid;
            grid-template-columns: 1fr;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: rgba(0,0,0,0.5);
            background-blend-mode: darken;
        }
        .square-object:hover {
            cursor: pointer;
            background-color: #000;
            color: #2388d9;
        }
        .placeholder-obj {
            display: grid;
            grid-gap: 5px;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }
        a.disDecor:hover {
            text-decoration: none;
        }
        .topText {
            background: #e6e6e6;
            padding: 20px;
            margin: 20px 0 40px 0;
            text-align: initial;
            font-weight: bold;
            font-size: 19px;
        }
        .new-price-wrapper {
            box-sizing: content-box;
        }
        .new-price-title {
            text-align: center;
        }
        .new-price-wrapper .img img {
            position: relative;
            display: block;
            width: 100%;
            height: auto;
            -webkit-border-radius: 4px 4px 0 0;
            -moz-border-radius: 4px 4px 0 0;
            border-radius: 4px 4px 0 0;
            z-index: 20;
        }
        .new-price-wrapper .img .title {
            position: absolute;
            top: 23px;
            left: 0;
            width: 100%;
            height: 150px;
            font-size: 25px;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            -webkit-text-shadow: 0 3px 0 rgba(0, 0, 0, .1);
            -moz-text-shadow: 0 3px 0 rgba(0, 0, 0, .1);
            text-shadow: 0 3px 0 rgba(0, 0, 0, .1);
            z-index: 23;
        }

        .new-price-wrapper .table {
            padding-top: 15px;
            -webkit-border-radius: 0 0 6px 6px;
            -moz-border-radius: 0 0 6px 6px;
            border-radius: 0 0 6px 6px;
            -webkit-box-shadow: 0 3px 0 0 rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 3px 0 0 rgba(0, 0, 0, .2);
            box-shadow: 0 3px 0 0 rgba(0, 0, 0, .2);
            background-color: #f5f5f5;
        }
        .stuff-price {
            padding: 21px 13px 20px;
        }
        .material-price {
            font-weight: bold;
        }
        .title-section {
            font-family: Libre Franklin,sans-serif;
            font-size: 30px;
            font-weight: 300;
            letter-spacing: .06em;
            line-height: 1.43;
            position: relative;
            text-align: center;
            text-transform: uppercase;
        }
        .title-section:before {
            background-color: #2388d9;
            content: "";
            display: block;
            height: 2px;
            width: 88px;
            margin: 50px auto 15px;
        }

        .new-price-title span {
            margin-bottom: 44px;
            display: block;
        }
        #contact-form-8 .col-md-3{
            margin-top: 15px;
            margin-bottom: 15px;
        }
        #head-price-block {
            position: relative;
            width: 100vw;
            padding-bottom:  120px;
            background-color:#f6f6f7;
        }
        .head-price-container {
            background: #fff;
            padding: 60px 25px;
            border: 1px solid #3e3e3e;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
        }
        .table-striped tbody tr:nth-of-type(odd) {
            font-size: 18px;
        }


        #buderus {
            position: relative;
            padding-top: 35px;
            padding-bottom: 35px;
            background-color: #2c60a2;
            text-align: center;
            color: #fff;
            font-size: 22px;
            font-weight: bold;
        }
    </style>
    <meta name="mailru-domain" content="8x0JZjs9ipQSrWs1" />
</head>
<body>
<div class="alert alert-success notice-add-item-in-cart" role="alert">
    Товар успешно добавлен в корзину!
</div>

<div style="position: fixed;
display: inline-block;
height: 30px;
width: 60px;
height: 60px;
bottom: 100px;
z-index:9999;
left: 30px;">
    <a style="display: block; width: 100%; height: 100%;" href="https://www.instagram.com/akwagarant.ru/">
       <img src="/img/insta.png" width="60px">
        </a>
</div>
<?php
        if (!preg_match("~cart~",request()->getRequestUri())):
?>
<a href="/cart"  class="cart-link-wrapper" style="display: none">
<div class="cart-link-box">
    <span class="lnr lnr-cart" style="margin: 4px auto;"></span>
    <span>
        Перейти в корзину
    </span>
</div>
</a>
<?php
        endif;
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('showIndexPage')}}">
            <img src="{{asset('img/logo.svg')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item
                <?php
                if (request()->getRequestUri() == '/'):
                ?>
                    active
                    <?php
                        endif;
                    ?>
                        ">
                    <a class="nav-link" href="{{route('showIndexPage')}}">Главная</a>
                </li>
                <li class="nav-item
                <?php
                if (request()->getRequestUri() == '/objects'):
                ?>
                    active
                    <?php
                    endif;
                    ?>">
                    <a class="nav-link" href="{{route('showObjectsListPage')}}">объекты</a>
                </li>
                <li class="nav-item
                <?php
                if (request()->getRequestUri() == '/blog'):
                ?>
                    active
                    <?php
                    endif;
                    ?>
                    ">
                    <a class="nav-link" href="{{route('showArticlesListPage')}}">Статьи</a>
                </li>
                <li class="nav-item
                <?php
                if (request()->getRequestUri() == '/price'):
                ?>
                    active
                    <?php
                    endif;
                    ?>
                    ">
                    <a class="nav-link" href="{{route('showPricePage')}}">Цены</a>
                </li>
              <!--  <li class="nav-item">
                    <a class="nav-link" href="#">Магазин</a>
                </li>
                -->
                <li class="nav-item
                <?php
                if (request()->getRequestUri() == '/contacts'):
                ?>
                    active
                    <?php
                    endif;
                    ?>">
                    <a class="nav-link" href="{{route('showContactPage')}}">Контакты</a>
                </li>

                <li class="nav-item
                <?php
                if (request()->getRequestUri() == '/internet-magazin'):
                ?>
                        active
<?php
                endif;
                ?>">
                    <a class="nav-link" href="{{route('showShopHeadPage')}}">Интернет-магазин</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <span>г. Воронеж &nbsp;&nbsp;&nbsp;</span>
      <span class="number">
          <a href="tel:+79036516410">+7 903 651 64 10</a>
      </span>
            </form>
        </div>
    </nav>
    <div
            <?php
                    if (preg_match('~^/$~',request()->getRequestUri())):
            ?>
             id="landing-header"
            <?php
                    else:
            ?>
             id="other-pages-header"
            <?php
                    endif;
            ?>
            data-parallax="scroll" data-image-src="{{asset('img/header-bg.jpg')}}">

        <div class="landing-header-content">
            <div class="container">
                <h1>{{$h1}}</h1>
                <a href="/#calc"><button class="open-top-form">Рассчитать стоимость отопления</button></a>
                </div>

            </div>
        </div>
    </div>
</header>

@yield('content')

<?php
        if (!preg_match("~contacts~",request()->getRequestUri())):
?>
<div id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="footer_contacts">
                    <div class="contact_title">
                        Контакты
                    </div>
                    <div class="contact_item"><i class="fas fa-phone-volume"></i><a href="tel:+79036516410"> +7 903 651 64 10</a></div>
                    <div class="contact_item"><i class="far fa-envelope-open"></i> info@akwagarant.ru</div>
                    <div class="contact_title">
                        Режим работы компании
                    </div>
                    <div class="contact_item"><i class="fas fa-stopwatch"></i> Понедельник - Пятница: с 9:00 - 18:00</div>
                    <div class="contact_item"><i class="fas fa-home"></i>  г. Воронеж, ул. Матросова, 6в, 3 Этаж оф. 5</div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="footer_maps">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aec4442c709fa9aa0754413ea780077071850565ddefbe303965dbd8eea6dd28b&amp;height=424px&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        endif;
?>

<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
