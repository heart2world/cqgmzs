<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body <if value="$ui['bg_type']">bgcolor<else/>bgpic</if>" m-id='{$ui.mid}'>
	<div class="container">
		<h2 class="m-t-0 text-xs-center font-weight-300 invisible" data-plugin="appear" data-animate="slide-top" data-repeat="false">{$ui.index_news_title}</h2>
		<p class="desc m-b-0 text-xs-center font-weight-300 invisible" data-plugin="appear" data-animate="fade" data-repeat="false">{$ui.index_news_desc}</p>
		<ul class="blocks-2 index-news-list imagesize" data-scale='1'>
			<tag action="list" cid="$ui['index_news_id']" num="$ui['index_news_num']" type="$ui['index_news_type']">
			<li class="invisible <if value="$ui[shadow]">shadow</if>" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
				<div class="media media-lg">
					<if value="$ui['img_ok']">
						<div>
							<a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
								<img class="media-object" data-original="{$v.imgurl|thumb:$ui['img_w'],$ui['img_h']}" alt="{$v.title}" ></a>
						</div>
					</if>
					<div class="media-body">
						<h4 class="media-heading m-b-10">
							<a href="{$v.url}" title="{$v.title}" {$g.urlnew}>{$v.title}</a>
						</h4>
						<p class="des m-b-5 font-weight-300">{$v.description|met_substr:0,$ui['desc_num']}...</p>
					</div>
					<a href="{$v.url}" title="{$v.title}" {$g.urlnew} class="details">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
			</li>
			</tag>
		</ul>
	</div>
</div>