METUI_FUN['$uicss'] = {
    name: '$uicss',
    init: function() {
        // 内页子栏目导航水平滚动
        var nav = METUI['$uicss'].find('.subcolumn-nav'),
            ul = METUI['$uicss'].find('ul'),
            li=ul.find('li'),
            dropdown = ul.find('.dropdown'),
            w=li.parentWidth(),
            uw=ul.width();
        if (ul.length && w>uw) {
            ul.navtabSwiper();
            if (dropdown.length) {
                nav.css('width', '100%');
                $(".swiper-navtab").addClass("overflow-visible");
            }

        }
    }
};
var x = new metui(METUI_FUN['$uicss']);