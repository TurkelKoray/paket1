@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Yönetici Ekleme </span>
    </div>

    <form id="form" action="/admin/users/update/{{ $user->id }}" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                        {{ csrf_field() }}
                        <div class="col-md-12 mb15 ph10">
                            <label for="name" class="field prepend-icon mb5"> Yönetici  Adı </label>
                            <input name="name" type="text" class="gui-input form-control" value="{{ $user->name }}" placeholder="Yönetici Adı">
                            @if($errors->has("name"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("name") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="email" class="field prepend-icon mb5"> Yönetici  Email </label>
                            <input name="email" type="text" class="gui-input form-control" value="{{ $user->email }}" placeholder="Yönetici Email">
                            @if($errors->has("email"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("email") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="password" class="field prepend-icon mb5"> Şifre  </label>
                            <input name="password" type="password" class="gui-input form-control" value="" placeholder="Şifre">
                            @if($errors->has("password"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("password") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <div class="section">
                                <label class="field select">
                                    <select id="yetki" name="yetki">
                                        <option @php if($user->yetki==10){ echo "selected";} @endphp value="10">Yönetici</option>
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>

                        <div style="display: none" class="col-md-12 mb15 ph10">
                            <label class="field prepend-icon append-button file">
                                <span class="button btn-primary">Resim Seç</span>
                                <input type="file" class="gui-file" name="img" id="img" onChange="document.getElementById('uploader2').value = this.value;">
                                <input type="text" class="gui-input" id="uploader2" placeholder="Resim Seç">
                                <label class="field-icon">
                                    <i class="fa fa-cloud-upload"></i>
                                </label>
                            </label>
                        </div>

                        <div class="col-md-9 mt15">

                        </div>
                        <div class="col-md-3 mt15">
                            <button type="submit" class="btn btn-primary btn-block">GUNCELLE</button>
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
                    <a href="/admin/users/userindex">Yönetici Listesi</a>
                </li>
                <li class="active">
                    <a href="/admin/users/usercreate">Yeni Yönetici</a>
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
