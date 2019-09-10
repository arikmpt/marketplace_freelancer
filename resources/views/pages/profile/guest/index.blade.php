@extends('layouts.master')
@section('breadcrumb')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" title="" itemprop="url">Beranda</a></li>
            <li class="breadcrumb-item active">{{ $profile->username }}</li>
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
                        <div class="dashboard-tabs-wrapper">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s">
                                        <div class="profile-sidebar-inner brd-rd5">
                                            <div class="user-info red-bg">
                                                <img class="brd-rd50" src="{{ $profile->photo ? '/storage/'.$profile->photo : 'https://via.placeholder.com/75?text=Belum Ada Foto' }}" alt="user-avatar.jpg" itemprop="image" style="width :60px">
                                                <div class="user-info-inner">
                                                    <h5 itemprop="headline"><a href="#" title="" itemprop="url">{{ $profile->name }}</a></h5>
                                                    <span><a href="#" title="" itemprop="url">{{ $profile->email }}</a></span>
                                                </div>
                                            </div>
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#dashboard" data-toggle="tab"><i class="fa fa-dashboard"></i> Beranda</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="dashboard">
                                            <div class="dashboard-wrapper dashboard-profile brd-rd5">
                                                <div class="dashboard-title">
                                                    <h4 itemprop="headline">Profile Saya</h4>
                                                </div>
                                                <div class="restaurants-list">
                                                    <div class="featured-restaurant-box style3 brd-rd5 wow fadeInUp" data-wow-delay="0.2s">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">Nama</label>
                                                                <p>{{ $profile->name }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Email</label>
                                                                <p>{{ $profile->email }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">No Handphone</label>
                                                                <p>{{ $profile->phone ? $profile->phone : '-' }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Tanggal Lahir</label>
                                                                <p>{{ $profile->birthdate ? $profile->birthdate : '-' }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Jenis Kelamin</label>
                                                                <p>{{ $profile->gender ? $profile->gender : '-' }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Alamat</label>
                                                                <p>{{ $profile->address ? $profile->address : '-' }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Provinsi</label>
                                                                <p>{{ $profile->state ? $profile->state : '-' }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Kota</label>
                                                                <p>{{ $profile->city ? $profile->city : '-' }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Kecamatan</label>
                                                                <p>{{ $profile->district ? $profile->district : '-' }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Kelurahan</label>
                                                                <p>{{ $profile->sub_district ? $profile->sub_district : '-' }}</p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="">Kodepos</label>
                                                                <p>{{ $profile->postal_code ? $profile->postal_code : '-' }}</p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="">Tentang Saya</label>
                                                                <p>{{ $profile->about ? $profile->about : '-' }}</p>
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
                    </div><!-- Section Box -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

