@extends("layouts.paket1")

@section("metatag")
@endsection

@section("head")
@endsection

@section("content")
    <div class="poster" style='background-image:url("{{ asset("uploads/submenu/".$submenu->headerimg) }}")'>
        <div class="ihover nobg">
            <div class="container">
                <div class="poster-in">
                    <h1>{{ $submenu->name }}</h1>
                    @if($submenu->breadcrumb==1)
                        <ul class="breadcrumb bread-custom">
                            <li><a href="{{ asset("/") }}">ANASAYFA</a></li>
                            <li>{{ $menu->name }}</li>
                            <li>{{ $submenu->name }}</li>
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
                        <h3>{{ $submenu->name }}</h3>
                        <h5>{{ $menu->name }}</h5>
                        <div class="content-text">
                            {{ $submenu->title }}
                        </div>
                        <div class="product-boxes">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-sm-4">
                                        <div class="product-box">
                                            <a href="#" class="product-link"><img
                                                    src="{{ asset("uploads/products/".$product->img) }}"
                                                    class="img-responsive btn-block"/></a>
                                            <h4><a href="#" class="anim">{{ $product->name }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div class="ipager">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                    </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                    </a>
                                </li>
                            </ul>
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
                            <li data-active="{{ $i }}" @if($submenu->slug==$allCategoryProduct->slug) class="active" @endif>
                                <i class="fa fa-lg fa-angle-right fa-active-hidden"></i><i
                                    class="fa fa-lg fa-angle-down fa-active-show"></i>
                                <a href="#{{ $allCategoryProduct->slug }}">{{ $allCategoryProduct->name }}</a>
                                <ul data-active-in="{{ $i }}" @if($submenu->slug==$allCategoryProduct->slug) style="display: block;" class="active" @endif>
                                    @foreach($allCategoryProduct->categoryProducts as $catProduct)
                                    <li @if($catProduct->slug==$productSlugName) class="active" @endif><a href="#">{{ $catProduct->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </ul>
                    </div>

                    <div class="side-box hvr-shadow hvr-outline-out" style="background-image:url(images/support.png);">
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
@endsection

@section("customjs")
@endsection

