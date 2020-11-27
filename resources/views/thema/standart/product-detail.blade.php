@extends('layouts.paket1')

@section('head')
    <title> {{ $menu->title }} - {{ $settings->title }} </title>
    <meta name="description" content="{!! $menu->text1 !!} "/>
    <meta name="keywords" content="{{ $menu->title }}"/>
    <meta itemprop="name" content="{{ url()->full() }}"/>
    <link rel="canonical" href=""/>
    <meta property="og:url" content="{{ url()->full() }}"/>
    <meta itemprop="identifier" name="articleid" content=""/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ url()->full() }}"/>
    <meta property="og:title" content="{!! $menu->text1 !!}"/>
    <meta property="og:site_name" content="{{ url()->full() }}"/>
    <meta property="og:description" content="{!! $menu->text1 !!}"/>
    <meta property="og:image" content="{{ asset("uploads/menu/".$menu->img) }}"/>

    <style>
        .uyari{
            font-size: 20px;
            text-align: center;
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="poster" style="background-image:url({{ asset("uploads/menu/".$menu->img) }})">
        <div class="ihover nobg">
            <div class="container">
                <div class="poster-in">
                    <h1>{{ $menu->name }}</h1>
                    @if($menu->breadcrumb==1)
                        <ul class="breadcrumb bread-custom">
                            <li><a href="{{ asset("/") }}"> ANA SAYFA </a></li>
                            <li>{{ $menu->name }}</li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-4">
                    <div class="content-in">
                        <div class="product-detail">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-box">
                                        <a href="{{ asset("uploads/products/".$product->img) }}" rel="m1"
                                           class="product-link fancybox"><img
                                                    src="{{ asset("uploads/products/".$product->img) }}"
                                                    class="img-responsive btn-block"/></a>
                                        @if(!empty($productGalleries->count()))
                                        <div class="product-slide">
                                            <ul>
                                                @foreach($productGalleries as $productGallery)
                                                    <li><a class="fancybox" rel="m1"
                                                           href="{{ asset("uploads/products/".$productGallery->img) }}"><img
                                                                    src="{{ asset("uploads/products/".$productGallery->img) }}"
                                                                    class="btn-block img-responsive"/></a></li>
                                                @endforeach
                                            </ul>
                                            <div class="product-controls">
                                                <a onclick="bxslider.goToPrevSlide();" class="left"><i
                                                            class="fa fa-arrow-circle-left"></i></a>
                                                <a onclick="bxslider.goToNextSlide();" class="right"><i
                                                            class="fa fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h3>{{ $product->name }}</h3>
                                    <h5>{{ $submenu->name }}</h5>
                                    <div class="content-text">
                                        {!!  $product->title  !!}
                                    </div>
                                    <a href="#" class="btn-apply orange anim hvr-bounce-in get-order" data-toggle="modal"
                                       data-target="#myModal">SİPARİŞ VER</a>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                    @csrf
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="itabs">
                            <div class="col-sm-3">
                                <div class="row">
                                    <a class="itab anim active" data-active="1">ÜRÜN AÇIKLAMASI</a>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="row">
                                    <a class="itab anim" data-active="2"> ÖZELLİKLERİ</a>
                                </div>
                            </div>
                            <div class="col-sm-3 none d-none" style="display: none">
                                <div class="row">
                                    <a class="itab anim" data-active="3">BELGELER</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="itabs-in">
                                <div class="itab-in active" data-active-in="1">
                                    <div class="content-text">
                                        {!!  $product->description  !!}
                                    </div>
                                </div>
                                <div class="itab-in" data-active-in="2">
                                    {!!  $product->content  !!}
                                </div>
                                <div class="itab-in" data-active-in="3">3</div>
                            </div>
                        </div>

                        <div class="product-boxes">
                            <h2>BU KATEGORİDEKİ DİĞER ÜRÜNLER</h2>
                            <div class="row">
                                @foreach($otherProducts as $otherProduct)
                                    <div class="col-sm-4">
                                        <div class="product-box hvr-glow">
                                            <a href="{{ asset($otherProduct->productCategory->menu->slug."/".$otherProduct->productCategory->slug."/".$otherProduct->slug.".html") }}"
                                               class="product-link fancybox" title="{{ $otherProduct->name }}"
                                               rel="Group1"><img
                                                        src="{{ asset("uploads/products/".$otherProduct->img) }}"
                                                        class="img-responsive btn-block"/></a>
                                            <h4><a href="#" class="anim">{{ $otherProduct->name }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-8">
                    <div class="side-menu">
                        <ul>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($allCategoryProducts as $allCategoryProduct)
                                <li data-active="{{ $i }}"
                                    @if($submenu->slug==$allCategoryProduct->slug) class="active" @endif>
                                    <i class="fa fa-lg fa-angle-right fa-active-hidden"></i><i
                                            class="fa fa-lg fa-angle-down fa-active-show"></i>
                                    <a href="#{{ $allCategoryProduct->slug }}"> {{ $allCategoryProduct->name }}</a>
                                    <ul data-active-in="{{ $i }}"
                                        @if($submenu->slug==$allCategoryProduct->slug) style="display: block;"
                                        class="active" @endif>
                                        @foreach($allCategoryProduct->categoryProducts as $catProduct)
                                            <li @if($catProduct->slug==$productSlugName) class="active" @endif><a
                                                        href="{{ asset($catProduct->productCategory->menu->slug."/".$catProduct->productCategory->slug."/".$catProduct->slug.".html") }}">{{ $catProduct->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </ul>
                    </div>


                    <div class="side-box hvr-shadow hvr-outline-out"
                         style="background-image:url({{ asset("thema/standart/images/support.png") }});">
                        <div class="row">
                            <div class="col-md-10">
                                <h2>Müşteri Talep Formu</h2>
                                <div class="side-text">Tüm talep ve istekleriniz için bu formu doldurabilirsiniz.</div>
                                <a href="#" class="btn-apply anim hvr-grow">TALEP FORMU</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal imodal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i
                            class="fa fa-lg fa-power-off"></i></button>
                <div class="modal-body">
                    <a href="#" class="btn-apply green btn-block anim hvr-bounce-in m-25 m-xs-15 mb get-order-send">SİPARİŞ
                                                                                                               VER</a>
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-lg">
                                    <input type="text" name="order_name" class="form-control form-inputs"
                                           placeholder="Ad Soyad"/>
                                </div>
                                <div class="form-group form-group-lg">
                                    <input type="text" name="order_email" class="form-control form-inputs"
                                           placeholder="E-Posta"/>
                                </div>
                                <div class="form-group form-group-lg">
                                    <input type="text" name="order_phone" class="form-control form-inputs"
                                           placeholder="Telefon"/>
                                </div>
                                <div class="form-group form-group-lg">
                                    <input type="text" name="order_product_name"
                                           class="form-control form-inputs readonly" readonly value=""/>
                                </div>
                            </div>
                            <div class="form-group form-group-lg">
                                <textarea class="form-control form-inputs" name="order_address" rows="6"
                                          placeholder="Gönderim Adresi" style="resize:vertical;"></textarea>
                            </div>
                            <div class="clearfix"></div>
                            <div class="uyari"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')

    <script>

        $(".get-order").on("click", function () {

            var productId = $("input[name=product_id]").val();
            var productName = $("input[name=product_name]").val();
            $("input[name=order_product_name]").val(productName);

        });

        $(".get-order-send").on("click", function () {

            var _token = $("input[name=_token]").val();
            var productId = $("input[name=product_id]").val();
            var order_name = $("input[name=order_name]").val();
            var order_email = $("input[name=order_email]").val();
            var order_phone = $("input[name=order_phone]").val();
            var order_product_name = $("input[name=order_product_name]").val();
            var order_address = $("textarea[name=order_address]").val();

            $.ajax({
                url: '{{ url("get-order") }}',
                type: 'POST',
                dataType: 'json',
                data: {"_token":_token,"productId": productId, "orderName": order_name,"orderEmail": order_email, "orderPhone": order_phone, "orderAddress": order_address},
                success: function (gelenveri) {
                    $(".uyari").html(gelenveri.title);
                    if(gelenveri.type!="error"){
                        setTimeout(function(){ location.reload(); }, 3000);
                    }

                },
                error: function (hata) {

                }
            });

        });

    </script>


@endsection