<?php defined('IN_MET') or exit('No permission'); ?>
<?php $met_page = "showimg";?>
<?php
$metinfover_v2=$c["metinfover"]=="v2"?true:false;
$met_file_version=str_replace(".","",$c["metcms_v"]).$c["met_patch"];
$lang_json_file_ok=file_exists(PATH_WEB."cache/lang_json_".$_M["lang"].".js");
if(!$lang_json_file_ok){
    echo "<meta http-equiv='refresh' content='0'/>";
}
$html_hidden=$lang_json_file_ok?"":"hidden";
if(!$data["module"] || $data["module"]==10){
    $nofollow=1;
}
$user_name=$_M["user"]?$_M["user"]["username"]:"";
?>
<!DOCTYPE HTML>
<html class="<?php echo $html_class;?>" <?php echo $html_hidden;?>>
<head>
<meta charset="utf-8">
<?php if($nofollow){ ?>
<meta name="robots" content="noindex,nofllow" />
<?php } ?>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,minimal-ui">
<meta name="format-detection" content="telephone=no">
<title><?php echo $data['page_title'];?></title>
<meta name="description" content="<?php echo $data['page_description'];?>">
<meta name="keywords" content="<?php echo $data['page_keywords'];?>">
<meta name="generator" content="MetInfo <?php echo $c['metcms_v'];?>" data-variable="<?php echo $c['met_weburl'];?>|<?php echo $data['lang'];?>|<?php echo $data['synchronous'];?>|<?php echo $c['met_skin_user'];?>|<?php echo $data['module'];?>|<?php echo $data['classnow'];?>|<?php echo $data['id'];?>" data-user_name="<?php echo $user_name;?>">
<link href="<?php echo $c['met_weburl'];?>favicon.ico" rel="shortcut icon" type="image/x-icon">
<?php
if($lang_json_file_ok){
    $basic_css_name=$metinfover_v2?"":"_web";
    $isLteIe9=strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 9")!==false || strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 8")!==false;
    if($isLteIe9){
?>
<link href="<?php echo $url['site'];?>app/system/include/static2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url['site'];?>app/system/include/static2/css/bootstrap-extend.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url['site'];?>app/system/include/static2/assets/css/site.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url['site'];?>public/ui/v2/static/css/basic<?php echo $basic_css_name;?>-lteie9-1.css?<?php echo $met_file_version;?>" rel="stylesheet" type="text/css">
<?php }else{ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $url['site'];?>public/ui/v2/static/css/basic<?php echo $basic_css_name;?>.css?<?php echo $met_file_version;?>">
<?php
    }
    if($metinfover_v2){
        if(file_exists(PATH_TEM."cache/common.css")){
            $common_css_time = filemtime(PATH_TEM."cache/common.css");
?>
<link rel="stylesheet" type="text/css" href="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/common.css?<?php echo $common_css_time;?>">
<?php
        }
        if($met_page){
            if($met_page == 404) $met_page = "show";
            $page_css_time = filemtime(PATH_TEM."cache/".$met_page."_".$_M["lang"].".css");
?>
<link rel="stylesheet" type="text/css" href="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/<?php echo $met_page;?>_<?php echo $_M["lang"];?>.css?<?php echo $page_css_time;?>">
<?php
        }
    }
    if(is_mobile() && $c["met_headstat_mobile"]){
?>
<?php echo $c['met_headstat_mobile'];?>

<?php }else if(!is_mobile() && $c["met_headstat"]){?>
<?php echo $c['met_headstat'];?>

<?php
    }
    if($_M["html_plugin"]["head_script"]){
?>
<?php echo $_M["html_plugin"]["head_script"];?>

<?php } ?>
<style>
body{
<?php if($g["bodybgimg"]){ ?>
    background-image: url(<?php echo $g['bodybgimg'];?>) !important;background-position: center;background-repeat: no-repeat;
<?php } ?>
    background-color:<?php echo $g['bodybgcolor'];?> !important;font-family:<?php echo $g['met_font'];?> !important;}
