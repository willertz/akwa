@extends("layouts.site")

@section("content")
    <div class="container">
        <div id="object-wrapper">
<div class="topText">
    {{$topText}}
</div>
            <?php
                if ($slider):
            ?>
            <div id="gallery" style="display:none;">
                @foreach($slider as $slide):
                <img alt="Preview Image 1"
                     src="{{$slide}}"
                     data-image="{{$slide}}">
                @endforeach
            </div>
            <?php
                    endif;
            ?>
            <p>
                {!!$object->content!!}
            </p>
        </div>
    </div>

    <script type="text/javascript" src="{{asset("unitegallery/js/unitegallery.min.js")}}"></script>
    <link rel="stylesheet" href="{{asset("unitegallery/css/unite-gallery.css")}}" type="text/css" />
    <script type="text/javascript" src="{{asset("unitegallery/themes/default/ug-theme-default.js")}}"></script>
    <link rel="stylesheet" href="{{asset("unitegallery/themes/default/ug-theme-default.css")}}" type="text/css" />
    <script type="text/javascript">
        $(document).ready(function(){
            $("#gallery").unitegallery();
        });
    </script>
@endsection