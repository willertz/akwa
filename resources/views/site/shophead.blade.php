@extends('layouts.site')

@section('content')
    <div class="container p-5">
        <div class="topText">
            {{$topText}}
        </div>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-3">
                <div class="card cat-card-shop" style="width: 18rem;">
                    <a href="/catalog/{{$category->slug}}">
                    <h5 class="card-title shop-cat-title">{{$category->name}}</h5>
                    </a>
                    <a href="/catalog/{{$category->slug}}">
                        <?php
                        if ($category->preview):
                        ?>
                        <img class="card-img-top" style="width: 60% !important;"
                             src="{{$category->preview}}">
<?php
                                else:
?>
                            <img class="card-img-top"
                                 src="/userfiles/system/no_product.png" style="width: 70% !important;">
                        <?php
                                endif;
                        ?>
                    </a>
                </div>
            </div>
                @endforeach
            </div>

    </div>
    <style>
        .topText {
            background: #e6e6e6;
            padding: 20px;
            margin: 20px 0 40px 0;
            text-align: initial;
            font-weight: bold;
            font-size: 19px;
        }
    </style>
@endsection