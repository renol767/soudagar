
@extends ('layouts.landingPage.template')
@section('content')
<!-- Start Breadcrumb 
    ============================================= -->
@foreach ($detail as $d)

<!-- Start Breadcrumb 
    ============================================= -->
<div class="breadcrumb-area shadow dark bg-cover text-center text-light" style="background-image: url({{ asset('appkulanding/assets/img/illustration/6.png') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>SOUDAGAR.ID</h1>
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">{{$d->judul}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Blog
    ============================================= -->
<div class="blog-area single full-blog right-sidebar full-blog default-padding">
    <div class="container">
        <div class="blog-items">
            <div class="row">
                <div class="blog-content col-lg-8 col-md-12">
                    <div class="item">

                        <div class="blog-item-box">
                            <div class="thumb">
                                <a href="#"><img src="{{ asset('images/blog/'.$d->image) }}" alt="Thumb"></a>
                                <div class="date"><strong>{{ $d->tanggal }}</strong> <span>{{ $namaBulan[8] }}</span></div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fas fa-user"></i> Admin</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3>
                                    <a href="blog-single-with-sidebar.html">{{ $d->judul }} </a>
                                </h3>
                                <?= $d->konten; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Sidebar -->
                <div class="sidebar col-lg-4 col-md-12">
                    <aside>
                        <div class="sidebar-item search">
                            <div class="sidebar-info">
                                <form>
                                    <input type="text" name="text" class="form-control">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-item recent-post">
                            <div class="title">
                                <h4>Recent Post</h4>
                            </div>
                            <ul>
                                @foreach ($blog as $data)
                                <li>
                                    <div class="thumb">
                                        <a href="blog-single-with-sidebar.html">
                                            <img src="{{ asset('images/blog/'.$data->image) }}" alt="Thumb">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="meta-title">
                                            <span class="post-date">{{ $data->tanggal }}</span>
                                        </div>
                                        <a href="{{ route('detailBlog', $data->slug) }}">{{ $data->judul }}</a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>


                        <div class="sidebar-item social-sidebar">
                            <div class="title">
                                <h4>follow us</h4>
                            </div>
                            <div class="sidebar-info">
                                <ul>
                                    <li class="facebook">
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="pinterest">
                                        <a href="#">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li class="linkedin">
                                        <a href="#">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <!-- End Start Sidebar -->
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->

@endforeach
@endSection()
@section('script')



@endSection()