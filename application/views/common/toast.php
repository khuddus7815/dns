<?php
// Check for success flashdata
$success_message = $this->session->flashdata('success');
if ($success_message) {
    echo '
    <script>
    $(document).ready(function(){
        $(".toast-body").html("' . $success_message . '");
        $(".toast").toast("show");
    });
    </script>';
}

// Check for error flashdata
$error_message = $this->session->flashdata('error');
if ($error_message) {
    echo '
    <script>
    $(document).ready(function(){
        $(".toast-body").html("' . $error_message . '");
        $(".toast").toast("show");
    });
    </script>';
}
