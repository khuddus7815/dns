<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>
                            <a href="javascript:history.back()"
                                style="color: inherit; text-decoration: none; margin-right: 10px;">
                                <i data-feather="arrow-left"></i>
                            </a>
                            Banner Management

                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Banners</li>
                        <li class="breadcrumb-item active">Banner List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Banner List</h5>
            </div>
            <div class="card-body">
                <div class="btn-popup pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBannerModal">Add
                        Banner</button>
                    <div class="modal fade" id="addBannerModal" tabindex="-1" role="dialog"
                        aria-labelledby="addBannerModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title f-w-600" id="addBannerModalLabel">Add Banner</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" action="<?= base_url('admin/add_banner') ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form">
                                            <div class="form-group">
                                                <label for="bannerTitle" class="mb-1">Banner Title :</label>
                                                <input class="form-control" name="title" id="bannerTitle" type="text"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bannerDescription" class="mb-1">Description :</label>
                                                <textarea class="form-control" name="description" id="bannerDescription"
                                                    rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="bannerImage" class="mb-1">Banner Image :</label>
                                                <input class="form-control" name="banner_image" id="bannerImage"
                                                    type="file" accept="image/*" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bannerLink" class="mb-1">Link URL (Optional) :</label>
                                                <input class="form-control" name="link_url" id="bannerLink" type="url"
                                                    placeholder="https://example.com">
                                            </div>
                                            <div class="form-group">
                                                <label for="bannerStatus" class="mb-1">Status :</label>
                                                <select class="form-control" name="status" id="bannerStatus">
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="bannerOrder" class="mb-1">Display Order :</label>
                                                <input class="form-control" name="display_order" id="bannerOrder"
                                                    type="number" value="0" min="0">
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
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Link URL</th>
                                <th>Status</th>
                                <th>Display Order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($banners)) {
                                foreach ($banners as $banner) { ?>
                                    <tr>
                                        <td>
                                            <img src="<?= base_url('upload/banners/' . $banner->image_path) ?>"
                                                alt="<?= htmlspecialchars($banner->title) ?>" class="img-fluid"
                                                style="max-width: 100px; height: auto;">
                                        </td>
                                        <td><?= htmlspecialchars($banner->title) ?></td>
                                        <td><?= htmlspecialchars(substr($banner->description, 0, 50)) . (strlen($banner->description) > 50 ? '...' : '') ?>
                                        </td>
                                        <td><?= !empty($banner->link_url) ? htmlspecialchars($banner->link_url) : '-' ?></td>
                                        <td>
                                            <span class="badge badge-<?= $banner->status == 'active' ? 'success' : 'danger' ?>">
                                                <?= ucfirst($banner->status) ?>
                                            </span>
                                        </td>
                                        <td><?= $banner->display_order ?></td>
                                        <td>
                                            <div>
                                                <a href="#" data-toggle="modal" data-target="#editBannerModal"
                                                    onclick="populateEditBannerModal(<?= $banner->id ?>)">
                                                    <i class="fa fa-edit mr-2 font-success"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteBannerModal"
                                                    onclick="deleteBanner(<?= $banner->id ?>, '<?= htmlspecialchars($banner->title, ENT_QUOTES) ?>')">
                                                    <i class="fa fa-trash font-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center">No banners found. Please add a banner.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Edit Banner Modal -->
        <div class="modal fade" id="editBannerModal" tabindex="-1" role="dialog" aria-labelledby="editBannerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title f-w-600" id="editBannerModalLabel">Edit Banner</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" action="<?= base_url('admin/edit_banner') ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form">
                                <input type="hidden" name="banner_id" id="editBannerId">
                                <div class="form-group">
                                    <label for="editBannerTitle" class="mb-1">Banner Title :</label>
                                    <input class="form-control" name="title" id="editBannerTitle" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="editBannerDescription" class="mb-1">Description :</label>
                                    <textarea class="form-control" name="description" id="editBannerDescription"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="editBannerImage" class="mb-1">Banner Image (Leave empty to keep current)
                                        :</label>
                                    <input class="form-control" name="banner_image" id="editBannerImage" type="file"
                                        accept="image/*">
                                    <small class="form-text text-muted">Current image: <span
                                            id="currentBannerImage"></span></small>
                                </div>
                                <div class="form-group">
                                    <label for="editBannerLink" class="mb-1">Link URL (Optional) :</label>
                                    <input class="form-control" name="link_url" id="editBannerLink" type="url"
                                        placeholder="https://example.com">
                                </div>
                                <div class="form-group">
                                    <label for="editBannerStatus" class="mb-1">Status :</label>
                                    <select class="form-control" name="status" id="editBannerStatus">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="editBannerOrder" class="mb-1">Display Order :</label>
                                    <input class="form-control" name="display_order" id="editBannerOrder" type="number"
                                        value="0" min="0">
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Update</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Banner Modal -->
        <div class="modal fade" id="deleteBannerModal" tabindex="-1" role="dialog"
            aria-labelledby="deleteBannerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title f-w-600" id="deleteBannerModalLabel">Delete Banner</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <p id="deleteBannerConfirmationText">Are you sure you want to delete this banner?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" id="confirmDeleteBanner">Delete</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function populateEditBannerModal(bannerId) {
            $.ajax({
                url: "<?= base_url('admin/get_banner/') ?>" + bannerId,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $("#editBannerId").val(response.data.id);
                        $("#editBannerTitle").val(response.data.title);
                        $("#editBannerDescription").val(response.data.description);
                        $("#editBannerLink").val(response.data.link_url);
                        $("#editBannerStatus").val(response.data.status);
                        $("#editBannerOrder").val(response.data.display_order);
                        $("#currentBannerImage").html('<a href="<?= base_url("upload/banners/") ?>' + response.data.image_path + '" target="_blank">View Current Image</a>');
                        $("#editBannerModal").modal("show");
                    } else {
                        alert("Failed to fetch banner data.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Error occurred while fetching banner data.");
                }
            });
        }

        function deleteBanner(id, title) {
            $("#deleteBannerConfirmationText").text("Are you sure you want to delete the banner '" + title + "'?");
            $("#confirmDeleteBanner").attr("data-banner-id", id);
            $("#deleteBannerModal").modal("show");
        }

        $("#confirmDeleteBanner").click(function () {
            var bannerId = $(this).attr("data-banner-id");
            window.location.href = "<?= base_url('admin/delete_banner/') ?>" + bannerId;
        });
    </script>
</div>