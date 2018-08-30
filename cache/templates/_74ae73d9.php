<?php defined('IN_MET') or exit('No permission'); ?>
<div class="col-lg-3">
	<div class="row">
		    <?php if($ui['search']){ ?>
		<div class="$uicss-search">
		<form class='sidebar-search' method='get' action="<?php echo $c['met_weburl'];?>search/search.php">
			<input type='hidden' name='lang' value='<?php echo $data['lang'];?>' />
			<input type='hidden' name='class1' value='<?php echo $data['class1'];?>' />
			<div class="form-group">
				<div class="input-search">
					<button type="submit" class="input-search-btn">
						<i class="icon wb-search" aria-hidden="true"></i>
					</button>
					<input type="text" class="form-control" name="searchword" placeholder="<?php echo $ui['sidebar_search_placeholder'];?>">
				</div>
			</div>
		</form>
	</div>
	<?php } ?>
<aside class="$uicss met-sidebar panel panel-body m-b-0" boxmh-h m-id='<?php echo $ui['mid'];?>' m-type='nocontent'>
	<div class="news-list-tab nav-tabs-horizontal" data-plugin="nav-tabs">
        <ul class="nav nav-tabs nav-tabs-solid ulstyle"  role="tablist">
            <li class="nav-item" role="presentation">
                <a data-toggle="tab" href="#news-list1" role="tab" aria-expanded="true" class="nav-link active">
                <?php echo $ui['sidebar_title1'];?>
                </a>
            </li>
            <li  class="nav-item" role="presentation" >
                <a data-toggle="tab" href="#news-list2"  role="tab" aria-expanded="false" class="nav-link">
                <?php echo $ui['sidebar_title2'];?>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active animation-fade" id="news-list1" role="tabpanel">
            	<ul class="list-group ulstyle">
            		<?php
    $cid=$ui['list1'];

    $num = $ui['num1'];
    $module = "";
    $type = $ui['type1'];
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
        $list1 = $v;
?>
	          			<li class="">
	          				    <?php if($list1['_index']<3){ ?>
	          					<span class="tag tag-pill up tag-warning">
	          						<?php }else{ ?>
	          					<span class="tag tag-pill up tag-default">
	          				<?php } ?>
	          					<?php $list1['_index']= $list1['_index']+1;?>
				            	<?php echo $list1['_index'];?>
				         		</span>
				             <a href="<?php echo $list1['url'];?>" title="<?php echo $list1['title'];?>" <?php echo $g['urlnew'];?>><?php echo $list1['title'];?></a>
				             <span class="time"><?php echo $list1['updatetime'];?></span>
			             </li>
					<?php endforeach;?>
                </ul>
                </div>
            <div class="tab-pane animation-fade" id="news-list2" role="tabpanel">
	                <ul class="list-group ulstyle">
	                	<?php
    $cid=$ui['list2'];

    $num = $ui['num2'];
    $module = "";
    $type = $ui['type2'];
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
        $list2 = $v;
?>
				           <li class="">
	          				    <?php if($list2['_index']<3){ ?>
	          					<span class="tag tag-pill up tag-warning">
	          						<?php }else{ ?>
	          					<span class="tag tag-pill up tag-default">
	          				<?php } ?>
	          					<?php $list2['_index']= $list2['_index']+1;?>
				             	<?php echo $list2['_index'];?>
				         		</span>
					             <a href="<?php echo $list2['url'];?>" title="<?php echo $list2['title'];?>" <?php echo $g['urlnew'];?>><?php echo $list2['title'];?></a>
					             <span class="time"><?php echo $list2['updatetime'];?></span>
				            </li>
				        <?php endforeach;?>
	                </ul>
                </div>
              </div>
			</div>
</aside>
</div>
</div>
		</div>
    </div>
</main>