<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>
                        <a href="javascript:void(0)" onclick="window.history.back()" style="color: inherit; text-decoration: none; margin-right: 5px; font-size: 1rem;"><i data-feather="arrow-left"></i></a>
                        Refund Management
                    </h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">Refund Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card o-hidden border-0"
                    style="border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div class="card-body"
                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 25px; border-radius: 15px;">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4 align-self-center text-center">
                                <i class="feather icon-rotate-ccw"
                                    style="font-size: 2.5rem; color: rgba(255,255,255,0.8);"></i>
                            </div>
                            <div class="media-body col-8">
                                <span class="m-0" style="color: rgba(255,255,255,0.9); font-size: 1rem;">Pending
                                    Refunds</span>
                                <h3 class="mb-0 counter" style="color: #fff; font-weight: 700; margin-top: 5px;">
                                    <?= $refund_stats['pending_count'] ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card o-hidden border-0"
                    style="border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div class="card-body"
                        style="background: linear-gradient(135deg, #228B22 0%, #006400 100%); padding: 25px; border-radius: 15px;">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4 align-self-center text-center">
                                <i class="feather icon-check-circle"
                                    style="font-size: 2.5rem; color: rgba(255,255,255,0.8);"></i>
                            </div>
                            <div class="media-body col-8">
                                <span class="m-0"
                                    style="color: rgba(255,255,255,0.9); font-size: 1rem;">Completed</span>
                                <h3 class="mb-0 counter" style="color: #fff; font-weight: 700; margin-top: 5px;">
                                    <?= $refund_stats['completed_count'] ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card o-hidden border-0"
                    style="border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div class="card-body"
                        style="background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%); padding: 25px; border-radius: 15px;">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4 align-self-center text-center">
                                <i class="fa fa-inr" style="font-size: 2.5rem; color: rgba(255,255,255,0.8);"></i>
                            </div>
                            <div class="media-body col-8">
                                <span class="m-0" style="color: rgba(255,255,255,0.9); font-size: 1rem;">Total
                                    Refunded</span>
                                <h3 class="mb-0" style="color: #fff; font-weight: 700; margin-top: 5px;">
                                    ₹<?= number_format($refund_stats['total_refunded'], 2) ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Refund Requests List -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                    <div class="card-header" style="border-bottom: 1px solid #f0f0f0;">
                        <h5 style="font-weight: 700;">Cancelled Orders - Refund Requests</h5>
                        <span class="text-muted">All cancelled orders that require refund processing</span>
                    </div>
                    <div class="card-body p-0">
                        <?php if (empty($refund_requests)): ?>
                            <div class="text-center p-5">
                                <i class="feather icon-inbox" style="font-size: 3rem; color: #ddd;"></i>
                                <p class="text-muted mt-3">No pending refund requests found.</p>
                            </div>
                        <?php else: ?>
                            <!-- Desktop Table View -->
                            <div class="table-responsive d-none d-lg-block p-3">
                                <table class="table table-hover" id="refundTable">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Customer</th>
                                            <th>Order Date</th>
                                            <th>Amount</th>
                                            <th>Payment</th>
                                            <th>Status</th>
                                            <th>Products</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($refund_requests as $order): ?>
                                            <tr>
                                                <td><a href="<?= base_url('admin/order_details/' . $order->id) ?>"
                                                        class="text-primary font-weight-bold">#<?= $order->order_number ?></a>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span
                                                            class="font-weight-bold"><?= htmlspecialchars($order->username) ?></span>
                                                        <small class="text-muted"><?= htmlspecialchars($order->email) ?></small>
                                                    </div>
                                                </td>
                                                <td><?= date('d M, Y', strtotime($order->created_at)) ?></td>
                                                <td><span
                                                        class="font-weight-bold text-dark">₹<?= number_format($order->tot_amount, 2) ?></span>
                                                </td>
                                                <td>
                                                    <?php
                                                    $payment_badges = ['COD' => 'badge-secondary', 'online' => 'badge-primary', 'razorpay' => 'badge-info', 'wallet' => 'badge-warning'];
                                                    $badge_class = $payment_badges[strtolower($order->payment_mode)] ?? 'badge-secondary';
                                                    ?>
                                                    <span
                                                        class="badge <?= $badge_class ?>"><?= strtoupper($order->payment_mode) ?></span>
                                                </td>
                                                <td>
                                                    <?php if (!empty($order->refund_status) && $order->refund_status == 'completed'): ?>
                                                        <span class="badge badge-success px-3 py-2"><i
                                                                class="feather icon-check mr-1"></i>Refunded</span>
                                                        <div class="mt-1"><small
                                                                class="text-muted">₹<?= number_format($order->refund_amount, 2) ?></small>
                                                        </div>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger px-3 py-2"><i
                                                                class="feather icon-clock mr-1"></i>Pending</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="product-images">
                                                        <?php
                                                        $displayed = 0;
                                                        foreach ($order->order_products as $product):
                                                            if ($displayed >= 2)
                                                                break;
                                                            $img_name = !empty($product->product_img1) ? $product->product_img1 : '';
                                                            $img_path = $img_name ? base_url('upload/productimg/' . $img_name) : base_url('assets/images/icon/no-image.png');
                                                            ?>
                                                            <img src="<?= $img_path ?>" class="rounded mr-1"
                                                                style="width: 35px; height: 35px; object-fit: cover; border: 1px solid #eee;">
                                                            <?php $displayed++; endforeach; ?>
                                                        <?php if (count($order->order_products) > 2): ?>
                                                            <span
                                                                class="badge badge-light border align-self-center">+<?= count($order->order_products) - 2 ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php if (empty($order->refund_status) || $order->refund_status != 'completed'): ?>
                                                        <button class="btn btn-sm btn-success shadow-sm" style="border-radius: 5px;"
                                                            onclick="initiateRefund(<?= $order->id ?>, <?= $order->user_id ?>, <?= $order->tot_amount ?>, '<?= addslashes($order->order_number) ?>')">
                                                            Refund
                                                        </button>
                                                    <?php else: ?>
                                                        <button class="btn btn-sm btn-light border" disabled>Done</button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Mobile Card View -->
                            <div class="d-lg-none px-3 pb-3">
                                <?php foreach ($refund_requests as $order): ?>
                                    <div class="card mb-3"
                                        style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow: hidden;">
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <div>
                                                    <a href="<?= base_url('admin/order_details/' . $order->id) ?>"
                                                        class="text-decoration-none">
                                                        <h6 class="mb-1" style="color: #667eea; font-weight: 700;">
                                                            #<?= $order->order_number ?></h6>
                                                    </a>
                                                    <div class="text-muted small">
                                                        <?= date('d M Y, h:i A', strtotime($order->created_at)) ?></div>
                                                </div>
                                                <?php if (!empty($order->refund_status) && $order->refund_status == 'completed'): ?>
                                                    <span class="badge badge-success"><i class="feather icon-check"></i> Done</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger"><i class="feather icon-clock"></i>
                                                        Pending</span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="d-flex align-items-center mb-3">
                                                <div class="product-images d-flex mr-3">
                                                    <?php
                                                    $displayed = 0;
                                                    foreach ($order->order_products as $product):
                                                        if ($displayed >= 3)
                                                            break;
                                                        $img_name = !empty($product->product_img1) ? $product->product_img1 : '';
                                                        $img_path = $img_name ? base_url('upload/productimg/' . $img_name) : base_url('assets/images/icon/no-image.png');
                                                        ?>
                                                        <img src="<?= $img_path ?>" class="rounded mr-1"
                                                            style="width: 40px; height: 40px; object-fit: cover; border: 1px solid #eee;">
                                                        <?php $displayed++; endforeach; ?>
                                                    <?php if (count($order->order_products) > 3): ?>
                                                        <span class="badge badge-light border align-self-center rounded-circle"
                                                            style="width: 25px; height: 25px; display: flex; align-items: center; justify-content: center;">+<?= count($order->order_products) - 3 ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-end"
                                                style="border-top: 1px dashed #eee; padding-top: 10px;">
                                                <div>
                                                    <small class="text-muted d-block text-uppercase"
                                                        style="font-size: 10px; letter-spacing: 0.5px;">Refund Amount</small>
                                                    <h5 class="mb-0 font-weight-bold text-dark">
                                                        ₹<?= number_format($order->tot_amount, 2) ?></h5>
                                                    <small class="text-muted"><?= $order->username ?></small>
                                                </div>

                                                <?php if (empty($order->refund_status) || $order->refund_status != 'completed'): ?>
                                                    <button class="btn btn-success"
                                                        style="border-radius: 8px; font-size: 0.9rem; padding: 8px 15px; box-shadow: 0 4px 6px rgba(40, 167, 69, 0.2);"
                                                        onclick="initiateRefund(<?= $order->id ?>, <?= $order->user_id ?>, <?= $order->tot_amount ?>, '<?= addslashes($order->order_number) ?>')">
                                                        <i class="feather icon-wallet mr-1"></i> Refund
                                                    </button>
                                                <?php else: ?>
                                                    <button class="btn btn-light border btn-sm" disabled>Processed</button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Refund Confirmation Modal -->
    <div class="modal fade" id="refundModal" tabindex="-1" role="dialog" aria-labelledby="refundModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="refundModalLabel">
                        <i class="icon-wallet text-success"></i> Initiate Refund
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="icon-info-alt"></i> The refund amount will be credited to the customer's wallet,
                        regardless of the original payment method (including online payments).
                    </div>

                    <form id="refundForm">
                        <input type="hidden" id="refund_order_id" name="order_id">
                        <input type="hidden" id="refund_user_id" name="user_id">

                        <div class="form-group">
                            <label>Order Number</label>
                            <input type="text" class="form-control" id="refund_order_number" readonly>
                        </div>

                        <div class="form-group">
                            <label>Refund Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">₹</span>
                                </div>
                                <input type="number" class="form-control" id="refund_amount" name="refund_amount"
                                    step="0.01" min="0" required>
                            </div>
                            <small class="text-muted">Enter the amount to be refunded to the wallet</small>
                        </div>

                        <div class="form-group">
                            <label>Refund Reason (Optional)</label>
                            <textarea class="form-control" id="refund_reason" name="refund_reason" rows="3"
                                placeholder="Enter reason for refund..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="processRefund()">
                        <i class="icon-check"></i> Confirm & Process Refund
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Initialize DataTable
        $(document).ready(function () {
            if ($('#refundTable').length) {
                $('#refundTable').DataTable({
                    "order": [[2, "desc"]], // Sort by date
                    "pageLength": 25,
                    "language": {
                        "search": "Search orders:"
                    }
                });
            }
        });

        // Initiate refund - show modal
        function initiateRefund(orderId, userId, amount, orderNumber) {
            $('#refund_order_id').val(orderId);
            $('#refund_user_id').val(userId);
            $('#refund_amount').val(amount);
            $('#refund_order_number').val(orderNumber);
            $('#refund_reason').val('');
            $('#refundModal').modal('show');
        }

        // Process refund
        function processRefund() {
            const orderId = $('#refund_order_id').val();
            const userId = $('#refund_user_id').val();
            const amount = $('#refund_amount').val();
            const reason = $('#refund_reason').val();

            if (!amount || amount <= 0) {
                Swal.fire({
                    title: 'Invalid Amount',
                    text: 'Please enter a valid refund amount',
                    icon: 'error'
                });
                return;
            }

            // Show confirmation
            Swal.fire({
                title: 'Confirm Refund?',
                html: `Are you sure you want to refund <strong>₹${parseFloat(amount).toFixed(2)}</strong> to the customer's wallet?<br><br><small class="text-muted">This action cannot be undone.</small>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, Process Refund',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show processing loader
                    Swal.fire({
                        title: 'Processing Refund...',
                        text: 'Please wait while we process the refund',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Send AJAX request
                    $.ajax({
                        url: '<?= base_url('admin/process_refund') ?>',
                        type: 'POST',
                        data: {
                            order_id: orderId,
                            user_id: userId,
                            refund_amount: amount,
                            refund_reason: reason
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                $('#refundModal').modal('hide');
                                Swal.fire({
                                    title: 'Refund Processed!',
                                    html: response.message + '<br><br><small class="text-muted">The amount has been credited to the customer\'s wallet.</small>',
                                    icon: 'success',
                                    confirmButtonColor: '#28a745'
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Refund Failed',
                                    text: response.message || 'Failed to process refund',
                                    icon: 'error',
                                    confirmButtonColor: '#dc3545'
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Refund Error:', error);
                            Swal.fire({
                                title: 'Error',
                                text: 'An error occurred while processing the refund. Please try again.',
                                icon: 'error',
                                confirmButtonColor: '#dc3545'
                            });
                        }
                    });
                }
            });
        }
    </script>

    <style>
        .product-images {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .product-images img {
            border: 1px solid #dee2e6;
        }

        .static-top-widget i {
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .badge {
            font-size: 0.75rem;
        }
    </style>
</div>