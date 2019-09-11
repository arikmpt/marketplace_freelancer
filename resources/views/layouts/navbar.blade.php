<header class="stick">
    <div class="logo-menu-sec">
        <div class="container">
            <div class="logo">
                <h1 itemprop="headline">
                    <a href="{{ route('homepage') }}" title="Home" itemprop="url">
                        <img src="{{ asset('assets/images/logo2.png') }}" alt="logo.png" itemprop="image">
                    </a>
                </h1>
            </div>
            <nav>
                <div class="menu-sec">
                    <ul>
                        <li><a href="{{ route('homepage') }}" title="Beranda" itemprop="url">Beranda</a></li>
                        <li><a href="{{ route('project.list') }}" title="Pekerjaan" itemprop="url">Pekerjaan</a></li>
                        @auth
                            <li><a href="{{ route('profile.me') }}" title="Pekerjaan" itemprop="url">Akun Saya</a></li>
                            <li>
                                <a href="{{ route('auth.logout') }}" title="Keluar" itemprop="url">Keluar</a>
                            </li>
                        @endauth
                        @guest
                            <li>
                                <a class="transparent-bg brd-rd4 mg-r-15" href="{{ route('auth.login.index') }}" title="Masuk" itemprop="url">Masuk</a>
                                <a class="red-bg brd-rd4" href="{{ route('auth.register.index') }}" title="Daftar" itemprop="url">Daftar</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav><!-- Navigation -->
        </div>
    </div><!-- Logo Menu Section -->
</header><!-- Header -->

<div class="responsive-header">
    <div class="responsive-logomenu">
        <div class="logo"><h1 itemprop="headline"><a href="{{ route('homepage') }}" title="Home" itemprop="url"><img src="assets/images/logo.png" alt="logo.png" itemprop="image"></a></h1></div>
        <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
    </div>
    <div class="responsive-menu">
        <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
        <div class="menu-lst">
            <ul>
                <li><a href="{{ route('homepage') }}" title="Beranda" itemprop="url">Beranda</a></li>
                <li><a href="{{ route('project.list') }}" title="Pekerjaan" itemprop="url">Pekerjaan</a></li>
                @auth
                    <li><a href="{{ route('profile.me') }}" title="Pekerjaan" itemprop="url">Akun Saya</a></li>
                    <li>
                        <a href="{{ route('auth.logout') }}" title="Keluar" itemprop="url">Keluar</a>
                    </li>
                @endauth
                @guest
                    <li>
                        <a class="transparent-bg brd-rd4 mg-r-15" href="{{ route('auth.login.index') }}" title="Masuk" itemprop="url">Masuk</a>
                        <a class="red-bg brd-rd4" href="{{ route('auth.register.index') }}" title="Daftar" itemprop="url">Daftar</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div><!-- Responsive Menu -->
</div><!-- Responsive Header -->