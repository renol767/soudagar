@extends('layouts.landingPage.template')

@section('content')

<!-- Start Banner 
    ============================================= -->
<div class="banner-area banner-style-three text-light text-default" style="background-image: url(appkulanding/assets/img/shape/25.png);">
    <div class="shape-left" style="background-image: url(appkulanding/assets/img/shape/26.png);"></div>
    <div class="container">
        <div class="double-items">
            <div class="row align-center">

                <div class="col-lg-6 info">
                    <h2 class="wow fadeInRight" data-wow-defaul="300ms"><?= $konten->showcase1; ?></h2>
                    <p class="wow fadeInLeft" data-wow-delay="500ms">
                        {{ $konten->deskripsi_showcase1 }}
                    </p>
                    <a class="btn btn-md circle btn-light effect wow fadeInUp" data-wow-delay="700ms" href="{{ route('login') }}">Mulai Berjualan Sekarang<i class="fas fa-angle-right"></i></a>
                </div>

                <div class="col-lg-6 thumb wow fadeInRight" data-wow-delay="900ms">
                    <img src="{{ asset('images/landingpage/'.$konten->img_showcase1) }}" alt="SHOWCASE 1">
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Banner -->
<!-- Star About Area
    ============================================= -->
<div id="about" class="about-area default-padding">
    <!-- Shape -->
    <div class="fixed-shape-left">
        <img src="{{ asset('appkulanding/assets/img/shape/9.png') }}" alt="Shape">
    </div>
    <!-- End Shape -->
    <div class="container">
        <div class="about-items">
            <div class="row align-center">
                <div class="col-lg-6">
                    <div class="thumb">
                        <img class="wow fadeInLeft" data-wow-delay="300ms" src="{{ asset('images/landingpage/'.$konten->img_fadeInLeft_Showcase2) }}" alt="Thumb">
                        <img class="wow fadeInUp" data-wow-delay="500ms" src="{{ asset('images/landingpage/'.$konten->img_fadeInUp_Showcase2) }}" alt="Thumb">
                    </div>
                </div>
                <div class="col-lg-6 info wow fadeInRight">
                    <h2>{{ $konten->showcase2 }}</h2>
                    <p>
                        {{ $konten->deskripsi_showcase2 }}
                    </p>
                    <div class="button">
                        <a class="btn circle btn-theme-effect btn-sm" href="{{ route('login') }}">Mulai Jualan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About Area -->

<!-- Star About Area
    ============================================= -->
<div id="about" class="about-area bg-gray default-padding">
    <!-- Shape -->
    <div class="fixed-shape-left">
        <img src="{{ asset('appkulanding/assets/img/shape/9.png') }}" alt="Shape">
    </div>
    <!-- End Shape -->
    <div class="container">
        <div class="about-items">
            <div class="row align-center">
                <div class="col-lg-6">
                    <div class="thumb">
                        <img class="wow fadeInLeft" data-wow-delay="300ms" src="{{ asset('images/landingpage/'.$konten->img_fadeInLeft_Showcase3) }}" alt="Thumb">
                        <img class="wow fadeInUp" data-wow-delay="500ms" src="{{ asset('images/landingpage/'.$konten->img_fadeInUp_Showcase3) }}" alt="Thumb">
                    </div>
                </div>
                <div class="col-lg-6 info wow fadeInRight">
                    <h2>{{ $konten->showcase3 }}</h2>
                    <p>
                        {{ $konten->deskripsi_showcase3 }}
                    </p>
                    <div class="button">
                        <a class="btn circle btn-theme-effect btn-sm" href="{{ route('login') }}">Mulai Jualan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About Area -->
<!-- Star Brand Area
    ============================================= -->
<div class="clients-style-one-area default-padding text-center">
    <div class="container">
        <div class="clients-style-one-box">
            <div class="row">
                <div class="col-lg-12">
                    <h3><?= $konten->tagline_produkdanbrand; ?></h3>
                    <h4 class="text-center">Produk</h4>
                    <div class="partner-carousel owl-carousel owl-theme mb-4">
                        <img src="{{ asset('appkulanding/assets/img/logo/1.png') }}" alt="Partner">
                        <img src="{{ asset('appkulanding/assets/img/logo/2.png') }}" alt="Partner">
                        <img src="{{ asset('appkulanding/assets/img/logo/3.png') }}" alt="Partner">
                        <img src="{{ asset('appkulanding/assets/img/logo/4.png') }}" alt="Partner">
                        <img src="{{ asset('appkulanding/assets/img/logo/5.png') }}" alt="Partner">
                    </div>
                    <h4 class="text-center mt-4">Brand</h4>
                    <div class="partner-carousel owl-carousel owl-theme">
                        @foreach ($brand as $b)
                        <img src="{{ asset('images/brand/'.$b->logo_brand) }}" alt="{{ $b->nama_brand }}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Brand -->
