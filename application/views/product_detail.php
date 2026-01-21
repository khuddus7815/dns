<!-- section start -->
<?php
// Initialize variables
$cart_quantity = 1; // Default quantity
$cart_id = null; // Default cart ID

// Iterate through the cart items to find the cart ID and quantity of the product
foreach ($carts as $item) {
    if ($item->id == $product->id) {
        $cart_id = $item->id;
        $cart_quantity = $item->quantity;
        break; // Exit the loop once the product is found in the cart
    }
}
?>
<section class="margin-top">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-10 col-xs-12">
                    <div class="product-right-slick">
                        <?php if (!empty($product->product_img1)): ?>
                            <div><img src="<?php echo base_url('upload/productimg/' . $product->product_img1); ?>" alt=""
                                    class="img-fluid img-curved blur-up lazyload image_zoom_cls-0"></div>
                        <?php endif; ?>
                        <?php if (!empty($product->product_img2)): ?>
                            <div><img src="<?php echo base_url('upload/productimg/' . $product->product_img2); ?>" alt=""
                                    class="img-fluid img-curved blur-up lazyload image_zoom_cls-0"></div>
                        <?php endif; ?>
                        <?php if (!empty($product->product_img3)): ?>
                            <div><img src="<?php echo base_url('upload/productimg/' . $product->product_img3); ?>" alt=""
                                    class="img-fluid img-curved blur-up lazyload image_zoom_cls-0"></div>
                        <?php endif; ?>
                        <?php if (!empty($product->product_img4)): ?>
                            <div><img src="<?php echo base_url('upload/productimg/' . $product->product_img4); ?>" alt=""
                                    class="img-fluid img-curved blur-up lazyload image_zoom_cls-0"></div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (!empty($product->product_img2) || !empty($product->product_img3) || !empty($product->product_img4)): ?>
                    <div class="col-lg-1 col-sm-2 col-xs-12">
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-right-nav slider-body">
                                    <?php if (!empty($product->product_img1)): ?>
                                        <div class="slider-img-card"><img
                                                src="<?php echo base_url('upload/productimg/' . $product->product_img1); ?>"
                                                alt="" class="img-fluid img-curved blur-up lazyload"></div>
                                    <?php endif; ?>
                                    <?php if (!empty($product->product_img2)): ?>
                                        <div class="slider-img-card"><img
                                                src="<?php echo base_url('upload/productimg/' . $product->product_img2); ?>"
                                                alt="" class="img-fluid img-curved blur-up lazyload"></div>
                                    <?php endif; ?>
                                    <?php if (!empty($product->product_img3)): ?>
                                        <div class="slider-img-card"><img
                                                src="<?php echo base_url('upload/productimg/' . $product->product_img3); ?>"
                                                alt="" class="img-fluid img-curved blur-up lazyload"></div>
                                    <?php endif; ?>
                                    <?php if (!empty($product->product_img4)): ?>
                                        <div class="slider-img-card"><img
                                                src="<?php echo base_url('upload/productimg/' . $product->product_img4); ?>"
                                                alt="" class="img-fluid img-curved blur-up lazyload"></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- <?php echo print_r($product); ?> -->
                <div class="col-lg-6 rtl-text">
                    <div class="product-right">
                        <div class="d-flex justify-content-between">
                            <h2><?= $product->product_name ?></h2>

                            <!-- <div class="wishlist-btn">
                                <i class="fa fa-heart-o wishlist-heart" aria-hidden="true"></i>
                                <i class="fa fa-heart wishlist-heart"></i>
                            </div> -->
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="price-container">
                                <h4><del>₹<?= $product->price ?></del><span>
                                        <?php echo round((($product->price - $product->selling_price) / $product->price) * 100) . "% OFF"; ?></span>
                                </h4>

                                </span></h4>

                                <h3 class="selling-price">₹<?= $product->selling_price ?></h3>
                            </div>

                            <div class="custom-rating d-inline-flex align-items-center mt-3 modern-rating-badge">
                                <div class="d-flex px-2 py-1 rating golden-rating">
                                    <div class="star">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="rating-count ml-2 golden-text-white">4.5</div>
                                </div>
                                <span class="dot ml-1 mr-1 golden-text">&#8226;</span>
                                <div class="review-count golden-text">20 reviews</div>
                            </div>
                        </div>
                        <!-- Delivery Options removed as requested -->
                        <div class="product-description border-product">
                            <?php if ($product->category_id == 16): ?>
                                <h6 class="product-title size-text">Weight
                                    <span><a href="#" class="serving-info-btn" data-bs-toggle="modal"
                                            data-bs-target="#infomodel">Serving Info <i class="fa fa-info-circle"
                                                aria-hidden="true"></i></a></span>
                                </h6>
                                <div class="modal fade theme-modal" id="infomodel" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content serving-info">
                                            <div class="d-flex align-items-center mx-3">
                                                <h3>Serving Information</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="card m-3">
                                                <ul>
                                                    <li><span class="item-required">0.5Kg</span><span
                                                            class="server-to-people">4 - 6 Person</span></li>
                                                    <li><span class="item-required">1Kg</span><span
                                                            class="server-to-people">10 - 12 Person</span></li>
                                                    <li><span class="item-required">1.5Kg</span><span
                                                            class="server-to-people">14 - 16 Person</span></li>
                                                    <li><span class="item-required">2Kg</span><span
                                                            class="server-to-people">20 - 22 Person</span></li>
                                                    <li><span class="item-required">2.5Kg</span><span
                                                            class="server-to-people">24 - 26 Person</span></li>
                                                    <li><span class="item-required">3Kg</span><span
                                                            class="server-to-people">30 - 32 Person</span></li>
                                                    <li><span class="item-required">4Kg</span><span
                                                            class="server-to-people">40 - 42 Person</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="size-box">
                                    <ul>
                                        <li class="active"><a href="#">0.5 Kg</a></li>
                                        <li><a href="#">1 Kg</a></li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <!--<h6 class="product-title">quantity</h6>
                            <div class="qty-box">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-minus"></i></button>
                                    </span>
                                    <input type="text" id="quantity-input" name="quantity" class="form-control input-number" value="<?php echo $cart_quantity; ?>">
                                    <span class="input-group-prepend">
                                        <button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-plus"></i></button>
                                    </span>
                                </div>
                            </div> -->
                            <div class="col-8 p-0 mt-3 product-input-group">
                                <?php if ($product->category_id == 16): ?>
                                    <div class="form-group">
                                        <label for="name">Name on the cake</label>
                                        <input type="text" name="namecake" class="form-control name-on-cake-input"
                                            id="namecake" placeholder="write name here"
                                            style="border-radius: 10px; border: 1px solid #ddd;">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div>
                            <h6><i class="fa fa-truck timer-remaining" aria-hidden="true"></i> Get today! Order within
                                <span class="timer-remaining">0hr 3min 18sec</span>
                            </h6>
                        </div>
                        <div class="product-buttons d-flex gap-2">
                            <?php if ($cart_id !== null): ?>
                                <a href="<?php echo base_url('/cart'); ?>" class="btn btn-outline flex-fill">View Cart</a>
                            <?php else: ?>
                                <a href="#" class="btn btn-outline addtocart flex-fill"
                                    data-product-id="<?= $product->id ?>" data-category-id="<?= $product->category_id ?>"
                                    data-bs-toggle="modal" data-bs-target="#addtocart">Add to Cart</a>
                            <?php endif; ?>
                            <a href="javascript:void(0)" class="btn btn-solid flex-fill buy-now-btn">Buy Now</a>
                        </div>




                        <div class="border-product">
                            <h6 class="product-title">product details</h6>
                            <!-- <p><?php echo '<pre>';
                            print_r($carts); ?></p> -->
                            <p><?php echo $product->description; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    /* Equal Height Reviews */
    .testimonial .slide-2 .slick-track {
        display: flex !important;
    }

    .testimonial .slide-2 .slick-slide {
        height: auto;
        display: flex;
        justify-content: center;
    }

    .testimonial .slide-2 .slick-slide>div {
        width: 100%;
        display: flex;
    }

    .testimonial .media {
        width: 100%;
        height: 100%;
        /* Force full height */
        align-items: center;
        /* Vertically center content if needed, or stretch */
    }
