<?php defined('IN_MET') or exit('No permission'); ?>
<if value="$ui['navfixed_ok']">
<?php 
    if($ui['bgimg_type']){
        $bgimg = "bgimg-fex";
    }
	$navfex = $ui['navfixed_ok']?"navfix":"";
 ?>

<body class="met-navfixed {$navfex} 
    <if value="$ui['bodybg_type'] && $data['classnow']==10001">bodybgcolor</if>
    <if value="$ui[head_top_ok]">head-top-ok</if>">
<else/>
</if>

<div class="$uicss navbar">
<if value="$ui['navfixed_ok']">
    <header  class=' met-head navbar-fixed-top' m-id='{$ui.mid}' m-type='head_nav' id="header">
<else/>
    <header class=' met-head navbar-bot' m-id='{$ui.mid}' m-type='head_nav' id="header">
</if>
<div id="header">
    <if value="$ui[head_top_ok]">
        <div class="head-top-txt">
            <span>{$ui.head_top_txt}</span>
        </div>
    </if>
    <div class="container">
        <if value="$data[classnow] eq 10001">
            <h1 hidden>{$c.met_webname}</h1>
        <else/>
            <h3 hidden>{$c.met_webname}</h3>
        </if>
        <button class="navbar-toggler mobileMenuBtn" type="button" data-toggle="collapse" data-target="#mobileNav" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon fa-bars"></span>
        </button>
        <a href="{$c.index_url}" class="met-logo vertical-align navbar-logo" title="{$c.met_webname}">
            <div class="vertical-align-middle">
                <img src="{$c.met_logo}" alt="{$c.met_webname}" title="{$c.met_webname}">
            </div>
        </a>
        <!-- 语言-->
        <div class="met-nav-langlist">
        <if value="$c['met_ch_lang'] && $ui['simplified']">
            <if value="$data[lang] eq cn">
                <li class="met-langlist met-s2t nav-item vertical-align nav-item m-l-5" m-id="lang" m-type="lang">
                    <div class="inline-block nav-link">
                        <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='tc'>繁体</button>
                            <elseif value="$data[lang] eq zh"/>
                        <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc"  data-tolang='cn'>简体</button>
                    </div>
                </li>
            </if>
        </if>
        <lang></lang>
        <if value="$sub gt 1">
            <if value="$c['met_lang_mark'] && $ui[lang_ok]">
                <li class="met-langlist nav-item vertical-align m-l-10" m-id='lang' m-type='lang'>
                    <div class="inline-block dropdown nav-link">
                        <lang>
                            <if value="$data['lang'] eq $v['mark']">
                                <button type="button" data-toggle="dropdown" class="btn btn-outline btn-default btn-squared dropdown-toggle btn-lang">
                                    <if value="$ui['langlist_icon_ok']">
                                        <span class="flag-icon flag-icon-{$v.iconname}"></span>
                                    </if>
                                    <span >{$v.name}</span>
                                </button>
                            </if>
                        </lang>
                        <div class="dropdown-menu dropdown-menu-right animate animate-reverse" id="met-langlist-dropdown" role="menu">
                            <lang>
                            <a href="{$v.met_weburl}" title="{$v.name}" class='dropdown-item'>
                                <if value="$ui['langlist_icon_ok']">
                                <span class="flag-icon flag-icon-{$v.iconname}"></span>
                                </if>
                                {$v.name}
                            </a>
                            </lang>
                        </div>
                    </div>
                </li>
            </if>
        </if>
        <if value="$ui[head_weixin_ok]">
            <li class="met-langlist nav-item vertical-align m-l-10">
                <a id="met-weixin" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement='bottom' data-width='155' data-padding='0' data-content="<div class='text-xs-center'>
                    <img src='{$ui.footinfo_wx}' alt='{$c.met_webname}' width='150' height='150' id='met-weixin-img'></div>
                ">
                    <i class="icon fa-qrcode" aria-hidden="true" style="font-size: 20px;margin-top: 5px;"></i>
                </a>  
            </li>
        </if>
        </div>

        <!--语言-->
        <!-- 登录 注册-->
        
        <div class="mobileShop <if value="$ui['lang_ok']">langs</if> <if value="$ui['simplified'] eq 0 && $ui['lang_ok'] eq 0"> remleng</if>">
