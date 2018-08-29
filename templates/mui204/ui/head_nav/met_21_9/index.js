/*!
 * M['weburl']      网站网址
 * M['lang']        网站语言
 * M['tem']         模板目录路径
 * M['classnow']    当前栏目ID
 * M['id']          当前页面ID
 * M['module']      当前页面所属模块
 * default_placeholder 开发者自定义默认图片延迟加载方式，'base64'：灰色背景；自定义背景图片路径；'blur'：图片高斯模糊；默认为'blur'
 * met_prevarrow,met_nextarrow slick插件翻页按钮自定义html
 * device_type       客户端判断（d：PC端，t：平板端，m：手机端）
 */
METUI_FUN['$uicss'] = {
    name:'$uicss',
    init: function() {
        $("body.head-top-ok").css({
            paddingTop:$(".$uicss .met-head").height()+"px"
        });
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;
            var links = this.el.find('.link');
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }
        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el;
                $this = $(this),
                $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            };
        }
        var accordion = new Accordion($('.$uicss .accordion'), false);

        var wh=$(window).height(),
        $met_navlist=METUI['$uicss'].find('.navlist');
        var $met_navlist_dropdown=$met_navlist.find('.dropdown'),dropdownMaxh=function(dom){
                        if(!dom.hasClass('oya')){
                            setTimeout(function(){
                                var mh=wh-dom.position().top;
                                if(dom.outerHeight()>mh) dom.outerHeight(mh).addClass('oya scrollbar-beautify').find('.dropdown-menu').addClass('block box-shadow-none').prev('.dropdown-item').addClass('dropdown-a');
                            },0)
                        }
                    };
        //鼠标经过展开下拉菜单
        $met_navlist_dropdown.find('>.dropdown-toggle[data-hover]').parent('.dropdown').mouseover(function() {
            dropdownMaxh($('>.dropdown-menu',this));
        });
        // 鼠标点击展开下拉菜单
        $met_navlist_dropdown.find('>.dropdown-toggle:not([data-hover])').one('click',function() {
            dropdownMaxh($(this).next('.dropdown-menu'));
        });

        $(".$uicss .submenu>li").on('click',function(event) {
            if($(this).hasClass("open-li")){
                $(this).removeClass('open-li');
                console.log(1);
            }else{
                console.log(0);
                $(this).addClass('open-li').siblings('li').removeClass('open-li');
            }
            $(this).children('.links').children('ul').slideToggle("slow").parent('.links').parent('li').siblings('li').children('.links').children('ul').slideUp("slow");
        });
        AddFavorite = function (title, url) {
              try {
                  window.external.addFavorite(url, title);
              }
            catch(e){
                 try{ window.sidebar.addPanel(title, url, ""); }
                 catch(e){
                     alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
                 }
              }
            }
            addSlick = function(ele){
            $(ele).slick({
                autoplay: true,
                dots: true,
                autoplaySpeed: 2300,
                pauseOnHover: false,
                lazyloadPrevNext: true,
                arrows:false
            })
        }
        addSlick('.nav-theme-img');
        var $metnav_lang=METUI['$uicss'].find('.met-langlist');
        if($metnav_lang.length){
            // 语言栏弹窗模式处理
            $(document).on('show.bs.modal', '#met-langlist-modal', function(event) {
                $('.met-nav').addClass('header-zindex');
            });
            $(document).on('hidden.bs.modal', '#met-langlist-modal', function(event) {
                $('.met-nav').removeClass('header-zindex');
            });
        }
        $met_navlist=METUI['$uicss'].find('.navlist');
        $met_navlist.find('.nav-link').click(function(){
                if(device_type=='d' && !Breakpoints.is('xs') && $(this).data("hover")){
                    if($(this).attr('target')=='_blank'){
                        window.open($(this).attr('href'));
                    }else{
                        location=$(this).attr('href');
                    }
                }
            });


    },
    cntotc:function(){

            //简体繁体互换
        var b=METUI['$uicss'].find('.btn-cntotc');
        b.on('click', function(event) {
             var lang=$(this).attr('data-tolang');
         if (lang=='tc') {
            $('body').s2t();
            $(this).attr('data-tolang', 'cn');
            $(this).text('简体');
         } else if(lang=='cn') {
            $('body').t2s();
            $(this).attr('data-tolang', 'tc');
            $(this).text('繁體');
         }
      });
    }
};
var x = new metui(METUI_FUN['$uicss']);