<!-- latest jquery-->
<!-- <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script> -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- fly cart ui jquery-->
<!-- <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- exitintent jquery-->
<script src="<?php echo base_url('assets/js/jquery.exitintent.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/exit.js'); ?>"></script>

<!-- popper js-->
<!-- <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>

<!-- slick js-->
<!-- <script src="<?php echo base_url('assets/js/slick.js'); ?>"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- menu js-->
<script src="<?php echo base_url('assets/js/menu.js'); ?>"></script>

<!-- lazyload js-->
<script src="<?php echo base_url('assets/js/lazysizes.min.js'); ?>"></script>

<!-- Bootstrap js-->
<!-- <script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script> -->
<!-- Bootstrap JS via CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Bootstrap Notification js-->
<!-- <script src="<?php echo base_url('assets/js/bootstrap-notify.min.js'); ?>"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-notify@3.1.5/dist/bootstrap-notify.min.js"></script> -->

<!-- Fly cart js-->
<script src="<?php echo base_url('assets/js/fly-cart.js'); ?>"></script>

<!-- Theme js-->
<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>

<script>
    $(window).on('load', function() {
        setTimeout(function() {
            $('#exampleModal').modal('show');
        }, 2500);
    });

    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }
</script>
<script>
// Make refreshWishlistCount available globally
function refreshWishlistCount() {
    $.ajax({
        url: '<?= base_url("api/getWishlistCount") ?>',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.success && response.wishlistCount > 0) {
                $('.wishlist-count').text(response.wishlistCount).show();
            } else {
                $('.wishlist-count').hide();
            }
        },
        error: function(xhr, status, error) {
            console.error('Wishlist count error:', xhr.responseText);
        }
    });
}

// Make it globally available
window.refreshWishlistCount = refreshWishlistCount;

$(document).ready(function() {
    // Handle click on wishlist heart icon
    $(document).on('click', '.wishlist-btn', function(e) {
        e.preventDefault();
        var btn = $(this);
        var icon = btn.find('i');
        var productId = btn.data('id');

        $.ajax({
            url: '<?= base_url("Main/toggle_wishlist") ?>',
            type: 'POST',
            dataType: 'json',
            data: { product_id: productId },
            success: function(response) {
                if(response.status) {
                    // Toggle Icon Style - Golden color when not in wishlist, white filled when in wishlist
                    if(response.action === 'added') {
                        icon.removeClass('ti-heart').addClass('fa fa-heart');
                        icon.css({
                            'color': '#fff',
                            'background-color': '#f3ba75',
                            'border-radius': '50%',
                            'padding': '2px'
                        });
                        btn.addClass('wishlist-active');
                        toastr.success(response.message);
                    } else {
                        icon.removeClass('fa fa-heart').addClass('ti-heart');
                        icon.css({
                            'color': '#f3ba75',
                            'background-color': 'transparent',
                            'border-radius': '0',
                            'padding': '0'
                        });
                        btn.removeClass('wishlist-active');
                        toastr.info(response.message);
                    }
                } else {
                    // Not logged in
                    toastr.warning(response.message);
                    setTimeout(function() {
                        window.location.href = "<?= base_url('login') ?>";
                    }, 1500);
                }
            },
            error: function() {
                toastr.error('Something went wrong. Please try again.');
            }
        });
    });
    
    // Check wishlist status on page load
    $('.wishlist-btn').each(function() {
        var btn = $(this);
        var productId = btn.data('id');
        var icon = btn.find('i');
        
        $.ajax({
            url: '<?= base_url("Main/check_wishlist_status") ?>',
            type: 'POST',
            dataType: 'json',
            data: { product_id: productId },
            success: function(response) {
                if(response.in_wishlist) {
                    // Product is liked: gold heart, white circle background
                    icon.removeClass('ti-heart').addClass('fa fa-heart');
                    icon.css({
                        'color': '#f3ba75',
                        'background-color': '#fff',
                        'border-radius': '50%',
                        'padding': '4px',
                        'width': '24px',
                        'height': '24px',
                        'display': 'flex',
                        'align-items': 'center',
                        'justify-content': 'center'
                    });
                    btn.addClass('wishlist-active');
                } else {
                    // Product is not liked: white heart, golden circle background
                    icon.removeClass('fa fa-heart').addClass('ti-heart');
                    icon.css({
                        'color': '#fff',
                        'background-color': '#f3ba75',
                        'border-radius': '50%',
                        'padding': '4px',
                        'width': '24px',
                        'height': '24px',
                        'display': 'flex',
                        'align-items': 'center',
                        'justify-content': 'center'
                    });
                    btn.removeClass('wishlist-active');
                }
            }
        });
    });
});
</script>