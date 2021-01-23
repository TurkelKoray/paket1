@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Email Ayarları </span>
    </div>

    <form id="form" action="/admin/settings/emailsettingsupdate" method="post">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                    {{ csrf_field() }}
                        <div class="col-md-12 mb15 ph10">
                            <label for="hostname" class="field prepend-icon mb5"> Host Name </label>
                            <input name="hostname" type="text" class="gui-input form-control" value="{{ $contacts->hostname }}" placeholder="Host Name">
                            @if($errors->has("hostname"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("hostname") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="username" class="field prepend-icon mb5"> User Name </label>
                            <input name="username" type="text" class="gui-input form-control" value="{{ $contacts->username }}" placeholder="User Name">
                            @if($errors->has("username"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("username") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="pasword" class="field prepend-icon mb5"> Password </label>
                            <input name="pasword" type="password" class="gui-input form-control" value="{{ $contacts->pasword }}" placeholder="Password">
                            @if($errors->has("pasword"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("pasword") }}
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
    @include("admin.settings.topbar")

@endsection

@section('js')

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">
@endsection
