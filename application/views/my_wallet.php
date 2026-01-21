<style>
    .wallet-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        color: white;
        padding: 30px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(118, 75, 162, 0.3);
        margin-bottom: 30px;
    }
    .wallet-card .icon-bg {
        position: absolute;
        right: -20px;
        bottom: -20px;
        font-size: 150px;
        opacity: 0.1;
        color: white;
        transform: rotate(-15deg);
    }
    .wallet-card h2 {
        color: white !important;
        font-weight: 700;
        font-size: 2.5rem;
    }
    .wallet-card .btn-light {
        background: white;
        color: #764ba2;
        border: none;
        font-weight: 600;
        padding: 10px 25px;
        border-radius: 50px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .wallet-card .btn-light:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .modern-table thead th {
        border-top: none;
        border-bottom: 2px solid #f0f0f0;
        color: #888;
        font-weight: 600;
        padding: 15px;
    }
    .modern-table tbody td {
        padding: 15px;
        vertical-align: middle;
        border-bottom: 1px solid #f8f8f8;
    }
    .transaction-badges {
        padding: 8px 12px;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.85rem;
    }
    .bg-soft-success { background: rgba(40, 167, 69, 0.1); color: #28a745; }
    .bg-soft-danger { background: rgba(220, 53, 69, 0.1); color: #dc3545; }
    
    .transaction-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }

    /* Mobile Responsive Styles */
    @media (max-width: 768px) {
        /* Hide sidebar on mobile */
        .col-lg-3 {
            display: none;
        }

        /* Full width for main content on mobile */
        .col-lg-9 {
            width: 100%;
            padding: 0;
        }

        /* Wallet Card Mobile */
        .wallet-card {
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 15px;
        }

        .wallet-card .icon-bg {
            font-size: 100px;
            right: -15px;
            bottom: -15px;
        }

        .wallet-card h2 {
            font-size: 1.75rem;
            margin-bottom: 15px;
        }

        .wallet-card h5 {
            font-size: 0.9rem;
        }

        .wallet-card .btn-light {
            padding: 8px 20px;
            font-size: 0.9rem;
            width: 100%;
            margin-top: 10px;
        }

        /* Row spacing on mobile */
        .row.mb-4 {
            margin-bottom: 15px !important;
        }

        /* Transaction Table Mobile */
        .card-header {
            padding: 15px !important;
            flex-direction: column;
            align-items: flex-start !important;
        }

        .card-header h5 {
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .card-header .badge {
            font-size: 0.75rem;
            padding: 5px 10px;
        }

        /* Hide table on mobile, show card layout */
        .table-responsive {
            overflow-x: visible;
        }

        .modern-table {
            display: none;
        }

        /* Mobile Transaction Cards */
        .mobile-transaction-card {
            display: block;
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            background: white;
        }

        .mobile-transaction-card:last-child {
            border-bottom: none;
        }

        .mobile-transaction-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .mobile-transaction-info {
            display: flex;
            align-items: center;
            flex: 1;
        }

        .mobile-transaction-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .mobile-transaction-details h6 {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 4px;
            color: #333;
        }

        .mobile-transaction-details small {
            font-size: 0.75rem;
            color: #666;
        }

        .mobile-transaction-amount {
            text-align: right;
        }

        .mobile-transaction-amount h6 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .mobile-transaction-amount small {
            font-size: 0.7rem;
            color: #999;
        }

        .mobile-transaction-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #f5f5f5;
        }

        .mobile-transaction-date {
            font-size: 0.8rem;
            color: #666;
        }

        .mobile-transaction-badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Modal Mobile */
        #topupModal .modal-dialog {
            margin: 10px;
            max-width: calc(100% - 20px);
        }

        #topupModal .modal-content {
            border-radius: 15px;
        }

        #topupModal .modal-header {
            padding: 15px;
        }

        #topupModal .modal-title {
            font-size: 1.1rem;
        }

        #topupModal .modal-body {
            padding: 15px;
        }

        #topupModal .input-group-lg {
            font-size: 1rem;
        }

        #topupModal .quick-amount {
            font-size: 0.85rem;
            padding: 8px 12px;
            flex: 1;
        }

        #topupModal .d-grid.gap-2.d-md-flex {
            display: grid !important;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        #topupModal .modal-footer {
            padding: 15px;
            flex-direction: column;
            gap: 10px;
        }

        #topupModal .modal-footer .btn {
            width: 100%;
            margin: 0;
        }

        /* Page Title Mobile */
        .page-title h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        /* Container padding */
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Dashboard right padding */
        .dashboard-right {
            padding: 0;
        }

        /* Card styling on mobile */
        .card {
            border-radius: 15px;
            margin-bottom: 20px;
        }

        /* Empty state mobile */
        .text-center.py-5 {
            padding: 30px 15px !important;
        }

        .text-center.py-5 .fa-3x {
            font-size: 2.5rem !important;
        }

        .text-center.py-5 h5 {
            font-size: 1.1rem;
        }

        .text-center.py-5 p {
            font-size: 0.85rem;
        }

        /* Section spacing */
        .section-b-space {
            padding: 20px 0;
        }

        .margin-top {
            margin-top: 0;
        }
    }

    @media (min-width: 769px) {
        .mobile-transaction-card {
            display: none;
        }
    }
