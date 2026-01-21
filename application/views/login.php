<link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>">

<style>
    .error {
        border-color: red !important;
    }

    #login-section .user .formBx {
        border-radius: 10px;
        transition: all 0.6s ease-in-out;
    }

    #login-section .user .formBx input {
        border-radius: 10px;
    }

    #login-section .container,
    #login-section .user.signinBx,
    #login-section .user.signupBx,
    #login-section .user .imgBx {
        transition: all 0.6s ease-in-out;
    }

    .password-container {
        position: relative;
    }

    #login-section .user .formBx .password-container input {
        padding-right: 45px;
    }

    .toggle-password {
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
        display: none;
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

<section id="login-section">
    <div class="container"
        style="border-radius: 20px; background-color: #f9f9f9; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        <div class="user signinBx">
            <div class="imgBx"><img src="<?= base_url(); ?>assets/images/cake/loginbanner.jpg" alt="" /></div>
            <div class="formBx text-center">
                <form action="<?php echo site_url('login'); ?>" method="post">


                    <div style="margin-top: 20px;">
                        <?php
                        $CI =& get_instance();
                        $CI->load->model('Settings_model');
                        $logo_path = $CI->Settings_model->get_setting('site_logo');
                        $logo_url = $logo_path ? base_url('upload/logo/' . $logo_path) : base_url('assets/images/icon/logo/fd9.png');
                        ?>
                        <img src="<?= $logo_url ?>" alt="Logo" width="200" height="100" />
                    </div>


                    <input type="text" name="username" placeholder="Username" required>

                    <div class="password-container">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="fa fa-eye-slash toggle-password"></i>
                    </div>

                    <input type="submit" value="Login">
                    <p class="signup">
                        Don't have an account ?
                        <a href="javascript:void(0)" onclick="toggleForm();">Sign Up.</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="user signupBx">
            <div class="formBx text-center">
                <form name="signupForm" action="<?php echo site_url('register'); ?>" method="post"
                    onsubmit="return validateSignUpForm()">
                    <div style="margin-top: 20px;">
                        <?php
                        $CI =& get_instance();
                        $CI->load->model('Settings_model');
                        $logo_path = $CI->Settings_model->get_setting('site_logo');
                        $logo_url = $logo_path ? base_url('upload/logo/' . $logo_path) : base_url('assets/images/icon/logo/fd9.png');
                        ?>
                        <img src="<?= $logo_url ?>" alt="Logo" width="200" height="100" />
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="col">
                            <input type="text" name="last_name" placeholder="Last Name" required>
                        </div>
                    </div>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="number" name="mobile" placeholder="Phone" required>

                    <div class="password-container">
                        <input type="password" name="password" placeholder="Create Password" required>
                        <i class="fa fa-eye-slash toggle-password"></i>
                    </div>
                    <div class="password-container">
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                        <i class="fa fa-eye-slash toggle-password"></i>
                    </div>

                    <input type="submit" value="Sign Up">
                    <p class="signup">
                        Already have an account ?
                        <a href="javascript:void(0)" onclick="toggleForm();">Sign in.</a>
                    </p>
                </form>
            </div>
            <div class="imgBx"><img src="<?= base_url(); ?>assets/images/cake/loginbanner.jpg" alt=""></div>
        </div>

    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>

<script>
    function toggleForm() {
        const container = document.querySelector('#login-section .container');
        container.classList.toggle('active');
    }

    function validateSignUpForm() {
        var username = document.forms["signupForm"]["username"].value;
        var email = document.forms["signupForm"]["email"].value;
        var password = document.forms["signupForm"]["password"].value;
        var confirmPassword = document.forms["signupForm"]["confirm_password"].value;

        removeErrorIndicators();

        var validation = new Validator({
            username: username,
            email: email,
            password: password,
            confirm_password: confirmPassword
        }, {
            username: 'required',
            email: 'required|email',
            password: 'required|min:6',
            confirm_password: 'required|same:password'
        });

        if (validation.fails()) {
            var errors = validation.errors.all();
            for (var key in errors) {
                showError(document.forms["signupForm"][key], errors[key][0]);
            }
            return false;
        }
        return true;
    }

    function showError(inputField, message) {
        inputField.classList.add("error");
        inputField.setCustomValidity(message);
    }

    function removeErrorIndicators() {
        var inputFields = document.querySelectorAll("#login-section input");
        inputFields.forEach(function (input) {
            input.classList.remove("error");
            input.setCustomValidity("");
        });
    }

    $(document).ready(function () {
        // Handle password visibility toggle
        document.querySelectorAll('.password-container').forEach(container => {
            const passwordInput = container.querySelector('input[type="password"]');
            const icon = container.querySelector('.toggle-password');

            if (passwordInput && icon) {
                // Show/hide icon based on typing
                passwordInput.addEventListener('input', function () {
                    if (passwordInput.value.length > 0) {
                        icon.style.display = 'block';
                    } else {
                        icon.style.display = 'none';
                    }
                });

                // Toggle password on icon click
                icon.addEventListener('click', function () {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        this.classList.remove('fa-eye-slash');
                        this.classList.add('fa-eye');
                    } else {
                        passwordInput.type = 'password';
                        this.classList.remove('fa-eye');
                        this.classList.add('fa-eye-slash');
                    }
                });
            }
        });
    });
</script>