</style>
<!--[if lte IE 9]>
<script src="<?php echo $_M["url"]["site"];?>public/ui/v2/static/js/lteie9.js"></script>
<![endif]-->
</head>
<!--[if lte IE 8]>
<div class="text-xs-center m-b-0 bg-blue-grey-100 alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>
    <?php echo $word['browserupdatetips'];?>
</div>
<![endif]-->
<body>
<?php } ?>

        <?php
            $id = 1;
            $style = "met_21_9";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
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

<div class="head_nav_met_21_9 navbar">
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
        
<nav id="mobileNav"  class="head_nav_met_21_9 collapse nav-mod">
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
    <div class="head_nav_met_21_9-acc" m-id='<?php echo $ui['mid'];?>'>
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

        <?php
            $id = 2;
            $style = "met_11_3";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<?php
    $type=strtolower(trim('current'));
    $cid=$data['classnow'];
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
            $m['class']="";
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
<?php
$ui['listhide']=explode('|', $ui['listhide']);
$ui['detailhide']=explode('|', $ui['detailhide']);
if($data['name']){
    foreach ($ui['listhide'] as $val) {
        if($val==$data['name']){
            $hide=0;
            break;
        }else{
            $hide=1;
        }
    }
}
if($data['title']){
    foreach ($ui['detailhide'] as $val) {
        if($val==$m['name']){
            $hide=0;
            break;
        }else{
            $hide=1;
        }
    }
}
?>
<?php endforeach;?>
    <?php if($hide){ ?>
<?php 
    $banner = load::sys_class('label', 'new')->get('banner')->get_column_banner($data['classnow']);
    $sub = count($banner['img']);
    foreach($banner['img'] as $index=>$v):
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['type'] = $banner['config']['type'];
        $v['y'] = $banner['config']['y'];
        $v['sub'] = $sub;
?><?php endforeach;?>
    <?php if($sub || $data['classnow']==10001){ ?>
<div class="banner_met_11_3 page-bg" style='' m-id='<?php echo $ui['mid'];?>' m-type="banner">
        <?php if(!$sub){ ?>
        <h2 class="text-xs-center">请添加图片内容</h2>
    <?php } ?>
    <?php 
    $banner = load::sys_class('label', 'new')->get('banner')->get_column_banner($data['classnow']);
    $sub = count($banner['img']);
    foreach($banner['img'] as $index=>$v):
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['type'] = $banner['config']['type'];
        $v['y'] = $banner['config']['y'];
        $v['sub'] = $sub;
?>
    <div class="slick-slide">
        <img class="cover-image" src="<?php echo $v['img_path'];?>" srcset='<?php echo thumb($v['img_path'],767);?> 767w,<?php echo $v['img_path'];?>' sizes="(max-width: 767px) 767px" alt="<?php echo $v['img_title'];?>" data-height='<?php echo $v['height'];?>|<?php echo $v['height_t'];?>|<?php echo $v['height_m'];?>' data-fade="<?php echo $ui['fade'];?>" data-autoplayspeed=<?php echo $ui['autoplaySpeed'];?> data-speed="<?php echo $ui['speed'];?>">
            <?php if($v['img_title']){ ?>
        <div class="banner-text p-<?php echo $v['img_text_position'];?>">
            <div class='container'>
                <div class='banner-text-con'>
                    <div>
                        <span class="line animation-slide-bottom"></span>
                        <h3 class="animation-slide-bottom font-weight-500" style="color:<?php echo $v['img_title_color'];?>"><?php echo $v['img_title'];?></h3>
                        <p class="animation-slide-bottom" style='color:<?php echo $v['img_des_color'];?>'><?php echo $v['img_des'];?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
            <?php if($v['img_link']){ ?>
        <a href="<?php echo $v['img_link'];?>" title="<?php echo $v['img_des'];?>" target='_blank'></a>
        <?php } ?>
    </div>
    <?php endforeach;?>
</div>
<?php }else{ ?>
    <?php
    $type=strtolower(trim('current'));
    $cid=$data['class1'];
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
            $m['class']="";
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
        <div class="banner_met_11_3-ny vertical-align text-xs-center" m-id='<?php echo $ui['mid'];?>' m-type='banner'>
            <h1 class="vertical-align-middle"><?php echo $m[name];?></h1>
        </div>
    <?php endforeach;?>
<?php } ?>
<?php } ?>


        <?php
            $id = 43;
            $style = "met_16_1";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="img_list_detail_met_16_1 page-content border-top1" m-id='<?php echo $ui['mid'];?>'>
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

        <?php
            $id = 3;
            $style = "met_21_4";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<footer class='foot_info_met_21_4 met-foot p-y-20 border-top1' m-id='<?php echo $ui['mid'];?>' m-type='foot'>
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


        <?php
            $id = 45;
            $style = "met_16_1";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<button type="button" class="btn btn-icon btn-primary btn-squared back_top_met_16_1 met-scroll-top" hidden m-id='<?php echo $ui['mid'];?>' m-type='nocontent'>
	<i class="icon wb-chevron-up" aria-hidden="true"></i>
</button>

<?php if($lang_json_file_ok){ ?>
<input type="hidden" name="met_lazyloadbg" value="<?php echo $g['lazyloadbg'];?>">
<?php if($c["shopv2_open"]){ ?>
<script>
var jsonurl="<?php echo $url['shop_cart_jsonlist'];?>",
    totalurl="<?php echo $url['shop_cart_modify'];?>",
    delurl="<?php echo $url['shop_cart_del'];?>",
    price_prefix="<?php echo $c['shopv2_price_str_prefix'];?>",
    price_suffix="<?php echo $c['shopv2_price_str_suffix'];?>";
</script>
<?php
    }
}
$basic_js_name=$metinfover_v2?"":"_web";
?>
<script src="<?php echo $c['met_weburl'];?>public/ui/v2/static/js/basic<?php echo $basic_js_name;?>.js?<?php echo $met_file_version;?>"></script>
<?php
if($lang_json_file_ok){
    if($metinfover_v2){
        if(file_exists(PATH_TEM."cache/common.js")){
            $common_js_time = filemtime(PATH_TEM."cache/common.js");
            $metpagejs="common.js?".$common_js_time;
        }
        if($met_page){
            $page_js_time = filemtime(PATH_TEM."cache/".$met_page."_".$_M["lang"].".js");
            $metpagejs=$met_page."_".$_M["lang"].".js?".$page_js_time;
        }
?>
<script>
var metpagejs="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/<?php echo $metpagejs;?>";
if(typeof jQuery != "undefined"){
    metPageJs(metpagejs);
}else{
    var metPageInterval=setInterval(function(){
        if(typeof jQuery != "undefined"){
            metPageJs(metpagejs);
            clearInterval(metPageInterval);
        }
    },50)
}
</script>
<?php
    }
    $met_lang_time = filemtime(PATH_WEB."cache/lang_json_".$data["lang"].".js");
?>
<script src="<?php echo $c['met_weburl'];?>cache/lang_json_<?php echo $data['lang'];?>.js?<?php echo $met_lang_time;?>"></script>
<?php
    if($c["shopv2_open"]){
?>
<script src="<?php echo $c['met_weburl'];?>app/app/shop/web/templates/met/js/own.js?<?php echo $met_file_version;?>"></script>
<?php
    }
    if(is_mobile() && $c["met_footstat_mobile"]){
?>
<?php echo $c['met_footstat_mobile'];?>

<?php }else if(!is_mobile() && $c["met_footstat"]){?>
<?php echo $c['met_footstat'];?>

<?php
    }
    if($_M["html_plugin"]["foot_script"]){
?>
<?php echo $_M["html_plugin"]["foot_script"];?>

<?php
    }
}
?>
</body>
</html>