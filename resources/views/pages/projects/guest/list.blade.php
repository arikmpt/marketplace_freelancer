@extends('layouts.master')
@section('breadcrumb')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}" title="" itemprop="url">Beranda</a></li>
            <li class="breadcrumb-item active">Daftar Pekerjaan</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="block gray-bg bottom-padd210 top-padd30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="sec-box">
                        <div class="sec-wrapper">
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-lg-3">
                                    <div class="sidebar left">
                                        <div class="widget style2 Search_filters wow fadeIn" data-wow-delay="0.2s">
                                            <h4 class="widget-title2 sudo-bg-red" itemprop="headline">Kategori</h4>
                                            <div class="widget-data">
                                                <ul>
                                                    @foreach($categories as $category)
                                                        <li><a href="{{ route('project.list.category', $category->slug) }}" title="" itemprop="url">{{ $category->name }}</a> <span>{{ $category->projects->count() }}</span></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--Sidebar -->
                                </div>
                                <div class="col-md-9 col-sm-12 col-lg-9">
                                    <div class="title2-wrapper">
                                        <h3 class="marginb-0" itemprop="headline">Pekerjaan Yang Tersedia Di Sistem Kami</h3>
                                    </div>
                                    <div class="remove-ext">
                                        <div class="row">

                                            @foreach($projects as $project)
                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                    <div class="featured-restaurant-box with-bg style2 brd-rd12 wow fadeIn" data-wow-delay="0.2s">
                                                        <div class="featured-restaurant-info">
                                                            <h4 itemprop="headline"><a href="{{ route('project.detail', $project->uuid) }}" title="" itemprop="url">{{ $project->title }}</a></h4>
                                                            <div>
                                                                <span class="food-types">Harga:</span>
                                                                <span>Rp {{ $project->published_budget }}</span>
                                                            </div>
                                                            <p style="width: 100%; margin-bottom: 0;">Keahlian : 
                                                                @foreach($project->skills as $skill)
                                                                    {{ $skill->name.','}}
                                                                @endforeach
                                                            </p>

                                                            <p style="width: 100%; margin-bottom: 25px;">Pemilik : 
                                                                {{ $project->owner->username }}
                                                            </p>
                                                            {!! $project->description !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            
                                            <div class="pagination-wrapper text-center">
                                                {{ $projects->links() }}
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