</style>

<section class="section-b-space margin-top">
    <div class="container">
        <div class="row">
            <?php $this->load->view('common/profile_sidebar', ['active_tab' => 'wallet']); ?>

            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard" style="display:block;">
                        <div class="page-title">
                            <h2>My Wallet</h2>
                        </div>
                        
                        <div class="row mb-4">
                            <!-- Main Wallet Card -->
                            <div class="col-12">
                                <div class="wallet-card">
                                    <i class="fa fa-wallet icon-bg"></i>
                                    <div class="position-relative z-index-1">
                                        <h5 class="opacity-75 mb-2">Available Balance</h5>
                                        <h2 class="mb-4">₹ <span id="wallet_balance_display"><?= number_format($wallet_balance, 2); ?></span></h2>
                                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#topupModal">
                                            <i class="fa fa-plus-circle me-2"></i> Add Money
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Transaction History -->
                        <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                            <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h5 class="mb-0 fw-bold"><i class="fa fa-history me-2 text-primary"></i> Transaction History</h5>
                                <?php if (isset($transaction_stats)): ?>
                                <span class="badge bg-primary rounded-pill px-3 py-2">
                                    Total Transactions: <?= $transaction_stats['total_transactions']; ?>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="card-body p-0">
                                <?php if (!empty($transactions)): ?>
                                <!-- Desktop Table View -->
                                <div class="table-responsive">
                                    <table class="table modern-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Transaction</th>
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th class="text-end">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($transactions as $txn): ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="transaction-icon <?= $txn->transaction_type == 'credit' ? 'bg-soft-success' : 'bg-soft-danger' ?>">
                                                            <i class="fa <?= $txn->transaction_type == 'credit' ? 'fa-arrow-down' : 'fa-arrow-up' ?>"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 text-dark"><?= htmlspecialchars($txn->description); ?></h6>
                                                            <?php if ($txn->payment_method): ?>
                                                                <small class="text-muted">via <?= ucfirst($txn->payment_method); ?></small>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted"><?= date('d M Y, h:i A', strtotime($txn->created_at)); ?></td>
                                                <td>
                                                    <?php if ($txn->transaction_type == 'credit'): ?>
                                                        <span class="badge bg-soft-success text-success">Credit</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-soft-danger text-danger">Debit</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-end">
                                                    <?php if ($txn->transaction_type == 'credit'): ?>
                                                        <h6 class="text-success mb-0">+₹<?= number_format($txn->amount, 2); ?></h6>
                                                    <?php else: ?>
                                                        <h6 class="text-danger mb-0">-₹<?= number_format($txn->amount, 2); ?></h6>
                                                    <?php endif; ?>
                                                    <small class="text-muted">Bal: ₹<?= number_format($txn->balance_after, 2); ?></small>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Mobile Card View -->
                                <div class="mobile-transactions-list">
                                    <?php foreach ($transactions as $txn): ?>
                                    <div class="mobile-transaction-card">
                                        <div class="mobile-transaction-header">
                                            <div class="mobile-transaction-info">
                                                <div class="mobile-transaction-icon <?= $txn->transaction_type == 'credit' ? 'bg-soft-success' : 'bg-soft-danger' ?>">
                                                    <i class="fa <?= $txn->transaction_type == 'credit' ? 'fa-arrow-down' : 'fa-arrow-up' ?>"></i>
                                                </div>
                                                <div class="mobile-transaction-details">
                                                    <h6><?= htmlspecialchars($txn->description); ?></h6>
                                                    <?php if ($txn->payment_method): ?>
                                                        <small>via <?= ucfirst($txn->payment_method); ?></small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="mobile-transaction-amount">
                                                <?php if ($txn->transaction_type == 'credit'): ?>
                                                    <h6 class="text-success mb-0">+₹<?= number_format($txn->amount, 2); ?></h6>
                                                <?php else: ?>
                                                    <h6 class="text-danger mb-0">-₹<?= number_format($txn->amount, 2); ?></h6>
                                                <?php endif; ?>
                                                <small>Bal: ₹<?= number_format($txn->balance_after, 2); ?></small>
                                            </div>
                                        </div>
                                        <div class="mobile-transaction-footer">
                                            <span class="mobile-transaction-date"><?= date('d M Y, h:i A', strtotime($txn->created_at)); ?></span>
                                            <?php if ($txn->transaction_type == 'credit'): ?>
                                                <span class="mobile-transaction-badge bg-soft-success text-success">Credit</span>
                                            <?php else: ?>
                                                <span class="mobile-transaction-badge bg-soft-danger text-danger">Debit</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php else: ?>
                                <div class="text-center py-5">
                                    <div class="mb-3">
                                        <i class="fa fa-wallet fa-3x text-light"></i>
                                    </div>
                                    <h5 class="text-muted">No transactions yet</h5>
                                    <p class="text-muted small">Add money to your wallet to get started!</p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top-up Modal -->
