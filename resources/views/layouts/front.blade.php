<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/Ecommerce/assets/imgs/theme/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('/Ecommerce/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/Ecommerce/assets/css/custom.css') }}">
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        @include('layouts.frontend.header')
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{ asset('/Ecommerce') }}/assets/imgs/logo/logo.png"
                            alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <li><a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a>
                                </li>
                                <li> <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer &
                                        Office</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a>
                                </li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="index.html">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="shop.html">shop</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our
                                    Collections</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Dresses</a></li>
                                            <li><a href="product-details.html">Blouses & Shirts</a></li>
                                            <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-details.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Jackets</a></li>
                                            <li><a href="product-details.html">Casual Faux Leather</a></li>
                                            <li><a href="product-details.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Gaming Laptops</a></li>
                                            <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                            <li><a href="product-details.html">Tablets</a></li>
                                            <li><a href="product-details.html">Laptop Accessories</a></li>
                                            <li><a href="product-details.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="blog.html">Blog</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                    href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a href="contact.html"> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="login.html">Log In </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="register.html">Sign Up</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#">(+1) 0000-000-000 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="{{ asset('/Ecommerce') }}/assets/imgs/theme/icons/icon-facebook.svg"
                            alt=""></a>
                    <a href="#"><img src="{{ asset('/Ecommerce') }}/assets/imgs/theme/icons/icon-twitter.svg"
                            alt=""></a>
                    <a href="#"><img src="{{ asset('/Ecommerce') }}/assets/imgs/theme/icons/icon-instagram.svg"
                            alt=""></a>
                    <a href="#"><img src="{{ asset('/Ecommerce') }}/assets/imgs/theme/icons/icon-pinterest.svg"
                            alt=""></a>
                    <a href="#"><img src="{{ asset('/Ecommerce') }}/assets/imgs/theme/icons/icon-youtube.svg"
                            alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <main class="main">
        @yield('content')
    </main>

    <footer class="main">
        @include('layouts.frontend.footer')
    </footer>
    <!-- Vendor JS-->
    <script src="{{ asset('/Ecommerce') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/slick.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/wow.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/jquery-ui.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/magnific-popup.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/select2.min.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/waypoints.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/counterup.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/images-loaded.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/isotope.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/scrollup.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template  JS -->
    <script src="{{ asset('/Ecommerce') }}/assets/js/main.js?v=3.3"></script>
    <script src="{{ asset('/Ecommerce') }}/assets/js/shop.js?v=3.3"></script>
</body>

</html>
