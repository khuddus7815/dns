<div class="page-body">

    <!-- Container-fluid starts-->
    <!-- Custom Styles for User List -->
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
        .user-list-container {
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

        .user-avatar-circle {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #D4AF37, #f3ba75);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
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

            /* Specific tweaks for mobile visual hierarchy */
            .table-responsive-custom td.user-name-cell {
                justify-content: flex-start;
                font-size: 1.1rem;
                font-weight: 700;
                color: #333;
                border-bottom: 1px solid #f5f5f5;
                padding-bottom: 15px;
                margin-bottom: 10px;
            }

            .table-responsive-custom td.user-name-cell::before {
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

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-left">
                        <h3>
                            <a href="javascript:history.back()"
                                style="color: inherit; text-decoration: none; margin-right: 10px;">
                                <i data-feather="arrow-left"></i>
                            </a>
                            Users List
                            <small>DNS Store Admin panel</small>
                        </h3>
                    </div>

                    <div class="card-body" style="padding: 0;">
                        <!-- Search Bar -->
                        <div class="search-wrapper">
                            <i class="fa fa-search"></i>
                            <input type="text" id="userCusSearch" placeholder="Search by name, email, or mobile...">
                        </div>

                        <!-- User List Table -->
                        <div class="user-list-container">
                            <table class="table-responsive-custom" id="userTable">
                                <thead>
                                    <tr>
                                        <th>User Details</th>
                                        <th>Contact</th>
                                        <th>Stats</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr class="user-row">
                                            <td class="user-name-cell" data-label="User">
                                                <div class="d-flex align-items-center">
                                                    <div class="user-avatar-circle">
                                                        <?= strtoupper(substr($user->first_name, 0, 1)); ?>
                                                    </div>
                                                    <div>
                                                        <div style="font-weight: 600;">
                                                            <?= $user->first_name . ' ' . $user->last_name; ?>
                                                        </div>
                                                        <div style="font-size: 0.85rem; color: #999;">
                                                            @<?= $user->username; ?></div>
                                                        <div style="font-size: 0.8rem; color: #ccc;">ID: #<?= $user->id; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Contact">
                                                <div
                                                    style="display: flex; flex-direction: column; align-items: flex-end; text-align: right;">
                                                    <div><i class="fa fa-phone mr-1" style="color: #D4AF37;"></i>
                                                        <?= $user->mobile; ?></div>
                                                    <div style="font-size: 0.85rem; color: #888; margin-top: 5px;">
                                                        <?= $user->email; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-label="Orders">
                                                <span class="badge badge-light"
                                                    style="font-size: 0.9rem; padding: 5px 10px;">
                                                    Orders
                                                </span>
                                            </td>
                                            <td data-label="Actions">
                                                <div class="d-flex align-items-center justify-content-end"
                                                    style="gap: 10px;">
                                                    <a href="<?php echo base_url('admin/user_orders/' . $user->id); ?>"
                                                        class="btn btn-sm"
                                                        style="background: #f8f9fa; border: 1px solid #ddd; color: #333; border-radius: 8px;">
                                                        View Orders
                                                    </a>

                                                    <?php
                                                    $buttonText = ($user->is_active == 1) ? 'Active' : 'Inactive';
                                                    $buttonClass = ($user->is_active == 1) ? 'btn-success' : 'btn-danger';
                                                    ?>
                                                    <button class="btn btn-sm toggle-status <?php echo $buttonClass; ?>"
                                                        data-user-id="<?php echo $user->id; ?>"
                                                        style="width: 80px; border-radius: 8px;">
                                                        <?php echo $buttonText; ?>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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

                            <!-- Search No Results -->
                            <div id="noResults" style="display: none; text-align: center; padding: 40px; color: #999;">
                                <i class="fa fa-search" style="font-size: 2rem; margin-bottom: 10px;"></i>
                                <p>No users found matching your search.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Side Search Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var searchInput = document.getElementById('userCusSearch');
            var tableRows = document.querySelectorAll('.user-row');
            var noResults = document.getElementById('noResults');

            searchInput.addEventListener('keyup', function (e) {
                var term = e.target.value.toLowerCase();
                var hasVisible = false;

                tableRows.forEach(function (row) {
                    var text = row.innerText.toLowerCase();
                    if (text.includes(term)) {
                        row.style.display = '';
                        hasVisible = true;
                    } else {
                        row.style.display = 'none';
                    }
                });

                if (!hasVisible) {
                    noResults.style.display = 'block';
                } else {
                    noResults.style.display = 'none';
                }
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {


            // Event listener for categories and type filter
            $('#categories-filter, #type-filter').change(function () {
                var categoryId = $('#categories-filter').val(); // Get the selected category ID
                var type = $('#type-filter').val(); // Get the selected type

                // AJAX call to fetch products based on selected category and type
                $.ajax({
                    url: '<?php echo site_url('api/admin/product/filter'); ?>',
                    type: 'POST',
                    data: {
                        category_id: categoryId,
                        type: type
                    },
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);

                        // Clear the existing products
                        $('.products-admin').empty();

                        // Iterate through each product in the data array
                        for (var i = 0; i < data.length; i++) {
                            var product = data[i];

                            // Generate HTML for the product card
                            var productHTML = `
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="#"><img src="<?= base_url('upload/productimg/') ?>${product.product_img1}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                <div class="product-hover">
                                    <ul>
                                        <li>
                                            <button class="btn" type="button" data-original-title="" title=""><i class="ti-pencil-alt"></i></button>
                                        </li>
                                        <li>
                                            <button class="btn" type="button" data-toggle="modal" data-target="#exampleModalCenter" data-original-title="" title=""><i class="ti-trash"></i></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-detail">
                            <div class="rating">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <i class="fa fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <a href="#">
                                <h6>${product.product_name}</h6>
                            </a>
                            <h4>$${product.selling_price} <del>$${product.price}</del></h4>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        `;

                            // Append the product HTML to the products container
                            $('#addcards').append(productHTML);
                        }
                    },

                    error: function (xhr, status, error) {
                        console.error('Error fetching products:', error);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.toggle-status').click(function () {
                var button = $(this); // Store the reference to the button clicked
                var userId = button.data('user-id');

                // 1. Read the CURRENT state
                // It's more reliable to check the class than the text
                var isCurrentlyActive = button.hasClass('btn-success');

                // 2. Determine the NEW state
                var newStatusText = isCurrentlyActive ? 'Inactive' : 'Active';
                var newStatusClass = isCurrentlyActive ? 'btn-danger' : 'btn-success';
                var oldStatusText = isCurrentlyActive ? 'Active' : 'Inactive';
                var oldStatusClass = isCurrentlyActive ? 'btn-success' : 'btn-danger';
                var newActiveValue = isCurrentlyActive ? 0 : 1; // This is the value to send to the server

                // 3. Optimistically update the button to the NEW state immediately
                button.text(newStatusText)
                    .removeClass(oldStatusClass)
                    .addClass(newStatusClass);

                // 4. Send the NEW state (0 or 1) to the server
                $.ajax({
                    url: '<?php echo base_url('api/admin/user/active'); ?>', // Make sure this URL is correct
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        user_id: userId,
                        is_active: newActiveValue // Send 0 for Inactive, 1 for Active
                    },
                    success: function (response) {
                        console.log(response);
                        if (!response.success) {
                            // 5. Rollback on failure
                            button.text(oldStatusText)
                                .removeClass(newStatusClass)
                                .addClass(oldStatusClass);
                            console.log("Failed to update active status.");
                        }
                        // On success, do nothing - the button is already correct
                    },
                    error: function (xhr, status, error) {
                        // 5. Rollback on AJAX error
                        button.text(oldStatusText)
                            .removeClass(newStatusClass)
                            .addClass(oldStatusClass);
                        console.error("AJAX Error:", xhr.responseText);
                    }
                });
            });
        });
    </script>