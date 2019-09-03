@extends('layouts.admin.master')
@section('page_title', 'Dashboard')
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Category</li>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Category</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
                    <i class="fa fa-add"></i> Add Category
                </button>
            </div>
        </div>
        <div class="box-body">
            {!! $html->table() !!}
        </div>
    </div>

    @include('pages.admin.category.form')
@endsection
@push('scripts')
    {!! $html->scripts() !!}
@endpush