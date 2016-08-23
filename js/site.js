$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

$(function() {
    /* find all a.read_more elements and bind the following code to them */
    $('a.read_more').click(function(event){

        event.preventDefault(); /* prevent the a from changing the url */
        $(this).parents('.item').find('.more_text').show(); /* show the .more_text span */
        $(this).hide();
    });
    /* find all a.read_less elements and bind the following code to them */
    $('a.read_less').click(function(event){

        event.preventDefault(); /* prevent the a from changing the url */
        $(this).parents('.item').find('.more_text').hide(); /* hide the .more_text span */
        $(this).parents('.item').find('.read_more').show();
    });

    //jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500);
        event.preventDefault();
    });

    // scrolling for thumbnail strip
    $('a.thumbnail_left').bind('click', function(event) {
        $(this).parent('.thumbnail_strip').find('.thumbnail_content').animate({
            scrollLeft: '-=250px'
        });
    });
    $('a.thumbnail_right').bind('click', function(event) {
        $(this).parent('.thumbnail_strip').find('.thumbnail_content').animate({
            scrollLeft: '+=250px'
        });
    });
});
