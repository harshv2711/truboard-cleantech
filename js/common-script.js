// <!-- Add sticky navbar scroll behavior -->

let lastScrollTop = 0;
const navbar = document.querySelector(".navbar");
const scrollThreshold = 50; // Minimum scroll amount before navbar starts hiding

window.addEventListener("scroll", () => {
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  // At the very top of the page
  if (scrollTop <= 0) {
    navbar.classList.remove("sticky", "hidden", "visible");
    return;
  }

  // Add sticky class when scrolling down
  if (scrollTop > 0) {
    navbar.classList.add("sticky");
  }

  if (scrollTop < lastScrollTop) {
    // Scrolling up - hide navbar
    navbar.classList.remove("visible");
    navbar.classList.add("hidden");
  } else {
    // Scrolling down or stopped - show navbar
    navbar.classList.remove("hidden");
    navbar.classList.add("visible");
  }

  lastScrollTop = scrollTop;
});

$(document).ready(function () {
  var $menuBtn = $(".mobile-menu-btn");
  var $dropdown = $(".option-dropdown-wrapper");
  var isMobile = window.innerWidth <= 768; // Define mobile breakpoint
  var scrollTimeout;

  // Handle hover for desktop
  if (!isMobile) {
    $menuBtn.add($dropdown).on("mouseenter", function () {
      $dropdown.stop(true, true).slideDown(200);
    });

    $menuBtn.add($dropdown).on("mouseleave", function () {
      $dropdown.stop(true, true).slideUp(400);
    });
  }

  // Handle click for mobile
  $menuBtn.on("click", function (e) {
    // e.preventDefault();
    $dropdown.stop(true, true).slideToggle(200);
  });

  // Close dropdown when clicking outside on mobile
  $(document).on("click", function (e) {
    if (
      isMobile &&
      !$(e.target).closest(".mobile-menu-btn, .option-dropdown-wrapper").length
    ) {
      $dropdown.slideUp(200);
    }
  });

  // Close dropdown on scroll for mobile
  $(window).on("scroll", function () {
    if (isMobile && $dropdown.is(":visible")) {
      clearTimeout(scrollTimeout);
      scrollTimeout = setTimeout(function () {
        $dropdown.slideUp(50);
      }, 100); // Small delay to prevent flickering
    }
  });
});

// Add keyboard shortcut for sidebar toggle
document.addEventListener("keydown", function (e) {
  // Check for Ctrl + B (keyCode 66)
  if (e.ctrlKey && e.keyCode === 66) {
    e.preventDefault(); // Prevent default browser behavior
    const $dropdown = $(".option-dropdown-wrapper");
    $dropdown.stop(true, true).slideToggle(200);
  }
});
