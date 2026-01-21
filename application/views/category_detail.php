<div class="container main-container">
    <!-- Home slider -->
    <?php if (!empty($details['banner_img'])) : ?>
        <section class="p-0 layout-7 margin-top">
            <div class="home-slider">
                <div class="slider-card">
                    <div class="home text-left">
                        <img src="<?php echo base_url('upload/categoryimg/' . $details['banner_img']); ?>" alt="" class="bg-img blur-up lazyload">
                    </div>
                </div>
            </div>
        </section>
    <?php else : ?>
        <section class="pt-5 layout-7 margin-top">
            <!-- Your alternative content here -->
        </section>
    <?php endif; ?>


    <!-- <?php echo $details['banner_img']; ?> -->


    <!-- Home slider end -->

    <section class="section-b-space mt-4">
        <?php if (!empty($subcategories)) : ?>
            <div class="carousel-wrapper">
                <div class="d-flex justify-content-start sub-category-cards" id="subcategorycarousel1">
                    <?php foreach ($subcategories as $subcategory) : ?>
                        <div class="col-lg-3 col-md-4 col-6 mx-auto">
                            <a href="<?= base_url('products/' . $subcategory->category_id); ?>">
                                <div class="collection-banner occasion-card">
                                    <div class="img-part">
                                        <img src="<?= base_url('upload/subcategory/' . $subcategory->subcategory_image); ?>" class="img-fluid blur-up lazyload bmg-img">
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <h4><?= $subcategory->subcategory_name; ?></h4>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <div class="product-box deal-cards col-lg-3 col-md-4 col-6 my-auto">
                        <div class="category-block">
                            <a href="<?= base_url('category/' . $details['id']); ?>">
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

                <div class="carousel-controls-qu">
                    <button id="subcategoryprevBtn1" class="carousel-control-btn prevBtn">&#10094;</button>
                    <button id="subcategorynextBtn1" class="carousel-control-btn nextBtn">&#10095;</button>
                </div>
            </div>
        <?php else : ?>
            <div class="alert alert-warning">No subcategories available.</div>
        <?php endif; ?>
    </section>





    <!-- collection banner end -->

    <!-- Paragraph-->
    <div class="title1 category-title section-t-space mt-5">
        <h2 class="title-inner1">Best Seller <?= $details['category_name'] ?></h2>
    </div>
    <!-- Paragraph end -->


    <!-- Product section -->
    <section class="pt-0 section-b-space ratio_asos products-list">
        <div class="carousel-wrapper py-3">
            <?php if (empty($products)) : ?>
                <div class="alert alert-warning">No products available.</div>
            <?php else : ?>
                <div class="row" id="productCarousel2">
                    <?php foreach ($products as $product) : ?>
                        <?php $this->load->view('partials/product_card', ['product' => $product, 'col_classes' => 'col-xl-3 col-md-4 col-6']); ?>
                    <?php endforeach; ?>
                    <div class="product-box deal-cards flex-fill my-auto">
                        <div class="category-block">
                            <a href="<?= base_url('category/' . $details['id']); ?>">
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
                    <button id="prevBtn2" class="carousel-control-btn prevBtn">&#10094;</button>
                    <button id="nextBtn2" class="carousel-control-btn nextBtn">&#10095;</button>
                </div>
            <?php endif; ?>

        </div>
    </section>







    <!-- Trending Cards section -->
    <section class="section-b-space mt-4">
        <div class="card p-4 trending-cards-section">
            <div class="title1 section-t-space">
                <h2 class="title-inner1">Trending <?= $details['category_name'] ?></h2>
            </div>
            <div class="d-flex justify-content-around trending-cards">
                <div class="">
                    <a href="#">
                        <div class="collection-banner trending-card">
                            <div class="img-part full-img">
                                <img src="<?php echo base_url('assets/images/flora-images/fondant_cake.png'); ?>" class="img-fluid blur-up lazyload bg-img">
                            </div>
                        </div>
                        <div class="cart-category-title text-center mt-3">
                            <h4>Fondant Cakes</h4>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="#">
                        <div class="collection-banner trending-card">
                            <div class="img-part full-img">
                                <img src="<?php echo base_url('assets/images/flora-images/sugarfree_cake.png'); ?>" class="img-fluid blur-up lazyload bg-img">
                            </div>
                        </div>
                        <div class="cart-category-title text-center mt-3">
                            <h4>Sugarfree Cakes</h4>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="#">
                        <div class="collection-banner trending-card">
                            <div class="img-part full-img">
                                <img src="<?php echo base_url('assets/images/flora-images/bomb_cake.png'); ?>" class="img-fluid blur-up lazyload bg-img">
                            </div>
                        </div>
                        <div class="cart-category-title text-center mt-3">
                            <h4>Bomb Cake</h4>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="#">
                        <div class="collection-banner trending-card">
                            <div class="img-part full-img">
                                <img src="<?php echo base_url('assets/images/flora-images/pull_me_up_cake.png'); ?>" class="img-fluid blur-up lazyload bg-img">
                            </div>
                        </div>
                        <div class="cart-category-title text-center mt-3">
                            <h4>Pull me up cake</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- collection banner end -->

    <!-- Paragraph-->
    <div class="title1 category-title section-t-space mt-5">
        <h2 class="title-inner1"><?= $details['category_name'] ?> By Flavour</h2>
    </div>
    <!-- Paragraph end -->
    <section class="section-b-space mt-4">
        <?php if (!empty($subcategories)) : ?>
            <div class="carousel-wrapper">
                <div class="d-flex justify-content-start sub-category-cards" id="subcategorycarousel2">
                    <?php foreach ($subcategories as $subcategory) : ?>
                        <div class="col-lg-3 col-md-4 col-6 mx-auto">
                            <a href="<?= base_url('products/' . $subcategory->category_id); ?>">
                                <div class="collection-banner occasion-card">
                                    <div class="img-part">
                                        <img src="<?= base_url('upload/subcategory/' . $subcategory->subcategory_image); ?>" class="img-fluid blur-up lazyload bmg-img">
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <h4><?= $subcategory->subcategory_name; ?></h4>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <div class="product-box deal-cards col-lg-3 col-md-4 col-6 my-auto">
                        <div class="category-block">
                            <a href="<?= base_url('category/' . $details['id']); ?>">
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

                <div class="carousel-controls-qu">
                    <button id="subcategoryprevBtn2" class="carousel-control-btn prevBtn">&#10094;</button>
                    <button id="subcategorynextBtn2" class="carousel-control-btn nextBtn">&#10095;</button>
                </div>
            </div>
        <?php else : ?>
            <div class="alert alert-warning">No subcategories available.</div>
        <?php endif; ?>
    </section>



