@extends('layouts.admin.index')

@section('content')

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> Ürün Düzenleme </span>
    </div>

    <form id="form" action="/admin/products/update/{{ $product["id"] }}" method="post" enctype="multipart/form-data">

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
                                            <option @php if($categoryProduct->id==$product["category_id"]){ echo 'selected'; } @endphp value="{{ $categoryProduct->id }}">{{ $categoryProduct->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="arrow"></i>
                                </label>
                            </div>
                            @if($errors->has("category_id"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("category_id") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6 mb15 ph10">
                            <label for="name" class="field prepend-icon mb5">Ürün Adı </label>
                            <input name="name" type="text" class="gui-input form-control" value="{{ $product["name"] }}" placeholder="Ürün Adı">
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
                            <input name="slug" type="text" class="gui-input form-control" value="{{ $product["slug"] }}" placeholder="Url">
                            @if($errors->has("slug"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("slug") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-8 mb15 ph10">
                            <label for="price" class="field prepend-icon mb5"> Ürün Fiyatı </label>
                            <input name="price" type="text" class="gui-input form-control" value="{{ $product["price"] }}" placeholder="Fiyat">
                            @if($errors->has("price"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("price") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-4 mb15 ph10">
                            <label for="stock" class="field prepend-icon mb5"> Stok Adeti </label>
                            <input name="stock" type="text" class="gui-input form-control" value="{{ $product["stock"] }}" placeholder="Stok Adeti">
                            @if($errors->has("stock"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("stock") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div  class="col-md-12 mb15 ph10">
                            <label for="description" class="field prepend-icon mb5"> Ürün Başlığı </label>
                            <textarea class="gui-textarea form-control ckeditor" id="title" name="title" placeholder="Ürün Başlığı">{{ $product["title"] }}</textarea>
                            @if($errors->has("title"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("title") }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div  class="col-md-12 mb15 ph10">
                            <label for="description" class="field prepend-icon mb5"> Kısa Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="description" name="description" placeholder="Kısa Açıklama">{{ $product["description"] }}</textarea>

                        </div>

                        <div class="col-md-12 mb15 ph10">
                            <label for="content" class="field prepend-icon mb5"> Açıklama </label>
                            <textarea class="gui-textarea form-control ckeditor" id="content" name="content" placeholder="Açıklama">{{ $product["content"] }}</textarea>
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
    @include("admin.products.menu")
@endsection

@section('js')


@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/allcp/forms/css/forms.css') }}">

@endsection
