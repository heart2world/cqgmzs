METUI_FUN['$uicss'] = {
    name:'$uicss',
    appear:function (){
        // 首页首屏内动画预加载
        var indexappear=$('.met-index-body:eq(0) [data-plugin=appear]');
        if(indexappear.length){
            indexappear.scrollFun(function(val){
                val.appearDiy();
            });
        }
        $(".$uicss .txt-box").width($(".$uicss .container").width());
        // var mySwiper = new Swiper('.swiper-container', {
        //     slidesPerView :4,
        //     slidesPerGroup :1,
        //     breakpoints: {
        //         1600:{
        //             slidesPerView :4,
        //             slidesPerGroup :1
        //         },
        //         1024: {
        //             slidesPerView :3,
        //             slidesPerGroup :1
        //         },
        //         767:{
        //             slidesPerView :2,
        //             slidesPerGroup :1
        //         }
        //     }
        // })
    }
};
var x = new metui(METUI_FUN['$uicss']);
