@extends('layouts.admin.master')
@section('page_title', 'Dashboard')
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Setting</li>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Setting Website</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['enctype' => 'multipart/form-data','route' => 'admin.setting.save']) !!}
                <div class="form-group">
                    <label for="">Title</label>
                    {!! Form::text('title', $setting->title, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="">Meta Keyword</label>
                    {!! Form::text('meta_keyword', $setting->meta_keyword, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="">Meta Description</label>
                    {!! Form::textarea('meta_description', $setting->meta_description, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="">Logo</label>
                    {!! Form::file('logo', ['class' => 'dropify',
                        'data-max-file-size' => '2M',
                        'data-default-file' => $setting->logo ? '/storage/'.$setting->logo : null,
                        'data-allowed-file-extensions' => 'png jpg jpeg']) !!}
                </div>

                <div class="form-group">
                    <label for="">Favicon</label>
                    {!! Form::file('favicon', ['class' => 'dropify', 'data-max-file-size' => '1M',
                        'data-default-file' => $setting->favicon ? '/storage/'.$setting->favicon : null,
                        'data-allowed-file-extensions' => 'png jpg jpeg ico']) !!}
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            {!! Form::close() !!}
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.dropify').dropify()
        })
    </script>
@endpush