@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> {{ $menu['name'] }} galerisi </span>
    </div>

    <form id="form" action="/admin/menus/galleryadd/{{ $menu['id'] }}" method="post" enctype="multipart/form-data">

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
                            <label class="field prepend-icon append-button file">
                                <span class="button btn-primary">Resim Seç</span>
                                <input type="file" class="gui-file" name="img[]" multiple id="img" onChange="document.getElementById('uploader1').value = this.value;">
                                <input type="text" class="gui-input" name="img" id="uploader1" placeholder="Resim Seç">
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

    <div id="gallerySirala" style="height:200px; position:relative;" class="rower">
        @foreach($gallerys as $gallery)
            <div id="item-{{ $gallery->id }}" class="col-lg-3">
                <div  style="width: 100% ; height:200px;  border: 1px solid #eee;">
                    <img class="gallerySirala" src="{{ asset("uploads/menu/$gallery->img") }}" width="100%" height="200px">
                </div>

                <div style="width:50px; position:absolute; height:30px; margin-top:-200px; margin-left:5px; ">
                    <a style="color:red;" href="#"  id="{{$gallery->id}}" class="delete"> <span class="fa fa-trash fa-2x"></span> </a>
                </div>

                <div style="width:100px; position:absolute; height:30px; margin-top:-200px; margin-left:60px; color:red; display: none">
                    <a style="color:red;" href="#"> DÜZENLE <i class="fa fa-pencil-square-o fa-2x"></i> </a>
                </div>

                <div class="slogan" id="{{ $gallery->id }}" style="width:100%; height:30px"> {{ $gallery->title }} </div>

                <div style="width:100%; height:30px"></div>
            </div>
        @endforeach
    </div>



@endsection

@section('topbar')
    <header id="topbar" class="ph10">
        <div class="topbar-left">
            <ul class="nav nav-list nav-list-topbar pull-left">
                <li>
                    <a href="/admin/menus/index">Menü Listesi</a>
                </li>
            </ul>
        </div>
    </header>
@endsection

@section('js')
    <script src="{{ asset("js/sweetalert.min.js") }}"></script>
    <script type="text/javascript">
        $(function () {

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



        $( "#gallerySirala" ).sortable({
            revert: true,
            handle: ".gallerySirala",
            stop: function (event, ui) {
                var data = $(this).sortable('serialize');

                $.ajax({
                    type: "GET",
                    data: data,
                    url: "/admin/products/gallerySirala/urunSirala",
                    success: function(msg){
                        // alert( msg.islemMsj );
                    }
                });
            }
        });
        $( "#gallerySirala" ).disableSelection();



            $(".delete").on('click', function () {

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
                        url: "/admin/menus/gallerydelete/" + id,
                        type: "GET"
                    }).done(function (data) {
                        swal(data.title, data.content, data.type);
                         setInterval(function(){ location.reload(); }, 1000);
                    }).error(function (data) {
                        swal(data.title, data.content, "error");
                    });
                });

            });

        });

    </script>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/sweetalert.css") }}">
@endsection
