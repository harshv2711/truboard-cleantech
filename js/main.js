// Function to detect iPhone devices
function isIPhone() {
  return /iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
}

// Function to apply iPhone specific styles
function applyIPhoneStyles() {
  if (isIPhone()) {
    document.body.classList.add("is-iphone");

    // Apply styles to track record section
    const trackRecordSection = document.querySelector(
      ".our-track-record-section"
    );
    if (trackRecordSection) {
      trackRecordSection.style.bottom = "-300px";
    }

    // Apply styles to trusted by section
    const trustedBySection = document.querySelector(".trusted-by-section");
    if (trustedBySection) {
      trustedBySection.style.marginTop = "400px";
    }
  }
}

// Call the function when DOM is loaded
document.addEventListener("DOMContentLoaded", applyIPhoneStyles);
