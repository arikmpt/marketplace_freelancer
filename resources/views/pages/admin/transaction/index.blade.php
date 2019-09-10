@extends('layouts.admin.master')
@section('page_title', 'Dashboard')
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Transaction</li>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Transaction</h3>
        </div>
        <div class="box-body">
            {!! $html->table() !!}
        </div>
    </div>

    @include('pages.admin.transaction.modal')
@endsection
@push('scripts')
    {!! $html->scripts() !!}
    <script>
        $(document).ready(function() {
            $('table#dataTableBuilder tbody').on( 'click', 'td button', function (e) {
                var mode = $(this).attr("data-mode");
                var parent = $(this).parent().get( 0 );
                var parent1 = $(parent).parent().get( 0 );
                var row = $('#dataTableBuilder').DataTable().row(parent1);
                var data = row.data();

                $("#id").val(data.id)
                $("#receiptImg").attr("src","/storage/"+data.upload_receipt)
                $("#modal").modal('show');
            })
        })
    </script>
@endpush