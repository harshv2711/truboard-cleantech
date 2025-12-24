// SVG Animation Handler
document.addEventListener("DOMContentLoaded", function () {
  // Add animation class to SVG elements
  const svgElements = document.querySelectorAll(".svg-animate");

  // Intersection Observer for animation
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animate");
        }
      });
    },
    {
      threshold: 0.1,
    }
  );

  // Observe all SVG elements
  svgElements.forEach((el) => observer.observe(el));

  // Location card hover behavior
  const locationGroups = document.querySelectorAll(".location-group");

  locationGroups.forEach((group) => {
    const card = group.querySelector(".location-card");

    // Show card on hover
    group.addEventListener("mouseenter", () => {
      card.style.opacity = "1";
      card.style.visibility = "visible";
    });

    // Hide card when mouse leaves both the group and the card
    group.addEventListener("mouseleave", (e) => {
      // Check if the mouse is over the card
      const toElement = e.relatedTarget;
      if (!card.contains(toElement)) {
        card.style.opacity = "0";
        card.style.visibility = "hidden";
      }
    });

    // Keep card visible when hovering over it
    card.addEventListener("mouseenter", () => {
      card.style.opacity = "1";
      card.style.visibility = "visible";
    });

    // Hide card when mouse leaves it
    card.addEventListener("mouseleave", () => {
      card.style.opacity = "0";
      card.style.visibility = "hidden";
    });
  });
});
