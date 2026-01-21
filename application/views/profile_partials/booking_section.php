<style>
    :root {
        --golden-primary: #b8860b;
        --golden-secondary: #d4af37;
        --golden-dark: #8b6914;
    }

    .booking-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        overflow: hidden;
        margin-bottom: 24px;
        background: #fff;
    }

    .booking-card:hover {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }

    .booking-header {
        background: linear-gradient(135deg, #d4af37 0%, #a67c00 100%);
        color: white;
        padding: 20px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .booking-header.cancelled {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    }

    .booking-header-left h5 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: white;
    }

    .booking-header-left .order-date {
        font-size: 13px;
        opacity: 0.9;
        margin-top: 4px;
        color: rgba(255, 255, 255, 0.9);
    }

    .status-badge {
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .product-item {
        padding: 20px 24px;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        align-items: center;
        gap: 16px;
        transition: background 0.2s;
    }

    .product-item:last-child {
        border-bottom: none;
    }

    .product-item:hover {
        background: #fafafa;
    }

    .product-image {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #f0f0f0;
        flex-shrink: 0;
    }

    .product-details {
        flex: 1;
        min-width: 0;
    }

    .product-name {
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0 0 8px 0;
        line-height: 1.4;
    }

    .product-meta {
        font-size: 13px;
        color: #6c757d;
        margin: 4px 0;
    }

    .product-pricing {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 6px;
        min-width: 140px;
    }

    .price-row {
        display: flex;
        align-items: center;
        gap: 8px;
        justify-content: flex-end;
    }

    .original-price {
        font-size: 14px;
        color: #6c757d;
        text-decoration: line-through;
    }

    .selling-price {
        font-size: 18px;
        font-weight: 700;
        color: var(--golden-primary);
    }

    .discount-badge {
        background: #d4af37;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 600;
    }

    .item-total {
        font-size: 15px;
        font-weight: 600;
        color: #2c3e50;
        margin-top: 4px;
    }

    .order-summary {
        background: #fdfbf7;
        padding: 20px 24px;
        border-top: 2px solid #f0f0f0;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        font-size: 14px;
    }

    .summary-row:not(:last-child) {
        border-bottom: 1px solid #e9ecef;
    }

    .summary-label {
        color: #6c757d;
        font-weight: 500;
    }

    .summary-value {
        color: #2c3e50;
        font-weight: 600;
    }

    .summary-value.discount {
        color: var(--golden-primary);
    }

    .summary-value.delivery {
        color: var(--golden-dark);
    }

    .final-total {
        background: linear-gradient(135deg, #d4af37 0%, #a67c00 100%);
        color: white;
        padding: 16px 24px;
        border-radius: 8px;
        margin-top: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 10px rgba(166, 124, 0, 0.2);
    }

    .final-total-label {
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .final-total-amount {
        font-size: 24px;
        font-weight: 700;
    }

    .payment-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        margin-top: 8px;
    }

    .payment-cod {
        background: #fff3cd;
        color: #856404;
    }

    .payment-razorpay {
        background: #e3f2fd;
        color: #0d47a1;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state-icon {
        font-size: 64px;
        color: #e0e0e0;
        margin-bottom: 20px;
    }

    .empty-state h4 {
        color: #6c757d;
        margin-bottom: 12px;
    }

    .empty-state p {
        color: #adb5bd;
        margin-bottom: 24px;
    }

    /* Custom status colors for golden theme */
    /* Custom status colors for golden theme */
    .bg-golden-primary {
        background-color: #b8860b !important;
        color: white;
    }

    .bg-golden-dark {
        background-color: #8b6914 !important;
        color: white;
    }

    /* Mobile Responsive Adjustments */
    @media (max-width: 991px) {
        .booking-card {
            position: relative;
            padding-top: 15px;
            overflow: visible !important;
        }

        .status-badge {
            position: absolute;
            top: 12px;
            right: 15px;
            z-index: 20;
            padding: 5px 12px;
            font-size: 11px !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            background: #fff !important;
            color: #333 !important;
            border: 1px solid #eee;
        }

        .status-badge.bg-danger {
            border-color: #dc3545;
            color: #dc3545 !important;
        }

        .status-badge.bg-success {
            border-color: #28a745;
            color: #28a745 !important;
        }

        .status-badge.bg-warning {
            border-color: #ffc107;
            color: #856404 !important;
        }

        .bg-golden-primary {
            border-color: #b8860b;
            color: #b8860b !important;
            background: #fff !important;
        }

        .booking-header {
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 5px;
            padding: 45px 15px 15px 15px !important;
        }

        .booking-header-left {
            width: 100%;
        }

        .booking-header.cancelled {
            background: linear-gradient(135deg, #ff4b2b 0%, #ff416c 100%) !important;
        }

        .booking-header-left h5 {
            font-size: 13px !important;
            /* Smaller to fit single line */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 5px;
            padding-right: 60px;
        }

        .product-item {
            display: grid !important;
            grid-template-columns: 1fr auto;
            gap: 5px 15px;
            padding: 15px !important;
        }

        .product-image {
            grid-column: 1 / -1;
            width: 120px !important;
            height: 120px !important;
            object-fit: cover;
            margin: 0 auto 10px auto;
            border-radius: 8px;
        }

        .product-details,
        .product-pricing {
            display: contents !important;
        }

        .product-name {
            grid-row: 2;
            grid-column: 1 / -1;
            font-size: 15px !important;
            font-weight: 600;
            margin-bottom: 2px;
            text-align: center;
        }

        .meta-weight {
            grid-row: 3;
            grid-column: 1 / -1;
            text-align: center;
            font-size: 13px !important;
            color: #777;
            margin-bottom: 5px;
        }

        .meta-qty {
            grid-row: 4;
            grid-column: 1;
            font-size: 14px !important;
            align-self: center;
        }

        .item-total {
            grid-row: 4;
            grid-column: 2;
            font-size: 16px !important;
            font-weight: 700;
            color: #28a745;
            text-align: right;
            border: none !important;
        }

        .price-row {
            display: none !important;
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
    .star-rating label:hover~label,
    .star-rating input:checked~label {
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23f39c12" stroke="%23f39c12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>');
    }
</style>

<div class="page-title text-center mb-4">
    <h2 class="mb-2">My Bookings</h2>
    <p class="text-muted">View all your order history and details</p>
</div>

<div class="container-fluid px-0">
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <?php
            // Determine Status Text and Color - GOLDEN THEME (support both status 0 and 5 for cancelled)
            $status = isset($order->status) ? (int) $order->status : 0;
            $status_text = 'Pending';
            $status_class = 'bg-warning text-dark';
            $is_cancelled = false;
            $cancelled_by = isset($order->cancelled_by) ? $order->cancelled_by : null;

            if ($status == 1) {
                $status_text = 'Pending';
                $status_class = 'bg-warning text-dark';
            } elseif ($status == 2) {
                $status_text = 'Confirmed';
                $status_class = 'bg-golden-primary'; // Replaced bg-primary
            } elseif ($status == 3) {
                $status_text = 'Shipped';
                $status_class = 'bg-info text-white'; // Kept info for now or change to golden-dark?
            } elseif ($status == 4) {
                $status_text = 'Delivered';
                $status_class = 'bg-success text-white';
            } elseif ($status == 0 || $status == 5) {
                $is_cancelled = true;
                if ($cancelled_by == 'admin') {
                    $status_text = 'Order Cancelled by Admin';
                } else {
                    $status_text = 'Cancelled';
                }
                $status_class = 'bg-danger text-white';
            }

            // Check if refund was processed
            $is_refunded = isset($order->refund_status) && $order->refund_status == 'completed';
            $refund_amount = isset($order->refund_amount) ? (float) $order->refund_amount : 0;

            // Payment mode styling
            $payment_class = strtolower($order->payment_mode) == 'razorpay' ? 'payment-razorpay' : 'payment-cod';
            $header_class = $is_cancelled ? 'booking-header cancelled' : 'booking-header';
            ?>

            <a href="<?= base_url('main/order_detail/' . $order->id) ?>"
                style="text-decoration: none; color: inherit; display: block;">
                <div class="booking-card" style="cursor: pointer;">
                    <!-- Order Header -->
                    <div class="<?= $header_class ?>">
                        <div class="booking-header-left">
                            <h5>Order #<?= htmlspecialchars($order->order_number); ?></h5>
                            <div class="order-date">
                                <i class="fa fa-calendar"></i> <?= date('d M Y, h:i A', strtotime($order->created_at)) ?>
                            </div>
                            <span class="payment-badge <?= $payment_class ?>">
                                <i
                                    class="fa fa-<?= strtolower($order->payment_mode) == 'razorpay' ? 'credit-card' : 'money' ?>"></i>
                                <?= htmlspecialchars($order->payment_mode) ?>
                            </span>
                        </div>
                        <span class="status-badge <?= $status_class ?>"><?= $status_text ?></span>
                    </div>

                    <?php if ($is_cancelled && $is_refunded && $refund_amount > 0): ?>
                        <div style="background: #d4edda; padding: 12px 24px; border-left: 4px solid #28a745;">
                            <p style="margin: 0; color: #155724; font-size: 13px; font-weight: 600;">
                                <i class="fa fa-check-circle"></i> Amount Refunded: ₹<?= number_format($refund_amount, 2) ?>
                                credited to wallet
                            </p>
                        </div>
                    <?php endif; ?>

                    <!-- Products List -->
                    <div class="product-list">
                        <?php foreach ($order->products as $product): ?>
                            <div class="product-item">
                                <img src="<?= base_url('upload/productimg/' . ($product->product_image ?: 'no-image.jpg')) ?>"
                                    alt="<?= htmlspecialchars($product->product_name) ?>" class="product-image"
                                    onerror="this.src='<?= base_url('assets/images/no-image.jpg') ?>'">

                                <div class="product-details">
                                    <h6 class="product-name"><?= htmlspecialchars($product->product_name) ?></h6>
                                    <?php if (!empty($product->variant_weight)): ?>
                                        <div class="product-meta meta-weight">
                                            <i class="fa fa-weight"></i> <?= htmlspecialchars($product->variant_weight) ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="product-meta meta-qty">
                                        <i class="fa fa-shopping-cart"></i> Quantity: <strong><?= $product->quantity ?></strong>
                                    </div>

                                    <?php if ($status == 4): // Delivered ?>
                                        <div class="mt-3">
                                            <?php if (isset($product->is_rated) && $product->is_rated): ?>
                                                <div class="alert alert-success py-1 px-2 mb-0"
                                                    style="font-size: 12px; display: inline-block; border-radius: 4px;">
                                                    <i class="fa fa-check-circle"></i> Already Rated. Thank you!
                                                </div>
                                            <?php else: ?>
                                                <button type="button" class="btn btn-sm btn-solid rate-product-btn"
                                                    data-product-id="<?= $product->product_id ?>"
                                                    data-product-name="<?= htmlspecialchars($product->product_name) ?>"
                                                    data-order-id="<?= $order->id ?>"
                                                    onclick="event.preventDefault(); event.stopPropagation(); openRateModal('<?= $product->product_id ?>', '<?= addslashes(htmlspecialchars($product->product_name)) ?>', '<?= $order->id ?>')"
                                                    style="padding: 5px 12px; font-size: 12px; background-color: var(--golden-primary); border-color: var(--golden-primary); color: white;">
                                                    Rate & Feedback
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="product-pricing">
                                    <?php if ($product->discount_percent > 0): ?>
                                        <div class="price-row">
                                            <span
                                                class="original-price">₹<?= number_format($product->original_price * $product->quantity, 2) ?></span>
                                            <span class="discount-badge"><?= $product->discount_percent ?>% OFF</span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="price-row">
                                        <span class="selling-price">₹<?= number_format($product->selling_price, 2) ?></span>
                                        <span class="text-muted small">per unit</span>
                                    </div>
                                    <div class="item-total">
                                        Total: ₹<?= number_format($product->item_total, 2) ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Order Summary -->
                    <div class="order-summary">
                        <div class="summary-row">
                            <span class="summary-label">Subtotal</span>
                            <span class="summary-value">₹<?= number_format($order->subtotal, 2) ?></span>
                        </div>

                        <?php if ($order->delivery_charge > 0): ?>
                            <div class="summary-row">
                                <span class="summary-label">
                                    <i class="fa fa-truck"></i> Delivery Charges
                                </span>
                                <span class="summary-value delivery">₹<?= number_format($order->delivery_charge, 2) ?></span>
                            </div>
                        <?php else: ?>
                            <div class="summary-row">
                                <span class="summary-label">
                                    <i class="fa fa-truck"></i> Delivery Charges
                                </span>
                                <span class="summary-value delivery text-success">FREE</span>
                            </div>
                        <?php endif; ?>

                        <?php if ($order->discount_amount > 0): ?>
                            <div class="summary-row">
                                <span class="summary-label">
                                    <i class="fa fa-tag"></i> Discount
                                    <?php if ($order->coupon_code): ?>
                                        <span class="badge bg-info ms-2"><?= htmlspecialchars($order->coupon_code) ?></span>
                                    <?php endif; ?>
                                </span>
                                <span class="summary-value discount">- ₹<?= number_format($order->discount_amount, 2) ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="final-total">
                            <span class="final-total-label">Total Amount</span>
                            <span class="final-total-amount">₹<?= number_format($order->tot_amount, 2) ?></span>
                        </div>

                        <?php if ($status < 3 && !$is_cancelled): ?>
                            <div class="text-end mt-3">
                                <button type="button" class="btn btn-outline-danger btn-sm cancel-order-btn"
                                    onclick="event.preventDefault(); event.stopPropagation(); openCancelModal('<?= $order->id ?>')">
                                    Cancel Order
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </a>

        <?php endforeach; ?>

        <?php if (!empty($orders)): ?>
            <!-- Cancellation Modal -->
            <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cancelOrderModalLabel">Cancel Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="cancelOrderForm">
                                <input type="hidden" id="cancelOrderId" name="order_id">
                                <div class="mb-3">
                                    <label for="cancelReason" class="form-label">Reason for Cancellation <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="cancelReason" name="reason" required
                                        onchange="toggleFeedback(this.value)">
                                        <option value="">Select a reason</option>
                                        <option value="Changed my mind">Changed my mind</option>
                                        <option value="Ordered by mistake">Ordered by mistake</option>
                                        <option value="Found a better price">Found a better price</option>
                                        <option value="Delivery time is too long">Delivery time is too long</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="mb-3 d-none" id="feedbackContainer">
                                    <label for="cancelFeedback" class="form-label">Feedback / Suggestions <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="cancelFeedback" name="feedback" rows="3"
                                        placeholder="Please share your feedback so we can improve..."></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" onclick="submitCancellation()">Confirm
                                Cancellation</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function toggleFeedback(value) {
                    const feedbackContainer = document.getElementById('feedbackContainer');
                    const feedbackInput = document.getElementById('cancelFeedback');

                    if (value === 'Other') {
                        feedbackContainer.classList.remove('d-none');
                        feedbackInput.setAttribute('required', 'required');
                    } else {
                        feedbackContainer.classList.add('d-none');
                        feedbackInput.removeAttribute('required');
                    }
                }

                function openCancelModal(orderId) {
                    document.getElementById('cancelOrderId').value = orderId;
                    document.getElementById('cancelReason').value = '';
                    document.getElementById('cancelFeedback').value = '';
                    document.getElementById('feedbackContainer').classList.add('d-none');

                    var myModal = new bootstrap.Modal(document.getElementById('cancelOrderModal'));
                    myModal.show();
                }

                function submitCancellation() {
                    const orderId = document.getElementById('cancelOrderId').value;
                    const reason = document.getElementById('cancelReason').value;
                    const feedback = document.getElementById('cancelFeedback').value;

                    if (!reason) {
                        Swal.fire('Error', 'Please select a reason for cancellation', 'error');
                        return;
                    }

                    if (reason === 'Other' && !feedback.trim()) {
                        Swal.fire('Error', 'Please provide feedback/suggestions', 'error');
                        return;
                    }

                    $.ajax({
                        url: '<?= base_url("users/cancel_order") ?>',
                        type: 'POST',
                        data: {
                            order_id: orderId,
                            reason: reason,
                            feedback: feedback
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Cancelled!',
                                    text: response.message,
                                    icon: 'success'
                                }).then(() => {
                                    if (typeof loadProfileSection === 'function') {
                                        loadProfileSection('booking');
                                    } else {
                                        location.reload();
                                    }
                                    var modalEl = document.getElementById('cancelOrderModal');
                                    var modal = bootstrap.Modal.getInstance(modalEl);
                                    if (modal) modal.hide();
                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();
                                });
                            } else {
                                Swal.fire('Error', response.message, 'error');
                            }
                        },
                        error: function (xhr, status, error) {
                            var errorMsg = 'Something went wrong. Please try again.';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMsg = xhr.responseJSON.message;
                            } else if (xhr.responseText) {
                                console.error("Server Error:", xhr.responseText);
                            }
                            Swal.fire('Error', errorMsg, 'error');
                        }
                    });
                }
            </script>
        <?php endif; ?>

        <!-- Rating Modal -->
        <div class="modal fade" id="rateProductModal" tabindex="-1" role="dialog" aria-labelledby="rateProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius: 12px; border: none; overflow: hidden;">
                    <div class="modal-header"
                        style="background: linear-gradient(135deg, #28a745 0%, #218838 100%); color: white; border: none;">
                        <h5 class="modal-title" id="rateProductModalLabel">Rate Product</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form id="rateProductForm">
                            <input type="hidden" id="rateProductId" name="product_id">
                            <input type="hidden" id="rateOrderId" name="order_id">

                            <div class="text-center mb-4">
                                <h6 id="rateProductDisplayName" style="color: #2c3e50; font-weight: 600;"></h6>
                                <p class="text-muted small">Your feedback helps us improve!</p>
                            </div>

                            <div class="form-group text-center">
                                <label style="font-weight: 600; color: #444; display: block; margin-bottom: 10px;">Select
                                    Rating</label>
                                <div class="star-rating justify-content-center">
                                    <input type="radio" id="mstar5" name="rating" value="5" required /><label for="mstar5"
                                        title="5 stars"></label>
                                    <input type="radio" id="mstar4" name="rating" value="4" /><label for="mstar4"
                                        title="4 stars"></label>
                                    <input type="radio" id="mstar3" name="rating" value="3" /><label for="mstar3"
                                        title="3 stars"></label>
                                    <input type="radio" id="mstar2" name="rating" value="2" /><label for="mstar2"
                                        title="2 stars"></label>
                                    <input type="radio" id="mstar1" name="rating" value="1" /><label for="mstar1"
                                        title="1 star"></label>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="rateReview" style="font-weight: 600; color: #444;">Your Feedback /
                                    Review</label>
                                <textarea class="form-control" id="rateReview" name="review" rows="3"
                                    placeholder="Tell us about your experience with this product..."
                                    style="border-radius: 8px;"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #f0f0f0; padding: 15px 20px;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            style="border-radius: 6px;">Close</button>
                        <button type="button" class="btn btn-success" id="confirmRateBtn" onclick="submitRating()"
                            style="border-radius: 6px; background: #28a745;">Submit Feedback</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openRateModal(productId, productName, orderId) {
                $('#rateProductId').val(productId);
                $('#rateOrderId').val(orderId);
                $('#rateProductDisplayName').text(productName);
                $('#rateProductForm')[0].reset();

                var myModal = new bootstrap.Modal(document.getElementById('rateProductModal'));
                myModal.show();
            }

            function submitRating() {
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
                var $btn = $('#confirmRateBtn');

                $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Submitting...');

                $.ajax({
                    url: '<?= base_url("main/submit_review") ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thank You!',
                                text: response.message,
                                confirmButtonColor: '#28a745',
                            }).then((result) => {
                                if (typeof loadProfileSection === 'function') {
                                    loadProfileSection('booking');
                                } else {
                                    location.reload();
                                }
                            });
                            var modalEl = document.getElementById('rateProductModal');
                            var modal = bootstrap.Modal.getInstance(modalEl);
                            if (modal) modal.hide();
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Failed to submit review'
                            });
                            $btn.prop('disabled', false).text('Submit Feedback');
                        }
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong. Please try again.'
                        });
                        $btn.prop('disabled', false).text('Submit Feedback');
                    }
                });
            }
        </script>
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fa fa-shopping-bag"></i>
            </div>
            <h4>No Orders Yet</h4>
            <p>You haven't placed any orders. Start shopping to see your orders here!</p>
            <a href="<?= base_url() ?>" class="btn btn-solid">
                <i class="fa fa-shopping-cart"></i> Start Shopping
            </a>
        </div>
    <?php endif; ?>
</div>