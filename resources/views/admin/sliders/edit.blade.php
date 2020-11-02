@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> SLİDER  </span>
    </div>

    <form id="form" action="/admin/sliders/update/{{ $slider->id }}" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                        {{ csrf_field() }}
                        <div class="col-md-12 mb15 ph10">
                            <label for="name" class="field prepend-icon mb5">  Başlık </label>
                            <input name="title" type="text" class="gui-input form-control" value="{{ $slider->title }}" placeholder="Başlık">
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="description" class="field prepend-icon mb5"> Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="description" name="description" placeholder="Açıklama">{{ $slider->description }}</textarea>
                        </div>

                        <div class="col-md-6 mb15 ph10">
                            <label for="url" class="field prepend-icon mb5"> Görsel Seçimi </label>
                            <label class="field prepend-icon append-button file">
                                <span class="button btn-primary">Resim Seç</span>
                                <input type="file" class="gui-file" name="img" id="img" onChange="document.getElementById('uploader1').value = this.value;">
                                <input type="text" class="gui-input" id="uploader1" placeholder="Resim Seç">
                                <label class="field-icon">
                                    <i class="fa fa-cloud-upload"></i>
                                </label>
                            </label>
                        </div>
                        <input type="hidden" name="img" value="">

                        <div class="col-md-6 mb15 ph10">
                            <label for="url" class="field prepend-icon mb5"> Url (Link bağlantısı) </label>
                            <input name="url" type="url" class="gui-input form-control" value="{{ $slider->url }}" placeholder="Url (Link bağlantısı)">
                        </div>

                        <div style="display: none" class="col-md-6 mb15 ph10">
                            <div class="section">
                                <label class="field select">
                                    <select id="state" name="state">

                                        <option @php if( $slider->state == 1 ){ echo "selected";} @endphp value="1">Yayınla</option>
                                        <option @php if( $slider->state == 0 ){ echo "selected";} @endphp value="0">Yayınlama</option>

                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
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
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach



@endsection

@section('topbar')
    <header id="topbar" class="ph10">
        <div class="topbar-left">
            <ul class="nav nav-list nav-list-topbar pull-left">
                <li class="active">
                    <a href="/admin/sliders/index">Yeni Listesi</a>
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
