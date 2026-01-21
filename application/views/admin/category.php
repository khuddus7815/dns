<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <a href="javascript:history.back()"
                            style="color: inherit; text-decoration: none; margin-right: 10px;">
                            <i data-feather="arrow-left"></i>
                        </a>
                        <h3>Category List

                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Category</li>
                        <li class="breadcrumb-item active">Category List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Category List</h5>
            </div>
            <div class="card-body">
                <div class="btn-popup pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test"
                        data-target="#exampleModal">Add Category</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Category</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" action="<?= base_url('admin/add_category') ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">Category Name :</label>
                                                <input class="form-control" name="categoryname" id="validationCustom01"
                                                    type="text" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom02" class="mb-1">Category Image :</label>
                                                <input class="form-control" name="catimage" id="validationCustom02"
                                                    type="file" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="validationCustom03" class="mb-1">Category Banner :</label>
                                                <input class="form-control" name="catbanner" id="validationCustom03"
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



                <div class="card-body vendor-table">
                    <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Category image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($category)) {
                                foreach ($category as $cat) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex vendor-list">
                                                <img src="<?= print_r(base_url('upload/categoryimg/' . $cat->category_image)) ?>"
                                                    alt="" class="img-fluid img-40 rounded-circle blur-up lazyloaded">
                                                <span><?= $cat->category_name ?></span>
                                            </div>
                                        </td>
                                        <td><img src="<?= base_url('upload/categoryimg/' . $cat->category_image) ?>" alt=""
                                                class="img-fluid img-40 rounded-circle blur-up lazyloaded"></td>
                                        <td>
                                            <div>
                                                <a href="#" data-toggle="modal" data-target="#exampleModal1"
                                                    onclick="populateEditModal('<?= $cat->category_name ?>', <?= $cat->id ?>)">
                                                    <i class="fa fa-edit mr-2 font-success"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#exampleModal2"
                                                    onclick="deleteCategory('<?= $cat->category_name ?>', <?= $cat->id ?>)">
                                                    <i class="fa fa-trash font-danger"></i>
                                                </a>
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
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title f-w-600" id="exampleModalLabel1">Edit Category</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">

                        <form class="edit-category-form needs-validation"
                            action="<?= base_url('admin/edit_category') ?>" method="post" enctype="multipart/form-data">
                            <div class="form">
                                <input type="hidden" name="edit_category_id" id="editCategoryId">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">Category Name :</label>
                                    <input class="form-control" name="categoryname" id="editCategoryName" type="text"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom02" class="mb-1">Category Image :</label>
                                    <input class="form-control" name="catimage" id="editCategoryImage" type="file">
                                </div>
                                <div class="form-group">
                                    <label for="validationCustom03" class="mb-1">Category Banner :</label>
                                    <input class="form-control" name="catbanner" id="editBannerImage" type="file">
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




        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title f-w-600" id="exampleModalLabel2">Delete Category</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <p id="deleteConfirmationText">Are you sure you want to delete this category?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" id="confirmDelete">Delete</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function populateEditModal(name, id, image) {
            // Set category name in the modal
            $("#editCategoryId").val(id);

            $("#editCategoryName").val(name);

            // Set category image in the modal
            $("#editCategoryImage").val(image);

            // Make AJAX request to fetch category data
            $.ajax({
                url: "<?= base_url('admin/get_category/') ?>" + id,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    console.log(response.data);
                    if (response.success) {
                        // Populate the form fields with the received data
                        $("#editCategoryId").val(response.data.id);

                        $("#editCategoryName").val(response.data.category_name);
                        // Note: You can't set the value of a file input for security reasons
                        // $("#editCategoryImage").val(response.data.category_description); 
                        // $("#editBannerImage").val(response.data.banner_img);

                        // Show the edit category modal
                        $("#exampleModal1").modal("show");
                    } else {
                        alert("Failed to fetch category data.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Error occurred while fetching category data.");
                }
            });
        }

        // Function to handle category deletion
        function deleteCategory(name, id) {
            // Set the category name and ID in the modal body
            $("#deleteConfirmationText").text("Are you sure you want to delete the category '" + name + "'?");

            // Set the category ID as a data attribute of the Delete button
            $("#confirmDelete").attr("data-category-id", id);

            // Show the delete confirmation modal
            $("#exampleModal2").modal("show");
        }

        // Handle click event for the delete button in the confirmation modal
        $("#confirmDelete").click(function () {
            // Get the category ID from the data attribute
            var categoryId = $(this).attr("data-category-id");

            // Redirect to the controller deletion URL
            // This works because Admin.php/delete_category redirects back to this page after deletion
            window.location.href = "<?= base_url('admin/delete_category/') ?>" + categoryId;
        });
    </script>
</div>