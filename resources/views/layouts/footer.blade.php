<?php
    use App\Models\Page;
    use App\Models\Contact;

    $arrs = Page::get();
    $contact = Contact::first();
?>

<footer>
    <div class="block top-padd80 bottom-padd80 dark-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="footer-data">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="widget about_widget wow fadeIn" data-wow-delay="0.1s">
                                    <div class="logo"><h1 itemprop="headline"><a href="#" title="Home" itemprop="url"><img src="{{ config('website.logo') ? config('website.logo')  : 'https://via.placeholder.com/150?text=no logo'  }}" alt="logo.png" itemprop="image" style="width: 80px;"></a></h1></div>
                                    <div class="social2">
                                        <a class="brd-rd50" href="#" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a class="brd-rd50" href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
                                        <a class="brd-rd50" href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a class="brd-rd50" href="#" title="Pinterest" itemprop="url" target="_blank"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="widget information_links wow fadeIn" data-wow-delay="0.2s">
                                    <h4 class="widget-title" itemprop="headline">Halaman Lainnya</h4>
                                    <ul>
                                        @foreach($arrs as $arr)
                                            <li><a href="{{ route('page.index', $arr->slug) }}" title="" itemprop="url">{{ $arr->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s">
                                    <h4 class="widget-title" itemprop="headline">Hubungi Kami</h4>
                                    <ul>
                                        @if($contact && $contact->address != null && $contact->address != "" )
                                            <li><i class="fa fa-map-marker"></i> {{ $contact->address }}</li>
                                        @endif
                                        @if($contact && $contact->phone != null && $contact->phone != "")
                                            <li><i class="fa fa-phone"></i> {{ $contact->phone }}</li>
                                        @endif
                                        @if($contact && $contact->email != null && $contact->email != "")
                                            <li><i class="fa fa-envelope"></i> <a href="#" title="" itemprop="url">{{ $contact->email }}</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- Footer Data -->
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="bottom-bar dark-bg text-center">
    <div class="container">
        <p itemprop="description"><a href="templatespoint.net">&copy; {{ date('Y') }} Kerja Yuk</a></p>
    </div>
</div><!-- Bottom Bar -->
