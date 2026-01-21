<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid" style="padding-top: 0 !important;">
        <div class="page-header" style="padding-top: 0 !important; margin-top: 0 !important; margin-bottom: 20px;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3 style="margin-top: 0 !important;">
                            <a href="javascript:void(0)" onclick="window.history.back()"
                                style="color: inherit; text-decoration: none; margin-right: 5px; font-size: 1rem;"><i
                                    data-feather="arrow-left"></i></a>
                            Dashboard

                            <?php if ($this->session->flashdata('success')) { ?>
                                <p style="font-size: 14px; margin: 5px 0 0;">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </p>
                            <?php } ?>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Desktop: Gradient Cards First (Desktop Only) -->
            <div class="col-xl-3 col-md-6 xl-50 mb-4 d-none d-lg-block">
                <div class="card o-hidden widget-cards modern-gradient-card"
                    style="border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);">
                    <div class="card-body"
                        style="background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%); padding: 20px;">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center">
                                    <i class="fa fa-inr" style="color: #D4AF37; font-size: 2.5rem;"></i>
                                </div>
                            </div>
                            <div class="media-body col-8"><span class="m-0"
                                    style="color: rgba(255,255,255,0.9); font-size: 0.9rem;">Earnings/Month</span>
                                <h3 class="mb-0"
                                    style="color: #fff; font-weight: 700; font-size: 1.8rem; margin-top: 5px;">₹ <span
                                        class="counter"><?= isset($earnings) ? number_format($earnings, 0) : '0' ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50 mb-4 d-none d-lg-block">
                <div class="card o-hidden widget-cards modern-gradient-card"
                    style="border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(34, 139, 34, 0.2);">
                    <div class="card-body"
                        style="background: linear-gradient(135deg, #228B22 0%, #006400 100%); padding: 20px;">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center">
                                    <i class="fa fa-cube" style="color: #228B22; font-size: 2.5rem;"></i>
                                </div>
                            </div>
                            <div class="media-body col-8"><span class="m-0"
                                    style="color: rgba(255,255,255,0.9); font-size: 0.9rem;">Products</span>
                                <h3 class="mb-0"
                                    style="color: #fff; font-weight: 700; font-size: 1.8rem; margin-top: 5px;"><span
                                        class="counter"><?php echo count($products); ?></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50 mb-4 d-none d-lg-block">
                <div class="card o-hidden widget-cards modern-gradient-card"
                    style="border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(70, 130, 180, 0.2);">
                    <div class="card-body"
                        style="background: linear-gradient(135deg, #4682B4 0%, #1E90FF 100%); padding: 20px;">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center">
                                    <i class="fa fa-folder" style="color: #4682B4; font-size: 2.5rem;"></i>
                                </div>
                            </div>
                            <div class="media-body col-8"><span class="m-0"
                                    style="color: rgba(255,255,255,0.9); font-size: 0.9rem;">Categories</span>
                                <h3 class="mb-0"
                                    style="color: #fff; font-weight: 700; font-size: 1.8rem; margin-top: 5px;"><span
                                        class="counter"><?php echo count($categories); ?></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50 mb-4 d-none d-lg-block">
                <div class="card o-hidden widget-cards modern-gradient-card"
                    style="border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(138, 43, 226, 0.2);">
                    <div class="card-body"
                        style="background: linear-gradient(135deg, #8A2BE2 0%, #4B0082 100%); padding: 20px;">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center">
                                    <i class="fa fa-users" style="color: #8A2BE2; font-size: 2.5rem;"></i>
                                </div>
                            </div>
                            <div class="media-body col-8"><span class="m-0"
                                    style="color: rgba(255,255,255,0.9); font-size: 0.9rem;">Users</span>
                                <h3 class="mb-0"
                                    style="color: #fff; font-weight: 700; font-size: 1.8rem; margin-top: 5px;"><span
                                        class="counter"><?php echo count($users); ?></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile: Order Cards First (Mobile Only) -->
            <div class="col-12 d-lg-none mb-4">
                <div class="card" style="border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div class="card-header"
                        style="background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%); border-radius: 15px 15px 0 0; padding: 15px 20px;">
                        <h5 style="color: #fff; margin: 0; font-weight: 600;">Latest Orders</h5>
                    </div>
                    <div class="card-body" style="padding: 15px;">
                        <div class="row">
                            <?php if (!empty($latest_orders)): ?>
                                <?php foreach ($latest_orders as $order): ?>
                                    <?php
                                    $first_name = isset($order->first_name) ? $order->first_name : '';
                                    $last_name = isset($order->last_name) ? $order->last_name : '';
                                    $username = isset($order->username) ? $order->username : 'Guest/Deleted-User';

                                    if (!empty($first_name) || !empty($last_name)) {
                                        $customer_name = trim($first_name . ' ' . $last_name);
                                    } else {
                                        $customer_name = $username;
                                    }

                                    $order_number = $order->order_number ?? '';
                                    $tot_amount = $order->tot_amount ?? 0;
                                    $payment_mode = $order->payment_mode ?? 'Unknown';
                                    $order_products = isset($order->order_product) ? $order->order_product : (isset($order->products) ? $order->products : []);

                                    // Status colors
                                    $status_colors = [
                                        1 => ['bg' => '#ffc107', 'text' => 'Pending'],
                                        2 => ['bg' => '#17a2b8', 'text' => 'Confirmed'],
                                        3 => ['bg' => '#007bff', 'text' => 'Shipped'],
                                        4 => ['bg' => '#28a745', 'text' => 'Delivered'],
                                        0 => ['bg' => '#dc3545', 'text' => 'Cancelled']
                                    ];

                                    // Check cancellation details
                                    if ($order->status == 0) {
                                        $cancelled_by = isset($order->cancelled_by) ? $order->cancelled_by : 'Unknown';
                                        $reason = isset($order->cancel_reason) ? $order->cancel_reason : (isset($order->cancellation_reason) ? $order->cancellation_reason : (isset($order->reason) ? $order->reason : ''));

                                        if ($reason) {
                                            $reason = htmlspecialchars($reason);
                                            // Show full reason as requested
                                            $reason_short = $reason;
                                        } else {
                                            $reason_short = '';
                                        }

                                        if ($cancelled_by == 'user') {
                                            $status_colors[0]['text'] = 'Cancelled by User';
                                        } elseif ($cancelled_by == 'admin') {
                                            $status_colors[0]['text'] = 'Cancelled by Admin';
                                        }
                                    }

                                    $status_info = $status_colors[$order->status] ?? $status_colors[1];
                                    ?>
                                    <div class="col-12 mb-3">
                                        <div class="order-card-modern"
                                            style="background: #fff; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); padding: 15px; position: relative; overflow: hidden;">
                                            <div class="d-flex justify-content-between">
                                                <!-- Left Side: Order Info & Amount -->
                                                <div style="flex: 1; padding-right: 10px;">
                                                    <a href="<?= base_url('admin/order_details/' . $order->id) ?>"
                                                        style="text-decoration: none;">
                                                        <h6
                                                            style="color: #D4AF37; font-weight: 800; margin: 0; font-size: 1.1rem; letter-spacing: 0.5px;">
                                                            <?= htmlspecialchars($order_number); ?>
                                                        </h6>
                                                    </a>
                                                    <p
                                                        style="color: #444; font-weight: 600; font-size: 0.9rem; margin: 4px 0 0 0;">
                                                        <?= htmlspecialchars($customer_name); ?>
                                                    </p>
                                                    <p style="color: #888; font-size: 0.75rem; margin: 2px 0 8px 0;"><i
                                                            class="fa fa-clock-o mr-1"></i><?= date('d M, h:i A', strtotime($order->created_at)); ?>
                                                    </p>

                                                    <!-- Amount Section moved here -->
                                                    <div style="margin-top: 5px;">
                                                        <p
                                                            style="color: #aaa; font-size: 0.7rem; margin: 0; text-transform: uppercase; letter-spacing: 1px;">
                                                            Total Amount</p>
                                                        <h5
                                                            style="color: #333; font-weight: 800; margin: 2px 0 0 0; font-size: 1.3rem;">
                                                            ₹<?= number_format($tot_amount, 2) ?></h5>
                                                        <span class="badge badge-light"
                                                            style="font-size: 0.7rem; font-weight: 500; color: #666; background: #f4f4f4; margin-top: 4px;"><?= htmlspecialchars($payment_mode); ?></span>
                                                    </div>
                                                </div>

                                                <!-- Right Side: Status & Image -->
                                                <div class="d-flex flex-column align-items-end"
                                                    style="min-width: 80px; width: auto; max-width: 50%;">
                                                    <span class="badge"
                                                        style="background: <?= $status_info['bg'] ?>; color: #fff; padding: 5px 10px; border-radius: 6px; font-size: 0.7rem; margin-bottom: 10px; width: auto; max-width: 100%; white-space: normal; text-align: right; box-shadow: 0 2px 5px rgba(0,0,0,0.1); line-height: 1.2;">
                                                        <?= $status_info['text'] ?>
                                                    </span>

                                                    <?php if (!empty($order_products)):
                                                        // Show only the first image large
                                                        $product = $order_products[0];
                                                        $product_img = isset($product->product_image) ? $product->product_image : (isset($product->product_img1) ? $product->product_img1 : '');
                                                        if (!empty($product_img)):
                                                            ?>
                                                            <div class="product-image-thumb"
                                                                style="position: relative; cursor: pointer;"
                                                                onclick="openImageModal('<?= base_url('upload/productimg/' . $product_img) ?>', '<?= htmlspecialchars($product->product_name ?? 'Product') ?>')">
                                                                <img src="<?= base_url('upload/productimg/' . $product_img) ?>"
                                                                    alt="<?= htmlspecialchars($product->product_name ?? 'Product') ?>"
                                                                    style="width: 70px; height: 70px; object-fit: cover; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                                                <?php
                                                                // Calculate total items
                                                                $total_items = 0;
                                                                foreach ($order_products as $p)
                                                                    $total_items += (isset($p->quantity) ? $p->quantity : 1);
                                                                if ($total_items > 1):
                                                                    ?>
                                                                    <span
                                                                        style="position: absolute; bottom: -5px; right: -5px; background: #D4AF37; color: #fff; border-radius: 50%; width: 22px; height: 22px; display: flex; align-items: center; justify-content: center; font-size: 0.7rem; font-weight: bold; border: 2px solid #fff;"><?= $total_items ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; endif; ?>
                                                </div>
                                            </div>

                                            <!-- Modern Dropdown at Bottom -->
                                            <div class="mt-3 pt-3" style="border-top: 1px dashed #eee;">
                                                <div style="position: relative;">
                                                    <select class="form-control status-change custom-select-modern"
                                                        data-id="<?= $order->id ?>"
                                                        style="width: 100%; height: 45px; border-radius: 8px; border: 1px solid #eee; background-color: #fcfcfc; font-weight: 600; color: #555; padding-left: 15px; -webkit-appearance: none; -moz-appearance: none; appearance: none; cursor: pointer;">
                                                        <option value="1" <?= $order->status == 1 ? 'selected' : '' ?>>Pending
                                                        </option>
                                                        <option value="2" <?= $order->status == 2 ? 'selected' : '' ?>>Confirmed
                                                        </option>
                                                        <option value="3" <?= $order->status == 3 ? 'selected' : '' ?>>Shipped
                                                        </option>
                                                        <option value="4" <?= $order->status == 4 ? 'selected' : '' ?>>Delivered
                                                        </option>
                                                        <option value="0" <?= $order->status == 0 ? 'selected' : '' ?>>Cancelled
                                                        </option>
                                                    </select>
                                                    <div
                                                        style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #D4AF37;">
                                                        <i class="fa fa-chevron-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="text-center p-4" style="background: #f8f9fa; border-radius: 12px;">
                                        <i class="fa fa-inbox" style="font-size: 2.5rem; color: #ccc;"></i>
                                        <p style="color: #999; margin-top: 10px; font-size: 0.9rem;">No recent orders found.
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="text-center mt-3">
                            <a href="<?= site_url('Admin/order_list') ?>" class="btn"
                                style="background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%); color: #fff; border: none; padding: 8px 25px; border-radius: 20px; font-weight: 600; font-size: 0.9rem;">
                                View All Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile: Gradient Cards Below Orders (Mobile Only) -->
            <div class="col-6 col-sm-6 d-lg-none mb-3">
                <div class="card o-hidden widget-cards modern-gradient-card"
                    style="border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 3px 10px rgba(212, 175, 55, 0.2);">
                    <div class="card-body"
                        style="background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%); padding: 15px;">
                        <div class="media static-top-widget">
                            <div class="icons-widgets" style="margin-right: 10px;">
                                <i class="fa fa-inr" style="color: #fff; font-size: 2rem;"></i>
                            </div>
                            <div class="media-body">
                                <span
                                    style="color: rgba(255,255,255,0.9); font-size: 0.8rem; display: block;">Earnings</span>
                                <h5 style="color: #fff; font-weight: 700; font-size: 1.4rem; margin: 3px 0 0 0;">
                                    ₹<?= isset($earnings) ? number_format($earnings, 0) : '0' ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-6 d-lg-none mb-3">
                <div class="card o-hidden widget-cards modern-gradient-card"
                    style="border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 3px 10px rgba(34, 139, 34, 0.2);">
                    <div class="card-body"
                        style="background: linear-gradient(135deg, #228B22 0%, #006400 100%); padding: 15px;">
                        <div class="media static-top-widget">
                            <div class="icons-widgets" style="margin-right: 10px;">
                                <i class="fa fa-cube" style="color: #fff; font-size: 2rem;"></i>
                            </div>
                            <div class="media-body">
                                <span
                                    style="color: rgba(255,255,255,0.9); font-size: 0.8rem; display: block;">Products</span>
                                <h5 style="color: #fff; font-weight: 700; font-size: 1.4rem; margin: 3px 0 0 0;">
                                    <?php echo count($products); ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-6 d-lg-none mb-3">
                <div class="card o-hidden widget-cards modern-gradient-card"
                    style="border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 3px 10px rgba(70, 130, 180, 0.2);">
                    <div class="card-body"
                        style="background: linear-gradient(135deg, #4682B4 0%, #1E90FF 100%); padding: 15px;">
                        <div class="media static-top-widget">
                            <div class="icons-widgets" style="margin-right: 10px;">
                                <i class="fa fa-folder" style="color: #fff; font-size: 2rem;"></i>
                            </div>
                            <div class="media-body">
                                <span
                                    style="color: rgba(255,255,255,0.9); font-size: 0.8rem; display: block;">Categories</span>
                                <h5 style="color: #fff; font-weight: 700; font-size: 1.4rem; margin: 3px 0 0 0;">
                                    <?php echo count($categories); ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-6 d-lg-none mb-3">
                <div class="card o-hidden widget-cards modern-gradient-card"
                    style="border: none; border-radius: 12px; overflow: hidden; box-shadow: 0 3px 10px rgba(138, 43, 226, 0.2);">
                    <div class="card-body"
                        style="background: linear-gradient(135deg, #8A2BE2 0%, #4B0082 100%); padding: 15px;">
                        <div class="media static-top-widget">
                            <div class="icons-widgets" style="margin-right: 10px;">
                                <i class="fa fa-users" style="color: #fff; font-size: 2rem;"></i>
                            </div>
                            <div class="media-body">
                                <span
                                    style="color: rgba(255,255,255,0.9); font-size: 0.8rem; display: block;">Users</span>
                                <h5 style="color: #fff; font-weight: 700; font-size: 1.4rem; margin: 3px 0 0 0;">
                                    <?php echo count($users); ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Desktop: Latest Orders Table (Desktop Only) -->
            <div class="col-xl-12 xl-100 d-none d-lg-block">
                <div class="card" style="border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div class="card-header"
                        style="background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%); border-radius: 15px 15px 0 0; padding: 15px 20px;">
                        <h5 style="color: #fff; margin: 0; font-weight: 600;">Latest Orders</h5>
                    </div>
                    <div class="card-body" style="padding: 20px;">
                        <div class="row">
                            <?php if (!empty($latest_orders)): ?>
                                <?php foreach ($latest_orders as $order): ?>
                                    <?php
                                    $first_name = isset($order->first_name) ? $order->first_name : '';
                                    $last_name = isset($order->last_name) ? $order->last_name : '';
                                    $username = isset($order->username) ? $order->username : 'Guest/Deleted-User';

                                    if (!empty($first_name) || !empty($last_name)) {
                                        $customer_name = trim($first_name . ' ' . $last_name);
                                    } else {
                                        $customer_name = $username;
                                    }

                                    $order_number = $order->order_number ?? '';
                                    $tot_amount = $order->tot_amount ?? 0;
                                    $payment_mode = $order->payment_mode ?? 'Unknown';
                                    $order_products = isset($order->order_product) ? $order->order_product : (isset($order->products) ? $order->products : []);

                                    // Status colors
                                    $status_colors = [
                                        1 => ['bg' => '#ffc107', 'text' => 'Pending'],
                                        2 => ['bg' => '#17a2b8', 'text' => 'Confirmed'],
                                        3 => ['bg' => '#007bff', 'text' => 'Shipped'],
                                        4 => ['bg' => '#28a745', 'text' => 'Delivered'],
                                        0 => ['bg' => '#dc3545', 'text' => 'Cancelled']
                                    ];

                                    // Check cancellation details
                                    if ($order->status == 0) {
                                        $cancelled_by = isset($order->cancelled_by) ? $order->cancelled_by : 'Unknown';
                                        $reason = isset($order->cancel_reason) ? $order->cancel_reason : (isset($order->cancellation_reason) ? $order->cancellation_reason : (isset($order->reason) ? $order->reason : ''));

                                        if ($reason) {
                                            $reason = htmlspecialchars($reason);
                                            $reason_short = $reason; // Show full reason
                                        } else {
                                            $reason_short = '';
                                        }

                                        if ($cancelled_by == 'user') {
                                            $status_colors[0]['text'] = 'Cancelled by User';
                                        } elseif ($cancelled_by == 'admin') {
                                            $status_colors[0]['text'] = 'Cancelled by Admin';
                                        }
                                    }

                                    $status_info = $status_colors[$order->status] ?? $status_colors[1];
                                    ?>
                                    <div class="col-xl-6 col-lg-12 col-md-12 mb-4">
                                        <div class="order-card-modern"
                                            style="background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 20px; transition: transform 0.3s, box-shadow 0.3s;"
                                            onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.15)';"
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.1)';">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div>
                                                    <a href="<?= base_url('admin/order_details/' . $order->id) ?>"
                                                        style="text-decoration: none;">
                                                        <h6
                                                            style="color: #D4AF37; font-weight: 700; margin: 0; font-size: 1.1rem;">
                                                            <?= htmlspecialchars($order_number); ?>
                                                        </h6>
                                                    </a>
                                                    <p style="color: #666; font-size: 0.85rem; margin: 5px 0 0 0;">
                                                        <?= htmlspecialchars($customer_name); ?>
                                                    </p>
                                                    <p style="color: #999; font-size: 0.8rem; margin: 2px 0;">
                                                        <?= date('d M Y, h:i A', strtotime($order->created_at)); ?>
                                                    </p>
                                                </div>
                                                <span class="badge"
                                                    style="background: <?= $status_info['bg'] ?>; color: #fff; padding: 6px 12px; border-radius: 20px; font-size: 0.75rem;">
                                                    <?= $status_info['text'] ?>
                                                </span>
                                            </div>

                                            <?php if (!empty($order_products)): ?>
                                                <div class="product-images-row mb-3"
                                                    style="display: flex; gap: 8px; flex-wrap: wrap;">
                                                    <?php
                                                    $product_count = 0;
                                                    foreach ($order_products as $product):
                                                        if ($product_count >= 4)
                                                            break; // Show max 4 images
                                                        // Check both product_image and product_img1 fields
                                                        $product_img = isset($product->product_image) ? $product->product_image : (isset($product->product_img1) ? $product->product_img1 : '');
                                                        if (!empty($product_img)):
                                                            ?>
                                                            <div class="product-image-thumb" style="position: relative; cursor: pointer;"
                                                                onclick="openImageModal('<?= base_url('upload/productimg/' . $product_img) ?>', '<?= htmlspecialchars($product->product_name ?? 'Product') ?>')">
                                                                <img src="<?= base_url('upload/productimg/' . $product_img) ?>"
                                                                    alt="<?= htmlspecialchars($product->product_name ?? 'Product') ?>"
                                                                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 2px solid #e0e0e0; transition: transform 0.2s;"
                                                                    onmouseover="this.style.transform='scale(1.1)'; this.style.borderColor='#D4AF37';"
                                                                    onmouseout="this.style.transform='scale(1)'; this.style.borderColor='#e0e0e0';">
                                                                <?php if (isset($product->quantity) && $product->quantity > 1): ?>
                                                                    <span
                                                                        style="position: absolute; top: -5px; right: -5px; background: #D4AF37; color: #fff; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 0.7rem; font-weight: bold;"><?= $product->quantity ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <?php
                                                            $product_count++;
                                                        endif;
                                                    endforeach;
                                                    if (count($order_products) > 4): ?>
                                                        <div
                                                            style="width: 60px; height: 60px; border-radius: 8px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; color: #666; font-size: 0.8rem; font-weight: bold;">
                                                            +<?= count($order_products) - 4 ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3"
                                                style="border-top: 1px solid #e0e0e0;">
                                                <div>
                                                    <p style="color: #999; font-size: 0.85rem; margin: 0;">Total Amount</p>
                                                    <h5
                                                        style="color: #333; font-weight: 700; margin: 5px 0 0 0; font-size: 1.3rem;">
                                                        ₹<?= number_format($tot_amount, 2) ?></h5>
                                                    <p style="color: #666; font-size: 0.8rem; margin: 5px 0 0 0;">
                                                        <?= htmlspecialchars($payment_mode); ?>
                                                    </p>
                                                </div>
                                                <div style="min-width: 140px;">
                                                    <select class="form-control status-change" data-id="<?= $order->id ?>"
                                                        style="width: 100%; font-size: 0.85rem; height: 38px; padding: 5px 10px; border-radius: 8px; border: 1px solid #ddd;">
                                                        <option value="1" <?= $order->status == 1 ? 'selected' : '' ?>>Pending
                                                        </option>
                                                        <option value="2" <?= $order->status == 2 ? 'selected' : '' ?>>Confirmed
                                                        </option>
                                                        <option value="3" <?= $order->status == 3 ? 'selected' : '' ?>>Shipped
                                                        </option>
                                                        <option value="4" <?= $order->status == 4 ? 'selected' : '' ?>>Delivered
                                                        </option>
                                                        <option value="0" <?= $order->status == 0 ? 'selected' : '' ?>>Cancelled
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="text-center p-5" style="background: #f8f9fa; border-radius: 12px;">
                                        <i class="fa fa-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                        <p style="color: #999; margin-top: 15px;">No recent orders found.</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="text-center mt-4">
                            <a href="<?= site_url('Admin/order_list') ?>" class="btn"
                                style="background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%); color: #fff; border: none; padding: 10px 30px; border-radius: 25px; font-weight: 600; box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);">
                                View All Orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Modal -->
            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content" style="border-radius: 15px; border: none;">
                        <div class="modal-header"
                            style="background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%); border-radius: 15px 15px 0 0; border: none;">
                            <h5 class="modal-title" id="imageModalLabel" style="color: #fff; font-weight: 600;">Product
                                Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="color: #fff; opacity: 1;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center" style="padding: 30px;">
                            <img id="modalImage" src="" alt="Product Image"
                                style="max-width: 100%; max-height: 500px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function openImageModal(imageSrc, productName) {
                    $('#modalImage').attr('src', imageSrc);
                    $('#modalImage').attr('alt', productName);
                    $('#imageModalLabel').text(productName);
                    $('#imageModal').modal('show');
                }
            </script>

            <div class="col-xl-6 col-md-6">
                <div class="card order-graph sales-carousel">
                    <div class="card-header">
                        <h6>Order Status Distribution</h6>
                        <div class="row">
                            <div class="col-12">
                                <div id="order-status-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Content managed by ApexChart -->
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card order-graph sales-carousel">
                    <div class="card-header">
                        <h6>Top Selling Products</h6>
                        <div class="row">
                            <div class="col-12">
                                <div id="top-products-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Content managed by ApexChart -->
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Sales</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="view-html fa fa-code"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body sell-graph" id="bar-chart">
                        <!-- <canvas></canvas>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head3" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>

                        </div> -->
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize Feather Icons
        if (typeof feather !== 'undefined') {
            feather.replace();
        }

        // --- Real Data from Controller ---
        var weeklySales = <?php echo json_encode($weekly_sales ?? []); ?>;
        var monthlySales = <?php echo json_encode($monthly_sales ?? []); ?>;
        var orderStatusCounts = <?php echo json_encode($order_status_counts ?? []); ?>;

        // --- 1. Monthly Sales Chart (Bar -> Area) ---
        // Prepare 12-month data window to show trends properly (fills gaps with 0)
        var monthsBack = 12;
        var monthlyLabels = [];
        var monthlyData = [];

        // Create a map for quick lookup: "2024-01" -> 1500
        var salesMap = {};
        if (monthlySales && Array.isArray(monthlySales)) {
            monthlySales.forEach(function (item) {
                salesMap[item.month_year] = parseFloat(item.total);
            });
        }

        // Generate last 12 months keys
        var today = new Date();
        for (var i = monthsBack - 1; i >= 0; i--) {
            // Correctly handle month subtraction
            var d = new Date(today.getFullYear(), today.getMonth() - i, 1);
            var month = (d.getMonth() + 1).toString().padStart(2, '0');
            var year = d.getFullYear();
            var key = year + '-' + month;

            monthlyLabels.push(key);
            // Use actual data or 0 if no sales for that month
            monthlyData.push(salesMap[key] || 0);
        }

        var monthlyOptions = {
            series: [{
                name: 'Sales',
                data: monthlyData
            }],
            chart: {
                type: 'area',
                height: 350,
                toolbar: { show: false },
                zoom: { enabled: false }
            },
            stroke: {
                curve: 'smooth',
                width: 3,
                colors: ['#D4AF37']
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.2,
                    stops: [0, 90, 100]
                }
            },
            colors: ['#D4AF37'],
            markers: {
                size: 5,
                colors: ["#D4AF37"],
                strokeColors: "#fff",
                strokeWidth: 2,
                hover: {
                    size: 7,
                }
            },
            dataLabels: { enabled: false },
            xaxis: {
                categories: monthlyLabels,
                title: { text: 'Month' }
            },
            title: {
                text: 'Monthly Sales Trend (Last 12 Months)',
                align: 'center',
                style: { fontSize: '16px', color: '#666' }
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "₹ " + val;
                    }
                }
            }
        };

        if (document.querySelector("#bar-chart")) {
            var monthlyChart = new ApexCharts(document.querySelector("#bar-chart"), monthlyOptions);
            monthlyChart.render();
        }


        var statusLabels = orderStatusCounts.map(function (item) {
            var statusNames = ["Placed", "Confirmed", "Shipped", "Out for Delivery", "Delivered", "Cancelled"];
            return statusNames[item.status] || "Unknown";
        });
        var statusData = orderStatusCounts.map(item => parseInt(item.count));

        var statusOptions = {
            series: statusData,
            chart: {
                type: 'donut',
                height: 350
            },
            labels: statusLabels,
            colors: ['#f3ba75', '#5a6268', '#007bff', '#17a2b8', '#28a745', '#dc3545'],
            title: {
                text: 'Order Status Distribution',
                align: 'center',
                style: { fontSize: '16px', color: '#666' }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: { width: 300 },
                    legend: { position: 'bottom' }
                }
            }]
        };

        if (document.querySelector("#order-status-chart")) {
            var statusChart = new ApexCharts(document.querySelector("#order-status-chart"), statusOptions);
            statusChart.render();
        }

        // --- 4. Weekly Sales & Profit Chart (Area) ---
        var weeklyLabels = weeklySales.map(item => item.date);
        var weeklyData = weeklySales.map(item => parseFloat(item.total));
        var profitData = weeklySales.map(item => parseFloat(item.profit)); // Simulated Profit

        var weeklyOptions = {
            series: [{
                name: 'Sales',
                data: weeklyData
            }, {
                name: 'Profit',
                data: profitData
            }],
            chart: {
                type: 'area',
                height: 350,
                zoom: { enabled: false }
            },
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth' },
            colors: ['#28a745', '#007bff'],
            xaxis: {
                categories: weeklyLabels,
                title: { text: 'Date' }
            },
            yaxis: {
                title: { text: 'Amount (₹)' }
            },
            title: {
                text: 'Weekly Sales & Profit (Last 7 Days)',
                align: 'center',
                style: { fontSize: '16px', color: '#666' }
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "₹ " + val.toFixed(2);
                    }
                }
            }
        };

        if (document.querySelector("#weekly-sales-chart")) {
            var weeklyChart = new ApexCharts(document.querySelector("#weekly-sales-chart"), weeklyOptions);
            weeklyChart.render();
        }

        // --- 5. Top Selling Products Chart (Pie) ---
        var topProducts = <?php echo json_encode($top_selling_products ?? []); ?>;
        var topProductLabels = topProducts.map(item => item.product_name);
        var topProductData = topProducts.map(item => parseInt(item.total_sold));

        var topProductOptions = {
            series: topProductData,
            chart: {
                type: 'pie',
                height: 350
            },
            labels: topProductLabels,
            title: {
                text: 'Top Selling Products',
                align: 'center',
                style: { fontSize: '16px', color: '#666' }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: { width: 300 },
                    legend: { position: 'bottom' }
                }
            }]
        };


        if (document.querySelector("#top-products-chart")) {
            var topProductChart = new ApexCharts(document.querySelector("#top-products-chart"), topProductOptions);
            topProductChart.render();
        } else if (document.querySelector("#simple-line-chart-sparkline-1")) {
            // Fallback to replace dummy chart if specific container missing
            document.querySelector("#simple-line-chart-sparkline-1").innerHTML = ""; // Clear flot placeholder
            var topProductChart = new ApexCharts(document.querySelector("#simple-line-chart-sparkline-1"), topProductOptions);
            topProductChart.render();
        }

        // Handle Status Change
        $(document).on('change', '.status-change', function () {
            var status = $(this).val();
            var order_id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('admin/update_order_status') ?>",
                type: "POST",
                data: {
                    order_id: order_id,
                    status: status
                },
                success: function (response) {
                    if (typeof Swal !== 'undefined') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                        Toast.fire({ icon: 'success', title: 'Order status updated successfully' });
                    } else {
                        alert('Order status updated successfully');
                    }
                },
                error: function (xhr, status, error) {
                    alert('Failed to update status');
                }
            });
        });
    });
