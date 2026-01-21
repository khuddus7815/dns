<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DNS Store admin panel">
    <meta name="keywords" content="admin template, DNS Store admin, dashboard template, admin panel">
    <meta name="author" content="DNS Store">
    <link rel="icon" href="<?= base_url('assets/images/favicon_io/android-chrome-512x512.png') ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon_io/android-chrome-512x512.pngmul') ?>" type="image/x-icon">
    <title>DNS Store - Administration</title>

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url('adminassets/css/fontawesome.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('adminassets/css/themify.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('adminassets/css/slick.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('adminassets/css/slick-theme.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('adminassets/css/jsgrid.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('adminassets/css/bootstrap.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('adminassets/css/admin.css') ?>">

    <style>
        /* Ensure the eye icon is clickable and properly aligned */
        .input-group-text {
            cursor: pointer;
            background-color: #fff; /* Match input background */
            border-left: 0; /* Merge with input */
        }
        /* Remove right border from password input to merge with icon */
        #login_password {
            border-right: 0; 
        }
        /* Add focus styling to keep it looking seamless */
        .input-group:focus-within .form-control,
        .input-group:focus-within .input-group-text {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        
        /* Hide browser's password reveal icon */
        input[type="password"]::-webkit-credentials-auto-fill-button,
        input[type="password"]::-webkit-strong-password-auto-fill-button {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
        }
        
        input[type="password"] {
            -webkit-text-security: disc !important;
        }
        
        /* Firefox */
        input[type="password"] {
            -moz-appearance: textfield;
        }
        
        /* Edge/IE */
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear {
            display: none !important;
        }
    </style>

</head>

<body>

    <div class="page-wrapper">
        <div class="authentication-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 p-0 card-left">
                        <div class="card bg-primary pt-5">
                            <a href="<?php echo base_url('/'); ?>">
                                <?php
                                $CI =& get_instance();
                                $CI->load->model('Settings_model');
                                $logo_path = $CI->Settings_model->get_setting('site_logo');
                                $logo_url = $logo_path ? base_url('upload/logo/' . $logo_path) : base_url('assets/images/icon/logo/fd9.png');
                                ?>
                                <img src="<?php echo $logo_url; ?>" class="img-fluid blur-up lazyload" alt="" width="200" height="200">
                            </a>

                            <div class="single-item">
                                <div>
                                    <div class="py-5">
                                        <h3>Welcome to DNS CAKES</h3>
                                    </div>
                                </div>
                                <div>
                                    <div class="py-5">
                                        <h3>Welcome to DNS CAKES</h3>
                                    </div>
                                </div>
                                <div>
                                    <div class="py-5">
                                        <h3>Welcome to DNS Store</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 p-0 card-right">
                        <div class="card tab2-card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="top-profile-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true">Login</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="top-tabContent">
                                    <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">

                                        <form class="form-horizontal auth-form" action="<?= base_url('AuthController/admin_login') ?>" method="post">
                                            <div class="form-group">
                                                <input required="" name="email" type="text" class="form-control" placeholder="Email or Username" id="exampleInputEmail1">
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input required="" name="password" type="password" class="form-control" placeholder="Password" id="login_password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="togglePassword">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-terms">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                                    <b><?= $this->session->userdata('massage') ?></b>
                                                </div>
                                            </div>
                                            <div class="form-button">
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                        <form class="form-horizontal auth-form" action="<?= base_url('Admin/admin_registration') ?>" method="POST">
                                            <div class="form-group">
                                                <input required="" name="email" type="email" class="form-control" placeholder="Username" id="exampleInputEmail12">
                                            </div>
                                            <div class="form-group">
                                                <input required="" name="password" type="password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <input required="" name="password" type="password" class="form-control" placeholder="Confirm Password">
                                            </div>
                                            <div class="form-terms">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing1">
                                                    <label class="custom-control-label" for="customControlAutosizing1"><span>I agree all statements in <a href="#" class="pull-right">Terms &amp; Conditions</a></span></label>
                                                </div>
                                            </div>
                                            <div class="form-button">
                                                <button class="btn btn-primary" type="submit">Register</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <a href="<?= site_url('Main') ?>" class="btn btn-primary back-btn"><i data-feather="arrow-left"></i>back</a>
            </div>
        </div>
    </div>

    <script src="<?= base_url('adminassets/js/jquery-3.3.1.min.js') ?>"></script>

    <script src="<?= base_url('adminassets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('adminassets/js/bootstrap.js') ?>"></script>

    <script src="<?= base_url('adminassets/js/icons/feather-icon/feather.min.js') ?>"></script>
    <script src="<?= base_url('adminassets/js/icons/feather-icon/feather-icon.js') ?>"></script>

    <script src="<?= base_url('adminassets/js/sidebar-menu.js') ?>"></script>
    <script src="<?= base_url('adminassets/js/slick.js') ?>"></script>

    <script src="<?= base_url('adminassets/js/jsgrid/jsgrid.min.js') ?>"></script>
    <script src="<?= base_url('adminassets/js/jsgrid/griddata-invoice.js') ?>"></script>
    <script src="<?= base_url('adminassets/js/jsgrid/jsgrid-invoice.js') ?>"></script>

    <script src="<?= base_url('adminassets/js/lazysizes.min.js') ?>"></script>

    <script src="<?= base_url('adminassets/js/chat-menu.js') ?>"></script>

    <script src="<?= base_url('adminassets/js/admin-script.js') ?>"></script>
    <script>
        $('.single-item').slick({
            arrows: false,
            dots: true
        });
    </script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       $(document).ready(function() {

            // Toggle Password Functionality
            $('#togglePassword').click(function(){
                var passwordInput = $('#login_password');
                var icon = $(this).find('i');

                if(passwordInput.attr('type') === 'password'){
                    passwordInput.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                }else{
                    passwordInput.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            var successMessage = "<?= $this->session->flashdata('success_message'); ?>";
            var errorMessage = "<?= $this->session->flashdata('error_message'); ?>";

            if (errorMessage) {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed',
                    text: errorMessage,
                    position: 'center' 
                });
            }

            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successMessage,
                    position: 'center'
                });
            }
            function validatePassword(password) {
                // Allow passwords with special characters, minimum 6 characters
                return password.length >= 6;
            }

            $('.auth-form').submit(function(event) {
                console.log('submitting')
                var password = $(this).find('input[name="password"]').val();

                if (!validatePassword(password)) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Invalid Password',
                        text: 'Password must be at least 6 characters long.'
                    });
                    event.preventDefault();
                }
            });
        });
    </script>

</body>

</html>