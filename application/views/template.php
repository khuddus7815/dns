<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="DNS Store">
    <meta name="keywords" content="DNS Store">
    <meta name="author" content="DNS Store">
    <!-- <link rel="shortcut icon" href="assets/images/favicon_io/favicon.ico" type="image/x-icon"> -->
    <!-- Android Chrome Icons -->
    <!-- <link rel="icon" sizes="192x192" href="assets/images/favicon_io/android-chrome-192x192.png"> -->
    <link rel="icon" sizes="512x512" href="<?= base_url('assets/images/favicon_io/android-chrome-512x512.png') ?>">


    <!-- Apple Touch Icon -->
    <!-- <link rel="apple-touch-icon" href="assets/images/favicon_io/apple-touch-icon.png"> -->
    <title>DNS CAKES</title>

    <?php $this->load->view('common/links'); ?>
</head>

<body>



    <?php $this->load->view('common/preload'); ?>

    <?php $this->load->view('common/header'); ?>

    <?php $this->load->view($content); ?>

    <?php $this->load->view('common/footer'); ?>

    <?php $this->load->view('common/theme_setting'); ?>

    <?php $this->load->view('common/js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script type="text/javascript">
        <?php if ($this->session->flashdata('success')) { ?>
            toastr.success("<?php echo $this->session->flashdata('success'); ?>");
        <?php } else if ($this->session->flashdata('error')) {  ?>
            toastr.error("<?php echo $this->session->flashdata('error'); ?>");
        <?php } else if ($this->session->flashdata('warning')) {  ?>
            toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
        <?php } else if ($this->session->flashdata('info')) {  ?>
            toastr.info("<?php echo $this->session->flashdata('info'); ?>");
        <?php } ?>
    </script>

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</body>


</html>