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
                <button type="button" class="btn btn-delete btn-danger">Remove</button>
                <a href="{{ route('admin.page.edit', $page->slug) }}" class="btn btn-info">Edit</a>
                {!! Form::open(['id' => 'formDelete','method' => 'DELETE','route' => 'admin.page.delete']) !!}
                    {!! Form::hidden('id', $page->id) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="box-body">
            {!! $page->description !!}
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready( function() {
            $(document).on('click','.btn-delete', function() {
                swal({   
                    title: "Are you sure to delete?",   
                    text: "You will not be able to recover this data!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#ff354d",   
                    confirmButtonText: "Yes, delete it!",   
                    closeOnConfirm: true 
                }, function(){   
                    $("#formDelete").submit()
                });
            })
        })
    </script>
@endpush