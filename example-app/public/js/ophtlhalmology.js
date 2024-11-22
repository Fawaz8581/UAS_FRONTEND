$(document).ready(function() {
    // Tooltip creation for interactive tooth diagram
    $('.interactive-tooth').on('mouseenter', function(event) {
        // Create tooltip element
        var tooltip = $('<div class="tooltip"><span></span></div>');
        var tooltipText = $(this).attr('data-tooltip');
        
        tooltip.find('span').text(tooltipText);
        $('body').append(tooltip);
        
        // Position the tooltip near the mouse
        var tooltipWidth = tooltip.outerWidth();  
        var tooltipHeight = tooltip.outerHeight(); 

        tooltip.css({
            top: event.pageY - (tooltipHeight / 2) + 'px',  
            left: event.pageX - (tooltipWidth / 2) + 'px',  
            opacity: 0
        }).animate({
            opacity: 1
        }, 300);  // Smooth fade-in effect

        var span = tooltip.find('span');
        var containerWidth = tooltip.width();
        var textWidth = span.width();
        
        function startMarquee() {

            span.css({
                left: containerWidth + 'px'
            });
            
            // Animate the text to move it to the left
            span.animate({
                left: -textWidth + 'px'  
            }, 8000, 'linear', function() {  
                startMarquee();  
            });
        }
        
        startMarquee(); 
    });

    $('.interactive-tooth').on('mousemove', function(event) {
        var tooltip = $('.tooltip');
        var tooltipWidth = tooltip.outerWidth();
        var tooltipHeight = tooltip.outerHeight();

        tooltip.css({
            top: event.pageY - (tooltipHeight / 2) + 'px',
            left: event.pageX - (tooltipWidth / 2) + 'px'
        });
    });

    $('.interactive-tooth').on('mouseleave', function() {
        $('.tooltip').animate({
            opacity: 0,
            top: '-=10'
        }, 200, function() {
            $(this).remove();
        });
    });
});


// test

$(document).ready(function() {
    // Tooltip interaktif
    $('.interactive-tooth').hover(function() {
        var tooltipText = $(this).data('tooltip');
        $('<div class="tooltip"></div>')
            .text(tooltipText)
            .appendTo('body')
            .css({
                top: $(this).offset().top - 10,
                left: $(this).offset().left + $(this).width() / 2 - 30
            })
            .fadeIn();
    }, function() {
        $('.tooltip').remove();
    });

    // Animasi saat scroll
    $(window).scroll(function() {
        $('.heading').each(function() {
            var scrollTop = $(window).scrollTop();
            var elementOffset = $(this).offset().top;
            var distance = elementOffset - scrollTop;

            if (distance < $(window).height() - 100 && distance > -100) {
                $(this).addClass('fade-in');
            }
        });
    });

    // Efek hover pada tombol
    $('.btn').hover(function() {
        $(this).css('background', '#ffffff').css('color', '#1a92bedb');
    }, function() {
        $(this).css('background', '#1a92bedb').css('color', '#ffffff');
    });
});

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
    breakpoints: {
        768: {
            slidesPerView: 1, // Tampil 1 slide di atas layar medium
        },
        576: {
            slidesPerView: 1, // Tampil 1 slide di layar kecil
        },
    },
 });