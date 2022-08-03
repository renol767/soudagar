<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SOUDAGAR.ID">

    <!-- ========== Page Title ========== -->
    <title>Soudagar.id</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('/images/logo/soudagar.jpg') }}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('appkulanding/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('appkulanding/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('appkulanding/assets/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('appkulanding/assets/css/elegant-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('appkulanding/assets/css/flaticon-set.css') }}" rel="stylesheet" />
    <link href="{{ asset('appkulanding/assets/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('appkulanding/assets/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('appkulanding/assets/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('appkulanding/assets/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('appkulanding/assets/css/validnavs.css') }}" rel="stylesheet" />
    <link href="{{ asset('appkulanding/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('appkulanding/style.css') }}" rel="stylesheet">
    <link href="{{ asset('appkulanding/assets/css/responsive.css') }}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Header 
    ============================================= -->
    <header>
        <!-- Start Navigation -->
        <nav class="navbar mobile-sidenav attr-border navbar-sticky navbar-default validnavs navbar-fixed white no-background">


            <div class="container d-flex justify-content-between align-items-center">            

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index-2.html">
                        <img src="{{ asset('images/logo/soudagar-light.png') }}" class="logo logo-display" alt="Logo">
                        <img src="{{ asset('images/logo/soudagar.jpg') }}" class="logo logo-scrolled" alt="Logo">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Main Nav -->
                <div class="main-nav-content">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <img src="{{ asset('/images/logo/soudagar.jpg') }}" alt="Logo">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-times"></i>
                        </button>
                        
                        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Blog</a>
                                <ul class="dropdown-menu">
                                    <li><a href="blog-standard.html">Blog Standard</a></li>
                                    <li><a href="blog-with-sidebar.html">Blog With Sidebar</a></li>
                                    <li><a href="blog-2-colum.html">Blog Grid Two Colum</a></li>
                                    <li><a href="blog-3-colum.html">Blog Grid Three Colum</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                    <li><a href="blog-single-with-sidebar.html">Blog Single With Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">contact</a></li>
                            <li><a href="{{ route('login') }}">login</a></li>
                            <li><a href="{{ route('register') }}">daftar</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->

                    <!-- Overlay screen for menu -->
                    <div class="overlay-screen"></div>
                    <!-- End Overlay screen for menu -->

                </div>
                <!-- Main Nav -->
            </div>   
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Header -->

    @yield('content')
    

    <!-- Start Footer 
    ============================================= -->
    <footer class="bg-dark text-light">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <div class="col-lg-4 col-md-6 item">
                        <div class="f-item about">
                            <img src="{{ asset('images/logo/soudagar-light.png') }}" alt="Logo">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore voluptates repudiandae itaque odio deserunt molestiae cupiditate minima doloribus praesentium quae quia eveniet exercitationem tempora quas nisi qui cum, suscipit quod!
                            </p>
                            <form action="#">
                                <input type="email" placeholder="Email" class="form-control" name="email">
                                <button type="submit"> <i class="arrow_right"></i></button>  
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 item">
                        <div class="f-item link">
                            <h4 class="widget-title">Quick LInk</h4>
                            <ul>
                                <li>
                                    <a href="#"><i class="fas fa-angle-right"></i> Home</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-angle-right"></i> Blog Page</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-angle-right"></i> Login</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fas fa-angle-right"></i> Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 item">
                        <div class="f-item contact-widget">
                            <h4 class="widget-title">Contact Info</h4>
                            <div class="address">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <div class="content">
                                            <strong>Address:</strong>
                                            45473, Alabasta
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="content">
                                            <strong>Email:</strong>
                                            <a href="mailto:info@validtheme.com">info@soudagar.com</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="content">
                                            <strong>Phone:</strong>
                                            <a href="tel:2151234567">+62 090909090</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p>&copy; Copyright {{ date('Y') }}. All Rights Reserved by <a href="#">soudagar.id</a></p>
                    </div>
                    <div class="col-lg-6 text-end link">
                        <ul>
                            <li>
                                <a href="#">Terms</a>
                            </li>
                            <li>
                                <a href="#">Privacy</a>
                            </li>
                            <li>
                                <a href="#">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ asset('appkulanding/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/progress-bar.min.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/count-to.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/validnavs.js') }}"></script>
    <script src="{{ asset('appkulanding/assets/js/main.js') }}"></script>

</body>
</html>