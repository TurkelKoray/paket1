@extends('layouts.admin.index')

@section('content')

    <div class="panel" id="spy3">
        <div class="panel-heading">
            <span class="panel-title"> ALT SAYFALAR</span>

        </div>
        <div class="panel-body pn">
            <div class="table-responsive">
                <table class="table footable" data-page-navigation=".pagination" data-page-size="10">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Alt Sayfa Adı</th>
                        <th>Üst Sayfa </th>
                        <th>Alt Sayfa Url</th>
                        <th class="text-center" colspan="4"> İşlem </th>
                    </tr>
                    </thead>
                    <tbody id="sirala">
                    @php
                    $i = 1 ;
                    @endphp
                    @foreach($submenus as $submenu)
                    <tr  id="item-{{$submenu->id}}">
                        <td>{{ $i }}</td>
                        <td class="sirala handle">{{ $submenu->name }}</td>
                        <td>
                            {{ $submenu->menu->name }}
                        </td>
                        <td>{{ $submenu->slug }}</td>
                        <td>
                            @php
                                $subMenuPermissions = [];
                                $gallleryMenuPermissions = [];
                            @endphp
                            @if(in_array($submenu->menu->type,$subMenuPermissions))
                                <a class="btn btn-info" href="/admin/subsubmenus/index/{{ $submenu->id  }}"> Alt Sayfa </a>
                            @endif
                        </td>
                        <td>
                            @if(in_array($submenu->menu->type,$gallleryMenuPermissions))
                                <a class="btn btn-info" href="/admin/submenus/gallery/{{ $submenu->id }}"> Galeri </a>
                            @endif
                        </td>
                        <td><a class="btn btn-primary" href="/admin/submenus/edit/{{ $submenu->id }}"> DÜzenle </a> </td>
                        <td><a class="btn btn-danger sil" id="{{$submenu->id}}" href="#">SİL</a></td>
                    </tr>
                    @php
                        $i++ ;
                    @endphp
                    @endforeach
                    </tbody>
                    <tfoot class="footer-menu">
                    <tr>
                        <td colspan="8">
                            <nav class="text-right">
                                <ul class="pagination hide-if-no-paging"></ul>
                            </nav>
                        </td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>

    @endsection

@section('topbar')
    <header id="topbar" class="ph10">
        <div class="topbar-left">
            <ul class="nav nav-list nav-list-topbar pull-left">
                <li class="active">
                    <a href="/admin/submenus/index/{{ $menuID }}">Alt Menü Listesi</a>
                </li>
                <li>
                    <a href="/admin/submenus/create/{{ $menuID }}">Yeni Alt Menü</a>
                </li>
            </ul>
        </div>
    </header>
    @endsection

@section('js')
    <script src="{{ asset("assets/js/footable/js/footable.all.min.js") }}"></script>
    <script src="{{ asset("assets/js/footable/js/footable.min.js") }}"></script>
    <script src="{{ asset("js/sweetalert.min.js") }}"></script>

    <script type="text/javascript">

        $(".sil").on('click', function () {

            var id = $(this).attr("id");
            var satirsayfa = $(this).parent('td').parent('tr');

            swal({
                title: 'SİLMEK İSTEDİĞİNİZE EMİN MİSİNİZ ?',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, Sil!',
                cancelButtonText: 'Hayır, Vazgeç!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }, function () {

                $.ajax({
                    url: "/admin/submenus/delete/"+id,
                    type: "GET"
                }).done(function(data) {
                    satirsayfa.remove();
                    swal(data.title, data.content, data.type);
                    // setInterval(function(){ location.reload(); }, 3000);
                }).error(function(data) {
                    swal(data.title, data.content, "error");
                });
            });

        });

        $( "#sirala" ).sortable({
            revert: true,
            handle: ".sirala",
            stop: function (event, ui) {
                var data = $(this).sortable('serialize');

                $.ajax({
                    type: "GET",
                    data: data,
                    url: "/admin/submenus/sirala/urunSirala",
                    success: function(msg){
                        // alert( msg.islemMsj );
                    }
                });
            }
        });
        $( "#sirala" ).disableSelection();

    </script>
    @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset("css/sweetalert.css") }}">
    @endsection
