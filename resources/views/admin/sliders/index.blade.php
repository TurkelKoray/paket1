@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> SLİDER  </span>
    </div>

    <form id="form" action="/admin/sliders/store" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                        {{ csrf_field() }}
                        <div class="col-md-12 mb15 ph10">
                            <label for="name" class="field prepend-icon mb5">  Başlık </label>
                            <input name="title" type="text" class="gui-input form-control" value="{{ old('title') }}" placeholder="Başlık">
                            @if($errors->has("title"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("title") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="description" class="field prepend-icon mb5"> Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="description" name="description" placeholder="Açıklama">{{ old('description') }}</textarea>
                            @if($errors->has("description"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("description") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6 mb15 ph10">
                            <label for="img" class="field prepend-icon mb5"> Slider Seçimi </label>
                            <label class="field prepend-icon append-button file">
                                <span class="button btn-primary">Resim Seç</span>
                                <input type="file" class="gui-file" name="img[]" multiple id="img" onChange="document.getElementById('uploader1').value = this.value;">
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

                        <div class="col-md-6 mb15 ph10">
                            <label for="url" class="field prepend-icon mb5">  Url (Link bağlantısı)  </label>
                            <input name="url" type="url" class="gui-input form-control" value="{{ old('url') }}" placeholder="Url (Link bağlantısı)">
                            @if($errors->has("url"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("url") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div style="display: none" class="col-md-6 mb15 ph10">
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


                        <div class="col-md-9 mt15"> </div>

                        <div class="col-md-3 mt15">
                            <button type="submit" class="btn btn-primary btn-block">KAYDET</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>


    <div id="sliderSirala" style="height:200px; position:relative;" class="rower">
        @foreach($sliders as $slider)
            <div id="item-{{ $slider->id }}" class="col-lg-3">
                <div  style="width: 100% ; height:200px;  border: 1px solid #eee;">
                    <img class="sliderSirala" src="{{ asset("uploads/slider/$slider->img") }}" width="100%" height="200px">
                </div>

                <div style="width:50px; position:absolute; height:30px; margin-top:-200px; margin-left:5px; ">
                    <a style="color:red;" class="sil" id="{{ $slider->id }}"  href="#"> <span class="fa fa-trash fa-2x"></span> </a>
                </div>

                <div style="width:100px; position:absolute; height:30px; margin-top:-200px; margin-left:60px; color:red;">
                    <a style="color:red;" href="{{ asset("admin/sliders/edit/$slider->id") }}">  <i class="fa fa-pencil-square-o fa-2x"></i> </a>
                </div>

                <div class="slogan" id="{{ $slider->id }}" style="width:100%; height:30px"> {{ $slider->title }} </div>

                <div style="width:100%; height:30px"></div>
            </div>
        @endforeach
    </div>



@endsection

@section('topbar')
    <header id="topbar" class="ph10">
        <div class="topbar-left">
            <ul style="display: none" class="nav nav-list nav-list-topbar pull-left">
                <li class="active">
                    <a href="/admin/sliders/create">Yeni Slider</a>
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
    <script src="{{ asset("js/sweetalert.min.js") }}"></script>
    <script type="text/javascript">

        function yenile(time) {
            setInterval(function(){ location.reload(); }, time);
        }

        $(function () {

            $(".sil").on('click', function () {

                var id = $(this).attr("id");


                swal({
                    title: 'SİLMEK İSTEDİĞİNİZE EMİN MİSİNİZ ?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Sil!',
                    cancelButtonText: 'Hayır, Vazgeç!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }, function () {


                    $.ajax({
                        url: "/admin/sliders/delete/"+id,
                        type: "GET"
                    }).done(function(data) {
                        swal(data.title, data.content, data.type);
                         yenile(2000);

                    }).error(function(data) {
                        swal(data.title, data.content, "error");
                    });
                });

            });

            $( "#sliderSirala" ).sortable({
                revert: true,
                handle: ".sliderSirala",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');

                    $.ajax({
                        type: "GET",
                        data: data,
                        url: "/admin/sliders/sliderSirala/urunSirala",
                        success: function(msg){
                            // alert( msg.islemMsj );
                        }
                    });
                }
            });
            $( "#sliderSirala" ).disableSelection();

        });

    </script>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/sweetalert.css") }}">
@endsection
