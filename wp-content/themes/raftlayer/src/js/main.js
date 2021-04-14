$(document ).ready(function() {
    if ($('.products-filter').length){
        $('.products-filter select').selectric();
        $('.orderby').selectric();
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
            navigation: {
                nextEl: '.main-category__next',
                prevEl: '.main-category__prev',
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






