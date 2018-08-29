<?php defined('IN_MET') or exit('No permission'); ?>
    <?php if($ui['navfixed_ok']){ ?>
<?php 
    if($ui['bgimg_type']){
        $bgimg = "bgimg-fex";
    }
	$navfex = $ui['navfixed_ok']?"navfix":"";
 ?>

<body class="met-navfixed <?php echo $navfex;?> 
        <?php if($ui['bodybg_type'] && $data['classnow']==10001){ ?>bodybgcolor<?php } ?>
        <?php if($ui[head_top_ok]){ ?>head-top-ok<?php } ?>">
<?php }else{ ?>
<?php } ?>

<div class="$uicss navbar">
    <?php if($ui['navfixed_ok']){ ?>
    <header  class=' met-head navbar-fixed-top' m-id='<?php echo $ui['mid'];?>' m-type='head_nav' id="header">
<?php }else{ ?>
    <header class=' met-head navbar-bot' m-id='<?php echo $ui['mid'];?>' m-type='head_nav' id="header">
<?php } ?>
<div id="header">
        <?php if($ui[head_top_ok]){ ?>
        <div class="head-top-txt">
            <span><?php echo $ui['head_top_txt'];?></span>
        </div>
    <?php } ?>
    <div class="container">
            <?php if($data[classnow]==10001){ ?>
            <h1 hidden><?php echo $c['met_webname'];?></h1>
        <?php }else{ ?>
            <h3 hidden><?php echo $c['met_webname'];?></h3>
        <?php } ?>
        <button class="navbar-toggler mobileMenuBtn" type="button" data-toggle="collapse" data-target="#mobileNav" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon fa-bars"></span>
        </button>
        <a href="<?php echo $c['index_url'];?>" class="met-logo vertical-align navbar-logo" title="<?php echo $c['met_webname'];?>">
            <div class="vertical-align-middle">
                <img src="<?php echo $c['met_logo'];?>" alt="<?php echo $c['met_webname'];?>" title="<?php echo $c['met_webname'];?>">
            </div>
        </a>
        <!-- 语言-->
        <div class="met-nav-langlist">
            <?php if($c['met_ch_lang'] && $ui['simplified']){ ?>
                <?php if($data[lang]==cn){ ?>
                <li class="met-langlist met-s2t nav-item vertical-align nav-item m-l-5" m-id="lang" m-type="lang">
                    <div class="inline-block nav-link">
                        <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='tc'>繁体</button>
                            <?php }else if($data[lang]==zh){ ?>
                        <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc"  data-tolang='cn'>简体</button>
                    </div>
                </li>
            <?php } ?>
        <?php } ?>
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
?><?php endforeach;?>
            <?php if($sub>1){ ?>
                <?php if($c['met_lang_mark'] && $ui[lang_ok]){ ?>
                <li class="met-langlist nav-item vertical-align m-l-10" m-id='lang' m-type='lang'>
                    <div class="inline-block dropdown nav-link">
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
                                <?php if($data['lang']==$v['mark']){ ?>
                                <button type="button" data-toggle="dropdown" class="btn btn-outline btn-default btn-squared dropdown-toggle btn-lang">
                                        <?php if($ui['langlist_icon_ok']){ ?>
                                        <span class="flag-icon flag-icon-<?php echo $v['iconname'];?>"></span>
                                    <?php } ?>
                                    <span ><?php echo $v['name'];?></span>
                                </button>
                            <?php } ?>
                        <?php endforeach;?>
                        <div class="dropdown-menu dropdown-menu-right animate animate-reverse" id="met-langlist-dropdown" role="menu">
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
                                <span class="flag-icon flag-icon-<?php echo $v['iconname'];?>"></span>
                                <?php } ?>
                                <?php echo $v['name'];?>
                            </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                </li>
            <?php } ?>
        <?php } ?>
            <?php if($ui[head_weixin_ok]){ ?>
            <li class="met-langlist nav-item vertical-align m-l-10">
                <a id="met-weixin" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement='bottom' data-width='155' data-padding='0' data-content="<div class='text-xs-center'>
                    <img src='<?php echo $ui['footinfo_wx'];?>' alt='<?php echo $c['met_webname'];?>' width='150' height='150' id='met-weixin-img'></div>
                ">
                    <i class="icon fa-qrcode" aria-hidden="true" style="font-size: 20px;margin-top: 5px;"></i>
                </a>  
            </li>
        <?php } ?>
        </div>

        <!--语言-->
        <!-- 登录 注册-->
        
        <div class="mobileShop     <?php if($ui['lang_ok']){ ?>langs<?php } ?>     <?php if($ui['simplified']==0 && $ui['lang_ok']==0){ ?> remleng<?php } ?>">
    <?php if($c[met_member_register]&&$ui[member]){ ?>
                <div class="collapse navbar-collapse navbar-collapse-toolbar pull-md-right p-0" id='met-head-user-collapse' m-id='member' m-type='member'>
                    <?php if($user){ ?>
                        <?php if($c['shopv2_open']){ ?>
                        <ul class="navbar-nav vertical-align p-l-0 m-b-0 met-head-user met-head-shop" m-id="member" m-type="member">
                            <li class="dropdown inline-block text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:;"
                                    class="navbar-avatar dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                <span class="avatar m-r-5"><img src="<?php echo $user['head'];?>" alt="<?php echo $user['username'];?>"/></span>
                                    <?php echo $user['username'];?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right animate" role="menu">
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_profile'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?php echo $word['app_shop_personal'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_order'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-order" aria-hidden="true"></i> <?php echo $word['app_shop_myorder'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_favorite'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-heart" aria-hidden="true"></i> <?php echo $word['app_shop_myfavorite'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_discount'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-bookmark" aria-hidden="true"></i> <?php echo $word['app_shop_mydiscount'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_member_base'];?>&nojump=1" class="dropdown-item" target="_blank" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> <?php echo $word['app_shop_settings'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_member_login_out'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> <?php echo $word['app_shop_out'];?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown inline-block shop_cart text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:void(0)"
                                    title="<?php echo $word['app_shop_cart'];?>"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                    data-animation="slide-bottom10"
                                    role="button"
                                    class='topcart-btn'
                                >
                                    <i class=" icon pe-shopbag" aria-hidden="true"></i>
                                    <?php echo $word['app_shop_cart'];?>
                                    <span class="badge badge-danger up hide topcart-goodnum"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media topcartremove animation-slide-bottom10" role="menu">
                                    <li class="dropdown-menu-header">
                                        <h5><?php echo $word['app_shop_cart'];?></h5>
                                        <span class="label label-round label-danger"><?php echo $word['app_shop_intotal'];?> <span class="topcart-goodnum"></span> <?php echo $word['app_shop_piece'];?><?php echo $word['app_shop_commodity'];?></span>
                                    </li>
                                    <li class="list-group dropdown-scrollable" role="presentation">
                                        <div data-role="container">
                                            <div data-role="content" id="topcart-body"></div>
                                        </div>
                                    </li>
                                    <li class="dropdown-menu-footer p-y-10 p-x-20" role="presentation">
                                        <div class="dropdown-menu-footer-btn">
                                            <a href="<?php echo $url['shop_cart'];?>" class="btn btn-squared btn-danger margin-bottom-5 margin-right-10"><?php echo $word['app_shop_gosettlement'];?></a>
                                        </div>
                                        <span class="red-600 font-size-18 topcart-total"></span>
                                    </li>
                                </ul>
                            </li>
                                <?php if($ui[head_top_sc_ok]){ ?>
                                <li class="inline-block text-xs-center vertical-align-middle animation-slide-top">
                                    <div class="vertical-align-middle shopcart-btn login-btn shop-sc">
                                        <a href="javascript:void(0);" onclick="AddFavorite('<?php echo $c['met_webname'];?>',location.href)">
                                            <i class="icon fa-heart-o" aria-hidden="true" style="font-size:16px;"></i>
                                        </a>  
                                    </div>
                                </li>
                            <?php } ?>
                                <?php if($ui[head_top_search_ok]){ ?>
                                <li class="inline-block text-xs-center vertical-align-middle animation-slide-top">
                                    <div class="vertical-align-middle shopcart-btn login-btn search-index">
                                            <form method="get" action="<?php echo $c['index_url'];?>search/search.php?lang=<?php echo $_M[lang];?>">
                                                <input type="hidden" name="lang" value="<?php echo $_M[lang];?>">
                                                <div class="input-search">
                                                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                                                    <input type="text" class="search" name="searchword" value="" placeholder="<?php echo $ui['search'];?>" data-fv-notempty="true" data-fv-message="不能为空">
                                                </div>
                                            </form>
                                        </div>
                                </li>
                            <?php } ?>

                        </ul>
                        <?php }else{ ?>
                        <ul class="navbar-nav vertical-align p-l-0 m-b-0 met-head-user" m-id="member" m-type="member">
                            <li class="dropdown text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:;"
                                    class="navbar-avatar dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                <span class="avatar m-r-5"><img src="<?php echo $user['head'];?>" alt="<?php echo $user['username'];?>"/></span>
                                    <?php echo $user['username'];?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right animate">
                                    <li role="presentation">
                                        <a href="<?php echo $c['met_weburl'];?>member/basic.php?lang=<?php echo $_M[lang];?>" class="dropdown-item" title='<?php echo $word['memberIndex9'];?>' role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?php echo $word['memberIndex9'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $c['met_weburl'];?>member/basic.php?lang=<?php echo $_M[lang];?>&a=dosafety" class="dropdown-item" title='<?php echo $word['accsafe'];?>' role="menuitem"><i class="icon wb-lock" aria-hidden="true"></i> <?php echo $word['accsafe'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $c['met_weburl'];?>member/login.php?lang=<?php echo $_M[lang];?>&a=dologout" class="dropdown-item" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> <?php echo $word['memberIndex10'];?></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                    <?php }else{ ?>
                        <?php if($c['shopv2_open']){ ?>
                        <ul class="navbar-nav vertical-align p-l-0 m-b-0 met-head-user" m-id="member" m-type="member">
                            <div class="vertical-align text-center  met-nav-login ass">
                                <div class="vertical-align-middle login-btn">
                                    <a href="<?php echo $_M[url][site];?>member/login.php?lang=<?php echo $_M[lang];?>" class="">
                                        <i class="icon pe-user" aria-hidden="true"></i>
                                        <?php echo $word['login'];?>
                                    </a>
                                </div>
                                    <?php if($ui[head_top_sc_ok]){ ?>
                                    <div class="vertical-align-middle shopcart-btn login-btn shop-sc">
                                        <a href="javascript:void(0);" onclick="AddFavorite('<?php echo $c['met_webname'];?>',location.href)">
                                            <i class="icon fa-heart-o" aria-hidden="true" style="font-size:16px;"></i>
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="vertical-align-middle shopcart-btn login-btn">
                                    <a
                                        href="javascript:void(0)"
                                        title="<?php echo $word['app_shop_cart'];?>"
                                        data-toggle="dropdown"
                                        aria-expanded="false"
                                        data-animation="slide-bottom10"
                                        role="button"
                                        class='topcart-btn'
                                    >
                                        <i class=" icon pe-shopbag" aria-hidden="true"></i>
                                        <?php echo $word['app_shop_cart'];?>
                                        <span class="badge badge-danger up hide topcart-goodnum"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media topcartremove animation-slide-bottom10" role="menu">
                                        <li class="dropdown-menu-header">
                                            <h5><?php echo $word['app_shop_cart'];?></h5>
                                            <span class="label label-round label-danger"><?php echo $word['app_shop_intotal'];?> <span class="topcart-goodnum"></span> <?php echo $word['app_shop_piece'];?><?php echo $word['app_shop_commodity'];?></span>
                                        </li>
                                        <li class="list-group dropdown-scrollable" role="presentation">
                                            <div data-role="container">
                                                <div data-role="content" id="topcart-body"></div>
                                            </div>
                                        </li>
                                        <li class="dropdown-menu-footer p-y-10 p-x-20" role="presentation">
                                            <div class="dropdown-menu-footer-btn">
                                                <a href="<?php echo $url['shop_cart'];?>" class="btn btn-squared btn-danger margin-bottom-5 margin-right-10"><?php echo $word['app_shop_gosettlement'];?></a>
                                            </div>
                                            <span class="red-600 font-size-18 topcart-total"></span>
                                        </li>
                                    </ul>
                                    </div>
                                        <?php if($ui[head_top_search_ok]){ ?>
                                        <div class="vertical-align-middle shopcart-btn login-btn search-index">
                                            <form method="get" action="<?php echo $c['index_url'];?>search/search.php?lang=<?php echo $_M[lang];?>">
                                                <input type="hidden" name="lang" value="<?php echo $_M[lang];?>">
                                                <div class="input-search">
                                                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                                                    <input type="text" class="search" name="searchword" value="" placeholder="<?php echo $ui['search'];?>" data-fv-notempty="true" data-fv-message="不能为空">
                                                </div>
                                            </form>
                                        </div>
                                    <?php } ?>
                        </ul>
                    <?php }else{ ?>
                         <ul class="navbar-nav vertical-align p-l-0 m-b-0 met-head-user met-nav-login" m-id="member" m-type="member">
                            <li class=" text-xs-center vertical-align-middle animation-slide-top">
                                <a href="<?php echo $_M[url][site];?>member/login.php?lang=<?php echo $_M[lang];?>" class="btn btn-squared btn-primary btn-outline m-r-10"><?php echo $word['login'];?></a>
                                <a href="<?php echo $_M[url][site];?>member/register_include.php?lang=<?php echo $_M[lang];?>" class="btn btn-squared btn-success"><?php echo $word['register'];?></a>
                            </li>
                        </ul>
                    <?php } ?>
                <?php } ?>
                </div>
                <?php } ?>
            <!-- 登录 注册-->
        </div>
</div>
<!-- 导航 -->
        <nav class="met-nav nav-pc" role="navigation">
            <div class="clearfix">
                <ul class="navlist spice-nav-list navlist">
                    <li>
                        <a href="<?php echo $c['index_url'];?>" title="<?php echo $word['home'];?>" class="nav-link nav1     <?php if($data['classnow']==10001){ ?>active<?php } ?>
                        "><?php echo $word['home'];?></a>
                    </li>
                    <?php
    $type=strtolower(trim('head'));
    $cid=0;
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = $ui['hide'];
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                            <?php if($ui['navdropdown_ok'] && $m['sub']){ ?>
                            <li class="navli nav-item dropdown m-l-<?php echo $ui['nav_ml'];?>">
                                <?php if($ui['navdropdown_type']){ ?>
                                <a
                                    href="<?php echo $m['url'];?>"
                                    <?php echo $m['urlnew'];?>
                                    title="<?php echo $m['name'];?>"
                                    class="nav-link dropdown-toggle <?php echo $m['class'];?>"
                                    data-toggle="dropdown" data-hover="dropdown"
									<?php echo $m['urlnew'];?>
                                >
                                <?php }else{ ?>
                                <a
                                    href="<?php echo $m['url'];?>"
                                    <?php echo $m['urlnew'];?>
                                    title="<?php echo $m['name'];?>"
                                    class="nav1 nav-link dropdown-toggle <?php echo $m['class'];?>"
                                    data-toggle="dropdown"
									<?php echo $m['urlnew'];?>
                                >
                            <?php } ?>
                                <?php echo $m['name'];?></a>
                                <ul class="navlist2 dropdown-menu dropdown-menu-right dropdown-menu-bullet two-menu" >
                                <div class="navlist2-menu clearfix container">
                                    <div class="col-md-8 navlist2-contaner">
                                        <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                                                <?php if($m['sub']){ ?>
                                                <li class="col-md-3">
                                                    <a href="<?php echo $m['url'];?>" class="<?php echo $m['class'];?> asss" <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
                                                    <ul class="navlist3">
                                                        <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                                                            <li>
                                                                <a href="<?php echo $m['url'];?>" class="<?php echo $m['class'];?>" <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
                                                            </li>
                                                        <?php endforeach;?>
                                                    </ul>
                                                </li>
                                            <?php }else{ ?>
                                                <li class="col-md-3">
                                                    <a href="<?php echo $m['url'];?>" class="<?php echo $m['class'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>">
                                                        <?php echo $m['name'];?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="col-md-4 nav-theme">
                                        <div class="col-md-6 nav-theme-text">
                                            <?php
    $type=strtolower(trim('current'));
    $cid=$ui['right_img'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                                                <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class="<?php echo $m['class'];?>" <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
                                            <?php endforeach;?>
                                            <ul class="navlist3">
                                                <?php
    $type=strtolower(trim('son'));
    $cid=$ui['right_img'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                                                        <?php if($m['_index']<$ui['right_img_num']){ ?>
                                                        <li>
                                                            <a href="<?php echo $m['url'];?>" class="<?php echo $m['class'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
                                                        </li>
                                                    <?php } ?>
                                                <?php endforeach;?>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 nav-theme-img">
                                                <?php
    $type=strtolower(trim('son'));
    $cid=$ui['right_img'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                                                        <?php if($m['_index']<$ui['right_img_num']){ ?>
                                                        <div>
                                                            <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $g['urlnew'];?>>
                                                                <img src="<?php echo $m['columnimg'];?>" alt="<?php echo $m['name'];?>">
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                <?php endforeach;?>
                                        </div>
                                    </div>
                                </div>
                                </ul>
                            </li>
                        <?php }else{ ?>
                            <li class="nav-item ">
                                <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class="link <?php echo $m['class'];?> nav1" <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
                            </li>
                        <?php } ?>
                    <?php endforeach;?>
                </ul>
            </div>
        </nav>
        
<nav id="mobileNav"  class="$uicss collapse nav-mod">
        <?php if($c[met_member_register]&&$ui[member]){ ?>
        <div class="dl-mod navbar-collapse navbar-collapse-toolbar pull-md-right p-0" id='met-head-user-collapse' m-id='member' m-type='member'>
                    <?php if($user){ ?>
                        <?php if($c['shopv2_open']){ ?>
                        <ul class="vertical-align p-l-0 m-b-0 met-head-user met-head-shop" m-id="member" m-type="member">
                            <li class="dropdown inline-block text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:;"
                                    class="navbar-avatar dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                <span class="avatar m-r-5"><img src="<?php echo $user['head'];?>" alt="<?php echo $user['username'];?>"/></span>
                                    <?php echo $user['username'];?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right animate" role="menu">
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_profile'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?php echo $word['app_shop_personal'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_order'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-order" aria-hidden="true"></i> <?php echo $word['app_shop_myorder'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_favorite'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-heart" aria-hidden="true"></i> <?php echo $word['app_shop_myfavorite'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_discount'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-bookmark" aria-hidden="true"></i> <?php echo $word['app_shop_mydiscount'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_member_base'];?>&nojump=1" class="dropdown-item" target="_blank" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> <?php echo $word['app_shop_settings'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_member_login_out'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> <?php echo $word['app_shop_out'];?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown inline-block shop_cart text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:void(0)"
                                    title="<?php echo $word['app_shop_cart'];?>"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                    data-animation="slide-bottom10"
                                    role="button"
                                    class='topcart-btn'
                                >
                                    <i class=" icon pe-shopbag" aria-hidden="true"></i>
                                    <?php echo $word['app_shop_cart'];?>
                                    <span class="badge badge-danger up hide topcart-goodnum"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media topcartremove animation-slide-bottom10" role="menu">
                                    <li class="dropdown-menu-header">
                                        <h5><?php echo $word['app_shop_cart'];?></h5>
                                        <span class="label label-round label-danger"><?php echo $word['app_shop_intotal'];?> <span class="topcart-goodnum"></span> <?php echo $word['app_shop_piece'];?><?php echo $word['app_shop_commodity'];?></span>
                                    </li>
                                    <li class="list-group dropdown-scrollable" role="presentation">
                                        <div data-role="container">
                                            <div data-role="content" id="topcart-body"></div>
                                        </div>
                                    </li>
                                    <li class="dropdown-menu-footer p-y-10 p-x-20" role="presentation">
                                        <div class="dropdown-menu-footer-btn">
                                            <a href="<?php echo $url['shop_cart'];?>" class="btn btn-squared btn-danger margin-bottom-5 margin-right-10"><?php echo $word['app_shop_gosettlement'];?></a>
                                        </div>
                                        <span class="red-600 font-size-18 topcart-total"></span>
                                    </li>
                                </ul>
                            </li>
                                <?php if($ui[head_top_sc_ok]){ ?>
                                <li class="inline-block text-xs-center vertical-align-middle animation-slide-top">
                                    <div class="vertical-align-middle shopcart-btn login-btn shop-sc">
                                        <a href="javascript:void(0);" onclick="AddFavorite('<?php echo $c['met_webname'];?>',location.href)">
                                            <i class="icon fa-heart-o" aria-hidden="true" style="font-size:16px;"></i>
                                        </a>  
                                    </div>
                                </li>
                            <?php } ?>
                                <?php if($ui[head_top_search_ok]){ ?>
                                <li class="inline-block text-xs-center vertical-align-middle animation-slide-top">
                                    <div class="vertical-align-middle shopcart-btn login-btn search-index">
                                            <form method="get" action="<?php echo $c['index_url'];?>search/search.php?lang=<?php echo $_M[lang];?>">
                                                <input type="hidden" name="lang" value="<?php echo $_M[lang];?>">
                                                <div class="input-search">
                                                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                                                    <input type="text" class="search" name="searchword" value="" placeholder="<?php echo $ui['search'];?>" data-fv-notempty="true" data-fv-message="不能为空">
                                                </div>
                                            </form>
                                        </div>
                                </li>
                            <?php } ?>
                                <?php if($ui[head_weixin_ok]){ ?>
                                <li class="met-langlist nav-item vertical-align animation-slide-top weixin-box">
                                    <a id="met-weixin" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement='bottom' data-width='155' data-padding='0' data-content="<div class='text-xs-center'>
                                        <img src='<?php echo $ui['footinfo_wx'];?>' alt='<?php echo $c['met_webname'];?>' width='150' height='150' id='met-weixin-img'></div>
                                    ">
                                        <i class="icon fa-qrcode" aria-hidden="true" style="font-size: 20px;margin-top: 5px;"></i>
                                    </a>  
                                </li>
                            <?php } ?>
                        </ul>
                        <?php }else{ ?>
                        <ul class="vertical-align p-l-0 m-b-0 met-head-user" m-id="member" m-type="member">
                            <li class="dropdown text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:;"
                                    class="navbar-avatar dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                <span class="avatar m-r-5"><img src="<?php echo $user['head'];?>" alt="<?php echo $user['username'];?>"/></span>
                                    <?php echo $user['username'];?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right animate">
                                    <li role="presentation">
                                        <a href="<?php echo $c['met_weburl'];?>member/basic.php?lang=<?php echo $_M[lang];?>" class="dropdown-item" title='<?php echo $word['memberIndex9'];?>' role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?php echo $word['memberIndex9'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $c['met_weburl'];?>member/basic.php?lang=<?php echo $_M[lang];?>&a=dosafety" class="dropdown-item" title='<?php echo $word['accsafe'];?>' role="menuitem"><i class="icon wb-lock" aria-hidden="true"></i> <?php echo $word['accsafe'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $c['met_weburl'];?>member/login.php?lang=<?php echo $_M[lang];?>&a=dologout" class="dropdown-item" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> <?php echo $word['memberIndex10'];?></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                    <?php }else{ ?>
                        <?php if($c['shopv2_open']){ ?>
                        <ul class=" vertical-align p-l-0 m-b-0 met-head-user" m-id="member" m-type="member">
                            <div class="vertical-align text-center  met-nav-login ass">
                                <div class="vertical-align-middle login-btn">
                                    <a href="<?php echo $_M[url][site];?>member/login.php?lang=<?php echo $_M[lang];?>" class="">
                                        <i class="icon pe-user" aria-hidden="true"></i>
                                        <?php echo $_M['word']['app_shop_login'];?>
                                    </a>
                                </div>
                                    <?php if($ui[head_top_sc_ok]){ ?>
                                    <div class="vertical-align-middle shopcart-btn login-btn shop-sc">
                                        <a href="javascript:void(0);" onclick="AddFavorite('<?php echo $c['met_webname'];?>',location.href)">
                                            <i class="icon fa-heart-o" aria-hidden="true" style="font-size:16px;"></i>
                                        </a>  
                                    </div>
                                <?php } ?>
                                <div class="vertical-align-middle shopcart-btn login-btn">
                                    <a
                                        href="javascript:void(0)"
                                        title="<?php echo $_M['word']['app_shop_cart'];?>"
                                        data-toggle="dropdown"
                                        aria-expanded="false"
                                        data-animation="fade"
                                        role="button"
                                    >
                                        <i class="icon pe-shopbag" aria-hidden="true"></i>
                                        <?php echo $_M['word']['app_shop_cart'];?>
                                        <span class="up hide topcart-goodnum"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media topcartremove animation-fade" role="menu">
                                        <li class="dropdown-menu-header">
                                            <h5><?php echo $_M['word']['app_shop_cart'];?></h5>
                                            <span class="label label-round label-danger"><?php echo $_M['word']['app_shop_intotal'];?> <span class="topcart-goodnum"></span> <?php echo $_M['word']['app_shop_piece'];?><?php echo $_M['word']['app_shop_commodity'];?></span>
                                        </li>
                                        <li class="list-group dropdown-scrollable" role="presentation">
                                            <div data-role="container">
                                                <div data-role="content" id="topcart-body"></div>
                                            </div>
                                        </li>
                                        <li class="dropdown-menu-footer" role="presentation">
                                            <div class="dropdown-menu-footer-btn">
                                                <a href="<?php echo $_M['url']['shop_cart'];?>" class="btn btn-squared btn-danger margin-bottom-5 margin-right-10"><?php echo $_M['word']['app_shop_gosettlement'];?></a>
                                            </div>
                                            <span class="red-600 font-size-18 topcarttotal"></span>
                                        </li>
                                    </ul>
                                    </div>
                                        <?php if($ui[head_top_search_ok]){ ?>
                                        <div class="vertical-align-middle shopcart-btn login-btn search-index">
                                            <form method="get" action="<?php echo $c['index_url'];?>search/search.php?lang=<?php echo $_M[lang];?>">
                                                <input type="hidden" name="lang" value="<?php echo $_M[lang];?>">
                                                <div class="input-search">
                                                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                                                    <input type="text" class="search" name="searchword" value="" placeholder="<?php echo $ui['search'];?>" data-fv-notempty="true" data-fv-message="不能为空">
                                                </div>
                                            </form>
                                        </div>
                                    <?php } ?>
                        </ul>
                    <?php }else{ ?>
                         <ul class=" vertical-align p-l-0 m-b-0 met-head-user met-nav-login" m-id="member" m-type="member">
                            <li class=" text-xs-center vertical-align-middle animation-slide-top">
                                <a href="<?php echo $_M[url][site];?>member/login.php?lang=<?php echo $_M[lang];?>" class="btn btn-squared btn-primary btn-outline m-r-10"><?php echo $word['login'];?></a>
                                <a href="<?php echo $_M[url][site];?>member/register_include.php?lang=<?php echo $_M[lang];?>" class="btn btn-squared btn-success"><?php echo $word['register'];?></a>
                            </li>
                        </ul>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
    <div class="$uicss-acc" m-id='<?php echo $ui['mid'];?>'>
        <ul  class="accordion">
            <li>
                <div class="link">
                    <a href="<?php echo $c['index_url'];?>" title="<?php echo $word['home'];?>" class="    <?php if($data['classnow']==10001){ ?>open<?php } ?>
                    "><?php echo $word['home'];?></a>
                </div>
            </li>
            <?php
    $type=strtolower(trim('head'));
    $cid=0;
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = $ui['hide'];
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="open";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                    <?php if($m['sub']){ ?>
                    <li class="<?php echo $m['class'];?>">
                        <div class="link">
                            <?php echo $m['name'];?>
                            <i class="fa fa-chevron-down"></i>
                        </div>
                        <ul class="submenu <?php echo $m['class'];?>-block">
                            <li class="<?php echo $m['class'];?>">
                                <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>"><?php echo $ui['all'];?></a>
                            </li>
                            <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="open-li";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                                    <?php if($m['sub']){ ?>
                                    <li class="<?php echo $m['class'];?>">
                                            <div class="links">
                                                <div class="links-div">
                                                    <span><?php echo $m['name'];?></span>
                                                    <i class="fa fa-chevron-down"></i>
                                                </div>
                                                <ul class="links-ul <?php echo $m['class'];?>-block">
                                                    <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="active-op";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                                                        <li class="<?php echo $m['class'];?>">
                                                            <a href="<?php echo $m['url'];?>" title="<?php echo $v['title'];?>"><?php echo $m['name'];?></a>
                                                        </li>
                                                    <?php endforeach;?>
                                                </ul>
                                            </div>
                                        </li>
                                <?php }else{ ?>
                                    <li class="<?php echo $m['class'];?>">
                                        <a href="<?php echo $m['url'];?>" title="<?php echo $v['title'];?>"><?php echo $m['name'];?></a>
                                    </li>
                                <?php } ?>
                            <?php endforeach;?>
                        </ul>
                    </li>
                <?php }else{ ?>
                    <li class="<?php echo $m['class'];?>">
                        <div class="link">
                            <a href="<?php echo $m['url'];?>"><?php echo $m['name'];?></a>
                        </div>
                    </li>
                <?php } ?>
            <?php endforeach;?>
            <!-- 语言 -->
                <?php if($sub>1){ ?>
                    <?php if($c['met_lang_mark'] && $ui[lang_ok]){ ?>
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
?><?php endforeach;?>
                    <li class="<?php echo $m['class'];?>"  m-id='lang' m-type='lang'>
                        <div class="link">
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
                                    <?php if($data['lang']==$v['mark']){ ?>
                                            <?php if($ui['langlist_icon_ok']){ ?>
                                            <span class="flag-icon flag-icon-<?php echo $v['iconname'];?>"></span>
                                        <?php } ?>
                                        <?php echo $v['name'];?>
                                        <i class="fa fa-chevron-down"></i>

                                <?php } ?>
                            <?php endforeach;?>
                        </div>
                        <ul class="submenu">
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
                                <li>
                                    <a href="<?php echo $v['met_weburl'];?>" title="<?php echo $v['name'];?>" class='dropdown-item'>
                                            <?php if($ui['langlist_icon_ok']){ ?>
                                        <span class="flag-icon flag-icon-<?php echo $v['iconname'];?>"></span>
                                        <?php } ?>
                                        <?php echo $v['name'];?>
                                    </a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </li>
                <?php } ?>
            <?php } ?>
                <?php if($c['met_ch_lang'] && $ui['simplified']){ ?>
                    <?php if($data[lang]==cn){ ?>
                    <li class="met-langlist" m-id="lang" m-type="lang">
                        <div class="link">
                            <button type="button" class="btn btn-lang btn-cntotc" data-tolang='tc'>繁体</button>
                            <?php }else if($data[lang]==zh){ ?>
                            <button type="button" class="btn btn-lang btn-cntotc"  data-tolang='cn'>简体</button>
                        </div>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>

    </div>

                </div>
                </if>
</nav>
<!-- 导航 -->
</header>
</div>