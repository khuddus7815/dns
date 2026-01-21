<style>
    /* Modern Product Card Styling */
    .modern-product-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .modern-product-card:hover {
        box-shadow: 0 12px 32px rgba(0,0,0,0.15);
        transform: translateY(-8px);
    }
    
    .modern-img-wrapper {
        border-radius: 20px 20px 0 0;
        overflow: hidden;
        background: #f8f9fa;
    }
    
    .modern-product-img {
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        object-fit: cover;
        height: 250px;
    }
    .modern-product-card:hover .modern-product-img {
        transform: scale(1.08);
    }
    
    .modern-product-detail-new {
        text-align: left;
    }
    
    .modern-product-title-new {
        font-weight: 700 !important;
        color: #2c3e50;
        font-size: 1rem;
        line-height: 1.4;
    }
    
    .modern-rating-badge-new {
        flex-shrink: 0;
        margin-left: 10px;
    }
    
    .price-section-new {
        margin-top: 8px;
    }
    
    .original-price-new {
        color: #999;
        font-size: 0.9rem;
        font-weight: 400;
    }
    
    .original-price-new del {
        color: #999;
    }
    
    .discount-percent-new {
        background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
        color: #fff;
        padding: 2px 8px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.75rem;
        display: inline-block;
        box-shadow: 0 2px 6px rgba(243, 186, 117, 0.4);
    }
    
    .modern-product-price-new {
        color: #ff4c3b;
        font-weight: 700;
        font-size: 1.4rem;
        margin-top: 4px;
    }
    
    .modern-wishlist-btn {
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
    
    .modern-wishlist-btn:hover {
        background: rgba(255, 255, 255, 1);
        transform: scale(1.1);
    }
    
    .modern-wishlist-btn i {
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
    
    .modern-wishlist-btn.wishlist-active i {
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
    
    .golden-rating {
        background: linear-gradient(135deg, #D4AF37 0%, #B8860B 100%);
        color: #fff;
        border-radius: 20px;
        padding: 4px 10px;
        box-shadow: 0 2px 8px rgba(212, 175, 55, 0.3);
    }
    
    .golden-text-white {
        color: #fff !important;
        font-weight: 600;
        font-size: 0.9rem;
    }
</style>

<section class="section-b-space ratio_asos pt-0 product-body " style="padding-top: 0 !important; margin-top: 0 !important;">
    <div class="container ">
        <div class="collection-product-wrapper card product-card p-2" style="margin-top: 10px;">
            <div class="d-flex justify-content-between flex-wrap align-items-center mx-4">
                <div class="shortcut-btn overflow-auto">
                    <div class="d-flex justify-content-start">
                        <a href="#" class="btn btn-outline m-2 btn-subcategory" data-subcategory-id="all">All</a>
                        <?php foreach ($subcategories as $subcategory) : ?>
                            <a href="#" class="btn btn-outline m-2 btn-subcategory" data-subcategory-id="<?= $subcategory->id ?>"><?= $subcategory->subcategory_name ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="custom-dropdown d-flex justify-content-lg-end justify-content-center align-items-center gap-3" style="position: relative;">
                     <!-- Search Bar -->
                     <div class="search-product-box">
                        <input type="text" class="form-control" id="productSearch" placeholder="Search products..." style="border-radius: 20px; padding: 8px 15px; border: 1px solid #ddd; width: 250px;">
                    </div>

                    <button class="dropdown-toggle btn btn-solid" id="customDropdownToggle">Sort By</button>
                    <div class="dropdown-menu" id="customDropdownMenu" style="position: absolute; top: 100%; right: 0; left: auto; z-index: 1000; min-width: 10rem; padding: 0.5rem 0; margin: 0.125rem 0 0; font-size: 1rem; color: #212529; text-align: left; list-style: none; background-color: #fff; background-clip: padding-box; border: 1px solid rgba(0,0,0,.15); border-radius: 0.25rem;">
                        <a href="javascript:void(0)" class="dropdown-item sort-option" data-sort="default">Default</a>
                        <a href="javascript:void(0)" class="dropdown-item sort-option" data-sort="high-low">Price: High to Low</a>
                        <a href="javascript:void(0)" class="dropdown-item sort-option" data-sort="low-high">Price: Low to High</a>
                    </div>
                </div>
            </div>


            <div class="tab-contents">
                <?php if (empty($products)) : ?>
                    <div class="alert alert-info">No products available</div>
                <?php else : ?>
                    <div id="tab-content-all" class="tab-content">
                        <div class="products-list mt-4">
                            <div class="row">
                                <?php foreach ($products as $product) : ?>
                                    <div class="col-xl-3 col-md-4 col-6 mb-4" data-category-id="<?= $product->category_id ?>">
                                        <div class="product-box deal-cards h-100">
                                            <div class="card h-100 modern-product-card border-0">
                                                <div class="img-wrapper position-relative modern-img-wrapper">
                                                    <div class="front">
                                                        <a href="<?= base_url('product/' . $product->id); ?>">
                                                            <img src="<?= base_url('upload/productimg/') . $product->product_img1 ?>" class="img-fluid blur-up lazyload bg-img w-100 modern-product-img" alt="<?= $product->product_name ?>">
                                                        </a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <a href="javascript:void(0)" class="wishlist-btn modern-wishlist-btn" data-id="<?= $product->id ?>" title="Add to Wishlist" tabindex="0">
                                                            <i class="ti-heart" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                
                                                <div class="product-detail p-3 modern-product-detail-new">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <a href="<?= base_url('product/' . $product->id); ?>" class="flex-grow-1">
                                                            <h6 class="mb-0 modern-product-title-new font-weight-bold"><?= $product->product_name ?></h6>
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
                                                            <?php if ($discount_percent > 0) : ?>
                                                                <h5 class="original-price-new mb-0"><del>₹<?= $product->price ?></del></h5>
                                                                <span class="discount-percent-new"><?= $discount_percent ?>% OFF</span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <h4 class="modern-product-price-new mb-0 font-weight-bold">₹<?= $product->selling_price ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($subcategories as $subcategory) : ?>
                        <div id="tab-content-<?= $subcategory->id ?>" class="tab-content">
                            <?php $subcategoryProducts = array_filter($products, function ($product) use ($subcategory) {
                                return $product->subcategory_id == $subcategory->id;
                            }); ?>
                            <?php if (empty($subcategoryProducts)) : ?>
                                <div class="alert alert-info">No products in subcategory: <?= $subcategory->subcategory_name ?></div>
                            <?php else : ?>
                                <div class="products-list mt-4">
                                    <div class="row">
                                        <?php foreach ($subcategoryProducts as $product) : ?>
                                            <div class="col-xl-3 col-md-4 col-6 mb-4" data-category-id="<?= $product->category_id ?>">
                                                <div class="product-box deal-cards h-100">
                                                    <div class="card h-100 modern-product-card border-0">
                                                        <div class="img-wrapper position-relative modern-img-wrapper">
                                                            <div class="front">
                                                                <a href="<?= base_url('product/' . $product->id); ?>">
                                                                    <img src="<?= base_url('upload/productimg/') . $product->product_img1 ?>" class="img-fluid blur-up lazyload bg-img w-100 modern-product-img" alt="<?= $product->product_name ?>">
                                                                </a>
                                                            </div>
                                                            <div class="cart-info cart-wrap">
                                                                <a href="javascript:void(0)" class="wishlist-btn modern-wishlist-btn" data-id="<?= $product->id ?>" title="Add to Wishlist" tabindex="0">
                                                                    <i class="ti-heart" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="product-detail p-3 modern-product-detail-new">
                                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                                <a href="<?= base_url('product/' . $product->id); ?>" class="flex-grow-1">
                                                                    <h6 class="mb-0 modern-product-title-new font-weight-bold"><?= $product->product_name ?></h6>
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
                                                                    <?php if ($discount_percent > 0) : ?>
                                                                        <h5 class="original-price-new mb-0"><del>₹<?= $product->price ?></del></h5>
                                                                        <span class="discount-percent-new"><?= $discount_percent ?>% OFF</span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <h4 class="modern-product-price-new mb-0 font-weight-bold">₹<?= $product->selling_price ?></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>



        </div>
    </div>
</section>

<section class="testimonial small-section m-4">
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
<!-- End section -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var customDropdownToggle = document.getElementById('customDropdownToggle');
        var customDropdownMenu = document.getElementById('customDropdownMenu');

        customDropdownToggle.addEventListener('click', function() {
            customDropdownMenu.style.display = (customDropdownMenu.style.display === 'block') ? 'none' : 'block';
        });

        document.addEventListener('click', function(event) {
            var targetElement = event.target;
            if (!targetElement.closest('.custom-dropdown')) {
                customDropdownMenu.style.display = 'none';
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Hide all tab contents initially
        $('.tab-content').hide();

        // Show the first tab content initially
        $('.tab-content:first').show();

        // Handle click event on subcategory buttons
        $('.btn-subcategory').on('click', function(e) {
            e.preventDefault();

            // Hide all tab contents
            $('.tab-content').hide();

            // Get the ID of the clicked subcategory
            var subcategoryId = $(this).data('subcategory-id');

            // Show the corresponding tab content
            $('#tab-content-' + subcategoryId).show();
        });

        // --- Search Functionality ---
        $('#productSearch').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            
            // Search in currently visible tab content
            var visibleTab = $('.tab-content:visible');
            
            // If no tab is explicitly visible (e.g. initial load), use all products-list if "All" is selected
            if (visibleTab.length === 0) visibleTab = $('#tab-content-all');

            visibleTab.find('.col-xl-3').filter(function() {
                var title = $(this).find('.modern-product-title-new').text().toLowerCase();
                $(this).toggle(title.indexOf(value) > -1)
            });
        });

        // --- Sort Functionality ---
        $('.sort-option').on('click', function(e) {
            e.preventDefault();
            var sortType = $(this).data('sort');
            var $dropdownBtn = $('#customDropdownToggle');
            $dropdownBtn.text($(this).text()); // Update button text
            $('#customDropdownMenu').hide(); // Close menu

            // Perform sort on ALL tab contents
            $('.tab-content').each(function() {
                var $grid = $(this).find('.row');
                var $cards = $grid.children('.col-xl-3');

                if (sortType === 'default') {
                    location.reload(); 
                    return; 
                }

                $cards.sort(function(a, b) {
                    var priceA = parseFloat($(a).find('.modern-product-price-new').text().replace(/[^\d.]/g, ''));
                    var priceB = parseFloat($(b).find('.modern-product-price-new').text().replace(/[^\d.]/g, ''));

                    if (sortType === 'low-high') {
                        return priceA - priceB;
                    } else if (sortType === 'high-low') {
                        return priceB - priceA;
                    }
                    return 0;
                });

                $grid.append($cards);
            });
        });
    });
</script>
