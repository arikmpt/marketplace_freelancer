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

@endsection
@push('scripts')
    {!! $html->scripts() !!}
@endpush