@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Sosyal Medya Ayarları </span>
    </div>

    <form id="form" action="/admin/settings/socialmediaupdate" method="post">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                    {{ csrf_field() }}
                        <div class="col-md-12 mb15 ph10">
                            <label for="facebook" class="field prepend-icon mb5">  Facebook </label>
                            <input name="facebook" type="text" class="gui-input form-control" value="{{ $contacts->facebook }}" placeholder="Facebook">
                            @if($errors->has("facebook"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("facebook") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="twitter" class="field prepend-icon mb5"> Twitter </label>
                            <input name="twitter" type="text" class="gui-input form-control" value="{{ $contacts->twitter }}" placeholder="Twitter">
                            @if($errors->has("twitter"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("twitter") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="googleplus" class="field prepend-icon mb5">  Instagram </label>
                            <input name="googleplus" type="text" class="gui-input form-control" value="{{ $contacts->googleplus }}" placeholder="Instagram">
                            @if($errors->has("googleplus"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("googleplus") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10 none">
                            <label for="pinteres" class="field prepend-icon mb5"> Pinteres </label>
                            <input name="pinteres" type="text" class="gui-input form-control" value="{{ $contacts->pinteres }}" placeholder="Pinteres">
                            @if($errors->has("pinteres"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("pinteres") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="linkedin" class="field prepend-icon mb5"> Linkedin </label>
                            <input name="linkedin" type="text" class="gui-input form-control" value="{{ $contacts->linkedin }}" placeholder="Linkedin">
                            @if($errors->has("linkedin"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("linkedin") }}
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

    @endsection
