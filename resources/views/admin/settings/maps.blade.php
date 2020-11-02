@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Harita Ayarları </span>
    </div>

    <form id="form" action="/admin/settings/mapsupdate" method="post">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                    {{ csrf_field() }}
                        <div class="col-md-12 mb15 ph10">
                            <label for="mapskey" class="field prepend-icon mb5"> Harita Key </label>
                            <input name="mapskey" type="text" class="gui-input form-control" value="{{ $contacts->mapskey }}" placeholder="Harita Key">
                            @if($errors->has("mapskey"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("mapskey") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10 none">
                            <label for="googleCode" class="field prepend-icon mb5"> Google Kodu </label>
                            <input name="googleCode" type="text" class="gui-input form-control" value="{{ $contacts->googleCode }}" placeholder="Google Kodu ">
                            @if($errors->has("googleCode"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("googleCode") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10 none">
                            <label for="longitude" class="field prepend-icon mb5"> Enlem  (Longitude) </label>
                            <input name="longitude" type="text" class="gui-input form-control" value="{{ $contacts->longitude }}" placeholder="Longitude">
                            @if($errors->has("longitude"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("longitude") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10 none">
                            <label for="latitude" class="field prepend-icon mb5"> Boylam (Latitude) </label>
                            <input name="latitude" type="text" class="gui-input form-control" value="{{ $contacts->latitude }}" placeholder="Latitude">
                            @if($errors->has("latitude"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("latitude") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-9 mt15">

                        </div>
                        <div class="col-md-3 mt15">
                            <button type="submit" class="btn btn-primary btn-block">GÜNCELLE</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach

    @endsection

@section('topbar')
    <header id="topbar" class="ph10">
        <div class="topbar-left">
            <ul class="nav nav-list nav-list-topbar pull-left">
                <li>
                    <a href="/admin/settings/index">İletişim Ayarları</a>
                </li>
                <li class="active">
                    <a href="/admin/settings/maps">Harita Ayarları</a>
                </li>
                <li>
                    <a href="/admin/settings/seo">Seo Ayarları</a>
                </li>
                <li>
                    <a href="/admin/settings/socialmedia">Sosyal Medya</a>
                </li>
                <li>
                    <a href="/admin/settings/ogimages">Site Ana Görseli</a>
                </li>
            </ul>
        </div>
        <div style="display: none;" class="topbar-right hidden-xs hidden-sm">
            <a href="#" class="btn btn-default btn-sm light fw600 ml10 mt5">
                <span class="fa fa-anchor pr5"></span> Button Link </a>
            <a href="#" class="btn btn-default btn-sm light fw600 ml10 mt5">
                <span class="fa fa-bullseye pr5"></span> Button Link </a>
            <a href="#" class="btn btn-default btn-sm light fw600 ml10 mt5">
                <span class="fa fa-external-link pr5"></span> Button Link </a>
        </div>
    </header>

    @endsection

@section('js')

    @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">
    @endsection
