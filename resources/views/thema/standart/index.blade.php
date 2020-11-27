@extends("layouts.paket1")

@section("metatag")
    <title>  {{ $settings->title }} </title>
    <meta name="description" content="{!! $settings->description !!} " />
    <meta name="keywords" content="{{ $settings->keywords }}" />
    <meta itemprop="name" content="{{ url()->full() }}" />
    <link rel="canonical" href="" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta itemprop="identifier" name="articleid" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:title" content="{!! $settings->title !!}" />
    <meta property="og:site_name" content="{{ url()->full() }}" />
    <meta property="og:description" content="{!! $settings->description !!}" />
    <meta property="og:image" content="{{ asset("uploads/".$settings->ogimages) }}" />
@endsection

@section("head")
@endsection

@section("content")
    <div class="slide">
        <ul>
            @foreach($sliders as $slider)
                <li>
                    <div class="slide-image">
                        <div class="ihover nobg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7 col-sm-9">
                                        <div class="slide-content">
                                            <h1>{{$slider->title}}</h1>
                                            <div class="slide-text hidden-xs">
                                                {!! $slider->description !!}
                                            </div>
                                            @if(!empty($slider->url))
                                                <a href="{{$slider->url}}" class="btn-apply anim"><span class="iblock m-50 mx m-x-0">DEVAMI</span></a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset("uploads/slider/".$slider->img) }}" class="img-responsive abs-image hidden-xs" />
                        <img src="{{ asset("uploads/slider/".$slider->img) }}" class="img-responsive btn-block visible-xs" />
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="container">
        <div class="row">
            <div class="home-boxes">

                    @foreach($homeShowProducts as $homeShowProduct)
                        @if(!empty($homeShowProduct->img))
                            <div class="col-md-4 col-sm-6">
                                <div class="home-box hvr-shadow-radial hvr-shrink">
                                    <a href="{{ asset($homeShowProduct->productCategory->menu->slug."/".$homeShowProduct->productCategory->slug."/".$homeShowProduct->slug.".html") }}" class="home-box-link"><img src="{{ asset("uploads/products/".$homeShowProduct->img) }}" class="img-responsive btn-block" /></a>
                                    <div class="home-box-text">
                                        <a href="{{ asset($homeShowProduct->productCategory->menu->slug."/".$homeShowProduct->productCategory->slug."/".$homeShowProduct->slug.".html") }}">{{ $homeShowProduct->name }}</a>
                                        {{ $homeShowProduct->title }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                        @foreach($products as $product)
                            @if(!empty($product->img))
                                <div class="col-md-4 col-sm-6">
                                    <div class="home-box hvr-shadow-radial hvr-shrink">
                                        <a href="{{ asset($product->menu->slug."/".$product->slug."/sayfa=1") }}" class="home-box-link"><img src="{{ asset("uploads/submenu/".$product->img) }}" class="img-responsive btn-block" /></a>
                                        <div class="home-box-text">
                                            <a href="{{ asset($product->menu->slug."/".$product->slug."/sayfa=1") }}">{{ $product->name }}</a>
                                            {{ $product->title }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                <div class="clearfix"></div>
            </div>
            <div class="about-us">
                <div class="col-md-8">
                    <div class="our-news">
                        <h4>BİZDEN HABERLER</h4>
                        <div class="news-slide">
                            <ul>
                                @foreach($newsOurs as $newsOur)
                                    <li>
                                        <span class="idate">{{ $newsOur->our_time }}</span>
                                        <h3>{{ $newsOur->title }}</h3>
                                        <div class="news-text">
                                            {{ $newsOur->description }}
                                        </div>
                                        <div class="text-right"><a href="#" class="btn-more"><i class="fa fa-chevron-right"></i></a></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="side-box hvr-shadow hvr-outline-out" style="background-image:url({{ asset("thema/standart/images/support.png") }});">
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

