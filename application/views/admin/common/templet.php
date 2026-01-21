<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/multikart/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Mar 2020 08:43:47 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url('assets/images/favicon_io/android-chrome-512x512.png') ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon_io/android-chrome-512x512.png') ?>"
        type="image/x-icon">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>DNS Store - Administration</title>
    <?php $this->load->view('admin/common/link.php'); ?>
    <style>
        /* Force Toastr to be on top of EVERYTHING */
        #toast-container {
            z-index: 9999999 !important;
            position: fixed !important;
        }

        .toast {
            opacity: 1 !important;
        }

        /* Mobile specific adjustment */
        @media only screen and (max-width: 991px) {
            #toast-container {
                top: 80px !important; /* Just below the sticky header (approx 60-70px) */
                right: 10px !important;
                left: 10px !important; /* Center on mobile */
                width: auto !important;
                display: flex;
                justify-content: center;
            }
            
            #toast-container > div {
                width: 100% !important; /* Full width toast on mobile */
                max-width: 400px;
                margin: 0 auto;
            }
        }
    </style>

<body>
    <?php $this->load->view('admin/common/header.php'); ?>
    <?php $this->load->view('admin/common/sidebar.php'); ?>

    <?php $this->load->view($content); ?>
    <?php $this->load->view('admin/common/foooter.php'); ?>
    <?php $this->load->view('admin/common/js'); ?>
    <script type="text/javascript">
        <?php if ($this->session->flashdata('success')) { ?>
                toastr.success("<?php echo $this->session->flashdata('success'); ?>");
        <?php } else if ($this->session->flashdata('error')) { ?>
                       toastr.error("<?php echo $this->session->flashdata('error'); ?>");
        <?php } else if ($this->session->flashdata('warning')) { ?>
                           toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
        <?php } else if ($this->session->flashdata('info')) { ?>
                                        toastr.info("<?php echo $this->session->flashdata('info'); ?>");
        <?php } ?>

        // Initialize Feather Icons after page load
        $(document).ready(function () {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>