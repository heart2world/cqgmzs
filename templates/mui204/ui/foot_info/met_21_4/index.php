<?php defined('IN_MET') or exit('No permission'); ?>
<footer class='$uicss met-foot p-y-20 border-top1' m-id='{$ui.mid}' m-type='foot'>
	<div class="wrapper style1 align-center">
		<div class="inner">
			<ul class="icons">
				<if value="$ui[footinfo_wx_ok]">
					<li class="box-social">
		                <a  class="icon style2 fa-weixin" id="met-weixin" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement='top' data-width='155' data-padding='0' data-content="<div class='text-xs-center'>
		                    <img src='{$ui.footinfo_wx}' alt='{$c.met_webname}' width='150' height='150' id='met-weixin-img'></div>
		                ">
		                </a>
	                </li>
	            </if>
				<if value="$ui['footinfo_qq_ok']">
                    <li class="box-social">
                        <a class="icon style2 fa-qq"
                            <if value="$ui['footinfo_qq_type'] eq 1">
                            href="http://wpa.qq.com/msgrd?v=3&uin={$ui.footinfo_qq}&site=qq&menu=yes"
                            <else/>
                            href="http://crm2.qq.com/page/portalpage/wpa.php?uin={$ui.footinfo_qq}&aty=0&a=0&curl=&ty=1"
                            </if>
                            rel="nofollow" target="_blank">
                        </a>
                    </li>
                </if>
                <if value="$ui['weibo_ok']">
                    <li class="box-social">
                        <a class="icon style2 fa-weibo" href="{$ui.weibo_url}" rel="nofollow" target="_blank">
                        </a>
                    </li>
                </if>
                <if value="$ui['twitter_ok']">
                    <li class="box-social">
                        <a class="icon style2 fa-twitter" href="{$ui.twitter_url}" rel="nofollow" target="_blank">
                        </a>
                    </li>
                </if>
                <if value="$ui['facebook_ok']">
                    <li class="box-social">
                        <a class="icon style2 fa-facebook" href="{$ui.facebook_url}" rel="nofollow" target="_blank">
                        </a>
                    </li>
                </if>

			</ul>
		</div>
	</div>
	<div class="container text-xs-center">

		<if value="$c['met_footright'] || $c['met_footstat']">
		<p>{$c.met_footright}</p>
		</if>
		<if value="$c['met_footaddress']">
		<p>{$c.met_footaddress}</p>
		</if>
		<if value="$c['met_foottel']">
		<p>{$c.met_foottel}</p>
		</if>
		<if value="$c['met_footother']">
			<p>{$c.met_footother}</p>
		</if>
		<!-- <div class="powered_by_metinfo">
			{$c.met_agents_copyright_foot}
		</div> -->
		<ul class="met-langlist p-0">
		<if value="$c['met_lang_mark'] && $ui[langlist_ok]">
		<li class="vertical-align m-x-5" m-id='lang' m-type='lang'>
			<div class="inline-block dropup">
				<lang>
				<if value="$v['_first']">
				<button type="button" data-toggle="dropdown" class="btn btn-outline btn-default btn-squared dropdown-toggle btn-lang">
					<if value="$ui['langlist_icon_ok']">
					<span class="flag-icon flag-icon-{$v.iconname}"></span>
					</if>
					<span >{$v.name}</span>
				</button>
				</if>
				</lang>
				<ul class="dropdown-menu dropdown-menu-right animate animate-reverse" id="met-langlist-dropdown" role="menu">
					<lang>
					<a href="{$v.met_weburl}" title="{$v.name}" class='dropdown-item'>
						<if value="$ui['langlist_icon_ok']">
						<img src="{$v.flag}" alt="{$v.name}" style="max-width:100%;">
						</if>
						{$v.name}
					</a>
					</lang>
				</ul>
			</div>
		</li>
		</if>
		<if value="$c['met_ch_lang'] && $ui['simplified']">
	        <if value="$data[lang] eq cn">
	            <li class="met-s2t  vertical-align nav-item m-x-5" m-id="lang" m-type="lang">
	            <div class="inline-block">
		            <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='tc'>繁体</button>
		            <elseif value="$data[lang] eq tc"/>
		            <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='cn'>简体</button>
	            </div>
	        </li>
	        </if>
	    </if>
	    </ul>
	</div>
</footer>
