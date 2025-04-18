

const scrollContainer = document.querySelector('.overflow-x-auto');

function scrollLeft() {
    scrollContainer.scrollBy({ left: -300, behavior: 'smooth' });
}

function scrollRight() {
    scrollContainer.scrollBy({ left: 300, behavior: 'smooth' });
}


window.addEventListener('DOMContentLoaded', () => {
    const leftBtn = document.querySelector('#left');
    const rightBtn = document.querySelector('#right');
    console.log(leftBtn);


    leftBtn.addEventListener('click', scrollLeft);
    rightBtn.addEventListener('click', scrollRight);

});