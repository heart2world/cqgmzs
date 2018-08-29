<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body" m-id='<?php echo $ui['mid'];?>'>
	<div class="module mproject">
	<!--品牌系列---->
		 	<div class="brandxl">
		 		      <div class="mytitlebox">
		 		      	<?php
    $type=strtolower(trim('current'));
    $cid=$ui['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                            <?php if($ui['myself_title']){ ?>
                             <div class="mytitle"><a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class="more"><h2><?php echo $ui['myself_title'];?></h2></a></div>
                          <?php } ?>
                      <?php endforeach;?>
                              <?php if($ui['myself_desc']){ ?>
                            <div class="mydesc"><?php echo $ui['myself_desc'];?></div>
                          <?php } ?>
                    </div>
		 		<ul>
		 		  <?php
    $type=strtolower(trim('son'));
    $cid=$ui['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
		 		  	    <?php if($m['_index']<$ui['num']){ ?>
			 			<li>
			 				<div class="boss_box">
					<!-- 右边的图片 -->
							<div class="brandxl_tu_R1  wow  fadeInRight col-lg-6  col-md-6 col-sm-12 col-xs-12 invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
									<div class="big_img"><a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?>><img src="<?php echo thumb($m['columnimg'],$ui[img_x],$ui[img_y]);?>"></a></div>
								</div>
								<!-- 左边文字 -->
								<div class="brandxl_txt_L1 wow fadeInLeft col-lg-6  col-md-6 col-sm-12 col-xs-12" data-plugin="appear" data-animate="slide-left" data-repeat="false">
									<dl class="wow fadeInLeft" data-wow-delay="0.18s">
										<dt class="dt_01">
										 <?php $img=strstr($ui['boss_img'],"upload"); ?>
				 	    			            <?php if($m['indeximg']){ ?>
				 	    			          	<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?>>
											<!-- 	<img src="<?php echo $m['indeximg'];?>"> -->
												  	<img src="<?php echo $m['indeximg'];?>" alt="<?php echo $v['title'];?>" />
												</a>
				 	    			        <?php } ?>
										</dt>
									<dt class="mytitle">
										<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
									</dt>
									<dd>
										<span class="my_desc">
											<?php echo met_substr($m['description'],0,$ui['desc_num']);?>
										</span>
									</dd>
									<dd class="my_a">
										<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?> style="visibility: visible;">
											<?php echo $ui['more_btn'];?>
										</a>
									</dd>
									</dl>
								</div>
			 				</div>
						   </li>
						 <?php } ?>
					 <?php endforeach;?>
		 		</ul>
			</div>
	</div>
</div>