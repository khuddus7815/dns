<style>
    .booking-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        overflow: hidden;
        margin-bottom: 24px;
        background: #fff;
    }
    
    .booking-card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        transform: translateY(-2px);
    }
    
    .booking-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        color: #28a745;
    }
    
    .discount-badge {
        background: #ff6b6b;
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
        background: #f8f9fa;
        padding: 20px 24px;
        border-top: 2px solid #e9ecef;
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
        color: #28a745;
    }
    
    .summary-value.delivery {
        color: #007bff;
    }
    
    .final-total {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 16px 24px;
        border-radius: 8px;
        margin-top: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
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
        background: #d1ecf1;
        color: #0c5460;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }
    
    .empty-state-icon {
        font-size: 64px;
        color: #dee2e6;
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

    /* Mobile Responsive Adjustments - broader range */
    @media (max-width: 991px) {
        .booking-card {
            position: relative; /* Context for status badge */
            padding-top: 15px;
            overflow: visible !important; /* Allow badge to float */
        }

        /* Float Status Badge at Top Right - Outside Header */
        .status-badge {
            position: absolute;
            top: -10px; /* Float slightly above/on edge */
            right: 15px;
            z-index: 20; /* High z-index */
            padding: 5px 12px;
            font-size: 11px !important;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            background: #fff !important; /* White background for visibility */
            color: #333 !important; /* Dark text */
            border: 1px solid #eee;
        }
        
        /* If cancelled/specific status needs color, override via JS or specific CSS if possible, but white is safest for contrast */
        .status-badge.bg-danger { border-color: #dc3545; color: #dc3545 !important; }
        .status-badge.bg-success { border-color: #28a745; color: #28a745 !important; }
        .status-badge.bg-warning { border-color: #ffc107; color: #856404 !important; }
        .status-badge.bg-primary { border-color: #007bff; color: #007bff !important; }
        .status-badge.bg-info    { border-color: #17a2b8; color: #17a2b8 !important; }

        .booking-header {
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 5px;
            padding: 45px 15px 15px 15px !important; /* Top padding for badge */
        }
        
        .booking-header-left {
            width: 100%;
        }

        .booking-header-left h5 {
            font-size: 14px !important;
            word-break: break-all !important;
            margin-bottom: 5px;
            padding-right: 60px; /* Avoid bad overlap */
        }

        /* Pure Grid Layout for Product Item */
        .product-item {
            display: grid !important;
            grid-template-columns: 1fr auto; /* Qty left, Price right */
            gap: 5px 15px;
            padding: 15px !important;
        }
        
        .product-image {
            grid-column: 1 / -1;
            width: 120px !important; /* Reasonable size */
            height: 120px !important;
            object-fit: cover;
            margin: 0 auto 10px auto;
            border-radius: 8px;
        }
        
        /* Unwrap containers for Grid placement */
        .product-details, .product-pricing {
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

        /* Row 4: Qty (Left) - Price (Right) */
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
        
        /* Hide extra pricing info if crowded */
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
    .star-rating label:hover ~ label,
    .star-rating input:checked ~ label {
        background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23f39c12" stroke="%23f39c12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>');
    }
</style>

<section class="section-b-space margin-top">
    <div class="container">
        <div class="row">
            <?php $this->load->view('common/profile_sidebar', ['active_tab' => 'booking']); ?>

            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard" style="display:block;">
                        <div class="page-title text-center mb-4">
                            <h2 class="mb-2">My Bookings</h2>
                            <p class="text-muted">View all your order history and details</p>
                        </div>
                        
                        <div class="container-fluid px-0">
                            <?php if (!empty($orders)): ?>
                                <?php foreach ($orders as $order): ?>
                                    <?php 
                                        // Determine Status Text and Color (support both status 0 and 5 for cancelled)
                                        $status = isset($order->status) ? (int)$order->status : 0;
                                        $status_text = 'Pending';
                                        $status_class = 'bg-warning text-dark';
                                        $is_cancelled = false;
                                        $cancelled_by = isset($order->cancelled_by) ? $order->cancelled_by : null;
                                        
                                        if ($status == 1) {
                                            $status_text = 'Pending';
                                            $status_class = 'bg-warning text-dark';
                                        } elseif ($status == 2) {
                                            $status_text = 'Confirmed';
                                            $status_class = 'bg-primary text-white';
                                        } elseif ($status == 3) {
                                            $status_text = 'Shipped';
                                            $status_class = 'bg-info text-white';
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
                                        $refund_amount = isset($order->refund_amount) ? (float)$order->refund_amount : 0;
                                        
                                        // Payment mode styling
                                        $payment_class = strtolower($order->payment_mode) == 'razorpay' ? 'payment-razorpay' : 'payment-cod';
                                        $header_class = $is_cancelled ? 'booking-header cancelled' : 'booking-header';
                                    ?>
                                    
                                    <a href="<?= base_url('main/order_detail/' . $order->id) ?>" style="text-decoration: none; color: inherit; display: block;">
                                    <div class="booking-card" style="cursor: pointer;">
                                        <!-- Order Header -->
                                        <div class="<?= $header_class ?>">
                                            <div class="booking-header-left">
                                                <h5>Order #<?= htmlspecialchars($order->order_number); ?></h5>
                                                <div class="order-date">
                                                    <i class="fa fa-calendar"></i> <?= date('d M Y, h:i A', strtotime($order->created_at)) ?>
                                                </div>
                                                <span class="payment-badge <?= $payment_class ?>">
                                                    <i class="fa fa-<?= strtolower($order->payment_mode) == 'razorpay' ? 'credit-card' : 'money' ?>"></i> 
                                                    <?= htmlspecialchars($order->payment_mode) ?>
                                                </span>
                                            </div>
                                            <span class="status-badge <?= $status_class ?>"><?= $status_text ?></span>
                                        </div>
                                        
                                        <?php if ($is_cancelled && $is_refunded && $refund_amount > 0): ?>
                                        <div style="background: #d4edda; padding: 12px 24px; border-left: 4px solid #28a745;">
                                            <p style="margin: 0; color: #155724; font-size: 13px; font-weight: 600;">
                                                <i class="fa fa-check-circle"></i> Amount Refunded: ₹<?= number_format($refund_amount, 2) ?> credited to wallet
                                            </p>
                                        </div>
                                        <?php endif; ?>

                                        <!-- Products List -->
                                        <div class="product-list">
                                            <?php foreach ($order->products as $product): ?>
                                                <div class="product-item">
                                                    <img src="<?= base_url('upload/productimg/' . ($product->product_image ?: 'no-image.jpg')) ?>" 
                                                         alt="<?= htmlspecialchars($product->product_name) ?>" 
                                                         class="product-image"
                                                         onerror="this.src='<?= base_url('assets/images/no-image.jpg') ?>'">
                                                    
                                                    <div class="product-details">
                                                        <h6 class="product-name"><?= htmlspecialchars($product->product_name) ?></h6>
                                                        <?php if(!empty($product->variant_weight)): ?>
                                                            <div class="product-meta meta-weight">
                                                                <i class="fa fa-weight"></i> <?= htmlspecialchars($product->variant_weight) ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <!-- Qty Class Added -->
                                                        <div class="product-meta meta-qty">
                                                            <i class="fa fa-shopping-cart"></i> Qty: <strong><?= $product->quantity ?></strong>
                                                        </div>
                                                        
                                                        <?php if ($status == 4): // Delivered ?>
                                                            <div class="mt-3">
                                                                <?php if (isset($product->is_rated) && $product->is_rated): ?>
                                                                    <div class="alert alert-success py-1 px-2 mb-0" style="font-size: 12px; display: inline-block; border-radius: 4px;">
                                                                        <i class="fa fa-check-circle"></i> Already Rated. Thank you!
                                                                    </div>
                                                                <?php else: ?>
                                                                    <button type="button" class="btn btn-sm btn-solid rate-product-btn" 
                                                                            data-product-id="<?= $product->product_id ?>" 
                                                                            data-product-name="<?= htmlspecialchars($product->product_name) ?>"
                                                                            data-order-id="<?= $order->id ?>"
                                                                            style="padding: 5px 12px; font-size: 12px;">
                                                                        Rate & Feedback
                                                                    </button>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    
                                                    <div class="product-pricing">
                                                        <?php if ($product->discount_percent > 0): ?>
                                                            <div class="price-row">
                                                                <span class="original-price">₹<?= number_format($product->original_price * $product->quantity, 2) ?></span>
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

                                            <!-- Action Buttons -->
                                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3" style="border-top: 1px dashed #e9ecef;">
                                                <a href="<?= base_url('main/order_detail/' . $order->id) ?>" class="text-primary" style="font-weight: 600; font-size: 14px; text-decoration: none;">
                                                    View Details <i class="fa fa-arrow-right ml-1"></i>
                                                </a>
                                                
                                                <?php if ($status < 3 && !$is_cancelled): // Show Cancel only if not shipped (3) and not already cancelled ?>
                                                    <button type="button" class="btn btn-outline-danger btn-sm cancel-order-btn" 
                                                            data-id="<?= $order->id ?>" 
                                                            data-number="<?= $order->order_number ?>"
                                                            style="padding: 6px 16px; font-size: 13px; border-radius: 6px;">
                                                        Cancel Order
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    </a>

                                <?php endforeach; ?>
                            <?php else: ?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cancellation Modal -->
<div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 12px; border: none; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); color: white; border: none;">
                <h5 class="modal-title" id="cancelOrderModalLabel">Cancel Order #<span id="modalOrderNumber"></span></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="opacity: 1;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="cancelOrderForm">
                    <input type="hidden" id="cancelOrderId" name="order_id">
                    
                    <div class="form-group">
                        <label for="cancelReason" style="font-weight: 600; color: #444;">Reason for Cancellation <span class="text-danger">*</span></label>
                        <select class="form-control" id="cancelReason" name="reason" required style="height: 45px; border-radius: 8px;">
                            <option value="" disabled selected>Select a reason</option>
                            <option value="Changed Mind">Changed Mind</option>
                            <option value="Found Cheaper Elsewhere">Found Cheaper Elsewhere</option>
                            <option value="Ordered by Mistake">Ordered by Mistake</option>
                            <option value="Shipping Cost Too High">Shipping Cost Too High</option>
                            <option value="Item Delivery Time is Too Long">Item Delivery Time is Too Long</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group" id="feedbackGroup" style="display: none;">
                        <label for="cancelFeedback" style="font-weight: 600; color: #444;">Feedback / Suggestions <span class="text-danger" id="feedbackRequiredStar" style="display:none;">*</span></label>
                        <textarea class="form-control" id="cancelFeedback" name="feedback" rows="3" placeholder="Tell us more about why you are cancelling..." style="border-radius: 8px;"></textarea>
                        <small class="text-muted">Your feedback helps us improve our service.</small>
                    </div>

                    <div class="alert alert-warning mt-3 mb-0" style="font-size: 13px;">
                        <i class="fa fa-info-circle"></i> Once cancelled, this action cannot be undone.
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #f0f0f0; padding: 15px 20px;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 6px;">Close</button>
                <button type="button" class="btn btn-danger" id="confirmCancelBtn" style="border-radius: 6px; background: #dc3545;">Confirm Cancellation</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Prevent anchor tag click when clicking buttons inside card
        $('.booking-card button').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
        });

        // Open Modal
        $('.cancel-order-btn').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation(); // Explicitly stop propagation again
            
            var orderId = $(this).data('id');
            var orderNumber = $(this).data('number');
            
            $('#cancelOrderId').val(orderId);
            $('#modalOrderNumber').text(orderNumber);
            $('#cancelReason').val('');
            $('#cancelFeedback').val('');
            $('#feedbackGroup').hide();
            
            $('#cancelOrderModal').modal('show');
        });

        // Toggle Feedback Field
        $('#cancelReason').on('change', function() {
            var reason = $(this).val();
            if (reason) {
                $('#feedbackGroup').slideDown();
                
                if (reason === 'Other') {
                    $('#feedbackRequiredStar').show();
                    $('#cancelFeedback').prop('required', true);
                } else {
                    $('#feedbackRequiredStar').hide();
                    $('#cancelFeedback').prop('required', false);
                }
            } else {
                $('#feedbackGroup').slideUp();
            }
        });

        // Confirm Cancel
        $('#confirmCancelBtn').click(function() {
            var form = $('#cancelOrderForm');
            var valid = form[0].checkValidity();
            
            if (!valid) {
                form[0].reportValidity();
                return;
            }

            var orderId = $('#cancelOrderId').val();
            var reason = $('#cancelReason').val();
            var feedback = $('#cancelFeedback').val();
            
            $(this).prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Processing...');

            $.ajax({
                url: '<?= base_url("users/cancel_order") ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    order_id: orderId,
                    reason: reason,
                    feedback: feedback
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Order Cancelled',
                            text: response.message,
                            confirmButtonColor: '#3085d6',
                        }).then((result) => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message || 'Failed to cancel order'
                        });
                        $('#confirmCancelBtn').prop('disabled', false).text('Confirm Cancellation');
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong. Please try again.'
                    });
                    $('#confirmCancelBtn').prop('disabled', false).text('Confirm Cancellation');
                }
            });
        });
    });
