@extends('layouts.master')
@section('content')
<section>
    <div class="block">
        <div style="background-image: url(assets/images/topbg.jpg);" class="fixed-bg"></div>
        <div class="restaurant-searching text-center">
            <div class="restaurant-searching-inner">
                <h2 itemprop="headline"><span>Kerja Yuk</span></h2>
                <form class="restaurant-search-form brd-rd2">
                    <div class="row mrg10">
                        <div class="col-md-10 col-sm-10 col-lg-10 col-xs-12">
                            <div class="input-field brd-rd2"><input class="brd-rd2" type="text" placeholder="Nama Pekerjaan"></div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-lg-2 col-xs-12">
                            <button class="brd-rd2 red-bg" type="submit">SEARCH</button>
                        </div>
                    </div>
                </form>
                <div class="funfacts">
                    <div class="col-md-6 col-sm-6 col-lg-6">
                        <div class="fact-box">
                            <div class="fact-inner">
                                <strong><span class="counter">{{ $projects }}</span></strong>
                                <h5>Pekerjaan</h5>
                            </div>
                        </div><!-- Fact Box -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="fact-box">
                            <div class="fact-inner">
                                <strong><span class="counter">{{ $users }}</span></strong>
                                <h5>People Served</h5>
                            </div>
                        </div><!-- Fact Box -->
                    </div>
                </div><!-- Fun Facts -->
            </div>
            <img class="left-scooty-mockup" src="assets/images/resource/restaurant-mockup1.png" alt="restaurant-mockup1.png" itemprop="image">
            <img class="bottom-clouds-mockup" src="assets/images/resource/clouds.png" alt="clouds.png" itemprop="image">
        </div><!-- Restaurant Searching -->
    </div>
</section>

<section>
    <div class="block remove-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="title1-wrapper text-center">
                        <div class="title1-inner">
                            <h2 itemprop="headline">Kenapa Memilih Kami</h2>
                            <p itemprop="description">Things that get tricky are things like burgers and fries, or things that are deep-fried. We do have a couple of burger restaurants that are capable of doing a good job transporting but it's  Fries are almost impossible.</p>
                        </div>
                    </div>
                    {{-- <div class="top-restaurants-wrapper">
                        <ul class="restaurants-wrapper style2">
                            <li class="wow bounceIn" data-wow-delay="0.2s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 1" itemprop="url"><img src="assets/images/resource/top-restaurant1.png" alt="top-restaurant1.png" itemprop="image"></a></div></li>
                            <li class="wow bounceIn" data-wow-delay="0.4s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 2" itemprop="url"><img src="assets/images/resource/top-restaurant2.png" alt="top-restaurant2.png" itemprop="image"></a></div></li>
                            <li class="wow bounceIn" data-wow-delay="0.6s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 3" itemprop="url"><img src="assets/images/resource/top-restaurant3.png" alt="top-restaurant3.png" itemprop="image"></a></div></li>
                            <li class="wow bounceIn" data-wow-delay="0.8s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 4" itemprop="url"><img src="assets/images/resource/top-restaurant4.png" alt="top-restaurant4.png" itemprop="image"></a></div></li>
                            <li class="wow bounceIn" data-wow-delay="1s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 5" itemprop="url"><img src="assets/images/resource/top-restaurant5.png" alt="top-restaurant5.png" itemprop="image"></a></div></li>
                            <li class="wow bounceIn" data-wow-delay="1.2s"><div class="top-restaurant"><a class="brd-rd50" href="#" title="Restaurant 5" itemprop="url"><img src="assets/images/resource/top-restaurant6.png" alt="top-restaurant6.png" itemprop="image"></a></div></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section><!-- top resturents -->

@endsection