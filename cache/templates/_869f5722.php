<?php defined('IN_MET') or exit('No permission'); ?>
    <?php if($data[index_num]<>163){ ?>
<div class="$uicss" m-id='<?php echo $ui['mid'];?>'>
	<div class="    <?php if($ui['type']==1){ ?>container<?php }else{ ?>container-fluid<?php } ?>">
		<div class="row">
			<?php
    $search = load::sys_class('label', 'new')->get('search')->get_search_opotion(page, $data['classnow'], $data['page']);
?>
				        <?php
            $sub = count($search['para']);
            $num = 30;
            if(!is_array($search['para'])){
                $search['para'] = explode('|',$search['para']);
            }
            foreach ($search['para'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($search['para'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $type = $val;
            ?><?php }?>
				    <?php if($sub && $ui['attr_ok']){ ?>
				    <div class="type-order">
				    	        <?php
            $sub = count($search['para']);
            $num = 30;
            if(!is_array($search['para'])){
                $search['para'] = explode('|',$search['para']);
            }
            foreach ($search['para'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($search['para'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $type = $val;
            ?>
				    	<div class="clearfix">
				    		<div class="attr-name col-xl-1 col-lg-2 col-md-2 col-sm-3"><?php echo $type['name'];?>：</div>
				    		<ul class="type-order-attr col-xl-11 col-lg-10 col-md-10 col-sm-9">
								        <?php
            $sub = count($type['list']);
            $num = 30;
            if(!is_array($type['list'])){
                $type['list'] = explode('|',$type['list']);
            }
            foreach ($type['list'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($type['list'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $attr = $val;
            ?>
									<li class="inline-block attr-value <?php echo $attr['check'];?>"><a href="<?php echo $attr['url'];?>" class="p-x-10 p-y-5"><?php echo $attr['name'];?></a></li>
								<?php }?>
				    		</ul>
				    	</div>
				    	<?php }?>
				    </div>
				<?php } ?>
				    <?php if($ui['sort_ok']){ ?>
				<?php
    $search = load::sys_class('label', 'new')->get('search')->get_search_opotion(page, $data['classnow'], $data['page']);
?>
				<div class="clearfix m-y-10">
					<ul class="order inline-block p-0 m-y-10 m-r-10">
					        <?php
            $sub = count($search['order']);
            $num = 30;
            if(!is_array($search['order'])){
                $search['order'] = explode('|',$search['order']);
            }
            foreach ($search['order'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($search['order'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $res = $val;
            ?>
					<li class="order-list inline-block m-r-10"><a href="<?php echo $res['url'];?>" class="p-x-10 p-y-5"><?php echo $res['name'];?><i class="icon wb-triangle-up" aria-hidden="true"></i></a></li>
					<?php }?>
					</ul>
					    <?php if($c['shopv2_open']){ ?>
					<div class="clearfix inline-block m-y-10 m-l-10">
						<form action="" method="get">
							<input type="hidden" name="class1" value="<?php echo $data['class1'];?>">
							<input type="hidden" name="class2" value="<?php echo $data['class2'];?>">
							<input type="hidden" name="class3" value="<?php echo $data['class3'];?>">
							<input type="hidden" name="search" value="search">
							<input type="hidden" name="content" value="<?php echo $_M['form']['content'];?>">
							<input type="hidden" name="specv" value="<?php echo $_M['form']['specv'];?>">
							<input type="hidden" name="order" value="<?php echo $_M['form']['order'];?>">
							<span class="pricetxt"><?php echo $word['app_shop_remind_row4'];?>：</span>
							<input type="text" name="price_low" placeholder="" value="<?php echo $_M['form']['price_low'];?>" class="form-control inline-block w-100 price_num">
							<span class="pricetxt">-</span>
							<input type="text" name="price_top" placeholder="" value="<?php echo $_M['form']['price_top'];?>" class="form-control inline-block w-100 price_num">
							<button type="submit" class='btn pricesearch' style="position: relative;top: -3px;"><?php echo $word['confirm'];?></button>
						</form>
					</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>
