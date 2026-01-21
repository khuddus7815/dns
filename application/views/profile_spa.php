<style>
    /* Skeleton Shimmer Loading Effect */
    .skeleton-loader {
        padding: 20px;
        animation: skeleton-loading 1.5s ease-in-out infinite;
    }

    .skeleton-header {
        height: 40px;
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        border-radius: 8px;
        margin-bottom: 20px;
        animation: shimmer 1.5s infinite;
    }

    .skeleton-content {
        margin-top: 20px;
    }

    .skeleton-line {
        height: 16px;
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        border-radius: 4px;
        margin-bottom: 12px;
        animation: shimmer 1.5s infinite;
    }

    .skeleton-line.short {
        width: 60%;
    }

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }

        100% {
            background-position: 200% 0;
        }
    }

    @keyframes skeleton-loading {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.8;
        }
    }
</style>

<section class="section-b-space margin-top">
    <div class="container">
        <div class="row">
            <?php $this->load->view('common/profile_sidebar', ['active_tab' => 'profile']); ?>

            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard" style="display:block;">
                        <!-- Content will be loaded here dynamically -->
                        <div id="profile-content-container">
                            <div class="skeleton-loader">
                                <div class="skeleton-header"></div>
                                <div class="skeleton-content">
                                    <div class="skeleton-line"></div>
                                    <div class="skeleton-line"></div>
                                    <div class="skeleton-line short"></div>
                                    <div class="skeleton-line"></div>
                                    <div class="skeleton-line short"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Define loadProfileSection globally first
    function loadProfileSection(section) {
        console.log('Loading section:', section);

        // Show skeleton shimmer loading effect
        $('#profile-content-container').html(
            '<div class="skeleton-loader">' +
            '<div class="skeleton-header"></div>' +
            '<div class="skeleton-content">' +
            '<div class="skeleton-line"></div>' +
            '<div class="skeleton-line"></div>' +
            '<div class="skeleton-line short"></div>' +
            '<div class="skeleton-line"></div>' +
            '<div class="skeleton-line short"></div>' +
            '</div>' +
            '</div>'
        );

        // Load content via AJAX
        $.ajax({
            url: '<?= base_url("main/load_profile_section") ?>',
            type: 'POST',
            data: { section: section },
            dataType: 'json',
            beforeSend: function () {
                console.log('Sending AJAX request for section:', section);
            },
            success: function (response) {
                console.log('AJAX Success:', response);
                if (response && response.success) {
                    $('#profile-content-container').html(response.html);

                    // Re-initialize any scripts that need to run after content load
                    if (typeof initializeSectionScripts === 'function') {
                        initializeSectionScripts(section);
                    }
                } else {
                    console.error('Response not successful:', response);
                    $('#profile-content-container').html(
                        '<div class="alert alert-danger">' +
                        (response.message || 'Failed to load content') +
                        '</div>'
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error Details:', {
                    status: status,
                    error: error,
                    responseText: xhr.responseText,
                    statusCode: xhr.status
                });
                $('#profile-content-container').html(
                    '<div class="alert alert-danger">Error loading content. Please try again.<br>' +
                    'Status: ' + status + '<br>' +
                    'Error: ' + error +
                    '</div>'
                );
            }
        });
    }

    $(document).ready(function () {
        // Initialize: Load profile section by default - REMOVED to avoid race condition with URL params logic below
        // loadProfileSection('profile'); 

        // Handle navigation clicks - use event delegation to handle dynamically loaded content
        $(document).on('click', '.profile-nav-link', function (e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            var section = $(this).data('section');

            console.log('Profile nav clicked, section:', section);

            if (!section) {
                console.error('Section not found in data attribute');
                return false;
            }

            // Update active state
            $('.profile-nav-link').parent('li').removeClass('active');
            $(this).parent('li').addClass('active');

            // Load section
            loadProfileSection(section);

            // Update URL without reload
            if (history.pushState) {
                var newUrl = '<?= base_url("main/profile_spa") ?>?section=' + section;
                history.pushState({ section: section }, '', newUrl);
            }

            return false;
        });

        // Handle browser back/forward buttons
        window.addEventListener('popstate', function (e) {
            var urlParams = new URLSearchParams(window.location.search);
            var section = urlParams.get('section') || 'profile';
            loadProfileSection(section);

            // Update active state
            $('.profile-nav-link').parent('li').removeClass('active');
            $('.profile-nav-link[data-section="' + section + '"]').parent('li').addClass('active');
        });

        // Load section on page load if section parameter exists or default to 'profile'
        var urlParams = new URLSearchParams(window.location.search);
        var initialSection = urlParams.get('section') || 'profile';
        
        // Always load the initial section (whether it's profile or something else)
        loadProfileSection(initialSection);
        $('.profile-nav-link').parent('li').removeClass('active');
        $('.profile-nav-link[data-section="' + initialSection + '"]').parent('li').addClass('active');

        function initializeSectionScripts(section) {
            // Initialize scripts specific to each section
            switch (section) {
                case 'profile':
                    // Profile section scripts are already in the partial view
                    break;
                case 'address':
                    // Address section scripts are already in the partial view
                    break;
                case 'booking':
                    // Booking section scripts are already in the partial view
                    break;
                case 'wallet':
                    // Wallet section scripts are already in the partial view
                    break;
            }
        }
    });

    // Make loadProfileSection available globally for use in partial views
    window.loadProfileSection = loadProfileSection;
</script>