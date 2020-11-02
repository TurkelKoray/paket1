@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Menü Düzenleme </span>
    </div>

    <form id="form" action="/admin/menus/update/{{ $menus->id }}" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                        {{ csrf_field() }}
                        <div class="col-md-6 mb15 ph10">
                            <label for="name" class="field prepend-icon mb5"> Menu Adı </label>
                            <input name="name" type="text" class="gui-input form-control" value="{{ $menus->name }}" placeholder="Sayfa Adı">
                        </div>

                        <div class="col-md-6 mb15 ph10">
                            <label for="slug" class="field prepend-icon mb5"> Url  </label>
                            <input name="slug" type="text" class="gui-input form-control" value="{{ $menus->slug }}" placeholder="Url">
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="title" class="field prepend-icon mb5"> Başlık </label>
                            <input name="title" type="text" class="gui-input form-control" value="{{ $menus->title }}" placeholder="Başlık">
                        </div>

                        <div  class="col-md-12 mb15 ph10">
                            <label for="text1" class="field prepend-icon mb5"> Kısa Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="text1" name="text1" placeholder="Kısa Açıklama">{{ $menus->text1 }}</textarea>

                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="text2" class="field prepend-icon mb5"> Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="text2" name="text2" placeholder="Açıklama">{{ $menus->text2 }}</textarea>

                        </div>


                        <div class="col-md-4 mb15 ph10">
                            <label for="text1" class="field prepend-icon mb5"> Sayfa Görseli </label>
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

                        <div style="display: none" class="col-md-6 mb15 ph10">
                            <label for="text1" class="field prepend-icon mb5"> Menu Iconu  </label>
                            <label class="field prepend-icon append-button file">
                                <span class="button btn-primary">İcon Seç</span>
                                <input type="file" class="gui-file" name="headerimg" id="headerimg" onChange="document.getElementById('uploader2').value = this.value;">
                                <input type="text" class="gui-input" id="uploader2" placeholder="İcon Seç">
                                <label class="field-icon">
                                    <i class="fa fa-cloud-upload"></i>
                                </label>
                            </label>

                        </div>

                        <div class="col-md-4 mb15 ph10">
                            <label for="text1" class="field prepend-icon mb5"> Menu Tipi  </label>
                            <div class="section">
                                <label class="field select">
                                    <select id="type" name="type">
                                        <option value="hs">Menu Tipi</option>
                                        @foreach($types as $type)
                                            <option @php if( $menus->type == $type->value ){ echo "selected";} @endphp value="{{ $type->value }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>



                        <div class="col-md-4 mb15 ph10">
                            <label for="text1" class="field prepend-icon mb5"> Breadcrumb  </label>
                            <div class="section">
                                <label class="field select">
                                    <select id="breadcrumb" name="breadcrumb">
                                        <option @php if( $menus->breadcrumb == 1 ){ echo "selected";} @endphp value="1">GÖSTER</option>
                                        <option @php if( $menus->breadcrumb == 0 ){ echo "selected";} @endphp value="0">GÖSTERME</option>
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>

                        <div style="display: none" class="col-md-4 mb15 ph10">
                            <div class="section">
                                <label class="field select">
                                    <select id="homeshow" name="homeshow">

                                        <option @php if( $menus->homeshow == 1 ){ echo "selected";} @endphp value="1">Menüde Göster</option>
                                        <option @php if( $menus->homeshow == 2 ){ echo "selected";} @endphp value="2">Hızlı Erişimde Göster</option>
                                        <option @php if( $menus->homeshow == 0 ){ echo "selected";} @endphp value="0">Sayfa İçinde Göster</option>

                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-3 mb15 ph10 none">
                            <div class="section">
                                <label class="field select">
                                    <select id="acilirmenu" name="acilirmenu">

                                        <option @php if( $menus->acilirmenu == 1 ){ echo "selected";} @endphp value="1">Açılır Menü  Göster</option>
                                        <option @php if( $menus->acilirmenu == 0 ){ echo "selected";} @endphp value="0">Açılır Menü  Gösterme</option>

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

    @if($menus->img!="")
    <div class="row">
        <div class="col-md-12" style="position:relative;">
            <div style=" position:absolute;  margin:5px; ">
                <a class="btn btn-danger resimsil" id="{{ $menus->id }}" onclick="return siluyari();"> <span class="fa fa-trash fa-2x"></span> </a>
            </div>
            <img class="img-responsive" src="{{ asset("uploads/menu/$menus->img") }}">
        </div>
    </div>
    @endif

@endsection

@section('topbar')
    <header id="topbar" class="ph10">
        <div class="topbar-left">
            <ul class="nav nav-list nav-list-topbar pull-left">
                <li>
                    <a href="/admin/menus/index">Menu Listesi</a>
                </li>
                <li class="active">
                    <a href="/admin/menus/create">Yeni Menu</a>
                </li>
            </ul>
        </div>
    </header>
@endsection

@section('js')
    <script src="{{ asset("js/sweetalert.min.js") }}"></script>

    <script type="text/javascript">

        function yenile(time) {
            setInterval(function(){ location.reload(); }, time);
        }
        function siluyari()
        {
            var id = $(".resimsil").attr("id");

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
                    url: "/admin/menus/resimsil/"+id,
                    type: "GET"
                }).done(function(data) {
                    swal("SİLİNDİ!", data, "success");
                    setInterval(function(){ location.reload(); }, 1000);
                }).error(function(data) {
                    swal("SİLİNMEDİ !", data.icerik, "error");
                });
            });

        }


    </script>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}">
@endsection