<div class="modal fade" id="topupModal" tabindex="-1" aria-labelledby="topupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topupModalLabel"><i class="fa fa-wallet"></i> Add Money to Wallet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="topupForm">
                    <div class="mb-3">
                        <label for="topup_amount" class="form-label">Amount to Add</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text">₹</span>
                            <input type="number" class="form-control" id="topup_amount" name="amount" 
                                   placeholder="Enter amount" min="10" max="50000" step="0.01" required>
                        </div>
                        <small class="text-muted">Minimum: ₹10 | Maximum: ₹50,000</small>
                    </div>
                    
                    <!-- Quick Amount Buttons -->
                    <div class="mb-3">
                        <label class="form-label">Quick Select</label>
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="button" class="btn btn-outline-primary quick-amount" data-amount="100">+₹100</button>
                            <button type="button" class="btn btn-outline-primary quick-amount" data-amount="500">+₹500</button>
                            <button type="button" class="btn btn-outline-primary quick-amount" data-amount="1000">+₹1000</button>
                            <button type="button" class="btn btn-outline-primary quick-amount" data-amount="2000">+₹2000</button>
                        </div>
                    </div>
                    
                    <?php if ($razorpay_enabled): ?>
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i> You will be redirected to a secure payment gateway to complete the transaction.
                    </div>
                    <?php else: ?>
                    <div class="alert alert-warning">
                        <i class="fa fa-exclamation-triangle"></i> Payment gateway is not configured. Please contact administrator.
                    </div>
                    <?php endif; ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <?php if ($razorpay_enabled): ?>
                <button type="button" class="btn btn-primary" id="proceedTopupBtn">
                    <i class="fa fa-arrow-right"></i> Proceed to Payment
                </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Razorpay Script -->
