@extends("layouts.paket1")

@section("metatag")
    <title> {{ $menu->name }} -  {{ $settings->title }} </title>
    <meta name="description" content="{!! $settings->description !!} " />
    <meta name="keywords" content="{{ $menu->name }} , {{ $settings->keywords }}" />
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
    <div class="poster" style='background-image:url("{{ asset("uploads/menu/".$menu->img) }}")'>
        <div class="ihover nobg">
            <div class="container">
                <div class="poster-in">
                    <h1>{{ $menu->name }}</h1>
                    @if($menu->breadcrumb==1)
                        <ul class="breadcrumb bread-custom">
                            <li><a href="{{ asset("/") }}">ANASAYFA</a></li>
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
                        <h3>BİZE ULAŞIN</h3>
                        <h5>{{ $menu->name }}</h5>
                        <div class="maps-area" style="height:300px;"><div id="mapser" class="mapser"></div></div>

                        <div class="contact-form">
                            <h2>İletişim & Talep Formu</h2>
                            <div class="content-text">
                                Doldurmuş olduğunuz formlarınız tarafımıza iletildikten sonra, uzman ekibimiz tarafından en kısa sürede size geri dönüş yapılacaktır.
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-lg">
                                        <input type="text" name="name" class="form-control form-inputs" placeholder="Ad Soyad" />
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <input type="text" name="email" class="form-control form-inputs" placeholder="E-Posta" />
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <input type="text" name="phone" class="form-control form-inputs" placeholder="Telefon" />
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <input type="text" name="subject" class="form-control form-inputs" placeholder="Talebinizin Konusu" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-lg">
                                        <textarea name="message" class="form-control form-inputs" rows="6" style="resize:vertical;" placeholder="Mesajınız"></textarea>
                                    </div>
                                    <button type="button" name="send" class="btn-apply btn-block orange anim hvr-grow-shadow">GÖNDER</button>
                                </div>
                                <div class="clearfix"></div>
                                <div class="uyari"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-8">
                    @include("include.sideMenuSecond")
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

@section("customjs")
    <script>
        $(document).ready(function () {

            $("button[name=send]").on("click", function () {



                var _token = $("input[name=_token]").val();
                var contact_name = $("input[name=name]").val();
                var contact_email = $("input[name=email]").val();
                var contact_subject = $("input[name=subject]").val();
                var contact_phone = $("input[name=phone]").val();
                var contact_message = $("textarea[name=message]").val();

                var atpos = contact_email.indexOf("@");
                var dotpos = contact_email.lastIndexOf(".");

                if (contact_name == "" ||  contact_email == "") {
                    $(".uyari").html("<h3 style='text-align: center'>Lütfen Boş Alan Bırakmayın</h3>");
                } else {

                    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= contact_email.length) {
                        $(".uyari").html("<h3 style='color: white;text-align: center'> Geçerli email adresi girin </h3>");

                    } else {

                        $.ajax({
                            type: "POST",
                            data: {
                                "name": contact_name,
                                "email": contact_email,
                                "phone": contact_phone,
                                "subject": contact_subject,
                                "message": contact_message,
                                "_token": _token
                            },
                            url: "{{ asset('send') }}",
                            success: function (sonuc) {
                                $("input[name=name]").val("");
                                $("input[name=email]").val("");
                                $("input[name=phone]").val("");
                                $(".uyari").html(sonuc.title).show(4000);


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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key={{ $settings->mapskey }}"></script> <!--&key=KEY_GİRMEYİ_UNUTMAYINIZ!!!-->
    <script src="{{ asset("thema/standart/js/maplace.min.js") }}"></script>
    <script>
        addLocation(36.206260, 36.157459,'','sadekod');
        mapser();
    </script>
@endsection

