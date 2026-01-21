<!-- select dropdown jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<!-- latest jquery-->
<script src="<?= base_url('adminassets/js/jquery-3.3.1.min.js') ?>"></script>

<!-- Bootstrap js-->
<script src="<?= base_url('adminassets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('adminassets/js/bootstrap.js') ?>"></script>

<!-- feather icon js-->
<script src="<?= base_url('adminassets/js/icons/feather-icon/feather.min.js') ?>"></script>
<script src="<?= base_url('adminassets/js/icons/feather-icon/feather-icon.js') ?>"></script>

<!-- Sidebar jquery-->
<script src="<?= base_url('/adminassets/js/sidebar-menu.js') ?>"></script>

<!--chartist js-->
<script src="<?= base_url('adminassets/js/chart/chartist/chartist.js') ?>"></script>

<!--chartjs js-->
<script src="<?= base_url('adminassets/js/chart/chartjs/chart.min.js') ?>"></script>

<!-- lazyload js-->
<script src="<?= base_url('adminassets/js/lazysizes.min.js') ?>"></script>

<!--copycode js-->
<script src="<?= base_url('adminassets/js/prism/prism.min.js') ?>"></script>
<script src="<?= base_url('adminassets/js/clipboard/clipboard.min.js') ?>"></script>
<script src="<?= base_url('adminassets/js/custom-card/custom-card.js') ?>"></script>

<!--counter js-->
<script src="<?= base_url('adminassets/js/counter/jquery.waypoints.min.js') ?>"></script>
<script src="<?= base_url('adminassets/js/counter/jquery.counterup.min.js') ?>"></script>
<script src="<?= base_url('adminassets/js/counter/counter-custom.js') ?>"></script>

<!--peity chart js-->
<script src="<?= base_url('adminassets/js/chart/peity-chart/peity.jquery.js') ?>"></script>

<!--sparkline chart js-->
<script src="<?= base_url('adminassets/js/chart/sparkline/sparkline.js') ?>"></script>


<!--right sidebar js-->
<script src="<?= base_url('adminassets/js/chat-menu.js') ?>"></script>
<!-- Datatables js-->
<script src="<?= base_url('adminassets/js/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('adminassets/js/datatables/custom-basic.js') ?>"></script>
<!--height equal js-->
<script src="<?= base_url('adminassets/js/height-equal.js') ?>"></script>

<!-- lazyload js-->
<script src="<?= base_url('adminassets/js/lazysizes.min.js') ?>"></script>

<!--script admin-->
<script src="<?= base_url('adminassets/js/admin-script.js') ?>"></script>
<!--Customizer admin-->
<script src="<?= base_url('adminassets/js/admin-customizer.js') ?>"></script>
<!-- Jsgrid js-->
<script src="<?= base_url('adminassets/js/jsgrid/jsgrid.min.js') ?>"></script>
<script src="<?= base_url('adminassets/js/jsgrid/griddata-manage-product.js') ?>"></script>
<script src="<?= base_url('adminassets/js/jsgrid/jsgrid-manage-product.js') ?>"></script>

