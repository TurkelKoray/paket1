<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield("metatag")
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&subset=latin,latin-ext,cyrillic-ext' rel='stylesheet' type='text/css' />
    <link href="{{ asset("thema/standart/css/bootstrap.css") }}" rel="stylesheet">
    <link href="{{ asset("thema/standart/css/font-awesome.css") }}" rel="stylesheet" />
    <link href="{{ asset("thema/standart/css/jquery.bxslider.css") }}" rel="stylesheet" />
    <link href="{{ asset("thema/standart/css/marpad.min.css") }}" rel="stylesheet">
    <link href="{{ asset("thema/standart/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("thema/standart/css/custom.css") }}" rel="stylesheet">
    <script src="{{ asset("thema/standart/js/jquery.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("thema/standart/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("thema/standart/js/jquery.bxslider.js") }}"></script>
    <link href="{{ asset("thema/standart/css/jquery.fancybox.css") }}" rel="stylesheet" />
    <script src="{{ asset("thema/standart/js/jquery.fancybox.js") }}"></script>
    <script src="{{ asset("thema/standart/js/js.js") }}"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield("head")
</head>
<body data-staticbar="0">
<!--hover animasyon : http://ianlunn.github.io/Hover/#effects örnek : class="hvr-shadow-radial"-->
<div class="topbar">
    <div class="top-line">
        <div class="container">
            <div class="top-links">
                <div class="top-contact">
                    <a href="{{ url("/") }}">
                        <img src="{{ asset("thema/standart/images/customer.png") }}" />
                        <span class="vmiddle m-5 ml">{{ $settings->phone }}</span>
                    </a>
                </div>
                <div class="social-media">
                    @if(!empty($settings->facebook))
                        <a href="{{ $settings->facebook }}"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if(!empty($settings->facebook))
                        <a href="{{ $settings->twitter }}"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if(!empty($settings->linkedin))
                        <a href="{{ $settings->linkedin }}"><i class="fa fa-linkedin"></i></a>
                    @endif
                </div>

                <div class="top-search" data-focus-in="1">
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
                <a class="navbar-brand logo" href="#"><img src="{{ asset("thema/standart/images/logo.png") }}" class="img-responsive" /></a>
            </div>
            <div class="collapse navbar-collapse" id="bs">
                <ul class="nav navbar-nav navbar-right">
                    <li class="@if($slug=="") active @endif"><a href="{{ url("/") }}">ANASAYFA</a></li>
                    @foreach($menus as $menu)
                        @php
                            $link ;
                            if($menu->type=="hs"){ $link = $menu->slug; }
                            elseif ($menu->type=="hbs"){ $link = $menu->slug."/".$menu->id."/1"; }
                            elseif ($menu->type=="is"){ $link = $menu->slug.".htm"; }
                            elseif ($menu->type=="us"){ $link = $menu->slug.".html"; }
                            elseif ($menu->type=="fs"){ $link = "liste/".$menu->slug; }
                            else{ $link = $menu->slug; }
                        @endphp
                        @if ($menu->submenus->count()>0)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$menu->name}} <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu">
                                    @foreach($menu->submenus as $submenu)
                                        @php
                                            $sublink ;
                                            if($menu->type=="hs"){ $sublink = $menu->slug."/".$submenu->slug; }
                                            elseif ($menu->type=="hbs"){ $sublink = $menu->slug."/".$submenu->slug."/".$menu->id."/1"; }
                                            elseif ($menu->type=="is"){ $sublink = $menu->slug."/".$submenu->slug.".htm"; }
                                            elseif ($menu->type=="us"){ $sublink = $menu->slug."/".$submenu->slug.".html"; }
                                            elseif ($menu->type=="fs"){ $sublink = "firmalar/".$menu->slug."/".$submenu->slug; }
                                            else{ $sublink = $menu->slug."/".$submenu->slug; }
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
            <div class="col-md-6">
                <div class="footer-links">
                    @foreach($homeBottomMenus->chunk(3) as $homeBottomMenu)
                        @foreach($homeBottomMenu as $item)
                            <div class="col-sm-4">
                                <div class="row">
                                    <h4>{{ $item->name }}</h4>
                                    <ul>

                                        @foreach($item->submenus as $submenu)
                                            <li><a href="{{ url($item->slug."/".$submenu->slug).".html" }}">{{ $submenu->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6">
                <h4>İLETİŞİM</h4>
                <div class="contact-detail">
                    <span class="address"><b>Adres:</b> {{ $settings->address }}</span>
                    <div class="contact-detail">
                        <div class="contact-info"><b>E-Posta:</b> <a href="mailto:info@ecdrain.com.tr">{{ $settings->email }}</a> / </div>
                        <div class="contact-info"><b>Fax:</b> <a href="#">{{ $settings->fax }}</a> / </div>
                        <div class="contact-info"><b>Telefon:</b> <a href="#">{{ $settings->phone }}</a></div>
                    </div>
                </div>
                <div class="request-form">
                    <h4>DİLERSENİZ BİZ SİZİ ARAYALIM</h4>
                    <form>
                        {{ csrf_field() }}
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="form-group">
                                    <input name="public_name" type="text" class="form-control request-inputs" placeholder="Ad Soyad" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="form-group">
                                    <input name="public_email" type="text" class="form-control request-inputs" placeholder="E-posta" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="input-group">
                                    <input name="public_phone" type="text" class="form-control request-inputs" placeholder="Telefon" />
                                    <span class="input-group-addon">
                                            <button type="button" class="btn-send anim publicSend"><i class="fa fa-send"></i></button>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div style="background-color: red" class="public_uyari"></div>
                    </form>
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
                        {!! $settings->footer !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-logo">
                        <a href="#" class="pusher"><img src="images/footer-logo.png" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield("customjs")
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


<script src="{{ asset("thema/standart/js/jquery.cookie.js") }}"></script>
<!--aktif etmek için data-pause="1" değerini 0 yapın-->
<div class="modal fade" tabindex="-1" role="dialog" id="ipop" data-keyboard="false" data-backdrop="static" data-pause="1">
    <div class="modal-dialog">
        <!--<<< FOR LARGE POPUP ADD THIS CLASS .modal-lg-->
        <div class="ipop-close"><a data-dismiss="modal" onclick="ipop.stop();"><i class="fa fa-times fa-lg"></i></a></div>
        <div class="modal-content">
            <div class="p-15 text-center">
                <h2>Popup Advert Stage</h2>
            </div>
            <div class="blank-area p-sm-150 p-xs-15 py"></div>
            <!--REMOVE THIS AREA-->
        </div>
        <!-- /.modal-content -->
        <div class="ipop-timer"><b class="countdown">10</b> saniye sonra sayfaya yönlendirileceksiniz.</div>
    </div>
    <!-- /.modal-dialog -->
</div>
</body>
</html>
