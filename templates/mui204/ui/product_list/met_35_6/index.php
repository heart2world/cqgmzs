<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body" m-id='{$ui.mid}'>
	<div class="module mproject">
	<!--品牌系列---->
		 	<div class="brandxl">
		 		      <div class="mytitlebox">
		 		      	<tag action='category' cid="$ui['id']"  type='current'>
                        <if value="$ui['myself_title']">
                             <div class="mytitle"><a href="{$m.url}" title="{$m.name}" class="more"><h2>{$ui.myself_title}</h2></a></div>
                          </if>
                      </tag>
                          <if value="$ui['myself_desc']">
                            <div class="mydesc">{$ui.myself_desc}</div>
                          </if>
                    </div>
		 		<ul>
		 		  <tag action="category" type="son"  cid="$ui['id']">
		 		  	<if value="$m['_index'] lt $ui.num">
			 			<li>
			 				<div class="boss_box">
					<!-- 右边的图片 -->
							<div class="brandxl_tu_R1  wow  fadeInRight col-lg-6  col-md-6 col-sm-12 col-xs-12 invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
									<div class="big_img"><a href="{$m.url}" title="{$m.name}" {$m.urlnew}><img src="{$m.columnimg|thumb:$ui[img_x],$ui[img_y]}"></a></div>
								</div>
								<!-- 左边文字 -->
								<div class="brandxl_txt_L1 wow fadeInLeft col-lg-6  col-md-6 col-sm-12 col-xs-12" data-plugin="appear" data-animate="slide-left" data-repeat="false">
									<dl class="wow fadeInLeft" data-wow-delay="0.18s">
										<dt class="dt_01">
										 <?php $img=strstr($ui['boss_img'],"upload"); ?>
				 	    			        <if value="$m.indeximg">
				 	    			          	<a href="{$m.url}" title="{$m.name}" {$m.urlnew}>
											<!-- 	<img src="{$m.indeximg}"> -->
												  	<img src="{$m.indeximg}" alt="{$v.title}" />
												</a>
				 	    			        </if>
										</dt>
									<dt class="mytitle">
										<a href="{$m.url}" title="{$m.name}" {$m.urlnew}>{$m.name}</a>
									</dt>
									<dd>
										<span class="my_desc">
											{$m.description|met_substr:0,$ui['desc_num']}
										</span>
									</dd>
									<dd class="my_a">
										<a href="{$m.url}" title="{$m.name}" {$m.urlnew} style="visibility: visible;">
											{$ui.more_btn}
										</a>
									</dd>
									</dl>
								</div>
			 				</div>
						   </li>
						 </if>
					 </tag>
		 		</ul>
			</div>
	</div>
</div>