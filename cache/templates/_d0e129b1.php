<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body" m-id="<?php echo $ui['mid'];?>" >
	<div class="
			    <?php if($ui[is_full]==1){ ?>
				container-fiuled full
			<?php }else{ ?>
				container
			<?php } ?>
		">
		<div class="filters-wrap">
			<div class="text-center">
				<div class="area-heading text-center">
					    <?php if($ui['title']){ ?>
						<h2 class="area-title" data-plugin="appear" data-animate="slide-top" data-repeat="false"><?php echo $ui['title'];?></h2>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="project-carousel" style="overflow: hidden;">
			<div class="project-strip">
				<?php
    $cid=$ui['select'];

    $num = $ui['num'];
    $module = "";
    $type = $ui['picturecom'];
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
					<div class="project">
						<img  class="m-img" src="<?php echo thumb($v['imgurl'],$ui['img_x'],$ui['img_y']);?>"  alt="<?php echo $v['title'];?>"/>
					</div>
				<?php endforeach;?>
			</div>
			<div class="project-screen">
				<div class="project-detail">
					<?php
    $cid=$ui['select'];

    $num = $ui['num'];
    $module = "";
    $type = $ui['picturecom'];
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
						<div class="project">
							<figure style="position: relative;" id="defaultheight" class="    <?php if($ui[hover_opacity]<>0){ ?>opacity_null<?php }else{ ?>opacity_not_null<?php } ?>">
								<img class="m-img" data-height="<?php echo $ui['img_y'];?>" src="<?php echo thumb($v['imgurl'],$ui['img_x'],$ui['img_y']);?>"  alt="<?php echo $v['title'];?>" style="border: 5px solid <?php echo $ui['border_color'];?>;" />
								<?php 
									if($ui['img_hover_color']=='')
									{
										$thirdcolor=$g['thirdcolor'];
									}
									else
									{
										$thirdcolor=$ui['img_hover_color'];
									}
								 ?>
								<figcaption data-opacity="<?php echo $ui['hover_opacity'];?>" style="text-align: center;" data-background="<?php echo $thirdcolor;?>">
									<a href="<?php echo $v['url'];?>" <?php echo $g['urlnew'];?>>
										<p><?php echo $v['title'];?></p>
										<h3><?php echo $v['description'];?></h3>
									</a>
								</figcaption>
							</figure>
						</div>
					<?php endforeach;?>
				</div>
			</div>
			
		</div>
		<?php
    $type=strtolower(trim('current'));
    $cid=$ui['select'];
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
			<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class="category-section" <?php echo $m['urlnew'];?>><?php echo $ui['btn_text'];?></a>
		<?php endforeach;?>
	</div>
</div>

