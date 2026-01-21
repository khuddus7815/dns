<style>
    /* Modern Order Detail Page Styling */
    .order-detail-header {
        background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        color: white;
        box-shadow: 0 8px 30px rgba(243, 186, 117, 0.3);
    }

    .order-detail-header.cancelled {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        box-shadow: 0 8px 30px rgba(220, 53, 69, 0.3);
    }

    .order-detail-header h2 {
        color: white;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .order-detail-header p {
        color: rgba(255, 255, 255, 0.95);
        margin-bottom: 5px;
        font-size: 1rem;
    }

    .modern-order-product-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 20px;
        border: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        margin-bottom: 25px;
        padding: 25px;
    }

    .modern-order-product-card:hover {
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }

    .modern-order-product-row {
        display: flex;
        align-items: flex-start;
        gap: 25px;
    }

    .modern-order-img-wrapper {
        width: 200px;
        height: 200px;
        border-radius: 15px;
        overflow: hidden;
        background: #fff;
        padding: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        flex-shrink: 0;
    }

    .modern-order-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .modern-order-product-card:hover .modern-order-img-wrapper img {
        transform: scale(1.05);
    }

    .modern-order-details {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .modern-order-product-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .modern-order-info-row {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }

    .modern-order-info-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 1rem;
        color: #6c757d;
    }

    .modern-order-info-item strong {
        color: #2c3e50;
        font-weight: 600;
    }

    .modern-order-price-section {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #e9ecef;
    }

    .modern-order-price-display {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .modern-order-original-price {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .modern-order-original-price-text {
        color: #999;
        font-size: 1.3rem;
        font-weight: 500;
        text-decoration: line-through;
    }

    .modern-order-selling-price {
        color: #000000;
        font-size: 2rem;
        font-weight: 700;
        margin-top: 5px;
    }

    .modern-order-discount-badge {
        background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
        color: #fff;
        padding: 6px 16px;
        border-radius: 15px;
        font-weight: 700;
        font-size: 0.9rem;
        box-shadow: 0 3px 10px rgba(243, 186, 117, 0.4);
        display: inline-block;
        margin-left: 10px;
    }

    .modern-order-item-total {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 2px dashed #dee2e6;
    }

    .modern-order-item-total-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modern-order-item-total-label {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .modern-order-item-total-amount {
        font-size: 1.5rem;
        font-weight: 700;
        color: #f3ba75;
    }

    .modern-order-savings {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 8px;
        padding: 8px 12px;
        background: #d4edda;
        border-radius: 8px;
    }

    .modern-order-savings-text {
        color: #155724;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .modern-order-savings-amount {
        color: #155724;
        font-size: 1rem;
        font-weight: 700;
    }

    .modern-order-summary-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 20px;
        border: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 30px;
        position: sticky;
        top: 20px;
    }

    .modern-order-summary-header {
        border-bottom: 3px solid #f3ba75;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }

    .modern-order-summary-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .modern-order-summary-info {
        display: flex;
        flex-direction: column;
        gap: 8px;
        font-size: 0.95rem;
        color: #6c757d;
    }

    .modern-order-summary-section {
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e9ecef;
    }

    .modern-order-summary-section:last-child {
        border-bottom: none;
    }

    .modern-order-summary-section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 12px;
    }

    .modern-order-summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        font-size: 1rem;
    }

    .modern-order-summary-label {
        color: #6c757d;
    }

    .modern-order-summary-value {
        font-weight: 600;
        color: #2c3e50;
    }

    .modern-order-summary-total {
        background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
        border-radius: 15px;
        padding: 20px;
        margin-top: 20px;
    }

    .modern-order-summary-total-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modern-order-summary-total-label {
        font-size: 1.3rem;
        font-weight: 700;
        color: white;
    }

    .modern-order-summary-total-amount {
        font-size: 2rem;
        font-weight: 700;
        color: white;
    }

    .modern-order-status-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 20px;
        border: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 25px;
        margin-bottom: 30px;
    }

    .modern-order-status-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .modern-order-status-left {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .modern-order-status-right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        text-align: right;
    }

    .modern-order-status-badge {
        display: inline-block;
        padding: 12px 30px;
        border-radius: 50px;
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .modern-order-status-info {
        font-size: 0.95rem;
        color: #6c757d;
        margin-top: 5px;
    }

    .modern-order-status-right p {
        margin-bottom: 8px;
        font-size: 0.95rem;
        color: #2c3e50;
    }

    .modern-order-status-right strong {
        color: #6c757d;
        font-weight: 600;
    }

    .modern-order-payment-badge {
        background: rgba(243, 186, 117, 0.15);
        color: #856404;
        padding: 6px 14px;
        border-radius: 12px;
        font-size: 0.9rem;
        font-weight: 600;
        display: inline-block;
        margin-top: 5px;
    }

    .modern-order-status-pending {
        background: linear-gradient(135deg, #fff3cd 0%, #ffe69c 100%);
        color: #856404;
        border: 2px solid #ffc107;
    }

    .modern-order-status-confirmed {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        color: #0c5460;
        border: 2px solid #17a2b8;
    }

    .modern-order-status-paid {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
        border: 2px solid #28a745;
    }

    .modern-order-status-shipped {
        background: linear-gradient(135deg, #cce5ff 0%, #b3d9ff 100%);
        color: #004085;
        border: 2px solid #007bff;
    }

    .modern-order-status-delivered {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
        border: 2px solid #28a745;
    }

    .modern-order-status-cancelled {
        background: linear-gradient(135deg, #f8d7da 0%, #f1b0b7 100%);
        color: #721c24;
        border: 2px solid #f5c6cb;
    }

    .modern-order-date {
        color: #6c757d;
        font-size: 1rem;
        margin-top: 10px;
    }

    .modern-order-tracking {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 20px;
        border: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 30px;
        margin-top: 30px;
    }

    .steps {
        display: flex;
        justify-content: space-between;
        position: relative;
        padding: 20px 0;
    }

    .step {
        flex: 1;
        text-align: center;
        position: relative;
    }

    .step-icon-wrap {
        margin-bottom: 15px;
    }

    .step-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        transition: all 0.3s ease;
    }

    /* Completed steps (past) - golden colors */
    .step.completed .step-icon {
        background: linear-gradient(135deg, #fff3cd 0%, #ffe69c 100%);
        color: #856404;
        border: 3px solid #f3ba75;
        box-shadow: 0 4px 15px rgba(243, 186, 117, 0.3);
    }

    /* Current status step - golden border and bg */
    .step.current-status .step-icon {
        background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
        color: white;
        border: 3px solid #d4a574;
        box-shadow: 0 4px 20px rgba(243, 186, 117, 0.5);
    }

    /* Future steps (not reached) - light/no color */
    .step:not(.completed):not(.current-status) .step-icon {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: #adb5bd;
        border: 2px solid #dee2e6;
    }

    .step-icon i {
        font-size: 24px;
    }

    .step-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: #6c757d;
        margin-top: 10px;
    }

    .step.completed .step-title {
        color: #2c3e50;
    }

    @media (max-width: 768px) {
        .modern-order-product-row {
            flex-direction: column;
        }

        .modern-order-img-wrapper {
            width: 100%;
            height: 250px;
        }

        .modern-order-summary-card {
            position: relative;
            top: 0;
        }
    }

    /* Star Rating Styling */
    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        gap: 5px;
    }
    .star-rating input {
        display: none;
    }
    .star-rating label {
        cursor: pointer;
        width: 30px;
        height: 30px;
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="%23ccc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>');
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        transition: all 0.2s ease;
    }
    .star-rating label:hover,
    .star-rating label:hover ~ label,
    .star-rating input:checked ~ label {
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23f39c12" stroke="%23f39c12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>');
    }
</style>

<section class="cart-section section-b-space margin-top">
    <div class="container">
        <!-- Order Header -->
        <?php
        // Check if order is cancelled (support both status 0 and 5 for compatibility)
        $is_cancelled = (isset($order->status) && ((int) $order->status == 0 || (int) $order->status == 5));
        $header_class = $is_cancelled ? 'order-detail-header cancelled' : 'order-detail-header';
        ?>
        <div class="<?= $header_class ?>">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Order Details</h2>
                    <p><strong>Order Date:</strong> <?= date('d M Y, h:i A', strtotime($order->created_at)) ?></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p style="margin-bottom: 8px;"><strong>Order ID:</strong>
                        <?= htmlspecialchars($order->order_number) ?></p>
                    <p style="margin-bottom: 0;">
                        <strong>Payment Mode:</strong>
                        <span
                            style="background: rgba(255,255,255,0.2); padding: 4px 12px; border-radius: 12px; display: inline-block;">
                            <?= $order->payment_mode === 'COD' ? 'Cash On Delivery' : htmlspecialchars($order->payment_mode) ?>
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 col-sm-12 col-xs-12">
                <!-- Order Products List -->
                <?php if (!empty($order_products)): ?>
                    <?php foreach ($order_products as $product): ?>
                        <div class="modern-order-product-card">
                            <div class="modern-order-product-row">
                                <div class="modern-order-img-wrapper">
                                    <img src="<?= base_url('upload/productimg/' . $product->product_image) ?>"
                                        alt="<?= htmlspecialchars($product->product_name) ?>" />
                                </div>
                                <div class="modern-order-details">
                                    <div>
                                        <h3 class="modern-order-product-name"><?= htmlspecialchars($product->product_name) ?>
                                        </h3>

                                        <div class="modern-order-info-row">
                                            <div class="modern-order-info-item">
                                                <strong>Quantity:</strong> <?= $product->quantity ?>
                                            </div>
                                            <?php if (!empty($product->variant_weight)): ?>
                                                <div class="modern-order-info-item">
                                                    <strong>Weight:</strong> <?= htmlspecialchars($product->variant_weight) ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="modern-order-price-section">
                                            <div class="modern-order-price-display">
                                                <?php if ($product->original_price > $product->selling_price): ?>
                                                    <div class="modern-order-original-price">
                                                        <span class="modern-order-original-price-text">
                                                            ₹ <?= number_format($product->original_price, 2) ?>
                                                        </span>
                                                        <?php if ($product->discount_percent > 0): ?>
                                                            <span class="modern-order-discount-badge">
                                                                <?= $product->discount_percent ?>% OFF
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="modern-order-selling-price">
                                                    ₹ <?= number_format($product->selling_price, 2) ?>
                                                    <small style="font-size: 0.6em; color: #6c757d; font-weight: 400;">per
                                                        item</small>
                                                </div>
                                            </div>

                                            <div class="modern-order-item-total">
                                                <div class="modern-order-item-total-row">
                                                    <span class="modern-order-item-total-label">Item Total:</span>
                                                    <span class="modern-order-item-total-amount">₹
                                                        <?= number_format($product->item_total, 2) ?></span>
                                                </div>
                                                <?php if ($product->discount_amount > 0): ?>
                                                    <div class="modern-order-savings">
                                                        <span class="modern-order-savings-text">You saved:</span>
                                                        <span class="modern-order-savings-amount">₹
                                                            <?= number_format($product->discount_amount, 2) ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <?php if (isset($order->status) && (int)$order->status == 4): // Delivered ?>
                                                <div class="mt-4">
                                                    <?php if (isset($product->is_rated) && $product->is_rated): ?>
                                                        <div class="alert alert-success py-2 px-3 mb-0" style="font-size: 14px; display: inline-block; border-radius: 8px;">
                                                            <i class="fa fa-check-circle"></i> Already Rated. Thank you for your feedback!
                                                        </div>
                                                    <?php else: ?>
                                                        <button type="button" class="btn btn-solid rate-product-btn" 
                                                                data-product-id="<?= $product->product_id ?>" 
                                                                data-product-name="<?= htmlspecialchars($product->product_name) ?>"
                                                                data-order-id="<?= $order->id ?>"
                                                                style="background: linear-gradient(135deg, #28a745 0%, #218838 100%); border: none; color: white; padding: 10px 20px; font-weight: 600; border-radius: 10px;">
                                                            Rate & Feedback
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-warning">No products found for this order.</div>
                <?php endif; ?>

                <?php
                // Determine Status Logic (support both status 0 and 5 for cancelled)
                $status = isset($order->status) ? (int) $order->status : 0;
                $status_text = 'Pending';
                $status_class = 'modern-order-status-pending';
                $is_cancelled = false;
                $cancelled_by = isset($order->cancelled_by) ? $order->cancelled_by : null;

                if ($status == 1) {
                    $status_text = 'Confirmed';
                    $status_class = 'modern-order-status-confirmed';
                } elseif ($status == 2) {
                    $status_text = 'Paid';
                    $status_class = 'modern-order-status-paid';
                } elseif ($status == 3) {
                    $status_text = 'Shipped';
                    $status_class = 'modern-order-status-shipped';
                } elseif ($status == 4) {
                    $status_text = 'Delivered';
                    $status_class = 'modern-order-status-delivered';
                } elseif ($status == 0 || $status == 5) {
                    $is_cancelled = true;
                    if ($cancelled_by == 'admin') {
                        $status_text = 'Order Cancelled by Admin';
                    } else {
                        $status_text = 'Cancelled';
                    }
                    $status_class = 'modern-order-status-cancelled';
                }

                // Check if refund was processed
                $is_refunded = isset($order->refund_status) && $order->refund_status == 'completed';
                $refund_amount = isset($order->refund_amount) ? (float) $order->refund_amount : 0;
                ?>

                <!-- Cancelled Order Alert Removed -->

                <!-- Order Status Card -->
                <div class="modern-order-status-card">
                    <div class="modern-order-status-content">
                        <div class="modern-order-status-left">
                            <div class="modern-order-status-badge <?= $status_class ?>">
                                <?= $status_text ?>
                            </div>
                            <?php if ($is_cancelled && $is_refunded && $refund_amount > 0): ?>
                                <div class="modern-order-status-info"
                                    style="color: #28a745; font-weight: 600; margin-top: 8px;">
                                    <i class="fa fa-check-circle"></i> Amount Refunded:
                                    ₹<?= number_format($refund_amount, 2) ?> credited to wallet
                                </div>
                            <?php endif; ?>
                            <?php if (isset($order->created_at)): ?>
                                <div class="modern-order-status-info">
                                    Ordered on <?= date('d M Y', strtotime($order->created_at)) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="modern-order-status-right">
                            <p><strong>Order ID:</strong> <?= htmlspecialchars($order->order_number) ?></p>
                            <p style="margin-bottom: 0;">
                                <strong>Payment Mode:</strong>
                            </p>
                            <span class="modern-order-payment-badge">
                                <?= $order->payment_mode === 'COD' ? 'Cash On Delivery' : htmlspecialchars($order->payment_mode) ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Order Tracking Steps -->
                <?php if (!$is_cancelled): ?>
                    <div class="modern-order-tracking">
                        <h4 class="mb-4" style="font-weight: 700; color: #2c3e50;">Order Tracking</h4>
                        <div class="steps d-flex flex-sm-nowrap justify-content-between">
                            <?php
                            // Determine current status for highlighting
                            $current_status_class = '';
                            if ($status == 1) {
                                $current_status_class = 'current-status step-confirmed';
                            } elseif ($status == 2) {
                                $current_status_class = 'current-status step-paid';
                            } elseif ($status == 3) {
                                $current_status_class = 'current-status step-shipped';
                            } elseif ($status >= 4) {
                                $current_status_class = 'current-status step-delivered';
                            }
                            ?>
                            <!-- Confirmed Order (Status 1) -->
                            <div
                                class="step <?= $status >= 1 ? ($status == 1 ? $current_status_class : 'completed') : '' ?>">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                                </div>
                                <h4 class="step-title">Confirmed Order</h4>
                            </div>
                            <!-- Processing Order (Status 2 - Paid) -->
                            <div
                                class="step <?= $status >= 2 ? ($status == 2 ? $current_status_class : 'completed') : '' ?>">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="fa fa-archive" aria-hidden="true"></i></div>
                                </div>
                                <h4 class="step-title">Processing Order</h4>
                            </div>
                            <!-- Product Dispatched (Status 3 - Shipped) -->
                            <div
                                class="step <?= $status >= 3 ? ($status == 3 ? $current_status_class : 'completed') : '' ?>">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                                </div>
                                <h4 class="step-title">Product Dispatched</h4>
                            </div>
                            <!-- Product Delivered (Status 4) -->
                            <div
                                class="step <?= $status >= 4 ? ($status >= 4 ? $current_status_class : 'completed') : '' ?>">
                                <div class="step-icon-wrap">
                                    <div class="step-icon"><i class="fa fa-home" aria-hidden="true"></i></div>
                                </div>
                                <h4 class="step-title">Product Delivered</h4>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-5 col-sm-12 col-xs-12">
                <div class="modern-order-summary-card">
                    <div class="modern-order-summary-header">
                        <h3 class="modern-order-summary-title">Order Summary</h3>
                        <div class="modern-order-summary-info">
                            <p><strong>Order ID:</strong> <?= htmlspecialchars($order->order_number) ?></p>
                            <p><strong>Date:</strong> <?= date('d/m/Y', strtotime($order->created_at)) ?></p>
                        </div>
                    </div>

                    <div class="modern-order-summary-section">
                        <h5 class="modern-order-summary-section-title">Shipping Address</h5>
                        <p style="color: #6c757d; line-height: 1.6; margin-bottom: 0;">
                            <?= htmlspecialchars($address->address) ?><br>
                            <?php if (!empty($address->city_twn)): ?>
                                <?= htmlspecialchars($address->city_twn) ?><br>
                            <?php endif; ?>
                            <?php if (!empty($address->pincode)): ?>
                                PIN: <?= htmlspecialchars($address->pincode) ?>
                            <?php endif; ?>
                        </p>
                    </div>

                    <div class="modern-order-summary-section">
                        <h5 class="modern-order-summary-section-title">Payment Information</h5>
                        <?php if (isset($order->payment_status)): ?>
                            <div class="modern-order-summary-row">
                                <span class="modern-order-summary-label">Payment Status:</span>
                                <span
                                    class="modern-order-summary-value"><?= htmlspecialchars($order->payment_status) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="modern-order-summary-section">
                        <h5 class="modern-order-summary-section-title">Price Breakdown</h5>
                        <div class="modern-order-summary-row">
                            <span class="modern-order-summary-label">Subtotal (<?= count($order_products) ?>
                                item<?= count($order_products) > 1 ? 's' : '' ?>):</span>
                            <span class="modern-order-summary-value"><strong>₹
                                    <?= number_format($subtotal, 2) ?></strong></span>
                        </div>

                        <?php if ($delivery_charge > 0): ?>
                            <div class="modern-order-summary-row">
                                <span class="modern-order-summary-label">Delivery Charges:</span>
                                <span class="modern-order-summary-value"><strong>₹
                                        <?= number_format($delivery_charge, 2) ?></strong></span>
                            </div>
                        <?php endif; ?>

                        <?php if ($order_discount > 0): ?>
                            <div class="modern-order-summary-row">
                                <span class="modern-order-summary-label text-success">
                                    Discount<?php if ($coupon_code): ?>
                                        (<?= htmlspecialchars($coupon_code) ?>)<?php endif; ?>:
                                </span>
                                <span class="modern-order-summary-value text-success"><strong>- ₹
                                        <?= number_format($order_discount, 2) ?></strong></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="modern-order-summary-total">
                        <div class="modern-order-summary-total-row">
                            <span class="modern-order-summary-total-label">Total Amount:</span>
                            <span class="modern-order-summary-total-amount">₹
                                <?= number_format($final_total, 2) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4" style="display: flex; gap: 10px; justify-content: center;">
            <?php
            // Check if invoice exists for this order
            $CI =& get_instance();
            $CI->load->model('Invoice_model');
            $invoice = $CI->Invoice_model->get_invoice_by_order_id($order->id);
            if ($invoice):
                ?>
                <a href="<?php echo base_url('invoice/download/' . $order->id); ?>" class="btn btn-solid"
                    style="background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%); border: none; color: white; flex: 1; white-space: nowrap; padding: 12px 5px;">
                    <i class="fa fa-download"></i> Download Invoice
                </a>
            <?php endif; ?>
            <a href="<?php echo base_url('/'); ?>" class="btn btn-solid"
                style="flex: 1; white-space: nowrap; padding: 12px 5px;">Continue Shopping</a>
        </div>
    </div>
</section>

<!-- Rating Modal -->
<div class="modal fade" id="rateProductModal" tabindex="-1" role="dialog" aria-labelledby="rateProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px; border: none; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.2);">
            <div class="modal-header" style="background: linear-gradient(135deg, #28a745 0%, #218838 100%); color: white; border: none; padding: 20px 30px;">
                <h5 class="modal-title" id="rateProductModalLabel" style="font-weight: 700;">Rate This Product</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <form id="rateProductForm">
                    <input type="hidden" id="rateProductId" name="product_id">
                    <input type="hidden" id="rateOrderId" name="order_id">
                    
                    <div class="text-center mb-4">
                        <h4 id="rateProductDisplayName" style="color: #2c3e50; font-weight: 700; margin-bottom: 10px;"></h4>
                        <p class="text-muted">How was your experience with this item?</p>
                    </div>

                    <div class="form-group text-center mb-4">
                        <label style="font-weight: 700; color: #2c3e50; display: block; margin-bottom: 15px; font-size: 1.1rem;">Your Rating</label>
                        <div class="star-rating justify-content-center">
                            <input type="radio" id="stard5" name="rating" value="5" required /><label for="stard5" title="5 stars"></label>
                            <input type="radio" id="stard4" name="rating" value="4" /><label for="stard4" title="4 stars"></label>
                            <input type="radio" id="stard3" name="rating" value="3" /><label for="stard3" title="3 stars"></label>
                            <input type="radio" id="stard2" name="rating" value="2" /><label for="stard2" title="2 stars"></label>
                            <input type="radio" id="stard1" name="rating" value="1" /><label for="stard1" title="1 star"></label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="rateReview" style="font-weight: 700; color: #2c3e50; margin-bottom: 10px;">Review (Optional)</label>
                        <textarea class="form-control" id="rateReview" name="review" rows="4" placeholder="Tell others what you loved about this product..." style="border-radius: 12px; border: 2px solid #e9ecef; padding: 15px; transition: border-color 0.3s ease;"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #f0f0f0; padding: 20px 30px; background: #f8f9fa;">
                <button type="button" class="btn btn-link" data-bs-dismiss="modal" style="color: #6c757d; text-decoration: none; font-weight: 600;">Maybe Later</button>
                <button type="button" class="btn btn-success" id="confirmRateBtn" style="border-radius: 12px; background: #28a745; border: none; padding: 12px 30px; font-weight: 700; box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);">Submit Feedback</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Open Rating Modal
        $('.rate-product-btn').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            var productId = $(this).data('product-id');
            var productName = $(this).data('product-name');
            var orderId = $(this).data('order-id');
            
            $('#rateProductId').val(productId);
            $('#rateOrderId').val(orderId);
            $('#rateProductDisplayName').text(productName);
            $('#rateProductForm')[0].reset();
            
            var modalEl = document.getElementById('rateProductModal');
            var myModal = new bootstrap.Modal(modalEl);
            myModal.show();
        });

        // Submit Rating
        $('#confirmRateBtn').click(function() {
            var form = $('#rateProductForm');
            var valid = form[0].checkValidity();
            
            if (!valid) {
                if (!$('input[name="rating"]:checked').length) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Rating Required',
                        text: 'Please select a star rating'
                    });
                } else {
                    form[0].reportValidity();
                }
                return;
            }

            var formData = form.serialize();
            var $btn = $(this);
            
            $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Submitting...');

            $.ajax({
                url: '<?= base_url("main/submit_review") ?>',
                type: 'POST',
                dataType: 'json',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thank You!',
                            text: response.message,
                            confirmButtonColor: '#28a745',
                        }).then((result) => {
                            location.reload();
                        });
                        var modalEl = document.getElementById('rateProductModal');
                        var modal = bootstrap.Modal.getInstance(modalEl);
                        if (modal) modal.hide();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message || 'Failed to submit review'
                        });
                        $btn.prop('disabled', false).text('Submit Feedback');
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong. Please try again.'
                    });
                    $btn.prop('disabled', false).text('Submit Feedback');
                }
            });
        });
    });
</script>