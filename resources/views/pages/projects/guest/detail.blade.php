@extends('layouts.master')
@section('breadcrumb')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" title="" itemprop="url">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('project.list') }}" title="" itemprop="url">Pekerjaan</a></li>
            <li class="breadcrumb-item active">{{ $project->title }}</li>
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
                                            @if($project->attachment)
                                                <div class="form-group">
                                                    <label for="">Lampiran</label>
                                                    <img src="/storage/{{ $project->attachment }}" alt="">
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="restaurant-detail-wrapper">
                                        <h4 style="margin-top: 80px;">Ajukan Penawaran Anda</h4>
                                        {!! Form::open(['route' => 'project.bid.store', 'style' => 'margin-top: 15px;','class' => 'form-bid']) !!}
                                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                                            {!! Form::hidden('project_id', $project->id) !!}
                                            {!! Form::hidden('project_price', $project->published_budget) !!}
                                            {!! Form::hidden('project_user_id', $project->user_id) !!}
                                            <div class="form-group">
                                                <label for="">Harga</label>
                                                {!! Form::number('price', null, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="">Deskripsi</label>
                                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                                            </div>
                                            <button type="submit" class="btn btn-red btn-block">Ajukan</button>
                                        {!! Form::close() !!}
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
                                                        <p class="text-right">{{ $project->owner->username }}</p>
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
                    <div class="sec-box">
                        <div class="sec-wrapper">
                            <h4>Total Penawaran</h4>
                            <div class="row">
                                @forelse($project->bids as $bid)
                                    <div class="col-md-2">
                                        <div class="featured-restaurant-thumb text-center">
                                            <a href="#" title="" itemprop="url">
                                                <img src="{{ $bid->user->photo ? '/storage/'.$bid->user->photo : 'https://via.placeholder.com/150' }}" alt="dish-img1-2.jpg" itemprop="image">
                                                {{ $bid->user->username }}
                                            </a>
                                        </div>
                                    </div>
                                @empty

                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection