@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> FOTO GALERİ  </span>
    </div>

    <form id="form" action="/admin/gallerys/store" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                        {{ csrf_field() }}

                        <div class="col-md-12 mb15 ph10">
                            <label for="name" class="field prepend-icon mb5">  Başlık </label>
                            <input name="name" type="text" class="gui-input form-control"  placeholder="Başlık">
                        </div>

                        <div class="col-md-12 mb15 ph10 none">
                            <label for="description" class="field prepend-icon mb5"> Açıklama </label>
                            <textarea class="gui-textarea form-control" id="description" name="description" placeholder="Açıklama"></textarea>
                            <script language="javascript" type="text/javascript">
                                var oEdit1 = new InnovaEditor("oEdit1");
                                oEdit1.width = "100%";
                                oEdit1.height = 250;
                                oEdit1.returnKeyMode = 3
                                /*Enable Custom File Browser */
                                oEdit1.fileBrowser = "/LiveEditor/assetmanager/asset.php";
                                /*Apply stylesheet for the editing content*/
                                oEdit1.css = "/LiveEditor/styles/simple.css";
                                /*Render the editor*/
                                oEdit1.REPLACE("description");
                            </script>
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label class="field prepend-icon append-button file">
                                <span class="button btn-primary">Resim Seç</span>
                                <input type="file" class="gui-file" name="img[]" multiple id="img" onChange="document.getElementById('uploader1').value = this.value;">
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

                                        <option value="1">Yayınla</option>
                                        <option value="0">Yayınlama</option>

                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>


                        <div class="col-md-9 mt15">

                        </div>
                        <div class="col-md-3 mt15">
                            <button type="submit" class="btn btn-primary btn-block">YÜKLE</button>
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
                    <a href="/admin/gallerys/create">Yeni Resim</a>
                </li>
                <li>
                    <a href="/admin/gallerys/index">Resim Listesi</a>
                </li>
                <li>
                    <a href="/admin/gallerys/videocreate">Yeni Video</a>
                </li>
                <li>
                    <a href="/admin/gallerys/videocreate">Video Listesi</a>
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