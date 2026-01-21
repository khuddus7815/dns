<header class="header-5 fixed-header">
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="container-fluid custom-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>Welcome to Our store DNS Store</li>
                            <!-- <?php print_r($categories); ?> -->
                            <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: 123 - 456 - 7890</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <ul class="header-dropdown">
                        <li class="mobile-wishlist"><a href="<?php echo base_url('/wishlist'); ?>"><i class="fa fa-heart" aria-hidden="true"></i></a>
                        </li>
                        <li class="onhover-dropdown mobile-account"><a href="<?php echo base_url('/profile'); ?>"> <i class="fa fa-user" aria-hidden="true"></i>
                                My Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 fixed-header">
                <div class="main-menu">
                    <div class="menu-left">
                        <div class="brand-logo">
                            <a href="<?php echo base_url('/'); ?>">
                                <?php
                                $CI =& get_instance();
                                $CI->load->model('Settings_model');
                                $logo_path = $CI->Settings_model->get_setting('site_logo');
                                $logo_url = $logo_path ? base_url('upload/logo/' . $logo_path) : base_url('assets/images/icon/logo/FD7.svg');
                                ?>
                                <img src="<?php echo $logo_url; ?>" class="img-fluid blur-up lazyload" alt="" width="200" height="200">

                                <!-- <h3>DNS Store</h3> -->
                            </a>
                        </div>
                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <nav id="main-nav">
                                <div class="toggle-nav">
                                    <i class="fa fa-bars sidebar-bar"></i>
                                </div>
                                <!-- Horizontal menu -->
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                    </li>
                                    <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                                    <li class="mega" id="hover-cls"><a href="<?php echo base_url('/category'); ?>">Products</a>
                                        <ul class="mega-menu full-mega-menu">
                                            <li>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col mega-box mega-box-odd">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5><?php print_r($categories[3]->category_name); ?></h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <?php
                                                                        // Assuming subcategories are stored in a separate array called $subcategories
                                                                        foreach ($subcategories as $subcategory) {
                                                                            if ($subcategory->category_id == $categories[3]->id) {
                                                                                echo '<li><a href="subcategory_page.php?id=' . $subcategory->id . '">' . $subcategory->subcategory_name . '</a></li>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <!-- <li><a href="grid-2-col.html">Black Forest</a></li>
                                                                        <li><a href="grid-3-col.html">Butterscotch</a></li>
                                                                        <li><a href="grid-4-col.html">Red Velvet</a></li>
                                                                        <li><a href="masonary-2-grid.html">Cartoon</a></li>
                                                                        <li><a href="masonary-3-grid.html">Chocolate</a></li>
                                                                        <li><a href="masonary-4-grid.html">Chocolate - Truffle</a></li>
                                                                        <li><a href="masonary-fullwidth.html">Cup Cake</a></li>
                                                                        <li><a href="grid-2-col.html">Fruit Cake</a></li>
                                                                        <li><a href="grid-3-col.html">Kids Cake</a></li>
                                                                        <li><a href="grid-4-col.html">Mango Cake</a></li>
                                                                        <li><a href="masonary-2-grid.html">Special Cake</a></li>
                                                                        <li><a href="masonary-3-grid.html">Strawberry Cake</a></li>
                                                                        <li><a href="masonary-4-grid.html">Vanilla cake</a></li>
                                                                        <li><a href="masonary-fullwidth.html">White Forest</a></li> -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mega-box mega-box-even">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5><?php print_r($categories[8]->category_name); ?></h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <?php
                                                                        // Assuming subcategories are stored in a separate array called $subcategories
                                                                        foreach ($subcategories as $subcategory) {
                                                                            if ($subcategory->category_id == $categories[8]->id) {
                                                                                echo '<li><a href="subcategory_page.php?id=' . $subcategory->id . '">' . $subcategory->subcategory_name . '</a></li>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <!-- <li><a href="nursery.html">Diary Milk</a></li>
                                                                        <li><a href="vegetables.html">Kit Kat
                                                                                <i class="fa fa-bolt icon-trend" aria-hidden="true"></i></a></li>
                                                                        <li><a href="bags.html">Ferrero Rocher</a></li> -->
                                                                    </ul>
                                                                </div>
                                                                <div class="menu-title mt-lg-5 mt-1">
                                                                    <h5 class="fw-bolder"><?php print_r($categories[4]->category_name); ?></h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <?php
                                                                        // Assuming subcategories are stored in a separate array called $subcategories
                                                                        foreach ($subcategories as $subcategory) {
                                                                            if ($subcategory->category_id == $categories[4]->id) {
                                                                                echo '<li><a href="subcategory_page.php?id=' . $subcategory->id . '">' . $subcategory->subcategory_name . '</a></li>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <!-- <li><a href="nursery.html">Mix Fruits</a></li>
                                                                        <li><a href="vegetables.html">Seasonal Fruits
                                                                                <i class="fa fa-bolt icon-trend" aria-hidden="true"></i></a></li> -->
                                                                    </ul>
                                                                </div>
                                                                <div class="menu-title mt-lg-5 mt-1">
                                                                    <h5 class="fw-bolder"><?php print_r($categories[5]->category_name); ?></h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <?php
                                                                        // Assuming subcategories are stored in a separate array called $subcategories
                                                                        foreach ($subcategories as $subcategory) {
                                                                            if ($subcategory->category_id == $categories[5]->id) {
                                                                                echo '<li><a href="subcategory_page.php?id=' . $subcategory->id . '">' . $subcategory->subcategory_name . '</a></li>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <!-- <li><a href="nursery.html">Single Teddy</a></li>
                                                                        <li><a href="vegetables.html">Multiple Teddy's
                                                                                <i class="fa fa-bolt icon-trend" aria-hidden="true"></i></a></li> -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col mega-box mega-box-odd">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5><?php print_r($categories[0]->category_name); ?></h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <?php
                                                                        foreach ($subcategories as $subcategory) {
                                                                            if ($subcategory->category_id == $categories[0]->id) {
                                                                                echo '<li><a href="subcategory_page.php?id=' . $subcategory->id . '">' . $subcategory->subcategory_name . '</a></li>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <!-- <li><a href="element-productbox.html">Carnation</a></li>
                                                                        <li><a href="element-product-slider.html">Flower Arrangement</a></li>
                                                                        <li><a href="element-no_slider.html">Flower Bouquets</a></li>
                                                                        <li><a href="element-mulitiple_slider.html">Gladiola</a></li>
                                                                        <li><a href="element-tab.html">Glass Vaze</a></li>
                                                                        <li><a href="element-productbox.html">Jerbera</a></li>
                                                                        <li><a href="element-product-slider.html">Lilies</a></li>
                                                                        <li><a href="element-no_slider.html">Orchid</a></li>
                                                                        <li><a href="element-mulitiple_slider.html">Roses</a></li>
                                                                        <li><a href="element-tab.html">Special Flowers</a></li>
                                                                        <li><a href="element-tab.html">Wreath</a></li> -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mega-box mega-box-even">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5><?php print_r($categories[1]->category_name); ?></h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <?php
                                                                        // Assuming subcategories are stored in a separate array called $subcategories
                                                                        foreach ($subcategories as $subcategory) {
                                                                            if ($subcategory->category_id == $categories[1]->id) {
                                                                                echo '<li><a href="subcategory_page.php?id=' . $subcategory->id . '">' . $subcategory->subcategory_name . '</a></li>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <!-- <li><a href="element-title.html">Cake & Plants</a></li>
                                                                        <li><a href="element-banner.html">Chocolates & Plants</a></li>
                                                                        <li><a href="element-slider.html">Flower & Sweets</a></li>
                                                                        <li><a href="element-category.html">Flowers & Chocolates</a></li>
                                                                        <li><a href="element-service.html">Flowers & Cake</a></li>
                                                                        <li><a href="element-image-ratio.html">Flowers & Fruits <i class="fa fa-bolt icon-trend" aria-hidden="true"></i></a></li>
                                                                        <li><a href="element-category.html">Flowers & Plants</a></li>
                                                                        <li><a href="element-service.html">Flowers & Tedddy</a></li>
                                                                        <li><a href="element-service.html">Gen</a></li> -->
                                                                    </ul>
                                                                </div>
                                                                <div class="menu-title  mt-lg-5 mt-1">
                                                                    <h5><?php print_r($categories[6]->category_name); ?></h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <?php
                                                                        // Assuming subcategories are stored in a separate array called $subcategories
                                                                        foreach ($subcategories as $subcategory) {
                                                                            if ($subcategory->category_id == $categories[6]->id) {
                                                                                echo '<li><a href="subcategory_page.php?id=' . $subcategory->id . '">' . $subcategory->subcategory_name . '</a></li>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <!-- <li><a href="element-title.html">Printed Mugs</a></li>
                                                                        <li><a href="element-banner.html">Customized Mugs</a></li> -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mega-box mega-box-odd">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5><?php print_r($categories[2]->category_name); ?></h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <?php
                                                                        // Assuming subcategories are stored in a separate array called $subcategories
                                                                        foreach ($subcategories as $subcategory) {
                                                                            if ($subcategory->category_id == $categories[2]->id) {
                                                                                echo '<li><a href="subcategory_page.php?id=' . $subcategory->id . '">' . $subcategory->subcategory_name . '</a></li>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <!-- <li><a href="email-order-success.html">Aloe Vera Plants</a></li>
                                                                        <li><a href="email-order-success-two.html">Bonsai Plants</a></li>
                                                                        <li><a href="email-template.html">Flowering Plants</a></li>
                                                                        <li><a href="email-template-two.html">Indoor Plants</a></li>
                                                                        <li><a href="email-order-success.html">Jade Plant</a></li>
                                                                        <li><a href="email-order-success-two.html">Lucky Bamboo</a></li>
                                                                        <li><a href="email-template.html">Money Plant</a></li>
                                                                        <li><a href="email-template-two.html">Outdoor Plants</a></li>
                                                                        <li><a href="email-template-two.html">Sanseaveria</a></li>
                                                                        <li><a href="email-template-two.html">Tulasi Plants</a></li> -->
                                                                    </ul>
                                                                </div>
                                                                <div class="menu-title  mt-lg-5 mt-1">
                                                                    <h5><?php print_r($categories[7]->category_name); ?></h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <?php
                                                                        // Assuming subcategories are stored in a separate array called $subcategories
                                                                        foreach ($subcategories as $subcategory) {
                                                                            if ($subcategory->category_id == $categories[7]->id) {
                                                                                echo '<li><a href="subcategory_page.php?id=' . $subcategory->id . '">' . $subcategory->subcategory_name . '</a></li>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <!-- <li><a href="email-order-success.html">Mixed Sweets</a></li>
                                                                        <li><a href="email-order-success-two.html">Sompapudi</a></li> -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">blog</a></li>
                                    <li><a href="<?php echo base_url('/about_us'); ?>">About Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="top-header d-none">
                            <ul class="header-dropdown">
                                <li class="mobile-wishlist"><a href="<?php echo base_url('/wishlist'); ?>"><img src="<?= base_url('assets/images/jewellery/icon/heart.png') ?>" alt=""></a></li>
                                <li class="mobile-account">
                                    <a href="<?php echo base_url('/profile'); ?>" data-lng="en">
                                        <img src="<?= base_url('assets/images/jewellery/icon/avatar.png') ?>" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div mobile-search">
                                        <div><img src="<?= base_url('assets/images/jewellery/icon/search.png') ?>" onclick="openSearch()" class="img-fluid blur-up lazyload" alt="">
                                            <i class="ti-search" onclick="openSearch()"></i>
                                        </div>
                                        <div id="search-overlay" class="search-overlay">
                                            <div>
                                                <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Search a Product">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="onhover-div mobile-notification notification-dropdown">
                                        <div class="notification-icon-wrapper">
                                            <i class="fa fa-bell"></i>
                                            <span class="notification-badge" id="notification-count" style="display: none;">0</span>
                                        </div>
                                        <div class="notification-dropdown-content" id="notification-dropdown">
                                            <div class="notification-header">
                                                <h6>Notifications</h6>
                                                <span class="mark-all-read" id="mark-all-read-btn" style="display: none;">Mark all as read</span>
                                            </div>
                                            <div class="notification-list" id="notification-list">
                                                <div class="notification-loading">
                                                    <div class="spinner-border spinner-border-sm" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notification-footer">
                                                <a href="<?= base_url('main/notifications') ?>" class="view-all-btn">View All Notifications</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="onhover-div mobile-cart">
                                        <div><img src="<?= base_url('assets/images/jewellery/icon/cart.png') ?>" class="img-fluid blur-up lazyload" alt="">

                                            <i class="ti-shopping-cart"></i>
                                        </div>
                                        <ul class="show-div shopping-cart">
                                            <li>
                                                <div class="media">
                                                    <a href="#"><img alt="" class="mr-3" src="<?= base_url('assets/images/cake/butterscotch_cake/428.jpg') ?>"></a>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <h4>item name</h4>
                                                        </a>
                                                        <h4><span>1 x $ 299.00</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle">
                                                    <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <a href="#"><img alt="" class="mr-3" src="<?= base_url('assets/images/cake/butterscotch_cake/427.jpg') ?>" /> </a>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <h4>item name</h4>
                                                        </a>
                                                        <h4><span>1 x $ 299.00</span></h4>
                                                    </div>
                                                </div>
                                                <div class="close-circle">
                                                    <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="total">
                                                    <h5>subtotal : <span>$299.00</span></h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="buttons">
                                                    <a href="<?php echo base_url('/cart'); ?>" class="view-cart">view
                                                        cart</a>
                                                    <a href="<?php echo base_url('/checkout'); ?>" class="checkout">checkout</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="category-header">
        <!-- <?php print_r($categories); ?> -->
        <div class="container-fluid custom-container">
            <div class="d-flex justify-content-center align-items-center py-1">
                <?php foreach ($categories as $category) : ?>
                    <div class="m-1 px-3">
                        <a href="<?php echo base_url('/category/' . $category->id); ?>">
                            <h5><?php echo $category->category_name; ?></h5>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
<style>
/* Notification Styles */
.notification-icon-wrapper {
    position: relative;
    cursor: pointer;
}

.notification-icon-wrapper i {
    font-size: 20px;
    color: #333;
    transition: color 0.3s;
}

.notification-icon-wrapper:hover i {
    color: #f3ba75;
}

.notification-badge {
    position: absolute;
    top: -8px;
    right: -8px;
    background: #ff4444;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 11px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid white;
}

.notification-dropdown {
    position: relative;
}

.notification-dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    min-width: 350px;
    max-width: 400px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    border-radius: 8px;
    z-index: 1000;
    margin-top: 10px;
    max-height: 500px;
    overflow: hidden;
}

.notification-dropdown:hover .notification-dropdown-content,
.notification-dropdown-content:hover {
    display: block;
}

.notification-header {
    padding: 15px 20px;
    border-bottom: 1px solid #e0e0e0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #f8f9fa;
}

.notification-header h6 {
    margin: 0;
    font-weight: 600;
    color: #333;
}

.mark-all-read {
    font-size: 12px;
    color: #007bff;
    cursor: pointer;
    text-decoration: none;
}

.mark-all-read:hover {
    text-decoration: underline;
}

.notification-list {
    max-height: 350px;
    overflow-y: auto;
}

.notification-item {
    padding: 15px 20px;
    border-bottom: 1px solid #f0f0f0;
    cursor: pointer;
    transition: background 0.2s;
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.notification-item:hover {
    background: #f8f9fa;
}

.notification-item.unread {
    background: #e3f2fd;
}

.notification-item.unread:hover {
    background: #bbdefb;
}

.notification-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 18px;
    color: white;
}

.notification-icon.order_placed {
    background: #4caf50;
}

.notification-icon.payment_success {
    background: #2196f3;
}

.notification-icon.order_shipped {
    background: #ff9800;
}

.notification-icon.order_delivered {
    background: #9c27b0;
}

.notification-content {
    flex: 1;
    min-width: 0;
}

.notification-title {
    font-weight: 600;
    font-size: 14px;
    color: #333;
    margin-bottom: 4px;
}

.notification-message {
    font-size: 13px;
    color: #666;
    margin-bottom: 4px;
    line-height: 1.4;
}

.notification-time {
    font-size: 11px;
    color: #999;
}

.notification-empty {
    padding: 40px 20px;
    text-align: center;
    color: #999;
}

.notification-footer {
    padding: 15px 20px;
    border-top: 1px solid #e0e0e0;
    text-align: center;
    background: #f8f9fa;
}

.view-all-btn {
    color: #007bff;
    text-decoration: none;
    font-weight: 500;
    font-size: 14px;
}

.view-all-btn:hover {
    text-decoration: underline;
}

.notification-loading {
    padding: 20px;
    text-align: center;
}
</style>

<script>
$(document).ready(function() {
    // Load notification count and recent notifications
    function loadNotifications() {
        var user_id = '<?= $this->session->userdata("user_id") ?>';
        if (!user_id) return;

        $.ajax({
            url: '<?= base_url("api/notifications/get_recent") ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Update badge count
                    var unreadCount = response.unread_count || 0;
                    if (unreadCount > 0) {
                        $('#notification-count').text(unreadCount > 99 ? '99+' : unreadCount).show();
                    } else {
                        $('#notification-count').hide();
                    }

                    // Update notification list
                    var html = '';
                    if (response.notifications && response.notifications.length > 0) {
                        response.notifications.forEach(function(notif) {
                            var iconClass = 'fa-shopping-cart';
                            var iconBg = 'order_placed';
                            if (notif.type === 'payment_success') {
                                iconClass = 'fa-credit-card';
                                iconBg = 'payment_success';
                            } else if (notif.type === 'order_shipped') {
                                iconClass = 'fa-truck';
                                iconBg = 'order_shipped';
                            } else if (notif.type === 'order_delivered') {
                                iconClass = 'fa-check-circle';
                                iconBg = 'order_delivered';
                            }

                            var unreadClass = notif.is_read == 0 ? 'unread' : '';
                            var timeAgo = getTimeAgo(notif.created_at);
                            
                            html += '<div class="notification-item ' + unreadClass + '" data-id="' + notif.id + '" data-order-id="' + (notif.order_id || '') + '">';
                            html += '<div class="notification-icon ' + iconBg + '"><i class="fa ' + iconClass + '"></i></div>';
                            html += '<div class="notification-content">';
                            html += '<div class="notification-title">' + notif.title + '</div>';
                            html += '<div class="notification-message">' + notif.message + '</div>';
                            html += '<div class="notification-time">' + timeAgo + '</div>';
                            html += '</div></div>';
                        });
                        $('#mark-all-read-btn').toggle(unreadCount > 0);
                    } else {
                        html = '<div class="notification-empty">No notifications</div>';
                        $('#mark-all-read-btn').hide();
                    }
                    $('#notification-list').html(html);
                }
            },
            error: function() {
                $('#notification-list').html('<div class="notification-empty">Error loading notifications</div>');
            }
        });
    }

    // Mark notification as read and navigate
    $(document).on('click', '.notification-item', function() {
        var notifId = $(this).data('id');
        var orderId = $(this).data('order-id');
        
        // Mark as read
        if (notifId) {
            $.ajax({
                url: '<?= base_url("api/notifications/mark_read") ?>',
                type: 'POST',
                data: { notification_id: notifId },
                dataType: 'json'
            });
        }

        // Navigate to order if available
        if (orderId) {
            window.location.href = '<?= base_url("main/order_detail") ?>/' + orderId;
        } else {
            window.location.href = '<?= base_url("main/notifications") ?>';
        }
    });

    // Mark all as read
    $(document).on('click', '#mark-all-read-btn', function(e) {
        e.stopPropagation();
        $.ajax({
            url: '<?= base_url("api/notifications/mark_all_read") ?>',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    loadNotifications();
                }
            }
        });
    });

    // Load notifications on page load
    loadNotifications();
    
    // Refresh notifications every 30 seconds
    setInterval(loadNotifications, 30000);

    // Helper function to get time ago
    function getTimeAgo(dateString) {
        var now = new Date();
        var date = new Date(dateString);
        var seconds = Math.floor((now - date) / 1000);
        
        if (seconds < 60) return 'Just now';
        var minutes = Math.floor(seconds / 60);
        if (minutes < 60) return minutes + ' min ago';
        var hours = Math.floor(minutes / 60);
        if (hours < 24) return hours + ' hour' + (hours > 1 ? 's' : '') + ' ago';
        var days = Math.floor(hours / 24);
        if (days < 7) return days + ' day' + (days > 1 ? 's' : '') + ' ago';
        return date.toLocaleDateString();
    }
});
</script>
</header>

<!-- 
<?php
print_r($categories);
print_r($categories);

?> -->