</style>

<section class="testimonial small-section my-5">
    <div class="container">
        <div class="title1 section-t-space">
            <h2 class="title-inner1">Customer Reviews</h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="slide-2 testimonial-slider no-arrow">
                    <?php if (!empty($latest_reviews)): ?>
                        <?php foreach ($latest_reviews as $review):
                            $user_name = trim($review->first_name . ' ' . $review->last_name);
                            if (empty($user_name))
                                $user_name = 'Customer';

                            $user_img = base_url('assets/images/fashion/lookbook/1.jpg'); // Default fallback
                            if (!empty($review->user_image)) {
                                $user_img = base_url('upload/profile/' . $review->user_image);
                            }
                            ?>
                            <div>
                                <div class="media p-4 m-2">
                                    <div class="text-center my-auto">
                                        <img src="<?= $user_img ?>" alt="<?= htmlspecialchars($user_name) ?>"
                                            style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
                                        <h5><?= htmlspecialchars($user_name) ?></h5>
                                    </div>
                                    <div class="media-body">
                                        <div class="rating">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <i class="fa fa-star <?= $i <= $review->rating ? '' : 'text-muted' ?>"
                                                    style="<?= $i <= $review->rating ? 'color: #ff4c3b;' : '' ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <p><?= htmlspecialchars($review->review) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Fallback if no reviews yet -->
                        <div>
                            <div class="media p-4 m-2">
                                <div class="media-body text-center">
                                    <p>No reviews yet. Be the first to share your experience!</p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .extra-related-product {
        display: none;
    }
