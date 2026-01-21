<div class="page-body">

    <style>
        .product-box {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease-in-out;
            border: 1px solid #f0f0f0;
            overflow: hidden;
            height: 100%;
        }

        .product-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-color: #e0e0e0;
        }

        .product-box .img-wrapper {
            border-bottom: 1px solid #f9f9f9;
            padding: 15px;
            background: #fff;
        }

        .product-box .product-detail {
            padding: 20px;
        }

        .product-box h6 {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .product-box h4 {
            font-weight: 700;
            color: #ff4c3b;
        }

        /* Responsive spacing fixes */
        .filter-group {
            margin-bottom: 15px;
        }
    </style>

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <a href="javascript:history.back()"
                            style="color: inherit; text-decoration: none; margin-right: 10px;">
                            <i data-feather="arrow-left"></i>
                        </a>
                        <h3>Product List

                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') ?>"><i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item active">Product List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row mb-4 justify-content-between align-items-center">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test"
                            data-target="#exampleModal">Add Product</button>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" id="search-product" class="form-control"
                                placeholder="Search by Product Name..."
                                style="border-radius: 50px; padding: 10px 20px; border: 1px solid #ced4da;">
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Product</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" action="<?= base_url('admin/addproduct') ?>"
                                    method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">Product Type:</label>
                                        <select class="form-control" name="product_type">
                                            <option selected>Choose option</option>
                                            <option value="1">General Product</option>
                                            <option value="2">Addon Product</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">Category Name:</label>
                                        <select class="form-control" name="category_id" id="comboA"
                                            onchange="get_subcategory(this)">
                                            <option selected>Choose option</option>
                                            <?php if (!empty($categories))
                                                foreach ($categories as $cat) { ?>
                                                    <option value="<?= $cat->id ?>"><?= $cat->category_name ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">SubCategory Name:</label>
                                        <select id="sub_category" class="form-control" name="subcategory_id"></select>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">Product Name :</label>
                                        <input class="form-control" name="product_name" id="validationCustom01"
                                            type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pricingType" class="mb-1">Pricing Type:</label>
                                        <select class="form-control" name="is_weight_status" id="pricingType"
                                            onchange="togglePricingFields(this, 'weightVariantsContainer')">
                                            <option value="0" selected>Fixed Price</option>
                                            <option value="1">Weight-based Price</option>
                                        </select>
                                    </div>
                                    <div id="fixedPricingFields">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="mb-1">Price :</label>
                                            <input class="form-control" name="price" id="validationCustom01"
                                                type="number">
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="mb-1">Selling Price :</label>
                                            <input class="form-control" name="sellingprice" id="validationCustom01"
                                                type="number">
                                        </div>
                                    </div>
                                    <div id="weightVariantsContainer" style="display: none;">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <label class="mb-0">Weight Variants:</label>
                                            <button type="button" class="btn btn-success btn-xs"
                                                onclick="addWeightVariant('weightVariantsList')">
                                                <i class="fa fa-plus"></i> Add Weight
                                            </button>
                                        </div>
                                        <div id="weightVariantsList">
                                            <div class="weight-variant-row row mb-2">
                                                <div class="col-4">
                                                    <input type="text" name="variant_weight[]" class="form-control"
                                                        placeholder="Wt (kg)">
                                                </div>
                                                <div class="col-3">
                                                    <input type="number" name="variant_price[]" class="form-control"
                                                        placeholder="Price">
                                                </div>
                                                <div class="col-3">
                                                    <input type="number" name="variant_selling_price[]"
                                                        class="form-control" placeholder="Sell">
                                                </div>
                                                <div class="col-2">
                                                    <!-- First row can't be removed or just leave it empty -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="validationCustom02" class="mb-1">Product Image1 :</label>
                                        <input class="form-control" name="productimage1" id="validationCustom02"
                                            type="file">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="validationCustom02" class="mb-1">Product Image2 :</label>
                                        <input class="form-control" name="productimage2" id="validationCustom02"
                                            type="file">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="validationCustom02" class="mb-1">Product Image3 :</label>
                                        <input class="form-control" name="productimage3" id="validationCustom02"
                                            type="file">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="validationCustom02" class="mb-1">Product Image4 :</label>
                                        <input class="form-control" name="productimage4" id="validationCustom02"
                                            type="file">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">Product Description :</label>
                                        <textarea class="form-control" name="description" id="validationCustom01"
                                            type="text" required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-md-4 filter-group">
                        <label for="type-filter">Type:</label>
                        <select name="Type" id="type-filter" class="form-control" style="border-radius: 50px;">
                            <option value="1">General</option>
                            <option value="2">Add On</option>
                        </select>
                    </div>

                    <div class="col-md-4 filter-group">
                        <label for="categories-filter">Category:</label>
                        <select name="Categories" id="categories-filter" class="form-control"
                            style="border-radius: 50px;">
                            <option value="empty">Select Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-4 filter-group">
                        <label for="subcategory-filter">Subcategory:</label>
                        <select name="Subtype" id="subcategory-filter" class="form-control"
                            style="border-radius: 50px;">
                            <option value="empty">Select Subcategory</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row products-admin ratio_asos" id="addcards">
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-end" id="pagination-controls">
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        var productsNotFoundDisplayed = false;

        // --- NEW: Pagination variables ---
        let currentPage = 1;
        const productsPerPage = 8;

        // Event listener for type filter
        $('#type-filter').change(function () {
            currentPage = 1; // Reset to first page on filter change
            fetchProducts();
        });

        // Event listener for category filter
        $('#categories-filter').change(function () {
            var categoryId = $(this).val();
            currentPage = 1; // Reset to first page on filter change
            fetchSubcategories(categoryId);
            fetchProducts(); // Note: This will fetch before subcategories, but that's okay
        });

        // Event listener for subcategory filter
        $('#subcategory-filter').change(function () {
            currentPage = 1; // Reset to first page on filter change
            fetchProducts();
        });

        // --- NEW: Click handlers for pagination ---
        // Must use event delegation since these buttons are created dynamically
        $(document).on('click', '#prev-page', function (e) {
            e.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                fetchProducts();
            }
        });

        $(document).on('click', '#next-page', function (e) {
            e.preventDefault();
            if (!$(this).parent().hasClass('disabled')) {
                currentPage++;
                fetchProducts();
            }

        });
        $('#search-product').on('keyup', function () {
            currentPage = 1;
            fetchProducts();
        });

        // Function to fetch products based on filters and current page
        function fetchProducts() {
            var categoryId = $('#categories-filter').val();
            var type = $('#type-filter').val();
            var subcategoryId = $('#subcategory-filter').val();
            var search = $('#search-product').val();

            $.ajax({
                url: '<?php echo site_url('admin/filterProductsData'); ?>',
                type: 'POST',
                data: {
                    category_id: categoryId,
                    type: type,
                    subtype: subcategoryId,
                    search: search,
                    page: currentPage,
                    limit: productsPerPage
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);

                    $('#addcards').empty();
                    $('#pagination-controls').empty();

                    if (data.length > 0) {
                        processProducts(data);
                    } else {
                        if (currentPage === 1) {
                            $('#addcards').append('<p class="no-products-message col-12 text-center">No products available</p>');
                        }
                    }

                    // --- NEW: Render Pagination Controls (with page number) ---

                    // Add "Previous" button
                    $('#pagination-controls').append(
                        '<li class="page-item ' + (currentPage == 1 ? 'disabled' : '') + '">' +
                        '<a class="page-link" href="#" id="prev-page">Previous</a>' +
                        '</li>'
                    );

                    // Add Current Page Number
                    $('#pagination-controls').append(
                        '<li class="page-item active" aria-current="page">' +
                        '<a class="page-link" href="#">' + currentPage + '</a>' +
                        '</li>'
                    );

                    // Add "Next" button
                    $('#pagination-controls').append(
                        '<li class="page-item ' + (data.length < productsPerPage ? 'disabled' : '') + '">' +
                        '<a class="page-link" href="#" id="next-page">Next</a>' +
                        '</li>'
                    );

                },
                error: function (xhr, status, error) {
                    console.error('Error fetching products:', error);
                    $('#addcards').empty();
                    $('#addcards').append('<p class="no-products-message col-12 text-center">Error loading products.</p>');
                }
            });
        }


        // Function to fetch subcategories based on category
        function fetchSubcategories(categoryId) {
            $.ajax({
                url: '<?php echo base_url('api/subcategory/category/'); ?>' + categoryId,
                type: 'GET',
                success: function (data) {
                    console.log(data);
                    populateSubcategories(data);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching subcategories:', error);
                }
            });
        }

        // Function to populate the subcategory dropdown
        function populateSubcategories(data) {
            console.log('data for pop ');
            console.log(data.data);
            $('#subcategory-filter').empty();
            $('#subcategory-filter').append($('<option>', {
                value: 'empty',
                text: 'Select Subcategory'
            }));

            if (data.data && data.data.length > 0) {
                for (var i = 0; i < data.data.length; i++) {
                    $('#subcategory-filter').append($('<option>', {
                        value: data.data[i].id,
                        text: data.data[i].subcategory_name
                    }));
                }
            }
        }



        function processProducts(data) {
            for (var i = 0; i < data.length; i++) {
                var product = data[i];

                // Updated HTML structure with modern UI classes
                var productHTML = `
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="product-box">
                <div class="img-wrapper">
                    <div class="front">
                        <a href="#"><img src="<?= base_url('upload/productimg/') ?>${product.product_img1}" class="img-fluid blur-up lazyload addon-img" alt="" style="height: 250px; width: 100%; object-fit: contain;"></a>
                        <div class="product-hover">
                            <ul>
                                <li>
                                    <button class="btn edit-product-btn" type="button" data-product-id="${product.product_id || product.id}" data-toggle="modal" data-target="#editProductModal" data-original-title="" title=""><i class="fa fa-pencil"></i></button>
                                </li>
                                <li>
                                    <button class="btn delete-product-btn" type="button" data-product-id="${product.product_id || product.id}" data-toggle="modal" data-target="#deleteConfirmationModal" data-original-title="" title=""><i class="fa fa-trash"></i></button>
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
                    <h4>₹${product.selling_price} <del class="text-muted ml-2" style="font-size: 0.8em;">₹${product.price}</del></h4>
                </div>
            </div>
        </div>
    `;

                $('#addcards').append(productHTML);
            }
        }

        fetchProducts();
    });
