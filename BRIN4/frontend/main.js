/**
 * Created by Evgeniy on 03.05.2017.
 */
$('#video').find('img').click(function () {
    let iframe = document.querySelector('.video-frame iframe');
    iframe.src = 'https://www.youtube.com/embed/uzQKNBf3v_Q?autoplay=1';
    $(this).css('display', 'none');
});
$('.more-reviews').click(function () {
    $('.hide-reviews').animate({'height': 'toggle'}, 1000);
});
$('.more-text-toggle').click(function () {
   $(this.parentNode.parentNode).find('div.more-text').animate({'height': 'toggle'}, 500);
});

$('.modal').modal();