</style>
<section class="pt-0 ratio_asos products-list mb-5 container">
    <div class="py-3">
        <div class="title1 section-t-space mt-2">
            <h2 class="title-inner1">Related Products</h2>
        </div>
        <div class="row">
            <?php
            $count = 0;
            foreach ($relatedProducts as $relproduct):
                $extraClass = ($count >= 8) ? 'extra-related-product' : '';
                ?>
                <?php $this->load->view('partials/product_card', ['product' => $relproduct, 'col_classes' => 'col-xl-3 col-md-4 col-6 ' . $extraClass]); ?>
                <?php
                $count++;
            endforeach;
            ?>
        </div>
        <?php if (count($relatedProducts) > 8): ?>
            <div class="text-center mt-4">
                <button id="viewAllRelated" class="btn btn-solid">View All</button>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Full screen modal -->



<div class="modal fade theme-modal cart-modal" id="addtocart" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content" style="height: 100vh;">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"><span>&times;</span></button>
            </div>
            <div class="modal-body modal1" style="overflow-y: auto;">
                <div class="container">
                    <h3 class="modal-title m-2">Customers who bought this item also</h3>
                    <div class="shortcut-btn">
                        <div class="d-flex justify-content-start">
                            <a href="#" class="btn btn-outline m-2 btn-subcategory active"
                                data-subcategory-id="all">All</a>
                            <?php foreach ($subcategoriesbyid as $subcategory): ?>
                                <a href="#" class="btn btn-outline m-2 btn-subcategory"
                                    data-subcategory-id="<?= $subcategory->id ?>"><?= $subcategory->subcategory_name ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>


                    <div class="tab-contents">
                        <div id="tab-content-all" class="tab-content active">
                            <div class="">
                                <div class="row">
                                    <?php if (empty($addons)): ?>
                                        <div class="col">
                                            <div class="alert alert-info" role="alert">
                                                No addons available.
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <?php foreach ($addons as $addon): ?>
                                            <div class="product-box pb-lg-5 pb-3 add-to-cart-card col-md-3">
                                                <div class="card p-2 m-2">
                                                    <div class="">
                                                        <div class="front">
                                                            <a href="#">
                                                                <img src="<?= base_url('upload/productimg/') . $addon->product_img1 ?>"
                                                                    class="img-fluid blur-up mb-1 lazyloaded addon-img"
                                                                    alt="<?= $addon->product_name ?>">
                                                            </a>
                                                        </div>
                                                        <div class="product-detail">
                                                            <h6 class="product-title"><a
                                                                    href="#"><?= $addon->product_name ?></a></h6>
                                                            <h4 class="mt-2"><span>$</span><?= $addon->selling_price ?></h4>
                                                        </div>
                                                        <a href="#" class="btn btn-outline add-btn"
                                                            data-parent-id="<?= $product->id ?>"
                                                            data-addon-id="<?= $addon->id ?>"
                                                            data-price="<?= $addon->selling_price ?>">Add</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>

                        <?php foreach ($subcategoriesbyid as $subcategory): ?>
                            <div id="tab-content-<?= $subcategory->id ?>" class="tab-content">
                                <div class="">
                                    <div class="row">
                                        <?php $addons_exist = false; ?>
                                        <?php foreach ($addons as $addon): ?>
                                            <?php if ($addon->subcategory_id == $subcategory->id): ?>
                                                <div class="product-box pb-lg-5 pb-3 add-to-cart-card col-md-3">
                                                    <div class="card p-2 m-2">
                                                        <div class="">
                                                            <div class="front">
                                                                <a href="#">
                                                                    <img src="<?= base_url('upload/productimg/') . $addon->product_img1 ?>"
                                                                        class="img-fluid blur-up mb-1 lazyloaded addon-img"
                                                                        alt="<?= $addon->product_name ?>">
                                                                </a>
                                                            </div>
                                                            <div class="product-detail">
                                                                <h6 class="product-title"><a
                                                                        href="#"><?= $addon->product_name ?></a></h6>
                                                                <h4 class="mt-2"><span>$<?= $addon->selling_price ?></span></h4>
                                                            </div>
                                                            <a href="#" class="btn btn-outline add-btn"
                                                                data-parent-id="<?= $product->id ?>"
                                                                data-addon-id="<?= $addon->id ?>"
                                                                data-price="<?= $addon->selling_price ?>">Add</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $addons_exist = true; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                        <?php if (!$addons_exist): ?>
                                            <div class="col">
                                                <div class="alert alert-info" role="alert">
                                                    No addons available for this subcategory.
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>


            <div class="modal-footer" style="padding-bottom: 60px;">
                <button type="button" class="btn btn-outline" id="skipButton" data-bs-dismiss="modal">Skip</button>
                <a href="<?= base_url('/cart'); ?>" class="btn btn-solid">Continue</a>
            </div>

        </div>
    </div>
