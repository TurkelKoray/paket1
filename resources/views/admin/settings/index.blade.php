@extends('layouts.admin.index')

@section('content')


    <div class="panel-heading">
        <span class="panel-title hidden-xs"> İletişim Bilgileri </span>
    </div>

    <form id="form" action="/admin/settings/update" method="post">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                    {{ csrf_field() }}
                        <div class="col-md-12 mb15 ph10">
                            <label for="email" class="field prepend-icon mb5"> E-mail </label>
                            <input name="email" type="text" class="gui-input form-control" value="{{ $contacts->email }}" placeholder="E-mail">
                            @if($errors->has("email"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("email") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="phone" class="field prepend-icon mb5"> Telefon </label>
                            <input name="phone" type="text" class="gui-input form-control" value="{{ $contacts->phone }}" placeholder="Phone">
                            @if($errors->has("phone"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("phone") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="gsm" class="field prepend-icon mb5"> Cep (gsm) </label>
                            <input name="gsm" type="text" class="gui-input form-control" value="{{ $contacts->gsm }}" placeholder="cep (gsm)">
                            @if($errors->has("gsm"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("gsm") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="fax" class="field prepend-icon mb5"> Fax </label>
                            <input name="fax" type="text" class="gui-input form-control" value="{{ $contacts->fax }}" placeholder="Fax">
                            @if($errors->has("fax"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("fax") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="address" class="field prepend-icon mb5"> Adres </label>
                            <textarea name="address"  class="gui-textarea form-control">{{ $contacts->address }}</textarea>
                            @if($errors->has("address"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("address") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="fax" class="field prepend-icon mb5"> Talep Formu Linki </label>
                            <input name="request_form_link" type="text" class="gui-input form-control" value="{{ $contacts->requestFormLink }}" placeholder="Talep Formu Linki">
                            @if($errors->has("fax"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("fax") }}
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
    @include("admin.settings.topbar")
@endsection

@section('js')



@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">
@endsection
