@extends('layouts.site')

@section('content')
    <div class="objects-list-wrapper">
        <div class="container">
            <div class="row">

                @foreach($objects as $object)
                <div class="col-sm-6 ">
                    <div class="card" style="width: 100%;    ">
                        <img src="{{$object->preview_pict}}" class="card-img-top">
                        <div class="card-body" style="min-height: 333px; height: auto;">
                            <h5 class="card-title">{{$object->name}}</h5>
                            <p class="card-text"><?= mb_strimwidth(strip_tags($object->content),0,500,'...'); ?></p>
                            <a href="{{route('showObjectPage', $object)}}">Подробнее</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
