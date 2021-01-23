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
                                            <a href="{{ asset($product->productCategory->menu->slug."/".$product->productCategory->slug."/".$product->slug.".html") }}"
                                               class="product-link"><img
                                                        src="{{ asset("uploads/products/".$product->img) }}"
                                                        class="img-responsive btn-block"/></a>
                                            <h4>
                                                <a href="{{ asset($product->productCategory->menu->slug."/".$product->productCategory->slug."/".$product->slug.".html") }}"
                                                   class="anim">{{ $product->name }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        @if($totalPages>1)
                            <div class="ipager">
                                <ul class="pagination">
                                    <li>
                                        <a href="{{ asset($menu->slug."/".$submenu->slug."&sayfa=".$previous) }}"
                                           aria-label="Previous">
                                            <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                        </a>
                                    </li>
                                    @for($k=1; $k <= $totalPages ; $k++)
                                        <li @if($k==$page) class="active" @endif ><a href="{{ asset($menu->slug."/".$submenu->slug."&sayfa=".$k) }}">{{ $k }}</a></li>
                                    @endfor
                                    <li>
                                        <a href="{{ asset($menu->slug."/".$submenu->slug."&sayfa=".$next) }}"
                                           aria-label="Next">
                                            <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-8">
                    @include("include.sideMenu")
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

@section("customjs")
@endsection

