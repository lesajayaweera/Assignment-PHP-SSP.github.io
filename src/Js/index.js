// Add event listner that waits for the DOM to be fully loaded before executing the function
window.addEventListener('DOMContentLoaded', function () {

    const header = document.getElementById('header');
   
    let lastScrollY = window.scrollY;
    

    // Add initial Tailwind classes via JS
    header.classList.add(
        'fixed', 'top-0', 'left-0', 'right-0', 'z-20',
        'transition-all', 'duration-300', 'ease-in-out', 'opacity-100', 'translate-y-0'
    );

    window.addEventListener('scroll', function () {
        if (window.scrollY > lastScrollY) {
            // Scrolling down → hide header
            header.classList.add('opacity-0', '-translate-y-full');
            header.classList.remove('opacity-100', 'translate-y-0');
        } else {
            // Scrolling up → show header
            header.classList.remove('opacity-0', '-translate-y-full');
            header.classList.add('opacity-100', 'translate-y-0');
        }

        lastScrollY = window.scrollY;


    });

    
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('nav');
  
    hamburger.addEventListener('click', function () {
      nav.classList.toggle('hidden');
    });

  

    let currentYear = new Date().getFullYear();

    document.getElementById("year").innerText = `\u00A9 ${currentYear} LuxCars.com. All rights reserved.`;
});

