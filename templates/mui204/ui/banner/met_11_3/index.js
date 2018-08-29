METUI_FUN['$uicss'] = {
    name: '$uicss',
    init: function() {
        if (METUI['$uicss'].length) {
            var img = METUI['$uicss'].find('.cover-image').eq(0),
        slide = METUI['$uicss'].find('.slick-slide');
        if(img.length>0){
            bh = img.data('height').split('|'),
            fade = img.data('fade'),
            autoplaySpeed = img.data('autoplayspeed'),
            speed = img.data('speed');
            img.imageloadFun(function() {
                for (var i = 0; i < bh.length; i++) {
                    if (bh[i] == 0) {
                        bh[i] = 'auto';
                    }
                }
                Breakpoints.on('md lg', {
                    enter: function() {
                        METUI['$uicss'].find('.cover-image').height(bh[0]);
                    }
                })
                Breakpoints.on('sm', {
                    enter: function() {
                        METUI['$uicss'].find('.cover-image').height(bh[1]);
                    }
                })
                Breakpoints.on('xs', {
                    enter: function() {
                        METUI['$uicss'].find('.cover-image').height(bh[2]);
                    }
                })

                var swipe = slick_arrows = true;
                if (device_type == 'd' && !Breakpoints.is('xs')) swipe = false;
                if (Breakpoints.is('xs')) slick_arrows = false;
                if (slide.length > 1) {
                    METUI['$uicss'].slick({
                        autoplay: true,
                        autoplaySpeed: autoplaySpeed,
                        pauseOnHover: false,
                        swipe: swipe,
                        prevArrow: '<a class="slick-prev" ><i></i></a>',
                        nextArrow: '<a class="slick-next"><i></i></a>',
                        lazyloadPrevNext: true,
                        dots: false,
                        fade: fade,
                        adaptiveHeight: true,
                        cssEase: 'ease',
                        speed: speed
                    }).on('setPosition', function(event, slick) {
                    METUI['$uicss'].find('.cover-image').css('display', 'block');
                    $('.$uicss .slick-slide .banner-text').hide();
                    $('.$uicss .slick-slide.slick-active .banner-text').show();
                    });

                }
            })
        }
        }
    }
};
var banner = metui(METUI_FUN['$uicss']);