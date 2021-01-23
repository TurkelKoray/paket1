@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Site Ana Resmi </span>
    </div>

    <form id="form" action="/admin/settings/logoupdate" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="col-md-8">
                        <div class="section row mbn">
                            {{ csrf_field() }}

                            <div class="col-md-12 mb15 ph10">
                                <label class="field prepend-icon append-button file">
                                    <span class="button btn-primary">Logo Seç</span>
                                    <input type="file" class="gui-file" name="img" id="img" onChange="document.getElementById('uploader1').value = this.value;">
                                    <input type="text" class="gui-input" id="uploader1" placeholder="Resim Seç">
                                    <label class="field-icon">
                                        <i class="fa fa-cloud-upload"></i>
                                    </label>
                                </label>
                            </div>

                            <div class="col-md-9 mt15">
                                        <input type="hidden" name="img">
                            </div>
                            <div class="col-md-3 mt15">
                                <button type="submit" class="btn btn-primary btn-block">GÜNCELLE</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive" src="{{ asset("uploads/$settings->logo") }}"
                    </div>
                </div>
            </div>
        </div>

    </form>

    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach

    @if($settings->img!="")
        <div class="row">
            <div class="col-md-12" style="position:relative;">
                <img class="img-responsive" src="{{ asset("uploads/$settings->img") }}">
            </div>
        </div>
    @endif


@endsection

@section('topbar')
    @include("admin.settings.topbar")
@endsection

@section('js')


@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">
@endsection