</div>

<!-- Add to cart modal popup end-->


<script>
    $(document).ready(function () {
        var sellingPrice = <?= $product->selling_price ?>;

        // Function to update price based on quantity
        function updatePrice(sellingPrice, quantity) {
            var totalPrice = sellingPrice * quantity;
            console.log(totalPrice);
            $('.selling-price').text('₹' + totalPrice);
        }

        // Event handler for quantity change
        $('#quantity-input').on('input', function () {
            // Get the entered quantity
            var quantity = parseInt($(this).val(), 10);

            console.log(quantity);

            // Update price and perform other actions
            updatePrice(sellingPrice, quantity);
        });

        $('.quantity-right-plus').click(function () {
            var quantity = parseInt($('#quantity-input').val(), 10);
            console.log(quantity);
            updatePrice(sellingPrice, quantity);

        });

        // Click event handler for minus button
        $('.quantity-left-minus').click(function () {
            var quantity = parseInt($('#quantity-input').val(), 10);
            console.log(quantity);
            updatePrice(sellingPrice, quantity);

        });



        // Handle View Cart button click - navigate directly to cart
        $(document).on('click', '.view-cart-btn', function (e) {
            e.preventDefault();
            window.location.href = '<?php echo base_url('/cart'); ?>';
            return false;
        });

        $('.addtocart').click(function (event) {
            event.preventDefault();
            var $btn = $(this);

            // If button is already View Cart, navigate to cart instead
            if ($btn.hasClass('view-cart-btn')) {
                window.location.href = '<?php echo base_url('/cart'); ?>';
                return false;
            }

            var sellingPrice = <?= $product->selling_price ?>;
            var productId = <?= $product->id ?>;
            var categoryId = <?= $product->category_id ?>;
            var quantity = parseInt($('input[name="quantity"]').val(), 10);

            if (isNaN(quantity) || quantity <= 0) {
                quantity = 1;
            }

            var namecake = $('input[name="namecake"]').val();
            var selectedWeight = $('.size-box ul li.active a').text();
            var price = sellingPrice * quantity;
            $.ajax({
                url: '<?php echo base_url("api/product/addtocart"); ?>',
                type: 'POST',
                data: {
                    product_id: productId,
                    quantity: quantity,
                    price: price,
                    namecake: namecake,
                    weight: selectedWeight
                },
                success: function (response) {
                    // Parse response if it's a string
                    if (typeof response === 'string') {
                        try {
                            response = JSON.parse(response);
                        } catch (e) {
                            console.error('Failed to parse response:', e);
                            toastr.error('Error adding product to cart');
                            return;
                        }
                    }

                    console.log('Cart response:', response);

                    if (response.status === 'login') {
                        window.location.href = '<?php echo base_url("login"); ?>';
                    } else if (response.status === 'success') {
                        // Change button to View Cart with same style as Add to Cart
                        $btn.text('View Cart');
                        $btn.attr('href', '<?php echo base_url('/cart'); ?>');
                        $btn.removeClass('addtocart').addClass('view-cart-btn btn-outline');
                        $btn.removeAttr('data-bs-toggle');
                        $btn.removeAttr('data-bs-target');
                        $btn.removeAttr('data-product-id');
                        $btn.removeAttr('data-category-id');
                        // Store in sessionStorage to persist state
                        sessionStorage.setItem('cart_product_' + productId, 'true');
                        toastr.success(response.message || 'Product added to cart');
                    } else {
                        toastr.error(response.message || 'Failed to add product');
                    }
                    refreshCartCount();
                    if (typeof refreshWishlistCount === 'function') {
                        refreshWishlistCount();
                    } else if (typeof window.refreshWishlistCount === 'function') {
                        window.refreshWishlistCount();
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
                            errorMessage = xhr.responseText || errorMessage;
                        }
                    }

                    // If product is already in cart, change button to View Cart and navigate
                    if (errorResponse && errorResponse.message && errorResponse.message.includes('already in cart')) {
                        $btn.text('View Cart');
                        $btn.attr('href', '<?php echo base_url('/cart'); ?>');
                        $btn.removeClass('addtocart').addClass('view-cart-btn btn-outline');
                        $btn.removeAttr('data-bs-toggle');
                        $btn.removeAttr('data-bs-target');
                        $btn.removeAttr('data-product-id');
                        $btn.removeAttr('data-category-id');
                        // Remove the addtocart click handler and add navigation handler
                        $btn.off('click');
                        $btn.on('click', function (e) {
                            e.preventDefault();
                            window.location.href = '<?php echo base_url('/cart'); ?>';
                            return false;
                        });
                        // Navigate to cart
                        window.location.href = '<?php echo base_url('/cart'); ?>';
                    } else {
                        toastr.error(errorMessage);
                    }
                }
            });

        });

        // Check cart state on page load
        $(document).ready(function () {
            var productId = <?= $product->id ?>;
            var userId = '<?= $this->session->userdata("user_id") ?>';

            if (userId) {
                // Check if product is in cart
                $.ajax({
                    url: '<?php echo base_url("api/checkCartStatus"); ?>',
                    type: 'POST',
                    data: { product_id: productId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.in_cart) {
                            var $btn = $('.addtocart');
                            $btn.text('View Cart');
                            $btn.attr('href', '<?php echo base_url('/cart'); ?>');
                            $btn.removeClass('addtocart').addClass('view-cart-btn btn-outline');
                            $btn.removeAttr('data-bs-toggle');
                            $btn.removeAttr('data-bs-target');
                            $btn.removeAttr('data-product-id');
                            $btn.removeAttr('data-category-id');
                            // Remove the addtocart click handler and add navigation handler
                            $btn.off('click');
                            $btn.on('click', function (e) {
                                e.preventDefault();
                                window.location.href = '<?php echo base_url('/cart'); ?>';
                                return false;
                            });
                        }
                    }
                });
            }
        });

        $('.add-btn').click(function (event) {
            event.preventDefault();
            // FIX: Get the specific price of the add-on from the data-price attribute
            var sellingPrice = $(this).data('price');
            var addonId = $(this).data('addon-id')
            var parentId = <?= $product->id ?>;

            $.ajax({
                url: '<?php echo base_url("api/product/addontocart"); ?>',
                type: 'POST',
                data: {
                    parent_id: parentId,
                    addon_id: addonId,
                    price: sellingPrice
                },
                success: function (response) {
                    // Parse response if it's a string
                    if (typeof response === 'string') {
                        try {
                            response = JSON.parse(response);
                        } catch (e) {
                            console.error('Failed to parse response:', e);
                            toastr.error('Error adding addon to cart');
                            return;
                        }
                    }

                    if (response.status === 'login') {
                        window.location.href = '<?php echo base_url("login"); ?>';
                    } else if (response.status === 'success') {
                        toastr.success('Addon added successfully');
                        // Disable the button to prevent double-adding
                        $(event.target).addClass('disabled').text('Added');
                    } else {
                        toastr.error(response.message || 'Failed to add addon');
                    }
                    refreshCartCount();
                },
                error: function (xhr, status, error) {
                    console.error("Error adding addon:", error);
                    toastr.error("Error adding addon to cart");
                }
            });
        });

        // Fix for Buy Now button
        $('.buy-now-btn').click(function (event) {
            event.preventDefault();
            var $btn = $(this);

            // Disable button to prevent double clicks
            $btn.addClass('disabled').text('Processing...');

            var sellingPrice = <?= $product->selling_price ?>;
            var productId = <?= $product->id ?>;
            var categoryId = <?= $product->category_id ?>;
            var quantity = parseInt($('input[name="quantity"]').val(), 10);

            if (isNaN(quantity) || quantity <= 0) {
                quantity = 1;
            }

            var namecake = $('input[name="namecake"]').val();
            var selectedWeight = $('.size-box ul li.active a').text();
            var price = sellingPrice * quantity;

            $.ajax({
                url: '<?php echo base_url("api/product/addtocart"); ?>',
                type: 'POST',
                data: {
                    product_id: productId,
                    quantity: quantity,
                    price: price,
                    namecake: namecake,
                    weight: selectedWeight
                },
                success: function (response) {
                    // Parse response if it's a string
                    if (typeof response === 'string') {
                        try {
                            response = JSON.parse(response);
                        } catch (e) {
                            console.error('Failed to parse response:', e);
                            toastr.error('Error proceeding to checkout');
                            $btn.removeClass('disabled').text('Buy Now');
                            return;
                        }
                    }

                    if (response.status === 'login') {
                        window.location.href = '<?php echo base_url("login"); ?>';
                    } else if (response.status === 'success' || (response.message && response.message.includes('already in cart'))) {
                        // Redirect to checkout on success
                        window.location.href = '<?php echo base_url("/checkout"); ?>';
                    } else {
                        toastr.error(response.message || 'Failed to proceed');
                        $btn.removeClass('disabled').text('Buy Now');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error in Buy Now:", error);
                    // Try to handle "already in cart" case if it comes as error
                    if (xhr.responseText && xhr.responseText.includes('already in cart')) {
                        window.location.href = '<?php echo base_url("/checkout"); ?>';
                    } else {
                        toastr.error("Error proceeding to checkout");
                        $btn.removeClass('disabled').text('Buy Now');
                    }
                }
            });
        });
    });

    $(document).on('click', '#viewAllRelated', function () {
        $('.extra-related-product').fadeIn();
        $(this).hide();
    });