</script>

<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title f-w-600" id="deleteModalLabel">Delete Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this product?</p>
            </div>
            <div class="modal-footer">
                <a class="btn " id="confirmDeleteButton" type="button"
                    style="background-color: #D22B2B; color: white;">Delete</a>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#addcards').on('click', '.delete-product-btn', function () {
            console.log('Delete button clicked');
            var productId = $(this).data('product-id');
            console.log('Product ID:', productId);
            var deleteUrl = "<?= base_url('admin/product/delete/') ?>" + productId;
            console.log('Delete URL:', deleteUrl);
            $('#confirmDeleteButton').attr('href', deleteUrl);
            $('#deleteConfirmationModal').find('.modal-body').html('Are you sure you want to delete product?');
        });
    });
</script>

<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title f-w-600" id="editProductModalLabel">Edit Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="<?= base_url('admin/editProduct') ?>" method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" name="product_id" id="editProductId" value="">
                    <div class="form-group">
                        <label for="editProductType" class="mb-1">Product Type:</label>
                        <select class="form-control" name="product_type" id="editProductType">
                            <option value="1">General Product</option>
                            <option value="2">Addon Product</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editCategory" class="mb-1">Category Name:</label>
                        <select class="form-control" name="category_id" id="comboB" onchange="get_subcategory(this)">
                            <?php foreach ($categories as $cat) { ?>
                                <option value="<?= $cat->id ?>"><?= $cat->category_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editSubCategory" class="mb-1">SubCategory Name:</label>
                        <select id="editSubCategory" class="form-control" name="subcategory_id"></select>
                    </div>
                    <div class="form-group">
                        <label for="editProductName" class="mb-1">Product Name :</label>
                        <input class="form-control" name="product_name" id="editProductName" type="text">
                    </div>
                    <div class="form-group">
                        <label for="editPricingType" class="mb-1">Pricing Type:</label>
                        <select class="form-control" name="is_weight_status" id="editPricingType"
                            onchange="togglePricingFields(this, 'editWeightVariantsContainer')">
                            <option value="0">Fixed Price</option>
                            <option value="1">Weight-based Price</option>
                        </select>
                    </div>
                    <div id="editFixedPricingFields">
                        <div class="form-group">
                            <label for="editPrice" class="mb-1">Price :</label>
                            <input class="form-control" name="price" id="editPrice" type="number">
                        </div>
                        <div class="form-group">
                            <label for="editSellingPrice" class="mb-1">Selling Price :</label>
                            <input class="form-control" name="sellingprice" id="editSellingPrice" type="number">
                        </div>
                    </div>
                    <div id="editWeightVariantsContainer" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="mb-0">Weight Variants:</label>
                            <button type="button" class="btn btn-success btn-xs"
                                onclick="addWeightVariant('editWeightVariantsList')">
                                <i class="fa fa-plus"></i> Add Weight
                            </button>
                        </div>
                        <div id="editWeightVariantsList">
                            <!-- Variants will be populated dynamically -->
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label for="validationCustom02" class="mb-1">Product Image1 :</label>
                        <input class="form-control" name="productimage1" id="validationCustom02" type="file">
                    </div>
                    <div class="form-group mb-0">
                        <label for="validationCustom02" class="mb-1">Product Image2 :</label>
                        <input class="form-control" name="productimage2" id="validationCustom02" type="file">
                    </div>
                    <div class="form-group mb-0">
                        <label for="validationCustom02" class="mb-1">Product Image3 :</label>
                        <input class="form-control" name="productimage3" id="validationCustom02" type="file">
                    </div>
                    <div class="form-group mb-0">
                        <label for="validationCustom02" class="mb-1">Product Image4 :</label>
                        <input class="form-control" name="productimage4" id="validationCustom02" type="file">
                    </div>

                    <div class="form-group">
                        <label for="editDescription" class="mb-1">Product Description :</label>
                        <textarea class="form-control" name="description" id="editDescription" type="text"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function get_subcategory(id) {
        console.log(id.id);
        var val = id.value;
        $.ajax({
            url: '<?= base_url('Admin/ajax_subcategory'); ?>',
            type: 'POST',
            data: {
                id: val
            },
            dataType: 'json',
            success: function (data) {
                var html = '<option selected>Choose option</option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id + '>' + data[i].subcategory_name + '</option>';
                }
                if (id.id === 'comboA') {
                    $('#sub_category').html(html);
                } else {
                    $('#editSubCategory').html(html);
                }
            }
        });
    }