</script>

<style>
    /* Responsive Dashboard Styles */
    @media (max-width: 1199px) {
        .col-xl-6.order-card-modern {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 991px) {
        .modern-gradient-card {
            margin-bottom: 15px;
        }

        .order-card-modern {
            padding: 15px !important;
        }

        .product-image-thumb img {
            width: 50px !important;
            height: 50px !important;
        }
    }

    @media (max-width: 767px) {
        .main-header-center {
            order: 2;
        }

        .mobile-sidebar {
            order: 1;
        }

        .nav-right {
            order: 3;
        }

        .order-card-modern {
            padding: 12px !important;
        }

        .order-card-modern h6 {
            font-size: 1rem !important;
        }

        .order-card-modern h5 {
            font-size: 1.1rem !important;
        }

        .product-images-row {
            gap: 6px !important;
        }

        .product-image-thumb img {
            width: 45px !important;
            height: 45px !important;
        }

        .status-change {
            font-size: 0.75rem !important;
            height: 32px !important;
        }
    }

    @media (max-width: 575px) {
        .modern-gradient-card .card-body {
            padding: 15px !important;
        }

        .modern-gradient-card h3 {
            font-size: 1.5rem !important;
        }

        .order-card-modern {
            padding: 10px !important;
        }

        .d-flex.justify-content-between.align-items-center {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 10px;
        }

        .status-change {
            width: 100% !important;
        }
    }

    /* Modal Responsive */
    @media (max-width: 767px) {
        .modal-dialog.modal-lg {
            max-width: 95%;
            margin: 10px auto;
        }

        #modalImage {
            max-height: 400px !important;
        }
    }

    /* Header Responsive */
    @media (max-width: 991px) {
        .main-header-right {
            flex-wrap: wrap;
        }

        .main-header-center {
            width: 100%;
            order: 2;
            margin: 10px 0;
        }

        .nav-right {
            width: 100%;
            order: 3;
            margin-top: 10px;
        }
    }

    /* Card Hover Effects */
    .modern-gradient-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .modern-gradient-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15) !important;
    }

    .order-card-modern:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15) !important;
    }

    /* Fix Feather Icons in Dashboard Cards */
    .dashboard-card-icon {
        display: inline-block !important;
        width: 40px !important;
        height: 40px !important;
        stroke: #fff !important;
        fill: none !important;
    }

    .dashboard-card-icon svg {
        width: 100% !important;
        height: 100% !important;
        display: block !important;
    }

    /* Ensure icons are visible */
    .icons-widgets i[data-feather] {
        display: inline-block !important;
        opacity: 1 !important;
    }

    .icons-widgets svg {
        display: block !important;
        width: 40px !important;
        height: 40px !important;
        stroke: #fff !important;
        fill: none !important;
        stroke-width: 2 !important;
    }

    /* Header Responsive Fixes */
    @media (min-width: 992px) {
        .main-header-center {
            display: none !important;
        }
    }

    @media (max-width: 991px) {
        .main-header-right {
            padding: 10px 15px;
        }

        .mobile-sidebar {
            order: 1;
        }

        .main-header-center {
            display: none !important;
        }

        .nav-right {
            order: 3;
        }



        /* Ensure notification bell is visible on mobile */
        .nav-right-mobile {
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
            align-items: center !important;
            position: relative !important;
        }

        .notification-bell-icon-mobile {
            display: block !important;
            visibility: visible !important;
            width: 28px !important;
            height: 28px !important;
            opacity: 1 !important;
            stroke: #333 !important;
            cursor: pointer !important;
        }

        .notification-bell-icon-mobile svg {
            display: block !important;
            visibility: visible !important;
            width: 28px !important;
            height: 28px !important;
            opacity: 1 !important;
            stroke: #333 !important;
        }

        /* Mobile notification dropdown */
        #admin-notification-dropdown-mobile {
            display: none !important;
            position: fixed !important;
            right: 15px !important;
            top: 70px !important;
            z-index: 9999 !important;
            max-width: calc(100vw - 30px) !important;
            width: 320px !important;
        }

        #admin-notification-dropdown-mobile.show {
            display: block !important;
        }

        .admin-notification-dropdown {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .notification-bell-icon {
            display: block !important;
            visibility: visible !important;
            width: 24px !important;
            height: 24px !important;
            opacity: 1 !important;
        }

        .admin-notification-dropdown i[data-feather] {
            display: block !important;
            visibility: visible !important;
            width: 24px !important;
            height: 24px !important;
            opacity: 1 !important;
        }

        .admin-notification-dropdown svg {
            display: block !important;
            visibility: visible !important;
            width: 24px !important;
            height: 24px !important;
            opacity: 1 !important;
            stroke: #333 !important;
        }



        .nav-right {
            display: flex !important;
            visibility: visible !important;
            flex: 0 0 auto !important;
        }

        .nav-menus {
            display: flex !important;
            align-items: center !important;
            width: auto !important;
        }
    }

    /* Fix for desktop sidebar overlap - OUTSIDE of mobile query */
    @media only screen and (min-width: 992px) {
        .page-body-wrapper .page-body {
            margin-left: 255px !important;
            width: calc(100% - 255px) !important;
            transition: all 0.3s ease;
        }

        .page-body-wrapper .footer {
            margin-left: 255px !important;
            width: calc(100% - 255px) !important;
            transition: all 0.3s ease;
        }

        /* If sidebar is closed */
        .page-body-wrapper.sidebar-close .page-body,
        .page-body-wrapper.sidebar-close .footer {
            margin-left: 0 !important;
            width: 100% !important;
        }
    }
</style>