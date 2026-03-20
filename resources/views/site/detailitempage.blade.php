@php use App\Http\Controllers\PriceController; @endphp
@extends('layouts.site')

@section('content')
    <div class="container p-5">

        <div class="topText">
            {{$topText}}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-items-wrapper">
                    <div class="preview-photo">
                        <?php
                        if ($item->preview):
                            ?>
                        <img class="card-img-top"
                             src="{{$item->preview}}">
                        <?php
                        else:
                            ?>
                        <img class="card-img-top"
                             src="/userfiles/system/no_product.png" style="width: 70% !important;">
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="main-items-content">
                        <a href="/goods/{{$item->id}}">
                            <h3>{{$item->name}}</h3>
                        </a>
                        <?php
                        if ($item->art):
                            ?>
                        <b>Артикул: </b> <span>{{$item->art}}</span><br>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($item->country):
                            ?>
                        <b>Производитель: </b> <span>{{$item->country}}</span><br>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($item->description):
                            ?>
                        <b>Короткое писание:</b><br>
                        <div style="text-align: justify;">{!!$item->description!!}</div>
                        <?php
                        endif;
                        ?>

                        <?php
                        if ($item->full_description):
                            ?>
                        <b>Описание</b><br>
                        <div style="text-align: justify;">{!! $item->full_description !!}</div>
                        <?php
                        endif;
                        ?>
                        <?php
                        $unit = $item->unit;
                        $price = null;
                        $priceController = new PriceController();
                        if ($item->price) {
                            $price = $item->price;
                        } elseif ($item->price_usd) {
                            $price = $priceController->getPrice('USD', $item->price_usd);
                        } elseif ($item->price_eur) {
                            $price = $priceController->getPrice('EUR', $item->price_eur);
                        }
                        ?>
                        <?php
                        if ($price):
                            ?>
                            <?php
                            $price = (float)str_replace(' ', '', $price);
                            ?>
                        <h4><?= number_format($price, 0, '', ' ') . ' <strike>Р</strike>' . " / " . $unit; ?></h4>
                        <?php
                        else:
                            ?>
                        <h4>Уточнить у менеджера</h4>
                        <?php
                        endif;
                        ?>
                        <div class="buttom-line">
                            <button class="blue-btn add-to-cart" data-id="{{$item->id}}" data-name="{{$item->name}}"
                                    data-price="{{$price}}">Заказать
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
