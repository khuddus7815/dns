<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header-left">
                        <h3>Product List
                            <small>DNS Store Admin panel</small>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="btn-popup pull-right">
                            <button type="button" id="addProductBtn" class="btn btn-primary" data-occasion-id="<?= $occasion_id ?>" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Save</button>
                        </div>

                        <div class="col-lg-4">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Physical</li>
                                <li class="breadcrumb-item active">Product List</li>
                            </ol>


                        </div>

                    </div>
                    <div class="row my-5">
                        <div class="col-lg-4 d-flex align-items-center">
                            <label for="type-filter">Type:</label>
                            <select name="Type" id="type-filter" class="form-control">
                                <option value="1">General</option>
                                <option value="2">Add On</option>
                            </select>
                        </div>

                        <div class="col-lg-4 d-flex align-items-center">
                            <label for="categories-filter">Category:</label>
                            <select name="Categories" id="categories-filter" class="form-control">
                                <option value="empty">Select Category</option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-lg-4 d-flex align-items-center">
                            <label for="subcategory-filter">Subcategory:</label>
                            <select name="Subtype" id="subcategory-filter" class="form-control">
                                <option value="empty">Select Subcategory</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Container-fluid Ends-->

        <div class="container-fluid">
            <table id="productTable" class="display">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <!-- Checkbox for selecting the product -->
                            <td class="text-center">
                                <input type="checkbox" class="product-checkbox" data-product-id="<?= $product->product_id ?>">
                            </td>

                            <!-- Product Image -->
                            <td>
                                <img src="<?= base_url('upload/productimg/' . $product->product_img1) ?>" class="img-fluid blur-up bg-img lazyload" alt="" style="width: 100px;">
                            </td>

                            <!-- Product Name -->
                            <td><?= $product->product_name ?></td>

                            <!-- Price -->
                            <td>
                                $<?= $product->selling_price ?> 
                                <del>$<?= $product->price ?></del>
                            </td>

                            <!-- Rating -->
                            <td>
                                <div class="rating">
                                    <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <i class="fa fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
  
  <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>


    <!-- <script>
    // Array to hold selected product IDs
    let selectedProductIds = [];
// Convert PHP array to JavaScript array
<?php if (!empty($products)): ?>
        selectedProductIds = <?php echo json_encode(array_column($products, 'product_id')); ?>;
    <?php endif; ?>

    // console.log(selectedProductIds);

    // Function to handle checkbox change events
    $(document).on('change', '.product-checkbox', function() {
        const productId = $(this).data('product-id');

        if ($(this).is(':checked')) {
            // Add product ID to the array if the checkbox is checked
            selectedProductIds.push(productId);
        } else {
            // Remove product ID from the array if the checkbox is unchecked
            selectedProductIds = selectedProductIds.filter(id => id !== productId);
        }

        // Log the array of selected product IDs (for testing)
        console.log(selectedProductIds);
    });

    $('#addProductBtn').on('click', function() {
            // Get the occasion ID (assuming it's stored in a data attribute on the button)
            const occasionId = $(this).data('occasion-id');

            // Send AJAX request to add products to the occasion
            $.ajax({
                url: '<?= base_url("Admin/add_products_to_occasion") ?>',
                type: 'POST',
                data: {
                    occasion_id: occasionId,
                    product_ids: selectedProductIds
                },
                success: function(response) {
                    // Handle success
                    alert('Products added successfully!');
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error('Error:', error);
                    alert('Failed to add products. Please try again.');
                }
            });
        });
</script> -->

<script>
    // Array to hold selected product IDs
    let selectedProductIds = [];

    // Convert PHP array to JavaScript array
    <?php if (!empty($products)): ?>
        selectedProductIds = <?php echo json_encode(array_map('strval', array_column($products, 'product_id'))); ?>;
    <?php endif; ?>

    console.log('Initial selected product IDs:', selectedProductIds);

    // Initialize checkboxes based on selectedProductIds
    $(document).ready(function() {
        $('.product-checkbox').each(function() {
            const productId = $(this).data('product-id').toString(); // Ensure productId is a string
            if (selectedProductIds.includes(productId)) {
                $(this).prop('checked', true);
            }
        });
    });

    // Function to handle checkbox change events
    $(document).on('change', '.product-checkbox', function() {
        const productId = $(this).data('product-id').toString(); // Ensure productId is a string

        if ($(this).is(':checked')) {
            // Add product ID to the array if the checkbox is checked
            if (!selectedProductIds.includes(productId)) {
                selectedProductIds.push(productId);
            }
        } else {
            // Remove product ID from the array if the checkbox is unchecked
            selectedProductIds = selectedProductIds.filter(id => id !== productId);
        }

        // Log the array of selected product IDs (for testing)
        console.log('Selected product IDs:', selectedProductIds);
    });

    $('#addProductBtn').on('click', function() {
        // Get the occasion ID (assuming it's stored in a data attribute on the button)
        const occasionId = $(this).data('occasion-id');

        console.log(selectedProductIds);

        // Send AJAX request to add products to the occasion
        $.ajax({
            url: '<?= base_url("Admin/update_products_to_occasion") ?>',
            type: 'POST',
            data: {
                occasion_id: occasionId,
                product_ids: selectedProductIds
            },
            success: function(response) {
                // Handle success
                alert('Products updated successfully!');
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Error:', error);
                alert('Failed to add products. Please try again.');
            }
        });
    });