<?php if ($razorpay_enabled): ?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$(document).ready(function() {
    // Quick amount buttons
    $('.quick-amount').on('click', function() {
        var amount = $(this).data('amount');
        $('#topup_amount').val(amount);
    });
    
    // Proceed to payment
    $('#proceedTopupBtn').on('click', function() {
        var amount = parseFloat($('#topup_amount').val());
        
        if (!amount || amount < 10) {
            Swal.fire('Error', 'Please enter a valid amount (minimum ₹10)', 'error');
            return;
        }
        
        if (amount > 50000) {
            Swal.fire('Error', 'Maximum top-up amount is ₹50,000', 'error');
            return;
        }
        
        var btn = $(this);
        btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Processing...');
        
        // Create top-up order
        $.ajax({
            url: '<?= base_url('main/create_wallet_topup_order') ?>',
            type: 'POST',
            data: { amount: amount },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Close modal before opening Razorpay
                    $('#topupModal').modal('hide');
                    
                    // Open Razorpay checkout with key from database
                    var options = {
                        key: response.data.key_id,
                        amount: response.data.amount,
                        currency: 'INR',
                        name: 'Wallet Top-up',
                        description: 'Add money to wallet',
                        order_id: response.data.razorpay_order_id,
                        handler: function(payment) {
                            // Show loading during verification
                            Swal.fire({
                                title: 'Verifying Payment...',
                                text: 'Please wait while we verify your payment',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                            
                            // Verify payment
                            $.ajax({
                                url: '<?= base_url('main/verify_wallet_topup') ?>',
                                type: 'POST',
                                data: {
                                    razorpay_order_id: payment.razorpay_order_id,
                                    razorpay_payment_id: payment.razorpay_payment_id,
                                    razorpay_signature: payment.razorpay_signature,
                                    transaction_id: response.data.transaction_id
                                },
                                dataType: 'json',
                                success: function(verifyResponse) {
                                    if (verifyResponse.success) {
                                        // Update balance display without page reload
                                        var newBalance = verifyResponse.data.new_balance;
                                        var creditedAmount = verifyResponse.data.credited_amount;
                                        
                                        // Update the balance in the UI
                                        $('#wallet_balance_display').text(newBalance.toFixed(2));
                                        
                                        Swal.fire({
                                            title: 'Congratulations!',
                                            html: '<p>You have successfully added <strong>₹' + creditedAmount.toFixed(2) + '</strong> to your wallet.</p>' +
                                                  '<p>New Balance: <strong>₹' + newBalance.toFixed(2) + '</strong></p>' +
                                                  '<p>Continue booking!</p>',
                                            icon: 'success',
                                            confirmButtonText: 'Continue',
                                            confirmButtonColor: '#28a745'
                                        }).then(function() {
                                            // Reload to show updated transaction history
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Payment Verification Failed',
                                            text: verifyResponse.message || 'Unable to verify payment. Please contact support.',
                                            icon: 'error',
                                            confirmButtonText: 'OK'
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('Verification Error:', { status: status, error: error });
                                    Swal.fire({
                                        title: 'Verification Error',
                                        text: 'Failed to verify payment. Please contact support with your payment ID: ' + payment.razorpay_payment_id,
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    });
                                },
                                complete: function() {
                                    btn.prop('disabled', false).html('<i class="fa fa-arrow-right"></i> Proceed to Payment');
                                }
                            });
                        },
                        prefill: {
                            name: '<?= $this->session->userdata("username") ?: "" ?>',
                            email: '<?= $this->session->userdata("email") ?: "" ?>',
                            contact: '<?= $this->session->userdata("mobile") ?: "" ?>'
                        },
                        theme: {
                            color: '#f3ba75'
                        },
                        modal: {
                            ondismiss: function() {
                                btn.prop('disabled', false).html('<i class="fa fa-arrow-right"></i> Proceed to Payment');
                                Swal.fire({
                                    title: 'Payment Cancelled',
                                    text: 'You cancelled the payment process.',
                                    icon: 'info',
                                    confirmButtonText: 'OK'
                                });
                            }
                        }
                    };
                    
                    var rzp = new Razorpay(options);
                    rzp.open();
                    
                    // Reset button after Razorpay opens
                    btn.prop('disabled', false).html('<i class="fa fa-arrow-right"></i> Proceed to Payment');
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: response.message || 'Failed to create payment order',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    btn.prop('disabled', false).html('<i class="fa fa-arrow-right"></i> Proceed to Payment');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', { status: status, error: error });
                Swal.fire({
                    title: 'Error',
                    text: 'Failed to create payment order. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                btn.prop('disabled', false).html('<i class="fa fa-arrow-right"></i> Proceed to Payment');
            }
        });
    });
});
</script>
<?php endif; ?>