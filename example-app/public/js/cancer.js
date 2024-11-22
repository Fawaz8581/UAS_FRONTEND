var swiper = new Swiper('.services-slider', {
    slidesPerView: 1, // Untuk memastikan gambar tetap di area konten
    spaceBetween: 0, // Menghilangkan jarak antar slide
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
            slidesPerView: 1, // Tampil 1 slide di atas layar medium
        },
        576: {
            slidesPerView: 1, // Tampil 1 slide di layar kecil
        },
    },
 });
 