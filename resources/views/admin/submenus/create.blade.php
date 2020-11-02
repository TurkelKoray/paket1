@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Alt Menü Ekleme </span>
    </div>

    <form id="form" action="/admin/submenus/store" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                    {{ csrf_field() }}

                        <div class="col-md-12 mb15 ph10">
                            <div class="section">
                                <label class="field select">
                                    <select id="menu_id" name="menu_id">
                                            <option  value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mb15 ph10">
                            <label for="name" class="field prepend-icon mb5">Alt Menü Adı </label>
                            <input name="name" type="text" class="gui-input form-control" value="" placeholder="Alt Menü Adı">
                            @if($errors->has("name"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("name") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6 mb15 ph10">
                            <label for="slug" class="field prepend-icon mb5"> Url  </label>
                            <input name="slug" type="text" class="gui-input form-control" value="" placeholder="Url">
                            @if($errors->has("slug"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("slug") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="title" class="field prepend-icon mb5"> Başlık </label>
                            <input name="title" type="text" class="gui-input form-control" value="" placeholder="Başlık">
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
                            <textarea class="gui-textarea form-control ckeditor" id="text1" name="text1" placeholder="Kısa Açıklama"></textarea>
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="text2" class="field prepend-icon mb5"> Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="text2" name="text2" placeholder="Açıklama"></textarea>

                        </div>


                        <div class="col-md-6 mb15 ph10 none">
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

                        <div style="display: none" class="col-md-12 mb15 ph10">

                            <label class="field prepend-icon append-button file">
                                <span class="button btn-primary">Resim Seç</span>
                                <input type="file" class="gui-file" name="headerimg" id="headerimg" onChange="document.getElementById('uploader2').value = this.value;">
                                <input type="text" class="gui-input" id="uploader2" placeholder="Resim Seç">
                                <label class="field-icon">
                                    <i class="fa fa-cloud-upload"></i>
                                </label>
                            </label>

                        </div>

                        <div style="display: none" class="col-md-6 mb15 ph10">
                            <div class="section">
                                <label class="field select">
                                    <select id="type" name="type">
                                        <option value="">Sayfa Tipi</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->value }}">{{ $type->name }}</option>
                                    @endforeach
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>

                        <div  class="col-md-12 mb15 ph10">
                            <label for="text2" class="field prepend-icon mb5"> Breadcrumb </label>
                            <div class="section">
                                <label class="field select">
                                    <select id="breadcrumb" name="breadcrumb">

                                        <option value="1">GÖSTER</option>
                                        <option value="0">GÖSTERME</option>

                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>



                        <div class="col-md-9 mt15">

                        </div>
                        <div class="col-md-3 mt15">
                            <button type="submit" class="btn btn-primary btn-block">KAYDET</button>
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
                    <a href="/admin/submenus/index/{{ $menu->id }}">Alt Menü Listesi</a>
                </li>
                <li class="active">
                    <a href="/admin/submenus/create/{{ $menu->id }}">Yeni Alt Menü</a>
                </li>
            </ul>
        </div>
    </header>
@endsection

@section('js')


    <script type="text/javascript">

        $("input[name=name]").on("keyup" , function () {

            var   slug = $("input[name=name]").val();

            $.ajax({
                type:'get',
                url:'/admin/slug/'+slug,
                data:slug,
                success:
                function(cevap){
                    $("input[name=slug]").val(cevap);
                }
            });



        });

    </script>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">

@endsection
