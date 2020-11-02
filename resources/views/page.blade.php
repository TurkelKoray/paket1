@extends('layouts.template')

@section('head')
    <title> {{ $menu->title }} - {{ $settings->title }} </title>
    <meta name="description" content="{!! $menu->text1 !!} " />
    <meta name="keywords" content="{{ $menu->title }}" />
    <meta itemprop="name" content="{{ url()->full() }}" />
    <link rel="canonical" href="" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta itemprop="identifier" name="articleid" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:title" content="{!! $menu->text1 !!}" />
    <meta property="og:site_name" content="{{ url()->full() }}" />
    <meta property="og:description" content="{!! $menu->text1 !!}" />
    <meta property="og:image" content="{{ asset("uploads/menu/".$menu->img) }}" />
@endsection

@section('content')
    <div class="poster" style="background-image:url({{ asset("uploads/menu/".$menu->img) }})">
        <div class="ihover nobg">
            <div class="container">
                <div class="poster-in">
                    <h1>{{ $menu->name }}</h1>
                    @if($menu->breadcrumb==1)
                    <ul class="breadcrumb bread-custom">
                        <li><a href="{{ asset("/".$lang) }}">@if($lang=="tr") ANA SAYFA @else HOME @endif</a></li>
                        <li>{{ $menu->name }}</li>
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
                        <h3 style="margin-bottom: 15px">{{ $menu->name }}</h3>
                        <div class="content-text">
                            {!! $menu->title !!}
                            <hr style="height: 3px ">
                            {!! $menu->text1 !!}
                            <div style="width: 100%; height: 10px"></div>
                            {!! $menu->text2 !!}
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