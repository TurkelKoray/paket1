@extends("layouts.paket1")

@section("metatag")
    <title>  {{ $settings->title }} </title>
    <meta name="description" content="{!! $settings->description !!} "/>
    <meta name="keywords" content="{{ $settings->keywords }}"/>
    <meta itemprop="name" content="{{ url()->full() }}"/>
    <link rel="canonical" href=""/>
    <meta property="og:url" content="{{ url()->full() }}"/>
    <meta itemprop="identifier" name="articleid" content=""/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{ url()->full() }}"/>
    <meta property="og:title" content="{!! $settings->title !!}"/>
    <meta property="og:site_name" content="{{ url()->full() }}"/>
    <meta property="og:description" content="{!! $settings->description !!}"/>
    <meta property="og:image" content="{{ asset("uploads/".$settings->ogimages) }}"/>
@endsection

@section("head")
@endsection

@section("content")

    <div class="container">
        <div class="row">

            <div style="width: 100%; height: 30px;"></div>
            @if(count($searchs)>0)
                @foreach($searchs as $search)
                    @if(!empty($search->img))
                        <div class="col-md-4 col-sm-6">
                            <div class="home-box">
                                <a href="{{ asset($search->productCategory->menu->slug."/".$search->productCategory->slug."/".$search->slug.".html") }}"
                                   class="home-box-link">
                                    <img src="{{ asset("uploads/products/thumb/".$search->img) }}"
                                         class="img-responsive btn-block"/>
                                </a>
                                <div class="home-box-text">
                                    <a href="{{ asset($search->productCategory->menu->slug."/".$search->productCategory->slug."/".$search->slug.".html") }}">{{ $search->name }}</a>
                                    {!! $search->title !!}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div style="width: 100%; height: 30px; text-align: center; font-size: 20px"> ÜZGÜNÜZ ARAĞINIZ ÜRÜN BULUNAMADI :( </div>
            @endif

            <div class="clearfix"></div>


        </div>
    </div>
@endsection

@section("customjs")
@endsection

