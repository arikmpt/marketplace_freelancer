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
                                <div class="col-md-8 col-sm-12 col-lg-8">
                                    <div class="restaurant-detail-wrapper">
                                        <div class="restaurant-detail-info">
                                            <div class="restaurant-detail-title">
                                                <h1 itemprop="headline">Redesign Website</h1>
                                                <div class="info-meta">
                                                    <span>Owner Name</span>
                                                    <span><a href="#" title="" itemprop="url">Bakery</a>, <a href="#" title="" itemprop="url">Cafe</a></span>
                                                </div>
                                                <div class="rating-wrapper">
                                                    <a class="gradient-brd brd-rd2" href="#" title="" itemprop="url"><i class="fa fa-star"></i> Owner Rate <i>4.0</i></a>
                                                </div>
                                            </div>
                                            
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then</p>
                                        </div>
                                        <h4>Ajukan Penawaran</h4>
                                        <form action="" class="form-bid">
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
                                <div class="col-md-4 col-sm-12 col-lg-4">
                                    <div class="order-wrapper right wow fadeIn" data-wow-delay="0.2s">
                                        <div class="order-inner gradient-brd">
                                            <h4 itemprop="headline">Owner Info</h4>
                                            <div class="order-list-wrapper">
                                                
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