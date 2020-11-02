@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Site Ana Resmi </span>
    </div>

    <form id="form" action="/admin/settings/ogimagesupdate" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="col-md-8">
                        <div class="section row mbn">
                            {{ csrf_field() }}

                            <div class="col-md-12 mb15 ph10">
                                <label class="field prepend-icon append-button file">
                                    <span class="button btn-primary">Resim Seç</span>
                                    <input type="file" class="gui-file" name="img" id="img" onChange="document.getElementById('uploader1').value = this.value;">
                                    <input type="text" class="gui-input" id="uploader1" placeholder="Resim Seç">
                                    <label class="field-icon">
                                        <i class="fa fa-cloud-upload"></i>
                                    </label>
                                </label>
                            </div>

                            <div class="col-md-9 mt15">

                            </div>
                            <div class="col-md-3 mt15">
                                <button type="submit" class="btn btn-primary btn-block">GÜNCELLE</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive" src="{{ asset("uploads/$contacts->ogimages") }}"
                    </div>
                </div>
            </div>
        </div>

    </form>

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach

    @if($contacts->img!="")
        <div class="row">
            <div class="col-md-12" style="position:relative;">
                <img class="img-responsive" src="{{ asset("uploads/$contacts->img") }}">
            </div>
        </div>
    @endif


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