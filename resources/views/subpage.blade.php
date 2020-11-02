@extends('layouts.template')

@section('head')
    <title> {{ $submenu->title }} - {{ $settings->title }} </title>
    <meta name="description" content="{!! $submenu->title !!} " />
    <meta name="keywords" content="{{ $submenu->title }}" />
    <meta itemprop="name" content="{{ url()->full() }}" />
    <link rel="canonical" href="" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta itemprop="identifier" name="articleid" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:title" content="{!! $submenu->title !!}" />
    <meta property="og:site_name" content="{{ url()->full() }}" />
    <meta property="og:description" content="{!! $submenu->title !!}" />
    <meta property="og:image" content="{{ asset("uploads/submenu/".$submenu->img) }}" />
@endsection

@section('content')
    <div class="poster" style="background-image:url({{ asset("uploads/menu/".$menu->img) }})">
        <div class="ihover nobg">
            <div class="container">
                <div class="poster-in">
                    <h1>{{ $menu->name }}</h1>
                    @if($submenu->breadcrumb==1)
                    <ul class="breadcrumb bread-custom">
                        <li><a href="{{ asset("/".$lang) }}">@if($lang=="tr") ANA SAYFA @else HOME @endif</a></li>
                        <li><a href="#">{{ $menu->name }}</a></li>
                        <li>{{ $submenu->name }}</li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-in">
                        <h3 style="margin-bottom: 15px">{{ $submenu->name }}</h3>
                        <h5>{{ $menu->name }}</h5>
                        <div class="content-text">
                            {!! $submenu->title !!}
                            <hr style="height: 3px ">
                            {!! $submenu->text2 !!}
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')

@endsection