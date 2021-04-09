$(document ).ready(function() {

    if ($('.main-slider__list').length){
        var MainSlider = new Swiper('.main-slider__list', {
            slidesPerView: 1,
            loop: true,
            observer: true,
            observeParents: true,
            lazy: true,
            navigation: {
                nextEl: '.main-slider__next',
                prevEl: '.main-slider__prev',
            }
        });
    }

    if ($('.main-category').length){
        var MainCategory = new Swiper('.main-category__container', {
            slidesPerView: 4,
            spaceBetween: 19,
            observer: true,
            observeParents: true,
            lazy: true,
            navigation: {
                nextEl: '.main-category__next',
                prevEl: '.main-category__prev',
            }
        });
    }

});