</script>

<script>
    $(document).ready(function () {
        $('.tab-content').hide();
        $('.tab-content:first').show();
        $('.btn-subcategory').on('click', function (e) {
            e.preventDefault();
            $('.tab-content').hide();
            var subcategoryId = $(this).data('subcategory-id');
            $('#tab-content-' + subcategoryId).show();
        });
        $('.size-box ul li').on('click', function (e) {
            e.preventDefault();
            $('.size-box ul li').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>

<!-- Cart button state is now handled in the AJAX success callback above -->

<script>
    // Add event listener to all add to cart buttons
    document.querySelectorAll('.add-btn').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault(); // Prevent the default behavior of the anchor tag

            // Change the text of the clicked button to 'Added'
            item.textContent = 'Added';
            // Disable the button
            item.disabled = true;

            // Change the href attribute to the cart link
            item.href = "<?php echo base_url('/cart'); ?>";
            // Change the class to remove the 'add-btn' class
            item.className = 'btn btn-outline';
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Regular expression for pincode validation
        var pincodeRegex = /^([1-9]{1}[0-9]{5}|[1-9]{1}[0-9]{3}\s[0-9]{3})$/;

        // Dummy dataset of available pincodes
        var availablePincodes = ['560079', '549302'];

        $('#pincode').keyup(function () {
            var pincode = $(this).val();
            if (pincodeRegex.test(pincode)) {
                $('.error-message').hide();
                if (availablePincodes.includes(pincode)) {
                    $('.location-available').show();
                    $('.location-notavailable').hide();
                } else {
                    $('.location-available').hide();
                    $('.location-notavailable').show();
                }
            } else {
                $('.error-message').show();
                $('.location-available').hide();
                $('.location-notavailable').hide();
            }
        });
    });
</script>

<script>
    document.getElementById('quantity-input').addEventListener('input', function () {
        var inputValue = parseInt(this.value);
        if (isNaN(inputValue) || inputValue < 1) {
            this.value = 1;
        }
    });

    // Allow clearing the input field when the Backspace or Delete key is pressed
    document.getElementById('quantity-input').addEventListener('keydown', function (event) {
        if (event.key === 'Backspace' || event.key === 'Delete') {
            this.value = '';
        }
    });
</script>

<!-- <script>
    $(document).ready(function() {
        // Function to update the visibility of the Skip button
        function updateSkipButtonVisibility() {
            if ($('.add-btn.active').length <= 1) {
                $('#skipButton').hide();
            } else {
                $('#skipButton').show();
            }
        }

        // Event handler for clicking the Add button
        $('.add-btn').on('click', function() {
            $(this).toggleClass('active');
            updateSkipButtonVisibility(); // Update the visibility of the Skip button
        });
    });
</script> -->