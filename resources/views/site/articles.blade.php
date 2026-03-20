@extends('layouts.site')

@section('content')
    <div class="objects-list-wrapper">
        <div class="container">
            <div class="topText">
                {{$topText}}
            </div>
            <div class="row">

                @foreach($articles as $article)
                <div class="col-sm-6 ">
                    <div class="card border-primary mb-3" >
                        <div class="card-header bg-primary text-white"><b>{{$article->name}}</b></div>
                        <div class="card-body text-dark" style="height: auto">
                            <p class="card-text" style="text-align: justify;">
                               <?= mb_strimwidth(strip_tags($article->content),0,500,'...'); ?>
                            </p>
                            <a href="{{route('showArticlePage', $article)}}">Читать далее...</a>
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>
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
