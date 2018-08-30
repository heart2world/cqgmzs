<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body     <?php if($ui['bg_type']){ ?>bgcolor<?php }else{ ?>bgpic<?php } ?>" m-id='<?php echo $ui['mid'];?>'>
	<div class="container">
		<h2 class="m-t-0 text-xs-center font-weight-300 invisible" data-plugin="appear" data-animate="slide-top" data-repeat="false"><?php echo $ui['index_news_title'];?></h2>
		<p class="desc m-b-0 text-xs-center font-weight-300 invisible" data-plugin="appear" data-animate="fade" data-repeat="false"><?php echo $ui['index_news_desc'];?></p>
		<ul class="blocks-2 index-news-list imagesize" data-scale='1'>
			<?php
    $cid=$ui['index_news_id'];

    $num = $ui['index_news_num'];
    $module = "";
    $type = $ui['index_news_type'];
    $order = 'no_order asc';
    $para = "";
    if(!$module){
        if(!$cid){
            $value = $m['classnow'];
        }else{
            $value = $cid;
        }
    }else{
        $value = $module;
    }

    $result = load::sys_class('label', 'new')->get('tag')->get_list($value, $num, $type, $order, $para);
    $sub = count($result);
    foreach($result as $index=>$v):
        $id = $v['id'];
        $v['sub'] = $sub;
        $v['_index']= $index;
        $v['_first']= $index==0 ? true:false;
        $v['_last']=$index==(count($result)-1)?true:false;
        $$v = $v;
?>
			<li class="invisible     <?php if($ui[shadow]){ ?>shadow<?php } ?>" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
				<div class="media media-lg">
					    <?php if($ui['img_ok']){ ?>
						<div>
							<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>
								<img class="media-object" data-original="<?php echo thumb($v['imgurl'],$ui['img_w'],$ui['img_h']);?>" alt="<?php echo $v['title'];?>" ></a>
						</div>
					<?php } ?>
					<div class="media-body">
						<h4 class="media-heading m-b-10">
							<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a>
						</h4>
						<p class="des m-b-5 font-weight-300"><?php echo met_substr($v['description'],0,$ui['desc_num']);?>...</p>
					</div>
					<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?> class="details">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
</div>