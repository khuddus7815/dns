<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/custom.css')?>">
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Notifications
                            <small>DNS Store Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Notifications</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>All Notifications</h5>
                    <?php if ($unread_count > 0): ?>
                        <button class="btn btn-sm btn-primary" id="mark-all-read-btn">Mark All as Read</button>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <?php if (!empty($notifications)): ?>
                    <div class="notification-list">
                        <?php foreach ($notifications as $notification): ?>
                            <?php
                            $is_read = $notification->is_read == 1;
                            $read_class = $is_read ? '' : 'unread-notification';
                            $order_link = $notification->order_id ? base_url('admin/order_details/' . $notification->order_id) : '#';
                            
                            // Get icon based on type
                            $icon_class = 'fa-bell text-primary';
                            $icon_color = 'text-primary';
                            switch($notification->type) {
                                case 'new_order':
                                    $icon_class = 'fa-shopping-cart';
                                    $icon_color = 'text-success';
                                    break;
                                case 'order_cancelled_user':
                                    $icon_class = 'fa-times-circle';
                                    $icon_color = 'text-warning';
                                    break;
                                case 'order_cancelled_admin':
                                    $icon_class = 'fa-ban';
                                    $icon_color = 'text-danger';
                                    break;
                                case 'order_shipped':
                                    $icon_class = 'fa-truck';
                                    $icon_color = 'text-info';
                                    break;
                                case 'order_delivered':
                                    $icon_class = 'fa-check-circle';
                                    $icon_color = 'text-success';
                                    break;
                            }
                            ?>
                            <div class="notification-item card mb-3 <?= $read_class ?>" 
                                 data-id="<?= $notification->id ?>" 
                                 data-order-id="<?= $notification->order_id ?>" 
                                 style="cursor: pointer; <?= !$is_read ? 'border-left: 4px solid #D4AF37;' : '' ?>">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <div class="notification-icon mr-3">
                                            <i class="fa <?= $icon_class ?> <?= $icon_color ?>" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 <?= !$is_read ? 'font-weight-bold' : '' ?>">
                                                <?= htmlspecialchars($notification->title) ?>
                                            </h6>
                                            <p class="mb-1 text-muted"><?= htmlspecialchars($notification->message) ?></p>
                                            <small class="text-muted">
                                                <?= date('M d, Y h:i A', strtotime($notification->created_at)) ?>
                                            </small>
                                        </div>
                                        <?php if (!$is_read): ?>
                                            <span class="badge badge-warning">New</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center p-5">
                        <i class="fa fa-bell-slash" style="font-size: 3rem; color: #ccc;"></i>
                        <p class="mt-3 text-muted">No notifications yet</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Handle notification click - route to order details
    $('.notification-item').click(function() {
        const notificationId = $(this).data('id');
        const orderId = $(this).data('order-id');

        // Mark as read
        if (notificationId) {
            $.ajax({
                url: '<?= base_url("api/admin_notifications_mark_read") ?>',
                type: 'POST',
                data: { notification_id: notificationId },
                dataType: 'json',
                success: function() {
                    // Remove unread styling
                    $('.notification-item[data-id="' + notificationId + '"]').removeClass('unread-notification');
                    $('.notification-item[data-id="' + notificationId + '"]').find('.badge').remove();
                    $('.notification-item[data-id="' + notificationId + '"]').css('border-left', '');
                }
            });
        }

        // Route to order details if order_id exists
        if (orderId) {
            window.location.href = '<?= base_url("admin/order_details/") ?>' + orderId;
        }
    });

    // Mark all as read
    $('#mark-all-read-btn').click(function() {
        $.ajax({
            url: '<?= base_url("api/admin_notifications_mark_all_read") ?>',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Reload page to update notifications
                    location.reload();
                }
            }
        });
    });
});
</script>

<style>
.unread-notification {
    background-color: #fff9e6;
}

.notification-item:hover {
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transform: translateY(-2px);
    transition: all 0.3s ease;
}
</style>
