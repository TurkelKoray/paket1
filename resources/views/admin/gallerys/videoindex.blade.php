@extends('layouts.admin.index')

@section('content')

    <div class="panel" id="spy3">
        <div class="panel-heading">
            <span class="panel-title">Video Galeri</span>

        </div>
        <div class="panel-body pn">
            <div id="gallerySirala" style="height:200px; position:relative;" class="rower">
                @foreach($videos as $video)
                    <div id="item-{{ $video->id }}" class="col-lg-3">
                        <div  style="width: 100% ; height:200px;  border: 1px solid #eee;">
                            @if($video->img!="")
                            <img class="gallerySirala" src="{{ asset("uploads/photogallery/$video->img") }}" width="100%" height="200px">
                            @else
                                <iframe width="95%" height="200" src="{!! $video->description !!}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                            @endif
                        </div>

                        <div style="width:50px; position:absolute; height:30px; margin-top:-190px; margin-left:5px; ">
                            <a class="btn btn-danger sil" id="{{ $video->id }}" href="#"> <span class="fa fa-trash fa"></span> </a>
                        </div>

                        <div style="width:100px; position:absolute; height:30px; margin-top:-190px; margin-left:60px;">
                            <a class="btn btn-primary" href="/admin/gallerys/videoedit/{{ $video->id }}">  <i class="fa fa-pencil-square-o fa"></i> </a>
                        </div>

                        <div class="slogan" id="{{ $video->id }}" style="width:100%; height:30px"> {{ $video->name }} </div>

                        <div style="width:100%; height:30px"></div>
                    </div>

                @endforeach
            </div>

        </div>
    </div>


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
                <li class="active">
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
                        url: "/admin/gallerys/destroy/"+id,
                        type: "GET"
                    }).done(function(data) {

                        swal("SİLİNDİ!", data, "success");

                        yenile(1500);

                    }).error(function(data) {
                        swal("SİLİNMEDİ !", data.icerik, "error");
                    });
                });

            });

            $( "#sirala" ).sortable({
                revert: true,
                handle: ".sirala",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');

                    $.ajax({
                        type: "GET",
                        data: data,
                        url: "/admin/gallerys/sliderSirala/urunSirala",
                        success: function(msg){
                            // alert( msg.islemMsj );
                        }
                    });
                }
            });
            $( "#sirala" ).disableSelection();

        });

    </script>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/sweetalert.css") }}">
@endsection