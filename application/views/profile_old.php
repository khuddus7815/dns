<section class="section-b-space margin-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar"><a class="popup-btn">my account</a></div>
                <div class="dashboard-left">
                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                aria-hidden="true"></i> back</span></div>
                    <div class="block-content">
                        <ul>
                            <li class="filter-back active"><a href="#" class="active"
                                    onclick="showTab('profile', event)">Profile</a>
                            </li>
                            <li class="filter-back "><a href="#" onclick="showTab('address', event)">My Address</a></li>
                            <li class="filter-back"><a href="#" onclick="showTab('booking', event)">My Booking</a></li>
                            <li class="filter-back"><a href="#" onclick="showTab('wallet', event)">My Wallet</a></li>
                            <li class="last filter-back"><a href="<?= site_url('users/logout'); ?>">Log Out</a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard" id="profile">
                        <div class="page-title text-center">
                            <label for="uploadImage" class="upload-image-label">
                                <?php if (!empty($details->user_image)) { ?>
                                    <img src="<?php echo base_url('upload/profileimg/' . $details->user_image); ?>"
                                        alt="Profile Image" class="dashboard-profile-img" id="userImage">
                                <?php } else { ?>
                                    <img src="assets/images/fashion/lookbook/1.jpg" alt="Default Profile Image"
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
                                <a href="#" id="editDetailsLink">
                                    Edit
                                </a>
                            </h5>
                        </div>
                        <div class="box-account box-info">
                            <div class="box">
                                <div class="box-title">
                                    <h3>Contact Information</h3><a href="#" id="editProfileLink">Edit</a>
                                </div>
                                <div class="box-content">
                                    <div class="contact-info">
                                        <h6>Conatct Number:</h6>
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

                    <div id="address" class="dashboard dashboard-address-body">
                        <div class="page-title text-center">
                            <h2 class="m-2">My Address</h2>
                        </div>
                        <hr>
                        <div class="box-account mt-3">

                            <?php if (!empty($user_address)): ?>
                                <?php foreach ($user_address as $address): ?>
                                    <div class="box card dashboard-address-card">
                                        <div class="box-title d-flex justify-content-between">

                                            <h3 class="address-name"><?= htmlspecialchars($address->fullname); ?></h3>

                                            <div>
                                                <a href="#" class="editAddressLink"
                                                    data-id="<?= htmlspecialchars($address->id); ?>"
                                                    data-fullname="<?= htmlspecialchars($address->fullname); ?>"
                                                    data-phone="<?= htmlspecialchars($address->phone); ?>"
                                                    data-address="<?= htmlspecialchars($address->address); ?>"
                                                    data-locality="<?= htmlspecialchars($address->locality); ?>"
                                                    data-pincode="<?= htmlspecialchars($address->pincode); ?>"
                                                    data-city="<?= htmlspecialchars($address->city_twn); ?>"
                                                    data-state="<?= htmlspecialchars($address->state_id); // Assuming this is state_id, change to state name if available ?>">
                                                    <i class="fa fa-pencil mr-3" aria-hidden="true"></i>
                                                </a>

                                                <a href="#" class="deleteAddressLink"
                                                    data-id="<?= htmlspecialchars($address->id); ?>"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="box-content">
                                            <address>
                                                <?= htmlspecialchars($address->address); ?>,
                                                <?= htmlspecialchars($address->locality); ?>,
                                                <?= htmlspecialchars($address->city_twn); ?>,
                                                <?= htmlspecialchars($address->pincode); ?>
                                            </address>

                                            <p class="pt-2">Contact Number: <?= htmlspecialchars($address->phone); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No address found. Please add an address.</p>
                            <?php endif; ?>
                        </div>
                        <div class="text-center mb-3">
                            <button type="button" class="btn btn-solid" data-bs-toggle="modal"
                                data-bs-target="#addnewaddress">
                                Add New Address
                            </button>
                        </div>
                    </div>


                    <div id="booking" class="dashboard dashboard-address-body">
                        <div class="page-title text-center">
                            <h2>My Booking</h2>
                        </div>
                        <hr>
                        <div class="container mt-3">
                            <?php if (!empty($orders)): ?>
                                <?php foreach ($orders as $order): ?>
                                    <a href="<?php echo base_url('/order_detail/' . $order->order_id); ?>">
                                        <div class="card booking-history-card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-3 my-auto">
                                                    <img src="<?php echo base_url('upload/productimg/' . $order->product_image); ?>"
                                                        alt="<?php echo $order->product_name; ?>"
                                                        class="img-fluid product-image img-curved"
                                                        style="height: auto; width: 100%;">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <h3 class="card-title theme-color"><?php echo $order->product_name; ?>
                                                        </h3>
                                                        <div class="d-flex justify-content-between">
                                                            <p>Booking Id: <?php echo $order->order_number; ?></p>
                                                            <p class="card-text product-price">
                                                                <?php echo date('d/m/Y - H:i:s', strtotime($order->created_at)); ?>
                                                            </p>
                                                        </div>
                                                        <p class="card-text total-price">Total Prize: ₹
                                                            <?php echo number_format($order->tot_amount, 2); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No bookings available.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div id="wallet" class="dashboard">
                        <div class="page-title text-center">
                            <h2>My Wallet</h2>
                        </div>
                        <hr>
                        <div class="card m-2 p-2">
                            <div class="text-center">
                                <i class="fa fa-money fa-3x" aria-hidden="true"></i>
                                <h5>wallet Balance</h5>
                                <h2>₹ 63.00</h2>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="addnewaddress" tabindex="-1" aria-labelledby="addnewaddressLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 450px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewaddressLabel">Add New Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="opacity: 1; font-size: 24px; padding: 8px;"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="addNewAddressForm" class="theme-form">
                    <div class="form-row">
                        <div class="col-md-12 m-2">
                            <label for="add_fullname">Full Name</label>
                            <input type="text" class="form-control" name="fullname" id="add_fullname"
                                placeholder="Full Name" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="add_mobile">Phone Number</label>
                            <input type="number" class="form-control" name="mobile" id="add_mobile"
                                placeholder="Phone Number" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="add_address">Address</label>
                            <input type="text" class="form-control" name="address" id="add_address"
                                placeholder="Address (House No, Building, Street, Area)" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="add_locality">Locality / Town</label>
                            <input type="text" class="form-control" name="locality" id="add_locality"
                                placeholder="Locality / Town" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="add_pincode">Pincode</label>
                            <input type="number" class="form-control" name="pincode" id="add_pincode"
                                placeholder="Pincode" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="add_city">City / District</label>
                            <input type="text" class="form-control" name="city" id="add_city"
                                placeholder="City / District" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="add_state">State</label>
                            <input type="text" class="form-control" name="state" id="add_state" placeholder="State"
                                required>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-solid">Save Address</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 450px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAddressModalLabel">Edit Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="opacity: 1; font-size: 24px; padding: 8px;"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <form id="editAddressForm" class="theme-form">
                    <input type="hidden" name="address_id" id="edit_address_id">

                    <div class="form-row">
                        <div class="col-md-12 m-2">
                            <label for="edit_fullname">Full Name</label>
                            <input type="text" class="form-control" name="fullname" id="edit_fullname"
                                placeholder="Full Name" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="edit_mobile">Phone Number</label>
                            <input type="number" class="form-control" name="mobile" id="edit_mobile"
                                placeholder="Phone Number" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="edit_address">Address</label>
                            <input type="text" class="form-control" name="address" id="edit_address"
                                placeholder="Address (House No, Building, Street, Area)" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="edit_locality">Locality / Town</label>
                            <input type="text" class="form-control" name="locality" id="edit_locality"
                                placeholder="Locality / Town" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="edit_pincode">Pincode</label>
                            <input type="number" class="form-control" name="pincode" id="edit_pincode"
                                placeholder="Pincode" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="edit_city">City / District</label>
                            <input type="text" class="form-control" name="city" id="edit_city"
                                placeholder="City / District" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="edit_state">State</label>
                            <input type="text" class="form-control" name="state" id="edit_state" placeholder="State"
                                required>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-solid">Save Changes</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="changepassword" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="opacity: 1; font-size: 24px; padding: 8px;"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="theme-form">
                    <div class="form-row">
                        <div class="col-md-12 m-2">
                            <label for="currentPassword">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword"
                                placeholder="Current Password" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newPassword" placeholder="New Password"
                                required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword"
                                placeholder="Confirm Password" required>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-solid">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editprofile" tabindex="-1" aria-labelledby="editprofile" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editprofile">Edit Contact Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="editContactForm" class="theme-form">
                    <div class="form-row">
                        <div class="col-md-12 m-2">
                            <label for="phone_number">Phone Number</label>
                            <input type="number" class="form-control" id="phone_number" placeholder="Phone Number"
                                required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-solid">Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editDetails" tabindex="-1" aria-labelledby="editDetails" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDetails">Edit User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="editDetailsForm" class="theme-form">
                    <div class="form-row">
                        <div class="col-md-12 m-2">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" placeholder="DOB" required>
                        </div>
                        <div class="col-md-12 m-2">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-solid">Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
    .last.filter-back:before {
        content: none !important;
    }

    .last.filter-back {
        margin-left: 13%;
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var dashboards = document.querySelectorAll('.dashboard');
        dashboards.forEach(function (dashboard) {
            dashboard.style.display = 'none';
        });

        var firstTab = document.querySelector('.dashboard-left li:first-child');
        firstTab.classList.add('active');

        showTab('profile');
    });

    function showTab(tabId, event) {
        var dashboards = document.querySelectorAll('.dashboard');
        dashboards.forEach(function (dashboard) {
            dashboard.style.display = 'none';
        });

        var tabs = document.querySelectorAll('.dashboard-left li');
        tabs.forEach(function (tab) {
            tab.classList.remove('active');
        });

        document.getElementById(tabId).style.display = 'block';

        if (event) {
            var clickedTab = event.target.parentElement;
            if (clickedTab) {
                clickedTab.classList.add('active');
            }
        } else {
            var firstTab = document.querySelector('.dashboard-left li:first-child');
            firstTab.classList.add('active');
        }

        if (event) {
            event.preventDefault();
        }
    }
</script>


<script>

    // --- JQUERY SCRIPTS (executes when document is ready) ---
    $(document).ready(function () {

        // --- Handle image upload ---
        $(document).on('change', '#uploadImage', function (e) {
            e.preventDefault();

            var formData = new FormData();
            var file = $('#uploadImage')[0].files[0];
            console.log(file);

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
                            alert('Image uploaded successfully!');
                            $('#userImage').attr('src', response.imagePath);
                        } else {
                            alert('Failed to upload image: ' + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred: ' + xhr.responseText);
                    }
                });
            } else {
                alert('Please select an image to upload.');
            }
        });


        // --- Handle "Add New Address" form submission ---
        $('#addNewAddressForm').on('submit', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: "<?= base_url('Main/add_address') ?>",
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Failed to add address: ' + (response.message || 'Unknown error'));
                    }
                },
                error: function () {
                    alert('An error occurred while adding the address.');
                }
            });
        });


        // FIX: Handle the Edit Address Form Submission
        $('#editAddressForm').on('submit', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: "<?= base_url('Main/update_address') ?>",
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        location.reload(); // Reload page to show changes
                    } else {
                        alert('Failed to update: ' + (response.message || 'Unknown error'));
                    }
                },
                error: function () {
                    alert('An error occurred while updating the address.');
                }
            });
        });

        // --- *** FIX #5: CORRECTED "Delete Address" SCRIPT *** ---
        // Changed the selector from '#deleteAddressLink' to '.deleteAddressLink'
        // This now matches the class in your HTML and will work for ALL addresses.
        $(document).on('click', '.deleteAddressLink', function (e) {
            e.preventDefault();

            var addressId = $(this).data('id'); // This will now correctly get the specific address ID
            var confirmed = confirm("Are you sure you want to delete this address?");

            if (confirmed) {
                $.ajax({
                    url: "<?= base_url('Main/delete_address') ?>",
                    type: 'POST',
                    data: { id: addressId }, // This now sends the correct address_id
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            // Show the error message from the controller (e.g., "Address in use")
                            alert('Failed to delete: ' + (response.message || 'Unknown error'));
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred while deleting.');
                        location.reload();
                    }
                });
            }
        });

    }); // --- End of $(document).ready() ---


    // --- VANILLA JS SCRIPTS (executes when DOM is loaded) ---
    document.addEventListener('DOMContentLoaded', function () {

        // --- Handle opening the "Edit Contact Info" modal ---
        var editProfileLink = document.getElementById('editProfileLink');
        if (editProfileLink) {
            var phoneNumberInput = document.getElementById('phone_number');
            var emailInput = document.getElementById('email');

            editProfileLink.addEventListener('click', function (e) {
                e.preventDefault();
                var phoneNumber = '<?php echo $details->mobile; ?>';
                var email = '<?php echo $details->email; ?>';

                phoneNumberInput.value = phoneNumber;
                emailInput.value = email;

                var myModal = new bootstrap.Modal(document.getElementById('editprofile'));
                myModal.show();
            });
        }

        // --- Handle submitting the "Edit Contact Info" form ---
        var editContactForm = document.getElementById('editContactForm');
        if (editContactForm) {
            editContactForm.addEventListener('submit', function (e) {
                e.preventDefault();

                var phoneNumber = document.getElementById('phone_number').value;
                var email = document.getElementById('email').value;

                $.ajax({
                    url: "<?= base_url('Main/update_contact_info') ?>",
                    type: 'POST',
                    data: {
                        phone_number: phoneNumber,
                        email: email
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert('Failed to update contact information: ' + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            });
        }

        // --- Handle opening the "Edit User Details" (DOB/Gender) modal ---
        var editDetailsLink = document.getElementById('editDetailsLink');
        if (editDetailsLink) {
            var dobInput = document.getElementById('dob');
            var genderInput = document.getElementById('gender');

            editDetailsLink.addEventListener('click', function (e) {
                e.preventDefault();
                var dob = '<?php echo $details->dob; ?>';
                var gender = '<?php echo $details->gender; ?>';

                dobInput.value = dob;
                genderInput.value = gender;

                var myModal = new bootstrap.Modal(document.getElementById('editDetails'));
                myModal.show();
            });
        }

        // --- Handle submitting the "Edit User Details" (DOB/Gender) form ---
        var editDetailsForm = document.getElementById('editDetailsForm');
        if (editDetailsForm) {
            editDetailsForm.addEventListener('submit', function (e) {
                e.preventDefault();

                var dob = document.getElementById('dob').value;
                var gender = document.getElementById('gender').value;

                $.ajax({
                    url: "<?= base_url('Main/update_user_details') ?>",
                    type: 'POST',
                    data: {
                        dob: dob,
                        gender: gender
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert('Failed to update user details: ' + response.message);
                            location.reload();
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('An error occurred: ' + error);
                        location.reload();
                    }
                });
            });
        }

        // --- *** FIX #6: CORRECTED SCRIPT TO OPEN "Edit Address" MODAL *** ---
        // This script now finds all data attributes and populates the new #editAddressModal
        document.querySelectorAll('.editAddressLink').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                // Get all data attributes from the link (from FIX #1)
                var id = this.getAttribute('data-id');
                var fullname = this.getAttribute('data-fullname'); // Corrected from 'data-firstname'
                var phone = this.getAttribute('data-phone');
                var address = this.getAttribute('data-address');
                var locality = this.getAttribute('data-locality');
                var pincode = this.getAttribute('data-pincode');
                var city = this.getAttribute('data-city');
                var state = this.getAttribute('data-state');

                // Populate the form fields in the #editAddressModal (from FIX #3)
                // This now correctly targets the IDs in the new modal
                document.querySelector('#editAddressModal #edit_address_id').value = id;
                document.querySelector('#editAddressModal #edit_fullname').value = fullname;
                document.querySelector('#editAddressModal #edit_mobile').value = phone;
                document.querySelector('#editAddressModal #edit_address').value = address;
                document.querySelector('#editAddressModal #edit_locality').value = locality;
                document.querySelector('#editAddressModal #edit_pincode').value = pincode;
                document.querySelector('#editAddressModal #edit_city').value = city;
                document.querySelector('#editAddressModal #edit_state').value = state;

                // Show the modal
                var editModal = new bootstrap.Modal(document.getElementById('editAddressModal'));
                editModal.show();
            });
        });

    }); // --- End of document.addEventListener('DOMContentLoaded') ---
</script>