<if value="$c[met_member_register]&&$ui[member]">
                <div class="collapse navbar-collapse navbar-collapse-toolbar pull-md-right p-0" id='met-head-user-collapse' m-id='member' m-type='member'>
                <if value="$user">
                    <if value="$c['shopv2_open']">
                        <ul class="navbar-nav vertical-align p-l-0 m-b-0 met-head-user met-head-shop" m-id="member" m-type="member">
                            <li class="dropdown inline-block text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:;"
                                    class="navbar-avatar dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                <span class="avatar m-r-5"><img src="{$user.head}" alt="{$user.username}"/></span>
                                    {$user.username}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right animate" role="menu">
                                    <li role="presentation">
                                        <a href="{$url.shop_profile}" class="dropdown-item" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> {$word.app_shop_personal}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$url.shop_order}" class="dropdown-item" role="menuitem"><i class="icon wb-order" aria-hidden="true"></i> {$word.app_shop_myorder}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$url.shop_favorite}" class="dropdown-item" role="menuitem"><i class="icon wb-heart" aria-hidden="true"></i> {$word.app_shop_myfavorite}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$url.shop_discount}" class="dropdown-item" role="menuitem"><i class="icon wb-bookmark" aria-hidden="true"></i> {$word.app_shop_mydiscount}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$url.shop_member_base}&nojump=1" class="dropdown-item" target="_blank" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> {$word.app_shop_settings}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$url.shop_member_login_out}" class="dropdown-item" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> {$word.app_shop_out}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown inline-block shop_cart text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:void(0)"
                                    title="{$word.app_shop_cart}"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                    data-animation="slide-bottom10"
                                    role="button"
                                    class='topcart-btn'
                                >
                                    <i class=" icon pe-shopbag" aria-hidden="true"></i>
                                    {$word.app_shop_cart}
                                    <span class="badge badge-danger up hide topcart-goodnum"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media topcartremove animation-slide-bottom10" role="menu">
                                    <li class="dropdown-menu-header">
                                        <h5>{$word.app_shop_cart}</h5>
                                        <span class="label label-round label-danger">{$word.app_shop_intotal} <span class="topcart-goodnum"></span> {$word.app_shop_piece}{$word.app_shop_commodity}</span>
                                    </li>
                                    <li class="list-group dropdown-scrollable" role="presentation">
                                        <div data-role="container">
                                            <div data-role="content" id="topcart-body"></div>
                                        </div>
                                    </li>
                                    <li class="dropdown-menu-footer p-y-10 p-x-20" role="presentation">
                                        <div class="dropdown-menu-footer-btn">
                                            <a href="{$url.shop_cart}" class="btn btn-squared btn-danger margin-bottom-5 margin-right-10">{$word.app_shop_gosettlement}</a>
                                        </div>
                                        <span class="red-600 font-size-18 topcart-total"></span>
                                    </li>
                                </ul>
                            </li>
                            <if value="$ui[head_top_sc_ok]">
                                <li class="inline-block text-xs-center vertical-align-middle animation-slide-top">
                                    <div class="vertical-align-middle shopcart-btn login-btn shop-sc">
                                        <a href="javascript:void(0);" onclick="AddFavorite('{$c.met_webname}',location.href)">
                                            <i class="icon fa-heart-o" aria-hidden="true" style="font-size:16px;"></i>
                                        </a>  
                                    </div>
                                </li>
                            </if>
                            <if value="$ui[head_top_search_ok]">
                                <li class="inline-block text-xs-center vertical-align-middle animation-slide-top">
                                    <div class="vertical-align-middle shopcart-btn login-btn search-index">
                                            <form method="get" action="{$c.index_url}search/search.php?lang={$_M[lang]}">
                                                <input type="hidden" name="lang" value="{$_M[lang]}">
                                                <div class="input-search">
                                                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                                                    <input type="text" class="search" name="searchword" value="" placeholder="{$ui.search}" data-fv-notempty="true" data-fv-message="不能为空">
                                                </div>
                                            </form>
                                        </div>
                                </li>
                            </if>

                        </ul>
                        <else/>
                        <ul class="navbar-nav vertical-align p-l-0 m-b-0 met-head-user" m-id="member" m-type="member">
                            <li class="dropdown text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:;"
                                    class="navbar-avatar dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                <span class="avatar m-r-5"><img src="{$user.head}" alt="{$user.username}"/></span>
                                    {$user.username}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right animate">
                                    <li role="presentation">
                                        <a href="{$c.met_weburl}member/basic.php?lang={$_M[lang]}" class="dropdown-item" title='{$word.memberIndex9}' role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> {$word.memberIndex9}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$c.met_weburl}member/basic.php?lang={$_M[lang]}&a=dosafety" class="dropdown-item" title='{$word.accsafe}' role="menuitem"><i class="icon wb-lock" aria-hidden="true"></i> {$word.accsafe}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$c.met_weburl}member/login.php?lang={$_M[lang]}&a=dologout" class="dropdown-item" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> {$word.memberIndex10}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </if>
                    <else/>
                    <if value="$c['shopv2_open']">
                        <ul class="navbar-nav vertical-align p-l-0 m-b-0 met-head-user" m-id="member" m-type="member">
                            <div class="vertical-align text-center  met-nav-login ass">
                                <div class="vertical-align-middle login-btn">
                                    <a href="{$_M[url][site]}member/login.php?lang={$_M[lang]}" class="">
                                        <i class="icon pe-user" aria-hidden="true"></i>
                                        {$word.login}
                                    </a>
                                </div>
                                <if value="$ui[head_top_sc_ok]">
                                    <div class="vertical-align-middle shopcart-btn login-btn shop-sc">
                                        <a href="javascript:void(0);" onclick="AddFavorite('{$c.met_webname}',location.href)">
                                            <i class="icon fa-heart-o" aria-hidden="true" style="font-size:16px;"></i>
                                        </a>
                                    </div>
                                </if>
                                <div class="vertical-align-middle shopcart-btn login-btn">
                                    <a
                                        href="javascript:void(0)"
                                        title="{$word.app_shop_cart}"
                                        data-toggle="dropdown"
                                        aria-expanded="false"
                                        data-animation="slide-bottom10"
                                        role="button"
                                        class='topcart-btn'
                                    >
                                        <i class=" icon pe-shopbag" aria-hidden="true"></i>
                                        {$word.app_shop_cart}
                                        <span class="badge badge-danger up hide topcart-goodnum"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media topcartremove animation-slide-bottom10" role="menu">
                                        <li class="dropdown-menu-header">
                                            <h5>{$word.app_shop_cart}</h5>
                                            <span class="label label-round label-danger">{$word.app_shop_intotal} <span class="topcart-goodnum"></span> {$word.app_shop_piece}{$word.app_shop_commodity}</span>
                                        </li>
                                        <li class="list-group dropdown-scrollable" role="presentation">
                                            <div data-role="container">
                                                <div data-role="content" id="topcart-body"></div>
                                            </div>
                                        </li>
                                        <li class="dropdown-menu-footer p-y-10 p-x-20" role="presentation">
                                            <div class="dropdown-menu-footer-btn">
                                                <a href="{$url.shop_cart}" class="btn btn-squared btn-danger margin-bottom-5 margin-right-10">{$word.app_shop_gosettlement}</a>
                                            </div>
                                            <span class="red-600 font-size-18 topcart-total"></span>
                                        </li>
                                    </ul>
                                    </div>
                                    <if value="$ui[head_top_search_ok]">
                                        <div class="vertical-align-middle shopcart-btn login-btn search-index">
                                            <form method="get" action="{$c.index_url}search/search.php?lang={$_M[lang]}">
                                                <input type="hidden" name="lang" value="{$_M[lang]}">
                                                <div class="input-search">
                                                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                                                    <input type="text" class="search" name="searchword" value="" placeholder="{$ui.search}" data-fv-notempty="true" data-fv-message="不能为空">
                                                </div>
                                            </form>
                                        </div>
                                    </if>
                        </ul>
                    <else/>
                         <ul class="navbar-nav vertical-align p-l-0 m-b-0 met-head-user met-nav-login" m-id="member" m-type="member">
                            <li class=" text-xs-center vertical-align-middle animation-slide-top">
                                <a href="{$_M[url][site]}member/login.php?lang={$_M[lang]}" class="btn btn-squared btn-primary btn-outline m-r-10">{$word.login}</a>
                                <a href="{$_M[url][site]}member/register_include.php?lang={$_M[lang]}" class="btn btn-squared btn-success">{$word.register}</a>
                            </li>
                        </ul>
                    </if>
                </if>
                </div>
                </if>
            <!-- 登录 注册-->
        </div>
