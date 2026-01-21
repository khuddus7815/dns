<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<header class="header-5">
    <div class="mobile-fix-option"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu d-flex justify-content-between align-items-center">

                    <div class="menu-left">
                        <div class="brand-logo">
                            <a href="<?php echo base_url('/'); ?>">
                                <?php
                                $CI =& get_instance();
                                $CI->load->model('Settings_model');
                                $logo_path = $CI->Settings_model->get_setting('site_logo');
                                $logo_url = $logo_path ? base_url('upload/logo/' . $logo_path) : base_url('assets/images/icon/logo/fd9.png');
                                ?>
                                <img src="<?php echo $logo_url; ?>" class="img-fluid blur-up lazyload" alt=""
                                    width="200" height="200">
                            </a>
                        </div>
                    </div>

                    <div class="menu-center">
                        <!-- Dynamic Categories Buttons -->
                        <?php if (isset($categories) && !empty($categories)): ?>
                            <?php
                            // Get current category ID from URL
                            $current_category_id = null;
                            $uri_segment_1 = $this->uri->segment(1);
                            $uri_segment_2 = $this->uri->segment(2);

                            // Check if we're on a category detail page
                            if ($uri_segment_1 == 'category' && !empty($uri_segment_2)) {
                                $current_category_id = $uri_segment_2;
                            }
                            // Check if we're on a products page (subcategory page)
                            elseif ($uri_segment_1 == 'products' && !empty($uri_segment_2)) {
                                // Get category_id from subcategory
                                $CI =& get_instance();
                                $CI->load->model('Subcategory');
                                $subcategory = $CI->Subcategory->get_subcategorybyid($uri_segment_2);
                                if ($subcategory && isset($subcategory->category_id)) {
                                    $current_category_id = $subcategory->category_id;
                                }
                            }
                            // Check if we're on a product detail page
                            elseif ($uri_segment_1 == 'product' && !empty($uri_segment_2)) {
                                // Get category_id from product
                                if (isset($product) && isset($product->category_id)) {
                                    $current_category_id = $product->category_id;
                                } else {
                                    $CI =& get_instance();
                                    $CI->load->model('Category_model');
                                    $category_id = $CI->Category_model->get_productcategoryid($uri_segment_2);
                                    if ($category_id) {
                                        $current_category_id = $category_id;
                                    }
                                }
                            }
                            // Fallback: check if details array/object has category id
                            elseif (empty($current_category_id) && isset($details)) {
                                // Handle both array and object types
                                if (is_array($details) && isset($details['id'])) {
                                    $current_category_id = $details['id'];
                                } elseif (is_object($details) && isset($details->id)) {
                                    $current_category_id = $details->id;
                                }
                            }
                            ?>
                            <div class="header-categories-wrapper">
                                <div class="header-categories-list">
                                    <?php foreach ($categories as $category): ?>
                                        <?php
                                        $is_active = ($current_category_id == $category->id);
                                        $active_class = $is_active ? 'active' : '';
                                        ?>
                                        <a href="<?php echo base_url('category/' . $category->id); ?>"
                                            class="header-category-item <?= $active_class ?>">
                                            <span
                                                class="header-category-name"><?= htmlspecialchars($category->category_name) ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="menu-right d-flex align-items-center justify-content-end">
                        <!-- Modern Inline Search Bar -->
                        <div class="modern-search-container">
                            <div class="modern-search-wrapper">
                                <i class="ti-search modern-search-icon"></i>
                                <input type="text" class="modern-search-input" id="exampleInputSearchProduct"
                                    placeholder="Search products...">
                                <div class="modern-suggestions-box" id="modern-search-suggestions">
                                    <ul class="suggestions-list" id="search-suggestion-list"></ul>
                                </div>
                            </div>
                        </div>

                        <div class="icon-nav">
                            <ul>
                                <li class="onhover-div mobile-search">
                                    <div id="search_icon">
                                        <img src="<?php echo base_url(); ?>assets/images/jewellery/icon/search.png"
                                            class="img-fluid blur-up lazyload" alt="" id="search_icon_bar" />
                                        <i class="ti-search"></i>
                                    </div>
                                </li>

                                <li class="onhover-div mobile-notification notification-dropdown">
                                    <div class="notification-icon-wrapper">
                                        <i class="fa fa-bell"></i>
                                        <span class="notification-badge" id="notification-count"
                                            style="display: none;">0</span>
                                    </div>
                                    <!-- Mobile Backdrop -->
                                    <div class="notification-backdrop" id="notification-backdrop"></div>
                                    <div class="notification-dropdown-content" id="notification-dropdown">
                                        <div class="notification-header">
                                            <h6>Notifications</h6>
                                            <div class="notification-actions">
                                                <span class="mark-all-read" id="mark-all-read-btn"
                                                    style="display: none;">Mark all as read</span>
                                                <button type="button" class="close-notification-btn"
                                                    id="close-notification-btn">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="notification-list" id="notification-list">
                                            <div class="notification-loading">
                                                <div class="spinner-border spinner-border-sm" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notification-footer">
                                            <a href="<?= base_url('main/notifications') ?>" class="view-all-btn">View
                                                All Notifications</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="mobile-cart">
                                    <div>
                                        <a href="<?php echo base_url('/cart'); ?>" class="position-relative">
                                            <img src="<?php echo base_url(); ?>assets/images/jewellery/icon/cart.png"
                                                class="img-fluid" alt="">
                                            <i class="ti-shopping-cart"></i>
                                            <span
                                                class="cart-count position-absolute top-0 end-0 translate-middle badge rounded-pill bg-danger text-white"
                                                style="display: none;"></span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="top-header ml-3" style="margin-left: 15px;">
                            <ul class="header-dropdown">
                                <li class="mobile-wishlist">
                                    <a href="<?php echo base_url('/wishlist'); ?>">
                                        <img src="<?php echo base_url(); ?>assets/images/jewellery/icon/heart.png"
                                            alt="">
                                    </a>
                                </li>
                                <li class="mobile-account">
                                    <a href="<?php echo base_url('/profile'); ?>" data-lng="en">
                                        <img src="<?php echo base_url(); ?>assets/images/jewellery/icon/avatar.png"
                                            alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Notification Styles */
        .notification-icon-wrapper {
            position: relative;
            cursor: pointer;
            padding: 8px;
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
            top: 2px;
            right: 2px;
            background: #ff4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
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
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            z-index: 1000;
            margin-top: 10px;
            max-height: 500px;
            overflow: hidden;
            animation: slideDown 0.4s ease-out;
        }

        @media (min-width: 992px) {
            .notification-dropdown:hover .notification-dropdown-content {
                display: block;
            }
        }

        /* Keep dropdown open when clicking inside */
        .notification-dropdown.active .notification-dropdown-content {
            display: block;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-100%);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile Notification Modal Styles */
        @media (max-width: 768px) {

            /* Notification backdrop/overlay */
            .notification-backdrop {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 10004;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .notification-backdrop.show {
                display: block;
                opacity: 1;
            }

            /* Notification modal container */
            .notification-dropdown-content {
                display: none !important;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                width: 100vw;
                height: 100vh;
                max-width: none;
                margin: 0;
                border-radius: 0;
                border: none;
                box-shadow: none;
                max-height: none;
                z-index: 10005;
                flex-direction: column;
                transform: translateY(-100%);
                transition: transform 0.3s ease-out;
                background: white;
                padding-bottom: 0;
            }

            .notification-dropdown.active .notification-dropdown-content {
                display: flex !important;
                transform: translateY(0);
                overflow: visible;
            }

            /* Ensure footer is always visible */
            .notification-dropdown-content .notification-footer {
                flex-shrink: 0;
            }

            .notification-list {
                flex: 1;
                max-height: none;
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
                padding-bottom: 100px;
                /* Space for footer above bottom navbar */
                margin-bottom: 0;
            }

            /* Ensure close button is visible on mobile */
            .close-notification-btn {
                display: block !important;
                font-size: 24px;
                color: #333;
                padding: 8px 12px;
                line-height: 1;
                cursor: pointer;
                background: transparent;
                border: none;
                z-index: 10006;
                position: relative;
                min-width: 40px;
                min-height: 40px;
                display: flex !important;
                align-items: center;
                justify-content: center;
            }

            .close-notification-btn:hover,
            .close-notification-btn:active {
                color: #000;
                background: rgba(0, 0, 0, 0.05);
                border-radius: 50%;
            }

            .close-notification-btn i {
                pointer-events: none;
            }

            /* Mark all as read button on mobile */
            .mark-all-read {
                display: inline-block !important;
                font-size: 13px;
                color: #b8860b;
                cursor: pointer;
                text-decoration: none;
                padding: 5px 10px;
                border-radius: 5px;
                transition: background 0.2s;
            }

            .mark-all-read:hover,
            .mark-all-read:active {
                text-decoration: underline;
                background: rgba(184, 134, 11, 0.1);
            }

            /* Notification footer on mobile - positioned above bottom navbar */
            .notification-footer {
                position: fixed !important;
                bottom: 70px !important;
                /* Above mobile bottom navbar (navbar is ~60px + padding) */
                left: 0 !important;
                right: 0 !important;
                width: 100% !important;
                padding: 12px 20px !important;
                border-top: 2px solid #e0e0e0;
                text-align: center;
                background: #ffffff !important;
                z-index: 10007 !important;
                /* Higher than modal to ensure visibility */
                box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.15);
                display: block !important;
                visibility: visible !important;
                opacity: 1 !important;
            }

            /* Golden Gradient Border for Mobile Bottom Navbar */
            .mobile-bottom-navbar {
                border-top: 3px solid transparent;
                border-image: linear-gradient(to right, #b8860b, #f3ba75, #b8860b) 1;
            }

            /* Ensure notification dropdown doesn't clip footer */
            .notification-dropdown-content {
                overflow: visible !important;
            }

            .notification-dropdown.active .notification-dropdown-content {
                overflow: visible !important;
            }

            .view-all-btn {
                display: inline-block !important;
                color: #b8860b !important;
                text-decoration: none !important;
                font-weight: 600;
                font-size: 15px;
                padding: 12px 30px;
                background: white;
                border: 2px solid #b8860b;
                border-radius: 25px;
                transition: all 0.3s ease;
                width: auto;
                min-width: 200px;
            }

            .view-all-btn:hover,
            .view-all-btn:active {
                background: #b8860b !important;
                color: white !important;
                text-decoration: none !important;
            }
        }

        .notification-header {
            padding: 12px 15px;
            /* Compact padding */
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f8f9fa;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        @media (max-width: 768px) {
            .notification-header {
                padding: 15px 20px;
                min-height: 60px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .notification-header h6 {
                font-size: 18px;
                margin: 0;
            }

            .notification-actions {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .mark-all-read {
                display: inline-block !important;
                font-size: 13px;
                color: #007bff;
                cursor: pointer;
                text-decoration: none;
                padding: 5px 10px;
                white-space: nowrap;
            }
        }

        .notification-actions {
            display: flex;
            align-items: center;
            margin-left: auto;
            gap: 8px;
        }

        .close-notification-btn {
            border: none;
            background: transparent;
            padding: 0;
            font-size: 16px;
            color: #666;
            line-height: 1;
            cursor: pointer;
            display: none;
            /* Hidden on desktop by default */
        }

        @media (max-width: 768px) {
            .close-notification-btn {
                display: flex !important;
                /* Show on mobile */
            }
        }

        .notification-header h6 {
            margin: 0;
            font-weight: 600;
            color: #333;
            font-size: 16px;
        }

        .mark-all-read {
            font-size: 12px;
            color: #b8860b;
            cursor: pointer;
            text-decoration: none;
            white-space: nowrap;
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

        .notification-icon.order_cancelled {
            background: #d32f2f;
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
            position: sticky;
            bottom: 0;
        }

        @media (max-width: 768px) {
            .notification-footer {
                padding: 15px 20px;
            }
        }

        .view-all-btn {
            color: #b8860b;
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
        $(document).ready(function () {
            // Load notification count and recent notifications
            function loadNotifications() {
                var user_id = '<?= $this->session->userdata("user_id") ?>';
                if (!user_id) return;

                $.ajax({
                    url: '<?= base_url("api/notifications_get_recent") ?>',
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
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
                                response.notifications.forEach(function (notif) {
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
                                    } else if (notif.type === 'order_cancelled') {
                                        iconClass = 'fa-times-circle';
                                        iconBg = 'order_cancelled';
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
                                if (unreadCount > 0) {
                                    $('#mark-all-read-btn').show();
                                } else {
                                    $('#mark-all-read-btn').hide();
                                }
                            } else {
                                html = '<div class="notification-empty">No notifications</div>';
                                $('#mark-all-read-btn').hide();
                            }
                            $('#notification-list').html(html);
                        }
                    },
                    error: function () {
                        $('#notification-list').html('<div class="notification-empty">Error loading notifications</div>');
                    }
                });
            }

            // Mark notification as read and navigate
            $(document).on('click', '.notification-item', function () {
                var notifId = $(this).data('id');
                var orderId = $(this).data('order-id');

                // Mark as read
                if (notifId) {
                    $.ajax({
                        url: '<?= base_url("api/notifications_mark_read") ?>',
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
            $(document).on('click', '#mark-all-read-btn', function (e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();

                var btn = $(this);
                btn.prop('disabled', true).css('opacity', '0.6');

                $.ajax({
                    url: '<?= base_url("api/notifications_mark_all_read") ?>',
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Reload notifications to update the UI
                            loadNotifications();
                            // Show success message
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    title: 'Success',
                                    text: 'All notifications marked as read',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        } else {
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message || 'Failed to mark notifications as read',
                                    icon: 'error'
                                });
                            }
                        }
                        btn.prop('disabled', false).css('opacity', '1');
                    },
                    error: function () {
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                title: 'Error',
                                text: 'Failed to mark notifications as read. Please try again.',
                                icon: 'error'
                            });
                        }
                        btn.prop('disabled', false).css('opacity', '1');
                    }
                });
                return false;
            });

            // Close dropdown when clicking outside (desktop only)
            $(document).on('click', function (e) {
                var isMobile = window.innerWidth <= 768;
                if (!isMobile && !$(e.target).closest('.notification-dropdown').length) {
                    $('.notification-dropdown').removeClass('active');
                    $('#notification-dropdown').hide();
                }
            });

            // Toggle notification dropdown on icon click
            $(document).on('click', '.notification-icon-wrapper', function (e) {
                e.stopPropagation();
                var $dropdown = $(this).closest('.notification-dropdown');
                var isMobile = window.innerWidth <= 768;

                if (isMobile) {
                    // Mobile: Toggle modal
                    if ($dropdown.hasClass('active')) {
                        closeNotificationModal();
                    } else {
                        openNotificationModal();
                    }
                } else {
                    // Desktop: Toggle dropdown
                    $dropdown.toggleClass('active');
                    if ($dropdown.hasClass('active')) {
                        $('#notification-dropdown').show();
                    } else {
                        $('#notification-dropdown').hide();
                    }
                }
            });

            // Function to open notification modal on mobile
            function openNotificationModal() {
                var $dropdown = $('.notification-dropdown');
                $dropdown.addClass('active');
                $('#notification-backdrop').addClass('show');
                $('body').css('overflow', 'hidden'); // Prevent body scroll
            }

            // Function to close notification modal on mobile
            function closeNotificationModal() {
                var $dropdown = $('.notification-dropdown');
                $dropdown.removeClass('active');
                $('#notification-backdrop').removeClass('show');
                $('body').css('overflow', ''); // Restore body scroll
            }

            // Close notification modal when clicking on backdrop (mobile only)
            $(document).on('click', '#notification-backdrop', function (e) {
                if (window.innerWidth <= 768) {
                    closeNotificationModal();
                }
            });

            // Close notification dropdown via X button - use stopImmediatePropagation to ensure it works
            $(document).on('click', '#close-notification-btn, .close-notification-btn', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                var isMobile = window.innerWidth <= 768;

                if (isMobile) {
                    closeNotificationModal();
                } else {
                    var $dropdown = $(this).closest('.notification-dropdown');
                    if ($dropdown.length === 0) {
                        $dropdown = $('.notification-dropdown');
                    }
                    $dropdown.removeClass('active');
                    $('#notification-dropdown').hide();
                }
                return false;
            });

            // Prevent dropdown from closing when clicking inside (but allow close button to work)
            $('.notification-dropdown-content').on('click', function (e) {
                // Allow close button clicks to work
                if ($(e.target).closest('.close-notification-btn').length > 0) {
                    return; // Don't stop propagation for close button
                }
                e.stopPropagation();
            });

            // Handle window resize - close modal if switching from mobile to desktop
            $(window).on('resize', function () {
                if (window.innerWidth > 768) {
                    closeNotificationModal();
                }
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
<!-- Mobile Bottom Navbar -->
<div class="mobile-bottom-navbar">
    <a href="<?= base_url('/') ?>" class="nav-item">
        <i class="fa fa-home"></i>
        <span>Home</span>
    </a>
    <a href="<?= base_url('cart') ?>" class="nav-item position-relative">
        <i class="fa fa-shopping-cart"></i>
        <span>Cart</span>
        <span class="cart-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
            style="display: none; font-size: 0.6rem; padding: 2px 4px;"></span>
    </a>
    <a href="<?= base_url('wishlist') ?>" class="nav-item">
        <i class="fa fa-heart"></i>
        <span>Wishlist</span>
    </a>
    <a href="<?= base_url('profile') ?>" class="nav-item mobile-profile-trigger">
        <i class="fa fa-user"></i>
        <span>Profile</span>
    </a>
</div>

<div class="mobile-profile-overlay" id="mobile-profile-overlay">
    <div class="mobile-profile-overlay-backdrop"></div>
    <div class="mobile-profile-panel">
        <div class="mobile-profile-panel-header">
            <span>My Account</span>
            <button type="button" class="mobile-profile-close">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="mobile-profile-panel-body">
            <a href="<?= base_url('profile') ?>" class="mobile-profile-link">
                <i class="fa fa-user"></i>
                <span>My Profile</span>
            </a>
            <a href="<?= base_url('profile?section=address') ?>" class="mobile-profile-link">
                <i class="fa fa-map-marker"></i>
                <span>My Address</span>
            </a>
            <a href="<?= base_url('profile?section=booking') ?>" class="mobile-profile-link">
                <i class="fa fa-list-alt"></i>
                <span>My Bookings</span>
            </a>
            <a href="<?= base_url('profile?section=wallet') ?>" class="mobile-profile-link">
                <i class="fa fa-money"></i>
                <span>My Wallet</span>
            </a>
            <a href="<?= base_url('users/logout') ?>" class="mobile-profile-link mobile-profile-logout">
                <i class="fa fa-sign-out"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>

<!-- Categories moved to header between logo and search -->

<style>
    /* New Layout Styles to merge buttons and logo */
    .main-menu {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 0 !important;
        margin-top: 0;
        padding: 0;
    }

    /* Reduce spacing below logo and header */
    .brand-logo {
        padding: 0 !important;
        margin-bottom: 0 !important;
    }

    .brand-logo img {
        margin: 0 !important;
    }

    header.header-5 {
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
        position: sticky;
        top: 0;
        z-index: 1050;
        background: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Reduce header bottom margin */
    header.header-5 .container {
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }

    header.header-5 .row {
        margin-bottom: 0 !important;
    }

    header.header-5 .col-sm-12 {
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }

    .menu-left {
        flex: 0 0 auto;
        /* Keep logo size fixed */
        margin-right: 20px;
    }

    .menu-center {
        flex: 1 1 auto;
        /* Allow categories to take available space */
        display: flex;
        align-items: center;
        justify-content: flex-start;
        min-width: 0;
        /* Allow shrinking */
        margin-right: 15px;
    }

    .menu-right {
        flex: 0 0 auto;
        display: flex;
        align-items: center;
    }

    /* Header Categories Styling */
    .header-categories-wrapper {
        width: 100%;
        overflow: hidden;
    }

    .header-categories-list {
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        gap: 15px;
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .header-categories-list::-webkit-scrollbar {
        display: none;
    }

    .header-category-item {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        text-decoration: none;
        color: #D4AF37 !important;
        font-weight: 500;
        font-size: 1.05rem;
        white-space: nowrap;
        transition: all 0.3s ease;
        flex-shrink: 0;
        background: transparent !important;
        border: 2px solid transparent !important;
        border-radius: 20px !important;
        box-shadow: none !important;
    }

    .header-category-item:hover {
        color: #B8860B !important;
        background: transparent !important;
        border: 2px solid transparent !important;
        transform: none;
        box-shadow: none !important;
        text-decoration: underline;
    }

    .header-category-item.active {
        color: #D4AF37 !important;
        background: rgba(212, 175, 55, 0.1) !important;
        border: 2px solid #D4AF37 !important;
        border-radius: 20px !important;
        box-shadow: 0 2px 8px rgba(212, 175, 55, 0.2) !important;
        font-weight: 600 !important;
    }

    .header-category-item.active:hover {
        color: #B8860B !important;
        border-color: #B8860B !important;
        background: rgba(184, 134, 11, 0.15) !important;
        text-decoration: none !important;
        box-shadow: 0 3px 12px rgba(184, 134, 11, 0.3) !important;
    }

    .header-category-name {
        display: inline-block;
    }

    /* Ensuring the navbar appears correctly in the center */
    #main-nav ul.sm-horizontal {
        justify-content: center;
    }

    /* Adjust spacing for the consolidated right-side icons */
    .icon-nav ul,
    .header-dropdown {
        display: flex;
        align-items: center;
        margin-bottom: 0;
        padding-left: 0;
    }

    .header-dropdown li {
        padding-left: 15px;
        /* Spacing between Heart and Avatar */
        display: inline-block;
    }

    .icon-nav li {
        display: inline-block;
    }

    /* Modern Inline Search Styles */
    .modern-search-container {
        margin-right: 10px;
        position: relative;
        flex: 0 1 auto;
        min-width: 200px;
        max-width: 400px;
    }

    .modern-search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        background: #fff;
        border: 2px solid #e0e0e0;
        border-radius: 30px;
        padding: 8px 15px 8px 15px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .modern-search-wrapper:focus-within {
        border-color: #f3ba75;
        box-shadow: 0 4px 12px rgba(243, 186, 117, 0.2);
    }

    .modern-search-icon {
        color: #999;
        font-size: 18px;
        margin-right: 8px;
        pointer-events: none;
        flex-shrink: 0;
    }

    .modern-search-input {
        border: none;
        outline: none;
        flex: 1 1 auto;
        font-size: 14px;
        color: #333;
        background: transparent;
        padding: 0;
        width: 100%;
        min-width: 0;
        max-width: 100%;
    }

    .modern-search-input::placeholder {
        color: #999;
    }

    .modern-suggestions-box {
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        right: 0;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        max-height: 400px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
        border: 1px solid #e0e0e0;
    }

    .modern-suggestions-box.show {
        display: block;
    }

    .suggestions-box {
        border: 2px solid #ccc;
        border-radius: 10px 10px 10px 10px;
        background-color: #fff;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        position: absolute;
        width: 98%;
        max-height: 500px;
        overflow-y: auto;
        margin-top: 0px;
    }

    .search_icon {
        display: none;
    }

    .suggestions-list {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .suggestions-list li {
        display: block;
        /* Ensure list items are displayed vertically */
        padding: 10px;
        /*border-bottom: 1px solid #ddd;*/
        cursor: pointer;
    }

    .suggestions-list li:last-child {
        border-bottom: none;
    }

    .suggestions-list li:hover {
        background-color: #f0f0f0;
    }

    .suggestions-list li.search_list {
        cursor: pointer;
    }

    .suggestions-list li.search_list a {
        text-decoration: none;
        color: inherit;
        display: flex;
        align-items: center;
        width: 100%;
    }

    .suggestions-list li.no-results {
        cursor: default;
        padding: 20px;
    }

    .no-results-message {
        text-align: center;
        padding: 20px;
        color: #999;
    }

    .no-results-message i {
        font-size: 2rem;
        color: #ddd;
        margin-bottom: 10px;
        display: block;
    }

    .no-results-message p {
        font-size: 1rem;
        font-weight: 500;
        color: #666;
        margin: 10px 0 5px;
    }

    .no-results-message span {
        font-size: 0.85rem;
        color: #999;
    }

    /* Initial hidden state for the scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
        opacity: 0;
        transition: opacity 0.3s ease;
        /* Smooth transition */
    }

    ::-webkit-scrollbar-track {
        background: #f0f0f0;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 10px;
        border: 2px solid #f0f0f0;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #555;
    }

    /* For Firefox */
    * {
        scrollbar-width: none;
    }

    /* Show scrollbar on scrolling */
    body.scroll-visible::-webkit-scrollbar {
        opacity: 1;
    }

    /* For Firefox, show scrollbar on scrolling */
    body.scroll-visible {
        scrollbar-width: thin;
        scrollbar-color: #888 #f0f0f0;
    }


    @media screen and (max-width: 768px) {
        .header-categories-wrapper {
            display: none;
        }

        .modern-search-container {
            order: -1;
            margin-right: 10px;
            flex: 1;
            min-width: 0;
        }

        .modern-search-wrapper {
            min-width: 0;
            max-width: 100%;
            padding: 6px 15px;
        }

        .modern-search-input {
            font-size: 13px;
            width: auto;
        }

        .modern-search-icon {
            font-size: 16px;
            margin-right: 8px;
        }

        .mobile-search {
            display: none !important;
        }
    }

    @media screen and (min-width: 769px) {
        .mobile-search {
            display: none !important;
        }
    }

    li i.fa.fa-search {
        display: inline-block !important;
        font-size: 18px;
        padding: 10px;

    }

    .search_icon {
        display: none;
    }

    .suggestions-list li img.product-image {
        width: 40px;
        /* Adjust size as needed */
        height: 40px;
        object-fit: cover;
        margin-right: 10px;
        border-radius: 4px;
        /* Optional: Rounded corners */
    }

    i.fa.fa-clock-o {
        display: inline-block !important;
        font-size: 18px;
        padding: 10px;
    }

    /* Mobile Bottom Navbar Styles */
    .mobile-bottom-navbar {
        display: none;
    }

    .mobile-profile-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 10000;
    }

    .mobile-profile-overlay.active {
        display: block;
    }

    .mobile-profile-overlay-backdrop {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
    }

    .mobile-profile-panel {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        background: #ffffff;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        box-shadow: 0 -4px 16px rgba(0, 0, 0, 0.15);
        padding: 16px 20px 24px;
    }

    .mobile-profile-panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 12px;
    }

    .mobile-profile-panel-header span {
        font-weight: 600;
        font-size: 16px;
    }

    .mobile-profile-close {
        border: none;
        background: transparent;
        padding: 4px;
        font-size: 18px;
        line-height: 1;
    }

    .mobile-profile-panel-body {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .mobile-profile-link {
        display: flex;
        align-items: center;
        padding: 10px 8px;
        border-radius: 10px;
        text-decoration: none;
        color: #333333;
        font-size: 14px;
        font-weight: 500;
    }

    .mobile-profile-link i {
        width: 24px;
        text-align: center;
        margin-right: 10px;
        color: #D4AF37;
        font-size: 18px;
    }

    .mobile-profile-link.mobile-profile-logout i {
        color: #d9534f;
    }

    .mobile-profile-link:active {
        background-color: #f7f7f7;
    }

    @media (max-width: 768px) {

        /* Responsive Logo */
        .brand-logo img {
            max-width: 140px;
            height: auto;
            width: auto !important;
            /* Override inline styles */
        }

        .brand-logo {
            padding: 5px 0 !important;
        }

        /* Bottom Navbar */
        .mobile-bottom-navbar {
            display: flex;
            justify-content: space-around;
            align-items: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #ffffff;
            padding: 10px 0;
            box-shadow: 0 -5px 10px rgba(0, 0, 0, 0.5), 0 -2px 0 #e4b865;
            z-index: 9999;
            border-top: none;
        }

        .mobile-bottom-navbar .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #666;
            font-size: 10px;
            font-weight: 500;
        }

        .mobile-bottom-navbar .nav-item i {
            font-size: 20px;
            color: #D4AF37;
            /* Golden color for icons */
            margin-bottom: 4px;
        }

        .mobile-bottom-navbar .nav-item.active i {
            color: #B8860B;
        }

        /* Add padding to body to prevent navbar overlay */
        body {
            padding-bottom: 60px;
        }

        /* Hide regular mobile icons if we have bottom navbar */
        .mobile-cart,
        .mobile-wishlist,
        .mobile-account {
            display: none !important;
        }

        .mobile-notification {
            display: block !important;
        }

        /* Full Width Notification Dropdown on Mobile */
        .notification-dropdown-content {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100vw;
            height: 100vh;
            max-width: none;
            margin: 0;
            border-radius: 0;
            border: none;
            box-shadow: none;
            max-height: none;
            z-index: 10005;
            /* Above header */
            display: flex;
            flex-direction: column;
        }

        .notification-list {
            flex: 1;
            max-height: none;
            overflow-y: auto;
        }
    }

    @media (max-width: 576px) {
        .main-menu {
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .menu-left {
            margin-right: 10px;
        }

        .menu-right {
            margin-left: auto;
        }

        .modern-search-container {
            order: 1;
            width: auto;
            flex: 1;
            max-width: none;
            margin: 0 10px 0 0;
            min-width: 0;
        }

        .icon-nav {
            order: 2;
        }

        .modern-search-wrapper {
            width: 100%;
        }

        .brand-logo img {
            max-width: 120px;
        }

        .mobile-bottom-navbar {
            padding: 8px 0;
        }

        .mobile-bottom-navbar .nav-item i {
            font-size: 18px;
        }

        .mobile-bottom-navbar .nav-item span {
            font-size: 9px;
        }
    }
</style>

<!-- Header Categories Styles - No separate bar needed -->
<script>
    // Function to refresh cart count using AJAX
    function refreshCartCount() {
        $.ajax({
            url: '<?php echo base_url("api/user/cartcount"); ?>', // URL to fetch cart count
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.cartCount > 0) {
                    $('.cart-count').text(response.cartCount).show();
                } else {
                    $('.cart-count').hide();
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Call the function when the page is loaded
    $(document).ready(function () {
        refreshCartCount(); // Refresh cart count on page load
    });

    let timer;

    document.addEventListener('scroll', () => {
        document.body.classList.add('scroll-visible');

        clearTimeout(timer);
        timer = setTimeout(() => {
            document.body.classList.remove('scroll-visible');
        }, 1000); // Scrollbar stays visible for 1 second after scrolling stops
    });

    $(document).ready(function () {
        // Calculate header height and adjust spacing for fixed header
        function adjustHeaderSpacing() {
            var header = $('header.header-5');
            var headerHeight = header.outerHeight();
            var mainContainer = $('.container.main-container').first();
            var isFixed = header.css('position') === 'fixed';

            // Add top margin to first main container to account for fixed header
            if (mainContainer.length && isFixed) {
                mainContainer.css('margin-top', headerHeight + 'px');
            } else if (mainContainer.length) {
                mainContainer.css('margin-top', '0');
            }

            // Ensure banner section has proper margin-top
            var bannerSection = mainContainer.find('.layout-7');
            if (bannerSection.length) {
                bannerSection.css({
                    'margin-top': '15px',
                    'padding-top': '0'
                });
            }
        }

        // Auto-adjust search bar width based on available space
        function adjustSearchBarWidth() {
            var menuCenter = $('.menu-center');
            var searchContainer = $('.modern-search-container');
            var categoriesList = $('.header-categories-list');
            var mainMenu = $('.main-menu');

            if (mainMenu.length && menuCenter.length && searchContainer.length && categoriesList.length) {
                // Calculate available space in the header
                var menuLeftWidth = $('.menu-left').outerWidth(true);
                var menuRightWidth = $('.menu-right').outerWidth(true);
                var totalHeaderWidth = mainMenu.width();
                var categoriesWidth = categoriesList.outerWidth(true);

                // Calculate available space for search
                var usedSpace = menuLeftWidth + menuRightWidth + categoriesWidth + 40; // 40px for gaps
                var availableSpace = totalHeaderWidth - usedSpace;

                // Set search container width based on available space
                if (availableSpace > 150) {
                    searchContainer.css({
                        'max-width': Math.min(availableSpace, 400) + 'px',
                        'flex': '0 1 auto'
                    });
                } else {
                    searchContainer.css({
                        'max-width': '150px',
                        'flex': '0 1 auto'
                    });
                }
            }
        }

        // Adjust search input width dynamically
        function adjustSearchInputWidth() {
            var searchInput = $('#exampleInputSearchProduct');
            var searchWrapper = $('.modern-search-wrapper');

            if (searchInput.length && searchWrapper.length) {
                // Set input to fit content with minimal padding
                searchInput.css({
                    'width': '100%',
                    'flex': '1 1 auto'
                });
            }
        }

        // Run on page load and after any dynamic content changes
        adjustHeaderSpacing();
        adjustSearchBarWidth();
        adjustSearchInputWidth();
        $(window).on('resize', function () {
            adjustHeaderSpacing();
            adjustSearchBarWidth();
            adjustSearchInputWidth();
        });

        // Adjust search input on input event
        $('#exampleInputSearchProduct').on('input', function () {
            adjustSearchInputWidth();
        });

        // Modern inline search functionality
        var searchInput = $("#exampleInputSearchProduct");
        var suggestionsBox = $("#modern-search-suggestions");

        // Show search history on focus
        searchInput.on('focus', function () {
            var currentValue = $(this).val();
            if (currentValue.length === 0) {
                $("#search-suggestion-list").empty();
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('Main/getSearchedHistory') ?>",
                    dataType: 'text',
                    data: {},
                    success: function (response) {
                        if (response.trim() !== '') {
                            $("#search-suggestion-list").html(response);
                            suggestionsBox.addClass('show');
                        }
                    },
                    error: function () {
                        console.error("Failed to fetch search history.");
                    }
                });
            }
        });

        // Search as user types
        searchInput.on('keyup', function () {
            var keyword = $(this).val();
            if (keyword.length > 2) {
                search_product(keyword);
                suggestionsBox.addClass('show');
            } else if (keyword.length === 0) {
                suggestionsBox.removeClass('show');
            }
        });

        // Hide suggestions when clicking outside
        $(document).on('click', function (e) {
            if (!$(e.target).closest('.modern-search-wrapper').length) {
                suggestionsBox.removeClass('show');
            }
        });

        // Mobile search icon click
        $("#search_icon_bar, .ti-search").click(function () {
            searchInput.focus();
        });
    });

    $(document).on('click', '.search_list', function (e) {
        e.preventDefault();
        var url = $(this).data('url');
        var searchText = $(this).data('search');

        if (url) {
            // Navigate to product page
            window.location.href = url;
        } else {
            // For search history items, populate and search
            $("#exampleInputSearchProduct").val(searchText);
            search_product(searchText);
            $("#modern-search-suggestions").addClass('show');
        }
    });

    // Also handle direct link clicks
    $(document).on('click', '.search-result-link', function (e) {
        // Allow navigation to proceed
        return true;
    });

    function search_product(keyword) {
        if (keyword.length > 2) {
            $("#search-suggestion-list").empty();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('Main/getSearchedProduct') ?>",
                dataType: 'text',
                data: { keyword: keyword },
                success: function (response) {
                    if (response.trim() === '') {
                        $("#search-suggestion-list").html('<li class="no-results"><div class="no-results-message"><i class="fa fa-search"></i><p>Nothing matches your search</p><span>Try different keywords</span></div></li>');
                    } else {
                        $("#search-suggestion-list").html(response);
                    }
                    $("#modern-search-suggestions").addClass('show');
                },
                error: function () {
                    $("#search-suggestion-list").html('<li class="no-results"><div class="no-results-message"><i class="fa fa-exclamation-triangle"></i><p>Search failed</p><span>Please try again</span></div></li>');
                    $("#modern-search-suggestions").addClass('show');
                }
            });
        } else if (keyword.length === 0) {
            $("#modern-search-suggestions").removeClass('show');
        }
    }
</script>

<script>
    $(document).ready(function () {
        function openMobileProfile() {
            $("#mobile-profile-overlay").addClass("active");
        }

        function closeMobileProfile() {
            $("#mobile-profile-overlay").removeClass("active");
        }

        $(document).on("click", ".mobile-profile-trigger", function (e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                openMobileProfile();
            }
        });

        $(document).on("click", ".mobile-profile-overlay-backdrop, .mobile-profile-close", function () {
            closeMobileProfile();
        });

        $(document).on("click", ".mobile-profile-link", function () {
            closeMobileProfile();
        });

        $(document).on("click", ".mobile-profile-logout", function (e) {
            e.preventDefault();
            var logoutUrl = $(this).attr("href");

            Swal.fire({
                title: "Are you sure?",
                text: "You will be logged out of your account.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d4af37",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, logout!",
                cancelButtonText: "Cancel"
            }).then(function (result) {
                if (result.isConfirmed) {
                    window.location.href = logoutUrl;
                }
            });
        });
    });
</script>