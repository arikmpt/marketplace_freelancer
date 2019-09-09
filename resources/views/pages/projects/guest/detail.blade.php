@extends('layouts.master')
@section('breadcrumb')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" title="" itemprop="url">Beranda</a></li>
            <li class="breadcrumb-item active">Nama Pekerjaan</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="block gray-bg top-padd30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="sec-box">
                        <div class="sec-wrapper">
                            <div class="row">
                                <div class="col-md-7 col-sm-12 col-lg-8">
                                    <div class="restaurant-detail-wrapper">
                                        <div class="restaurant-detail-info">
                                            <div class="restaurant-detail-title">
                                                <h1 itemprop="headline" style="margin-bottom: 25px;">{{ $project->title }}</h1>
                                            </div>
                                            
                                            <p style="margin-bottom: 45px;">{!! $project->description !!}</p>
                                        </div>
                                        <form action="" class="form-bid" style="margin-top: 80px;">
                                            <div class="form-group">
                                                <label for="">Harga</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Deskripsi</label>
                                                <textarea class="form-control"> </textarea>
                                            </div>
                                            <button type="submit" class="btn btn-red btn-block">Ajukan</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-12 col-lg-4">
                                    <div class="order-wrapper right wow fadeIn" data-wow-delay="0.2s">
                                        <div class="order-inner gradient-brd">
                                            <h4 itemprop="headline">Info</h4>
                                            <div class="order-list-wrapper" style="padding: 0 15px;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><b>Pemilik : </b></p>
                                                        <p><b>Harga : </b></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-right">{{ $project->user->username }}</p>
                                                        <p class="text-right">Rp {{ $project->published_budget }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection