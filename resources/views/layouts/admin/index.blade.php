<!DOCTYPE html>
<html>

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title>Admin Panel Yönetimi  </title>
    <meta name="keywords" content="HTML5, Bootstrap 3, Admin Template, UI Theme"/>
    <meta name="description" content="Alliance - A Responsive HTML5 Admin UI Framework">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- -------------- Fonts -------------- -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
          type='text/css'>

    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/skin/default_skin/css/theme.css') }}">

    <!-- -------------- Favicon -------------- -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">



    <!-- -------------- IE8 HTML5 support  -------------- -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
    @yield("css")


</head>

<body data-status="{{Session::get("durum")}}" class="basic-gallery">


<!-- -------------- Body Wrap  -------------- -->
<div class="charts-flot" data-spy="scroll" data-target="#nav-spy" data-offset="160" id="main">

    <!-- -------------- Header  -------------- -->
    <header class="navbar navbar-fixed-top bg-dark">
        <div class="navbar-logo-wrapper">
            <a class="navbar-logo-text" href="{{ asset('/admin/settings/index') }}">
                <b>SİTE YÖNETİM PANELİ  </b>
            </a>
            <span id="sidebar_left_toggle" class="ad ad-lines"></span>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li class="hidden-xs">
                <a class="navbar-fullscreen toggle-active" href="#">
                  Site Dili : {{ \Illuminate\Support\Facades\Session::get("lang") }}
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">



            <li class="dropdown dropdown-fuse">
                <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown">
                    <span class="hidden-xs"><name>{{ Auth::user()->name }}</name> </span>
                    <span class="fa fa-caret-down hidden-xs mr15"></span>
                </a>
                <ul class="dropdown-menu list-group keep-dropdown w250" role="menu">

                    <li class="list-group-item">
                        <a target="_blank" href="{{ asset('') }}" class="animated animated-short fadeInUp">
                            <span class="fa fa-cogs"></span> Siteyi Aç </a>
                    </li>

                    <li class="dropdown-footer text-center">
                        <a href="{{ asset("cikis") }}" class="btn btn-primary btn-sm btn-bordered">
                            <span class="fa fa-power-off pr5"></span> ÇIKIŞ </a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- -------------- /Header  -------------- -->

    <!-- -------------- Sidebar  -------------- -->
    <aside id="sidebar_left" class="nano nano-light affix">

        <!-- -------------- Sidebar Left Wrapper  -------------- -->
        <div class="sidebar-left-content nano-content">

            <!-- -------------- Sidebar Header -------------- -->

            <!-- -------------- /Sidebar Header -------------- -->

            <!-- -------------- Sidebar Menu  -------------- -->
            <ul class="nav sidebar-menu">
                <li class="sidebar-label pt30">Menu</li>

                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="fa fa-share-square-o"></span>
                        <span class="sidebar-title">DİLLER</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        @foreach($languages as $language)
                        <li>
                            <a href='{{ url("admin/lang/$language->lang") }}'>
                                <span class="glyphicon glyphicon-tags"></span> {{ $language->languages }} </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @php
                    $lang = Session::get("lang");
                if (!empty($lang)) {
                @endphp
                <li>
                    <a href="{{ asset('/admin/settings/index') }}">
                        <span class="fa fa-cogs"></span>
                        <span class="sidebar-title">SİTE AYARLARI</span>
                    </a>
                </li>

                <li style="display: none">
                    <a href="{{ asset('/admin/companies/index') }}">
                        <span class="fa fa-files-o"></span>
                        <span class="sidebar-title">FİRMALAR</span>
                    </a>
                </li>

                <li>
                    <a href="{{ asset('/admin/menus/index') }}">
                        <span class="fa fa-files-o"></span>
                        <span class="sidebar-title">MENÜLER</span>
                    </a>
                </li>

                <li>
                    <a href="{{ asset('/admin/homecontent/index') }}">
                        <span class="fa fa-files-o"></span>
                        <span class="sidebar-title">ANASAYFA İÇERİK</span>
                    </a>
                </li>

                <li>
                    <a href="{{ asset('/admin/sliders/index') }}">
                        <span class="fa fa-sliders"></span>
                        <span class="sidebar-title">SLİDER</span>
                    </a>
                </li>


                <li>
                    <a href="{{ asset('/admin/users/userindex') }}">
                        <span class="fa fa-lock"></span>
                        <span class="sidebar-title">SİTE YÖNETİCİSİ</span>
                    </a>
                </li>


                <li>
                    <a href="/admin/contact/index">
                        <span class="fa fa-database"></span>
                        <span class="sidebar-title">İLETİŞİM</span>
                    </a>
                </li>
            @php
                }
            @endphp

                <!-- -------------- Sidebar Progress Bars -------------- -->
            </ul>
            <!-- -------------- /Sidebar Menu  -------------- -->

            <!-- -------------- Sidebar Hide Button -------------- -->
            <div class="sidebar-toggler">
                <a href="#">
                    <span class="fa fa-arrow-circle-o-left"></span>
                </a>
            </div>
            <!-- -------------- /Sidebar Hide Button -------------- -->

        </div>
        <!-- -------------- /Sidebar Left Wrapper  -------------- -->

    </aside>

    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">


        <!-- -------------- Topbar -------------- -->
        @yield("topbar")
        <!-- -------------- /Topbar -------------- -->

        <!-- -------------- Content -------------- -->
        <section id="content" class="animated fadeIn">

            @yield("content")

        </section>
        <!-- -------------- /Content -------------- -->

    </section>


</div>
<!-- -------------- /Body Wrap  -------------- -->

<!-- -------------- Scripts -------------- -->

<!-- -------------- jQuery -------------- -->
<script src="{{ asset('assets/js/jquery/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery/jquery_ui/jquery-ui.min.js') }}"></script>


<!-- -------------- Theme Scripts -------------- -->
<script src="{{ asset('assets/js/utility/utility.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/demo/widgets_sidebar.js') }}"></script>

<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('editor/ckeditor/ckeditor.js') }}"></script>
@yield("js")

<script type="text/javascript">

    $(function(){


        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "1000",
            "timeOut": "3500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        var durum = parseInt($("body").data("status"));

        switch (durum)
        {
            case 0 :
                toastr.error('Hata oluştu');
                break;
            case 1 :
                toastr.success('İşlem başarılı.');
                break;
            case 2 :
                toastr.info('İşlem başarılı fakat yönetici onayladıktan sonra aktifleşecektir.');
                break;

            case 3 :
                toastr.warning('Zaten veritabanında kayıtlıdır');
                break;
            case 4 :
                toastr.info('Dil değiştirildi.');
                break;
            case 5 :
                toastr.info('Lütfen (png,jpg ve gif ) uzantılı dosya seçmelisiniz.');
                break;
            case 6 :
                toastr.info('Bu Haber Daha önceden Eklenmiş');
                break;
            case 7 :
                toastr.success('Dosya Başarılı Bir Şekilde Yüklenmiştir.');
                break;
            case 8 :
                toastr.info('Lütfen uygun formatta  dosya seçiniz (pdf,xls,doc,docx)');
                break;
            case 9 :
                toastr.info('Lütfen dosya seçiniz');
                break;



        }

        $('[data-toggle="tooltip"]').tooltip();

        "use strict";

        // Init Theme Core
        Core.init();

        // Init FooTable
       // $('.footable').footable();


    });

</script>

<!-- -------------- /Scripts -------------- -->

</body>

</html>
