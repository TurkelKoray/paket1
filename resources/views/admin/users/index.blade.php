@extends('layouts.admin.index')

@section('content')

    <div class="panel" id="spy3">
        <div class="panel-heading">
            <span class="panel-title">YÖNETİCİLER</span>

        </div>
        <div class="panel-body pn">
            <div class="table-responsive">
                <table class="table footable" data-page-navigation=".pagination" data-page-size="10">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Yönetici Adı</th>
                        <th>Seviyesi </th>
                        <th class="text-center" colspan="2"> İşlem </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 1 ;
                    @endphp
                    @foreach($users as $user)
                        <tr  id="item-{{$user->id}}">
                            <td>{{ $i }}</td>
                            <td>{{ $user->name }}</td>
                            <td><a class="btn btn-primary" href="/admin/users/edit/{{ $user->id }}"> DÜzenle </a> </td>
                            <td><a class="btn btn-danger sil" id="{{$user->id}}" href="#">SİL</a></td>
                        </tr>
                        @php
                            $i++ ;
                        @endphp
                    @endforeach
                    </tbody>
                    <tfoot class="footer-menu">
                    <tr>
                        <td colspan="7">
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
                    <a href="/admin/users/userindex">Yönetici Listesi</a>
                </li>
                <li>
                    <a href="/admin/users/usercreate">Yeni Yönetici</a>
                </li>
            </ul>
        </div>
        <div style="display: none;" class="topbar-right hidden-xs hidden-sm">
            <a href="#" class="btn btn-default btn-sm light fw600 ml10 mt5">
                <span class="fa fa-anchor pr5"></span> Button Link </a>
            <a href="#" class="btn btn-default btn-sm light fw600 ml10 mt5">
                <span class="fa fa-bullseye pr5"></span> Button Link </a>
            <a href="#" class="btn btn-default btn-sm light fw600 ml10 mt5">
                <span class="fa fa-external-link pr5"></span> Button Link </a>
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
                    url: "/admin/users/destroy/"+id,
                    type: "GET"
                }).done(function(data) {
                    satirsayfa.remove();
                    swal(data.title, data.content, data.type);
                    // setInterval(function(){ location.reload(); }, 3000);
                }).error(function(data) {
                    swal(data.title, data.content, data.type);
                });
            });

        });

    </script>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset("css/sweetalert.css") }}">
@endsection