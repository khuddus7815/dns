<style>
    /* Modern Variant/Weight Chips */
    .size-box ul li {
        display: inline-block;
        margin-right: 10px;
        margin-bottom: 10px;
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        /* Slightly rounded */
        padding: 5px 0;
        /* Remove horizontal padding from li, put on a */
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .size-box ul li a {
        color: #333;
        font-weight: 500;
        text-decoration: none;
        padding: 8px 16px;
        display: block;
    }

    .size-box ul li:hover {
        background: #fff;
        border-color: #f3ba75;
        box-shadow: 0 2px 8px rgba(243, 186, 117, 0.2);
    }

    .size-box ul li.active {
        background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
        border-color: transparent;
        box-shadow: 0 4px 12px rgba(243, 186, 117, 0.4);
    }

    .size-box ul li.active a {
        color: #fff;
    }

    /* Modern Quantity Control */
    .qty-box .input-group {
        background: #f8f9fa;
        border-radius: 30px;
        /* Pill shape */
        padding: 4px;
        border: 1px solid #e9ecef;
        width: 140px;
        /* Fixed width */
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .qty-box .input-group .btn {
        background: #fff;
        border-radius: 50% !important;
        width: 32px;
        height: 32px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        border: none;
        color: #333;
        transition: all 0.2s;
        z-index: 10;
        /* Ensure clickable */
    }

    .qty-box .input-group .btn:hover {
        background: #f3ba75;
        color: #fff;
        transform: scale(1.1);
    }

    .qty-box .input-group input.form-control {
        background: transparent;
        border: none;
        text-align: center;
        font-weight: 700;
        color: #333;
        height: 32px;
        padding: 0;
        width: 50px;
        /* Adjust width */
        pointer-events: none;
        /* Prevent manual typing if desired, or keep generic */
    }

    /* Remove default focus glows */
    .qty-box .input-group .btn:focus,
    .qty-box .input-group input:focus {
        box-shadow: none;
        outline: none;
    }

    /* Adjust margins for section */
    section.margin-top {
        margin-top: 0 !important;
        padding-top: 20px;
    }

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

<section class="section-b-space" style="padding-top: 10px;">
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
                                <h4><del id="del_price">₹<?= $first_variant_weights_first_price ?></del><span
                                        id="off_percent">
                                        <?php
                                        if ($first_variant_weights_first_price > 0) {
                                            echo round((($first_variant_weights_first_price - $first_variant_weights_first_selling_price) / $first_variant_weights_first_price) * 100) . "% OFF";
                                        } else {
                                            echo "0% OFF";
                                        }
                                        ?></span></h4>

                                </span></h4>
                                <h3 class="selling-price">₹<?= $first_variant_weights_first_selling_price ?></h3>
                            </div>
                            <input type="hidden" name="sellingPrice_hidden" id="sellingPrice_hidden"
                                value="<?= $first_variant_weights_first_selling_price ?>">

                            <div class="custom-rating d-inline-flex align-items-center mt-3">
                                <div class="d-flex px-1 rating">
                                    <div class="star">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="rating-count ml-2">4.5</div>
                                </div>
                                <span class="dot ml-1 mr-1">&#8226;</span>
                                <div class="review-count">20 reviews</div>
                            </div>
                        </div>
                        <div class="product-description border-product">
                            <h6 class="product-title size-text">
                                <?= (isset($product->is_weight_status) && $product->is_weight_status == 1) ? 'Weight' : 'Variants' ?>
                                <?php if ($product->category_id == 16 && isset($product->is_weight_status) && $product->is_weight_status == 1): ?>
                                    <span><a href="#" class="serving-info-btn" data-bs-toggle="modal"
                                            data-bs-target="#infomodel">Serving Info <i class="fa fa-info-circle"
                                                aria-hidden="true"></i></a></span>
                                <?php endif; ?>
                            </h6>
                            <div class="size-box">
                                <ul>
                                    <?php
                                    foreach ($variants as $key => $value) {
                                        ?>
                                        <li class="variants <?= ($key == 0) ? 'active' : '' ?>"
                                            data-variant_id='<?= $value->id ?>'
                                            data-variant_name='<?= $value->variant_name ?>'
                                            data-package_value='<?= $value->package_value ?>'
                                            data-variant_price='<?= $value->variant_price ?>'
                                            data-variant_sellingprice='<?= $value->variant_sellingprice ?>'><a
                                                href="javascript:void(0)"><?= $value->variant_name ?></a></li>
                                        <?php


                                    }
                                    ?>
                                </ul>
                            </div>


                            <?php if (!isset($product->is_weight_status) || $product->is_weight_status == 0): ?>
                                <div class="size-box" id="weight_box">
                                    <ul>
                                        <?php
                                        foreach ($first_variant_weights as $key => $value) {
                                            $price_val = is_array($first_variant_prices) ? ($first_variant_prices[$key] ?? 0) : $first_variant_prices;
                                            $sell_price_val = is_array($first_variant_selling_prices) ? ($first_variant_selling_prices[$key] ?? 0) : $first_variant_selling_prices;
                                            ?>
                                            <li class="variant_weight <?= ($key == 0) ? 'active' : '' ?>"
                                                data-weightprice="<?= $price_val ?>"
                                                data-weightsellprice="<?= $sell_price_val ?>" data-weightunit="<?= $value ?>">
                                                <a href="javascript:void(0)"><?= $value ?></a>
                                            </li><?php
                                        }
                                        ?>
                                </div>
                            <?php endif; ?>
                            <h6 class="product-title">quantity</h6>
                            <div class="qty-box">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <button type="button" class="btn quantity-left-minus" data-type="minus"
                                            data-field=""><i class="ti-minus"></i></button>
                                    </span>
                                    <input type="text" id="quantity-input" name="quantity"
                                        class="form-control input-number" value="<?php echo $cart_quantity; ?>"
                                        readonly>
                                    <span class="input-group-prepend">
                                        <button type="button" class="btn quantity-right-plus" data-type="plus"
                                            data-field=""><i class="ti-plus"></i></button>
                                    </span>
                                </div>
                            </div>
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
                        <!-- <div class="product-description border-product variants">
                            <h6 class="product-title size-text">Weight</h6>
                        </div> -->
                        <div>
                            <h6><i class="fa fa-truck timer-remaining" aria-hidden="true"></i> Get today! Order within
                                <span class="timer-remaining">0hr 3min 18sec</span>
                            </h6>
                        </div>
                        <div class="product-buttons">
                            <?php if ($cart_id !== null): ?>
                                <a href="<?php echo base_url('/cart'); ?>" class="btn btn-outline">View Cart</a>
                                <!-- Show as added -->
                            <?php else: ?>
                                <a href="#" class="btn btn-outline addtocart" data-product-id="<?= $product->id ?>"
                                    data-category-id="<?= $product->category_id ?>" data-bs-toggle="modal"
                                    data-bs-target="#addtocart">Add to Cart</a>
                            <?php endif; ?>
                            <a href="javascript:void(0)" class="btn btn-solid buynow">Buy Now</a>
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

<!-- Moved info modal here so it is always present -->
<div class="modal fade theme-modal" id="infomodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content serving-info">
            <div class="d-flex align-items-center mx-3">
                <h3>Serving Information</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="card m-3">
                <ul>
                    <li><span class="item-required">0.5Kg</span><span class="server-to-people">4 - 6 Person</span></li>
                    <li><span class="item-required">1Kg</span><span class="server-to-people">10 - 12 Person</span></li>
                    <li><span class="item-required">1.5Kg</span><span class="server-to-people">14 - 16 Person</span>
                    </li>
                    <li><span class="item-required">2Kg</span><span class="server-to-people">20 - 22 Person</span></li>
                    <li><span class="item-required">2.5Kg</span><span class="server-to-people">24 - 26 Person</span>
                    </li>
                    <li><span class="item-required">3Kg</span><span class="server-to-people">30 - 32 Person</span></li>
                    <li><span class="item-required">4Kg</span><span class="server-to-people">40 - 42 Person</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="pt-0 ratio_asos products-list mb-5 container">
    <div class="carousel-wrapper py-3">
        <div class="title1 section-t-space mt-2">
            <h2 class="title-inner1">Related Products</h2>
        </div>
        <div class="game-product d-flex " id="productCarousel3">
            <?php foreach ($relatedProducts as $relproduct): ?>
                <div class="product-box deal-cards flex-fill">
                    <div class="card m-2">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="<?= base_url('product/' . $relproduct->id); ?>"><img
                                        src="<?php echo base_url('upload/productimg/') . $relproduct->product_img1; ?>"
                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="cart-info cart-wrap">
                                <a href="javascript:void(0)" title="Add to Wishlist" tabindex="0"><i class="ti-heart"
                                        aria-hidden="true"></i></a>
                            </div>

                        </div>
                        <div class="product-detail m-3">
                            <a href="<?php echo base_url('/product'); ?>">
                                <h6><?php echo $relproduct->product_name; ?></h6>
                            </a>
                            <h4 class="mt-2"><?php echo '₹ ' . $relproduct->selling_price; ?></h4>
                            <div class="custom-rating d-inline-flex align-items-center mt-3">
                                <div class="d-flex px-1 rating">
                                    <div class="star">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="rating-count ml-2">5</div>
                                </div>
                                <span class="dot ml-1 mr-1">&#8226;</span>
                                <div class="review-count">5 reviews</div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="carousel-controls">
            <button id="prevBtn3" class="carousel-control-btn prevBtn">&#10094;</button>
            <button id="nextBtn3" class="carousel-control-btn nextBtn">&#10095;</button>
        </div>
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
<!-- <ul>
                                        <li class="active"><a href="#">0.5 Kg</a></li>
                                        <li><a href="#">1 Kg</a></li>
                                    </ul> -->
<input type="hidden" name="variant_id" id="variant_id" value="<?= $variants[0]->id ?>">
<input type="hidden" name="variant_name" id="variant_name" value="<?= $variants[0]->variant_name ?>">
<input type="hidden" name="variant_unit" id="variant_unit"
    value="<?= is_array($first_variant_weights) ? ($first_variant_weights[0] ?? '') : $first_variant_weights ?>">

<script>
    // Function to update price based on quantity
    function updatePrice(sellingPrice, quantity) {
        var sellPrice = $("#sellingPrice_hidden").val();
        var totalPrice = sellPrice * quantity;
        console.log(totalPrice);
        $('.selling-price').text('₹' + totalPrice);
    }

    $(document).on('click', '.variant_weight', function () {
        $(".variant_weight").removeClass('active');
        $(this).addClass('active');
        var weightprice = $(this).data('weightprice');
        var weightunit = $(this).data('weightunit');
        $('#variant_unit').val(weightunit);
        var weightsellprice = $(this).data('weightsellprice');
        var qunty = $('#quantity-input').val();
        $("#del_price").text(weightprice);
        var off_percent = (weightprice > 0) ? Math.round((weightprice - weightsellprice) / weightprice * 100) : 0;
        $("#off_percent").text(off_percent + ' % OFF');
        $("#sellingPrice_hidden").val(weightsellprice);
        updatePrice(weightsellprice, qunty);
    });

    $(document).on('click', '.variants', function () {
        $(".variants").removeClass('active');
        $(this).addClass('active');
        var weights = $(this).data("package_value");
        var variant_price = $(this).data("variant_price");
        var variant_sellingprice = $(this).data("variant_sellingprice");
        var variant_id = $(this).data('variant_id');
        var qunty = $('#quantity-input').val();
        var get_price = function (val, idx) {
            if (Array.isArray(val)) return val[idx];
            return val;
        };

        var p0 = get_price(variant_price, 0);
        var s0 = get_price(variant_sellingprice, 0);
        var v_name = $(this).data('variant_name');

        $("#del_price").text(p0);
        $("#variant_id").val(variant_id);
        $("#variant_name").val(v_name);
        $("#variant_unit").val(Array.isArray(weights) ? weights[0] : weights);

        var off_percent = (p0 > 0) ? Math.round((p0 - s0) / p0 * 100) : 0;
        $("#off_percent").text(off_percent + ' % OFF');
        $("#sellingPrice_hidden").val(s0);
        updatePrice(s0, qunty);

        var weights_element = '<ul>';
        let active = '';

        // Handle both legacy (array) and new (single value) weight data
        if (Array.isArray(weights)) {
            for (var i = 0; i < weights.length; i++) {
                active = (i === 0) ? 'active' : '';
                weights_element += '<li class="variant_weight ' + active + '" ' +
                    'data-weightprice="' + variant_price[i] + '" ' +
                    'data-weightsellprice="' + variant_sellingprice[i] + '" ' +
                    'data-weightunit="' + weights[i] + '">' +
                    '<a href="javascript:void(0)">' + weights[i] + '</a></li>';
            }
        } else {
            // Single weight value (new weight-based system)
            weights_element += '<li class="variant_weight active" ' +
                'data-weightprice="' + variant_price + '" ' +
                'data-weightsellprice="' + variant_sellingprice + '" ' +
                'data-weightunit="' + weights + '">' +
                '<a href="javascript:void(0)">' + weights + '</a></li>';
        }
        weights_element += '</ul>';
        $("#weight_box").html(weights_element);
    });

    $(document).ready(function () {
        var sellingPrice = $("#sellingPrice_hidden").val();

        // Event handler for quantity change
        $('#quantity-input').on('input', function () {
            var quantity = parseInt($(this).val(), 10);
            console.log(quantity);
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

        $('.addtocart, .buynow').click(function (event) {
            event.preventDefault();
            var $btn = $(this);
            var isBuyNow = $btn.hasClass('buynow');

            // If button is already View Cart, navigate to cart instead
            if ($btn.hasClass('view-cart-btn')) {
                window.location.href = '<?php echo base_url('/cart'); ?>';
                return false;
            }
            var sellingPrice = $("#sellingPrice_hidden").val(); var productId = <?= $product->id ?>;
            var categoryId = <?= $product->category_id ?>;
            var variant_id = $("#variant_id").val();
            var variant_unit = $("#variant_unit").val();
            var quantity = parseInt($('input[name="quantity"]').val(), 10);
            var namecake = $('input[name="namecake"]').val();

            var price = sellingPrice * quantity;
            $.ajax({
                url: '<?php echo base_url("api/product/addtocart"); ?>',
                type: 'POST',
                data: {
                    product_id: productId,
                    quantity: quantity,
                    price: price,
                    variant_id: variant_id,
                    namecake: namecake,
                    weight: variant_unit,
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
                        // If it came from Buy Now, redirect to checkout
                        if (isBuyNow) {
                            window.location.href = '<?php echo base_url("/checkout"); ?>';
                            return;
                        }
                        // Change button to View Cart with same style as Add to Cart
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
                        sessionStorage.setItem('cart_product_' + productId, 'true');
                        toastr.success(response.message || 'Product added to cart');
                    } else if (response.status === 'error' && response.message && response.message.includes('already in cart')) {
                        // Product already in cart - change button to View Cart and navigate
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
                        // Navigate to cart immediately
                        window.location.href = '<?php echo base_url('/cart'); ?>';
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
                        }
                    }
                });
            }
        });

        $('.add-btn').click(function (event) {
            event.preventDefault();
            var sellingPrice = <?= $product->selling_price ?>;
            var addonId = $(this).data('addon-id')
            var parentId = <?= $product->id ?>;

            // console.log(sellingPrice + " " + addonId + " " + parentId);

            $.ajax({
                url: '<?php echo base_url("api/product/addontocart"); ?>',
                type: 'POST',
                data: {
                    parent_id: parentId,
                    addon_id: addonId,
                    price: sellingPrice,
                },
                success: function (response) {
                    if (response.status === 'login') {
                        // Redirect to login page if user is not logged in
                        window.location.href = '<?php echo base_url("login"); ?>';
                    } else {

                        toastr.success('product added to cart');
                        $btn.addClass('view-cart-btn').text('View Cart').removeClass('addtocart');
                        // Optional: Store original category ID if needed to revert, though usually once added state persists until reload
                        // $btn.data('category-id', categoryId);
                        if (categoryId == 16) {
                            $btn.removeAttr('data-bs-toggle');
                            $btn.removeAttr('data-bs-target');
                        }
                    }
                    refreshCartCount(); // Ensure this function exists in your common JS
                },
                error: function (xhr, status, error) {
                    console.error("Error adding product to cart:", error);
                }

            });

        });



    });
</script>

<script>
    $(document).ready(function () {
        // Hide all tab contents initially
        $('.tab-content').hide();

        // Show the first tab content initially
        $('.tab-content:first').show();

        // Handle click event on subcategory buttons
        $('.btn-subcategory').on('click', function (e) {
            e.preventDefault();

            // Hide all tab contents
            $('.tab-content').hide();

            // Get the ID of the clicked subcategory
            var subcategoryId = $(this).data('subcategory-id');

            // Show the corresponding tab content
            $('#tab-content-' + subcategoryId).show();
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
</script>