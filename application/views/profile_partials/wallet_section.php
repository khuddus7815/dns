<style>
    :root {
        --golden-primary: #b8860b;
        --golden-secondary: #d4af37;
        --golden-dark: #8b6914;
    }
    .wallet-card {
        background: linear-gradient(135deg, #d4af37 0%, #a67c00 100%);
        border-radius: 20px;
        color: white;
        padding: 30px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(166, 124, 0, 0.3);
        margin-bottom: 30px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .wallet-card .icon-bg {
        position: absolute;
        right: -20px;
        bottom: -20px;
        font-size: 150px;
        opacity: 0.15;
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
        color: #a67c00;
        border: none;
        font-weight: 600;
        padding: 10px 25px;
        border-radius: 50px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        align-self: flex-start;
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
        background: white;
        position: sticky;
        top: 0;
        z-index: 10;
    }
    .modern-table tbody td {
        padding: 15px;
        vertical-align: middle;
        border-bottom: 1px solid #f8f8f8;
    }
    .transaction-scroll {
        max-height: 400px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #d4af37 #f0f0f0;
    }
    .transaction-scroll::-webkit-scrollbar {
        width: 6px;
    }
    .transaction-scroll::-webkit-scrollbar-track {
        background: #f0f0f0;
    }
    .transaction-scroll::-webkit-scrollbar-thumb {
        background-color: #d4af37;
        border-radius: 10px;
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
        flex-shrink: 0;
    }
    .search-input {
        border-radius: 20px;
        border: 1px solid #e0e0e0;
        padding-left: 15px;
        font-size: 0.9rem;
    }
    .filter-select {
        border-radius: 20px;
        border: 1px solid #e0e0e0;
        font-size: 0.9rem;
        padding-left: 10px;
    }
</style>

<div class="page-title">
    <h2>My Wallet</h2>
</div>

<div class="row mb-4 align-items-stretch">
    <!-- Main Wallet Card -->
    <div class="col-12">
        <div class="wallet-card">
            <i class="fa fa-wallet icon-bg"></i>
            <div class="position-relative z-index-1">
                <h5 class="opacity-90 mb-2">Available Balance</h5>
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
    <div class="card-header bg-white border-bottom py-3">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h5 class="mb-0 fw-bold"><i class="fa fa-history me-2 text-warning"></i> Transaction History</h5>
            </div>
            <div class="col-md-8">
                <div class="d-flex gap-2 justify-content-md-end mt-3 mt-md-0">
                    <input type="text" id="txnSearch" class="form-control form-control-sm search-input" placeholder="Search transactions..." style="max-width: 200px;">
                    <select id="txnFilter" class="form-select form-select-sm filter-select" style="max-width: 130px;">
                        <option value="all">All Types</option>
                        <option value="credit">Credit</option>
                        <option value="debit">Debit</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <?php if (!empty($transactions)): ?>
        <div class="transaction-scroll">
            <table class="table modern-table mb-0" id="txnTable">
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
                    <tr class="txn-row" data-type="<?= $txn->transaction_type ?>">
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="transaction-icon <?= $txn->transaction_type == 'credit' ? 'bg-soft-success' : 'bg-soft-danger' ?>">
                                    <i class="fa <?= $txn->transaction_type == 'credit' ? 'fa-arrow-down' : 'fa-arrow-up' ?>"></i>
                                </div>
                                <div class="txn-desc">
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
        
        <!-- Script for filtering -->
        <script>
        $(document).ready(function() {
            // Search Filter
            $('#txnSearch').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $("#txnTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            
            // Type Filter
            $('#txnFilter').on('change', function() {
                var type = $(this).val();
                if(type == 'all') {
                    $('.txn-row').show();
                } else {
                    $('.txn-row').hide();
                    $('.txn-row[data-type="' + type + '"]').show();
                }
            });
        });
        </script>
        
        <?php else: ?>
        <div class="text-center py-5">
            <div class="mb-3">
                <i class="fa fa-wallet fa-3x text-warning"></i>
            </div>
            <h5 class="text-muted">No transactions yet</h5>
            <p class="text-muted small">Add money to your wallet to get started!</p>
        </div>
        <?php endif; ?>
    </div>
</div>

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
                            <button type="button" class="btn btn-outline-primary quick-amount"
                                data-amount="100">+₹100</button>
                            <button type="button" class="btn btn-outline-primary quick-amount"
                                data-amount="500">+₹500</button>
                            <button type="button" class="btn btn-outline-primary quick-amount"
                                data-amount="1000">+₹1000</button>
                            <button type="button" class="btn btn-outline-primary quick-amount"
                                data-amount="2000">+₹2000</button>
                        </div>
                    </div>

                    <?php if ($razorpay_enabled): ?>
                        <div class="alert alert-info">
                            <i class="fa fa-info-circle"></i> You will be redirected to a secure payment gateway to complete
                            the transaction.
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle"></i> Payment gateway is not configured. Please contact
                            administrator.
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
        $(document).ready(function () {
            // Quick amount buttons
            $('.quick-amount').on('click', function () {
                var amount = $(this).data('amount');
                $('#topup_amount').val(amount);
            });

            // Proceed to payment
            $('#proceedTopupBtn').on('click', function () {
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
                    success: function (response) {
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
                                handler: function (payment) {
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
                                        success: function (verifyResponse) {
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
                                                }).then(function () {
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
                                        error: function (xhr, status, error) {
                                            console.error('Verification Error:', { status: status, error: error });
                                            Swal.fire({
                                                title: 'Verification Error',
                                                text: 'Failed to verify payment. Please contact support with your payment ID: ' + payment.razorpay_payment_id,
                                                icon: 'error',
                                                confirmButtonText: 'OK'
                                            });
                                        },
                                        complete: function () {
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
                                    ondismiss: function () {
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
                    error: function (xhr, status, error) {
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