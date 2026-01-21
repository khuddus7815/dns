<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    @media (max-width: 991px) {
        body {
            overflow-y: auto !important;
            overflow-x: hidden !important;
        }

        .page-main-header {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            position: sticky !important;
            top: 0 !important;
            z-index: 9999 !important;
            background: #fff !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .mobile-sidebar {
            order: 1;
            flex: 0 0 40px !important;
        }

        .main-header-center {
            order: 2;
            flex: 1 !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            position: absolute !important;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            pointer-events: none !important;
            /* Let clicks pass through if needed, though logo link needs clicks. Actually remove this if logo needs click. keeping off for wrapper, on for link */
        }

        .main-header-center .logo-wrapper {
            pointer-events: auto;
            z-index: 10001 !important;
            display: block !important;
            position: relative;
        }

        .mobile-bell-container {
            position: absolute !important;
            right: 15px;
            top: 0;
            bottom: 0;
            display: flex !important;
            align-items: center !important;
            justify-content: flex-end !important;
            z-index: 10;
        }

        .nav-right {
            display: none !important;
        }
    }

    /* Dashboard Responsiveness Fix */
    /* DEFAULT STATE (Desktop): Sidebar Open, Body Pushed */
    /* Dashboard Responsiveness Fix */
    /* DEFAULT STATE (Desktop): Sidebar Open, Body Pushed */
    .page-wrapper .page-body-wrapper .page-sidebar {
        margin-left: 0 !important;
        transform: translateX(0);
        transition: all 0.3s ease;
        width: 255px;
        opacity: 1 !important;
        display: block !important;
    }

    .page-wrapper .page-body-wrapper .page-sidebar~.page-body {
        margin-left: 255px !important;
        transition: all 0.3s ease;
        width: calc(100% - 255px) !important;
    }

    /* CLOSED STATE (Desktop): 'open' class added -> Sidebar Hidden, Body Full */
    .page-wrapper .page-body-wrapper .page-sidebar.open {
        margin-left: -260px !important;
        transform: translateX(-100%);
        opacity: 0;
        visibility: hidden;
    }

    .page-wrapper .page-body-wrapper .page-sidebar.open~.page-body {
        margin-left: 0 !important;
        width: 100% !important;
    }

    /* MOBILE OVERRIDES */
    @media (max-width: 991px) {

        .page-wrapper .page-body-wrapper .page-sidebar~.page-body,
        .page-wrapper .page-body-wrapper .page-sidebar.open~.page-body {
            margin-left: 0 !important;
            width: 100% !important;
        }

        /* Mobile Default: Sidebar Hidden ('open' class likely added by JS on load) */
        .page-wrapper .page-body-wrapper .page-sidebar.open {
            margin-left: -260px !important;
            transform: translateX(-100%);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
        }

        /* If 'open' class is REMOVED (User toggled), sidebar is visible */
        .page-wrapper .page-body-wrapper .page-sidebar {
            margin-left: 0 !important;
            transform: translateX(0);
            display: block !important;
            position: fixed;
            top: 60px !important;
            height: calc(100vh - 60px) !important;
            z-index: 9998 !important;
            /* Ensure it's below the header (9999) so toggle is clickable */
            opacity: 1 !important;
            visibility: visible;
        }
    }

    z-index: 999;
    }

    /* Body is always full width on mobile */
    .page-wrapper .page-body-wrapper .page-sidebar~.page-body,
    .page-wrapper .page-body-wrapper .page-sidebar.open~.page-body {
        margin-left: 0 !important;
    }
    }

    /* Header Height Adjustment for Larger Logo */
    .page-main-header {
        height: 90px !important;
        display: flex;
        align-items: center;
    }

    .page-wrapper .page-body-wrapper .page-sidebar {
        top: 90px !important;
        height: calc(100vh - 90px) !important;
    }

    .page-wrapper .page-body-wrapper .page-sidebar~.page-body {
        margin-top: 90px !important;
    }


    /* Dynamic Logo Visibility Logic */
    /* CORRECTED LOGIC: */

    /* DEFAULT (Sidebar OPEN): Logo Visible (Standard State) */
    .page-main-header .main-header-left {
        display: flex !important;
    }

    /* CLOSED (Sidebar HIDDEN - has .close-sidebar class): Logo HIDDEN (Closes with Sidebar) - DESKTOP ONLY */
    @media (min-width: 992px) {
        .page-main-header.close-sidebar .main-header-left {
            display: none !important;
        }
    }

    .page-main-header.close-sidebar .mobile-sidebar {
        margin-left: 0 !important;
    }

    /* Ensure no pseudo-elements push content */
    .page-main-header::before {
        display: none !important;
        content: none !important;
    }

    @media (max-width: 991px) {
        .page-main-header {
            height: 90px !important;
            /* Increased height for bigger logo */
            padding-left: 0 !important;
            /* Ensure no padding shifting center */
        }

        .header-left-group {
            position: static !important;
            /* KEY CHANGE: Remove relative positioning so logo positions relative to header */
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: flex-start;
            /* Keep toggle on left */
            align-items: center;
        }

        .mobile-sidebar {
            order: 1 !important;
            margin-right: 0 !important;
            flex: 0 0 auto !important;
            z-index: 1003 !important;
            position: relative;
            top: 2px;
            margin-left: 15px;
            /* Add some spacing from edge */
        }

        /* Mobile Logo Wrapper - True Centering */
        .main-header-left {
            position: absolute !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            top: 0;
            bottom: 0;
            width: auto !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            margin: 0 !important;
            padding: 0 !important;
            pointer-events: none;
            z-index: 1001;
        }

        /* Re-enable clicks */
        .main-header-left .logo-wrapper,
        .main-header-left a {
            pointer-events: auto;
            display: flex;
            align-items: center;
        }

        /* Fix Sidebar Connection */
        .page-wrapper .page-body-wrapper .page-sidebar {
            top: 90px !important;
            /* MUST match new header height */
            margin-top: 0 !important;
            height: calc(100vh - 90px) !important;
        }

        /* MEGA BIG LOGO for Mobile - Adjusted to prevent overlap */
        .main-header-left img {
            height: 70px !important;
            width: auto !important;
            max-width: calc(100vw - 120px) !important;
            /* Prevent overlap with toggle/bell */
            object-fit: contain;
        }

        /* Hide Desktop Logo Wrapper padding */
        .main-header-left .logo-wrapper {
            padding: 0 !important;
        }

        /* FIX: Remove body top margin on mobile layout to prevent double whitespace */
        .page-wrapper .page-body-wrapper .page-sidebar~.page-body {
            margin-top: 0 !important;
        }
    }
