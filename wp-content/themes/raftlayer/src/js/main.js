$(document ).ready(function() {
    if ($('.burger__button').length){
        $('.burger__button').on('click', function(){
            $('.header__mobile-menu').fadeToggle(300);
            $('.header__mobile-fade').fadeToggle(300);
            $('body').toggleClass('body-lock');
        });
    }
    if ($('.products-filter').length){
        $('.products-filter select').selectric();
        $('.orderby').selectric();
    }

    if ($('.new-product .custom-slider-loop').length){
        var NewSlider = new Swiper('.new-product .custom-slider-loop', {
            slidesPerView: 4,
            spaceBetween: 19,
            observer: true,
            observeParents: true,
            lazy: true,
            centeredSlides: false,
            breakpoints: {
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3.5,
                    spaceBetween: 20,
                },
                500: {
                    slidesPerView: 2.6,
                    spaceBetween: 20,
                },
                440: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                240: {
                    slidesPerView: 1.4,
                    spaceBetween: 10,
                },

            }
        });
    }

    if ($('.best-product .custom-slider-loop').length){
        var BestSlider = new Swiper('.best-product .custom-slider-loop', {
            slidesPerView: 4,
            spaceBetween: 19,
            observer: true,
            observeParents: true,
            lazy: true,
            centeredSlides: false,
            breakpoints: {
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3.5,
                    spaceBetween: 20,
                },
                500: {
                    slidesPerView: 2.6,
                    spaceBetween: 20,
                },
                440: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                240: {
                    slidesPerView: 1.4,
                    spaceBetween: 10,
                },

            }
        });
    }

    if ($('.video-block__container').length){
        var VideoSlider = new Swiper('.video-block__container', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            lazy: true,
            navigation: {
                nextEl: '.about__video-block .next',
                prevEl: '.about__video-block .prev',
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 20,
                },
                500: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                440: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
                240: {
                    slidesPerView: 1.2,
                    spaceBetween: 20,
                },

            }
        });
    }

    if ($('.sertificate-block__container').length){
        var SertSlider = new Swiper('.sertificate-block__container', {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: false,
            lazy: true,
            navigation: {
                nextEl: '.about__sertificate-block .next',
                prevEl: '.about__sertificate-block .prev',
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 20,
                },
                500: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                440: {
                    slidesPerView: 1.5,
                    spaceBetween: 20,
                },
                240: {
                    slidesPerView: 1.2,
                    spaceBetween: 20,
                },

            }
        });
    }

    if ($('.faq__content').length){
        $('.faq__content .faq__triger').on('click', function(){
            $(this).closest('.faq__item').toggleClass('active');
            $(this).closest('.faq__item').find('.faq__answer').fadeToggle(300);
        });
    }

    if ($('.woocommerce-checkout').length){
        $('#billing_last_name_field').appendTo('.checkout__person');
        $('#billing_first_name_field').appendTo('.checkout__person');
        $('#billing_email_field').appendTo('.checkout__person');
        $('#billing_phone_field').appendTo('.checkout__person');
        $('#shipping_method').appendTo('.checkout__dostavka-select');
        $('#billing_city_field').appendTo('.checkout__dostavka-select');
        $('#billing_address_1_field').appendTo('.checkout__dostavka-select');
        $('#house_field').appendTo('.checkout__dostavka-select');
        $('#flat_field').appendTo('.checkout__dostavka-select');
        $('#payment').appendTo('.checkout__pay-select');
        $('#order_review').appendTo('.checkout__right-column');
        $('.col2-set').appendTo('.checkout__pay-select');
        $('#place_order').appendTo('.checkout__footer-btn');

    }

    // $(".products-filter").bind("DOMSubtreeModified", function() {
    //     $('.products-filter select').selectric();
    // });


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
            centeredSlides: false,
            navigation: {
                nextEl: '.main-category__next',
                prevEl: '.main-category__prev',
            },
            breakpoints: {
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3.5,
                    spaceBetween: 20,
                },
                500: {
                    slidesPerView: 2.6,
                    spaceBetween: 20,
                },
                440: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                240: {
                    slidesPerView: 1.4,
                    spaceBetween: 10,
                },

            }
        });
    }

    if (  jQuery(window).width() >= 1100 ) {
        var FirstCoord = 53.925701;
        var SecondCoord = 30.341069;

        var CenterFirstCoord = 53.925678;
        var CenterSecondCoord = 30.338758;
    } else {
        var FirstCoord = 53.925701;
        var SecondCoord = 30.341069;

        var CenterFirstCoord = FirstCoord;
        var CenterSecondCoord = SecondCoord;
    }
    ymaps.ready(function () {
        var IconUrl = $('.uni-footer__map').data('icon');
        var myMap = new ymaps.Map('map', {
                center: [CenterFirstCoord, CenterSecondCoord],
                controls: [],
                zoom: 18
            }, {
                searchControlProvider: true
            }),

            // Создаём макет содержимого.
            MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            ),

            myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            }, {
                // Опции.
                // Необходимо указать данный тип макета.
                // Своё изображение иконки метки.
                iconImageHref: "",
                // Размеры метки.
                iconImageSize: [0, 0],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
            }),
            myPlacemarkWithContent = new ymaps.Placemark([FirstCoord, SecondCoord], {
            }, {
                // Опции.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#imageWithContent',
                // Своё изображение иконки метки.
                iconImageHref: IconUrl,
                // Размеры метки.
                iconImageSize: [72, 87],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-40, -90],
                // Смещение слоя с содержимым относительно слоя с картинкой.
                iconContentOffset: [15, 15],
                // Макет содержимого.
                iconContentLayout: MyIconContentLayout
            });

        myMap.geoObjects
            // .add(myPlacemark)
            .add(myPlacemarkWithContent);
    });

    function QuantityNum(){
        if ($('.quantity').length){

            $( '.quantity' ).each(function( index ) {
                var col = $(this).find('input');
                var plus = $(this).find('.quantity-arrow-plus');
                var minus = $(this).find('.quantity-arrow-minus');
                var total = col.val();
                plus.click(function() {
                    total++;
                    col.val(total);
                    $('button.button').removeAttr("disabled");
                    if (total > 0){
                        minus.removeClass('disable');
                    }
                    col.attr('value', total);
                    $( '[name="update_cart"]' ).trigger( 'click' );
                    $( '[name="update_wishlist"]' ).trigger( 'click' );
                });
                minus.click(function() {
                    total--;
                    col.val(total);
                    $('button.button').removeAttr("disabled");
                    if (total <= 0){
                        minus.addClass('disable');
                    } else {
                        minus.removeClass('disable');
                    }
                    col.attr('value', total);
                    $( '[name="update_cart"]' ).trigger( 'click' );
                    $( '[name="update_wishlist"]' ).trigger( 'click' );
                });
            });
        }

    }
    QuantityNum();
    $("body").bind("DOMSubtreeModified", function() {
        QuantityNum();
    });

});






