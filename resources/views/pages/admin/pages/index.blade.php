@extends('layouts.admin.master')
@section('page_title', 'Page Management')
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Page</li>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Page</h3>
            <div class="pull-right">
                <a href="{{ route('admin.page.new') }}" class="btn btn-primary">Tambah Halaman Baru</a>
            </div>
        </div>
        <div class="box-body">
            {!! $html->table() !!}
        </div>
    </div>

@endsection
@push('scripts')
    {!! $html->scripts() !!}
@endpush