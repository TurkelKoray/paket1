@extends("layouts.template")


@section("head")
    <title>{{ $settings->title }}</title>
    <meta name="description" content="{{ $settings->description }}" />
    <meta name="keywords" content="{{ $settings->title }}" />
    <meta itemprop="name" content="{{ asset("") }}" />
    <link rel="canonical" href="" />
    <meta property="og:url" content="{{ asset("") }}" />
    <meta itemprop="identifier" name="articleid" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ asset("") }}" />
    <meta property="og:title" content="{{ $settings->title }}" />
    <meta property="og:site_name" content="{{ asset("") }}" />
    <meta property="og:description" content="{{ $settings->description }}" />
    <meta property="og:image" content="{{ asset("uploads/".$settings->ogimages) }}" />

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
                @foreach($threeHomeContents as $threeHomeContent)
                <div class="col-md-4 col-sm-6">
                    <div class="home-box hvr-shadow-radial hvr-shrink">
                        <a href="{{ $threeHomeContent->url }}" class="home-box-link"><img src="{{ asset("uploads/home/".$threeHomeContent->img) }}" class="img-responsive btn-block" /></a>
                        <div class="home-box-text">
                            <a href="{{ $threeHomeContent->url }}">{{ $threeHomeContent->name }} </a>
                            {{ $threeHomeContent->title }}
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>

            <div class="home-boxes">
                @foreach($twoHomeContents as $twoHomeContent)
                <div class="col-md-6 col-sm-12">
                    <div class="home-box hvr-shadow-radial hvr-shrink">
                        <a href="{{ $twoHomeContent->url }}" class="home-box-link"><img src="{{ asset("uploads/home/".$twoHomeContent->img) }}" class="img-responsive btn-block" /></a>
                        <div class="home-box-text">
                            <a href="{{ $twoHomeContent->url }}">{{ $twoHomeContent->title }}</a>
                            {{ $twoHomeContent->description }}
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
@endsection

@section("customjs")

@endsection
