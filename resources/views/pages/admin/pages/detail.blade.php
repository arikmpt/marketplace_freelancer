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
        </div>
        <div class="box-body">
            {!! $page->description !!}
        </div>
    </div>

@endsection