@extends('layouts.admin.index')

@section('content')

    <div class="panel" id="spy3">
        <div class="panel-heading">
            <span class="panel-title">MENÜLER</span>

        </div>
        <div class="panel-body pn">
            <div class="table-responsive">
                <table class="table footable" data-page-navigation=".pagination" data-page-size="15">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Menü Adı</th>
                        <th>Menü Url</th>
                        <th class="text-center" colspan="5"> İşlem</th>
                    </tr>
                    </thead>
                    <tbody id="menuSirala">
                    @php
                        $i = 1 ;
                    @endphp
                    @foreach($menus as $menu)
                        <tr id="item-{{$menu->id}}">
                            <td>{{ $i }}</td>
                            <td class="menuSirala handle">{{ $menu->name }}</td>
                            <td>{{ $menu->slug }}</td>
                            <td>
                                @php
                                    $subMenuPermissions = ["hbs","hs","us"];
                                    $gallleryMenuPermissions = [ ];
                                @endphp
                                @if(in_array($menu->type,$subMenuPermissions) )
                                    <a class="btn btn-info" href="/admin/submenus/index/{{ $menu->id }}"> Alt Sayfa </a>
                                @endif
                            </td>
                            <td>
                                @if(in_array($menu->type,$gallleryMenuPermissions))
                                    <a class="btn btn-info" href="/admin/menus/gallery/{{ $menu->id }}"> Galeri </a>
                                @endif
                            </td>
                            <td><a class="btn btn-primary" href="/admin/menus/edit/{{ $menu->id }}"> DÜzenle </a></td>
                            <td><a class="btn btn-danger sil" id="{{$menu->id}}" href="#">SİL</a></td>
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
                    <a href="/admin/menus/index">Menü Listesi</a>
                </li>
                <li>
                    <a href="/admin/menus/create">Yeni Menü</a>
                </li>
            </ul>
        </div>
    </header>
@endsection

@section('js')
    <script src="{{ asset("assets/js/plugins/footable/js/footable.all.min.js") }}"></script>
    <script src="{{ asset("assets/js/plugins/footable/js/footable.filter.min.js") }}"></script>
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
                    url: "/admin/menus/delete/" + id,
                    type: "GET"
                }).done(function (data) {
                    satirsayfa.remove();
                    swal(data.title, data.content, data.type);
                    // setInterval(function(){ location.reload(); }, 3000);
                }).error(function (data) {
                    swal(data.title, data.content, "error");
                });
            });

        });

        $("#menuSirala").sortable({
            revert: true,
            handle: ".menuSirala",
            stop: function (event, ui) {
                var data = $(this).sortable('serialize');

                $.ajax({
                    type: "GET",
                    data: data,
                    url: "/admin/menus/menuSirala/urunSirala",
                    success: function (msg) {
                        // alert( msg.islemMsj );
                    }
                });
            }
        });
        $("#menuSirala").disableSelection();

    </script>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset("css/sweetalert.css") }}">
@endsection
