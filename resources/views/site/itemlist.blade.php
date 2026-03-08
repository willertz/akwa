@extends('layouts.site')

@section('content')
    <div class="container p-5">
       
        <div class="topText">
            {{$topText}}
        </div>
        @foreach($items['main'] as $item )

            <div class="row">
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
                        $price = null;
                        $priceController = new \App\Http\Controllers\PriceController();
                        if ($item->price) {
                            $price = $item->price;
                        } elseif ($item->price_usd) {
                            $price = $priceController->getPrice('USD',$item->price_usd);
                        } elseif ($item->price_eur) {
                            $price = $priceController->getPrice('EUR',$item->price_eur);
                        }
                        $unit = $item->unit;
                        ?>
                        <?php
                        if ($price):
                        ?>
                        <?php
                        $price = (float)str_replace(' ','',$price);
                        ?>
                        <b>Цена:</b>
                        <span  style="padding-left: 10px; font-size: 20px;"> <?= number_format($price, 0, '', ' ' ).' <strike>Р</strike>' . " / " . $unit;?></span><br><br>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($item->description):
                        ?>
                        <b>Описание:</b>
                        <div style="text-align: justify;">{!!$item->description!!}</div>
                        <?php
                        endif;
                        ?>


                        <?php
                        if(count($items['subitems']) > 0 && isset($items['subitems'][$item->id])):
                        ?>

                        <div class="subitems-list">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="w-20">Артикул</th>
                                    <th scope="col" class="w-40">Наименование</th>
                                    <th scope="col" class="w-25">Цена</th>
                                    <th scope="col" class="w-15">Заказ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items['subitems'][$item->id] as $subitem)
                                <tr>
                                    <th scope="row">{{$subitem->art}}</th>
                                    <td><a href="/goods/{{$subitem->id}}/">{{$subitem->name}}</a></td>
                                    <?php
                                        $price = null;
                                        $priceController = new \App\Http\Controllers\PriceController();
                                        if ($subitem->price) {
                                            $price = $subitem->price;
                                        } elseif ($subitem->price_usd) {
                                            $price = $priceController->getPrice('USD',$subitem->price_usd);
                                        } elseif ($subitem->price_eur) {
                                            $price = $priceController->getPrice('EUR',$subitem->price_eur);
                                        }
                                    $unit = $subitem->unit;
                                    ?>
                                    <?php
                                        if ($price):
                                    ?>
                                    <?php
                                        $price = (float)str_replace(' ','',$price);
                                    ?>
                                    <td><?= number_format($price, 0, '', ' ' ).' <strike>Р</strike>' . " / " . $unit;?></td>
                                    <?php
                                        else:
                                    ?>
                                    <td>Уточнить у менеджера</td>
                                    <?php
                                        endif;
                                    ?>
                                    <td>
                                        <button class="blue-btn table-btn add-to-cart" data-id="{{$subitem->id}}" data-name="{{$subitem->name}}" data-price="{{$price}}">Заказать</button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <?php
                        else:
                        ?>
                        <div class="buttom-line">
                            <button class="blue-btn add-to-cart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="0">Заказать</button>
                        </div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
@endsection
