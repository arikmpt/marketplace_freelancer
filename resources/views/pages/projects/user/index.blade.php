@extends('layouts.master')
@section('breadcrumb')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" title="" itemprop="url">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile.me') }}" title="" itemprop="url">Akun Saya</a></li>
            <li class="breadcrumb-item active">Proyek Saya</li>
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
                                                <img class="brd-rd50" src="{{ Auth::user()->photo ? '/storage/'.Auth::user()->photo : 'https://via.placeholder.com/75?text=Belum Ada Foto' }}" alt="user-avatar.jpg" itemprop="image" style="width :60px">
                                                <div class="user-info-inner">
                                                    <h5 itemprop="headline"><a href="#" title="" itemprop="url">{{ Auth::user()->name }}</a></h5>
                                                    <span><a href="#" title="" itemprop="url">{{ Auth::user()->email }}</a></span>
                                                </div>
                                            </div>
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#active" data-toggle="tab"><i class="fa fa-dashboard"></i> Aktif</a></li>
                                                <li><a href="#expire" data-toggle="tab"><i class="fa fa-comments"></i> Kadaluarsa</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="active">
                                            <div class="tabs-wrp brd-rd5">
                                                <h4 itemprop="headline">Proyek Saya</h4>
                                                <div class="select-wrap-inner text-right">
                                                   <a href="{{route('profile.project.new')}}" class="btn btn-red">Tambah Proyek</a>
                                                </div>
                                                @foreach($projects as $project)
                                                    <div class="review-list" style="margin-bottom: 40px">
                                                        <div class="review-box brd-rd5">
                                                            <h4 itemprop="headline"><a href="#" title="" itemprop="url">{{ $project->title }}</a></h4>
                                                            <div>
                                                                <span class="food-types">Harga:</span>
                                                                <span>Rp {{ $project->published_budget }}</span>
                                                            </div>
                                                            <div class="text-left">
                                                                <p style="width: 100%; margin-bottom: 0">Keahlian : 
                                                                    <span>Php, Jquery</span>
                                                                </p>
                                                                @if($project->is_approve == 0 && $project->is_reject == 0)
                                                                    <p style="width: 100%"> Status : Sedang Direview Admin</p>
                                                                @elseif($project->is_reject == 1 && $project->is_approve == 0)
                                                                    <p style="width: 100%"> Status : Di Tolak Admin</p>
                                                                @elseif($project->is_reject == 0 && $project->is_approve == 1)
                                                                    <p style="width: 100%"> Status : Di Setujui Admin</p>
                                                                @endif
                                                            </div>
                                                            {!! $project->description !!}
                                                        </div>
                                                    </div><!-- Review List -->
                                                @endforeach
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
@push('scripts')
    <script>
        $(document).ready(function() {

        })
    </script>
@endpush
