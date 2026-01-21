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
                            Profile Settings
                            <small>Manage your admin profile</small>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Your Profile</h5>
                    </div>
                    <div class="card-body">
                        <form class="theme-form" action="<?= base_url('admin/update_profile') ?>" method="POST"
                            enctype="multipart/form-data">

                            <input type="hidden" name="user_id"
                                value="<?= isset($admin_data->user_id) ? $admin_data->user_id : '' ?>">

                            <div class="form-group">
                                <label>Current Profile Picture</label><br>
                                <?php
                                $pic_url = base_url('adminassets/images/dashboard/man.png'); // Default image
                                if (isset($admin_data->profile_pic) && !empty($admin_data->profile_pic)) {
                                    $pic_url = base_url('upload/profile/' . $admin_data->profile_pic);
                                }
                                ?>
                                <img class="img-70 rounded-circle" src="<?= $pic_url ?>" alt="Profile Image"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your name"
                                    value="<?= isset($admin_data->username) ? $admin_data->username : '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email"
                                    value="<?= isset($admin_data->email) ? $admin_data->email : '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="mobile">Phone Number</label>
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    placeholder="Enter your phone number"
                                    value="<?= isset($admin_data->mobile) ? $admin_data->mobile : '' ?>">
                            </div>

                            <div class="form-group">
                                <label for="profile_pic">Change Profile Picture</label>
                                <input type="file" class="form-control" id="profile_pic" name="profile_pic">
                                <small class="form-text text-muted">Upload a new image to change your profile picture.
                                    Leave blank to keep the current one.</small>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                <a href="<?= base_url('admin/') ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo Upload Section -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Site Logo Settings</h5>
                        <small class="text-muted">Upload your site logo. This logo will be used throughout the
                            application.</small>
                    </div>
                    <div class="card-body">
                        <?php
                        $CI =& get_instance();
                        $CI->load->model('Settings_model');
                        $current_logo = $CI->Settings_model->get_setting('site_logo');
                        $logo_url = $current_logo ? base_url('upload/logo/' . $current_logo) : base_url('assets/images/icon/logo/fd9.png');
                        ?>
                        <form class="theme-form" action="<?= base_url('admin/upload_logo') ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Current Logo</label><br>
                                <img src="<?= $logo_url ?>" alt="Current Logo"
                                    style="max-width: 200px; height: auto; border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
                            </div>
                            <div class="form-group">
                                <label for="site_logo">Upload New Logo</label>
                                <input type="file" class="form-control" id="site_logo" name="site_logo"
                                    accept="image/*">
                                <small class="form-text text-muted">Recommended size: 200x200px. Supported formats: JPG,
                                    PNG, GIF. Max size: 2MB</small>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Upload Logo</button>
                                <a href="<?= base_url('admin/') ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Razorpay Settings Section -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Razorpay Payment Gateway Settings</h5>
                        <small class="text-muted">Configure your Razorpay API credentials to enable online
                            payments</small>
                    </div>
                    <div class="card-body">
                        <form class="theme-form" action="<?= base_url('admin/save_razorpay_settings') ?>" method="POST">
                            <div class="form-group">
                                <label for="razorpay_key_id">Razorpay Key ID</label>
                                <input type="text" class="form-control" id="razorpay_key_id" name="razorpay_key_id"
                                    placeholder="Enter Razorpay Key ID (e.g., rzp_test_...)"
                                    value="<?= isset($razorpay_settings['razorpay_key_id']) ? htmlspecialchars($razorpay_settings['razorpay_key_id']) : '' ?>">
                                <small class="form-text text-muted">You can find this in your Razorpay Dashboard under
                                    Settings > API Keys</small>
                            </div>

                            <div class="form-group">
                                <label for="razorpay_key_secret">Razorpay Key Secret</label>
                                <input type="password" class="form-control" id="razorpay_key_secret"
                                    name="razorpay_key_secret" placeholder="Enter Razorpay Key Secret"
                                    value="<?= isset($razorpay_settings['razorpay_key_secret']) ? htmlspecialchars($razorpay_settings['razorpay_key_secret']) : '' ?>">
                                <small class="form-text text-muted">Keep this secret secure. Never share it
                                    publicly.</small>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save Razorpay Settings</button>
                                <a href="<?= base_url('admin/') ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>