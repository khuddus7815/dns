<div class="container main-container wishlist-page-container">
    <style>
        /* --- Custom Wishlist UI Styles --- */

        /* Override Global Margin for this page to remove whitespace - High Specificity */
        body>.container.main-container.wishlist-page-container {
            margin-top: 100px !important;
            /* Default for desktop */
            padding-top: 0 !important;
        }

        /* 1. Search Bar Styling */
        .wishlist-search-wrapper {
            position: relative;
            width: 100%;
            min-width: 150px;
            /* Reduced min-width */
        }

        #wishlist-search {
            width: 100%;
            border: 2px solid #f3ba75;
            /* Golden Border */
            border-radius: 50px;
            /* Neat Rounded Borders */
            padding: 10px 20px;
            padding-right: 45px;
            /* Space for the icon */
            height: 45px;
            box-shadow: none;
            transition: all 0.3s ease;
        }

        #wishlist-search:focus {
            box-shadow: 0 0 8px rgba(243, 186, 117, 0.3);
            border-color: #f3ba75;
        }

        .search-icon-inside {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #f3ba75;
            /* Icon color */
            pointer-events: none;
            font-size: 16px;
        }

        /* 2. Sort Button Styling */
        .sort-dropdown-wrapper {
            background-color: #f3ba75;
            /* Golden Background */
            border-radius: 50px;
            /* Rounded Button */
            padding: 5px 20px;
            display: flex;
            align-items: center;
            height: 45px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .sort-label {
            color: white;
            font-weight: 600;
            margin-right: 10px;
            white-space: nowrap;
        }

        #wishlist-sort {
            background-color: transparent;
            border: none;
            color: white;
            font-weight: 500;
            cursor: pointer;
            outline: none;
            padding-right: 20px;
        }

        /* Dropdown options styling (browsers handle this differently) */
        #wishlist-sort option {
            color: #333;
            background: white;
        }

        #wishlist-sort:focus {
            box-shadow: none;
            background-color: transparent;
        }

        /* 3. Modern Product Card Styling for Wishlist */
        #wishlist-container .modern-product-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        #wishlist-container .modern-product-card:hover {
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
            transform: translateY(-8px);
        }

        #wishlist-container .modern-img-wrapper {
            border-radius: 20px 20px 0 0;
            overflow: hidden;
            background: #f8f9fa;
        }

        #wishlist-container .modern-product-img {
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            object-fit: cover;
            height: 250px;
        }

        #wishlist-container .modern-product-card:hover .modern-product-img {
            transform: scale(1.08);
        }

        #wishlist-container .modern-product-detail-new {
            text-align: left;
        }

        #wishlist-container .modern-product-title-new {
            font-weight: 700 !important;
            color: #2c3e50;
            font-size: 1rem;
            line-height: 1.4;
        }

        #wishlist-container .modern-rating-badge-new {
            flex-shrink: 0;
            margin-left: 10px;
        }

        #wishlist-container .price-section-new {
            margin-top: 8px;
        }

        #wishlist-container .original-price-new {
            color: #999;
            font-size: 0.9rem;
            font-weight: 400;
        }

        #wishlist-container .original-price-new del {
            color: #999;
        }

        #wishlist-container .discount-percent-new {
            background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
            color: #fff;
            padding: 2px 8px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.75rem;
            display: inline-block;
            box-shadow: 0 2px 6px rgba(243, 186, 117, 0.4);
        }

        #wishlist-container .modern-product-price-new {
            color: #ff4c3b;
            font-weight: 700;
            font-size: 1.4rem;
            margin-top: 4px;
        }

        #wishlist-container .modern-wishlist-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        #wishlist-container .modern-wishlist-btn:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }

        #wishlist-container .modern-wishlist-btn i {
            color: #f3ba75;
            background-color: #fff;
            border-radius: 50%;
            padding: 4px;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        #wishlist-container .modern-wishlist-btn.wishlist-active i,
        #wishlist-container .modern-wishlist-btn.wishlist-remove i {
            color: #f3ba75 !important;
            background-color: #fff !important;
            border-radius: 50%;
            padding: 4px;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #wishlist-container .golden-rating {
            background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%);
            color: #fff;
            border-radius: 20px;
            padding: 4px 10px;
            box-shadow: 0 2px 8px rgba(212, 175, 55, 0.3);
        }

        #wishlist-container .golden-text-white {
            color: #fff !important;
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* Wishlist Product Card - Add to Cart Button on Hover */
        #wishlist-container .add-button,
        #wishlist-container .view-cart-btn {
            background-color: var(--theme-deafult, #f3ba75) !important;
            color: white !important;
            text-align: center;
            font-size: 18px;
            text-transform: capitalize;
            position: absolute !important;
            width: 100%;
            bottom: -40px !important;
            padding: 5px 0;
            -webkit-transition: all 0.5s ease;
            transition: all 0.5s ease;
            cursor: pointer;
            border: none;
            z-index: 10;
        }

        #wishlist-container .product-box:hover .add-button,
        #wishlist-container .product-box:hover .view-cart-btn {
            bottom: 0 !important;
            -webkit-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        /* Ensure View Cart button maintains same style as Add to Cart */
        #wishlist-container .view-cart-btn {
            background-color: var(--theme-deafult, #f3ba75) !important;
            color: white !important;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            body>.container.main-container.wishlist-page-container {
                margin-top: 95px !important;
                /* Increased to prevent hiding behind header */
            }

            .wishlist-search-wrapper {
                margin-bottom: 0px;
            }

            .d-flex.justify-content-between {
                flex-direction: row !important;
                align-items: center !important;
            }

            .custom-dropdown {
                width: auto;
                justify-content: flex-end !important;
            }

            .shortcut-btn {
                flex: 1;
                margin-right: 5px;
            }

            .sort-dropdown-wrapper {
                width: auto;
                padding: 5px 10px;
            }

            .sort-label {
                display: none;
            }

            /* Static Add to Cart Button for Mobile */
            #wishlist-container .add-button,
            #wishlist-container .view-cart-btn {
                position: relative !important;
                bottom: 0 !important;
                /* Reset absolute positioning */
                z-index: 5;
            }
        }
    </style>

    <section class="section-b-space ratio_asos pt-0">
        <div class="collection-product-wrapper card product-card p-2 mt-0" style="margin-top: 0 !important;">

            <div class="wishlist-header d-flex align-items-center justify-content-between px-2 pt-2 pb-0">
                <div class="d-flex align-items-center">
                    <a href="javascript:history.back()" class="back-btn mr-3 text-dark" style="font-size: 18px;"><i
                            class="fa fa-arrow-left"></i></a>
                    <h4 class="mb-0 font-weight-bold" style="color: #2c3e50;">Wishlist</h4>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mx-2 mt-2">

                <div class="shortcut-btn" style="flex-grow: 1;">
                    <div class="form-group mb-0 wishlist-search-wrapper">
                        <input type="text" id="wishlist-search" class="form-control"
                            placeholder="Search in wishlist...">
                        <i class="fa fa-search search-icon-inside"></i>
                    </div>
                </div>

                <div class="custom-dropdown d-flex justify-content-lg-end justify-content-center align-items-center">
                    <div class="sort-dropdown-wrapper">
                        <span class="sort-label">Sort By:</span>
                        <select class="form-control form-control-sm shadow-none" id="wishlist-sort">
                            <option value="default">Default</option>
                            <option value="low">Price: Low to High</option>
                            <option value="high">Price: High to Low</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="products-list mt-4">
                <div class="row" id="wishlist-container">

                    <?php if (!empty($wishlist_products)) {
                        foreach ($wishlist_products as $product) { ?>

                            <?php
                            $this->load->view('partials/product_card', [
                                'product' => $product,
                                'container_id' => 'wishlist-box-' . $product->id,
                                'show_add_to_cart' => true,
                                'add_to_cart_id' => 'cart-btn-' . $product->id,
                                'add_to_cart_onclick' => "addToCart({$product->id}, '" . addslashes($product->product_name) . "', {$product->selling_price})",
                                'wishlist_active' => true
                            ]);
                            ?>

                        <?php }
                    } else { ?>
                        <div class="col-12 text-center py-5">
                            <h4>Your wishlist is empty.</h4>
                            <a href="<?= base_url() ?>" class="btn btn-solid mt-3">Continue Shopping</a>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
</div>
</section>

<script>
    $(document).ready(function () {
        // Check cart status for wishlist items on page load
        $('.add-button').each(function () {
            var $btn = $(this);
            var productId = $btn.attr('onclick');
            if (productId) {
                // Extract product ID from onclick attribute
                var match = productId.match(/addToCart\((\d+)/);
                if (match && match[1]) {
                    productId = match[1];
                    var userId = '<?= $this->session->userdata("user_id") ?>';

                    if (userId) {
                        $.ajax({
                            url: '<?= base_url("api/checkCartStatus") ?>',
                            type: 'POST',
                            data: { product_id: productId },
                            dataType: 'json',
                            success: function (response) {
                                if (response.in_cart) {
                                    $btn.text('View Cart');
                                    $btn.removeAttr('onclick');
                                    $btn.off('click').on('click', function (e) {
                                        e.preventDefault();
                                        window.location.href = '<?= base_url("cart") ?>';
                                    });
                                    $btn.removeClass('add-button').addClass('view-cart-btn');
                                    // Don't set inline styles - let CSS handle it for hover to work
                                }
                            }
                        });
                    }
                }
            }
        });

        // Wishlist Remove Function
        $('.wishlist-remove').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            var btn = $(this);
            var productId = btn.data('id');

            $.ajax({
                url: '<?= base_url("Main/toggle_wishlist") ?>',
                type: 'POST',
                dataType: 'json',
                data: { product_id: productId },
                success: function (response) {
                    if (response.status) {
                        if (response.action == 'removed') {
                            $('#wishlist-box-' + productId).fadeOut(300, function () { $(this).remove(); });
                        } else {
                            alert(response.message);
                        }
                    } else {
                        alert(response.message);
                        if (response.message.includes('login')) {
                            window.location.href = "<?= base_url('login') ?>";
                        }
                    }
                }
            });
        });

        // Search Filter
        $('#wishlist-search').on('keyup', function () {
            var value = $(this).val().toLowerCase();
            $("#wishlist-container > div").filter(function () {
                $(this).toggle($(this).data('name').indexOf(value) > -1)
            });
        });

        // Sort Function
        $('#wishlist-sort').on('change', function () {
            var sortValue = $(this).val();
            var $wrapper = $('#wishlist-container');

            $wrapper.find('> div').sort(function (a, b) {
                var priceA = parseFloat($(a).data('price'));
                var priceB = parseFloat($(b).data('price'));

                if (sortValue === 'low') return priceA - priceB;
                if (sortValue === 'high') return priceB - priceA;
                return 0;
            }).appendTo($wrapper);
        });
    });

    // Add to Cart Function
    function addToCart(id, name, price) {
        var $btn = $('#cart-btn-' + id);
        if ($btn.length === 0) {
            $btn = $('button[onclick*="addToCart(' + id + ')"]');
        }

        // Disable button to prevent multiple clicks
        $btn.prop('disabled', true);

        $.ajax({
            url: '<?= base_url("api/product/addtocart") ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                product_id: id,
                quantity: 1,
                price: price,
                namecake: null,
                weight: null
            },
            success: function (response) {
                // Parse response if it's a string
                if (typeof response === 'string') {
                    try {
                        response = JSON.parse(response);
                    } catch (e) {
                        console.error('Failed to parse response:', e);
                        toastr.error('Error adding product to cart');
                        $btn.prop('disabled', false);
                        return;
                    }
                }

                console.log('Cart response:', response);

                if (response.status === 'login') {
                    window.location.href = '<?= base_url("login") ?>';
                } else if (response.status === 'success') {
                    // Change button to View Cart with same style as Add to Cart
                    $btn.text('View Cart');
                    $btn.removeAttr('onclick');
                    $btn.off('click').on('click', function (e) {
                        e.preventDefault();
                        window.location.href = '<?= base_url("cart") ?>';
                    });
                    $btn.removeClass('add-button').addClass('view-cart-btn');
                    // Remove any inline styles that might interfere with CSS hover
                    $btn.css({
                        'background-color': '',
                        'color': '',
                        'position': '',
                        'width': '',
                        'bottom': '',
                        'padding': '',
                        'border': ''
                    });
                    $btn.prop('disabled', false);
                    toastr.success(response.message || 'Product added to cart');
                    refreshCartCount();
                    if (typeof refreshWishlistCount === 'function') {
                        refreshWishlistCount();
                    } else if (typeof window.refreshWishlistCount === 'function') {
                        window.refreshWishlistCount();
                    }
                } else if (response.status === 'error' && response.message && response.message.includes('already in cart')) {
                    // Product already in cart - change button to View Cart and navigate
                    $btn.text('View Cart');
                    $btn.removeAttr('onclick');
                    $btn.off('click').on('click', function (e) {
                        e.preventDefault();
                        window.location.href = '<?= base_url("cart") ?>';
                        return false;
                    });
                    $btn.removeClass('add-button').addClass('view-cart-btn');
                    // Navigate to cart immediately
                    window.location.href = '<?= base_url("cart") ?>';
                    $btn.prop('disabled', false);
                } else {
                    toastr.error(response.message || 'Failed to add product to cart');
                    $btn.prop('disabled', false);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error adding product to cart:", error);
                console.error("XHR:", xhr);
                console.error("Status:", status);

                // Try to parse error response
                var errorMessage = 'Error adding product to cart';
                var errorResponse = null;
                if (xhr.responseText) {
                    try {
                        errorResponse = JSON.parse(xhr.responseText);
                        errorMessage = errorResponse.message || errorMessage;
                    } catch (e) {
                        // If response is HTML, try to extract error
                        if (xhr.status === 500) {
                            errorMessage = 'Server error. Please try again later.';
                        } else if (xhr.status === 404) {
                            errorMessage = 'API endpoint not found. Please contact support.';
                        } else {
                            errorMessage = xhr.responseText.substring(0, 100) || errorMessage;
                        }
                    }
                }

                // If product is already in cart, change button to View Cart and navigate
                if (errorResponse && errorResponse.message && errorResponse.message.includes('already in cart')) {
                    $btn.text('View Cart');
                    $btn.removeAttr('onclick');
                    $btn.off('click').on('click', function (e) {
                        e.preventDefault();
                        window.location.href = '<?= base_url("cart") ?>';
                        return false;
                    });
                    $btn.removeClass('add-button').addClass('view-cart-btn');
                    // Navigate to cart
                    window.location.href = '<?= base_url("cart") ?>';
                } else {
                    toastr.error(errorMessage);
                }
                $btn.prop('disabled', false);
            }
        });
    }
</script>
</div>