</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        function initializeCarousel(carouselId, prevBtnId, nextBtnId) {
            const carousel = document.querySelector(carouselId);
            const prevBtn = document.querySelector(prevBtnId);
            const nextBtn = document.querySelector(nextBtnId);
            let currentIndex = 0;
            let cardWidth = 0;
            let numVisibleCards = 0;

            function updateCardWidth() {
                // Calculate card width and number of visible cards
                cardWidth = carousel.querySelector('.col-6').offsetWidth;
                numVisibleCards = Math.floor(carousel.offsetWidth / cardWidth);
            }

            function slideTo(index) {
                carousel.style.transition = 'transform 0.5s ease-in-out';
                carousel.style.transform = `translateX(-${index * cardWidth}px)`;
                currentIndex = index;
                updateControlButtonsVisibility();
            }

            function updateControlButtonsVisibility() {
                prevBtn.style.display = currentIndex === 0 ? 'none' : 'block';
                nextBtn.style.display = currentIndex + numVisibleCards >= carousel.children.length ? 'none' : 'block';
            }

            prevBtn.addEventListener('click', function() {
                if (currentIndex > 0) {
                    slideTo(currentIndex - 1);
                }
            });

            nextBtn.addEventListener('click', function() {
                if (currentIndex < carousel.children.length - numVisibleCards) {
                    slideTo(currentIndex + 1);
                }
            });

            window.addEventListener('resize', function() {
                updateCardWidth();
                slideTo(currentIndex);
            });

            // Initial setup
            updateCardWidth();
            slideTo(currentIndex);
        }

        initializeCarousel('#subcategorycarousel1', '#subcategoryprevBtn1', '#subcategorynextBtn1');
        initializeCarousel('#subcategorycarousel2', '#subcategoryprevBtn2', '#subcategorynextBtn2');

    });
</script>