</script>




    <script>
        $(document).ready(function() {
            let table = new DataTable('#productTable');
            var productsNotFoundDisplayed = false; // Flag to track if "No products available" message is displayed

            const occasionId = $(this).data('occasion-id');

            // Event listener for type filter
            $('#type-filter').change(function() {
                var type = $(this).val();
                var categoryId = $('#categories-filter').val();
                var subcategoryId = $('#subcategory-filter').val();

                fetchProducts(categoryId, type, subcategoryId);
            });

            // Event listener for category filter
            $('#categories-filter').change(function() {
                var categoryId = $(this).val();
                var type = $('#type-filter').val();

                fetchSubcategories(categoryId, type);
                fetchProducts(categoryId, type);

            });

            // Event listener for subcategory filter
            $('#subcategory-filter').change(function() {
                var categoryId = $('#categories-filter').val();
                var type = $('#type-filter').val();
                var subcategoryId = $(this).val();

                fetchProducts(categoryId, type, subcategoryId);
            });

            // Function to fetch products based on category, type, and subcategory
            function fetchProducts(categoryId, type, subcategoryId) {
                $.ajax({
                    url: '<?=base_url('admin/filterOccasionProducts') ?>',
                    type: 'POST',
                    data: {
                        category_id: categoryId,
                        type: type,
                        subtype: subcategoryId,
                        occasionId:occasionId
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);

                        // Clear the existing products
                        // $('.products-admin').empty();
                        $('#productTable').DataTable().clear().destroy();

                        // Process the fetched products
                        if (data.length > 0) {
                            processProducts(data);
                            $('#productTable').find('.no-products-message').remove(); // Remove any existing "No products available" message
                             $('#productTable').DataTable();
                        } else {
                            // Remove any existing "No products available" message
                            $('#productTable').find('.no-products-message').remove();

                            // Append the "No products available" message if it's not already displayed
                            if (!$('#productTable').find('.no-products-message').length) {
                                $('#productTable').append('<p class="no-products-message">No products available</p>');
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching products:', error);
                    }
                });
            }


            // Function to fetch subcategories based on category
            function fetchSubcategories(categoryId) {
                // console.log('subcatgory click');
                $.ajax({
                    url: '<?php echo base_url('api/subcategory/category/'); ?>' + categoryId,
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        populateSubcategories(data);
                    },
                    error: function(xhr, status, error) {
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

                for (var i = 0; i < data.data.length; i++) {
                    $('#subcategory-filter').append($('<option>', {
                        value: data.data[i].id,
                        text: data.data[i].subcategory_name
                    }));
                }
            }

            // Function to process fetched products and display them
            function processProducts(data) {
                // Iterate through each product in the data array
                var tableBody = $('#productTable tbody');
                tableBody.empty(); 
                data.forEach(function(product) {

                    // Generate HTML for the product card
                    var productRow = `
            <tr>
                <td class="text-center">
                    <input type="checkbox" class="product-checkbox" data-product-id="${product.id}">
                </td>
                <td>
                    <img src="<?= base_url('upload/productimg/') ?>${product.product_img1}" class="img-fluid blur-up lazyload" alt="" style="width: 100px;">
                </td>
                <td>${product.product_name}</td>
                <td>
                    $${product.selling_price} <del>$${product.price}</del>
                </td>
                <td>
                    <div class="rating">
                        ${renderStars(product.rating)}
                    </div>
                </td>
            </tr>
        `;

                    // Append the product HTML to the products container
                    tableBody.append(productRow);
                });
            }
            function renderStars(rating) {
    let starsHtml = '';
    for (let i = 0; i < 5; i++) {
        starsHtml += `<i class="fa fa-star${i < rating ? '' : '-o'}"></i>`;
    }
    return starsHtml;
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            console.log('Document ready');

            // When the delete button is clicked
            $('.delete-product-btn').click(function() {
                console.log('Delete button clicked');

                // Get the product ID from the data attribute
                var productId = $(this).data('product-id');
                console.log('Product ID:', productId);

                // Construct the delete URL
                var deleteUrl = "<?= base_url('admin/product/delete/') ?>" + productId;
                console.log('Delete URL:', deleteUrl);

                // Set the delete URL as the href attribute of the delete button
                $('#confirmDeleteButton').attr('href', deleteUrl);

                // Display the confirmation message with the corresponding product ID
                $('#deleteConfirmationModal').find('.modal-body').html('Are you sure you want to delete product?');
            });
        });
    </script>

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
                success: function(data) {
                    // console.log(data);
                    // alert(data);
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