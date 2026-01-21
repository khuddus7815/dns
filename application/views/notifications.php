<style>
.notifications-page {
    padding: 40px 0;
}

.notification-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    margin-bottom: 20px;
    padding: 20px;
    transition: all 0.3s ease;
    cursor: pointer;
    border-left: 4px solid transparent;
}

.notification-card:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.12);
    transform: translateY(-2px);
}

.notification-card.unread {
    background: #e3f2fd;
    border-left-color: #2196f3;
}

.notification-card.unread:hover {
    background: #bbdefb;
}

.notification-card-header {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 12px;
}

.notification-icon-large {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
    flex-shrink: 0;
}

.notification-icon-large.order_placed {
    background: #4caf50;
}

.notification-icon-large.payment_success {
    background: #2196f3;
}

.notification-icon-large.order_shipped {
    background: #ff9800;
}

.notification-icon-large.order_delivered {
    background: #9c27b0;
}

.notification-card-content {
    flex: 1;
}

.notification-card-title {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
}

.notification-card-message {
    font-size: 15px;
    color: #666;
    margin-bottom: 8px;
    line-height: 1.5;
}

.notification-card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid #e0e0e0;
}

.notification-card-time {
    font-size: 13px;
    color: #999;
}

.notification-card-order-link {
    color: #007bff;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
}

.notification-card-order-link:hover {
    text-decoration: underline;
}

.empty-notifications {
    text-align: center;
    padding: 80px 20px;
}

.empty-notifications-icon {
    font-size: 80px;
    color: #ddd;
    margin-bottom: 20px;
}

.empty-notifications h3 {
    color: #666;
    margin-bottom: 10px;
}

.empty-notifications p {
    color: #999;
}

.page-header {
    margin-bottom: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.page-header h2 {
    margin: 0;
    font-weight: 600;
}

.mark-all-read-btn {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 500;
    transition: background 0.3s;
}

.mark-all-read-btn:hover {
    background: #0056b3;
}
</style>

<section class="section-b-space margin-top">
    <div class="container">
        <div class="notifications-page">
            <div class="page-header">
                <h2>Notifications</h2>
                <button class="mark-all-read-btn" id="mark-all-read-page-btn" style="display: none;">Mark All as Read</button>
            </div>

            <div id="notifications-container">
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    loadAllNotifications();

    function loadAllNotifications() {
        $.ajax({
            url: '<?= base_url("main/get_all_notifications") ?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    var html = '';
                    var hasUnread = false;

                    if (response.notifications && response.notifications.length > 0) {
                        response.notifications.forEach(function(notif) {
                            if (notif.is_read == 0) hasUnread = true;

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
                            var orderLink = notif.order_id ? '<?= base_url("main/order_detail") ?>/' + notif.order_id : '#';
                            
                            html += '<div class="notification-card ' + unreadClass + '" data-id="' + notif.id + '" data-order-id="' + (notif.order_id || '') + '">';
                            html += '<div class="notification-card-header">';
                            html += '<div class="notification-icon-large ' + iconBg + '"><i class="fa ' + iconClass + '"></i></div>';
                            html += '<div class="notification-card-content">';
                            html += '<div class="notification-card-title">' + notif.title + '</div>';
                            html += '<div class="notification-card-message">' + notif.message + '</div>';
                            html += '<div class="notification-card-footer">';
                            html += '<span class="notification-card-time">' + timeAgo + '</span>';
                            if (notif.order_id) {
                                html += '<a href="' + orderLink + '" class="notification-card-order-link">View Order</a>';
                            }
                            html += '</div></div></div></div>';
                        });
                        $('#mark-all-read-page-btn').toggle(hasUnread);
                    } else {
                        html = '<div class="empty-notifications">';
                        html += '<div class="empty-notifications-icon"><i class="fa fa-bell-slash"></i></div>';
                        html += '<h3>No Notifications</h3>';
                        html += '<p>You don\'t have any notifications yet.</p>';
                        html += '</div>';
                        $('#mark-all-read-page-btn').hide();
                    }
                    $('#notifications-container').html(html);
                } else {
                    $('#notifications-container').html('<div class="alert alert-danger">Error loading notifications</div>');
                }
            },
            error: function() {
                $('#notifications-container').html('<div class="alert alert-danger">Error loading notifications</div>');
            }
        });
    }

    // Mark notification as read and navigate
    $(document).on('click', '.notification-card', function(e) {
        if ($(e.target).hasClass('notification-card-order-link')) {
            return; // Let the link handle navigation
        }

        var notifId = $(this).data('id');
        var orderId = $(this).data('order-id');
        
        // Mark as read
        if (notifId) {
            $.ajax({
                url: '<?= base_url("api/notifications_mark_read") ?>',
                type: 'POST',
                data: { notification_id: notifId },
                dataType: 'json',
                success: function() {
                    loadAllNotifications();
                }
            });
        }

        // Navigate to order if available
        if (orderId) {
            window.location.href = '<?= base_url("main/order_detail") ?>/' + orderId;
        }
    });

    // Mark all as read
    $('#mark-all-read-page-btn').on('click', function() {
        $.ajax({
            url: '<?= base_url("api/notifications_mark_all_read") ?>',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    loadAllNotifications();
                }
            }
        });
    });

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
