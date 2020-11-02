@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Video Galari  </span>
    </div>

    <form id="form" action="/admin/gallerys/videoupdate/{{ $video->id }}" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="col-md-8">
                        <div class="section row mbn">
                            {{ csrf_field() }}
                            <div class="col-md-12 mb15 ph10">
                                <label for="name" class="field prepend-icon mb5">  Başlık </label>
                                <input name="name" type="text" class="gui-input form-control" value="{{ $video->name }}" placeholder="Başlık">
                            </div>

                            <div class="col-md-12 mb15 ph10">
                                <label for="description" class="field prepend-icon mb5"> Video Url </label>
                                <textarea class="gui-textarea form-control" id="description" name="description">{{ $video->description }}</textarea>
                            </div>

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

                            <div class="col-md-12 mb15 ph10 none">
                                <div class="section">
                                    <label class="field select">
                                        <select id="state" name="state">

                                            <option @php if( $video->state == 1 ){ echo "selected";} @endphp value="1">Yayınla</option>
                                            <option @php if( $video->state == 0 ){ echo "selected";} @endphp value="0">Yayınlama</option>

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
                    <div class="col-md-4">
                        @if($video->img!="")
                            <img class="img-responsive" src="{{ asset("uploads/photogallery/$video->img") }}"/>
                        @else
                            <iframe width="95%" height="200" src="{!! $video->description !!}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                        @endif

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
                <li>
                    <a href="/admin/gallerys/create">Yeni Resim</a>
                </li>
                <li>
                    <a href="/admin/gallerys/index">Resim Listesi</a>
                </li>
                <li>
                    <a href="/admin/gallerys/videocreate">Yeni Video</a>
                </li>
                <li>
                    <a href="/admin/gallerys/videoindex">Video Listesi</a>
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