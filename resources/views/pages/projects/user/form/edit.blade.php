@extends('layouts.master')
@section('css')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endsection
@section('breadcrumb')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" title="" itemprop="url">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile.me') }}" title="" itemprop="url">Akun Saya</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile.project.list') }}" title="" itemprop="url">Proyek Saya</a></li>
            <li class="breadcrumb-item active">Proyek Baru</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="block less-spacing gray-bg top-padd30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="sec-box">
                        <h4 style="margin-bottom: 35px;">Proyek Baru</h4>
                        {!! Form::open(['route' => 'profile.project.update','enctype' => 'multipart/form-data']) !!}
                        {!! Form::hidden('id', $project->id) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    {!! Form::text('title', $project->title, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Lama Pengerjaan</label>
                                    {!! Form::number('finish_day', $project->finish_day, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    {!! Form::select('category_id', $categories, $project->category_id, ['class' => 'form-control','placeholder' => 'Pilih Kategori']) !!}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    {!! Form::number('published_budget', $project->published_budget, ['class' => 'form-control', 'min' => 0]) !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Lampiran</label>
                                    {!! Form::file('attachment', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Keahlian Yang Dibutuhkan</label>
                                    {!! Form::select('skills[]', $skills, $project->skillsToString(), ['class' => 'form-control select2','multiple' => true]) !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Deskripsi Proyek</label>
                                    {!! Form::textarea('description', $project->description ,['id' => 'summernote']) !!}
                                </div>
                            </div>

                            <button type="submit" class="btn btn-red">Perbaruhi</button>
                        </div>
                        {!! Form::close() !!}
                    </div><!-- Section Box -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height : 300
            });
            $('.select2').select2({})
        })
    </script>
@endpush
