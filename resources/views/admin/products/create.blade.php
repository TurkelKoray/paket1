@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Ürün Ekleme </span>
    </div>

    <form id="form" action="/admin/products/store" method="post" enctype="multipart/form-data">

        <div class="panel mb25 mt5">
            <div class="panel-body pn">
                <div class="tab-content pn br-n allcp-form theme-primary">
                    <div class="section row mbn">
                    {{ csrf_field() }}

                        <div class="col-md-12 mb15 ph10">
                            <div class="section">
                                <label class="field select">
                                    <select id="category_id" name="category_id">
                                        @foreach($categoryProducts as $categoryProduct)
                                            <option  value="{{ $categoryProduct->id }}">{{ $categoryProduct->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6 mb15 ph10">
                            <label for="name" class="field prepend-icon mb5">Ürün Adı </label>
                            <input name="name" type="text" class="gui-input form-control" value="" placeholder="Ürün Adı">
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
                            <input name="slug" type="text" class="gui-input form-control" value="{{ old("slug") }}" placeholder="Url">
                            @if($errors->has("slug"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("slug") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6 mb15 ph10">
                            <label for="title" class="field prepend-icon mb5"> Başlık </label>
                            <input name="title" type="text" class="gui-input form-control" value="{{ old("title") }}" placeholder="Başlık">
                            @if($errors->has("title"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("title") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-4 mb15 ph10">
                            <label for="price" class="field prepend-icon mb5"> Ürün Fiyatı </label>
                            <input name="price" type="text" class="gui-input form-control" value="{{ old("price") }}" placeholder="Fiyat">
                            @if($errors->has("price"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("price") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-2 mb15 ph10">
                            <label for="stock" class="field prepend-icon mb5"> Stok Adeti </label>
                            <input name="stock" type="text" class="gui-input form-control" value="{{ old("stock") }}" placeholder="Stok Adeti">
                            @if($errors->has("stock"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("stock") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div  class="col-md-12 mb15 ph10">
                            <label for="text1" class="field prepend-icon mb5"> Kısa Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="description" name="description" placeholder="Kısa Açıklama"></textarea>
                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="text2" class="field prepend-icon mb5"> Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="content" name="content" placeholder="Açıklama"></textarea>

                        </div>


                        <div class="col-md-12 mb15 ph10">
                            <label for="text2" class="field prepend-icon mb5"> Ürün Görseli </label>
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
    @include("admin.products.menu")
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
