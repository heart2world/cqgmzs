METUI_FUN['$uicss'] = {
    name: '$uicss',
    init: function() {
        var list = METUI['$uicss'].find('.service-list');
        var imglist= METUI['$uicss'].find('.imglist');
        var listlength=METUI['$uicss'].find('.imgitem').length;
        if (list.length) {
            list.slick({
                autoplay: true,
                autoplaySpeed: 3000,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                asNavFor: imglist,
                fade:true,
                cssEase: 'linear',
                arrows:false,
            })

            imglist.slick({
              dots: false,
              slidesToScroll: 1,
              slidesToShow: listlength,
              asNavFor: list,
              dots: true,
              arrows:false,
              focusOnSelect: true,
              focusOnSelect: true,
            });
        }

    },
    bg: function() {
        $('[data-bg]').each(function(index, el) {
            var background = $(this).attr('data-bg'),
                hex = background.split('|')[0],
                opacity = background.split('|')[1],
                bgcolor = rgb2color(hex, opacity);
            $(this).css('background', bgcolor);
        });

        function rgb2color(hex, opacity) {
            var reg = /^#([0-9a-fA-f]{3}|[0-9a-fA-f]{6})$/;
            var c = hex.toLowerCase();
            if (c && reg.test(c)) {
                if (c.length === 4) {
                    var a = '#';
                    for (var i = 1; i < 4; i++) {
                        a += c.slice(i, i + 1).concat(c.slice(i, i + 1));
                    }
                    c = a;
                }
                var b = [];
                for (var i = 1; i < 7; i += 2) {
                    b.push(parseInt('0x' + c.slice(i, i + 2)));
                }
                return "rgba(" + b.join(',') + ',' + opacity + ')';
            } else {
                return c
            }

        }
    },
    appear: function() {
        if (METUI['$uicss'].length) {
            var repeat = false;
           function animation() {
                if (repeat == false) {
                    var title = METUI['$uicss'].find('.title'),
                        subtitle = METUI['$uicss'].find('.subtitle'),
                        desc = METUI['$uicss'].find('.desc'),
                        a = TweenMax.to(title, 0.6, {
                            autoAlpha: 1,
                            y: 0,
                            ease: Power3.ease,
                        }),
                        b = TweenMax.to(subtitle, 0.6, {
                            autoAlpha: 1,
                            y: 0,
                            ease: Power3.ease,
                        }),
                        c = TweenMax.to(desc, 0.6, {
                            autoAlpha: 1,
                            y: 0,
                            ease: Power3.ease,
                        });
                    var headAnimate = new TimelineMax();
                    headAnimate.add(a).add(c);
                    var item = METUI['$uicss'].find('.item');
                    var i = TweenMax.staggerTo(item, 0.6, {
                        autoAlpha: 1,
                        y: 0,
                        ease: Power3.ease,
                    }, 0.1);
                }
            }
            var controller = new ScrollMagic.Controller();
            var scene = new ScrollMagic.Scene({
                triggerElement: '.$uicss',
                offset: -300
            }).addTo(controller);
            scene.on("enter", function(event) {
                animation();
                repeat = true;
            });
            $(window).resize(function() {
                repeat = false;
                animation();
            })



        }

    }
};
var x = new metui(METUI_FUN['$uicss']);