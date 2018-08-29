<?php defined('IN_MET') or exit('No permission'); ?>
<?php defined('IN_MET') or exit('No permission');?>
<div class="$uicss met-index-product met-index-body met-index-newproduct"
 <if value="$ui['bg_type']">style="background:{$g.bodybgcolor};background:{$ui.bgcolor}"<else/>style='background:url({$ui.bgpic}) no-repeat;background-size: cover;background-position: center;'</if>
 m-id='{$ui.mid}'>
    <div class="container">
        <div class="txt-box" style="text-align:{$ui.txt_pot}">
            <if value="$ui['title']">
                <h2 class="invisible" data-plugin="appear" data-animate="slide-left" data-repeat="false">{$ui.title}</h2>
            </if>
            <if value="$ui['desc']">
                <p class="desc invisible" data-plugin="appear" data-animate="slide-right" data-repeat="false">{$ui.desc}</p>
            </if>
            <if value="$ui['a_value']">
                <p class="invisible a-box" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                    <a href="{$ui.a_href}" title="{$ui.a_value}" class="a-btn">{$ui.a_value}</a>
                </p>
            </if>
        </div>
    </div>
</div>
