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
                        <h3>occasion List
                          
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">occasion</li>
                        <li class="breadcrumb-item active">occasion List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>occasion List</h5>
            </div>
            <div class="card-body">
                <div class="btn-popup pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-original-title="test" data-target="#exampleModal">Add occasion</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Occassion</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" action="<?= base_url('admin/add_occasion') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="mb-1">occasion Name :</label>
                                                <input class="form-control" name="occasion_name" id="validationCustom01" type="text">
                                            </div>
                                            <div class="form-group mb-0">
                                                <label for="validationCustom02" class="mb-1">occasion Image :</label>
                                                <input class="form-control" name="occimg" id="validationCustom02" type="file">
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
                                <th>Occasion Name</th>
                                <th>Occasion Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($occasions)) {
                                foreach ($occasions as $occ) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex vendor-list">
                                                <img src="<?= base_url('upload/occasion/' . $occ->occasion_image) ?>" alt="" class="img-fluid img-40 rounded-circle blur-up lazyloaded">
                                                <span><?= $occ->occasion_name ?></span>
                                            </div>
                                        </td>
                                        <td><img src="<?= base_url('upload/occasion/' . $occ->occasion_image) ?>" alt="" class="img-fluid img-40 rounded-circle blur-up lazyloaded"></td>
                                        <td>
                                            <div>
                                                <a class="edit-occasion-btn" href="#" data-toggle="modal" data-target="#exampleModal1" data-occasion-id="<?= $occ->id ?>"> <i class="fa fa-edit mr-2 font-success"></i></a>
                                                <a class="delete-occasion-btn" href="#" data-toggle="modal" data-target="#deleteConfirmationModal" data-occasion-id="<?= $occ->id ?>"><i class="fa fa-trash mr-2 font-danger"></i></a>
                                                <a href="<?=base_url('Admin/occasion_product/'.$occ->id)?>"><i class="fa fa-plus mr-2 font-primary"></i></a>
                                                <a href="<?=base_url('Admin/view_occasion_product/'.$occ->id)?>"><i class="fa fa-eye font-primary"></i></a>
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

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit Occasion</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" action="<?= base_url('admin/edit_occasion') ?>" method="post" enctype="multipart/form-data">
                            <div class="form">
                                <input type="hidden" name="edit_occasion_id" id="editOccasionId">
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">occasion Name :</label>
                                    <input class="form-control" name="editoccasion_name" id="editoccasion_name" type="text">
                                </div>
                                <div class="form-group mb-0">
                                    <label for="validationCustom02" class="mb-1">occasion Image :</label>
                                    <input class="form-control" name="editcatimage" id="editcatimage" type="file">
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

        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title f-w-600" id="deleteModalLabel">Delete Occasion</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this occasion?</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn " id="confirmDeleteButton" type="button" style="background-color: #D22B2B; color: white;">Delete</a>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                console.log('Document ready');

                // When the delete button is clicked
                $('.delete-occasion-btn').click(function() {
                    console.log('Delete button clicked');

                    // Get the product ID from the data attribute
                    var occasionId = $(this).data('occasion-id');
                    console.log('Product ID:', occasionId);

                    // Construct the delete URL
                    var deleteUrl = "<?= base_url('admin/occasion/delete/') ?>" + occasionId;
                    console.log('Delete URL:', deleteUrl);

                    // Set the delete URL as the href attribute of the delete button
                    $('#confirmDeleteButton').attr('href', deleteUrl);

                    // Display the confirmation message with the corresponding product ID
                    $('#deleteConfirmationModal').find('.modal-body').html('Are you sure you want to delete product?');
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                // Function to fetch product data and populate edit modal
                function fetchProductData(occasionId) {
                    console.log(occasionId);
                    $.ajax({
                        url: "<?= base_url('api/occasion/') ?>" + occasionId,
                        type: "GET",
                        dataType: "json",
                        success: function(response) {
                            console.log(response.data.occasion_name);
                            // Populate the edit modal fields with the retrieved data
                            $('#editOccasionId').val(occasionId);

                            $('#editoccasion_name').val(response.data.occasion_name);
                            $('#editcatimage').val(response.data.catimage);

                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }

                // When the edit button is clicked
                $('.edit-occasion-btn').click(function() {
                    console.log('edit btn click');
                    // Get the product ID from the data attribute
                    var occasionId = $(this).data('occasion-id');

                    // Fetch product data and populate edit modal
                    fetchProductData(occasionId);
                });
            });
        </script>