</script>

<!-- Rating Modal -->
<div class="modal fade" id="rateProductModal" tabindex="-1" role="dialog" aria-labelledby="rateProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 12px; border: none; overflow: hidden;">
            <div class="modal-header" style="background: linear-gradient(135deg, #28a745 0%, #218838 100%); color: white; border: none;">
                <h5 class="modal-title" id="rateProductModalLabel">Rate Product</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="opacity: 1;">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                        <label style="font-weight: 600; color: #444; display: block; margin-bottom: 10px;">Select Rating</label>
                        <div class="star-rating justify-content-center">
                            <input type="radio" id="star5" name="rating" value="5" required /><label for="star5" title="5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                        </div>
                    </div>
                    
                    <div class="form-group mt-3">
                        <label for="rateReview" style="font-weight: 600; color: #444;">Your Feedback / Review</label>
                        <textarea class="form-control" id="rateReview" name="review" rows="3" placeholder="Tell us about your experience with this product..." style="border-radius: 8px;"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #f0f0f0; padding: 15px 20px;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 6px;">Close</button>
                <button type="button" class="btn btn-success" id="confirmRateBtn" style="border-radius: 6px; background: #28a745;">Submit Feedback</button>
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
            
            $('#rateProductModal').modal('show');
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
                        $('#rateProductModal').modal('hide');
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
