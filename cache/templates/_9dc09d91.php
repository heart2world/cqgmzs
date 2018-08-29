<?php defined('IN_MET') or exit('No permission'); ?>
<footer class='$uicss met-foot p-y-20 border-top1' m-id='<?php echo $ui['mid'];?>' m-type='foot'>
	<div class="wrapper style1 align-center">
		<div class="inner">
			<ul class="icons">
				    <?php if($ui[footinfo_wx_ok]){ ?>
					<li class="box-social">
		                <a  class="icon style2 fa-weixin" id="met-weixin" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement='top' data-width='155' data-padding='0' data-content="<div class='text-xs-center'>
		                    <img src='<?php echo $ui['footinfo_wx'];?>' alt='<?php echo $c['met_webname'];?>' width='150' height='150' id='met-weixin-img'></div>
		                ">
		                </a>
	                </li>
	            <?php } ?>
				    <?php if($ui['footinfo_qq_ok']){ ?>
                    <li class="box-social">
                        <a class="icon style2 fa-qq"
                                <?php if($ui['footinfo_qq_type']==1){ ?>
                            href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $ui['footinfo_qq'];?>&site=qq&menu=yes"
                            <?php }else{ ?>
                            href="http://crm2.qq.com/page/portalpage/wpa.php?uin=<?php echo $ui['footinfo_qq'];?>&aty=0&a=0&curl=&ty=1"
                            <?php } ?>
                            rel="nofollow" target="_blank">
                        </a>
                    </li>
                <?php } ?>
                    <?php if($ui['weibo_ok']){ ?>
                    <li class="box-social">
                        <a class="icon style2 fa-weibo" href="<?php echo $ui['weibo_url'];?>" rel="nofollow" target="_blank">
                        </a>
                    </li>
                <?php } ?>
                    <?php if($ui['twitter_ok']){ ?>
                    <li class="box-social">
                        <a class="icon style2 fa-twitter" href="<?php echo $ui['twitter_url'];?>" rel="nofollow" target="_blank">
                        </a>
                    </li>
                <?php } ?>
                    <?php if($ui['facebook_ok']){ ?>
                    <li class="box-social">
                        <a class="icon style2 fa-facebook" href="<?php echo $ui['facebook_url'];?>" rel="nofollow" target="_blank">
                        </a>
                    </li>
                <?php } ?>

			</ul>
		</div>
	</div>
	<div class="container text-xs-center">

		    <?php if($c['met_footright'] || $c['met_footstat']){ ?>
		<p><?php echo $c['met_footright'];?></p>
		<?php } ?>
		    <?php if($c['met_footaddress']){ ?>
		<p><?php echo $c['met_footaddress'];?></p>
		<?php } ?>
		    <?php if($c['met_foottel']){ ?>
		<p><?php echo $c['met_foottel'];?></p>
		<?php } ?>
		    <?php if($c['met_footother']){ ?>
			<p><?php echo $c['met_footother'];?></p>
		<?php } ?>
		<!-- <div class="powered_by_metinfo">
			<?php echo $c['met_agents_copyright_foot'];?>
		</div> -->
		<ul class="met-langlist p-0">
		    <?php if($c['met_lang_mark'] && $ui[langlist_ok]){ ?>
		<li class="vertical-align m-x-5" m-id='lang' m-type='lang'>
			<div class="inline-block dropup">
				<?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
				    <?php if($v['_first']){ ?>
				<button type="button" data-toggle="dropdown" class="btn btn-outline btn-default btn-squared dropdown-toggle btn-lang">
					    <?php if($ui['langlist_icon_ok']){ ?>
					<span class="flag-icon flag-icon-<?php echo $v['iconname'];?>"></span>
					<?php } ?>
					<span ><?php echo $v['name'];?></span>
				</button>
				<?php } ?>
				<?php endforeach;?>
				<ul class="dropdown-menu dropdown-menu-right animate animate-reverse" id="met-langlist-dropdown" role="menu">
					<?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
					<a href="<?php echo $v['met_weburl'];?>" title="<?php echo $v['name'];?>" class='dropdown-item'>
						    <?php if($ui['langlist_icon_ok']){ ?>
						<img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>" style="max-width:100%;">
						<?php } ?>
						<?php echo $v['name'];?>
					</a>
					<?php endforeach;?>
				</ul>
			</div>
		</li>
		<?php } ?>
		    <?php if($c['met_ch_lang'] && $ui['simplified']){ ?>
	            <?php if($data[lang]==cn){ ?>
	            <li class="met-s2t  vertical-align nav-item m-x-5" m-id="lang" m-type="lang">
	            <div class="inline-block">
		            <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='tc'>繁体</button>
		            <?php }else if($data[lang]==tc){ ?>
		            <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='cn'>简体</button>
	            </div>
	        </li>
	        <?php } ?>
	    <?php } ?>
	    </ul>
	</div>
</footer>
