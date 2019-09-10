@extends('layouts.admin.master')
@section('page_title', 'Dashboard')
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href=" {{ route('admin.project.list') }} "><i class="fa fa-book"></i> Project</a></li>
    <li class="active">Project</li>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Project</h3>
        </div>
        <div class="box-body">
            
        </div>
    </div>

@endsection
@push('scripts')
    
@endpush