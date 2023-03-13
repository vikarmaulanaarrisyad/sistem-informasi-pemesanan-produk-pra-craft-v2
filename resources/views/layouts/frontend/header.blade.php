        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li>
                                    <a class="language-dropdown-active" href="#"> <i class="fa fas-facebook"></i>
                                        Facebook</i></a>
                                    <a class="language-dropdown-active" href="#"> <i class="fa fas-facebook"></i>
                                        Instragram</i></a>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>Get great devices up to 50% off <a href="shop.html">View details</a></li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today <a href="shop.html">Shop now</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                @guest
                                    <li>
                                        <a href="{{ route('login') }}">Log In </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}">Sign Up</a>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="index.html"><img src="{{ asset('/Ecommerce/assets/imgs/logo/logo.png') }}"
                                alt="logo"></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-1">
                            <form action="#">
                                <input type="text" placeholder="Search for items...">
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">

                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="cart.html">
                                        <img alt="Surfside Media"
                                            src="{{ asset('/Ecommerce/assets/imgs/theme/icons/icon-cart.svg') }}">
                                        <span class="pro-count blue">2</span>
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="product-details.html"><img alt="Surfside Media"
                                                            src="{{ asset('/Ecommerce/assets/imgs/shop/thumbnail-3.jpg') }}"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="product-details.html">Daisy Casual Bag</a></h4>
                                                    <h4><span>1 × </span>$800.00</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shopping-cart-img">
                                                    <a href="product-details.html"><img alt="Surfside Media"
                                                            src="{{ asset('/Ecommerce') }}/assets/imgs/shop/thumbnail-2.jpg"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="product-details.html">Corduroy Shirts</a></h4>
                                                    <h4><span>1 × </span>$3200.00</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span>$4000.00</span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{ route('orders.cart') }}" class="outline">View cart</a>
                                                <a href="checkout.html">Checkout</a>
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

        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="{{ asset('/Ecommerce') }}/assets/imgs/logo/logo.png"
                                alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Browse Categories
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>

                                    <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer &
                                            Office</a></li>

                                    <li>
                                        <ul class="more_slide_open" style="display: none;">
                                            <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Beauty,
                                                    Health</a></li>
                                            <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Bags and
                                                    Shoes</a></li>
                                            <li><a href="shop.html"><i class="surfsidemedia-font-diamond"></i>Consumer
                                                    Electronics</a></li>
                                            <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Automobiles
                                                    & Motorcycles</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="more_categories">Show more...</div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="index.html">Home </a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="blog.html">Blog </a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    @auth
                                        <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="#">Dashboard</a></li>
                                                <li><a href="#">Products</a></li>
                                                <li><a href="#">Categories</a></li>
                                                <li><a href="#">Coupons</a></li>
                                                <li><a href="#">Orders</a></li>
                                                <li><a href="#">Customers</a></li>
                                                <li><a href="#">Logout</a></li>
                                            </ul>
                                        </li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%
                    </p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.php">
                                    <img alt="Surfside Media"
                                        src="{{ asset('/Ecommerce') }}/assets/imgs/theme/icons/icon-heart.svg">
                                    <span class="pro-count white">4</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="cart.html">
                                    <img alt="Surfside Media"
                                        src="{{ asset('/Ecommerce') }}/assets/imgs/theme/icons/icon-cart.svg">
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media"
                                                        src="{{ asset('/Ecommerce') }}/assets/imgs/shop/thumbnail-3.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                                <h3><span>1 × </span>$800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="product-details.html"><img alt="Surfside Media"
                                                        src="{{ asset('/Ecommerce') }}/assets/imgs/shop/thumbnail-4.jpg"></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                                <h3><span>1 × </span>$3500.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="cart.html">View cart</a>
                                            <a href="shop-checkout.php">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