<!-- Start Benerfit
    ============================================= -->
<div id="about" class="about-area bg-gray default-padding">
    <!-- Shape -->
    <div class="fixed-shape-left">
        <img src="{{ asset('appkulanding/assets/img/shape/9.png') }}" alt="Shape">
    </div>
    <!-- End Shape -->
    <div class="container">
        <div class="about-items">
            <div class="row align-center">
                <div class="col-lg-6">
                    <div class="thumb">
                        <img class="wow fadeInLeft" data-wow-delay="300ms" src="{{ asset('images/landingpage/'.$konten->img_benefit) }}" alt="Thumb">
                    </div>
                </div>
                <div class="col-lg-6 info wow fadeInRight">
                    <h4>{{ $konten->tagline_benefit }}</h4>
                    <h2>{{ $konten->deskripsi_benefit }}</h2>
                    <ul>
                        @for ($i=0; $i < count($benefit); $i++) <li>
                            <h5>{{ $benefit[$i] }}</h5>
                            <p>
                                @if($deskripsiBenefit[$i] != '')
                                    {{ $deskripsiBenefit[$i] }}
                                @endif
                            </p>
                            </li>
                            @endfor
                    </ul>
                    <div class="button">
                        <a class="btn circle btn-theme-effect btn-sm" href="{{ route('login') }}">Mulai Jualan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Benerit Area -->
<!-- Star Subscribe Area
    ============================================= -->
<!-- End Subscribe Area -->



<!-- Start Choose Us Area 
    ============================================= -->
<div class="choose-us-area default-padding">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-6 thumb">
                <img src="{{ asset('appkulanding/assets/img/illustration/2.png') }}" alt="dashboard">
            </div>

            <div class="col-lg-6 info">
                <div class="item-box">
                    <h4>Kenapa Harus SOUDAGAR.ID</h4>
                    <h2>{{ $konten->tagline_keunggulan }}</h2>
                    <p>
                        {{ $konten->deskripsi_keunggulan }}
                    </p>
                    <ul>
                        @for ($i=0; $i < count($keunggulan); $i++) <li>
                            <i class="fas fa-layer-group"></i>
                            <h5>{{ $keunggulan[$i] }}</h5>
                            </li>
                            @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Choose Us Area -->


<!-- Star FAQ -->

<div class="default-padding bg-gray">
    <div class="container">
        <div class="content-body">
            <!-- Collapse start -->
            <section id="collapsible">
                <div class="col-sm-12 position-center">
                    @foreach ($faq as $key=>$f)
                    <p class="mb-2 demo-inline-spacing">
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseExample{{ $f->id }}" aria-expanded="false" aria-controls="collapseExample{{ $f->id }}">
                            {{ $f->slug }}
                        </a>
                    </p>
                    <div class="collapse @if($key == 0) show @endif " id="collapseExample{{ $f->id }}">
                        <div class="d-flex p-1 mb-2">
                            <span>
                                {{ $f->deskripsi }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <!-- Collapse end -->
        </div>
    </div>
</div>


<!-- End FAQ -->
<!-- Start Blog 
    ============================================= -->
<div id="blog" class="blog-area default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-heading text-center">
                    <h2>Bingung Memulainya?</h2>
                    <div class="devider"></div>
                    <p>
                        Pelajari di Berbagai
                        Pelatihan Bisnis Online
                        Gratis di Soudagar.id!<br>
                        Para trainer profesional siap membimbing agar bisnismu semakin berkembang. Kamu akan belajar pola pikir wirausahawan, strategi bisnis online, dan cara efektif untuk melakukannya.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $namaBulan = [
                'Januari', 'Februari', 'Maret', 'April',
                'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ];
            ?>
            @foreach ($blog as $kontenBlog)
            <div class="single-item col-lg-4 col-md-2">
                <div class="item">
                    <div class="thumb">
                        <a href="{{ route('detailBlog',$kontenBlog->slug) }}"><img src="{{ asset('images/blog/'.$kontenBlog->image) }}" alt="Thumb"></a>
                        <div class="date"><strong>{{ $kontenBlog->tanggal }}</strong> <span>{{ $namaBulan[$kontenBlog->bulan] }}</span></div>
                    </div>
                    <div class="info">
                        <div class="meta">
                            <ul>
                                <li>
                                    <a href="#"><i class="fas fa-user-circle"></i> Admin</a>
                                </li>
                            </ul>
                        </div>
                        <h4>
                            <a href="#">{{ $kontenBlog->judul }}</a>
                        </h4>
                        <div class="overflow-hidden" style="min-height: 100px; max-height: 100px;">
                            <?= $kontenBlog->konten; ?>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Blog -->

@endSection()