<?php
/**
 * Reusable Product Card Component
 * 
 * Usage: $this->load->view('partials/product_card', ['product' => $product]);
 * 
 * The product object should have:
 * - id or product_id (for product ID)
 * - product_name
 * - product_img1
 * - selling_price
 * - price (optional, for discount calculation)
 * - category_id (optional)
 */

// Handle different product object structures
$product_id = isset($product->product_id) ? $product->product_id : (isset($product->id) ? $product->id : '');
$product_name = isset($product->product_name) ? $product->product_name : '';
$product_img = isset($product->product_img1) ? $product->product_img1 : '';
$selling_price = isset($product->selling_price) ? $product->selling_price : 0;
$price = isset($product->price) ? $product->price : $selling_price;
$category_id = isset($product->category_id) ? $product->category_id : '';

// Calculate discount
$discount_percent = 0;
if ($price > $selling_price) {
    $discount_percent = round((($price - $selling_price) / $price) * 100);
}

// Optional: custom column classes (default: col-xl-3 col-md-4 col-6)
$col_classes = isset($col_classes) ? $col_classes : 'col-xl-3 col-md-4 col-6';

// Optional: add to cart button
$show_add_to_cart = isset($show_add_to_cart) ? $show_add_to_cart : false;
$add_to_cart_id = isset($add_to_cart_id) ? $add_to_cart_id : 'cart-btn-' . $product_id;
$add_to_cart_onclick = isset($add_to_cart_onclick) ? $add_to_cart_onclick : '';

// Optional: wishlist active state
$wishlist_active = isset($wishlist_active) ? $wishlist_active : false;
$wishlist_class = $wishlist_active ? 'wishlist-active' : '';
$wishlist_icon = $wishlist_active ? 'fa fa-heart' : 'ti-heart';
$wishlist_title = $wishlist_active ? 'Remove from Wishlist' : 'Add to Wishlist';
$wishlist_action_class = $wishlist_active ? 'wishlist-remove' : '';

// Optional: custom container ID
$container_id = isset($container_id) ? 'id="' . $container_id . '"' : '';
?>

<div class="<?= $col_classes ?> mb-4" <?= $container_id ?> <?= $category_id ? 'data-category-id="' . $category_id . '"' : '' ?> <?= isset($product->selling_price) ? 'data-price="' . $product->selling_price . '"' : '' ?> <?= isset($product->product_name) ? 'data-name="' . strtolower($product->product_name) . '"' : '' ?>>
    <div class="product-box deal-cards h-100">
        <div class="card h-100 modern-product-card border-0">
            <div class="img-wrapper position-relative modern-img-wrapper">
                <div class="front">
                    <a href="<?= base_url('product/' . $product_id); ?>">
                        <img src="<?= base_url('upload/productimg/') . $product_img ?>" 
                             class="img-fluid blur-up lazyload bg-img w-100 modern-product-img" 
                             alt="<?= htmlspecialchars($product_name) ?>">
                    </a>
                </div>
                <div class="cart-info cart-wrap">
                    <a href="javascript:void(0)" 
                       class="wishlist-btn modern-wishlist-btn <?= $wishlist_class ?> <?= $wishlist_action_class ?>" 
                       data-id="<?= $product_id ?>" 
                       title="<?= $wishlist_title ?>" 
                       tabindex="0">
                        <i class="<?= $wishlist_icon ?>" aria-hidden="true"></i>
                    </a>
                </div>
                <?php if ($show_add_to_cart) : ?>
                    <button class="add-button border-0" id="<?= $add_to_cart_id ?>" <?= $add_to_cart_onclick ? 'onclick="' . $add_to_cart_onclick . '"' : '' ?>>
                        Add to Cart
                    </button>
                <?php endif; ?>
            </div>
            
            <div class="product-detail p-3 modern-product-detail-new">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <a href="<?= base_url('product/' . $product_id); ?>" class="flex-grow-1">
                        <h6 class="mb-0 modern-product-title-new font-weight-bold"><?= htmlspecialchars($product_name) ?></h6>
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
                    <div class="d-flex align-items-baseline gap-2">
                        <?php if ($discount_percent > 0) : ?>
                            <h5 class="original-price-new mb-0"><del>₹<?= number_format($price, 2) ?></del></h5>
                            <span class="discount-percent-new"><?= $discount_percent ?>% OFF</span>
                        <?php endif; ?>
                    </div>
                    <h4 class="modern-product-price-new mb-0 font-weight-bold">₹<?= number_format($selling_price, 2) ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