</style>

<div class="page-wrapper">
    <!-- Page Header Start-->
    <!-- Page Header Start-->
    <div class="page-main-header w-100"
        style="padding-left: 0 !important; margin-left: 0 !important; padding-right: 15px;">

        <!-- Group Logo and Hamburger -->
        <div class="header-left-group" style="display: flex; align-items: center;">
            <!-- 1. DESKTOP LOGO (Header Logo) - FIRST -->
            <!-- Logic: Always visible (d-flex) by default, Hidden via JS/CSS when sidebar closed. -->
            <!-- Width set to 260px to match standard Sidebar width. Aligned Left (flex-start) per user request. -->
            <div class="main-header-left d-flex"
                style="align-items: center; width: 260px; padding-left: 65px; padding-top: 21px; padding-right: 0; justify-content: flex-start;">
                <!-- Logo Script to fetch path -->
                <?php
                $CI =& get_instance();
                $CI->load->model('Settings_model');
                $logo_path = $CI->Settings_model->get_setting('site_logo');
                $logo_url = $logo_path ? base_url('upload/logo/' . $logo_path) : base_url('assets/images/icon/logo/fd9.png');
                ?>
                <div class="logo-wrapper">
                    <a href="<?= base_url('admin/') ?>">
                        <img class="blur-up lazyloaded" src="<?= $logo_url ?>" alt=""
                            style="height: 80px; width: auto; max-width: 240px; object-fit: contain;">
                    </a>
                </div>
            </div>

            <!-- 2. SIDEBAR TOGGLE (Hamburger) - SECOND -->
            <div class="mobile-sidebar" style="margin-right: 0; margin-left: 0; margin-top:-27px;">
                <div class="media-body text-left switch-sm">
                    <label class="switch" style="margin: 22px;">
                        <a href="#" class="sidebar-toggle-btn"
                            style="display: inline-block; padding: 5px; color: #d4af37 !important;">
                            <i id="sidebar-toggle" data-feather="align-left" style="width: 24px; height: 24px;"></i>
                        </a>
                    </label>
                </div>
            </div>
        </div>

        <!-- Mobile Bell (Direct Child - Isolated from Desktop Nav) -->
        <div class="mobile-bell-container d-lg-none">
            <ul class="nav-menus" style="margin: 0; padding: 0; list-style: none; display: flex; align-items: center;">
                <li style="list-style: none; position: relative; display: block !important;">
                    <i class="fa fa-bell-o notification-bell-icon" id="mobile-notification-bell"
                        style="cursor: pointer; font-size: 20px; color: #d4af37 !important; display: block;"></i>
                    <span class="badge badge-pill badge-primary admin-notification-badge"
                        id="mobile-admin-notification-count"
                        style="display: none; position: absolute; top: -5px; right: -5px; min-width: 15px; height: 15px; padding: 0 4px; font-size: 9px; line-height: 15px;">0</span>
                </li>
            </ul>
        </div>

        <!-- Spacer for Desktop -->
        <div class="d-none d-lg-block" style="flex: 1;"></div>

        <!-- Right Side Container (Desktop Only) -->
        <div class="nav-right" style="flex: 0 0 auto; display: flex; align-items: center;">

            <!-- Desktop Bell (Standard) -->
            <div class="d-none d-lg-block" style="padding: 0 15px; z-index: 1000;">
                <ul class="nav-menus"
                    style="justify-content: flex-end; margin: 0; padding: 0; list-style: none; display: flex; align-items: center;">
                    <li class="onhover-dropdown admin-notification-dropdown"
                        style="list-style: none; position: relative; display: block !important; visibility: visible !important;">
                        <i data-feather="bell" class="notification-bell-icon"
                            style="cursor: pointer; width: 24px; height: 24px; display: block !important; visibility: visible !important; color: #333;"></i>
                        <span class="badge badge-pill badge-primary admin-notification-badge"
                            id="admin-notification-count"
                            style="display: none; position: absolute; top: -8px; right: -8px; min-width: 18px; height: 18px; padding: 0 5px; font-size: 10px; line-height: 18px; text-align: center; z-index: 1001;">0</span>
                        <span class="dot"></span>
                        <ul class="notification-dropdown onhover-show-div p-0 admin-notification-list"
                            id="admin-notification-dropdown"
                            style="min-width: 320px; max-width: 380px; max-height: 400px; overflow-y: auto; position: absolute; right: 0; top: 100%; z-index: 1000; background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.15); border-radius: 8px; margin-top: 10px;">
                            <li
                                style="padding: 10px 15px; background: #f8f9fa; border-bottom: 1px solid #dee2e6; font-weight: 600; list-style: none;">
                                Notifications <span class="badge badge-pill badge-primary pull-right"
                                    id="admin-notification-count-header">0</span>
                            </li>
                            <li id="admin-notification-items"
                                style="max-height: 300px; overflow-y: auto; list-style: none;">
                                <div class="text-center p-3">
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </li>
                            <li class="txt-dark"
                                style="padding: 10px 15px; background: #f8f9fa; border-top: 1px solid #dee2e6; text-align: center; list-style: none;">
                                <a href="<?= base_url('admin/notifications') ?>"
                                    style="color: #d4af37; font-weight: 600; text-decoration: none;">View All
                                    Notifications</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>



    <!-- Custom Universal Notification Panel (Slide Down) -->
    <div id="custom-mobile-notification-panel"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 99999;">
        <!-- Backdrop -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5);"
            class="close-mobile-panel"></div>

        <!-- Panel Content -->
        <div class="panel-content"
            style="position: relative; background: #fff; width: 100%; max-width: 400px; max-height: 80vh; overflow-y: auto; box-shadow: 0 5px 15px rgba(0,0,0,0.2); border-bottom-right-radius: 15px; float: left;">
            <div class="panel-header"
                style="padding: 15px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; background: #f8f9fa; position: sticky; top: 0; z-index: 10;">
                <h5 style="margin: 0; font-weight: 600; font-size: 16px;">Notifications <span
                        class="badge badge-primary ml-2" id="mobile-custom-notification-count">0</span></h5>
                <button type="button" class="close-mobile-panel"
                    style="background: none; border: none; font-size: 24px; line-height: 1; color: #333; cursor: pointer;">&times;</button>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled m-0" id="mobile-custom-notification-items">
                    <div class="text-center p-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="panel-footer"
                style="padding: 10px; text-align: center; border-top: 1px solid #eee; background: #f8f9fa;">
                <a href="<?= base_url('admin/notifications') ?>"
                    style="color: #d4af37; font-weight: 600; text-decoration: none; display: block; padding: 5px;">View
                    All Notifications</a>
            </div>
        </div>
    </div>

    <!-- Script to handle Sidebar & Logo Toggle Sync -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var sidebarToggleBtn = document.querySelector('.sidebar-toggle-btn');
            var pageHeader = document.querySelector('.page-main-header'); // Corrected selector

            // Check initial state locally if possible, or default to open
            // but we assume started open based on existing styles

            if (sidebarToggleBtn && pageHeader) {
                // Initialize for Mobile: 
                // User Request: "add logo at top header no hiding"
                // So we do NOT force 'close-sidebar' on mobile load anymore for the Header.
                // However, the Sidebar itself (content) might still be closed by default logic in theme.
                // We keep the toggle listener to sync class, but likely 'close-sidebar' mainly affects Desktop logo hiding now.

                // if (window.innerWidth < 991) {
                //    pageHeader.classList.add('close-sidebar');
                // }

                sidebarToggleBtn.addEventListener('click', function (e) {
                    // Logic: The theme likely handles the sidebar closing via its own js (adding 'open' or 'close' to sidebar)
                    // We just need to sync our header logo visibility (mainly for Desktop now)

                    // Toggle a specific class for our custom CSS to hook into
                    pageHeader.classList.toggle('close-sidebar');
                });
            }
        });
    </script>