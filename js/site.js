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
});
