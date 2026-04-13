@extends('layouts.site')
@section('content')
    <!-- Portfolio section -->
    <section class="portfolio page">
        <!-- container -->
        <div class="container">
            <!-- Little section title -->
            <div class="page_title">
                НАШИ СТАТЬИ
            </div>
            <!-- Section title -->
            <div class="section_title">
                AKWAGARANT
            </div>
        </div>
        <!-- row -->
        <div class="row">
            @foreach($articles as $index => $article)
                <!-- Portfolio -->
                <a href="{{route('showArticlePage', $article)}}" class="portfolio_item {{ ($index % 6 == 0) ? 'half' : '' }}">
                    <!-- Item img -->
                    @if($article->preview)
                        <img src="{{ $article->preview }}" alt="{{ $article->preview_alt ?: $article->name }}" loading="lazy">
                    @else
                        <img src="{{asset('img/portfolio_item.jpg')}}" alt="{{$article->name}}">
                    @endif
                    <!-- Item top hover -->
                    <div class="item_top_hover">
                        <!-- Item title -->
                        <div class="item_title">{{$article->name}}</div>
                        <!-- Item description -->
                        <div class="description">
                            <?= mb_strimwidth(strip_tags($article->content), 0, 500, '...'); ?>
                        </div>
                    </div>
                    <!-- Item hover -->
                    <div class="hover_bottom">
                        <!-- Left side -->
                        <div class="left_side">
                            <!-- Item title -->
                            <div class="item_title">
                                {{$article->name}}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
