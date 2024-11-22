burger=document.querySelector('.burger')
navbarItems=document.querySelector('.navbar-items')
nav=document.querySelector('.nav')

burger.addEventListener('click',()=>{
   navbarItems.classList.toggle('h-class')
   nav.classList.toggle('v-class')
})

document.querySelector('.close-btn').onclick = function() {
    document.getElementById('welcome-popup').style.display = 'none'; 
};


window.onclick = function(event) {
    const popup = document.getElementById('welcome-popup');
    if (event.target === popup) {
        popup.style.display = 'none'; 
    }
};


var swiper = new Swiper('.services-slider', {
   slidesPerView: 3, 
   spaceBetween: 30, 
   loop: true, 
   autoplay: {
       delay: 3000, 
       disableOnInteraction: false, 
   },
   pagination: {
       el: '.swiper-pagination',
       clickable: true,
       dynamicBullets: true, 
       dynamicMainBullets: 3, 
   },
   navigation: { 
       nextEl: '.swiper-button-next',
       prevEl: '.swiper-button-prev',
   },
   breakpoints: {
       768: {
           slidesPerView: 3, 
       },
       576: {
           slidesPerView: 1, 
       },
   },
});

$(document).ready(function() {

    $('.blog-box').click(function() {
        alert('Dibuat oleh Nicolas Matthew Wijaya, William Immanuel Lee, dan Fawaz.');
    });
});


window.onload = function() {
    document.getElementById('welcome-popup').style.display = 'flex'; 
};

