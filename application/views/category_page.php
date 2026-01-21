<section class="section-b-space ratio_asos margin-top ">
    <div class="container">
        <div class="collection-product-wrapper">
            <div class="d-flex justify-content-between flex-wrap align-items-center mx-4">
                <?php if (!empty($productforsubcategory)) : ?>
                    <div class="shortcut-btn d-flex flex-wrap justify-content-start">
                        <?php foreach ($productforsubcategory as $subcategory) : ?>
                            <!-- Add a hidden input field containing the subcategory ID -->
                            <a href="#" class="btn btn-outline m-2" data-subcategory-id="<?php echo $subcategory->id; ?>"><?php echo $subcategory->subcategory_name; ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="custom-dropdown d-flex justify-content-lg-end justify-content-center">
                    <button class="dropdown-toggle btn btn-solid" id="customDropdownToggle">Sort By</button>
                    <div class="dropdown-menu" id="customDropdownMenu">
                        <a href="#" class="dropdown-item">Priority</a>
                        <a href="#" class="dropdown-item">High to Low</a>
                        <a href="#" class="dropdown-item">Low to High</a>
                    </div>
                </div>
            </div>
            <!-- <?php var_dump($productbycategory) ?> -->

            <div class="products-list">
                <div class="loader" style="display: none;">Loading...</div>

                <div class="row">
                    <?php foreach ($productbycategory as $product) : ?>
                        <?php $this->load->view('partials/product_card', ['product' => $product, 'col_classes' => 'col-xl-3 col-md-4 col-6']); ?>
                    <?php endforeach; ?>
                </div>
            </div>



        </div>
</section>
<!-- section End -->

<script>
    $(document).ready(function() {
        $('.shortcut-btn a').click(function(e) {
            e.preventDefault();

            var $clickedBtn = $(this);
            var subcategoryId = $clickedBtn.data('subcategory-id');

            // Remove active class from all buttons and add it to the clicked button
            $('.shortcut-btn a').removeClass('active').addClass('btn-outline');
            $clickedBtn.addClass('active').removeClass('btn-outline');

            var subcategoryUrl = '<?php echo base_url('api/products/subcategories/') ?>' + subcategoryId;

            // Show loader
            $('.loader').show();

            $.ajax({
                url: subcategoryUrl,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    // Hide loader
                    $('.loader').hide();

                    if (data.status === 'success' && data.data.length > 0) {
                        // Remove existing products
                        $('.row .product-box').parent().remove();

                        $.each(data.data, function(index, product) {
                            var discountPercent = 0;
                            if (product.price && product.price > product.selling_price) {
                                discountPercent = Math.round(((product.price - product.selling_price) / product.price) * 100);
                            }
                            var productHtml = `
                <div class="col-xl-3 col-md-4 col-6 mb-4" data-category-id="${product.category_id || ''}">
                    <div class="product-box deal-cards h-100">
                        <div class="card h-100 modern-product-card border-0">
                            <div class="img-wrapper position-relative modern-img-wrapper">
                                <div class="front">
                                    <a href="<?= base_url('product/') ?>${product.id}">
                                        <img src="<?= base_url('upload/productimg/') ?>${product.product_img1}" 
                                             class="img-fluid blur-up lazyload bg-img w-100 modern-product-img" 
                                             alt="${product.product_name}">
                                    </a>
                                </div>
                                <div class="cart-info cart-wrap">
                                    <a href="javascript:void(0)" 
                                       class="wishlist-btn modern-wishlist-btn" 
                                       data-id="${product.id}" 
                                       title="Add to Wishlist" 
                                       tabindex="0">
                                        <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-detail p-3 modern-product-detail-new">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <a href="<?= base_url('product/') ?>${product.id}" class="flex-grow-1">
                                        <h6 class="mb-0 modern-product-title-new font-weight-bold">${product.product_name}</h6>
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
                                        ${discountPercent > 0 ? '<h5 class="original-price-new mb-0"><del>₹' + parseFloat(product.price).toFixed(2) + '</del></h5><span class="discount-percent-new">' + discountPercent + '% OFF</span>' : ''}
                                    </div>
                                    <h4 class="modern-product-price-new mb-0 font-weight-bold">₹${parseFloat(product.selling_price).toFixed(2)}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                            // Append each product card to .row (changed from .game-product)
                            $('.row').append(productHtml);
                        });
                    } else {
                        // Handle case when no products are returned or when status is not success
                        $('.row').html('<div class="col-12"><p class="text-center">No products available</p></div>');
                    }
                },

                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error
                }
            });
        });
    });
</script>





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