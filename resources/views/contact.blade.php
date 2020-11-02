@extends('layouts.template')

@section('head')
    <title> {{ $menu->title }} - {{ $settings->title }} </title>
    <meta name="description" content="{{ $settings->description }}" />
    <meta name="keywords" content="{{ $settings->title }}" />
    <meta itemprop="name" content="{{ url()->full() }}" />
    <link rel="canonical" href="" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta itemprop="identifier" name="articleid" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:title" content="{{ $settings->title }}" />
    <meta property="og:site_name" content="{{ url()->full() }}" />
    <meta property="og:description" content="{{ $settings->description }}" />
    <meta property="og:image" content="" />


@endsection

@section('content')
    <div class="poster" style="background-image:url({{ asset("uploads/menu/".$menu->img) }})">
        <div class="ihover nobg">
            <div class="container">
                <div class="poster-in">
                    <h1>{{ $menu->name }}</h1>
                    <ul class="breadcrumb bread-custom">
                        <li><a href="{{ asset("/".$lang) }}">@if($lang=="tr") ANA SAYFA @else HOME @endif</a></li>
                        <li>{{ $menu->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-in">
                        <h3>@if($lang=="tr") BİZE ULAŞIN @else CONTACT US @endif</h3>
                        <h5>{{ $menu->name }}</h5>
                        <div class="maps-area" style="height:300px;"><div id="mapser" class="mapser"></div></div>
                        <div class="contact-area">
                            <h2>{{ $menu->name }}</h2>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td><b>@if($lang=="tr") Adres @else Address @endif :</b> {{ $settings->address }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>@if($lang=="tr") Telefon @else Phone @endif :</b> {{ $settings->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>@if($lang=="tr") Fax @else Fax @endif :</b> {{ $settings->fax }} (Pbx)</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <form action="{{ asset("send") }}" method="post">
                        <div class="contact-form">
                            <h2>@if($lang=="tr") İletişim Formu @else CONTACT FORM @endif</h2>
                            <div class="content-text">
                                Doldurmuş olduğunuz formlarınız tarafımıza iletildikten sonra, uzman ekibimiz tarafından en kısa sürede size geri dönüş yapılacaktır.
                            </div>

                            <div class="row">
                                {{ csrf_field() }}
                                <div class="col-sm-6">
                                    <div class="form-group form-group-lg">
                                        <input name="name" type="text" class="form-control form-inputs" value="{{ old("name") }}" placeholder="@if($lang=="tr") Ad Soyad @else Name @endif" />
                                        @if($errors->has("name"))
                                            <div style="margin-top: 5px" class="col-lg-12">
                                                <div class="alert alert-micro alert-warning alert-dismissable">
                                                    {{ $errors->first("name") }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <input name="email" type="text" class="form-control form-inputs" value="{{ old("email") }}" placeholder="@if($lang=="tr") E-Posta @else E-mail @endif " />
                                        @if($errors->has("email"))
                                            <div style="margin-top: 5px" class="col-lg-12">
                                                <div class="alert alert-micro alert-warning alert-dismissable">
                                                    {{ $errors->first("email") }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <input name="phone" type="text" class="form-control form-inputs" value="{{ old("phone") }}" placeholder="@if($lang=="tr") Telefon @else Phone @endif " />
                                        @if($errors->has("phone"))
                                            <div style="margin-top: 5px" class="col-lg-12">
                                                <div class="alert alert-micro alert-warning alert-dismissable">
                                                    {{ $errors->first("phone") }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <input name="subject" type="text" class="form-control form-inputs" value="{{ old("subject") }}" placeholder="@if($lang=="tr") Talebinizin Konusu @else Subject @endif " />
                                        @if($errors->has("subject"))
                                            <div style="margin-top: 5px" class="col-lg-12">
                                                <div class="alert alert-micro alert-warning alert-dismissable">
                                                    {{ $errors->first("subject") }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-lg">
                                        <textarea name="message" class="form-control form-inputs" rows="6" style="resize:vertical;" placeholder="@if($lang=="tr") Mesaj @else Message @endif "></textarea>
                                    </div>
                                    <button type="submit" class="btn-apply btn-block orange anim hvr-grow-shadow sendi">GÖNDER</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="g-recaptcha" data-sitekey="6Ld6878ZAAAAAA8M1aAdxxRPPzup1Bj3va455Qdz"></div>
                            @if($errors->has("g-recaptcha-response"))
                                <div style="margin-top: 5px" class="col-lg-12">
                                    <div class="alert alert-micro alert-warning alert-dismissable">
                                        {{ $errors->first("g-recaptcha-response") }}
                                    </div>
                                </div>
                            @endif
                            <div style="font-size: 18px" class="uyari text-center">
                                @if (Session::get("res"))
                                    <div class="alert alert-success">
                                        {{ Session::get("res") }}
                                    </div>
                                @endif

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key={{ $settings->mapskey }}"></script> <!--&key=KEY_GİRMEYİ_UNUTMAYINIZ!!!-->
    <script src="{{ asset("js/maplace.min.js") }}"></script>
    <script>
        addLocation({{ $settings->latitude }},{{ $settings->longitude }});
        mapser();
    </script>
    <script>
        $(document).ready(function () {

            $(".send").on("click", function () {


                var _token = $("input[name=_token]").val();
                var name = $("input[name=name]").val();
                var email = $("input[name=email]").val();
                var phone = $("input[name=phone]").val();
                var subject = $("input[name=subject]").val();
                var message = $("textarea[name=message]").val();
                var recaptcha = $(".g-recaptcha").attr("data-sitekey");

                var atpos = email.indexOf("@");
                var dotpos = email.lastIndexOf(".");

                if (name == "" ||  email == ""  ) {

                    $(".uyari").html("<h3>Lütfen Boş Alan Bırakmayın</h3>");
                } else {

                    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                        $(".uyari").html("<h3 style='color: white'> Geçerli email adresi girin </h3>");

                    } else {

                        $.ajax({
                            type: "POST",
                            data: {
                                "name": name,
                                "email": email,
                                "phone": phone,
                                "subject": subject,
                                "message": message,
                                "_token": _token,
                                "g-recaptcha-response": recaptcha
                            },
                            url: "{{ asset('send') }}",
                            success: function (sonuc) {
                                $("input[name=name]").val("");
                                $("input[name=email]").val("");
                                $("input[name=phone]").val("");
                                $("input[name=subject]").val("");
                                $("input[textarae=message]").val("");
                                $(".uyari").html("");
                                $(".uyari").html(sonuc.content).slideUp(4000);

                            },
                            error: function (sonuc) {
                                $(".uyari").html("<h3>" + sonuc.type + " </h3>");
                            }
                        });


                    }

                }
            });

        });


    </script>
@endsection