@extends('layouts.site')

@section('content')
    <div class="container">
        <div class="topText">
            {{$topText}}
        </div>
        <div id="object-wrapper">
                {!! $article->content !!}
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