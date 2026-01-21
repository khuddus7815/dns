<!-- loader start -->
<div class="loader_skeleton">
    <header class="header-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                                <a href="index.html">
                                    <?php
                                    $CI =& get_instance();
                                    $CI->load->model('Settings_model');
                                    $logo_path = $CI->Settings_model->get_setting('site_logo');
                                    $logo_url = $logo_path ? base_url('upload/logo/' . $logo_path) : base_url('assets/images/icon/logo/FD7.svg');
                                    ?>
                                    <img src="<?= $logo_url ?>" class="img-fluid blur-up lazyload" alt="" width="200" height="200">
                                </a>
                            </div>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <nav>
                                    <div class="toggle-nav">
                                        <i class="fa fa-bars sidebar-bar"></i>
                                    </div>
                                    <!-- Horizontal menu -->
                                    <ul class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                        </li>
                                        <li>
                                            <a href="#">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Products</a>
                                        </li>
                                        <li>
                                            <a href="#">Blog</a>
                                        </li>
                                        <li>
                                            <a href="#">About Us</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="top-header d-none d-sm-block">
                                <ul class="header-dropdown">
                                    <li class="mobile-wishlist">
                                        <a href="#">
                                            <img src="<?= base_url('assets/images/jewellery/icon/heart.png') ?>" alt="">
                                        </a>
                                    </li>
                                    <li class="onhover-dropdown mobile-account">
                                        <img src="<?= base_url('assets/images/jewellery/icon/avatar.png') ?>" alt="">
                                    </li>
                                </ul>

                            </div>
                            <div>
                                <div class="icon-nav d-none d-sm-block">
                                    <ul>
                                        <li class="onhover-div mobile-search">
                                            <div><img src="<?= base_url('assets/images/jewellery/icon/search.png') ?>" onclick="openSearch()" class="img-fluid blur-up lazyload" alt="">
                                                <i class="ti-search" onclick="openSearch()"></i>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-setting">
                                            <div><img src="<?= base_url('assets/images/jewellery/icon/controls.png') ?>" class="img-fluid blur-up lazyload" alt="">
                                                <i class="ti-settings"></i>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                            <div><img src="<?= base_url('assets/images/jewellery/icon/cart.png') ?>" class="img-fluid blur-up lazyload" alt="">
                                                <i class="ti-shopping-cart"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="home-slider h-100vh">
        <div class="home"></div>
    </div>
    <div class="container category-ldr">
        <section class="section-b-space border-section border-top-0">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="category-block col-2">
                            <a href="#">
                                <div class="category-image svg-image">
                                </div>
                            </a>
                            <div class="category-details">
                                <h5></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="category-block col-2">
                            <a href="#">
                                <div class="category-image svg-image">
                                </div>
                            </a>
                            <div class="category-details">
                                <h5></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="category-block col-2">
                            <a href="#">
                                <div class="category-image svg-image">
                                </div>
                            </a>
                            <div class="category-details">
                                <h5></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="category-block col-2 d-none d-md-block">
                            <a href="#">
                                <div class="category-image svg-image">
                                </div>
                            </a>
                            <div class="category-details">
                                <h5></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="category-block col-2 d-none d-lg-block">
                            <a href="#">
                                <div class="category-image svg-image">
                                </div>
                            </a>
                            <div class="category-details">
                                <h5></h5>
                                <h6></h6>
                            </div>
                        </div>
                        <div class="category-block col-2 d-none d-xl-block">
                            <a href="#">
                                <div class="category-image svg-image">
                                </div>
                            </a>
                            <div class="category-details">
                                <h5></h5>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container section-b-space">
        <div class="row section-t-space">
            <div class="col-lg-6 offset-lg-3">
                <div class="product-para">
                    <p class="first"></p>
                    <p class="second"></p>
                </div>
            </div>
            <div class="col-12">
                <div class="no-slider row">
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="img-wrapper"></div>
                        <div class="product-detail">
                            <h4></h4>
                            <h5></h5>
                            <h5 class="second"></h5>
                            <h6></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- loader end -->
