<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss page-content border-top1" m-id='<?php echo $ui['mid'];?>'>
	<div class="container">
		<div class="row">
			    <?php if($_M['form']['pageset']){ ?>
	                <?php if($sidebar){ ?>
	            <div class="col-md-9 met-showimg-body" boxmh-mh m-id='<?php echo $ui['mid'];?>'>
	            <?php }else{ ?>
	                <div class="met-showimg-body col-md-10 offset-md-1" boxmh-mh m-id='<?php echo $ui['mid'];?>'>
	            <?php } ?>
	            <?php }else{ ?>
	                <?php if($ui[has][sidebar]){ ?>
	            <div class="col-md-9 met-showimg-body" boxmh-mh m-id='<?php echo $ui['mid'];?>'>
	            <?php }else{ ?>
	                <div class="met-showimg-body col-md-10 offset-md-1" boxmh-mh m-id='<?php echo $ui['mid'];?>'>
	            <?php } ?>
	        <?php } ?>
		<section class="details-title border-bottom1">
			<h1 class='m-t-10 m-b-5'><?php echo $data['title'];?></h1>
			<div class="info">
				<span><i class="icon wb-time m-r-5" aria-hidden="true"></i><?php echo $data['updatetime'];?></span>
				<span><i class="icon wb-eye m-r-5" aria-hidden="true"></i><?php echo $data['hits'];?></span>
			</div>
		</section>
		<section class='met-showimg-con'>
			<div class='met-showimg-list fngallery cover text-xs-center' id="met-imgs-slick"  m-type="displayimgs">
				        <?php
            $sub = count($data['displayimgs']);
            $num = 30;
            if(!is_array($data['displayimgs'])){
                $data['displayimgs'] = explode('|',$data['displayimgs']);
            }
            foreach ($data['displayimgs'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['displayimgs'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $v = $val;
            ?>
				<div class='slick-slide'>
					<a href='<?php echo $v['img'];?>' data-size='<?php echo $v['x'];?>x<?php echo $v['y'];?>' data-med='<?php echo $v['img'];?>' data-med-size='<?php echo $v['x'];?>x<?php echo $v['y'];?>' class='lg-item-box' data-src='<?php echo $v['img'];?>' data-exthumbimage="<?php echo thumb($v['img'],60,60);?>" data-sub-html='<?php echo $v['title'];?>'>
						<img     <?php if($v['sub']>1){ ?>data-lazy<?php }else{ ?>src<?php } ?>="<?php echo thumb($v['img'],$c['met_imgdetail_x'],$c['met_imgdetail_y']);?>" class='img-fluid' alt='<?php echo $v['title'];?>' height="200" />
					</a>
				</div>
				<?php }?>
			</div>
		</section>
		<ul class="img-paralist paralist blocks-100 blocks-sm-2 blocks-md-3 blocks-xl-4">
			        <?php
            $sub = count($data['para']);
            $num = 30;
            if(!is_array($data['para'])){
                $data['para'] = explode('|',$data['para']);
            }
            foreach ($data['para'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['para'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $para = $val;
            ?>
			    <?php if($para['value']){ ?>
				<li><span><?php echo $para['name'];?>：</span><?php echo $para['value'];?></li>
			<?php } ?>
			<?php }?>
		</ul>
		<section class="met-editor clearfix m-t-20"><?php echo $data['content'];?></section>
		        <?php
            $sub = count($data[taglist]);
            $num = 30;
            if(!is_array($data[taglist])){
                $data[taglist] = explode('|',$data[taglist]);
            }
            foreach ($data[taglist] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data[taglist])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $tag = $val;
            ?><?php }?>
		    <?php if($ui['tag_ok'] && $sub){ ?>
	        <div class="tags">
	            <span><?php echo $data['tagname'];?></span>
	                    <?php
            $sub = count($data[taglist]);
            $num = $ui[tag_num];
            if(!is_array($data[taglist])){
                $data[taglist] = explode('|',$data[taglist]);
            }
            foreach ($data[taglist] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data[taglist])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $tag = $val;
            ?>
	                <a href="<?php echo $tag['url'];?>" title="<?php echo $tag['name'];?>"><?php echo $tag['name'];?></a>
	            <?php }?>
	        </div>
	    <?php } ?>
	        <div class='met-page p-y-30 border-top1'>
    <div class="container p-t-30 ">
    <ul class="pagination block blocks-2"'>
        <li class='page-item m-b-0 <?php echo $data['preinfo']['disable'];?>'>
            <a href='<?php if($data['preinfo']['url']){?><?php echo $data['preinfo']['url'];?><?php }else{?>javascript:;<?php }?>' title="<?php echo $data['preinfo']['title'];?>" class='page-link text-truncate'>
                <?php echo $word['PagePre'];?>
                <span aria-hidden="true" class='hidden-xs-down'>: <?php if($data['preinfo']['title']){?><?php echo $data['preinfo']['title'];?><?php }else{?><?php echo $word['Noinfo'];?><?php }?></span>
            </a>
        </li>
        <li class='page-item m-b-0 <?php echo $data['nextinfo']['disable'];?>'>
            <a href='<?php if($data['nextinfo']['url']){?><?php echo $data['nextinfo']['url'];?><?php }else{?>javascript:;<?php }?>' title="<?php echo $data['nextinfo']['title'];?>" class='page-link pull-xs-right text-truncate'>
                <?php echo $word['PageNext'];?>
                <span aria-hidden="true" class='hidden-xs-down'>: <?php if($data['nextinfo']['title']){?><?php echo $data['nextinfo']['title'];?><?php }else{?><?php echo $word['Noinfo'];?><?php }?></span>
            </a>
        </li>
    </ul>
</div>
</div>
	</div>
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