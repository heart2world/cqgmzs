<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body" m-id="{$ui.mid}" >
	<div class="
			<if value='$ui[is_full] eq 1'>
				container-fiuled full
			<else/>
				container
			</if>
		">
		<div class="filters-wrap">
			<div class="text-center">
				<div class="area-heading text-center">
					<if value="$ui['title']">
						<h2 class="area-title" data-plugin="appear" data-animate="slide-top" data-repeat="false">{$ui.title}</h2>
					</if>
				</div>
			</div>
		</div>
		<div class="project-carousel" style="overflow: hidden;">
			<div class="project-strip">
				<tag action='list' cid="$ui['select']" type="$ui['picturecom']" num="$ui['num']">
					<div class="project">
						<img  class="m-img" src="{$v.imgurl|thumb:$ui['img_x'],$ui['img_y']}"  alt="{$v.title}"/>
					</div>
				</tag>
			</div>
			<div class="project-screen">
				<div class="project-detail">
					<tag action='list' cid="$ui['select']" type="$ui['picturecom']" num="$ui['num']">
						<div class="project">
							<figure style="position: relative;" id="defaultheight" class="<if value='$ui[hover_opacity] neq 0'>opacity_null<else/>opacity_not_null</if>">
								<img class="m-img" data-height="{$ui.img_y}" src="{$v.imgurl|thumb:$ui['img_x'],$ui['img_y']}"  alt="{$v.title}" style="border: 5px solid {$ui.border_color};" />
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
								<figcaption data-opacity="{$ui.hover_opacity}" style="text-align: center;" data-background="{$thirdcolor}">
									<a href="{$v.url}" {$g.urlnew}>
										<p>{$v.title}</p>
										<h3>{$v.description}</h3>
									</a>
								</figcaption>
							</figure>
						</div>
					</tag>
				</div>
			</div>
			
		</div>
		<tag action="category" type="current" cid="$ui['select']">
			<a href="{$m.url}" title="{$m.name}" class="category-section" {$m.urlnew}>{$ui.btn_text}</a>
		</tag>
	</div>
</div>

