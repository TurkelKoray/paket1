@extends('layouts.admin.index')


@section("css")
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">
@endsection

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs">Bizden Haberler  Ekleme </span>
    </div>

    <form id="form" action="/admin/homecontent/store" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                    {{ csrf_field() }}

                        <div class="col-md-6 mb15 ph10">
                            <label for="title" class="field prepend-icon mb5"> Başlık  </label>
                            <input name="title" type="text" class="gui-input form-control" value="{{ old("title") }}" placeholder="Başlık Adı">

                            @if($errors->has("title"))
                                    <div style="margin-top: 5px" class="col-lg-12">
                                        <div class="alert alert-micro alert-warning alert-dismissable">
                                            {{ $errors->first("title") }}
                                        </div>
                                    </div>
                            @endif
                        </div>



                        <div class="col-md-6 mb15 ph10">
                            <label for="url" class="field prepend-icon mb5"> Url  </label>
                            <input name="url" type="text" class="gui-input form-control" value="{{ old("url") }}" placeholder="Url">
                            @if($errors->has("url"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("url") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="text2" class="field prepend-icon mb5"> Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="description" name="description" placeholder="Açıklama"></textarea>
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="text1" class="field prepend-icon mb5">  Görsel </label>
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

                        <div class="col-md-6 mb15 ph10 none">
                            <label for="text1" class="field prepend-icon mb5"> Menu Tipi  </label>
                            <div class="section">
                                <label class="field select">
                                    <select id="type" name="type">

                                        <option value="0">İkili Menu</option>
                                        <option value="1">Üçlü Menu</option>

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
    @include("admin.homecontent.topbarmenu")
@endsection

@section('js')
    <script type="text/javascript">

        $("input[name=title]").on("keyup" , function () {

            var   slug = $("input[name=title]").val();

            $.ajax({
                type:'get',
                url:'/admin/slug/'+slug,
                data:slug,
                success:
                function(cevap){
                    $("input[name=url]").val(cevap);
                }
            });

        });

        $("#form").submit(function (e) {

            e.preventDefault();
            // $("#file").remove();
            var inputCreate = "<input type='hidden' name='img' value=''>";
            $("#form").append(inputCreate);
            this.submit();
        })

    </script>

@endsection

