



let activeIndex = 0;
function toggleFAQ(index) {
    const currentAnswer = document.getElementById(`answer-${index}`);
    const currentIcon = document.getElementById(`icon-${index}`);

    if (currentAnswer.classList.contains("hidden")) {
      // Hide previously opened
      if (activeIndex !== index) {
        document.getElementById(`answer-${activeIndex}`).classList.add("hidden");
        document.getElementById(`icon-${activeIndex}`).textContent = "+";
      }

      currentAnswer.classList.remove("hidden");
      currentIcon.textContent = "−";
      activeIndex = index;
    } else {
      currentAnswer.classList.add("hidden");
      currentIcon.textContent = "+";
    }
}


window.addEventListener('DOMContentLoaded', () => {
  const btn = document.getElementById('show-more-btn');
const hiddenElements = document.querySelectorAll("#brand-list .hidden");

let isExpanded = false;

function toggleItems() {
  hiddenElements.forEach((item) => {
    item.classList.toggle("hidden");
  });

  isExpanded = !isExpanded;
  btn.textContent = isExpanded ? "Show Less ↑" : "Show All Brands →";
}

btn.addEventListener('click', toggleItems);


})
      
        