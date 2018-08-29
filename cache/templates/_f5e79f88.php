<?php defined('IN_MET') or exit('No permission'); ?>
    <?php if($c['met_img_page'] && $data['sub']){ ?>
	<?php
    $type=strtolower(trim('son'));
    $cid=$data['classnow'];
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
	<li>
		<div class="card card-shadow">
			<figure class="card-header cover">
				<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?>>
					<img class="cover-image"     <?php if($m['_index']>3 || $data['page']>1){ ?>data-original<?php }else{ ?>src<?php } ?>="<?php echo thumb($m['columnimg'],$c['met_imgs_x'],$c['met_imgs_y']);?>" alt="<?php echo $m['name'];?>" height='100'>
				</a>
			</figure>
			<h4 class="card-title m-0 p-x-10 font-size-16 text-xs-center">
				<a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>" class="block text-truncate"><?php echo $m['name'];?></a>
			</h4>
		</div>
	</li>
	<?php endforeach;?>
	<?php }else{ ?>
	        <?php
            $sub = count($result);
            $num = 30;
            if(!is_array($result)){
                $result = explode('|',$result);
            }
            foreach ($result as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($result)-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $v = $val;
            ?>
	<li class="card">
		<div class="cover overlay overlay-hover">
			<img class="cover-image overlay-scale"     <?php if($v['_index']>3 || $data['page']>1){ ?>data-original<?php }else{ ?>src<?php } ?>="<?php echo thumb($v['imgurl'],$c['met_imgs_x'],$c['met_imgs_y']);?>" alt="<?php echo $v['title'];?>" height='100'>
			<div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-xs-center vertical-align" met-imgmask>
				<div class="vertical-align-middle">
					<h3 class="card-title m-b-20"><?php echo $v['title'];?></h3>
					<a href='<?php echo $v['url'];?>' title='<?php echo $v['title'];?>' class="btn btn-outline btn-squared btn-inverse" <?php echo $g['urlnew'];?>><?php echo $ui['img_listlook'];?></a>
				</div>
			</div>
		</div>
	</li>
	<?php }?>
<?php } ?>