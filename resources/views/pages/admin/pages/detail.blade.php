@extends('layouts.admin.master')
@section('page_title', 'Page Management')
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"><i class="fa fa-etsy"></i> Page</a></li>
    <li class="active">{{ $page->title }}</li>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $page->title }}</h3>
            <div class="pull-right">
                <a href="#" class="btn btn-danger">Remove</a>
                <a href="{{ route('admin.page.edit', $page->slug) }}" class="btn btn-info">Edit</a>
            </div>
        </div>
        <div class="box-body">
            {!! $page->description !!}
        </div>
    </div>

@endsection