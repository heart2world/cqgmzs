METUI_FUN['$uicss']={
	name:'$uicss',
	init:function(){

		var a_hei=$('.$uicss .project-detail .project figcaption a p').height();
		var h3_hei=$('.$uicss .project-detail .project figcaption a h3').height();
		var image_hei=$('.$uicss .project-detail figure').height();
		var fig=(image_hei-(a_hei+h3_hei)-10)/2;
		console.log(fig);
		$('.$uicss .project-detail .project figcaption a p').css('margin',''+fig+'px 0 0 0');
	
		METUI['$uicss'].find(".project-detail").slick({
			slidesToShow: 1,
			arrows: false,
			asNavFor: '.project-strip',
			dots: false,
			autoplay: false,
			autoplaySpeed: 3000
		});

		METUI['$uicss'].find(".project-strip").slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			arrows: false,
			asNavFor: '.project-detail',
			dots: false,
			infinite: true,
			centerMode: true,
			focusOnSelect: true
		});
		var img_height=$('.$uicss .project-screen').height();
		var index_img_height=$('.$uicss #defaultheight').height();
		var result_height=(img_height-index_img_height)/2;
		

		var margin_height=$('.$uicss .project-strip img').height();
		var last_heigh=index_img_height-margin_height;
		$('.$uicss .project-carousel').height(index_img_height);
		//$('.$uicss .project-carousel').css('min-height',index_img_height);
		//$('.$uicss .project-carousel').css('position','static');

		$('.$uicss .slick-list').css('top',last_heigh/2);

		var strip_height=$('.$uicss .project-strip').height();
		var slick_list_height=(strip_height/2)-strip_height-10;


		var result=(strip_height-margin_height)/2;
		

		var slick_css_height=$('.$uicss .slick-list').css('top');
		if(slick_css_height==last_heigh/2)
		{

			var img_top=index_img_height-(result*2);
			$('.$uicss .project-screen .project-detail').css('margin','-'+result+'px auto 0');
			return;
		}
		else
		{
			$('.$uicss .project-screen .project-detail').css('margin','-'+result+'px auto 0');
		}

		var color = METUI['$uicss'].find('.project-detail .project figcaption').attr("data-background");
        var opacity = METUI['$uicss'].find('.project-detail .project figcaption').attr("data-opacity");
            function rgb2color(hex, opacity) {
                if(hex){
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
                        return "rgba(" + b.join(',') + ','+opacity + ')';
                    } else {
                        return c
                    }
                }
            }
            var bgcolor = rgb2color(color,opacity);
            METUI['$uicss'].find('.project-detail .project figcaption').css("background",bgcolor);

	}
};
var x=new metui(METUI_FUN['$uicss']);