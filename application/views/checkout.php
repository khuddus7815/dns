<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/css/stylecheckout.css'); ?>" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if ($razorpay_enabled): ?>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php endif; ?>

<style>
    /* --- CSS Fixes for Layout & Spacing --- */

    /* 1. Main Row Container */
    .radio-row {
        display: flex !important;
        align-items: flex-start !important;
        /* FORCE Top Alignment */
        justify-content: flex-start !important;
        /* FORCE Left Alignment */
        width: 100%;
        position: relative;
    }

    /* 2. Radio Button Wrapper - Keeps it strictly on the left */
    .radio-input-wrapper {
        width: 24px;
        /* Fixed width ensures perfect column alignment */
        margin-right: 12px;
        /* Gap between radio and text */
        margin-top: 2px;
        /* Tiny push down to align with the first line of text */
        flex-shrink: 0;
        /* Prevents radio from getting squashed */
        display: flex;
        align-items: flex-start;
        justify-content: center;
    }

    /* 3. The Actual Radio Input */
    .radio-input-wrapper input {
        margin: 0 !important;
        float: none !important;
        vertical-align: top !important;
        position: static !important;
        /* Overrides Bootstrap absolute positioning */
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    /* 4. Text Content Area */
    .radio-row>.w-100,
    .radio-row>label {
        flex-grow: 1;
        /* Ensures text takes up the rest of the space */
        line-height: 1.5;
        /* Clean line height for readability */
        cursor: pointer;
        /* Makes text look clickable */
    }

    /* --- Existing Styles Preserved Below --- */
</style>

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Checkout</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<style>
    /* Modern Order Summary Styling */
    .modern-summary-product-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 20px;
        border: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        margin-bottom: 1.5rem;
        position: relative;
        padding: 20px;
    }

    .modern-summary-product-card:hover {
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }

    .modern-summary-product-row {
        display: flex;
        align-items: flex-start;
        gap: 20px;
    }

    .modern-summary-img-wrapper {
        width: 180px;
        height: 180px;
        border-radius: 15px;
        overflow: hidden;
        background: #fff;
        padding: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        flex-shrink: 0;
    }

    .modern-summary-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .modern-summary-product-card:hover .modern-summary-img-wrapper img {
        transform: scale(1.05);
    }

    .modern-summary-details {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .modern-summary-product-name {
        font-size: 1.25rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .modern-summary-quantity-section {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 12px;
    }

    .modern-summary-quantity-label {
        font-weight: 600;
        color: #2c3e50;
        font-size: 0.95rem;
    }

    .modern-summary-quantity {
        font-size: 0.95rem;
        color: #6c757d;
        margin-bottom: 12px;
    }

    .modern-summary-price-section {
        margin-top: 10px;
    }

    .modern-summary-price-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
        flex-wrap: wrap;
    }

    .modern-summary-original-price {
        color: #999;
        font-size: 1rem;
        font-weight: 500;
    }

    .modern-summary-original-price del {
        color: #999;
    }

    .modern-summary-discount-badge {
        background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
        color: #fff;
        padding: 4px 12px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.8rem;
        box-shadow: 0 2px 8px rgba(243, 186, 117, 0.4);
    }

    .modern-summary-selling-price {
        color: #000000;
        font-size: 1.5rem;
        font-weight: 700;
        margin-top: 5px;
    }

    .summary-product-row {
        display: flex;
        align-items: flex-start;
        padding-bottom: 15px;
        margin-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .img-wrapper-summary {
        width: 80px;
        height: 80px;
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-right: 20px;
        background: #fff;
    }

    .img-wrapper-summary img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .summary-details {
        flex-grow: 1;
    }

    /* Modern Checkout Card Styling */
    .card.shadow-sm {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 20px !important;
        border: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .card-body {
        padding: 25px;
    }

    /* Step Header */
    .step-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        padding: 15px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        margin-bottom: 15px;
    }

    .step-left {
        display: flex;
        align-items: center;
    }

    .step-left-content {
        margin-left: 15px;
        display: flex;
        flex-direction: column;
    }

    .serial-number {
        background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
        color: #fff;
        width: 35px;
        height: 35px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 16px;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(243, 186, 117, 0.4);
    }

    .step-title-row h6 {
        color: #2c3e50 !important;
        font-weight: 700 !important;
        font-size: 1.1rem;
    }

    /* Header Check Icon */
    .step-title-row {
        display: flex;
        align-items: center;
    }

    .step-check-icon {
        display: none;
        color: #0d6efd;
        font-size: 14px;
        margin-left: 10px;
    }

    .step-completed .step-check-icon {
        display: inline-block;
    }

    /* Form Controls */
    .form-control {
        border-radius: 10px !important;
        padding: 12px 15px;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #f3ba75;
        box-shadow: 0 0 0 0.25rem rgba(243, 186, 117, 0.25);
        outline: none;
    }

    /* Buttons - Same Size */
    .btn {
        border-radius: 10px;
        padding: 12px 24px;
        font-weight: 600;
        transition: all 0.3s ease;
        min-width: 140px;
    }

    .btn-sm {
        padding: 10px 20px;
        min-width: 120px;
    }

    .btn-solid {
        background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
        border: none;
        color: #fff;
        box-shadow: 0 2px 8px rgba(243, 186, 117, 0.4);
    }

    .btn-solid:hover {
        background: linear-gradient(135deg, #e8a855 0%, #d49a3d 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(243, 186, 117, 0.5);
        color: #fff;
    }

    .btn-outline-primary {
        border: 2px solid #f3ba75;
        color: #f3ba75;
    }

    .btn-outline-primary:hover {
        background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
        color: #fff;
        border-color: #f3ba75;
    }

    .btn-outline-secondary {
        border: 2px solid #6c757d;
        color: #6c757d;
        min-width: 120px;
    }

    .btn-outline-secondary:hover {
        background: #6c757d;
        color: #fff;
    }

    /* Accordion Items */
    .accordion-item {
        background: #fff;
        border-radius: 15px;
        padding: 20px;
        margin-top: 15px;
    }

    /* Address Section */
    .address_section {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 15px;
        border: 2px solid #e9ecef !important;
        transition: all 0.3s ease;
        position: relative;
    }

    .address_section:hover {
        border-color: #f3ba75 !important;
        box-shadow: 0 4px 12px rgba(243, 186, 117, 0.2);
    }

    /* Address Edit Button Wrapper - Positioned at Right */
    .address-edit-btn-wrapper {
        position: absolute;
        top: 15px;
        right: 15px;
        flex-shrink: 0;
        z-index: 10;
    }

    .address_section .pr-5 {
        padding-right: 80px !important;
    }

    @media (max-width: 768px) {
        .address-edit-btn-wrapper {
            position: static;
            margin-top: 10px;
            text-align: right;
        }

        .address_section .pr-5 {
            padding-right: 0 !important;
        }
    }

    /* Total Price Bold */
    #final_total_display {
        font-weight: 700 !important;
        font-size: 1.5rem;
        color: #2c3e50;
    }

    .list-group-item {
        border-radius: 15px !important;
        margin-bottom: 10px;
    }

    /* Modal Styling */
    .modal-content {
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        overflow: visible;
    }

    .modal-header {
        background: linear-gradient(135deg, #f3ba75 0%, #e8a855 100%);
        color: #fff;
        border-radius: 20px 20px 0 0;
        padding: 20px;
        border-bottom: none;
    }

    .modal-header h5 {
        font-weight: 700;
        color: #fff;
    }

    .modal-body {
        padding: 30px;
        overflow: visible;
    }

    .modal-footer {
        border-top: 1px solid #e9ecef;
        padding: 20px 30px;
        border-radius: 0 0 20px 20px;
    }

    .modal-footer .btn {
        margin: 0 5px;
    }

    /* Fix dropdown visibility in modal */
    .modal {
        z-index: 1050;
    }

    .modal-backdrop {
        z-index: 1040;
    }

    .modal-dialog {
        z-index: 1055;
        overflow: visible;
    }

    .modal-content {
        overflow: visible;
    }

    .modal-body {
        overflow: visible;
    }

    /* Ensure dropdown options are visible */
    .modal-body select.form-control {
        position: relative;
        z-index: 1056 !important;
    }

    .modal-body .form-control:focus {
        z-index: 1057 !important;
    }

    /* Fix for select dropdown in modal */
    .modal-body .col-md-6 {
        overflow: visible !important;
    }

    /* Ensure select dropdown is above modal backdrop */
    select.form-control {
        position: relative;
    }

    /* Fix for edit address section dropdown */
    .edit-address-section select.form-control {
        position: relative;
        z-index: 1000 !important;
        white-space: normal !important;
        word-wrap: break-word !important;
        min-height: 40px;
        padding-right: 30px;
    }

    .edit-address-section {
        overflow: visible !important;
        position: relative;
        z-index: 10;
    }

    /* Ensure modal doesn't clip dropdowns */
    .modal {
        overflow: visible !important;
    }

    .modal-dialog {
        overflow: visible !important;
    }

    .modal-content {
        overflow: visible !important;
    }

    /* Fix dropdown visibility */
    .modal-body select {
        z-index: 10000 !important;
        white-space: normal !important;
        word-wrap: break-word !important;
        min-height: 40px;
        padding-right: 30px;
    }

    .modal-body select:focus {
        z-index: 10001 !important;
    }

    /* Ensure selected state text is fully visible */
    select.form-control {
        white-space: normal !important;
        word-wrap: break-word !important;
        text-overflow: clip !important;
        overflow: visible !important;
        min-height: 40px;
        padding-right: 30px;
    }

    select.form-control option {
        white-space: normal !important;
        padding: 8px;
        word-wrap: break-word;
    }

    /* State dropdown fixes */
    .state-select {
        height: auto !important;
        min-height: 45px !important;
        padding: 12px 35px 12px 15px !important;
        line-height: 1.5 !important;
        white-space: normal !important;
        overflow: visible !important;
        text-overflow: ellipsis !important;
    }

    .state-select option {
        padding: 10px !important;
        white-space: normal !important;
        word-wrap: break-word !important;
    }

    /* Quantity buttons horizontal layout */
    .modern-summary-qty-box {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        flex-direction: row !important;
        margin-left: 10px;
    }

    .modern-summary-qty-btn {
        width: 32px !important;
        height: 32px !important;
        min-width: 32px !important;
        min-height: 32px !important;
        border: 1px solid #ddd !important;
        background: #fff !important;
        border-radius: 6px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        padding: 0 !important;
        flex-shrink: 0 !important;
        line-height: 1 !important;
    }

    .modern-summary-qty-btn i {
        font-size: 14px !important;
        line-height: 1 !important;
        display: inline-block !important;
        color: #333 !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .modern-summary-qty-btn:hover {
        background: #f3ba75 !important;
        border-color: #f3ba75 !important;
    }

    .modern-summary-qty-btn:hover i {
        color: #fff !important;
    }

    .modern-summary-qty-input {
        width: 50px !important;
        min-width: 50px !important;
        height: 32px !important;
        text-align: center !important;
        border: 1px solid #ddd !important;
        border-radius: 6px !important;
        padding: 0 !important;
        font-weight: 600 !important;
        flex-shrink: 0 !important;
        font-size: 14px !important;
    }

    /* Delete icon fix */
    .modern-summary-delete-icon {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #ff4c3b !important;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        color: #fff !important;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(255, 76, 59, 0.4);
        z-index: 10;
        border: 2px solid #fff;
        text-decoration: none !important;
        line-height: 1;
    }

    .modern-summary-delete-icon i,
    .modern-summary-delete-icon .fa,
    .modern-summary-delete-icon .fas {
        color: #fff !important;
        font-size: 16px !important;
        display: inline-block !important;
        line-height: 1 !important;
        margin: 0 !important;
        padding: 0 !important;
        opacity: 1 !important;
        visibility: visible !important;
        pointer-events: none;
        width: auto !important;
        height: auto !important;
    }

    .modern-summary-delete-icon:hover {
        background: #e63946 !important;
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(255, 76, 59, 0.6);
    }

    .modern-summary-delete-icon:hover i,
    .modern-summary-delete-icon:hover .fa,
    .modern-summary-delete-icon:hover .fas {
        color: #fff !important;
    }

    /* Modal size fix */
    .modal-dialog {
        max-width: 600px !important;
    }

    @media (max-width: 768px) {
        .modal-dialog {
            max-width: 95% !important;
            margin: 1rem auto !important;
        }

        /* Mobile Order Summary Fixes */
        .modern-summary-product-row {
            gap: 12px;
        }

        .modern-summary-img-wrapper {
            width: 100px;
            height: 100px;
            padding: 5px;
        }

        .modern-summary-delete-icon {
            width: 32px;
            height: 32px;
            top: 10px;
            right: 10px;
            font-size: 1rem;
        }

        .modern-summary-delete-icon i {
            font-size: 14px !important;
        }

        .modern-summary-product-name {
            font-size: 0.95rem;
            margin-bottom: 5px;
            padding-right: 25px;
            /* Space for delete icon */
        }

        .modern-summary-quantity-label {
            display: none;
            /* Hide label on mobile to save space */
        }

        .modern-summary-quantity-section {
            margin-bottom: 5px;
        }

        .modern-summary-selling-price {
            font-size: 1.2rem;
        }

        .modern-summary-product-card {
            padding: 15px;
        }
    }
</style>

<section class="section-b-space margin-top">
    <div class="container main-container mt-3">
        <div class="row">
            <div class="col-lg-8 col-sm-12">

                <div class="card shadow-sm mb-3" id="card_step_0">
                    <div class="card-body">
                        <div class="step-header" id="header-step0">
                            <div class="step-left">
                                <div class="serial-number">1</div>
                                <div class="step-left-content">
                                    <div class="step-title-row">
                                        <h6 class="text-secondary mb-0 fw-bold">LOGIN</h6>
                                        <i class="fa fa-check step-check-icon"></i>
                                    </div>
                                    <p class="mb-0 small text-muted info-text">
                                        <?= $this->session->userdata('email') ? $this->session->userdata('email') : 'guest@example.com' ?>
                                    </p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-change" data-step="0"
                                id="change_btn_step_0">VIEW</button>
                        </div>

                        <div class="accordion-item mt-3 bg-white" id="step_0">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="mb-1 text-muted">Email</p>
                                    <p class="fw-bold">
                                        <?= $this->session->userdata('email') ? $this->session->userdata('email') : 'guest@example.com' ?>
                                    </p>
                                    <button type="button" class="btn btn-solid btn-sm mt-2 login_step_checkout"
                                        data-step="0">CONTINUE CHECKOUT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-3" id="card_step_1">
                    <div class="card-body">
                        <div class="step-header" id="header-step1">
                            <div class="step-left">
                                <div class="serial-number">2</div>
                                <div class="step-left-content">
                                    <div class="step-title-row">
                                        <h6 class="text-secondary mb-0 fw-bold">DELIVERY ADDRESS</h6>
                                        <i class="fa fa-check step-check-icon"></i>
                                    </div>
                                    <div id="selectedAddress" class="small text-muted mt-1"></div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-change" data-step="1"
                                id="change_btn_step_1">CHANGE</button>
                        </div>

                        <div id="step_1" class="accordion-item mt-3">
                            <?php foreach ($addresses as $key => $value) { ?>
                                <div class="address_section border rounded p-3 mb-3 position-relative"
                                    id="address_div_start<?= $value->id ?>">
                                    <div class="radio-row">
                                        <div class="radio-input-wrapper">
                                            <input class="form-check-input address_radio" type="radio"
                                                name="flexRadioDefault" id="addr_radio_<?= $value->id ?>"
                                                data-name="<?= $value->fullname ?>" data-addr="<?= $value->address ?>"
                                                data-phone="<?= $value->phone ?>" value="<?= $value->id ?>" />
                                        </div>
                                        <div class="w-100">
                                            <div class="d-flex align-items-center flex-wrap gap-2 mb-1">
                                                <span class="fw-bold"><?= $value->fullname ?></span>
                                                <span class="badge bg-light text-dark">Home</span>
                                                <span class="fw-bold"><?= $value->phone ?></span>
                                            </div>
                                            <p class="mb-2 mt-1 small text-muted pr-5">
                                                <?php
                                                // Convert state_id to state name for display
                                                $state_map = array(
                                                    1 => 'Andhra Pradesh',
                                                    2 => 'Arunachal Pradesh',
                                                    3 => 'Assam',
                                                    4 => 'Bihar',
                                                    5 => 'Chhattisgarh',
                                                    6 => 'Goa',
                                                    7 => 'Gujarat',
                                                    8 => 'Haryana',
                                                    9 => 'Himachal Pradesh',
                                                    10 => 'Jharkhand',
                                                    11 => 'Karnataka',
                                                    12 => 'Kerala',
                                                    13 => 'Madhya Pradesh',
                                                    14 => 'Maharashtra',
                                                    15 => 'Manipur',
                                                    16 => 'Meghalaya',
                                                    17 => 'Mizoram',
                                                    18 => 'Nagaland',
                                                    19 => 'Odisha',
                                                    20 => 'Punjab',
                                                    21 => 'Rajasthan',
                                                    22 => 'Sikkim',
                                                    23 => 'Tamil Nadu',
                                                    24 => 'Telangana',
                                                    25 => 'Tripura',
                                                    26 => 'Uttar Pradesh',
                                                    27 => 'Uttarakhand',
                                                    28 => 'West Bengal',
                                                    29 => 'Andaman and Nicobar Islands',
                                                    30 => 'Chandigarh',
                                                    31 => 'Dadra and Nagar Haveli and Daman and Diu',
                                                    32 => 'Delhi',
                                                    33 => 'Jammu and Kashmir',
                                                    34 => 'Ladakh',
                                                    35 => 'Lakshadweep',
                                                    36 => 'Puducherry'
                                                );
                                                $state_display = is_numeric($value->state_id) && isset($state_map[(int) $value->state_id])
                                                    ? $state_map[(int) $value->state_id]
                                                    : $value->state_id;
                                                ?>
                                                <?= $value->address ?>, <?= $value->locality ?>, <?= $value->city_twn ?>,
                                                <?= $state_display ?> - <?= $value->pincode ?>
                                            </p>
                                            <div class="mt-2 diliver_here-btn-sec" id="diliver_here<?= $value->id ?>"></div>
                                        </div>
                                    </div>
                                    <div class="address-edit-btn-wrapper">
                                        <button type="button" class="btn btn-sm btn-outline-primary"
                                            onclick="toggleEditAddress(<?= $value->id ?>)">EDIT</button>
                                    </div>
                                </div>

                                <div id="edit-address-<?= $value->id ?>"
                                    class="edit-address-section border rounded p-3 mb-3 bg-light"
                                    style="display: none; position: relative; z-index: 10; overflow: visible;">
                                    <form action="<?= base_url('main/update_address') ?>">
                                        <input type="hidden" name="address_id" value="<?= $value->id ?>" />
                                        <h6 class="mb-3 text-primary fw-bold">EDIT ADDRESS</h6>
                                        <div class="row">
                                            <div class="col-md-6 mb-3"><label class="small text-muted">Name</label><input
                                                    type="text" name="fullname" class="form-control"
                                                    value="<?= $value->fullname ?>" required /></div>
                                            <div class="col-md-6 mb-3"><label class="small text-muted">Mobile</label><input
                                                    type="tel" name="mobile" class="form-control"
                                                    value="<?= $value->phone ?>" required /></div>
                                            <div class="col-md-6 mb-3"><label class="small text-muted">Pincode</label><input
                                                    type="text" name="pincode" class="form-control"
                                                    value="<?= $value->pincode ?>" required /></div>
                                            <div class="col-md-6 mb-3"><label
                                                    class="small text-muted">Locality</label><input type="text"
                                                    name="locality" class="form-control" value="<?= $value->locality ?>"
                                                    required /></div>
                                            <div class="col-12 mb-3"><label
                                                    class="small text-muted">Address</label><textarea name="address"
                                                    class="form-control" rows="3" required><?= $value->address ?></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3"><label class="small text-muted">City</label><input
                                                    type="text" name="city" class="form-control"
                                                    value="<?= $value->city_twn ?>" required /></div>
                                            <div class="col-md-6 mb-3"
                                                style="position: relative; z-index: 1000; overflow: visible !important;">
                                                <label class="small text-muted">State</label>
                                                <select name="state" class="form-control state-select" required
                                                    style="position: relative; z-index: 1001 !important; overflow: visible !important; width: 100%; min-width: 200px; padding: 12px 15px; height: auto; line-height: 1.5;">
                                                    <option value="">Select State</option>
                                                    <?php
                                                    $states = [
                                                        'Andhra Pradesh',
                                                        'Arunachal Pradesh',
                                                        'Assam',
                                                        'Bihar',
                                                        'Chhattisgarh',
                                                        'Goa',
                                                        'Gujarat',
                                                        'Haryana',
                                                        'Himachal Pradesh',
                                                        'Jharkhand',
                                                        'Karnataka',
                                                        'Kerala',
                                                        'Madhya Pradesh',
                                                        'Maharashtra',
                                                        'Manipur',
                                                        'Meghalaya',
                                                        'Mizoram',
                                                        'Nagaland',
                                                        'Odisha',
                                                        'Punjab',
                                                        'Rajasthan',
                                                        'Sikkim',
                                                        'Tamil Nadu',
                                                        'Telangana',
                                                        'Tripura',
                                                        'Uttar Pradesh',
                                                        'Uttarakhand',
                                                        'West Bengal',
                                                        'Andaman and Nicobar Islands',
                                                        'Chandigarh',
                                                        'Dadra and Nagar Haveli and Daman and Diu',
                                                        'Delhi',
                                                        'Jammu and Kashmir',
                                                        'Ladakh',
                                                        'Lakshadweep',
                                                        'Puducherry'
                                                    ];
                                                    // Convert state_id to state name for comparison
                                                    $state_map = array(
                                                        1 => 'Andhra Pradesh',
                                                        2 => 'Arunachal Pradesh',
                                                        3 => 'Assam',
                                                        4 => 'Bihar',
                                                        5 => 'Chhattisgarh',
                                                        6 => 'Goa',
                                                        7 => 'Gujarat',
                                                        8 => 'Haryana',
                                                        9 => 'Himachal Pradesh',
                                                        10 => 'Jharkhand',
                                                        11 => 'Karnataka',
                                                        12 => 'Kerala',
                                                        13 => 'Madhya Pradesh',
                                                        14 => 'Maharashtra',
                                                        15 => 'Manipur',
                                                        16 => 'Meghalaya',
                                                        17 => 'Mizoram',
                                                        18 => 'Nagaland',
                                                        19 => 'Odisha',
                                                        20 => 'Punjab',
                                                        21 => 'Rajasthan',
                                                        22 => 'Sikkim',
                                                        23 => 'Tamil Nadu',
                                                        24 => 'Telangana',
                                                        25 => 'Tripura',
                                                        26 => 'Uttar Pradesh',
                                                        27 => 'Uttarakhand',
                                                        28 => 'West Bengal',
                                                        29 => 'Andaman and Nicobar Islands',
                                                        30 => 'Chandigarh',
                                                        31 => 'Dadra and Nagar Haveli and Daman and Diu',
                                                        32 => 'Delhi',
                                                        33 => 'Jammu and Kashmir',
                                                        34 => 'Ladakh',
                                                        35 => 'Lakshadweep',
                                                        36 => 'Puducherry'
                                                    );
                                                    $currentStateId = (int) $value->state_id;
                                                    $currentStateName = isset($state_map[$currentStateId]) ? $state_map[$currentStateId] : '';

                                                    foreach ($states as $state) {
                                                        $selected = (trim($currentStateName) === trim($state)) ? 'selected' : '';
                                                        echo '<option value="' . htmlspecialchars($state) . '" ' . $selected . '>' . htmlspecialchars($state) . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-2 d-flex gap-2">
                                            <button type="button" class="btn btn-solid btn-sm saveAddressBtn"
                                                id="saveAddressBtn-<?= $value->id ?>"
                                                style="min-width: 140px;">SAVE</button>
                                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                                onclick="toggleEditAddress()" style="min-width: 140px;">CANCEL</button>
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>

                            <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="openAddAddressModal">+
                                Add New Address</button>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-3" id="card_step_2">
                    <div class="card-body">
                        <div class="step-header" id="header-step2">
                            <div class="step-left">
                                <div class="serial-number">3</div>
                                <div class="step-left-content">
                                    <div class="step-title-row">
                                        <h6 class="text-secondary mb-0 fw-bold">ORDER SUMMARY</h6>
                                        <i class="fa fa-check step-check-icon"></i>
                                    </div>
                                    <div id="summery_id" class="small text-muted mt-1"></div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-change" data-step="2"
                                id="change_btn_step_2">CHANGE</button>
                        </div>

                        <div id="step_2" class="accordion-item mt-3">
                            <?php
                            // CRITICAL: Recalculate total from database to ensure accuracy
                            // This prevents any price manipulation or calculation errors
                            $tot_amount = 0;
                            foreach ($carts as $key => $cart) {
                                // STRICT: Always use cart_selling_price from database (product.selling_price)
                                // This is the source of truth - never calculate or modify
                                $unit_price = (float) $cart->cart_selling_price;
                                $quantity = (int) $cart->quantity;

                                // Validate prices to prevent manipulation
                                if ($unit_price <= 0) {
                                    // If price is invalid, skip this item or use fallback
                                    log_message('error', 'Invalid price for product ' . $cart->product_id . ': ' . $unit_price);
                                    $unit_price = isset($cart->price) ? (float) $cart->price : 0;
                                }

                                if ($quantity <= 0) {
                                    $quantity = 1; // Minimum quantity
                                }

                                // Calculate total for this item
                                $item_total = $unit_price * $quantity;
                                $tot_amount += $item_total;

                                // Calculate discount percentage
                                $discount_percent = 0;
                                $original_price = isset($cart->price) ? (float) $cart->price : $unit_price;
                                if ($original_price > $unit_price && $original_price > 0) {
                                    $discount_percent = round((($original_price - $unit_price) / $original_price) * 100);
                                }
                                ?>
                                <div class="modern-summary-product-card">
                                    <a href="<?= base_url('cartitems/delete/' . $cart->product_id) ?>"
                                        class="modern-summary-delete-icon" title="Remove from cart">
                                        <i class="fa fa-trash"
                                            style="color: #fff !important; font-size: 16px !important;"></i>
                                    </a>
                                    <div class="modern-summary-product-row">
                                        <div class="modern-summary-img-wrapper">
                                            <img src="<?= base_url('upload/productimg/') . $cart->product_img1 ?>"
                                                alt="<?= $cart->product_name ?>" />
                                        </div>
                                        <div class="modern-summary-details">
                                            <div>
                                                <h6 class="modern-summary-product-name">
                                                    <?= $cart->product_name ?>     <?= ($cart->unit) ? $cart->unit : '' ?>
                                                </h6>
                                                <div class="modern-summary-quantity-section">
                                                    <span class="modern-summary-quantity-label">Quantity:</span>
                                                    <div class="modern-summary-qty-box">
                                                        <button type="button"
                                                            class="modern-summary-qty-btn checkout-qty-minus"
                                                            data-product-id="<?= $cart->product_id ?>"
                                                            data-sellingprice="<?= number_format($unit_price, 2, '.', '') ?>"
                                                            data-quantity="<?= $quantity ?>">
                                                            <i class="ti-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input type="text" name="checkout_quantity"
                                                            class="modern-summary-qty-input checkout-qty-input"
                                                            value="<?= $quantity ?>"
                                                            data-product-id="<?= $cart->product_id ?>"
                                                            data-sellingprice="<?= number_format($unit_price, 2, '.', '') ?>"
                                                            readonly>
                                                        <button type="button"
                                                            class="modern-summary-qty-btn checkout-qty-plus"
                                                            data-product-id="<?= $cart->product_id ?>"
                                                            data-sellingprice="<?= number_format($unit_price, 2, '.', '') ?>"
                                                            data-quantity="<?= $quantity ?>">
                                                            <i class="ti-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="modern-summary-price-section">
                                                    <div class="modern-summary-price-row">
                                                        <?php if ($discount_percent > 0): ?>
                                                            <span class="modern-summary-original-price">
                                                                <del>₹<?= number_format($original_price * $quantity, 2) ?></del>
                                                            </span>
                                                            <span
                                                                class="modern-summary-discount-badge"><?= $discount_percent ?>%
                                                                OFF</span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="modern-summary-selling-price"
                                                        data-product-id="<?= $cart->product_id ?>"
                                                        data-unit-price="<?= number_format($unit_price, 2, '.', '') ?>"
                                                        data-original-unit-price="<?= number_format($original_price, 2, '.', '') ?>">
                                                        ₹<span
                                                            class="product-total-price-<?= $cart->product_id ?>"><?= number_format($item_total, 2) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="bg-light p-3 rounded mt-3">
                                <h6 class="mb-3 small fw-bold">Delivery Method:</h6>
                                <?php if (!empty($delivery_charges)) {
                                    foreach ($delivery_charges as $index => $charge) { ?>
                                        <div class="mb-2">
                                            <div class="radio-row">
                                                <div class="radio-input-wrapper">
                                                    <input class="form-check-input delivery_radio" type="radio"
                                                        name="delivery_method_id" id="delivery_<?= $charge->id ?>"
                                                        value="<?= $charge->id ?>" data-amount="<?= $charge->amount ?>"
                                                        data-name="<?= $charge->name ?>" <?= ($index == 0) ? 'checked' : '' ?>>
                                                </div>
                                                <label class="form-check-label w-100 d-flex justify-content-between small"
                                                    for="delivery_<?= $charge->id ?>">
                                                    <span><?= $charge->name ?></span>
                                                    <span
                                                        class="fw-bold"><?= ($charge->amount > 0) ? '₹' . $charge->amount : '<span class="text-success">FREE</span>' ?></span>
                                                </label>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
                            </div>

                            <div class="text-right mt-3">
                                <button type="button" class="btn btn-solid btn-sm login_step_checkout"
                                    data-step="2">CONTINUE</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-3" id="card_step_3">
                    <div class="card-body">
                        <div class="step-header" id="header-step3">
                            <div class="step-left">
                                <div class="serial-number">4</div>
                                <div class="step-left-content">
                                    <div class="step-title-row">
                                        <h6 class="text-secondary mb-0 fw-bold">PAYMENT OPTIONS</h6>
                                        <i class="fa fa-check step-check-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary btn-change" data-step="3"
                                id="change_btn_step_3">CHANGE</button>
                        </div>

                        <div id="step_3" class="accordion-item mt-3 p-2">
                            <?php if ($razorpay_enabled): ?>
                                <div class="mb-3 p-3 border rounded">
                                    <div class="radio-row">
                                        <div class="radio-input-wrapper">
                                            <input class="form-check-input payment" type="radio" name="flexRadioDefault"
                                                id="razorpay" value="razorpay" />
                                        </div>
                                        <label class="form-check-label fw-bold" for="razorpay">
                                            <i class="fa fa-credit-card"></i> Pay Online (Razorpay)
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Wallet Payment Option -->
                            <div
                                class="mb-3 p-3 border rounded <?= isset($wallet_balance) && $wallet_balance > 0 ? '' : 'bg-light' ?>">
                                <div class="radio-row">
                                    <div class="radio-input-wrapper">
                                        <input class="form-check-input payment" type="radio" name="flexRadioDefault"
                                            id="wallet" value="wallet" <?= (!isset($wallet_balance) || $wallet_balance <= 0) ? 'disabled' : '' ?> />
                                    </div>
                                    <label
                                        class="form-check-label <?= isset($wallet_balance) && $wallet_balance > 0 ? 'fw-bold' : 'text-muted' ?>"
                                        for="wallet">
                                        <i class="fa fa-wallet"></i> Pay via Wallet
                                        <?php if (isset($wallet_balance)): ?>
                                            <br><small class="<?= $wallet_balance > 0 ? 'text-success' : 'text-danger' ?>">
                                                Available Balance: ₹<?= number_format($wallet_balance, 2); ?>
                                                <?php if ($wallet_balance <= 0): ?>
                                                    - <a href="<?= base_url('main/wallet') ?>" class="text-primary">Add
                                                        Money</a>
                                                <?php endif; ?>
                                            </small>
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3 p-3 border rounded bg-light">
                                <div class="radio-row">
                                    <div class="radio-input-wrapper">
                                        <input class="form-check-input payment" type="radio" name="flexRadioDefault"
                                            id="net_banking" value="net_banking" disabled />
                                    </div>
                                    <label class="form-check-label text-muted" for="net_banking">Net Banking
                                        (Unavailable)</label>
                                </div>
                            </div>
                            <div class="mb-3 p-3 border rounded">
                                <div class="radio-row">
                                    <div class="radio-input-wrapper">
                                        <input class="form-check-input payment" type="radio" name="flexRadioDefault"
                                            id="cod" value="cod" <?= !$razorpay_enabled ? 'checked' : '' ?> />
                                    </div>
                                    <label class="form-check-label fw-bold" for="cod">Cash on Delivery</label>
                                </div>
                            </div>

                            <div id="confirmation_cod_section" class="mb-3"></div>
                            <div id="wallet_payment_section" class="mb-3 d-none">
                                <div class="alert alert-info">
                                    <i class="fa fa-info-circle"></i> Amount will be deducted from your wallet balance.
                                </div>
                                <button type="button" class="btn btn-solid w-100" id="wallet_pay_btn">
                                    <i class="fa fa-wallet"></i> Pay from Wallet
                                </button>
                            </div>
                            <div id="razorpay_payment_section" class="mb-3 d-none">
                                <button type="button" class="btn btn-solid w-100" id="razorpay_pay_btn">
                                    <i class="fa fa-credit-card"></i> Pay Now
                                </button>
                            </div>

                            <form action="<?= base_url('Orders') ?>" method="post" id="placeorder-form">
                                <input type="hidden" name="selected_address_id" id="selected_address_id" value="" />
                                <input type="hidden" name="payment_method" id="payment_method"
                                    value="<?= !$razorpay_enabled ? 'cod' : '' ?>" />
                                <input type="hidden" name="delivery_id" id="delivery_id" value="" />
                                <button type="submit" class="btn btn-solid w-100 d-none" id="palce_order">PLACE
                                    ORDER</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card shadow-sm mt-3 mt-lg-0 mb-3">
                    <div class="card-body">
                        <label class="small fw-bold mb-2">Have a Coupon?</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-sm" id="coupon_code_input"
                                placeholder="Enter Code">
                            <button class="btn btn-outline-primary btn-sm" type="button"
                                id="apply_coupon_btn">APPLY</button>
                        </div>
                        <small id="coupon_msg" class="text-danger"></small>
                    </div>
                </div>

                <div class="card shadow-sm mt-3 mt-lg-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item py-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Price (<?= isset($carts) ? count($carts) : 0 ?> items)</span>
                                <span>₹ <span id="subtotal_display"><?= $tot_amount ?></span></span>
                            </div>

                            <div class="d-flex justify-content-between mb-2 text-success" id="discount_row"
                                style="display:none;">
                                <span>Coupon Discount</span>
                                <span>- ₹ <span id="discount_display">0.00</span></span>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <span>Delivery Charges</span>
                                <span id="delivery_display" class="text-success">--</span>
                            </div>
                            <div class="d-flex justify-content-between border-top pt-3">
                                <span class="fw-bold fs-5">Total Payable</span>
                                <span class="fw-bold fs-5">₹ <span id="final_total_display"
                                        class="fw-bold"><?= $tot_amount ?></span></span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="mt-3 text-center">
                    <div class="d-flex align-items-center justify-content-center text-muted small">
                        <i class="fa fa-shield-alt fa-lg text-secondary mr-2"></i>
                        <span>Safe and Secure Payments. 100% Authentic products.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add New Address Modal -->
<div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAddressModalLabel">Add New Address</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_address_form" action="<?= base_url('main/add_address') ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="small fw-bold text-muted">Full Name</label>
                            <input type="text" name="fullname" class="form-control" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small fw-bold text-muted">Mobile</label>
                            <input type="tel" name="mobile" class="form-control" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small fw-bold text-muted">Pincode</label>
                            <input type="text" name="pincode" class="form-control" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small fw-bold text-muted">Locality</label>
                            <input type="text" name="locality" class="form-control" required />
                        </div>
                        <div class="col-12 mb-3">
                            <label class="small fw-bold text-muted">Address</label>
                            <textarea name="address" class="form-control" rows="2" required></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small fw-bold text-muted">City</label>
                            <input type="text" name="city" class="form-control" required />
                        </div>
                        <div class="col-md-6 mb-3"
                            style="position: relative; z-index: 9999; overflow: visible !important;">
                            <label class="small fw-bold text-muted">State</label>
                            <select name="state" class="form-control state-select" required
                                style="position: relative; z-index: 10000 !important; overflow: visible !important; width: 100%; padding: 12px 15px; height: auto; line-height: 1.5;">
                                <option value="">Select State</option>
                                <?php
                                $states = [
                                    'Andhra Pradesh',
                                    'Arunachal Pradesh',
                                    'Assam',
                                    'Bihar',
                                    'Chhattisgarh',
                                    'Goa',
                                    'Gujarat',
                                    'Haryana',
                                    'Himachal Pradesh',
                                    'Jharkhand',
                                    'Karnataka',
                                    'Kerala',
                                    'Madhya Pradesh',
                                    'Maharashtra',
                                    'Manipur',
                                    'Meghalaya',
                                    'Mizoram',
                                    'Nagaland',
                                    'Odisha',
                                    'Punjab',
                                    'Rajasthan',
                                    'Sikkim',
                                    'Tamil Nadu',
                                    'Telangana',
                                    'Tripura',
                                    'Uttar Pradesh',
                                    'Uttarakhand',
                                    'West Bengal',
                                    'Andaman and Nicobar Islands',
                                    'Chandigarh',
                                    'Dadra and Nagar Haveli and Daman and Diu',
                                    'Delhi',
                                    'Jammu and Kashmir',
                                    'Ladakh',
                                    'Lakshadweep',
                                    'Puducherry'
                                ];
                                foreach ($states as $state) {
                                    echo '<option value="' . htmlspecialchars($state) . '">' . htmlspecialchars($state) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">CANCEL</button>
                <button type="submit" form="add_address_form" class="btn btn-solid btn-sm" id="save-address-btn">SAVE &
                    DELIVER</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/scriptCheckout.js'); ?>"></script>
<script type="text/javascript">
    function toggleEditAddress(id) {
        document.querySelectorAll('.edit-address-section').forEach(section => section.style.display = 'none');
        if (id) document.getElementById(`edit-address-${id}`).style.display = 'block';
    }
    function toggleAccordion3() {
        // Open modal for adding new address
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            var modalElement = document.getElementById('addAddressModal');
            if (modalElement) {
                var modal = new bootstrap.Modal(modalElement);
                modal.show();
            }
        } else if (typeof $.fn.modal !== 'undefined') {
            $('#addAddressModal').modal('show');
        } else {
            console.error('Bootstrap modal not available');
        }
    }

    $(document).ready(function () {
        // Open Add Address Modal - Check if Bootstrap 5 is available
        $('#openAddAddressModal').on('click', function (e) {
            e.preventDefault();
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                var modalElement = document.getElementById('addAddressModal');
                var modal = new bootstrap.Modal(modalElement);
                modal.show();
            } else {
                // Fallback for Bootstrap 4
                $('#addAddressModal').modal('show');
            }
        });

        // Also handle the old toggleAccordion3 function
        $(document).on('click', '[onclick*="toggleAccordion3"]', function (e) {
            e.preventDefault();
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                var modalElement = document.getElementById('addAddressModal');
                var modal = new bootstrap.Modal(modalElement);
                modal.show();
            } else {
                $('#addAddressModal').modal('show');
            }
        });
        var step_checked = [true, false, false, false];
        var step_data = { selected_address: '', pin: null, totl_item_count: <?= isset($carts) ? count($carts) : 0 ?> };

        // Initialize
        active_step(1);

        // Address Select
        $(".address_radio").change(function () {
            $(".diliver_here-btn-sec").empty();
            var id = $(this).val();
            var content = $(this).data('name') + ', ' + $(this).data('phone') + ', ' + $(this).data('addr');
            step_data.selected_address = content;
            $("#diliver_here" + id).html('<button type="button" class="btn btn-solid btn-sm deliver-here-btn" data-step="1" data-address-id="' + id + '">DELIVER HERE</button>');
        });

        // Navigation Clicks
        $(document).on('click', '.btn-change', function () { active_step($(this).data('step')); });
        $(document).on('click', '.login_step_checkout', function () { active_step($(this).data('step') + 1); });
        $(document).on('click', '.deliver-here-btn', function () {
            var $selectedAddress = $("#selectedAddress");
            if ($selectedAddress.length) {
                $selectedAddress.text(step_data.selected_address);
            }
            $("#selected_address_id").val($(this).data('address-id'));
            active_step(2);
        });

        // Step Logic with "Check" Icon Toggle
        function active_step(step) {
            // Hide all steps
            for (var i = 0; i < 4; i++) {
                $("#step_" + i).hide();
                $("#change_btn_step_" + i).hide();
                // Remove completed class from future steps
                $("#card_step_" + i).removeClass('step-completed');
            }

            // Show current step
            $("#step_" + step).show();

            // Mark previous steps as completed
            for (var j = 0; j < step; j++) {
                $("#change_btn_step_" + j).show();
                $("#step_" + j).hide();
                $("#card_step_" + j).addClass('step-completed'); // This triggers the check icon via CSS
            }

            if (step == 2) {
                var $summeryId = $("#summery_id");
                if ($summeryId.length) {
                    $summeryId.text(step_data.totl_item_count + " Items");
                }
            }
        }

        // Payment Method Change Handler
        $(".payment").change(function () {
            var paymentMethod = $(this).val();
            $("#payment_method").val(paymentMethod);

            if (paymentMethod == 'cod') {
                var ran = Math.floor(1000 + Math.random() * 9000);
                step_data.pin = ran;
                $("#confirmation_cod_section").html(
                    '<div class="alert alert-warning py-2 small">Enter Code: <b>' + ran + '</b></div>' +
                    '<input type="text" id="cod_confirmation" class="form-control" placeholder="Enter Code">'
                );
                $("#razorpay_payment_section").addClass('d-none');
                $("#wallet_payment_section").addClass('d-none');
                $("#palce_order").addClass('d-none');
            } else if (paymentMethod == 'razorpay') {
                $("#confirmation_cod_section").empty();
                $("#razorpay_payment_section").removeClass('d-none');
                $("#wallet_payment_section").addClass('d-none');
                $("#palce_order").addClass('d-none');
            } else if (paymentMethod == 'wallet') {
                $("#confirmation_cod_section").empty();
                $("#razorpay_payment_section").addClass('d-none');
                $("#wallet_payment_section").removeClass('d-none');
                $("#palce_order").addClass('d-none');
            } else {
                $("#confirmation_cod_section").empty();
                $("#razorpay_payment_section").addClass('d-none');
                $("#wallet_payment_section").addClass('d-none');
                $("#palce_order").addClass('d-none');
            }
        });

        $(document).on('keyup', '#cod_confirmation', function () {
            if ($(this).val() == step_data.pin) $("#palce_order").removeClass('d-none');
            else $("#palce_order").addClass('d-none');
        });

        // AJAX Place Order
        $('#placeorder-form').submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var delId = $('input[name="delivery_method_id"]:checked').val();
            if (form.find('input[name="delivery_id"]').length == 0) {
                form.append('<input type="hidden" name="delivery_id" value="' + delId + '">');
            } else {
                form.find('input[name="delivery_id"]').val(delId);
            }

            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Order successfully placed!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "<?= base_url() ?>";
                            }
                        });
                    } else {
                        Swal.fire('Error', response.message || 'Something went wrong', 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error', 'Server Error', 'error');
                }
            });
        });

        // Handle delete icon click in order summary with SweetAlert confirmation
        $(document).on('click', '.modern-summary-delete-icon', function (e) {
            e.preventDefault(); // Prevent default link behavior

            var deleteUrl = $(this).attr('href');
            var productId = deleteUrl.split('/').pop(); // Extract product ID from URL

            // Show SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to remove this item from cart?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f3ba75',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Removing item...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Navigate to delete URL
                    window.location.href = deleteUrl;
                }
            });
        });


        // Quantity controls for checkout order summary - STRICT: Uses exact DB price
        $(document).on('click', '.checkout-qty-plus', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var productId = $(this).data('product-id');
            // STRICT: Get exact unit price from data attribute (DB value)
            var $priceElement = $('.modern-summary-selling-price[data-product-id="' + productId + '"]');
            var strictUnitPrice = parseFloat($priceElement.data('unit-price')) || parseFloat($(this).data('sellingprice')) || 0;
            var $input = $(this).siblings('.checkout-qty-input');
            var currentQty = parseInt($input.val(), 10) || 1;
            var quantity = currentQty + 1;
            $input.val(quantity);

            // Update individual product total price immediately using STRICT DB price
            updateProductPrice(productId, strictUnitPrice, quantity);

            updateCheckoutItemTotal(productId, strictUnitPrice, quantity, true);
        });

        $(document).on('click', '.checkout-qty-minus', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var productId = $(this).data('product-id');
            // STRICT: Get exact unit price from data attribute (DB value)
            var $priceElement = $('.modern-summary-selling-price[data-product-id="' + productId + '"]');
            var strictUnitPrice = parseFloat($priceElement.data('unit-price')) || parseFloat($(this).data('sellingprice')) || 0;
            var $input = $(this).siblings('.checkout-qty-input');
            var currentQty = parseInt($input.val(), 10) || 1;
            var quantity = currentQty - 1;

            if (quantity < 1) {
                quantity = 1;
                $input.val(quantity);
                return;
            }

            $input.val(quantity);

            // Update individual product total price immediately using STRICT DB price
            updateProductPrice(productId, strictUnitPrice, quantity);

            updateCheckoutItemTotal(productId, strictUnitPrice, quantity, true);
        });

        // Function to update individual product total price - STRICT: Uses exact DB price, never modifies it
        function updateProductPrice(productId, unitPrice, quantity) {
            // STRICT: Use the exact unit price from data attribute (DB value), never recalculate
            var $priceElement = $('.modern-summary-selling-price[data-product-id="' + productId + '"]');
            var strictUnitPrice = parseFloat($priceElement.data('unit-price')) || parseFloat(unitPrice) || 0;

            // Validate inputs
            if (isNaN(strictUnitPrice) || strictUnitPrice <= 0) {
                console.error('Invalid unit price for product ' + productId + ': ' + strictUnitPrice);
                return;
            }

            if (isNaN(quantity) || quantity <= 0) {
                console.error('Invalid quantity for product ' + productId + ': ' + quantity);
                return;
            }

            // STRICT: Calculate total using exact DB unit price * quantity (no rounding, no modification)
            var totalPrice = strictUnitPrice * quantity;

            // Update display with exact calculation
            $('.product-total-price-' + productId).text(totalPrice.toFixed(2));

            // Also update the original price (strikethrough) if discount badge exists
            var $priceSection = $priceElement.closest('.modern-summary-price-section');
            var $originalPrice = $priceSection.find('.modern-summary-original-price del');

            if ($originalPrice.length > 0) {
                // Get the original unit price from data attribute (STRICT: from DB, never recalculate)
                var originalUnitPrice = parseFloat($priceElement.data('original-unit-price')) || 0;

                // Only update if we have a valid original unit price from DB
                if (originalUnitPrice > strictUnitPrice && originalUnitPrice > 0 && !isNaN(originalUnitPrice)) {
                    var newOriginalTotal = originalUnitPrice * quantity;
                    $originalPrice.text('₹' + newOriginalTotal.toFixed(2));
                }
            }
        }

        function updateCheckoutItemTotal(productId, sellingPrice, quantity, updateCart) {
            if (updateCart) {
                // Update cart quantity via AJAX
                $.ajax({
                    url: '<?php echo base_url('api/quantity/update/'); ?>' + productId,
                    type: 'POST',
                    data: { quantity: quantity },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            // Update subtotal without page reload
                            updateSubtotal();
                        } else {
                            console.error('Error updating quantity:', response.message);
                            Swal.fire('Error', response.message || 'Failed to update quantity', 'error');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error updating quantity:', error);
                        console.error('Response:', xhr.responseText);
                        Swal.fire('Error', 'Failed to update quantity. Please try again.', 'error');
                    }
                });
            } else {
                // Just update the display without saving to cart
                updateSubtotal();
            }
        }

        // Function to update subtotal without page reload - STRICT: Uses exact DB prices
        function updateSubtotal() {
            var subtotal = 0;
            $('.checkout-qty-input').each(function () {
                var quantity = parseInt($(this).val(), 10) || 0;
                var productId = $(this).data('product-id');
                // STRICT: Get exact unit price from data attribute (DB value), never use calculated price
                var $priceElement = $('.modern-summary-selling-price[data-product-id="' + productId + '"]');
                var strictUnitPrice = parseFloat($priceElement.data('unit-price')) || parseFloat($(this).data('sellingprice')) || 0;

                // STRICT: Use exact DB price * quantity (no modification)
                subtotal += (quantity * strictUnitPrice);
            });

            var $subtotalDisplay = $('#subtotal_display');
            if ($subtotalDisplay.length) {
                $subtotalDisplay.text(subtotal.toFixed(2));
            }
            // Update the global subtotal variable
            window.currentSubtotal = subtotal;
            updateOrderTotal();
        }

        // Save Address Handlers
        $("#add_address_form").submit(function (e) {
            e.preventDefault();
            ajaxSaveAddress($(this));
        });
        $(document).on('click', '.saveAddressBtn', function () {
            var id = $(this).attr('id').split('-')[1];
            ajaxSaveAddress($('#edit-address-' + id).find('form'));
        });

        function ajaxSaveAddress(form) {
            // Show loading state
            var $submitBtn = form.find('button[type="submit"], #save-address-btn');
            var originalText = $submitBtn.text();
            $submitBtn.prop('disabled', true).text('Saving...');

            // Get form data
            var formData = form.serialize();
            console.log('Form Action:', form.attr('action'));
            console.log('Form Data:', formData);

            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                dataType: 'json',
                beforeSend: function (xhr) {
                    // Add CSRF token if available
                    var csrfToken = $('meta[name="csrf-token"]').attr('content') || $('input[name="<?php echo $this->security->get_csrf_token_name(); ?>"]').val();
                    if (csrfToken) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                    }
                },
                success: function (response) {
                    $submitBtn.prop('disabled', false).text(originalText);

                    // Handle both JSON string and object responses
                    if (typeof response === 'string') {
                        try {
                            response = JSON.parse(response);
                        } catch (e) {
                            console.error('Failed to parse response:', e);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Invalid response from server.',
                                icon: 'error',
                                confirmButtonColor: '#f3ba75',
                                confirmButtonText: 'OK'
                            });
                            return;
                        }
                    }

                    if (response.success || response.code == 200) {
                        // Close modal if it's open
                        var modalElement = document.getElementById('addAddressModal');
                        if (modalElement) {
                            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                                var modal = bootstrap.Modal.getInstance(modalElement);
                                if (modal) {
                                    modal.hide();
                                } else {
                                    var newModal = new bootstrap.Modal(modalElement);
                                    newModal.hide();
                                }
                            } else {
                                $('#addAddressModal').modal('hide');
                            }
                        }

                        // Close edit section if open
                        $('.edit-address-section').hide();

                        // Show success message
                        Swal.fire({
                            title: 'Success!',
                            text: response.message || 'Address saved successfully!',
                            icon: 'success',
                            confirmButtonColor: '#f3ba75',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        var errorMsg = response.message || 'Error saving address.';
                        if (response.errors) {
                            if (typeof response.errors === 'object') {
                                var errorArray = Object.values(response.errors);
                                errorMsg = 'Errors: ' + errorArray.join(', ');
                            } else {
                                errorMsg = response.errors;
                            }
                        }
                        Swal.fire({
                            title: 'Error!',
                            text: errorMsg,
                            icon: 'error',
                            confirmButtonColor: '#f3ba75',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    $submitBtn.prop('disabled', false).text(originalText);

                    var errorMsg = 'An error occurred while saving the address.';
                    var responseData = null;

                    // Log full error for debugging
                    console.error('AJAX Error Details:', {
                        status: xhr.status,
                        statusText: xhr.statusText,
                        responseText: xhr.responseText,
                        responseJSON: xhr.responseJSON,
                        error: error,
                        readyState: xhr.readyState,
                        headers: xhr.getAllResponseHeaders()
                    });

                    // Log the full response text for debugging
                    if (xhr.responseText) {
                        console.log('Full Server Response:', xhr.responseText);
                    }

                    // Try to parse error response
                    if (xhr.responseJSON) {
                        responseData = xhr.responseJSON;
                    } else if (xhr.responseText) {
                        try {
                            // Try to extract JSON from response
                            var jsonMatch = xhr.responseText.match(/\{[\s\S]*\}/);
                            if (jsonMatch) {
                                responseData = JSON.parse(jsonMatch[0]);
                            } else {
                                responseData = JSON.parse(xhr.responseText);
                            }
                        } catch (e) {
                            // If parsing fails, check if it's HTML error page
                            if (xhr.responseText.indexOf('<!DOCTYPE') !== -1 || xhr.responseText.indexOf('<html') !== -1) {
                                errorMsg = 'Server returned an error page. Please check your form data and try again.';
                            } else if (xhr.status === 0) {
                                errorMsg = 'Network error. Please check your internet connection.';
                            } else if (xhr.status === 404) {
                                errorMsg = 'Server endpoint not found. Please contact support.';
                            } else if (xhr.status === 500) {
                                errorMsg = 'Server error. Please try again later.';
                            } else {
                                errorMsg = 'Error ' + xhr.status + ': ' + xhr.statusText;
                            }
                        }
                    }

                    if (responseData) {
                        if (responseData.message) {
                            errorMsg = responseData.message;
                        } else if (responseData.errors) {
                            if (typeof responseData.errors === 'object') {
                                var errorArray = Object.values(responseData.errors);
                                errorMsg = 'Validation errors: ' + errorArray.join(', ');
                            } else {
                                errorMsg = responseData.errors;
                            }
                        } else if (responseData.error) {
                            errorMsg = responseData.error;
                        }
                    }

                    Swal.fire({
                        title: 'Error!',
                        text: errorMsg,
                        icon: 'error',
                        confirmButtonColor: '#f3ba75',
                        confirmButtonText: 'OK',
                        footer: '<small>Status: ' + xhr.status + ' | Check browser console for details</small>'
                    });
                }
            });
        }

        // Total Calculation
        var subtotal = parseFloat(<?= $tot_amount ?>);

        // Variable to track discount
        var discount_amount = 0;

        $('#apply_coupon_btn').click(function () {
            var code = $('#coupon_code_input').val();
            var $subtotalEl = $('#subtotal_display');
            var current_subtotal = $subtotalEl.length ? parseFloat($subtotalEl.text()) : 0;

            if (code.trim() == '') {
                $('#coupon_msg').removeClass('text-success').addClass('text-danger').text('Please enter a code');
                return;
            }

            $.ajax({
                url: '<?= base_url("Orders/apply_coupon_ajax") ?>', // Make sure this matches controller
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_code: code,
                    cart_total: current_subtotal
                },
                success: function (response) {
                    if (response.status) {
                        // Success
                        $('#coupon_msg').removeClass('text-danger').addClass('text-success').text(response.message);

                        // Update Global Variable
                        discount_amount = parseFloat(response.discount_amount);

                        // Show Discount Row
                        $('#discount_row').show();
                        var $discountDisplay = $('#discount_display');
                        if ($discountDisplay.length) {
                            $discountDisplay.text(discount_amount.toFixed(2));
                        }

                        // Recalculate Final Total (calling the existing function)
                        updateOrderTotal();

                        // Disable input to prevent double apply
                        $('#coupon_code_input').prop('disabled', true);
                        $('#apply_coupon_btn').text('APPLIED').prop('disabled', true);

                    } else {
                        // Error
                        $('#coupon_msg').removeClass('text-success').addClass('text-danger').text(response.message);
                        $('#discount_row').hide();
                        discount_amount = 0;
                        updateOrderTotal();
                    }
                },
                error: function () {
                    alert('Something went wrong checking coupon');
                }
            });
        });
        // Update the existing updateOrderTotal function
        function updateOrderTotal() {
            // Get current subtotal from display (updated dynamically) or use global variable
            var $subtotalDisplay = $('#subtotal_display');
            var currentSubtotal = window.currentSubtotal || ($subtotalDisplay.length ? parseFloat($subtotalDisplay.text()) : 0) || parseFloat(<?= $tot_amount ?>);
            var selectedOption = $('input[name="delivery_method_id"]:checked');
            var deliveryAmount = parseFloat(selectedOption.data('amount')) || 0;

            // Update Delivery Display
            var $deliveryDisplay = $('#delivery_display');
            if ($deliveryDisplay.length) {
                if (deliveryAmount > 0) {
                    $deliveryDisplay.text('₹ ' + deliveryAmount.toFixed(2));
                } else {
                    $deliveryDisplay.html('<span class="text-success">FREE</span>');
                }
            }

            // CALCULATION: Subtotal + Delivery - Discount
            var finalTotal = (currentSubtotal + deliveryAmount) - discount_amount;

            // Prevent negative total
            if (finalTotal < 0) finalTotal = 0;

            var $finalTotalDisplay = $('#final_total_display');
            if ($finalTotalDisplay.length) {
                $finalTotalDisplay.text(finalTotal.toFixed(2));
            }
        }

        // Initialize global subtotal variable
        window.currentSubtotal = parseFloat(<?= $tot_amount ?>);

        <?php if ($razorpay_enabled): ?>
            // Razorpay Payment Handler
            $('#razorpay_pay_btn').on('click', function () {
                var btn = $(this);
                btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Processing...');

                // Get form data
                var selectedAddressId = $('#selected_address_id').val();
                var deliveryId = $('input[name="delivery_method_id"]:checked').val();

                if (!selectedAddressId) {
                    Swal.fire('Error', 'Please select a delivery address', 'error');
                    btn.prop('disabled', false).html('<i class="fa fa-credit-card"></i> Pay Now');
                    return;
                }

                if (!deliveryId) {
                    Swal.fire('Error', 'Please select a delivery method', 'error');
                    btn.prop('disabled', false).html('<i class="fa fa-credit-card"></i> Pay Now');
                    return;
                }

                // Create Razorpay order
                $.ajax({
                    url: '<?= base_url("orders/create_razorpay_order") ?>',
                    type: 'POST',
                    data: {
                        selected_address_id: selectedAddressId,
                        delivery_id: deliveryId
                    },
                    dataType: 'json',
                    success: function (response) {
                        console.log('Razorpay Order Response:', response);
                        if (response.success && response.data) {
                            var options = {
                                key: response.data.key_id,
                                amount: response.data.amount,
                                currency: 'INR',
                                name: '<?= $this->config->item("site_name") ?: "DNS Store" ?>',
                                description: 'Order #' + response.data.order_number,
                                order_id: response.data.razorpay_order_id,
                                handler: function (razorpayResponse) {
                                    // Verify payment
                                    $.ajax({
                                        url: '<?= base_url("orders/verify_razorpay_payment") ?>',
                                        type: 'POST',
                                        data: {
                                            razorpay_order_id: razorpayResponse.razorpay_order_id,
                                            razorpay_payment_id: razorpayResponse.razorpay_payment_id,
                                            razorpay_signature: razorpayResponse.razorpay_signature,
                                            order_id: response.data.order_id,
                                            selected_address_id: selectedAddressId
                                        },
                                        dataType: 'json',
                                        success: function (verifyResponse) {
                                            if (verifyResponse.success) {
                                                Swal.fire({
                                                    title: 'Success!',
                                                    text: 'Payment successful! Order placed successfully.',
                                                    icon: 'success',
                                                    confirmButtonText: 'OK'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = "<?= base_url() ?>";
                                                    }
                                                });
                                            } else {
                                                Swal.fire('Error', verifyResponse.message || 'Payment verification failed', 'error');
                                                btn.prop('disabled', false).html('<i class="fa fa-credit-card"></i> Pay Now');
                                            }
                                        },
                                        error: function (xhr, status, error) {
                                            console.error('Payment verification error:', xhr.responseText);
                                            var errorMsg = 'Failed to verify payment. Please contact support.';
                                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                                errorMsg = xhr.responseJSON.message;
                                            }
                                            Swal.fire('Error', errorMsg, 'error');
                                            btn.prop('disabled', false).html('<i class="fa fa-credit-card"></i> Pay Now');
                                        }
                                    });
                                },
                                prefill: {
                                    name: '<?= $this->session->userdata("username") ?: "" ?>',
                                    email: '<?= $this->session->userdata("email") ?: "" ?>',
                                    contact: '<?= $this->session->userdata("mobile") ?: "" ?>'
                                },
                                theme: {
                                    color: '#f3ba75'
                                },
                                modal: {
                                    ondismiss: function () {
                                        btn.prop('disabled', false).html('<i class="fa fa-credit-card"></i> Pay Now');
                                    }
                                }
                            };

                            var rzp = new Razorpay(options);
                            rzp.open();
                        } else {
                            var errorMsg = response.message || 'Failed to create payment order';
                            console.error('Razorpay Order Error:', errorMsg);
                            Swal.fire({
                                title: 'Payment Error',
                                text: errorMsg,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                            btn.prop('disabled', false).html('<i class="fa fa-credit-card"></i> Pay Now');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', {
                            status: status,
                            error: error,
                            responseText: xhr.responseText,
                            statusCode: xhr.status
                        });

                        var errorMsg = 'Server error. Please try again.';
                        try {
                            var errorResponse = JSON.parse(xhr.responseText);
                            if (errorResponse.message) {
                                errorMsg = errorResponse.message;
                            }
                        } catch (e) {
                            if (xhr.responseText) {
                                errorMsg = 'Error: ' + xhr.responseText.substring(0, 200);
                            }
                        }

                        Swal.fire({
                            title: 'Payment Error',
                            text: errorMsg,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                        btn.prop('disabled', false).html('<i class="fa fa-credit-card"></i> Pay Now');
                    }
                });
            });
        <?php endif; ?>

        // Wallet Payment Handler
        $('#wallet_pay_btn').on('click', function () {
            var btn = $(this);
            btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Processing...');

            // Get form data
            var selectedAddressId = $('#selected_address_id').val();
            var deliveryId = $('input[name="delivery_method_id"]:checked').val();

            if (!selectedAddressId) {
                Swal.fire('Error', 'Please select a delivery address', 'error');
                btn.prop('disabled', false).html('<i class="fa fa-wallet"></i> Pay from Wallet');
                return;
            }

            if (!deliveryId) {
                Swal.fire('Error', 'Please select a delivery method', 'error');
                btn.prop('disabled', false).html('<i class="fa fa-wallet"></i> Pay from Wallet');
                return;
            }

            // Get wallet balance and final total
            var walletBalance = <?= isset($wallet_balance) ? $wallet_balance : 0 ?>;
            var finalTotal = parseFloat($('#final_total_display').text()) || 0;

            // Check if sufficient balance
            if (walletBalance < finalTotal) {
                Swal.fire({
                    title: 'Insufficient Balance',
                    text: 'Your wallet balance (₹' + walletBalance.toFixed(2) + ') is less than the order amount (₹' + finalTotal.toFixed(2) + '). Please add money to your wallet.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Add Money',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '<?= base_url('main/wallet') ?>';
                    }
                });
                btn.prop('disabled', false).html('<i class="fa fa-wallet"></i> Pay from Wallet');
                return;
            }

            // Confirm payment
            Swal.fire({
                title: 'Confirm Payment',
                text: '₹' + finalTotal.toFixed(2) + ' will be deducted from your wallet. Do you want to proceed?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, Pay Now',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form
                    $('#delivery_id').val(deliveryId);
                    $('#payment_method').val('wallet');

                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('Orders') ?>',
                        data: $('#placeorder-form').serialize(),
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Order placed successfully! Amount deducted from wallet.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "<?= base_url() ?>";
                                    }
                                });
                            } else {
                                Swal.fire('Error', response.message || 'Something went wrong', 'error');
                                btn.prop('disabled', false).html('<i class="fa fa-wallet"></i> Pay from Wallet');
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('AJAX Error:', { status: status, error: error });
                            var errorMsg = 'Server error. Please try again.';
                            try {
                                var errorResponse = JSON.parse(xhr.responseText);
                                if (errorResponse.message) {
                                    errorMsg = errorResponse.message;
                                }
                            } catch (e) {
                                // Keep default error message
                            }
                            Swal.fire('Error', errorMsg, 'error');
                            btn.prop('disabled', false).html('<i class="fa fa-wallet"></i> Pay from Wallet');
                        }
                    });
                } else {
                    btn.prop('disabled', false).html('<i class="fa fa-wallet"></i> Pay from Wallet');
                }
            });
        });

        // Update total when continue button is clicked
        $(document).on('click', '.login_step_checkout[data-step="2"]', function () {
            updateSubtotal();
            updateOrderTotal();
        });

        updateOrderTotal();
        $(document).on('change', '.delivery_radio', function () { updateOrderTotal(); });
    });
</script>