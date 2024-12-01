// Toggle navbar classes for responsive menu
document.querySelector('.burger').addEventListener('click', () => {
    const navbarItems = document.querySelector('.navbar-items');
    const nav = document.querySelector('.nav');
    navbarItems.classList.toggle('h-class');
    nav.classList.toggle('v-class');
});

// Close popup functionality
const closePopupButton = document.querySelector('.close-btn');
if (closePopupButton) {
    closePopupButton.onclick = () => {
        const welcomePopup = document.getElementById('welcome-popup');
        if (welcomePopup) {
            welcomePopup.style.display = 'none';
        }
    };
}

// Close popup when clicking outside of it
window.addEventListener('click', (event) => {
    const popup = document.getElementById('welcome-popup');
    if (popup && event.target === popup) {
        popup.style.display = 'none';
    }
});

// Swiper slider initialization
if (document.querySelector('.services-slider')) {
    new Swiper('.services-slider', {
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
}

// Blog box click alert
$(document).ready(() => {
    $('.blog-box').on('click', () => {
        alert('Dibuat oleh Nicolas Matthew Wijaya, William Immanuel Lee, dan Fawaz.');
    });
});

// Show welcome popup on page load
window.addEventListener('load', () => {
    const welcomePopup = document.getElementById('welcome-popup');
    if (welcomePopup) {
        welcomePopup.style.display = 'flex';
    }
});

// AngularJS initialization for consultation
angular.module('consultationApp', []).controller('ConsultationController', ($scope) => {
    // Add AngularJS logic or data-binding if needed
    $scope.message = 'Welcome to Consultation!';
});
