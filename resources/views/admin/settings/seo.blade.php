@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Seo Ayarları </span>
    </div>

    <form id="form" action="/admin/settings/seoupdate" method="post">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                    {{ csrf_field() }}
                        <div class="col-md-12 mb15 ph10">
                            <label for="title" class="field prepend-icon mb5">  Başlık (title) </label>
                            <input name="title" type="text" class="gui-input form-control" value="{{ $contacts->title }}" placeholder="Başlık (title)">
                            @if($errors->has("title"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("title") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="description" class="field prepend-icon mb5"> Açıklama (description)</label>
                            <textarea class="gui-textarea form-control" id="description" name="description" placeholder="Açıklama (description)">{{ $contacts->description }}</textarea>
                            @if($errors->has("description"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("description") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="keywords" class="field prepend-icon mb5"> Anahtar Kelimeler  (Keywords) </label>
                            <input name="keywords" type="text" class="gui-input form-control" value="{{ $contacts->keywords }}" placeholder="keywords">
                            @if($errors->has("keywords"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("keywords") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="footer" class="field prepend-icon mb5"> Footer  </label>
                            <textarea class="gui-textarea form-control" id="footer" name="footer">{!! $contacts->footer !!} </textarea>
                            @if($errors->has("footer"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("footer") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="footerdesc" class="field prepend-icon mb5"> Anasayfa Video (İframe Kodu)  </label>
                            <input name="footerdesc" type="text" class="gui-input form-control" value="{{ $contacts->footerdesc }}" placeholder="Anasayfa Video (İframe Kodu) ">
                            @if($errors->has("footerdesc"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("footerdesc") }}
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
