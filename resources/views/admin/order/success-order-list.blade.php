@extends('layouts.admin.index')

@section('content')

    <div class="panel" id="spy3">
        <div class="panel-heading">
            <span class="panel-title"> Onaylanan Siparişler </span>

        </div>
        <div class="panel-body pn">
            <div class="table-responsive">
                <table class="table footable  table-hover" data-page-navigation=".pagination" data-page-size="10">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Görsel </th>
                        <th>Ürün Adı</th>
                        <th>Müşteri Adı </th>
                        <th class="text-center" colspan="2"> İşlem </th>
                    </tr>
                    </thead>
                    <tbody id="sirala">
                    @php
                        $i = 1 ;
                    @endphp
                    @foreach($orders as $order)
                        <tr  id="item-{{$order->id}}">
                            <td>{{ $i }}</td>
                            <td> <img width="75" src="{{ asset("uploads/products/".$order->product->img) }}" /> </td>
                            <td class="sirala handle">{{ $order->product->name }} </td>
                            <td>
                                {{ $order->name }}
                            </td>
                            <td><a class="btn btn-danger sil" id="{{$order->id}}" href="#">SİL</a></td>
                        </tr>
                        @php
                            $i++ ;
                        @endphp
                    @endforeach
                    </tbody>
                    <tfoot class="footer-menu">
                    <tr>
                        <td colspan="6">
                            <nav class="text-right">
                                <ul class="pagination hide-if-no-paging">
                                    {{ $orders->links() }}
                                </ul>
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
    @include("admin.order.menu")
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
                    url: "/admin/orders/delete/"+id,
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
                    url: "/admin/products/sirala/urunSirala",
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
