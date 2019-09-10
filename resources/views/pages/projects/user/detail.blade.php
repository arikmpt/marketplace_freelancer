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
            <li class="breadcrumb-item active">{{ $project->title }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="block less-spacing gray-bg top-padd30">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('profile.project.list') }}" class="btn btn-transparent"> <i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="sec-box">
                        <h4 style="margin-bottom: 35px;">{{ $project->title }}</h4>
                        <div class="row" style="margin-bottom: 25px;">
                            <div class="col-md-5">
                                <div class="w100 pull-left">
                                    <span class="food-types">Harga :</span>
                                    <span>Rp {{ $project->published_budget }}</span>
                                </div>
                                <div class="w100 pull-left">
                                    <span class="food-types">Total Penawaran :</span>
                                    <span>{{ $project->bids->count() }}</span>
                                </div>
                                <div class="w100 pull-left">
                                    <span class="food-types">Lama Pengerjaan :</span>
                                    <span>{{ $project->finish_day }} Hari</span>
                                </div>
                                <div class="w100 pull-left">
                                    <span class="food-types">Status :</span>
                                    <span>{{ $project->status }}</span>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="w100 pull-left">
                                    <span class="food-types">Tawaran Yang Disetujui :</span>
                                    <span>{{ $project->winner ? $project->winner->username : '-' }}</span>
                                </div>
                                <div class="w100 pull-left">
                                    <span class="food-types">Harga Yang Disepakati:</span>
                                    <span>Rp {{ $project->accept_price }}</span>
                                </div>
                                <div class="w100 pull-left">
                                    <span class="food-types">Kadaluarsa Pada :</span>
                                    <span>{{ $project->created_at->subDays(-15)->format('d/M/Y') }}</span>
                                </div>
                                <div class="w100 pull-left">
                                    <span class="food-types">Keahlian Yang Dibutuhkan : </span>
                                    @foreach($project->skills as $skill)
                                        <span>{{ $skill->name.','}}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {!! $project->description !!}
                        @if($project->attachment)
                            <div class="form-group">
                                <label for="">Lampiran</label>
                                <img src="/storage/{{ $project->attachment }}" alt="">
                            </div>
                        @endif
                    </div><!-- Section Box -->
                </div>
                <div class="col-md-12">
                    <div class="sec-box">
                        <h4 class="title-section">Total Penawaran</h4>
                        <ul class="dishes-list">
                            @foreach($project->bids as $bid)
                                <li class="wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="featured-restaurant-box">
                                        <div class="featured-restaurant-thumb text-center">
                                            <a href="#" title="" itemprop="url">
                                                <img src="{{ $bid->user->photo ? '/storage/'.$bid->user->photo : 'https://via.placeholder.com/150' }}" alt="dish-img1-1.jpg" itemprop="image">
                                                {{ $bid->user->username  }}
                                            </a>
                                        </div>
                                        <div class="featured-restaurant-info">
                                            <h4 itemprop="headline"><a href="#" title="" itemprop="url"></a></h4>
                                            <span class="price">Rp {{ $bid->price }}</span>
                                            <p itemprop="description">{{ $bid->description }}</p>
                                        </div>
                                        <div class="ord-btn">
                                            <a class="brd-rd2" href="#" title="Order Now" itemprop="url">Pilih Penawaran</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
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
