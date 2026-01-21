<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <a href="javascript:history.back()"
                            style="color: inherit; text-decoration: none; margin-right: 10px;">
                            <i data-feather="arrow-left"></i>
                        </a>
                        <h3>SubCategory List

                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">SubCategory</li>
                        <li class="breadcrumb-item active">SubCategory List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <!-- <?php echo '<pre>';
    print_r($subcategory); ?> -->
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>SubCategory List</h5>
            </div>
            <div class="card-body">
                <div class="btn-popup pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test"
                        data-target="#exampleModal">Add SubCategory</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Subcategory</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" action="<?= base_url('admin/addsubcategory') ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Category Name:</label>
                                                <select class="form-control" name="category_id">
                                                    <option selected>Choose option</option>
                                                    <?php if (!empty($category))
                                                        foreach ($category as $cat) { ?>
                                                            <option value="<?= $cat->id ?>"><?= $cat->category_name ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Sub-Category Name :</label>
                                                <input class="form-control" name="subcategoryname"
                                                    id="validationCustom01" type="text" required>
                                            </div>
                                            <div class="form-group mb-0">
                                                <label for="validationCustom02" class="mb-1">Sub-Category Image
                                                    :</label>
                                                <input class="form-control" name="subcatimage" id="validationCustom02"
                                                    type="file" required>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <?php print_r($subcategory); ?> -->

                <div class="card-body vendor-table">
                    <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                <th>Sub-Category Name</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($subcategory)) {
                                foreach ($subcategory as $subcat) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex vendor-list">
                                                <img src="<?= base_url('upload/subcategory/' . $subcat->subcategory_image) ?>"
                                                    alt="" class="img-fluid img-40 rounded-circle blur-up lazyloaded">
                                                <span><?= $subcat->subcategory_name ?></span>
                                            </div>
                                        </td>
                                        <!-- <td><img src="<?= base_url('upload/subcategory/' . $subcat->subcategory_image) ?>" alt="" class="img-fluid img-40 rounded-circle blur-up lazyloaded"></td> -->
                                        <td><?= $subcat->category_name ?></td>
                                        <td>
                                            <div>
                                                <a class="edit-subcategory-btn" href="#" data-toggle="modal"
                                                    data-target="#exampleModal1"
                                                    data-subcategory-id="<?= $subcat->subcategory_id ?>"> <i
                                                        class="fa fa-edit mr-2 font-success"></i></a>
                                                <a class="delete-subcategory-btn" href="#" data-toggle="modal"
                                                    data-target="#deleteConfirmationModal"
                                                    data-subcategory-id="<?= $subcat->subcategory_id ?>"><i
                                                        class="fa fa-trash font-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- Container-fluid Ends-->

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Subcategory</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" action="<?= base_url('admin/editsubcategory') ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form">
                                <input type="hidden" name="edit_subcategory_id" id="editSubcategoryId">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Select Category:</label>
                                    <select class="form-control" name="editcategory_id" id="editcategory_id">
                                        <option selected>Choose option</option>
                                        <?php if (!empty($category))
                                            foreach ($category as $cat) { ?>
                                                <option value="<?= $cat->id ?>"><?= $cat->category_name ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Sub-Category Name :</label>
                                    <input class="form-control" name="editsubcategoryname" id="editsubcategoryname"
                                        type="text">

                                </div>
                                <div class="form-group mb-0">
                                    <label for="validationCustom02" class="mb-1">Sub-Category Image :</label>
                                    <input class="form-control" name="subcatimage" id="subcatimage" type="file">
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>





        </div>

        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
            aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title f-w-600" id="deleteModalLabel">Delete Subcategory</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this occasion?</p>
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
                console.log('Document ready');

                // When the delete button is clicked
                $('.delete-subcategory-btn').click(function () {
                    console.log('Delete button clicked');

                    // Get the product ID from the data attribute
                    var occasionId = $(this).data('subcategory-id');
                    console.log('Product ID:', occasionId);

                    // Construct the delete URL
                    var deleteUrl = "<?= base_url('admin/subcategory/delete/') ?>" + occasionId;
                    console.log('Delete URL:', deleteUrl);

                    // Set the delete URL as the href attribute of the delete button
                    $('#confirmDeleteButton').attr('href', deleteUrl);

                    // Display the confirmation message with the corresponding product ID
                    $('#deleteConfirmationModal').find('.modal-body').html('Are you sure you want to delete product?');
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                // Function to fetch subcategory data and populate edit modal
                function fetchSubcategoryData(subcategoryId) {
                    $.ajax({
                        url: "<?= base_url('api/subcategory/') ?>" + subcategoryId,
                        type: "GET",
                        dataType: "json",
                        success: function (response) {
                            console.log("Fetched subcategory data:", response);

                            // Populate the edit modal fields with the retrieved data

                            $('#editSubcategoryId').val(subcategoryId);
                            $('#editsubcategoryname').val(response.subcategory_name);
                            // $('#subcatimage').val(response.subcategory_image);
                            $("#editcategory_id option[value='" + response.category_id + "']").prop('selected', true);


                        },
                        error: function (xhr, status, error) {
                            console.error("Error fetching subcategory data:", error);
                        }
                    });
                }

                // When the edit button is clicked
                $('.edit-subcategory-btn').click(function () {
                    // Get the subcategory ID from the data attribute
                    var subcategoryId = $(this).data('subcategory-id');
                    console.log("Edit button clicked for subcategory ID:", subcategoryId);

                    // Fetch subcategory data and populate edit modal
                    fetchSubcategoryData(subcategoryId);
                });
            });
        </script>