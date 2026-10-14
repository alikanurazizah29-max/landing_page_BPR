<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<div class="container">
    <nav class="site-nav">
        <!-- 1. Nama Bank Dinamis dari Database -->
        <div class="logo">
            <a href="{{ route('home') }}" class="text-white font-weight-bold">
                {{ $companyProfile->company_name ?? 'BPR' }}<span class="text-primary">.</span>
            </a>
        </div>
        
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-lg-12 site-navigation text-center">
                
                <!-- 2. Menu Navigasi Utama Terstruktur & Bersih dari Sampah -->
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu">
                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="{{ request()->routeIs('user.layanan.*') ? 'active' : '' }}">
                        <a href="{{ route('user.layanan.layanans') }}">Produk & Layanan</a>
                    </li>
                    <li class="{{ request()->routeIs('user.article.*') ? 'active' : '' }}">
                        <a href="{{ route('user.article.articles') }}">Berita & Edukasi</a>
                    </li>
                    <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                        <a href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        <a href="{{ route('contact') }}">Hubungi Kami</a>
                    </li>
                </ul>

                <!-- 3. Tombol Toggle Menu Mobile -->
                <a href="#" class="burger light ml-auto site-menu-toggle js-menu-toggle d-block d-lg-none"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

            </div>
        </div>
    </nav> <!-- END nav -->
</div> <!-- END container -->