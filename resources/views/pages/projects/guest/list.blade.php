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
                                                    <li><a href="#" title="" itemprop="url">Fast Food</a> <span>30</span></li>
                                                    <li><a href="#" title="" itemprop="url">North Indian</a> <span>28</span></li>
                                                    <li><a href="#" title="" itemprop="url">Chinese</a> <span>25</span></li>
                                                    <li><a href="#" title="" itemprop="url">Bakery</a> <span>11</span></li>
                                                    <li><a href="#" title="" itemprop="url">Mughlai</a> <span>7</span></li>
                                                    <li><a href="#" title="" itemprop="url">Pizza</a> <span>6</span></li>
                                                    <li><a href="#" title="" itemprop="url">Ice Cream</a> <span>6</span></li>
                                                    <li><a href="#" title="" itemprop="url">Rolls</a> <span>6</span></li>
                                                    <li><a href="#" title="" itemprop="url">Cafe</a> <span>5</span></li>
                                                    <li><a href="#" title="" itemprop="url">Italian</a> <span>5</span></li>
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

                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <div class="featured-restaurant-box with-bg style2 brd-rd12 wow fadeIn" data-wow-delay="0.2s">
                                                    <div class="featured-restaurant-info">
                                                        <h4 itemprop="headline"><a href="{{ route('project.detail') }}" title="" itemprop="url">Redesign Website</a></h4>
                                                        <div>
                                                            <span class="food-types">Harga:</span>
                                                            <span>Rp 1.200.000</span>
                                                        </div>
                                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <div class="featured-restaurant-box with-bg style2 brd-rd12 wow fadeIn" data-wow-delay="0.2s">
                                                    <div class="featured-restaurant-info">
                                                        <h4 itemprop="headline"><a href="{{ route('project.detail') }}" title="" itemprop="url">Redesign Website</a></h4>
                                                        <div>
                                                            <span class="food-types">Harga:</span>
                                                            <span>Rp 1.200.000</span>
                                                        </div>
                                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <div class="featured-restaurant-box with-bg style2 brd-rd12 wow fadeIn" data-wow-delay="0.2s">
                                                    <div class="featured-restaurant-info">
                                                        <h4 itemprop="headline"><a href="{{ route('project.detail') }}" title="" itemprop="url">Redesign Website</a></h4>
                                                        <div>
                                                            <span class="food-types">Harga:</span>
                                                            <span>Rp 1.200.000</span>
                                                        </div>
                                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <div class="featured-restaurant-box with-bg style2 brd-rd12 wow fadeIn" data-wow-delay="0.2s">
                                                    <div class="featured-restaurant-info">
                                                        <h4 itemprop="headline"><a href="{{ route('project.detail') }}" title="" itemprop="url">Redesign Website</a></h4>
                                                        <div>
                                                            <span class="food-types">Harga:</span>
                                                            <span>Rp 1.200.000</span>
                                                        </div>
                                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
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