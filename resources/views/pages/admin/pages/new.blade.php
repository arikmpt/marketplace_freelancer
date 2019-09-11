@extends('layouts.admin.master')
@section('page_title', 'Page Management')
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"><i class="fa fa-etsy"></i> Page</a></li>
    <li class="active">Halaman Baru</li>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Halaman Baru</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => 'admin.page.save']) !!}
                <div class="form-group">
                    <label for="">Judul</label>
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="">Isi</label>
                    {!! Form::textarea('description', null, ['class' => 'form-control','id' => 'summernote']) !!}
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