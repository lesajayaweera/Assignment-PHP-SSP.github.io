const accessKey = 'AQbzvmm7dPvzLB7QK2_Ws1ScYarbOYR4i09aVtUpoYw';
const query = 'people';



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

window.addEventListener('DOMContentLoaded', function () {
    const images=document.getElementById("images");
    console.log(images);
    const children=this.document.querySelectorAll("#images img");
    
    fetch(`https://api.unsplash.com/search/photos?query=${query}&client_id=${accessKey}`)
  .then(response => response.json())
  .then(data => {
    console.log(data.results); // Contains array of image objects
  })
  .catch(error => console.error('Error:', error));

  for (let i = 0; i < children.length; i++) {
    const img = children[i];
    const imageUrl = data.results[0].urls.regular;
    console.log(imageUrl);
    
    img.src = imageUrl;
  }
    console.log(children);
    
    
})
      
        