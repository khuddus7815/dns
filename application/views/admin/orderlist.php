<style>
    /* Modern Search Bar */
    .search-wrapper {
        position: relative;
        margin-bottom: 20px;
        max-width: 400px;
    }

    .search-wrapper input {
        width: 100%;
        padding: 12px 20px;
        padding-left: 45px;
        border-radius: 30px;
        border: 1px solid #eee;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        outline: none;
    }

    .search-wrapper input:focus {
        box-shadow: 0 5px 20px rgba(212, 175, 55, 0.15);
        border-color: #D4AF37;
    }

    .search-wrapper i {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #aaa;
    }

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

    .order-id-badge {
        background: #f0f4f7;
        color: #2c3e50;
        padding: 5px 12px;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        border: 1px solid #dcdde1;
    }

    .order-id-badge:hover {
        background: #D4AF37;
        color: #fff;
        border-color: #D4AF37;
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
            text-align: left;
        }

        .table-responsive-custom td.order-header-cell {
            justify-content: flex-start;
            font-size: 1.1rem;
            font-weight: 700;
            color: #333;
            border-bottom: 1px solid #f5f5f5;
            padding-bottom: 15px;
            margin-bottom: 10px;
        }

        .table-responsive-custom td.order-header-cell::before {
            content: none;
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
                            Orders
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Sales</li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body" style="padding: 0;">
                    <!-- Search Bar -->
                    <div class="search-wrapper">
                        <i class="fa fa-search"></i>
                        <input type="text" id="orderSearchInput" placeholder="Search by Order ID, Status, or Mode...">
                    </div>

                    <!-- Order List Table -->
                    <div class="order-list-container">
                        <table class="table-responsive-custom" id="orderTable">
                            <thead>
                                <tr>
                                    <th>Order Info</th>
                                    <th>Products</th>
                                    <th>Status Details</th>
                                    <th>Date & Amount</th>
                                    <th>Update Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($order_list)): ?>
                                    <?php foreach ($order_list as $order): ?>
                                        <tr class="order-row">
                                            <td class="order-header-cell" data-label="Order">
                                                <a href="<?= base_url('admin/order_details/' . $order->id) ?>"
                                                    class="order-id-badge">
                                                    #<?= $order->order_number ?>
                                                </a>
                                            </td>
                                            <td data-label="Products">
                                                <div class="d-flex">
                                                    <?php if (!empty($order->order_product)): ?>
                                                        <?php foreach ($order->order_product as $val): ?>
                                                            <?php if (!empty($val->product_image)): ?>
                                                                <img src="<?= base_url('upload/productimg/' . $val->product_image) ?>"
                                                                    alt="" class="img-fluid img-30 mr-1 blur-up lazyloaded"
                                                                    style="border-radius: 4px; border: 1px solid #eee;">
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td data-label="Status">
                                                <div class="d-flex flex-column align-items-end">
                                                    <span class="badge badge-secondary"
                                                        style="margin-bottom: 5px;"><?= $order->payment_status ?></span>
                                                    <small class="text-muted"><?= $order->payment_mode ?></small>
                                                </div>
                                            </td>
                                            <td data-label="Total">
                                                <div class="d-flex flex-column align-items-end">
                                                    <span
                                                        style="font-weight: 700; color: #D4AF37; font-size: 1.1rem;">₹<?= number_format($order->tot_amount, 2) ?></span>
                                                    <small
                                                        class="text-muted"><?= date('M d, Y', strtotime($order->created_at)) ?></small>
                                                </div>
                                            </td>
                                            <td data-label="Update">
                                                <select class="form-control status-change" data-id="<?= $order->id ?>"
                                                    style="width: 130px; font-size: 13px; height: 38px; border-radius: 8px;">
                                                    <option value="1" <?= $order->status == 1 ? 'selected' : '' ?>>Pending</option>
                                                    <option value="2" <?= $order->status == 2 ? 'selected' : '' ?>>Confirmed
                                                    </option>
                                                    <option value="3" <?= $order->status == 3 ? 'selected' : '' ?>>Shipped</option>
                                                    <option value="4" <?= $order->status == 4 ? 'selected' : '' ?>>Delivered
                                                    </option>
                                                    <option value="5" <?= $order->status == 5 ? 'selected' : '' ?>>Cancelled
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No orders found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <!-- Custom Pagination -->
                        <div class="custom-pagination">
                            <a href="javascript:void(0)" class="prev-page"><i class="fa fa-angle-left"></i></a>
                            <span class="active">1</span>
                            <a href="javascript:void(0)" class="next-page"><i class="fa fa-angle-right"></i></a>
                        </div>

                        <!-- No Results -->
                        <div id="noResults" style="display: none; text-align: center; padding: 40px; color: #999;">
                            <i class="fa fa-search" style="font-size: 2rem; margin-bottom: 10px;"></i>
                            <p>No orders found matching your search.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        const rowsPerPage = 10;
        let currentPage = 1;

        function updatePagination(visibleRows) {
            const totalRows = visibleRows.length;
            const totalPages = Math.ceil(totalRows / rowsPerPage);
            
            // Hide all rows first
            $('.order-row').hide();
            
            // Show only rows for current page
            const start = (currentPage - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            
            visibleRows.slice(start, end).show();

            // Update Pagination UI
            $('.custom-pagination').empty();
            if (totalPages > 1) {
                let paginationHtml = `<a href="javascript:void(0)" class="prev-page ${currentPage === 1 ? 'disabled' : ''}"><i class="fa fa-angle-left"></i></a>`;
                
                for (let i = 1; i <= totalPages; i++) {
                    paginationHtml += `<a href="javascript:void(0)" class="page-num ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</a>`;
                }
                
                paginationHtml += `<a href="javascript:void(0)" class="next-page ${currentPage === totalPages ? 'disabled' : ''}"><i class="fa fa-angle-right"></i></a>`;
                $('.custom-pagination').html(paginationHtml).show();
            } else {
                $('.custom-pagination').hide();
            }

            if (totalRows === 0) {
                $('#noResults').show();
                $('#orderTable').hide();
            } else {
                $('#noResults').hide();
                $('#orderTable').show();
            }
        }

        function getVisibleRows() {
            const searchTerm = $('#orderSearchInput').val().toLowerCase();
            return $('.order-row').filter(function() {
                return $(this).text().toLowerCase().indexOf(searchTerm) > -1;
            }).toArray();
        }

        // Initial Load
        updatePagination($(getVisibleRows()));

        // Search Event
        $('#orderSearchInput').on('keyup', function() {
            currentPage = 1;
            updatePagination($(getVisibleRows()));
        });

        // Pagination Clicks
        $(document).on('click', '.page-num', function() {
            currentPage = parseInt($(this).data('page'));
            updatePagination($(getVisibleRows()));
            window.scrollTo(0, 0);
        });

        $(document).on('click', '.prev-page:not(.disabled)', function() {
            currentPage--;
            updatePagination($(getVisibleRows()));
            window.scrollTo(0, 0);
        });

        $(document).on('click', '.next-page:not(.disabled)', function() {
            currentPage++;
            updatePagination($(getVisibleRows()));
            window.scrollTo(0, 0);
        });

        // Handle Status Change
        $(document).on('change', '.status-change', function () {
            var status = $(this).val();
            var order_id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('admin/update_order_status') ?>",
                type: "POST",
                dataType: "json",
                data: {
                    order_id: order_id,
                    status: status
                },
                success: function (response) {
                    if (response.status == 'success') {
                        if (typeof Swal !== 'undefined') {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true
                            });
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            });
                        } else {
                            alert(response.message);
                        }
                    } else {
                        alert(response.message || 'Failed to update status');
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Server Error: Failed to update status.');
                }
            });
        });
    });
</script>