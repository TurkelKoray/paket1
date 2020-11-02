<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&subset=latin,latin-ext,cyrillic-ext' rel='stylesheet' type='text/css' />
    <link href="{{ asset("css/bootstrap.css") }}" rel="stylesheet">
    <link href="{{ asset("css/font-awesome.css") }}" rel="stylesheet" />
    <link href="{{ asset("css/jquery.bxslider.css") }}" rel="stylesheet" />
    <link href="{{ asset("css/marpad.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">
    <script src="{{ asset("js/jquery.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("js/jquery.bxslider.js") }}"></script>
    <link href="{{ asset("css/jquery.fancybox.css") }}" rel="stylesheet" />
    <script src="{{ asset("js/jquery.fancybox.js") }}"></script>
    <script src="{{ asset("js/js.js") }}"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    @yield("head")
</head>
<body data-staticbar="0">
<!--hover animasyon : http://ianlunn.github.io/Hover/#effects örnek : class="hvr-shadow-radial"-->
<div class="topbar">
    <div class="top-line">
        <div class="container">
            <div class="top-links">
                <div class="top-contact">
                    <a href="#">
                        <img src="{{ asset("images/customer.png") }}" />
                        <span class="vmiddle m-5 ml">{{ $settings->phone }}</span>
                    </a>
                </div>
                <div class="social-media">
                    <a target="_blank" href="{{ $settings->facebook }}"><i class="fa fa-facebook"></i></a>
                    <a target="_blank" href="{{ $settings->googleplus }}"><i class="fa fa-google"></i></a>
                    <a target="_blank" href="{{ $settings->twitter }}"><i class="fa fa-twitter"></i></a>
                    <a target="_blank" href="{{ $settings->youtube }}"><i class="fa fa-youtube-play"></i></a>
                </div>
                <div class="langs dropdown">
                    <a style="text-transform: uppercase" href="#" class="dropdown-toggle" type="button" id="languages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span>{{ \Illuminate\Support\Facades\Session::get("lang") }}</span> <i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="languages">
                        @foreach($languages as $language)
                        <li style="text-transform: uppercase"><a href="{{ asset("change/".$language->lang) }}">{{ $language->lang }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div style="display: none" class="top-search" data-focus-in="1">
                    <input type="text" data-focus="1" class="form-control top-input" placeholder="Ara">
                    <button class="btn-search anim" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="navbar inav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs" aria-expanded="false">
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="{{ url("/".\Illuminate\Support\Facades\Session::get("lang")) }}"><img src="{{ asset("images/logo.png") }}" class="img-responsive" /></a>
            </div>
            <div class="collapse navbar-collapse" id="bs">

                <ul class="nav navbar-nav navbar-right">
                    @if($lang=="tr")
                    <li class="@if($slug=="") active @endif"><a href="{{ url("/".$lang) }}">ANASAYFA</a></li>
                    @else
                    <li class=" @if($slug=="") active @endif"><a href="{{ url("/".$lang) }}">HOME</a></li>
                    @endif
                    @foreach($menus as $menu)
                        @php
                            $link ;
                            if($menu->type=="hs"){ $link = $lang."/".$menu->slug; }
                            elseif ($menu->type=="hbs"){ $link = $lang."/".$menu->slug."/".$menu->id."/1"; }
                            elseif ($menu->type=="is"){ $link = $lang."/".$menu->slug.".htm"; }
                            elseif ($menu->type=="us"){ $link = $lang."/".$menu->slug.".html"; }
                            elseif ($menu->type=="fs"){ $link = $lang."/"."liste/".$menu->slug; }
                            else{ $link = $lang."/".$menu->slug; }
                        @endphp
                        @if ($menu->submenus->count()>0)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$menu->name}} <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            @foreach($menu->submenus as $submenu)
                                @php
                                    $sublink ;
                                    if($menu->type=="hs"){ $sublink = $lang."/".$menu->slug."/".$submenu->slug; }
                                    elseif ($menu->type=="hbs"){ $sublink = $lang."/".$menu->slug."/".$submenu->slug."/".$menu->id."/1"; }
                                    elseif ($menu->type=="is"){ $sublink = $lang."/".$menu->slug."/".$submenu->slug.".htm"; }
                                    elseif ($menu->type=="us"){ $sublink = $lang."/".$menu->slug."/".$submenu->slug.".html"; }
                                    elseif ($menu->type=="fs"){ $sublink = $lang."/"."firmalar/".$menu->slug."/".$submenu->slug; }
                                    else{ $sublink = $lang."/".$menu->slug."/".$submenu->slug; }
                                @endphp
                                <li><a href="{{ url($sublink) }}">{{$submenu->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                        @else
                            <li class=" @if($slug==$menu->slug) active @endif"><a href="{{ url($link) }}">{{$menu->name}}</a></li>
                            @endif
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>
@yield("content")


<div class="footer">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="col-md-6">
                    <h4>@if($lang=="tr") İLETİŞİM @else CONTACT @endif </h4>
                    <div class="contact-detail">
                        <span class="address"><b>@if($lang=="tr") Adres @else Address @endif :</b> {{ $settings->address }}</span>
                        <div class="contact-detail">
                            <div class="contact-info"><b>@if($lang=="tr") E-posta @else E-mail @endif:</b> <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a> / </div>
                            <div class="contact-info"><b>@if($lang=="tr") Belge Geçer @else Fax @endif:</b> <a href="#">{{ $settings->fax }}</a> / </div>
                            <div class="contact-info"><b>@if($lang=="tr") Telefon @else Phone @endif:</b> <a href="#">{{ $settings->phone }}</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="request-form">
                        <h4>@if($lang=="tr") DİLERSENİZ BİZ SİZİ ARAYALIM @else WE WILL CALL YOU IF YOU WISH @endif </h4>
                        <form>
                            {{ csrf_field() }}
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="form-group">
                                        <input name="public_name" type="text" class="form-control request-inputs" placeholder="@if($lang=="tr") Ad Soyad @else Name @endif" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="form-group">
                                        <input name="public_email" type="text" class="form-control request-inputs" placeholder="@if($lang=="tr") E-posta @else E-mail @endif " />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="input-group">
                                        <input name="public_phone" type="text" class="form-control request-inputs" placeholder="@if($lang=="tr") Telefon @else Phone @endif" />
                                        <span class="input-group-addon">
                                            <button type="button" class="btn-send anim publicSend"><i class="fa fa-send"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="public_uyari"></div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="copyright-in">
                         {{ $settings->footer }}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-logo">
                        <a target="_blank" href="http://www.yirmibes.com.tr/" class="pusher"><img src="{{ asset("images/footer-logo.jpg") }}" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $(".publicSend").on("click", function () {

            var _token = $("input[name=_token]").val();
            var name = $("input[name=public_name]").val();
            var email = $("input[name=public_email]").val();
            var phone = $("input[name=public_phone]").val();

            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");

            if (name == "" ||  email == "") {

                $(".public_uyari").html("<h3>Lütfen Boş Alan Bırakmayın</h3>");
            } else {

                if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                    $(".public_uyari").html("<h3 style='color: white'> Geçerli email adresi girin </h3>");

                } else {

                    $.ajax({
                        type: "POST",
                        data: {
                            "name": name,
                            "email": email,
                            "phone": phone,
                            "_token": _token
                        },
                        url: "{{ asset('wesend') }}",
                        success: function (sonuc) {
                            $("input[name=public_name]").val("");
                            $("input[name=public_email]").val("");
                            $("input[name=public_phone]").val("");
                            $(".public_uyari").html("");
                            $(".public_uyari").html(sonuc.title).slideUp(4000);

                        },
                        error: function (sonuc) {
                            $(".public_uyari").html("<h3>" + sonuc.type + " </h3>");
                        }
                    });

                }

            }
        });

    });


</script>
@yield("customjs")
</body>
</html>
