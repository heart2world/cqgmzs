<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss">
    <div class="    <?php if($ui[style]){ ?>container-fliud<?php }else{ ?>container<?php } ?>">
        <div class="row">
        <!-- sidebar -->
                <?php if($_M['form']['pageset']){ ?>
                <?php if($sidebar){ ?>
                <div class="col-md-9 met-news-body col-xs-12" style="float:<?php echo $ui['polr'];?>;<?php echo $lrp;?>">
                    <div class="row">
            <?php } ?>
            <?php }else{ ?>
                    <?php if($ui[has][sidebar]){ ?>
                    <div class="col-md-9 met-news-body col-xs-12"  style="float:<?php echo $ui['polr'];?>;<?php echo $lrp;?>">
                        <div class="row">
                <?php } ?>
            <?php } ?>
        <!-- /sidebar -->
        <!-- 内容 -->
        <div class="mycontent">
            <?php
    $cid = $data['classnow'];
    if($cid == 0){
        $cid = $data['classnow'];
    }
    $num = $c['met_img_list'];
    $order = "no_order";
    $result = load::sys_class('label', 'new')->get('img')->get_list_page($cid,$data['page']);
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
?><?php endforeach;?>
                <?php if($sub){ ?>
                <ul class="    <?php if($ui['img_column_xs']==1){ ?>
                            blocks-100
                            <?php }else{ ?>
                            blocks-xs-<?php echo $ui['img_column_xs'];?>
                            <?php } ?>
                            blocks-md-<?php echo $ui['img_column_sm'];?> blocks-lg-<?php echo $ui['img_column_md'];?> blocks-xxl-<?php echo $ui['img_column_xlg'];?>  no-space met-pager-ajax imagesize met-img-list" data-scale='<?php echo $c['met_imgs_y'];?>x<?php echo $c['met_imgs_x'];?>' m-id='<?php echo $ui['mid'];?>'>
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
                </ul>
                    <?php if(!$c['met_img_page'] || !$data['sub']){ ?>
                <div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
                         <?php
     if(!$data['classnow']){
        $data['classnow'] = 2;
     }

     if(!$data['page']){
        $data['page'] = 1;
     }
      $result = load::sys_class('label', 'new')->get('tag')->get_page_html($data['classnow'],$data['page']);

       echo $result;

     ?>
                </div>
                <div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
                    <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
                        <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                    </button>
                </div>
                <?php } ?>
            <?php }else{ ?>
                <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='<?php echo $ui['mid'];?>'><?php echo $g['nodata'];?></div>
            <?php } ?>
        </div>
        </div>
    </div>
        <!-- /内容 -->
        <!-- sidebar -->
    <?php if($_M['form']['pageset']){ ?>
        <?php if(!$sidebar){ ?>
        </div>
    </div>
</main>
    <?php } ?>
<?php }else{ ?>
    <?php if(!$ui[has][sidebar]){ ?>
        </div>
    </div>
</main>
    <?php } ?>
<?php } ?>

