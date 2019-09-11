@extends('layouts.admin.master')
@section('page_title', 'Page Management')
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"><i class="fa fa-etsy"></i> Page</a></li>
    <li class="active">Edit Halaman {{ $page->title }}</li>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $page->title }}</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => 'admin.page.update']) !!}
                {!! Form::hidden('id', $page->id) !!}
                <div class="form-group">
                    <label for="">Judul</label>
                    {!! Form::text('title', $page->title, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="">Isi</label>
                    {!! Form::textarea('description', $page->description, ['class' => 'form-control','id' => 'summernote']) !!}
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height : 300
            });
        })
    </script>
@endpush