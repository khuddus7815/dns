<!--section start-->
<section class="cart-section section-b-space margin-top">
    <div class="container">
        <div class="cart-title d-flex align-items-center">
            <a href="javascript:history.back()" class=""
                style="color: #e4b865; text-decoration: none; margin-right: 25px;">
                <i class="fa fa-arrow-left fa-lg"></i>
            </a>
            <h2 class="mb-0">My Cart</h2>
            <!-- <?php echo '<pre>';
            print_r($carts); ?> -->
        </div>
        <style>
            /* Modern Cart Card Styling */
            .modern-cart-card {
                background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
                border-radius: 20px;
                border: none;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                overflow: hidden;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                margin-bottom: 1.5rem;
            }

            .modern-cart-card:hover {
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
                transform: translateY(-2px);
            }

            .modern-cart-image-wrapper {
                border-radius: 20px 0 0 20px;
                overflow: hidden;
                background: #fff;
                padding: 15px;
            }

            .modern-cart-image {
                border-radius: 15px;
                width: 100%;
                height: 180px;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            .modern-cart-card:hover .modern-cart-image {
                transform: scale(1.05);
            }

            .modern-cart-body {
                padding: 20px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .modern-cart-title {
                font-size: 1.25rem;
                font-weight: 700;
                color: #2c3e50;
                margin-bottom: 12px;
                line-height: 1.4;
            }

            .modern-cart-title a {
                color: #2c3e50;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .modern-cart-title a:hover {
                color: #f3ba75;
            }

            .modern-cart-price-section {
                margin-bottom: 15px;
            }

            .modern-cart-price-row {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 8px;
                flex-wrap: wrap;
            }

            .modern-cart-original-price {
                color: #999;
                font-size: 0.95rem;
                font-weight: 500;
            }

            .modern-cart-original-price del {
                color: #999;
            }

            .modern-cart-discount-badge {
                background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
                color: #fff;
                padding: 4px 12px;
                border-radius: 12px;
                font-weight: 700;
                font-size: 0.8rem;
                box-shadow: 0 2px 8px rgba(243, 186, 117, 0.4);
            }

            .modern-cart-selling-price {
                color: #000000;
                font-size: 1.5rem;
                font-weight: 700;
                margin-top: 5px;
            }

            .modern-cart-delete-icon {
                position: absolute;
                top: 15px;
                right: 15px;
                background: rgba(255, 76, 59, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 50%;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                font-size: 1.2rem;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 2px 8px rgba(255, 76, 59, 0.4);
                z-index: 10;
                border: 2px solid #fff;
            }

            .modern-cart-delete-icon:hover {
                background: rgba(230, 57, 70, 1);
                transform: scale(1.1);
                box-shadow: 0 4px 12px rgba(255, 76, 59, 0.6);
            }

            .modern-cart-card {
                position: relative;
            }

            .modern-cart-quantity-section {
                display: flex;
                align-items: center;
                gap: 15px;
                margin-bottom: 15px;
            }

            .modern-cart-quantity-label {
                font-weight: 600;
                color: #2c3e50;
                font-size: 0.95rem;
            }

            .modern-cart-qty-box {
                display: flex;
                align-items: center;
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                border-radius: 12px;
                padding: 5px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .modern-cart-qty-btn {
                background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
                border: none;
                border-radius: 10px;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                font-weight: 700;
                font-size: 1.2rem;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 2px 6px rgba(243, 186, 117, 0.3);
            }

            .modern-cart-qty-btn:hover {
                background: linear-gradient(135deg, #e8a855 0%, #d49a3d 100%);
                transform: scale(1.1);
                box-shadow: 0 4px 12px rgba(243, 186, 117, 0.5);
            }

            .modern-cart-qty-btn:active {
                transform: scale(0.95);
            }

            .modern-cart-qty-input {
                border: none;
                background: transparent;
                text-align: center;
                font-weight: 700;
                font-size: 1.1rem;
                color: #2c3e50;
                width: 60px;
                padding: 0 10px;
            }

            .modern-cart-qty-input:focus {
                outline: none;
            }

            .modern-cart-total-section {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px;
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                border-radius: 12px;
                margin-bottom: 15px;
            }

            .modern-cart-total-label {
                font-weight: 600;
                color: #2c3e50;
                font-size: 1rem;
            }

            .modern-cart-total-price {
                font-size: 1.4rem;
                font-weight: 700;
                color: #000000;
            }

            @media (max-width: 768px) {
                .modern-cart-image-wrapper {
                    border-radius: 20px 20px 0 0;
                }

                .modern-cart-image {
                    height: 200px;
                }

                .modern-cart-body {
                    padding: 15px;
                }

                .modern-cart-quantity-section {
                    flex-direction: column;
                    align-items: flex-start;
                }
            }

            /* Modern Cart Summary Styling */
            .modern-cart-summary {
                background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
                border-radius: 20px;
                border: none;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                padding: 25px;
                margin-bottom: 2rem;
            }

            .modern-summary-header {
                margin-bottom: 20px;
                padding-bottom: 15px;
                border-bottom: 2px solid #e9ecef;
            }

            .modern-summary-title {
                font-size: 1.5rem;
                font-weight: 700;
                color: #2c3e50;
                margin: 0;
            }

            .modern-summary-content {
                margin-bottom: 20px;
            }

            .modern-summary-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 12px 0;
                border-bottom: 1px solid #f0f0f0;
            }

            .modern-summary-row:last-child {
                border-bottom: none;
            }

            .modern-summary-label {
                font-size: 1rem;
                font-weight: 600;
                color: #495057;
            }

            .modern-summary-value {
                font-size: 1rem;
                font-weight: 600;
                color: #2c3e50;
            }

            .modern-delivery-charge {
                color: #28a745;
            }

            .modern-summary-divider {
                height: 2px;
                background: linear-gradient(90deg, transparent, #e9ecef, transparent);
                margin: 20px 0;
            }

            .modern-summary-total {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px;
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                border-radius: 12px;
                margin-bottom: 20px;
            }

            .modern-summary-total-label {
                font-size: 1.2rem;
                font-weight: 700;
                color: #2c3e50;
                text-transform: uppercase;
            }

            .modern-summary-total-value {
                font-size: 1.8rem;
                font-weight: 700;
                color: #000000;
            }

            .modern-summary-footer {
                margin-top: 20px;
            }

            .modern-summary-note {
                font-size: 0.85rem;
                color: #6c757d;
                text-align: center;
                margin-bottom: 15px;
            }

            .modern-place-order-btn {
                display: inline-block;
                width: 100%;
                padding: 15px 30px;
                background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
                color: #fff;
                font-weight: 700;
                font-size: 1.1rem;
                text-align: center;
                border-radius: 12px;
                text-decoration: none;
                transition: all 0.3s ease;
                box-shadow: 0 4px 12px rgba(243, 186, 117, 0.4);
            }

            .modern-place-order-btn:hover {
                background: linear-gradient(135deg, #e8a855 0%, #d49a3d 100%);
                transform: translateY(-2px);
                box-shadow: 0 6px 16px rgba(243, 186, 117, 0.5);
                color: #fff;
                text-decoration: none;
            }

            .modern-place-order-btn:active {
                transform: translateY(0);
            }
        </style>

        <div class="row">
            <div class="col-lg-7 col-sm-12 col-xs-12">

                <?php foreach ($carts as $cart):
                    // Calculate discount percentage
                    $discount_percent = 0;
                    $original_price = isset($cart->price) ? $cart->price : $cart->cart_selling_price;
                    if ($original_price > $cart->cart_selling_price) {
                        $discount_percent = round((($original_price - $cart->cart_selling_price) / $original_price) * 100);
                    }
                    $total_price = $cart->cart_selling_price * $cart->quantity;
                    ?>
                    <div class="card modern-cart-card">
                        <a href="<?= base_url('cartitems/delete/' . $cart->id) ?>" class="modern-cart-delete-icon"
                            title="Remove from cart">
                            <i class="fa fa-trash-o"></i>
                        </a>
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="modern-cart-image-wrapper">
                                    <a href="<?= base_url('product/' . $cart->id); ?>">
                                        <img src="<?= base_url('upload/productimg/') . $cart->product_img1 ?>"
                                            alt="<?= $cart->product_name ?>" class="modern-cart-image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="modern-cart-body">
                                    <div>
                                        <h3 class="modern-cart-title">
                                            <a
                                                href="<?= base_url('product/' . $cart->id); ?>"><?= $cart->product_name ?></a>
                                        </h3>
                                        <?php if (!empty($cart->unit)): ?>
                                            <div class="modern-cart-item-meta"
                                                style="margin-top: -8px; margin-bottom: 10px; color: #666; font-size: 0.9rem;">
                                                <i class="fa fa-balance-scale"></i> Weight:
                                                <strong><?= htmlspecialchars($cart->unit) ?></strong>
                                            </div>
                                        <?php endif; ?>

                                        <div class="modern-cart-price-section">
                                            <div class="modern-cart-price-row">
                                                <?php if ($discount_percent > 0): ?>
                                                    <span class="modern-cart-original-price">
                                                        <del>₹<?= number_format($original_price, 2) ?></del>
                                                    </span>
                                                    <span class="modern-cart-discount-badge"><?= $discount_percent ?>%
                                                        OFF</span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="modern-cart-selling-price">
                                                ₹<?= number_format($cart->cart_selling_price, 2) ?></div>
                                        </div>

                                        <div class="modern-cart-quantity-section">
                                            <span class="modern-cart-quantity-label">Quantity:</span>
                                            <div class="modern-cart-qty-box">
                                                <button type="button" class="modern-cart-qty-btn quantity-left-minus"
                                                    data-type="minus" data-field="" data-product-id="<?= $cart->id ?>"
                                                    data-sellingprice="<?= $cart->cart_selling_price ?>">
                                                    <i class="ti-minus"></i>
                                                </button>
                                                <input type="text" name="quantity"
                                                    class="modern-cart-qty-input input-number"
                                                    value="<?= $cart->quantity ?>" data-product-id="<?= $cart->id ?>"
                                                    data-sellingprice="<?= $cart->cart_selling_price ?>">
                                                <button type="button" class="modern-cart-qty-btn quantity-right-plus"
                                                    data-type="plus" data-field="" data-product-id="<?= $cart->id ?>"
                                                    data-sellingprice="<?= $cart->cart_selling_price ?>">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="modern-cart-total-section">
                                            <span class="modern-cart-total-label">Total Price:</span>
                                            <span class="modern-cart-total-price total-price-<?= $cart->id ?>"
                                                data-cart-id="<?= $cart->id ?>">₹<?= number_format($total_price, 2) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            if (sizeof($carts) > 0) {
                ?>
                <div class="col-lg-5 col-sm-12 col-xs-12">
                    <div class="modern-cart-summary sticky-summary" style="position: sticky; top: 100px;">
                        <div class="modern-summary-header">
                            <h3 class="modern-summary-title">Cart Summary</h3>
                        </div>

                        <div class="modern-summary-content">
                            <div class="modern-summary-row">
                                <span class="modern-summary-label">Subtotal</span>
                                <span class="modern-summary-value">₹<span id="cart-subtotal">0.00</span></span>
                            </div>

                            <div class="modern-summary-row">
                                <span class="modern-summary-label">Delivery Charges (<?= $delivery_charge->name ?>)</span>
                                <span class="modern-summary-value modern-delivery-charge">
                                    <?php if ($delivery_charge->amount > 0): ?>
                                        ₹<span id="delivery-amount"><?= number_format($delivery_charge->amount, 2) ?></span>
                                    <?php else: ?>
                                        <span id="delivery-amount" data-value="0" class="text-success">FREE</span>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>

                        <div class="modern-summary-divider"></div>

                        <div class="modern-summary-total">
                            <span class="modern-summary-total-label">Total Amount</span>
                            <span class="modern-summary-total-value">₹<span id="cart-total">0.00</span></span>
                        </div>

                        <div class="modern-summary-footer">
                            <p class="modern-summary-note">Final delivery costs calculated at checkout.</p>
                            <div class="text-center">
                                <a href="<?= base_url('/checkout'); ?>" class="modern-place-order-btn">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>




        <div class="text-center mt-4"><a href="<?php echo base_url('/'); ?>" class="btn btn-solid">Continue Shopping</a>
        </div>

        <!-- Best Selling Section -->
        <style>
            /* Modern Product Card Styling for Cart Page */
            .cart-page .modern-product-card {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                background: #fff;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            }

            .cart-page .modern-product-card:hover {
                box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
                transform: translateY(-8px);
            }

            .cart-page .modern-img-wrapper {
                border-radius: 20px 20px 0 0;
                overflow: hidden;
                background: #f8f9fa;
            }

            .cart-page .modern-product-img {
                transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
                object-fit: cover;
                height: 250px;
            }

            .cart-page .modern-product-card:hover .modern-product-img {
                transform: scale(1.08);
            }

            .cart-page .modern-product-detail {
                border-radius: 0 0 20px 20px;
                background: linear-gradient(to bottom, #fff, #fafafa);
            }

            .cart-page .modern-product-title {
                font-weight: 600;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                color: #2c3e50;
                font-size: 1rem;
                margin-bottom: 8px;
            }

            .cart-page .modern-product-price {
                color: #ff4c3b;
                font-weight: 700;
                font-size: 1.5rem;
                margin: 10px 0;
            }

            /* Golden Brown Rating Badge */
            .cart-page .modern-rating-badge {
                margin-top: 12px;
            }

            .cart-page .golden-rating {
                background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%);
                color: #fff;
                border-radius: 20px;
                padding: 4px 10px;
                box-shadow: 0 2px 8px rgba(212, 175, 55, 0.3);
            }

            .cart-page .golden-rating .star i {
                color: #fff !important;
                font-size: 0.9rem;
            }

            .cart-page .golden-text {
                color: #8B6914 !important;
                font-weight: 500;
                font-size: 0.85rem;
            }

            .cart-page .golden-text-white {
                color: #fff !important;
                font-weight: 600;
                font-size: 0.9rem;
            }

            .cart-page .modern-wishlist-btn {
                position: absolute;
                top: 10px;
                right: 10px;
                z-index: 10;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 50%;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .cart-page .modern-wishlist-btn:hover {
                background: #fff;
                transform: scale(1.1);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            }

            .cart-page .modern-wishlist-btn i {
                color: #fff;
                background-color: #f3ba75;
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

            .cart-page .modern-wishlist-btn.wishlist-active i {
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

            /* New Product Card Design for Cart Page */
            .cart-page .modern-product-detail-new {
                text-align: left;
            }

            .cart-page .modern-product-title-new {
                font-weight: 700 !important;
                color: #2c3e50;
                font-size: 1rem;
                line-height: 1.4;
            }

            .cart-page .modern-rating-badge-new {
                flex-shrink: 0;
                margin-left: 10px;
            }

            .cart-page .price-section-new {
                margin-top: 8px;
            }

            .cart-page .original-price-new {
                color: #999;
                font-size: 0.9rem;
                font-weight: 400;
            }

            .cart-page .original-price-new del {
                color: #999;
            }

            .cart-page .discount-percent-new {
                background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
                color: #fff;
                padding: 2px 8px;
                border-radius: 10px;
                font-weight: 700;
                font-size: 0.75rem;
                display: inline-block;
                box-shadow: 0 2px 6px rgba(243, 186, 117, 0.4);
            }

            .cart-page .modern-product-price-new {
                color: #ff4c3b;
                font-weight: 700;
                font-size: 1.4rem;
                margin-top: 4px;
            }
        </style>

        <section class="pt-0 section-b-space ratio_asos products-list cart-page">
            <div class="carousel-wrapper py-3">
                <div class="title1 section-t-space">
                    <h2 class="title-inner1">Best Selling</h2>
                </div>
                <div class="game-product d-flex " id="productCarousel3">
                    <?php foreach ($products as $product): ?>
                        <div class="product-box deal-cards flex-fill">
                            <div class="card m-2 h-100 modern-product-card border-0">
                                <div class="img-wrapper position-relative modern-img-wrapper">
                                    <div class="front">
                                        <a href="<?= base_url('product/' . $product->product_id); ?>">
                                            <img src="<?= base_url('upload/productimg/' . $product->product_img1); ?>"
                                                class="img-fluid blur-up lazyload bg-img w-100 modern-product-img"
                                                alt="<?= $product->product_name ?>">
                                        </a>
                                    </div>
                                    <div class="cart-info cart-wrap">
                                        <a href="javascript:void(0)" class="wishlist-btn modern-wishlist-btn"
                                            data-id="<?= $product->product_id ?>" title="Add to Wishlist" tabindex="0">
                                            <i class="ti-heart" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-detail p-3 modern-product-detail-new">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <a href="<?= base_url('product/' . $product->product_id); ?>" class="flex-grow-1">
                                            <h6 class="mb-0 modern-product-title-new font-weight-bold">
                                                <?= $product->product_name; ?>
                                            </h6>
                                        </a>
                                        <div class="custom-rating modern-rating-badge-new">
                                            <div class="d-flex px-2 py-1 rating golden-rating">
                                                <div class="star">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-count ml-2 golden-text-white">4.5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-section-new">
                                        <?php
                                        $discount_percent = 0;
                                        if (isset($product->price) && $product->price > $product->selling_price) {
                                            $discount_percent = round((($product->price - $product->selling_price) / $product->price) * 100);
                                        }
                                        ?>
                                        <div class="d-flex align-items-baseline gap-2">
                                            <?php if ($discount_percent > 0): ?>
                                                <h5 class="original-price-new mb-0"><del>₹<?= $product->price; ?></del></h5>
                                                <span class="discount-percent-new"><?= $discount_percent ?>% OFF</span>
                                            <?php endif; ?>
                                        </div>
                                        <h4 class="modern-product-price-new mb-0 font-weight-bold">
                                            ₹<?= $product->selling_price; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="product-box deal-cards flex-fill my-auto">
                        <div class="category-block">
                            <a href="<?= base_url('/category'); ?>">
                                <div class="category-image svg-image">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M16 7.328v-3.328l8 8-8 8v-3.328l-16-4.672z" />
                                    </svg>
                                </div>
                                <div class="category-details">
                                    <h5>View All</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-controls">
                    <button id="prevBtn3" class="carousel-control-btn prevBtn">&#10094;</button>
                    <button id="nextBtn3" class="carousel-control-btn nextBtn">&#10095;</button>
                </div>
            </div>
        </section>


    </div>
</section>
<!--section end-->
<!-- <script>
    $(document).ready(function() {
        // Function to update total price
        function updateTotalPrice() {
            let totalPrice = 0;
            $('[class^="total-price-"]').each(function() {
                totalPrice += parseFloat($(this).text());
            });
            $('#cart-total').text(totalPrice.toFixed(2)); // Fix: Ensure total price is displayed with 2 decimal places
            console.log('Total price updated:', totalPrice.toFixed(2)); // Fix: Log total price with 2 decimal places
        }

        // Initial calculation of total price
        updateTotalPrice();
        console.log('Initial total price calculated.');

        // Bind the function to input change event for each cart item
        $('input[name="quantity"]').on('change', function() {
            const cartId = $(this).data('product-id');
            const sellingPrice = $(this).data('sellingprice');
            const quantity = $(this).val();
            const totalPriceElement = $('.total-price-' + cartId);
            const total = sellingPrice * quantity;
            totalPriceElement.text(total.toFixed(2)); // Fix: Ensure individual total price is displayed with 2 decimal places
            updateTotalPrice();
            console.log('Quantity changed for cart item ' + cartId + ':', quantity);
            console.log('Total price updated after quantity change:', total.toFixed(2)); // Fix: Log total price with 2 decimal places
        });

        // Bind the function to button click event for each cart item
        // $('.quantity-left-minus, .quantity-right-plus').on('click', function() {
        //     const cartId = $(this).data('product-id');
        //     const sellingPrice = $(this).data('sellingprice');
        //     const quantityElement = $('input[name="quantity"][data-product-id="' + cartId + '"]');
        //     const quantity = parseInt(quantityElement.val());
        //     const totalPriceElement = $('.total-price-' + cartId);
        //     const total = sellingPrice * (quantity + 1);
        //     totalPriceElement.text(total.toFixed(2)); // Fix: Ensure individual total price is displayed with 2 decimal places
        //     updateTotalPrice();
        //     console.log('Button clicked for cart item ' + cartId + ':', $(this).hasClass('quantity-right-plus') ? 'Increment' : 'Decrement');
        //     console.log('Total price updated after button click:', total.toFixed(2)); // Fix: Log total price with 2 decimal places
        // });
    });
</script> -->

<!-- SweetAlert2 for confirmation dialogs -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        // Handle delete icon click with SweetAlert confirmation
        $('.modern-cart-delete-icon').on('click', function (e) {
            e.preventDefault(); // Prevent default link behavior

            var deleteUrl = $(this).attr('href');
            var productId = deleteUrl.split('/').pop(); // Extract product ID from URL

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to remove this item from cart?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f3ba75',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // User confirmed, delete the product
                    deleteProduct(productId);
                }
            });
        });

        // Function to get delivery cost
        function getDeliveryCost() {
            var deliveryCostText = $('#delivery-amount').text().trim();
            var deliveryCost = 0;

            if (deliveryCostText === 'FREE' || deliveryCostText === '') {
                deliveryCost = 0;
            } else {
                // Remove ₹ symbol and any commas, then parse
                deliveryCostText = deliveryCostText.replace('₹', '').replace(/,/g, '').trim();
                deliveryCost = parseFloat(deliveryCostText) || 0;
            }

            // Also check data-value attribute if available
            var dataValue = $('#delivery-amount').data('value');
            if (dataValue !== undefined && dataValue !== null) {
                deliveryCost = parseFloat(dataValue) || 0;
            }

            return deliveryCost;
        }

        function updateTotalPrice() {
            let subtotal = 0;

            // Get all elements with class that starts with "total-price-" within cart cards
            $('.modern-cart-card [class*="total-price-"]').each(function () {
                // Get the text content
                var priceText = $(this).text().trim();

                // Remove ₹ symbol and commas
                priceText = priceText.replace('₹', '').replace(/,/g, '').trim();

                // Parse the value
                var priceValue = parseFloat(priceText);

                if (!isNaN(priceValue) && priceValue > 0) {
                    subtotal += priceValue;
                    console.log('Added price:', priceValue, 'Subtotal so far:', subtotal);
                }
            });

            // Update Subtotal Display
            $('#cart-subtotal').text(subtotal.toFixed(2));

            // Get delivery cost
            var deliveryCost = getDeliveryCost();

            // Calculate Grand Total (Subtotal + Delivery)
            let grandTotal = subtotal + deliveryCost;

            // Update Grand Total Display
            $('#cart-total').text(grandTotal.toFixed(2));

            console.log('Final Calculation - Subtotal:', subtotal, 'Delivery:', deliveryCost, 'Total:', grandTotal);
        }

        // Calculate initial totals on page load
        setTimeout(function () {
            updateTotalPrice();
            console.log('Initial total price calculated.');
        }, 100);



        // Event handler for quantity change
        $('input[name="quantity"]').on('input', function () {
            // Remove any non-numeric characters and parse the input value
            var quantity = parseInt($(this).val().replace(/\D/g, ''), 10); // This will remove all non-numeric characters and parse the value

            // Check if the parsed value is NaN (not a number)
            if (isNaN(quantity) || quantity < 1) {
                quantity = 1; // Set quantity to 1 if NaN or less than 1
            }

            var productId = $(this).data('product-id'); // Get the product ID
            var sellingPrice = $(this).closest('.modern-cart-qty-box').find('.quantity-right-plus').data('sellingprice');

            // Validate quantity to prevent going below 1
            if (quantity < 1) {
                quantity = 1;
            }

            // Update the input value with the sanitized quantity
            $(this).val(quantity);

            // Calculate and update total price
            var totalPrice = sellingPrice * quantity;
            const totalPriceElement = $('.total-price-' + productId);
            $(totalPriceElement).text('₹' + totalPrice.toFixed(2));

            // Update cart quantity and total
            updateCartQuantity(productId, quantity);
            updateTotalPrice();
        });



        $('.quantity-right-plus').click(function () {
            var quantity = parseInt($(this).closest('.modern-cart-qty-box').find('input[name="quantity"]').val(), 10) + 1;
            var productId = $(this).data('product-id'); // Get the product ID
            var sellingPrice = parseFloat($(this).data('sellingprice'));
            var totalPrice = sellingPrice * quantity;
            const totalPriceElement = $('.total-price-' + productId);
            $(totalPriceElement).text('₹' + totalPrice.toFixed(2));

            // Update input value
            $(this).closest('.modern-cart-qty-box').find('input[name="quantity"]').val(quantity);

            console.log('Increment clicked. Quantity:', quantity, 'Selling Price:', sellingPrice, 'Total:', totalPrice);

            updateCartQuantity(productId, quantity);
            updateTotalPrice();
        });

        $('.quantity-left-minus').click(function () {
            var quantity = parseInt($(this).closest('.modern-cart-qty-box').find('input[name="quantity"]').val(), 10) - 1;
            var productId = $(this).data('product-id'); // Get the product ID
            var sellingPrice = parseFloat($(this).data('sellingprice'));

            // Validate quantity to prevent going below 1
            if (quantity < 1) {
                quantity = 1;
            }

            var totalPrice = sellingPrice * quantity;
            const totalPriceElement = $('.total-price-' + productId);
            $(totalPriceElement).text('₹' + totalPrice.toFixed(2));

            // Update input value
            $(this).closest('.modern-cart-qty-box').find('input[name="quantity"]').val(quantity);

            console.log('Decrement clicked. Quantity:', quantity, 'Selling Price:', sellingPrice, 'Total:', totalPrice);

            updateCartQuantity(productId, quantity);
            updateTotalPrice();
        });

        function deleteProduct(productId) {
            // Show loading state
            Swal.fire({
                title: 'Removing item...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '<?= base_url('cartitems/delete/') ?>' + productId,
                type: 'GET',
                success: function (response) {
                    // Handle success response
                    console.log(response);

                    // Show success message
                    Swal.fire({
                        title: 'Removed!',
                        text: 'Item has been removed from cart.',
                        icon: 'success',
                        confirmButtonColor: '#f3ba75',
                        confirmButtonText: 'OK',
                        timer: 1500,
                        timerProgressBar: true
                    }).then(() => {
                        // Refresh the page after successful deletion
                        window.location.reload();
                    });
                },
                error: function (xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);

                    // Show error message
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed to remove item from cart. Please try again.',
                        icon: 'error',
                        confirmButtonColor: '#f3ba75',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }


        function updateCartQuantity(productId, quantity) {
            $.ajax({
                url: '<?php echo base_url('api/quantity/update/'); ?>' + productId,
                type: 'POST',
                data: {
                    quantity: quantity
                },
                success: function (response) {
                    // Handle success response
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        }
    }); // Closing document ready function
</script>




<!--
<script>
    $(document).ready(function() {
        // Get all elements with class 'total-price'
        var totalPrices = $('.total-price');
        var totalPrice = 0;

        // Iterate through each element except the last one
        totalPrices.each(function(index) {
            if (index < totalPrices.length - 1) {
                // Add the price of each element to totalPrice
                totalPrice += parseInt($(this).data('price'));
                // console.log($(this).data('price'));
            }
        });

        // Output the total price
        // console.log(totalPrice);
        // console.log(typeof totalPrice);
        $('#cart-total').text(totalPrice.toLocaleString());
    });
</script>

<script>
    $(document).ready(function() {
        // Initialize total price
        let totalPrice = 0;

        // Select all elements with class 'total-price' except the last one
        $('.total-price:not(:last)').each(function() {
            // Convert the text content to a number and add it to totalPrice
            totalPrice += parseFloat($(this).text());
        });

        // Set the total price to the text content of the element with id 'cart-total'
        $('#cart-total').text(totalPrice);
    });
</script> -->