</div>
<!-- 导航 -->
        <nav class="met-nav nav-pc" role="navigation">
            <div class="clearfix">
                <ul class="navlist spice-nav-list navlist">
                    <li>
                        <a href="{$c.index_url}" title="{$word.home}" class="nav-link nav1 <if value="$data['classnow'] eq 10001">active</if>
                        ">{$word.home}</a>
                    </li>
                    <tag action='category' type='head' class='active' hide="$ui['hide']">
                        <if value="$ui['navdropdown_ok'] && $m['sub']">
                            <li class="navli nav-item dropdown m-l-{$ui.nav_ml}">
                            <if value="$ui['navdropdown_type']">
                                <a
                                    href="{$m.url}"
                                    {$m.urlnew}
                                    title="{$m.name}"
                                    class="nav-link dropdown-toggle {$m.class}"
                                    data-toggle="dropdown" data-hover="dropdown"
									{$m.urlnew}
                                >
                                <else/>
                                <a
                                    href="{$m.url}"
                                    {$m.urlnew}
                                    title="{$m.name}"
                                    class="nav1 nav-link dropdown-toggle {$m.class}"
                                    data-toggle="dropdown"
									{$m.urlnew}
                                >
                            </if>
                                {$m.name}</a>
                                <ul class="navlist2 dropdown-menu dropdown-menu-right dropdown-menu-bullet two-menu" >
                                <div class="navlist2-menu clearfix container">
                                    <div class="col-md-8 navlist2-contaner">
                                        <tag action='category' cid="$m['id']" type='son' class='active'>
                                            <if value="$m['sub']">
                                                <li class="col-md-3">
                                                    <a href="{$m.url}" class="{$m.class} asss" {$m.urlnew}>{$m.name}</a>
                                                    <ul class="navlist3">
                                                        <tag action='category' cid="$m['id']" type='son' class='active'>
                                                            <li>
                                                                <a href="{$m.url}" class="{$m.class}" {$m.urlnew}>{$m.name}</a>
                                                            </li>
                                                        </tag>
                                                    </ul>
                                                </li>
                                            <else/>
                                                <li class="col-md-3">
                                                    <a href="{$m.url}" class="{$m.class}" {$m.urlnew} title="{$m.name}">
                                                        {$m.name}
                                                    </a>
                                                </li>
                                            </if>
                                        </tag>
                                    </div>
                                    <div class="col-md-4 nav-theme">
                                        <div class="col-md-6 nav-theme-text">
                                            <tag action='category' cid="$ui['right_img']" type='current' class='active'>
                                                <a href="{$m.url}" title="{$m.name}" class="{$m.class}" {$m.urlnew}>{$m.name}</a>
                                            </tag>
                                            <ul class="navlist3">
                                                <tag action='category' cid="$ui['right_img']" type='son' class='active'>
                                                    <if value="$m['_index'] lt $ui['right_img_num']">
                                                        <li>
                                                            <a href="{$m.url}" class="{$m.class}" title="{$m.name}" {$m.urlnew}>{$m.name}</a>
                                                        </li>
                                                    </if>
                                                </tag>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 nav-theme-img">
                                                <tag action='category' cid="$ui['right_img']" type='son' class='active'>
                                                    <if value="$m['_index'] lt $ui['right_img_num']">
                                                        <div>
                                                            <a href="{$m.url}" title="{$m.name}" {$g.urlnew}>
                                                                <img src="{$m.columnimg}" alt="{$m.name}">
                                                            </a>
                                                        </div>
                                                    </if>
                                                </tag>
                                        </div>
                                    </div>
                                </div>
                                </ul>
                            </li>
                        <else/>
                            <li class="nav-item ">
                                <a href="{$m.url}" title="{$m.name}" class="link {$m.class} nav1" {$m.urlnew}>{$m.name}</a>
                            </li>
                        </if>
                    </tag>
                </ul>
            </div>
        </nav>
        
