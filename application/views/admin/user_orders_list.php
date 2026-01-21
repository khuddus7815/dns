<div class="page-body">

    <!-- Custom Styles for User Orders List (Matches Users Page) -->
    <style>
        /* Responsive Table / Card View */
        .order-list-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
            overflow: hidden;
            padding: 20px;
        }

        .table-responsive-custom {
            width: 100%;
            border-collapse: collapse;
        }

        .table-responsive-custom th {
            background-color: #f9f9f9;
            color: #555;
            font-weight: 600;
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #eee;
            white-space: nowrap;
        }

        .table-responsive-custom td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
            color: #444;
        }

        /* Mobile Card View */
        @media (max-width: 991px) {
            .table-responsive-custom thead {
                display: none;
            }

            .table-responsive-custom,
            .table-responsive-custom tbody,
            .table-responsive-custom tr,
            .table-responsive-custom td {
                display: block;
                width: 100%;
            }

            .table-responsive-custom tr {
                margin-bottom: 20px;
                background: #fff;
                border-radius: 15px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                border: 1px solid #eee;
                padding: 15px;
                position: relative;
            }

            .table-responsive-custom td {
                padding: 10px 0;
                border: none;
                display: flex;
                justify-content: space-between;
                align-items: center;
                text-align: right;
            }

            .table-responsive-custom td::before {
                content: attr(data-label);
                font-weight: 600;
                color: #888;
                float: left;
                margin-right: 15px;
            }

            /* Order ID Highlight */
            .table-responsive-custom td:first-child {
                font-weight: bold;
                color: #D4AF37;
                border-bottom: 1px solid #f5f5f5;
                padding-bottom: 15px;
                margin-bottom: 10px;
            }
        }

        /* Pagination Styling */
        .custom-pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 10px;
        }

        .custom-pagination a,
        .custom-pagination span {
            padding: 8px 16px;
            border-radius: 20px;
            background: #fff;
            border: 1px solid #eee;
            color: #555;
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .custom-pagination a:hover,
        .custom-pagination .active {
            background: #D4AF37;
            color: #fff;
            border-color: #D4AF37;
            box-shadow: 0 4px 10px rgba(212, 175, 55, 0.3);
        }
    </style>

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-left">

                        <?php if (isset($user_info) && $user_info): ?>
                            <h3>
                                <a href="javascript:history.back()"
                                    style="color: inherit; text-decoration: none; margin-right: 10px;">
                                    <i data-feather="arrow-left"></i>
                                </a>
                                Orders for:
                                <?php echo htmlspecialchars($user_info->first_name . ' ' . $user_info->last_name); ?>
                                <small>DNS Store Admin panel</small>
                            </h3>
                        <?php else: ?>
                            <h3>
                                <a href="javascript:history.back()"
                                    style="color: inherit; text-decoration: none; margin-right: 10px;">
                                    <i data-feather="arrow-left"></i>
                                </a>
                                User Orders
                                <small>DNS Store Admin panel</small>
                            </h3>
                        <?php endif; ?>

                    </div>
                    <div class="card-body" style="padding: 0;">
                        <div class="order-list-container">
                            <table class="table-responsive-custom">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>Total Amount</th>
                                        <th>Payment Mode</th>
                                        <th>Status</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($orders)): ?>
                                        <?php foreach ($orders as $order): ?>
                                            <?php
                                            // Logic for Status Badge
                                            $status_badge = '';
                                            if ($order->status == 1) {
                                                $status_badge = '<span class="badge badge-warning">Pending</span>';
                                            } elseif ($order->status == 2) {
                                                $status_badge = '<span class="badge badge-primary">Confirmed</span>';
                                            } elseif ($order->status == 3) {
                                                $status_badge = '<span class="badge badge-info">Shipped</span>';
                                            } elseif ($order->status == 4) {
                                                $status_badge = '<span class="badge badge-success">Delivered</span>';
                                            } elseif ($order->status == 0) {
                                                $status_badge = '<span class="badge badge-danger">Cancelled</span>';
                                            }
                                            ?>
                                            <tr>
                                                <td data-label="Order ID"><?php echo htmlspecialchars($order->order_number); ?>
                                                </td>
                                                <td data-label="Order Date">
                                                    <?php echo date('d M Y, h:i A', strtotime($order->created_at)); ?></td>
                                                <td data-label="Total Amount">
                                                    ₹<?php echo number_format($order->tot_amount, 2); ?></td>
                                                <td data-label="Payment Mode">
                                                    <?php echo htmlspecialchars($order->payment_mode); ?></td>
                                                <td data-label="Status">
                                                    <?= $status_badge ?>
                                                </td>
                                                <td data-label="Details">
                                                    <a href="<?php echo base_url('admin/order_details/' . $order->id); ?>"
                                                        class="btn btn-primary btn-sm">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" style="text-align: center; padding: 30px; color: #777;">
                                                This user has not placed any orders.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                            <!-- Custom Pagination -->
                            <div class="custom-pagination">
                                <a href="#"><i class="fa fa-angle-left"></i></a>
                                <span class="active">1</span>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>