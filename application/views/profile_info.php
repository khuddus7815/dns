<section class="section-b-space margin-top">
    <div class="container">
        <div class="row">
            <?php $this->load->view('common/profile_sidebar', ['active_tab' => 'profile']); ?>

            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard" style="display:block;">
                        <div class="page-title text-center">
                            <label for="uploadImage" class="upload-image-label">
                                <?php if (!empty($details->user_image)) { ?>
                                    <img src="<?php echo base_url('upload/profileimg/' . $details->user_image); ?>"
                                        class="dashboard-profile-img" id="userImage">
                                <?php } else { ?>
                                    <img src="<?= base_url('assets/images/fashion/lookbook/1.jpg'); ?>"
                                        class="dashboard-profile-img" id="userImage">
                                <?php } ?>
                                <input type="file" id="uploadImage" class="d-none">
                            </label>

                            <h2 class="mt-4"> <?php echo $details->first_name . ' ' . $details->last_name; ?></h2>
                            <h5>
                                <?php
                                echo !empty($details->dob) ? date('d/m/Y', strtotime($details->dob)) : '01/01/2000';
                                echo " &#9642; ";
                                echo !empty($details->gender) ? $details->gender : 'Male';
                                ?>
                                <a href="#" id="editDetailsLink" class="ms-2" style="font-size: 0.8em;">Edit</a>
                            </h5>
                        </div>

                        <div class="box-account box-info">
                            <div class="box">
                                <div class="box-title">
                                    <h3>Contact Information</h3>
                                    <a href="#" id="editProfileLink">Edit</a>
                                </div>
                                <div class="box-content">
                                    <div class="contact-info">
                                        <h6>Contact Number:</h6>
                                        <h6>+91 <?php echo $details->mobile; ?></h6>
                                    </div>
                                    <div class="contact-info">
                                        <h6>Email:</h6>
                                        <h6> <?php echo $details->email; ?></h6>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <button type="button" class="btn btn-solid" data-bs-toggle="modal"
                                        data-bs-target="#changepassword">
                                        Forgot Password
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="changepassword" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="opacity: 1; font-size: 24px; padding: 8px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="theme-form">
                    <div class="form-group"><label>Current Password</label><input type="password" class="form-control"
                            required></div>
                    <div class="form-group"><label>New Password</label><input type="password" class="form-control"
                            required></div>
                    <div class="form-group"><label>Confirm Password</label><input type="password" class="form-control"
                            required></div>
                    <div class="text-center mt-3"><button type="submit" class="btn btn-solid">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editprofile" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Contact Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="opacity: 1; font-size: 24px; padding: 8px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editContactForm" class="theme-form">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" id="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="text-center mt-3"><button type="submit" class="btn btn-solid">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editDetails" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="opacity: 1; font-size: 24px; padding: 8px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editDetailsForm" class="theme-form">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" id="dob" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" id="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="text-center mt-3"><button type="submit" class="btn btn-solid">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        // 1. Handle Image Upload
        $(document).on('change', '#uploadImage', function (e) {
            e.preventDefault();
            var formData = new FormData();
            var file = $('#uploadImage')[0].files[0];

            if (file) {
                formData.append('userImage', file);
                $.ajax({
                    url: "<?= base_url('Main/upload_image') ?>",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            $('#userImage').attr('src', response.imagePath);
                            location.reload();
                        } else {
                            alert('Failed to upload: ' + response.message);
                        }
                    },
                    error: function () { alert('Error uploading image'); }
                });
            }
        });

        // 2. Open Edit Contact Modal with Data
        $('#editProfileLink').click(function (e) {
            e.preventDefault();
            $('#phone_number').val('<?= $details->mobile; ?>');
            $('#email').val('<?= $details->email; ?>');
            new bootstrap.Modal(document.getElementById('editprofile')).show();
        });

        // 3. Submit Edit Contact Form
        $('#editContactForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('Main/update_contact_info') ?>",
                type: 'POST',
                data: {
                    phone_number: $('#phone_number').val(),
                    email: $('#email').val()
                },
                dataType: 'json',
                success: function (res) {
                    if (res.success) location.reload();
                    else alert(res.message);
                }
            });
        });

        // 4. Open Edit Details Modal with Data
        $('#editDetailsLink').click(function (e) {
            e.preventDefault();
            $('#dob').val('<?= $details->dob; ?>');
            $('#gender').val('<?= $details->gender; ?>');
            new bootstrap.Modal(document.getElementById('editDetails')).show();
        });

        // 5. Submit Edit Details Form
        $('#editDetailsForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('Main/update_user_details') ?>",
                type: 'POST',
                data: {
                    dob: $('#dob').val(),
                    gender: $('#gender').val()
                },
                dataType: 'json',
                success: function (res) {
                    if (res.success) location.reload();
                    else alert(res.message);
                }
            });
        });
    });
</script>