<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/custom.css') ?>">
<div class="page-body">

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>
                            <a href="javascript:history.back()"
                                style="color: inherit; text-decoration: none; margin-right: 10px;">
                                <i data-feather="arrow-left"></i>
                            </a>
                            Product Detail

                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Physical</li>
                        <li class="breadcrumb-item active">Order Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="container">
                <div class="cart-title">
                    <h2>Order Details</h2>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-sm-12 col-xs-12">

                        <?php
                        if (!empty($order_products)):
                            foreach ($order_products as $product):
                                ?>
                                <div class="card cart-card mb-4">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <?php
                                            // Use product_image (aliased from product_img1) or fallback to product_img1
                                            $product_img = isset($product->product_image) ? $product->product_image : (isset($product->product_img1) ? $product->product_img1 : '');
                                            ?>
                                            <img src="<?= base_url('upload/productimg/' . $product_img) ?>"
                                                alt="<?= htmlspecialchars($product->product_name) ?>"
                                                class="img-fluid product-image img-curved"
                                                style="height: 200px; width: 400px; object-fit: cover;" />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h3 class="card-title"><?= htmlspecialchars($product->product_name) ?></h3>
                                                <div class="d-flex justify-content-between align-items-center flex-wrap pt-3">
                                                    <p>Qty : <?= $product->quantity ?> </p>
                                                    <?php if (!empty($product->variant_weight)): ?>
                                                        <p class="mx-3">Weight: <strong><?= $product->variant_weight ?></strong></p>
                                                    <?php endif; ?>
                                                    <?php if (!empty($product->namecake)): ?>
                                                        <p class="mx-3"><strong>Name on Cake:
                                                                <?= htmlspecialchars($product->namecake) ?></strong></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h4 class="card-text total-price"><strong>Price:
                                                            ₹<?= number_format($product->selling_price, 2) ?></strong>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        else:
                            ?>
                            <p>No products found for this order.</p>
                        <?php endif; ?>

                        <?php
                        // Determine Status Text
                        $status_text = 'Pending';
                        if ($order_list->status == 2)
                            $status_text = 'Confirmed';
                        elseif ($order_list->status == 3)
                            $status_text = 'Shipped';
                        elseif ($order_list->status == 4)
                            $status_text = 'Delivered';
                        elseif ($order_list->status == 0)
                            $status_text = 'Cancelled';

                        // Calculate Estimation (Date + 5 Days)
                        $order_date = strtotime($order_list->created_at);
                        $estimate_date = date('l, d M Y', strtotime('+5 days', $order_date));
                        ?>
                        <div class="card delivary-status p-3 text-center m-3">
                            <h3><?= $status_text ?></h3>
                            <h6>Delivery Estimation: <span class="h6 theme-color"><?= $estimate_date ?></span></h6>
                        </div>

                        <div class="mt-5">
                            <div
                                class="steps d-flex flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">

                                <div
                                    class="step <?= ($order_list->status >= 2 && $order_list->status != 0) ? 'completed' : '' ?>">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa fa-shopping-bag order-tracking-fa"
                                                aria-hidden="true"></i></div>
                                    </div>
                                    <h4 class="step-title">Confirmed Order</h4>
                                </div>

                                <div
                                    class="step <?= ($order_list->status >= 2 && $order_list->status != 0) ? 'completed' : '' ?>">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa fa-archive order-tracking-fa"
                                                aria-hidden="true"></i></div>
                                    </div>
                                    <h4 class="step-title">Processing Order</h4>
                                </div>

                                <div
                                    class="step <?= ($order_list->status >= 3 && $order_list->status != 0) ? 'completed' : '' ?>">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa fa-truck order-tracking-fa"
                                                aria-hidden="true"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Dispatched</h4>
                                </div>

                                <div
                                    class="step <?= ($order_list->status == 4 && $order_list->status != 0) ? 'completed' : '' ?>">
                                    <div class="step-icon-wrap">
                                        <div class="step-icon"><i class="fa fa-home order-tracking-fa"
                                                aria-hidden="true"></i></div>
                                    </div>
                                    <h4 class="step-title">Product Delivered</h4>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-lg-5 col-sm-12 col-xs-12">
                        <div class="order-details">
                            <div class="title-box d-flex justify-content-between flex-wrap">
                                <p>Order Id: <?= $order_list->order_number ?></p>
                                <p>Order Date: <?= date('d M Y', strtotime($order_list->created_at)) ?></p>
                            </div>
                            <hr>
                            <div>
                                <h5>Shipping Address:</h5>
                                <?php if (isset($shipping_address) && $shipping_address): ?>
                                    <p>
                                        <strong><?= htmlspecialchars($shipping_address->fullname) ?></strong><br>
                                        <?= htmlspecialchars($shipping_address->address) ?><br>
                                        <?= htmlspecialchars($shipping_address->city_twn) ?>,
                                        <?= htmlspecialchars($shipping_address->pincode) ?><br>
                                        Phone: <?= htmlspecialchars($shipping_address->phone) ?>
                                    </p>
                                <?php else: ?>
                                    <p>No address found for this order.</p>
                                <?php endif; ?>
                            </div>
                            <hr>
                            <div>
                                <h5>Payment Method:</h5>
                                <p><?= $order_list->payment_mode ?></p>
                                <h5>Payment Status:</h5>
                                <p><?= $order_list->payment_status ?></p>
                            </div>
                            <?php if ($order_list->status == 0): ?>
                                <hr>
                                <div>
                                    <h5 class="text-danger">Cancellation Details:</h5>
                                    <p><strong>Cancelled By:</strong>
                                        <?= isset($order_list->cancelled_by) ? ucfirst($order_list->cancelled_by) : 'Unknown' ?>
                                    </p>
                                    <?php
                                    $reason = '';
                                    if (isset($order_list->cancel_reason))
                                        $reason = $order_list->cancel_reason;
                                    elseif (isset($order_list->cancellation_reason))
                                        $reason = $order_list->cancellation_reason;
                                    elseif (isset($order_list->reason))
                                        $reason = $order_list->reason;
                                    ?>
                                    <p><strong>Reason:</strong>
                                        <?= $reason ? htmlspecialchars($reason) : 'No reason provided' ?></p>
                                </div>
                            <?php endif; ?>
                            <hr>

                            <div>
                                <h5>Order Summary:</h5>
                                <div>
                                    <?php
                                    $subtotal_summary = 0;
                                    if (!empty($order_products)):
                                        foreach ($order_products as $product):
                                            $product_total = $product->selling_price * $product->quantity;
                                            $subtotal_summary += $product_total;
                                            ?>
                                            <div class="d-flex justify-content-between">
                                                <p><?= htmlspecialchars($product->product_name) ?> <b class="text-danger"> x</b>
                                                    <?= $product->quantity ?></p>
                                                <p style="font-weight: 800; color: #222; font-size: 1.05rem;">₹
                                                    <?= number_format($product_total, 2) ?></p>
                                            </div>
                                            <?php
                                        endforeach;
                                    endif;

                                    $discount_val = isset($order_list->discount_amount) ? $order_list->discount_amount : 0;
                                    ?>

                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <p>Delivery Charges:</p>
                                        <p style="font-weight: 800; color: #222; font-size: 1.05rem;">₹
                                            <?= number_format($order_list->delivery_charge, 2) ?></p>
                                    </div>
                                    <?php if ($discount_val > 0): ?>
                                        <div class="d-flex justify-content-between text-success">
                                            <p>Discount Applied
                                                (<?= isset($order_list->coupon_code) ? $order_list->coupon_code : '' ?>):
                                            </p>
                                            <p style="font-weight: 800; color: #28a745; font-size: 1.05rem;">- ₹
                                                <?= number_format($discount_val, 2) ?></p>
                                        </div>
                                    <?php endif; ?>

                                    <div class="d-flex justify-content-between">
                                        <p>Total before Tax:</p>
                                        <p style="font-weight: 800; color: #222; font-size: 1.05rem;">₹
                                            <?= number_format(($subtotal_summary + $order_list->delivery_charge) - $discount_val, 2) ?>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Tax:</p>
                                        <p style="font-weight: 800; color: #222; font-size: 1.05rem;">₹ 00.00</p>
                                    </div>
                                    <div class="d-flex justify-content-between"
                                        style="border-top: 1px solid #eee; padding-top: 10px; margin-top: 10px;">
                                        <p class="font-weight-bold" style="font-size: 1.1rem; color: #000;">Total:</p>
                                        <p class="font-weight-bold" style="font-size: 1.2rem; color: #000;">₹
                                            <?= number_format(($subtotal_summary + $order_list->delivery_charge) - $discount_val, 2) ?>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="total-price d-flex justify-content-between align-items-center"
                                    style="background: #f9f9f9; padding: 15px; border-radius: 10px;">
                                    <h4 style="margin: 0; color: #333;">Order Total:</h4>
                                    <p style="margin: 0; font-weight: 900; color: #D4AF37; font-size: 1.5rem;">
                                        ₹ <?= number_format($order_list->tot_amount) ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="text-center mt-4"><a href="<?php echo base_url('/'); ?>" class="btn btn-solid">Continue
                        Shopping</a></div>

            </div>
        </div>
    </div>
</div>