<script>
    $(document).ready(function () {

        // Find any link that points to the admin_logout function
        // This uses an "attribute selector" to find all <a> tags with this specific href
        $('a[href="<?= base_url('AuthController/admin_logout') ?>"]').on('click', function (event) {

            // Stop the link from navigating immediately
            event.preventDefault();

            // Get the URL from the link
            var logoutUrl = $(this).attr('href');

            // Show the "Are you sure?" confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, log me out!'
            }).then((result) => {
                // If the user clicks "Yes"
                if (result.isConfirmed) {
                    // Manually navigate to the logout URL
                    window.location.href = logoutUrl;
                }
            });
        });

    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        // 1. Get ALL elements with the class 'logout-link'
        var logoutLinks = document.querySelectorAll(".logout-link");

        // 2. Loop through each one and add the event listener
        logoutLinks.forEach(function (link) {
            link.addEventListener("click", function (e) {
                // Prevent the link from navigating immediately
                e.preventDefault();

                // Get the URL from the link's href attribute
                var logoutUrl = this.href;

                // Show the SweetAlert confirmation
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be logged out!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, logout!'
                }).then((result) => {
                    // If the user confirms, redirect to the logout URL
                    if (result.isConfirmed) {
                        window.location.href = logoutUrl;
                    }
                });
            });
        });

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- Admin Notifications JavaScript -->
<script>
    $(document).ready(function () {
        // Function to get notification icon based on type
        function getNotificationIcon(type) {
            const icons = {
                'new_order': '<i class="fa fa-shopping-cart text-success"></i>',
                'order_cancelled_user': '<i class="fa fa-times-circle text-warning"></i>',
                'order_cancelled_admin': '<i class="fa fa-ban text-danger"></i>',
                'order_shipped': '<i class="fa fa-truck text-info"></i>',
                'order_delivered': '<i class="fa fa-check-circle text-success"></i>'
            };
            return icons[type] || '<i class="fa fa-bell text-primary"></i>';
        }

        // Function to load admin notifications
        function loadAdminNotifications() {
            $.ajax({
                url: '<?= base_url("api/admin_notifications_get_recent") ?>',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        const notifications = response.notifications || [];
                        const unreadCount = response.unread_count || 0;

                        // Update badge count
                        // Update badge count
                        if (unreadCount > 0) {
                            $('#admin-notification-count, #mobile-admin-notification-count, #mobile-custom-notification-count').text(unreadCount).show();
                            $('#admin-notification-count-header').text(unreadCount);
                        } else {
                            $('#admin-notification-count, #mobile-admin-notification-count, #mobile-custom-notification-count').hide();
                            $('#admin-notification-count-header').text('0');
                        }

                        // Update notification list
                        // Target desktop dropdown (#admin-notification-items) and mobile custom panel list (#mobile-custom-notification-items)
                        const $items = $('#admin-notification-items, #mobile-custom-notification-items');
                        if (notifications.length > 0) {
                            let html = '';
                            notifications.forEach(function (notif) {
                                const icon = getNotificationIcon(notif.type);
                                const isRead = notif.is_read == 1;
                                const readClass = isRead ? '' : 'font-weight-bold';
                                const bgClass = isRead ? '' : 'bg-light';

                                // Truncate message to fit in 1-2 lines
                                let shortMessage = notif.message;
                                if (shortMessage.length > 60) {
                                    shortMessage = shortMessage.substring(0, 57) + '...';
                                }

                                html += '<li class="notification-item ' + (isRead ? '' : 'unread') + ' ' + bgClass + '" data-id="' + notif.id + '" data-order-id="' + (notif.order_id || '') + '" style="padding: 10px 12px; border-bottom: 1px solid #eee; cursor: pointer; transition: background 0.2s;">';
                                html += '<div class="d-flex align-items-center" style="gap: 10px;">';
                                html += '<div style="font-size: 1.3rem; flex-shrink: 0;">' + icon + '</div>';
                                html += '<div class="flex-grow-1" style="min-width: 0; overflow: hidden;">';
                                html += '<div class="' + readClass + '" style="font-size: 0.85rem; line-height: 1.4; color: #333; margin-bottom: 2px;">' + notif.title + '</div>';
                                html += '<div class="text-muted" style="font-size: 0.75rem; line-height: 1.3; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">' + shortMessage + '</div>';
                                if (!isRead) {
                                    html += '<span class="badge badge-warning" style="font-size: 0.65rem; padding: 2px 5px; flex-shrink: 0;">New</span>';
                                }
                                html += '</div></li>';
                            });
                            $items.html(html);
                        } else {
                            $items.html('<li class="text-center p-3 text-muted">No notifications</li>');
                        }
                    }
                },
                error: function () {
                    console.error('Failed to load admin notifications');
                }
            });
        }

        // Format date for display
        function formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diff = now - date;
            const minutes = Math.floor(diff / 60000);
            const hours = Math.floor(minutes / 60);
            const days = Math.floor(hours / 24);

            if (minutes < 1) return 'Just now';
            if (minutes < 60) return minutes + ' min ago';
            if (hours < 24) return hours + ' hour' + (hours > 1 ? 's' : '') + ' ago';
            if (days < 7) return days + ' day' + (days > 1 ? 's' : '') + ' ago';
            return date.toLocaleDateString();
        }

        // Handle notification click - route to order details
        // Note: This works for both dropdown items and custom panel items as they share the .notification-item class
        $(document).on('click', '.notification-item', function (e) {
            e.preventDefault();
            e.stopPropagation();

            const notificationId = $(this).data('id');
            const orderId = $(this).data('order-id');

            // Mark as read
            if (notificationId) {
                $.ajax({
                    url: '<?= base_url("api/admin_notifications_mark_read") ?>',
                    type: 'POST',
                    data: { notification_id: notificationId },
                    dataType: 'json',
                    success: function () {
                        // Update UI
                        $('.notification-item[data-id="' + notificationId + '"]').removeClass('unread bg-light');
                        $('.notification-item[data-id="' + notificationId + '"]').find('.badge').remove();
                    }
                });
            }

            // Route to order details if order_id exists
            if (orderId && orderId !== '') {
                window.location.href = '<?= base_url("admin/order_details/") ?>' + orderId + '?source=notification';
                // Close custom panel if open
                $('#custom-mobile-notification-panel').slideUp();
            } else {
                console.log('No order ID found for this notification');
            }
        });

        // Load notifications on page load
        loadAdminNotifications();

        // Refresh notifications every 30 seconds
        setInterval(loadAdminNotifications, 30000);

        // Add hover effect for notification items
        $(document).on('mouseenter', '.notification-item', function () {
            $(this).css('background-color', '#f0f0f0');
        }).on('mouseleave', '.notification-item', function () {
            if (!$(this).hasClass('unread')) {
                $(this).css('background-color', '');
            }
        });

        // Initialize Feather Icons
        if (typeof feather !== 'undefined') {
            feather.replace();
            // Re-initialize notification bell icon
            setTimeout(function () {
                var bellIcon = document.querySelector('.notification-bell-icon');
                if (bellIcon && !bellIcon.querySelector('svg')) {
                    feather.replace(bellIcon);
                }
            }, 100);
        }

        // Custom Mobile Notification Panel Logic
        // Toggle the panel visibility when the bell is clicked on mobile
        $(document).on('click', '#mobile-notification-bell', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var $panel = $('#custom-mobile-notification-panel');
            var headerHeight = $('.page-main-header').outerHeight() || 80; // Default or calculated height

            // Position it just below the header
            $panel.css('top', headerHeight + 'px');

            // Slide Toggle
            $panel.slideToggle(200);
        });

        // Close panel logic
        $(document).on('click', '.close-mobile-panel, #custom-mobile-notification-panel', function (e) {
            // If clicked on close button or the dark overlay background (but not the content)
            if ($(e.target).hasClass('close-mobile-panel') || $(e.target).attr('id') === 'custom-mobile-notification-panel') {
                $('#custom-mobile-notification-panel').slideUp(200);
            }
        });

        // Prevent closing when clicking inside the content
        $(document).on('click', '.panel-content', function (e) {
            e.stopPropagation();
        });
    });
</script>

<style>
    .notification-item.unread {
        background-color: #fff9e6 !important;
        border-left: 3px solid #d4af37;
    }

    .notification-item:hover {
        background-color: #f5f5f5 !important;
    }

    #admin-notification-dropdown::-webkit-scrollbar {
        width: 6px;
    }

    #admin-notification-dropdown::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    #admin-notification-dropdown::-webkit-scrollbar-thumb {
        background: #d4af37;
        border-radius: 3px;
    }

    #admin-notification-dropdown::-webkit-scrollbar-thumb:hover {
        background: #b8860b;
    }
</style>