</script>


<script>
    function togglePricingFields(select, containerId) {
        let isWeight = select.value == '1';
        let fixedFieldsId = containerId === 'weightVariantsContainer' ? 'fixedPricingFields' : 'editFixedPricingFields';

        if (isWeight) {
            $(`#${containerId}`).show();
            $(`#${fixedFieldsId}`).hide();
            // Remove required from fixed fields if hidden
            $(`#${fixedFieldsId}`).find('input').removeAttr('required');
        } else {
            $(`#${containerId}`).hide();
            $(`#${fixedFieldsId}`).show();
            // Add required back if needed, though they were optional in original form
        }
    }

    function addWeightVariant(listId, weight = '', price = '', sellPrice = '') {
        let html = `
            <div class="weight-variant-row row mb-2">
                <div class="col-4">
                    <input type="text" name="variant_weight[]" class="form-control" placeholder="Wt (kg)" value="${weight}">
                </div>
                <div class="col-3">
                    <input type="number" name="variant_price[]" class="form-control" placeholder="Price" value="${price}">
                </div>
                <div class="col-3">
                    <input type="number" name="variant_selling_price[]" class="form-control" placeholder="Sell" value="${sellPrice}">
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-danger btn-xs" onclick="$(this).closest('.weight-variant-row').remove()">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>`;
        $(`#${listId}`).append(html);
    }

    $(document).ready(function () {
        function fetchProductData(productId) {
            $.ajax({
                url: "<?= base_url('api/product/') ?>" + productId,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('#editProductId').val(response.id || response.product_id);
                    $('#editProductType').val(response.type);
                    $('#editProductName').val(response.product_name);
                    $('#editPrice').val(response.price);
                    $('#editSellingPrice').val(response.selling_price);
                    $('#editDescription').val(response.description);
                    $('#editPricingType').val(response.is_weight_status || 0);

                    // Handle pricing fields visibility
                    togglePricingFields(document.getElementById('editPricingType'), 'editWeightVariantsContainer');

                    // Populate variants if any
                    $('#editWeightVariantsList').empty();
                    if (response.is_weight_status == 1 && response.variants) {
                        response.variants.forEach(v => {
                            addWeightVariant('editWeightVariantsList', v.variant_name, v.variant_price, v.variant_sellingprice);
                        });
                    } else if (response.is_weight_status == 1) {
                        // Add one empty row if none exist
                        addWeightVariant('editWeightVariantsList');
                    }

                    $('#comboB').val(response.category_id);
                    get_subcategory(document.getElementById('comboB'));

                    setTimeout(function () {
                        $("#editSubCategory").val(response.subcategory_id);
                    }, 500);

                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        $('#addcards').on('click', '.edit-product-btn', function () {
            console.log('edit btn click');
            var productId = $(this).data('product-id');
            fetchProductData(productId);
        });
    });
</script>