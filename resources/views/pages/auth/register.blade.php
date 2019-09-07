@extends('layouts.master')
@section('breadcrumb')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" title="" itemprop="url">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar</li>
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
                    {!! Form::open(['route' => 'auth.register.store']) !!}
                    <div class="auth-form">
                        <h4 class="text-center mg-b-50">Silakan Lengkapi Form Dibawah Untuk Daftar</h4>
                        <div class="form-group">
                            <label for="">Nama </label>
                            {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Masukan Nama Lengkap Anda']) !!}
                        </div>
                        <div class="form-group">
                            <label for="">Nama Pengguna</label>
                            {!! Form::text('username',null,['class' => 'form-control','placeholder' => 'Masukan Pengguna Anda']) !!}
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            {!! Form::email('email',null,['class' => 'form-control','placeholder' => 'Masukan Email Anda']) !!}
                        </div>
                        <div class="form-group">
                            <label for="">Kata Sandi</label>
                            {!! Form::password('password',['class' => 'form-control','placeholder' => 'Masukan Password Anda']) !!}
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi Sandi</label>
                            {!! Form::password('confirm_password',['class' => 'form-control','placeholder' => 'Konfirmasi Password Anda']) !!}
                        </div>
                        <button class="btn red-bg text-white" type="submit">Daftar</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection