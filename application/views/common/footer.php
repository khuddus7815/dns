<!-- footer -->
<footer class="footer-light">
    <?php 
    $uri_segment = $this->uri->segment(1);
    $is_auth_page = ($uri_segment == 'login' || $uri_segment == 'register' || $uri_segment == 'forgot_password' || (isset($content) && ($content == 'login' || $content == 'forgot_password')));
    
    if (!$is_auth_page): 
    ?>
    <div class="light-layout">
        <div class="container">
            <section class="small-section border-section border-top-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe">
                            <div>
                                <h4>KNOW IT ALL FIRST!</h4>
                                <p>Never Miss Anything From DNS Store By Signing Up To Our Newsletter.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form
                            action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda"
                            class="form-inline subscribe-form auth-form needs-validation" method="post"
                            id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                            <div class="form-group mx-sm-3">
                                <input type="text" class="form-control" name="EMAIL" id="mce-EMAIL"
                                    placeholder="Enter your email" required="required">
                            </div>
                            <button type="submit" class="btn btn-solid" id="mc-submit">subscribe</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo">
                            <!-- <img src="assets/images/icon/logo/18.png" alt=""> -->
                            <h3>DNS CAKES</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>my account</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="#">Birthday</a></li>
                                <li><a href="#">Cake</a></li>
                                <li><a href="#">Flowers</a></li>
                                <li><a href="#">Gifts</a></li>
                                <li><a href="#">Combos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>why we choose</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="#">shipping & return</a></li>
                                <li><a href="#">secure shopping</a></li>
                                <li><a href="#">gallary</a></li>
                                <li><a href="#">affiliates</a></li>
                                <li><a href="#">contacts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>store information</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">
                                <li><i class="fa fa-map-marker"></i>DNS Store India
                                </li>
                                <li><i class="fa fa-phone"></i>Call Us: 123-456-7890</li>
                                <li><i class="fa fa-envelope-o"></i>Email Us: <a href="#">Support@dnscakes.com</a></li>
                                <li><i class="fa fa-fax"></i>Fax: 123456</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Modals -->
    <div class="modal fade" id="addnewaddress" tabindex="-1" aria-labelledby="addnewaddress" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content model-background">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body card m-2 p-2">
                    <form id="addressForm">
                        <div class="row check-out">
                            <div class="form-group col-md-12">
                                <div class="field-label">Name</div>
                                <input type="text" class="form-control" name="fullname" placeholder="Name">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="field-label">Phone</div>
                                <input type="text" class="form-control" name="mobile" placeholder="Phone">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="field-label">Address</div>
                                <input type="text" class="form-control" name="address" placeholder="Street address">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="field-label">Locality</div>
                                <input type="text" class="form-control" name="locality" placeholder="Locality" required>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="field-label">Landmark</div>
                                <input type="text" class="form-control" name="landmark" placeholder="Landmark" required>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="field-label">Town/City</div>
                                <input type="text" class="form-control" name="city" placeholder="Town/City">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="field-label">State / County</div>
                                <input type="text" class="form-control" name="state" placeholder="State / County">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="field-label">Postal Code</div>
                                <input type="text" class="form-control" name="pincode" placeholder="Postal Code">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-solid" id="saveAddressBtn">Save Address</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content model-background">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body card m-2 p-2">
                    <form id="editAddressForm">
                        <input type="hidden" name="address_id" value="">
                        <div class="row check-out">
                            <div class="form-group col-md-12">
                                <div class="field-label">Name</div>
                                <input type="text" class="form-control" name="fullname" placeholder="Name">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="field-label">Phone</div>
                                <input type="text" class="form-control" name="mobile" placeholder="Phone">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="field-label">Address</div>
                                <input type="text" class="form-control" name="address" placeholder="Street address">
                            </div>
                            <div class="form-group col-md-12">
                                <div class="field-label">Locality</div>
                                <input type="text" class="form-control" name="locality" placeholder="Locality" required>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="field-label">Landmark</div>
                                <input type="text" class="form-control" name="landmark" placeholder="Landmark" required>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="field-label">Town/City</div>
                                <input type="text" class="form-control" name="city" placeholder="Town/City">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="field-label">State / County</div>
                                <input type="text" class="form-control" name="state" placeholder="State / County">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="field-label">Postal Code</div>
                                <input type="text" class="form-control" name="pincode" placeholder="Postal Code">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-solid" id="saveEditAddressBtn">Save Address</button>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->

<!-- tap to top -->
<div class="tap-top top-cls">
    <div>
        <i class="fa fa-angle-double-up"></i>
    </div>
</div>
<!-- tap to top end -->

<script>
    var currentYear = new Date().getFullYear();
    var copyrightYearElement = document.getElementById("copyright-year");
    if (copyrightYearElement) {
        copyrightYearElement.innerText = currentYear;
    }

    $(document).ready(function () {
        // Address Management
        $('#saveEditAddressBtn').on('click', function () {
            var formData = $('#editAddressForm').serialize();
            $.ajax({
                url: "<?= base_url('Main/update_address') ?>",
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        $('#editAddressModal').modal('hide');
                        location.reload();
                    } else {
                        console.log(response.errors);
                        location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    location.reload();
                }
            });
        });

        $('#saveAddressBtn').on('click', function () {
            var formData = $('#addressForm').serialize();
            $.ajax({
                url: "<?= base_url('Main/add_address') ?>",
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        alert('Address saved successfully!');
                        $('#addnewaddress').modal('hide');
                        location.reload();
                    } else {
                        alert('Failed to save address: ' + response.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        });

        // Add to Cart
        $(document).on('click', '.add-btn', function (event) {
            event.preventDefault();
            var parentId = $(this).data('parent-id');
            var addonId = $(this).data('addon-id');
            var price = $(this).data('price');

            $.ajax({
                url: '<?php echo base_url("api/product/addontocart"); ?>',
                type: 'POST',
                data: {
                    parent_id: parentId,
                    addon_id: addonId,
                    price: price,
                    quantity: 1
                },
                success: function (response) {
                    if (response.status === 'login') {
                        window.location.href = '<?php echo base_url("login"); ?>';
                    } else {
                        toastr.success("Product added to cart successfully");
                    }
                }
            });
        });

        // Universal Modal Close Button Script
        function addCloseButtonsToModals() {
            $('.modal').each(function () {
                var $modal = $(this);
                var $header = $modal.find('.modal-header');
                var hasCloseBtn = $header.find('.btn-close, .close, [data-bs-dismiss="modal"], [data-dismiss="modal"]').length > 0;

                if ($header.length > 0 && !hasCloseBtn) {
                    var isBootstrap5 = typeof bootstrap !== 'undefined' || $modal.find('[data-bs-dismiss]').length > 0;
                    var dismissAttr = isBootstrap5 ? 'data-bs-dismiss="modal"' : 'data-dismiss="modal"';
                    var closeClass = isBootstrap5 ? 'btn-close' : 'close';
                    var closeBtn = $('<button type="button" class="' + closeClass + '" ' + dismissAttr + ' aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>');
                    $header.append(closeBtn);
                }
            });
        }

        addCloseButtonsToModals();
        $(document).on('DOMNodeInserted', function (e) {
            if ($(e.target).hasClass('modal') || $(e.target).find('.modal').length > 0) {
                setTimeout(addCloseButtonsToModals, 100);
            }
        });
        $('.modal').on('show.bs.modal shown.bs.modal', function () {
            addCloseButtonsToModals();
        });
    });
</script>