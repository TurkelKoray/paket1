@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Sayfa Düzenleme </span>
    </div>

    <form id="form" action="/admin/submenus/update/{{ $submenus->id }}" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                        {{ csrf_field() }}

                        <div class="col-md-12 mb15 ph10">
                            <div class="section">
                                <label class="field select">
                                    <select id="menu_id" name="menu_id">
                                        @foreach($menus as $menu)
                                            <option @php if($menu->id==$submenus->menu_id){ echo 'selected'; } @endphp value="{{ $menu->id }}">{{ $menu->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                            @if($errors->has("title"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("title") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6 mb15 ph10">
                            <label for="name" class="field prepend-icon mb5">Alt Menü Adı </label>
                            <input name="name" type="text" class="gui-input form-control" value="{{ $submenus->name }}" placeholder="Sayfa Adı">
                            @if($errors->has("title"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("title") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6 mb15 ph10">
                            <label for="slug" class="field prepend-icon mb5"> Url  </label>
                            <input name="slug" type="text" class="gui-input form-control" value="{{ $submenus->slug }}" placeholder="Url">
                            @if($errors->has("title"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("title") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="title" class="field prepend-icon mb5"> Başlık </label>
                            <input name="title" type="text" class="gui-input form-control" value="{{ $submenus->title }}" placeholder="Başlık">
                            @if($errors->has("title"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("title") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div style="display: none" class="col-md-12 mb15 ph10">
                            <label for="text1" class="field prepend-icon mb5"> Kısa Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="text1" name="text1" placeholder="Kısa Açıklama">{{ $submenus->text1 }}</textarea>

                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="text2" class="field prepend-icon mb5"> Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="text2" name="text2" placeholder="Açıklama">{{ $submenus->text2 }}</textarea>

                        </div>


                        <div class="col-md-12 none mb15 ph10">
                            <label for="text1" class="field prepend-icon mb5"> Menu Görseli  </label>
                            <label class="field prepend-icon append-button file">
                                <span class="button btn-primary">Resim Seç</span>
                                <input type="file" class="gui-file" name="img" id="img" onChange="document.getElementById('uploader1').value = this.value;">
                                <input type="text" class="gui-input" id="uploader1" placeholder="Resim Seç">
                                <label class="field-icon">
                                    <i class="fa fa-cloud-upload"></i>
                                </label>
                            </label>
                            @if($errors->has("img"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("img") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <input type="hidden" name="img" value="">

                        <div class="col-md-12 mb15 ph10">
                            <label for="text1" class="field prepend-icon mb5"> Sayfa Header Görseli  <span class="bg-danger"> ( 1600 X 160 boyutları önerilmektedir.) </span> </label>
                            <label class="field prepend-icon append-button file">
                                <span class="button btn-primary">Resim Seç</span>
                                <input type="file" class="gui-file" name="headerimg" id="headerimg" onChange="document.getElementById('uploader2').value = this.value;">
                                <input type="text" class="gui-input" id="uploader2" placeholder="Resim Seç">
                                <label class="field-icon">
                                    <i class="fa fa-cloud-upload"></i>
                                </label>
                            </label>
                        </div>
                        <input type="hidden" name="headerimg" value="">

                        <div style="display: none" class="col-md-6 mb15 ph10">
                            <div class="section">
                                <label class="field select">
                                    <select id="type" name="type">
                                        <option value="">Sayfa Tipi</option>
                                        @foreach($types as $type)
                                            <option @php if( $submenus->type == $type->value ){ echo "selected";} @endphp value="{{ $type->value }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="text1" class="field prepend-icon mb5"> Breadcrumb  </label>
                            <div class="section">
                                <label class="field select">
                                    <select id="breadcrumb" name="breadcrumb">
                                        <option @php if( $submenus->breadcrumb == 1 ){ echo "selected";} @endphp value="1">GÖSTER</option>
                                        <option @php if( $submenus->breadcrumb == 0 ){ echo "selected";} @endphp value="0">GÖSTERME</option>
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
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach

@endsection

@section('topbar')
    <header id="topbar" class="ph10">
        <div class="topbar-left">
            <ul class="nav nav-list nav-list-topbar pull-left">
                <li>
                    <a href="/admin/submenus/index/{{ $submenus->menu_id }}">Alt Menü Listesi</a>
                </li>
                <li class="active">
                    <a href="/admin/submenus/create/{{ $submenus->menu_id }}">Yeni Alt Menü</a>
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
