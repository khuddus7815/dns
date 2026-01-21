<div class="col-lg-3">
    <div class="account-sidebar"><a class="popup-btn">my account</a></div>
    <div class="dashboard-left">
        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                    aria-hidden="true"></i> back</span></div>
        <div class="block-content">
            <ul>
                <li class="<?= ($active_tab == 'profile') ? 'active' : '' ?>">
                    <a href="javascript:void(0);" class="profile-nav-link" data-section="profile">Profile</a>
                </li>
                <li class="<?= ($active_tab == 'address') ? 'active' : '' ?>">
                    <a href="javascript:void(0);" class="profile-nav-link" data-section="address">My Address</a>
                </li>
                <li class="<?= ($active_tab == 'booking') ? 'active' : '' ?>">
                    <a href="javascript:void(0);" class="profile-nav-link" data-section="booking">My Booking</a>
                </li>
                <li class="<?= ($active_tab == 'wallet') ? 'active' : '' ?>">
                    <a href="javascript:void(0);" class="profile-nav-link" data-section="wallet">My Wallet</a>
                </li>
                <li class="last"><a href="<?= base_url('users/logout'); ?>" id="logout-btn">Log Out</a></li>
            </ul>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var logoutBtn = document.getElementById('logout-btn');
        if (logoutBtn) {
            logoutBtn.addEventListener('click', function (e) {
                e.preventDefault();
                var logoutUrl = this.getAttribute('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be logged out of your account.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d4af37', // Golden color
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, logout!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = logoutUrl;
                    }
                });
            });
        }
    });
</script>