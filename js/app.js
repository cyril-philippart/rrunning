jQuery(document).ready(function(){
    jQuery('.slider_featured_product').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        draggable: false,
        nextArrow: '<img class="slick-next slick-arrow" src="/wp-content/uploads/2023/04/chevron_right.svg" alt="">',
        prevArrow: '<img class="slick-prev slick-arrow" src="/wp-content/uploads/2023/04/chevron_left.svg" alt="">',
        responsive: [
        {
            breakpoint: 768,
            settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
            }
        }
        ]
    });
    jQuery('.slider_last_product').slick({
        draggable: false,
        nextArrow: '<img class="slick-next slick-arrow" src="/wp-content/uploads/2023/04/right_orange.svg" alt="">',
        prevArrow: '<img class="slick-prev slick-arrow" src="/wp-content/uploads/2023/04/left_orange.svg" alt="">',
        dots: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                }
            }]
    });
})