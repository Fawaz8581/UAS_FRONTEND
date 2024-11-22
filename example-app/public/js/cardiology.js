$(document).ready(function() {
    // Scroll progress indicator
    $(window).on('scroll', function() {
        var scrollTop = $(this).scrollTop();
        var documentHeight = $(document).height();
        var windowHeight = $(window).height();
        var progress = (scrollTop / (documentHeight - windowHeight)) * 100;

        $('.scroll-progress').css('width', progress + '%');
    });
});
