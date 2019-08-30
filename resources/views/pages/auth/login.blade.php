@extends('layouts.master')
@section('breadcrumb')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" title="" itemprop="url">Beranda</a></li>
            <li class="breadcrumb-item active">Masuk</li>
        </ol>
    </div>
</div>
@endsection
@section('content')

<section>
    <div class="block less-spacing gray-bg top-padd30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="auth-form">
                        <h4 class="text-center mg-b-50">Silakan Lengkapi Form Dibawah Untuk Masuk</h4>
                        <div class="form-group">
                            <label for="">Nama Pengguna / Email</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Kata Sandi</label>
                            <input type="password" class="form-control">
                        </div>
                        <button class="btn red-bg text-white" type="submit">Masuk</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection