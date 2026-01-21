// Clear all sidebar states - close all dropdowns
function closeAllSidebarMenus() {
  $(".sidebar-menu").find("a").removeClass("active");
  $(".sidebar-menu").find("li").removeClass("active");
  $(".sidebar-menu").find(".sidebar-submenu").removeClass("menu-open").hide();
}

$.sidebarMenu = function (menu) {
  var animationSpeed = 300,
    subMenuSelector = '.sidebar-submenu';

  $(menu).on('click', 'li a', function (e) {
    var $this = $(this);
    var checkElement = $this.next();
    var href = $this.attr('href');
    var $parentLi = $this.parent('li');

    // Check if this link has a submenu (at any level)
    var hasSubmenu = checkElement.is(subMenuSelector);

    // Check if this is a final link (no submenu, has real href) - these should navigate
    var isFinalLink = !hasSubmenu && href && href !== '#' && href !== '';

    // If it has a submenu, handle toggle
    if (hasSubmenu) {
      e.preventDefault();
      e.stopPropagation();

      // Check if we're in a nested submenu or top level
      var isNested = $parentLi.parents('.sidebar-submenu').length > 0;

      if (checkElement.is(':visible')) {
        // Close THIS submenu only (and all its nested submenus)
        checkElement.find('.sidebar-submenu').removeClass('menu-open').slideUp(animationSpeed);
        checkElement.slideUp(animationSpeed, function () {
          checkElement.removeClass('menu-open');
          $parentLi.removeClass("active");
        });
      } else {
        // Open THIS submenu only
        if (isNested) {
          // For nested submenus, only close other submenus at the same level (siblings)
          var $parentSubmenu = $parentLi.parent('.sidebar-submenu');
          // Only find direct children submenus at the same level
          $parentSubmenu.children('li').each(function () {
            var $siblingLi = $(this);
            var $siblingSubmenu = $siblingLi.children('.sidebar-submenu').first();
            // If it's not the one we're opening and it's visible, close it
            if (!$siblingSubmenu.is(checkElement) && $siblingSubmenu.is(':visible')) {
              // Close nested submenus too
              $siblingSubmenu.find('.sidebar-submenu').removeClass('menu-open').slideUp(animationSpeed);
              $siblingSubmenu.slideUp(animationSpeed, function () {
                $siblingSubmenu.removeClass('menu-open');
                $siblingLi.removeClass('active');
              });
            }
          });
        } else {
          // For top-level submenus, close other top-level submenus only
          var $topLevelMenu = $this.closest('ul.sidebar-menu');
          // Only find direct children submenus, not nested ones
          $topLevelMenu.children('li').each(function () {
            var $siblingLi = $(this);
            var $siblingSubmenu = $siblingLi.children('.sidebar-submenu').first();
            // If it's not the one we're opening and it's visible, close it
            if (!$siblingSubmenu.is(checkElement) && $siblingSubmenu.is(':visible')) {
              // Close nested submenus too
              $siblingSubmenu.find('.sidebar-submenu').removeClass('menu-open').slideUp(animationSpeed);
              $siblingSubmenu.slideUp(animationSpeed, function () {
                $siblingSubmenu.removeClass('menu-open');
                $siblingLi.removeClass('active');
              });
            }
          });
        }

        // Open ONLY the clicked submenu
        checkElement.slideDown(animationSpeed, function () {
          checkElement.addClass('menu-open');
          $parentLi.addClass('active');
        });
      }

      return false;
    }

    // For final links (no submenu, has href), allow navigation
    if (isFinalLink) {
      // Allow navigation to proceed
      return true;
    }

    // For links with href='#' or empty, prevent default
    if (!href || href === '#') {
      e.preventDefault();
      return false;
    }
  });
}
$.sidebarMenu($('.sidebar-menu'))
// Declare variables globally within this file scope
var $nav = $('.page-sidebar');
var $header = $('.page-main-header');
var $toggle_nav_top = $('#sidebar-toggle').parent().length ? $('#sidebar-toggle').parent() : $('#sidebar-toggle');
var $body_part_side = $('.body-part');

// Improved Toggle Handler - Targets the specific class on the anchor
$(document).on('click', '.sidebar-toggle-btn', function (e) {
  e.preventDefault();
  // Ensure we select fresh elements
  $nav = $('.page-sidebar');
  $header = $('.page-main-header'); // Update global var

  $nav.toggleClass('open');
  $header.toggleClass('open');

  // Trigger resize to fix chart width ONLY ON DESKTOP
  // On mobile, the resize handler forcefully closes the sidebar (adds 'open'), so triggering it here would immediately re-close the sidebar.
  if ($(window).width() > 991) {
    setTimeout(function () {
      window.dispatchEvent(new Event('resize'));
    }, 300);
  }
});

$body_part_side.click(function () {
  $nav.addClass('open');
  $header.addClass('open');
});

//    responsive sidebar
var $window = $(window);
var widthwindow = $window.width();
(function ($) {
  "use strict";
  if (widthwindow + 17 <= 991) {
    $toggle_nav_top.addClass("open");
    $nav.addClass("open");
  }
})(jQuery);

$(window).resize(function () {
  var width_window = $window.width();   // Fixed typo 'widthwindaw'
  if (width_window + 17 <= 991) {
    $toggle_nav_top.addClass("open");
    $nav.addClass("open");
  }
  // Else block removed to prevent auto-opening on desktop when resize is triggered
});

// Initialize sidebar state on page load
function initializeSidebarState() {
  // FIRST: Close ALL menus to start fresh
  closeAllSidebarMenus();

  var current = window.location.pathname;
  var currentUrl = window.location.href;

  // Function to normalize URLs for comparison
  function normalizeUrl(url) {
    if (!url) return '';
    // Remove base URL if present
    var normalized = url.replace(/^https?:\/\/[^\/]+/, '');
    // Remove trailing slashes
    normalized = normalized.replace(/\/$/, '');
    // Remove query strings
    normalized = normalized.split('?')[0];
    return normalized.toLowerCase();
  }

  var normalizedCurrent = normalizeUrl(current);
  var activeLinkFound = false;
  var $activeLink = null;

  // Find the active link that matches current page
  $(".sidebar-menu a").each(function () {
    var $link = $(this);
    var href = $link.attr("href");

    if (href && href !== '#' && href !== '') {
      var normalizedHref = normalizeUrl(href);

      // More robust URL matching
      var isMatch = false;

      // Exact match
      if (normalizedCurrent === normalizedHref) {
        isMatch = true;
      }
      // Current URL starts with link URL (for nested paths)
      else if (normalizedCurrent.indexOf(normalizedHref) === 0 && normalizedHref.length > 0) {
        // Make sure it's not a partial match (e.g., /admin/product matching /admin/products)
        var nextChar = normalizedCurrent.charAt(normalizedHref.length);
        if (!nextChar || nextChar === '/' || nextChar === '?') {
          isMatch = true;
        }
      }
      // Fallback: check if current path contains the href
      else if (current.indexOf(href) !== -1 && href.length > 1) {
        isMatch = true;
      }

      if (isMatch) {
        activeLinkFound = true;
        $activeLink = $link;
        // Mark this link as active
        $link.addClass('active');
        console.log('Active link found: ' + href);
      }
    }
  });

  // If active link found, open only its parent menus
  if (activeLinkFound && $activeLink) {
    // Open all parent menus for the active link
    $activeLink.parents('li').each(function () {
      var $li = $(this);
      $li.addClass('active');

      // Open parent submenus
      var $submenu = $li.children('.sidebar-submenu');
      if ($submenu.length > 0) {
        $submenu.addClass('menu-open').show();
      }
    });
  }
}

// Initialize on page load - run early
$(document).ready(function () {
  // Initialize sidebar state - closes all menus, then opens only active page parents
  initializeSidebarState();
});
