@extends('layouts.paket1')

@section('head')
    <title>  {{ $settings->title }} </title>
    <meta name="description" content="{!! $settings->description !!} " />
    <meta name="keywords" content="{{ $settings->keywords }}" />
    <meta itemprop="name" content="{{ url()->full() }}" />
    <link rel="canonical" href="" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta itemprop="identifier" name="articleid" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:title" content="{!! $settings->title !!}" />
    <meta property="og:site_name" content="{{ url()->full() }}" />
    <meta property="og:description" content="{!! $settings->description !!}" />
    <meta property="og:image" content="{{ asset("uploads/".$settings->ogimages) }}" />
@endsection

@section("content")

    <div class="poster" style="background-image:url({{ asset("thema/standart/images/page.jpg") }})">
        <div class="ihover nobg">
            <div class="container">
                <div class="poster-in">
                    <h1>BİZDEN HABERLER</h1>
                    <ul class="breadcrumb bread-custom">
                        <li><a href="{{ url("/") }}">ANA SAYFA</a></li>
                        <li>{{ $menu["title"] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-4">
                    <div class="content-in">
                        <h3>{{  $menu["title"] }}</h3>
                        <div class="content-text">
                            @if(!empty($menu["img"]))
                            <a href="{{ url()->full() }}" class="content-link"><img src="{{ asset("uploads/home/".$menu["img"]) }}" class="img-responsive btn-block" /></a>
                            @endif

                            {!!  $menu["description"] !!}
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-md-pull-8">
                    @include("include.sideMenuSecond")
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

@section("customjs")

@endsection