<nav id="mobileNav"  class="$uicss collapse nav-mod">
    <if value="$c[met_member_register]&&$ui[member]">
        <div class="dl-mod navbar-collapse navbar-collapse-toolbar pull-md-right p-0" id='met-head-user-collapse' m-id='member' m-type='member'>
                <if value="$user">
                    <if value="$c['shopv2_open']">
                        <ul class="vertical-align p-l-0 m-b-0 met-head-user met-head-shop" m-id="member" m-type="member">
                            <li class="dropdown inline-block text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:;"
                                    class="navbar-avatar dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                <span class="avatar m-r-5"><img src="{$user.head}" alt="{$user.username}"/></span>
                                    {$user.username}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right animate" role="menu">
                                    <li role="presentation">
                                        <a href="{$url.shop_profile}" class="dropdown-item" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> {$word.app_shop_personal}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$url.shop_order}" class="dropdown-item" role="menuitem"><i class="icon wb-order" aria-hidden="true"></i> {$word.app_shop_myorder}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$url.shop_favorite}" class="dropdown-item" role="menuitem"><i class="icon wb-heart" aria-hidden="true"></i> {$word.app_shop_myfavorite}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$url.shop_discount}" class="dropdown-item" role="menuitem"><i class="icon wb-bookmark" aria-hidden="true"></i> {$word.app_shop_mydiscount}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$url.shop_member_base}&nojump=1" class="dropdown-item" target="_blank" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> {$word.app_shop_settings}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$url.shop_member_login_out}" class="dropdown-item" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> {$word.app_shop_out}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown inline-block shop_cart text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:void(0)"
                                    title="{$word.app_shop_cart}"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                    data-animation="slide-bottom10"
                                    role="button"
                                    class='topcart-btn'
                                >
                                    <i class=" icon pe-shopbag" aria-hidden="true"></i>
                                    {$word.app_shop_cart}
                                    <span class="badge badge-danger up hide topcart-goodnum"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media topcartremove animation-slide-bottom10" role="menu">
                                    <li class="dropdown-menu-header">
                                        <h5>{$word.app_shop_cart}</h5>
                                        <span class="label label-round label-danger">{$word.app_shop_intotal} <span class="topcart-goodnum"></span> {$word.app_shop_piece}{$word.app_shop_commodity}</span>
                                    </li>
                                    <li class="list-group dropdown-scrollable" role="presentation">
                                        <div data-role="container">
                                            <div data-role="content" id="topcart-body"></div>
                                        </div>
                                    </li>
                                    <li class="dropdown-menu-footer p-y-10 p-x-20" role="presentation">
                                        <div class="dropdown-menu-footer-btn">
                                            <a href="{$url.shop_cart}" class="btn btn-squared btn-danger margin-bottom-5 margin-right-10">{$word.app_shop_gosettlement}</a>
                                        </div>
                                        <span class="red-600 font-size-18 topcart-total"></span>
                                    </li>
                                </ul>
                            </li>
                            <if value="$ui[head_top_sc_ok]">
                                <li class="inline-block text-xs-center vertical-align-middle animation-slide-top">
                                    <div class="vertical-align-middle shopcart-btn login-btn shop-sc">
                                        <a href="javascript:void(0);" onclick="AddFavorite('{$c.met_webname}',location.href)">
                                            <i class="icon fa-heart-o" aria-hidden="true" style="font-size:16px;"></i>
                                        </a>  
                                    </div>
                                </li>
                            </if>
                            <if value="$ui[head_top_search_ok]">
                                <li class="inline-block text-xs-center vertical-align-middle animation-slide-top">
                                    <div class="vertical-align-middle shopcart-btn login-btn search-index">
                                            <form method="get" action="{$c.index_url}search/search.php?lang={$_M[lang]}">
                                                <input type="hidden" name="lang" value="{$_M[lang]}">
                                                <div class="input-search">
                                                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                                                    <input type="text" class="search" name="searchword" value="" placeholder="{$ui.search}" data-fv-notempty="true" data-fv-message="不能为空">
                                                </div>
                                            </form>
                                        </div>
                                </li>
                            </if>
                            <if value="$ui[head_weixin_ok]">
                                <li class="met-langlist nav-item vertical-align animation-slide-top weixin-box">
                                    <a id="met-weixin" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement='bottom' data-width='155' data-padding='0' data-content="<div class='text-xs-center'>
                                        <img src='{$ui.footinfo_wx}' alt='{$c.met_webname}' width='150' height='150' id='met-weixin-img'></div>
                                    ">
                                        <i class="icon fa-qrcode" aria-hidden="true" style="font-size: 20px;margin-top: 5px;"></i>
                                    </a>  
                                </li>
                            </if>
                        </ul>
                        <else/>
                        <ul class="vertical-align p-l-0 m-b-0 met-head-user" m-id="member" m-type="member">
                            <li class="dropdown text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:;"
                                    class="navbar-avatar dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                <span class="avatar m-r-5"><img src="{$user.head}" alt="{$user.username}"/></span>
                                    {$user.username}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right animate">
                                    <li role="presentation">
                                        <a href="{$c.met_weburl}member/basic.php?lang={$_M[lang]}" class="dropdown-item" title='{$word.memberIndex9}' role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> {$word.memberIndex9}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$c.met_weburl}member/basic.php?lang={$_M[lang]}&a=dosafety" class="dropdown-item" title='{$word.accsafe}' role="menuitem"><i class="icon wb-lock" aria-hidden="true"></i> {$word.accsafe}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{$c.met_weburl}member/login.php?lang={$_M[lang]}&a=dologout" class="dropdown-item" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> {$word.memberIndex10}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </if>
                    <else/>
                    <if value="$c['shopv2_open']">
                        <ul class=" vertical-align p-l-0 m-b-0 met-head-user" m-id="member" m-type="member">
                            <div class="vertical-align text-center  met-nav-login ass">
                                <div class="vertical-align-middle login-btn">
                                    <a href="{$_M[url][site]}member/login.php?lang={$_M[lang]}" class="">
                                        <i class="icon pe-user" aria-hidden="true"></i>
                                        {$_M['word']['app_shop_login']}
                                    </a>
                                </div>
                                <if value="$ui[head_top_sc_ok]">
                                    <div class="vertical-align-middle shopcart-btn login-btn shop-sc">
                                        <a href="javascript:void(0);" onclick="AddFavorite('{$c.met_webname}',location.href)">
                                            <i class="icon fa-heart-o" aria-hidden="true" style="font-size:16px;"></i>
                                        </a>  
                                    </div>
                                </if>
                                <div class="vertical-align-middle shopcart-btn login-btn">
                                    <a
                                        href="javascript:void(0)"
                                        title="{$_M['word']['app_shop_cart']}"
                                        data-toggle="dropdown"
                                        aria-expanded="false"
                                        data-animation="fade"
                                        role="button"
                                    >
                                        <i class="icon pe-shopbag" aria-hidden="true"></i>
                                        {$_M['word']['app_shop_cart']}
                                        <span class="up hide topcart-goodnum"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media topcartremove animation-fade" role="menu">
                                        <li class="dropdown-menu-header">
                                            <h5>{$_M['word']['app_shop_cart']}</h5>
                                            <span class="label label-round label-danger">{$_M['word']['app_shop_intotal']} <span class="topcart-goodnum"></span> {$_M['word']['app_shop_piece']}{$_M['word']['app_shop_commodity']}</span>
                                        </li>
                                        <li class="list-group dropdown-scrollable" role="presentation">
                                            <div data-role="container">
                                                <div data-role="content" id="topcart-body"></div>
                                            </div>
                                        </li>
                                        <li class="dropdown-menu-footer" role="presentation">
                                            <div class="dropdown-menu-footer-btn">
                                                <a href="{$_M['url']['shop_cart']}" class="btn btn-squared btn-danger margin-bottom-5 margin-right-10">{$_M['word']['app_shop_gosettlement']}</a>
                                            </div>
                                            <span class="red-600 font-size-18 topcarttotal"></span>
                                        </li>
                                    </ul>
                                    </div>
                                    <if value="$ui[head_top_search_ok]">
                                        <div class="vertical-align-middle shopcart-btn login-btn search-index">
                                            <form method="get" action="{$c.index_url}search/search.php?lang={$_M[lang]}">
                                                <input type="hidden" name="lang" value="{$_M[lang]}">
                                                <div class="input-search">
                                                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                                                    <input type="text" class="search" name="searchword" value="" placeholder="{$ui.search}" data-fv-notempty="true" data-fv-message="不能为空">
                                                </div>
                                            </form>
                                        </div>
                                    </if>
                        </ul>
                    <else/>
                         <ul class=" vertical-align p-l-0 m-b-0 met-head-user met-nav-login" m-id="member" m-type="member">
                            <li class=" text-xs-center vertical-align-middle animation-slide-top">
                                <a href="{$_M[url][site]}member/login.php?lang={$_M[lang]}" class="btn btn-squared btn-primary btn-outline m-r-10">{$word.login}</a>
                                <a href="{$_M[url][site]}member/register_include.php?lang={$_M[lang]}" class="btn btn-squared btn-success">{$word.register}</a>
                            </li>
                        </ul>
                    </if>
                </if>
            </if>
    <div class="$uicss-acc" m-id='{$ui.mid}'>
        <ul  class="accordion">
            <li>
                <div class="link">
                    <a href="{$c.index_url}" title="{$word.home}" class="<if value="$data['classnow'] eq 10001">open</if>
                    ">{$word.home}</a>
                </div>
            </li>
            <tag action='category' type='head' class='open' hide="$ui['hide']">
                <if value="$m['sub']">
                    <li class="{$m.class}">
                        <div class="link">
                            {$m.name}
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <ul class="submenu {$m.class}-block">
                            <li class="{$m.class}">
                                <a href="{$m.url}" title="{$m.name}">{$ui.all}</a>
                            </li>
                            <tag action="category" cid="$m['id']" type="son" class='open-li'>
                                <if value="$m['sub']">
                                    <li class="{$m.class}">
                                            <div class="links">
                                                <div class="links-div">
                                                    <span>{$m.name}</span>
                                                    <i class="fa fa-chevron-down"></i>
                                                </div>
                                                <ul class="links-ul {$m.class}-block">
                                                    <tag action="category" cid="$m['id']" type="son" class='active-op'>
                                                        <li class="{$m.class}">
                                                            <a href="{$m.url}" title="{$v.title}">{$m.name}</a>
                                                        </li>
                                                    </tag>
                                                </ul>
                                            </div>
                                        </li>
                                <else/>
                                    <li class="{$m.class}">
                                        <a href="{$m.url}" title="{$v.title}">{$m.name}</a>
                                    </li>
                                </if>
                            </tag>
                        </ul>
                    </li>
                <else/>
                    <li class="{$m.class}">
                        <div class="link">
                            <a href="{$m.url}">{$m.name}</a>
                        </div>
                    </li>
                </if>
            </tag>
            <!-- 语言 -->
            <if value="$sub gt 1">
                <if value="$c['met_lang_mark'] && $ui[lang_ok]">
                    <lang></lang>
                    <li class="{$m.class}"  m-id='lang' m-type='lang'>
                        <div class="link">
                            <lang>
                                <if value="$data['lang'] eq $v['mark']">
                                        <if value="$ui['langlist_icon_ok']">
                                            <span class="flag-icon flag-icon-{$v.iconname}"></span>
                                        </if>
                                        {$v.name}
                                        <i class="fa fa-chevron-down"></i>

                                </if>
                            </lang>
                        </div>
                        <ul class="submenu">
                            <lang>
                                <li>
                                    <a href="{$v.met_weburl}" title="{$v.name}" class='dropdown-item'>
                                        <if value="$ui['langlist_icon_ok']">
                                        <span class="flag-icon flag-icon-{$v.iconname}"></span>
                                        </if>
                                        {$v.name}
                                    </a>
                                </li>
                            </lang>
                        </ul>
                    </li>
                </if>
            </if>
            <if value="$c['met_ch_lang'] && $ui['simplified']">
                <if value="$data[lang] eq cn">
                    <li class="met-langlist" m-id="lang" m-type="lang">
                        <div class="link">
                            <button type="button" class="btn btn-lang btn-cntotc" data-tolang='tc'>繁体</button>
                            <elseif value="$data[lang] eq zh"/>
                            <button type="button" class="btn btn-lang btn-cntotc"  data-tolang='cn'>简体</button>
                        </div>
                    </li>
                </if>
            </if>
        </ul>

    </div>

                </div>
                </if>
</nav>
<!-- 导航 -->
</header>
</div>