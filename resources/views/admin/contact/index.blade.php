@extends('layouts.admin.index')

@section('content')

    <div class="panel" id="spy3">
        <div class="panel-heading">
            <span class="panel-title">Mesajlar</span>

        </div>
        <div class="panel-menu">

        </div>

        <div class="panel-body pn">
            <div class="table-responsive">
                <table class="table"  data-page-navigation=".pagination" data-page-size="45">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>İsim </th>
                        <th>Konu</th>
                        <th class="text-center" colspan="3"> İşlem </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 1 ;
                    @endphp
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $i }} </td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td><a class="btn btn-primary" href="/admin/contact/show/{{ $contact->id }}"> Göster </a> </td>
                            <td><a class="btn btn-danger sil" id="{{$contact->id}}" href="#">SİL</a></td>
                            <td>
                                @if( $contact->filename!="")<a class="btn btn-info" href="{{ $contact->fileurl }}">DOSYAYI İNDİR</a>@endif
                            </td>
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
                <ul class="nav nav-list nav-list-topbar pull-left">
                    <li @php if($active==0){ echo "class='active'";} @endphp >
                        <a href="/admin/contact/index">Yeni Mesajlar</a>
                    </li>
                    <li @php if($active==1){ echo "class='active'";} @endphp >
                        <a href="/admin/contact/old">Okunmuş Mesajlar</a>
                    </li>
                </ul>
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

    <script src="{{ asset("js/sweetalert.min.js") }}"></script>

    <script type="text/javascript">

        function yenile(time) {
            setInterval(function(){ location.reload(); }, time);
        }

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
                    url: "/admin/contact/delete/"+id,
                    type: "GET"
                }).done(function(data) {
                    satirsayfa.remove();
                    swal(data.title, data.content, data.type);
                   // yenile(5000);
                }).error(function(data) {
                    swal(data.title, data.icerik, "error");
                });
            });

        });

    </script>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset("css/sweetalert.css") }}">
@endsection
