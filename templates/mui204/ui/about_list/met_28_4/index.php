<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss text-xs-center"  m-id="{$ui.mid}">
    <div class="container">
        <div class="navbg">
            <ul class="imglist" >
                <tag action="category" type="son" cid="$ui['service_id']">
                    <li class="imgitem">
                        <if value="$ui['navtxt_or']">
                        <img src="{$m.indeximg}" alt="{$m.name}">
                        <else/>
                        <p>{$m.ctitle}</p>
                        </if>
                    </li>
                </tag>
            </ul>
        </div>
        <ul class="service-list" >
            <tag action="category" type="son" cid="$ui['service_id']">
                <li class="item">
                    <div class="mainbox">
                        <img src="{$m.columnimg|thumb:$ui['imgx'],$ui['imgh']}" alt="{$m.name}">
                        <div class="txtbox" data-bg="{$ui.contgbgcolor}|{$ui.side_op}">
                            <h4>{$m.name}</h4>
                            <p>{$m.description}</p>
                            <div class="link">
                                <a href="{$m.url}" alt="{$m.name}">{$ui.moretxt}</a>
                            </div>
                        </div>
                    </div>
                </li>
            </tag>
        </ul>
    </div>
</section>