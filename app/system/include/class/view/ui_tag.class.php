<?php

class ui_tag extends tag {
    // 必须包含config属性 不可修改
    public $config = array(
        'ui'  => array( 'block' => 0, 'level' => 0 ),
        'met_meta'  => array( 'block' => 0, 'level' => 0 ),
        'met_foot'  => array( 'block' => 0, 'level' => 0 ),
    );

    public function _ui($attr, $content, &$met)
    {

        $name = isset($attr['name']) ? $attr['name'] : '';
        $style = isset($attr['style']) ? $attr['style'] : 'met-1';
        $id = isset($attr['id']) ? $attr['id'] : 0;
        load::sys_class('view/ui_compile');
        $ui_compile = new ui_compile();
        $ui = $ui_compile->list_local_config($id);

        if(!$ui['ui_show']){
            global $_M;
            if($_M['form']['pageset'] != 1){
                return;
            }
        }
        $file = PATH_TEM."ui/{$name}/{$style}/index.php";
        if(!is_file($file)){
            $file = PATH_ALL_APP."met_ui/admin/ui/{$name}/{$style}/index.php";

            if(!is_file($file)){
                return;
            }
        }
        $view = new met_view();
        $parent_name = $name;
        $view->fetch($file);
        $cache =  file_get_contents($view->compileFile);
        $php = "
        <?php
            \$id = {$id};
            \$style = \"{$style}\";
            if(!isset(\$ui_compile)){
                load::sys_class('view/ui_compile');
                \$ui_compile = new ui_compile();
            }
            \$ui = \$ui_compile->list_local_config(\$id);
            \$ui['has'] =\$ui_compile->list_page_config(\$met_page);
            ?>";
            $cache = $php.$cache;
            $cache = str_replace("<?php defined('IN_MET') or exit('No permission'); ?>", '', $cache);
            $cache = str_replace('$uicss', $parent_name.'_'.$style, $cache);

        return $cache;
    }


    public function _met_meta($attr, $content, &$met)
    {
        global $_M;
        $php = '
<?php
$metinfover_v2=$c["metinfover"]=="v2"?true:false;
$met_file_version=str_replace(".","",$c["metcms_v"]).$c["met_patch"];
$lang_json_file_ok=file_exists(PATH_WEB."cache/lang_json_".$_M["lang"].".js");
if(!$lang_json_file_ok){
    echo "<meta http-equiv='."'refresh'"." content='0'".'/>";
}
$html_hidden=$lang_json_file_ok?"":"hidden";
if(!$data["module"] || $data["module"]==10){
    $nofollow=1;
}
$user_name=$_M["user"]?$_M["user"]["username"]:"";
?>
<!DOCTYPE HTML>
<html class="{$html_class}" {$html_hidden}>
<head>
<meta charset="utf-8">
<?php if($nofollow){ ?>
<meta name="robots" content="noindex,nofllow" />
<?php } ?>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,minimal-ui">
<meta name="format-detection" content="telephone=no">
<title>{$data.page_title}</title>
<meta name="description" content="{$data.page_description}">
<meta name="keywords" content="{$data.page_keywords}">
<meta name="generator" content="MetInfo {$c.metcms_v}" data-variable="{$c.met_weburl}|{$data.lang}|{$data.synchronous}|{$c.met_skin_user}|{$data.module}|{$data.classnow}|{$data.id}" data-user_name="{$user_name}">
<link href="{$c.met_weburl}favicon.ico" rel="shortcut icon" type="image/x-icon">
<?php
if($lang_json_file_ok){
    $basic_css_name=$metinfover_v2?"":"_web";
    $isLteIe9=strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 9")!==false || strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 8")!==false;
    if($isLteIe9){
?>
<link href="{$url.site}app/system/include/static2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="{$url.site}app/system/include/static2/css/bootstrap-extend.min.css" rel="stylesheet" type="text/css">
<link href="{$url.site}app/system/include/static2/assets/css/site.min.css" rel="stylesheet" type="text/css">
<link href="{$url.site}public/ui/v2/static/css/basic{$basic_css_name}-lteie9-1.css?{$met_file_version}" rel="stylesheet" type="text/css">
<?php }else{ ?>
<link rel="stylesheet" type="text/css" href="{$url.site}public/ui/v2/static/css/basic{$basic_css_name}.css?{$met_file_version}">
<?php
    }
    if($metinfover_v2){
        if(file_exists(PATH_TEM."cache/common.css")){
            $common_css_time = filemtime(PATH_TEM."cache/common.css");
?>
<link rel="stylesheet" type="text/css" href="{$c.met_weburl}templates/{$c.met_skin_user}/cache/common.css?{$common_css_time}">
<?php
        }
        if($met_page){
            if($met_page == 404) $met_page = "show";
            $page_css_time = filemtime(PATH_TEM."cache/".$met_page."_".$_M["lang"].".css");
?>
<link rel="stylesheet" type="text/css" href="{$c.met_weburl}templates/{$c.met_skin_user}/cache/{$met_page}_{$_M["lang"]}.css?{$page_css_time}">
<?php
        }
    }
    if(is_mobile() && $c["met_headstat_mobile"]){
?>
{$c.met_headstat_mobile}'."\n".'
<?php }else if(!is_mobile() && $c["met_headstat"]){?>
{$c.met_headstat}'."\n".'
<?php
    }
    if($_M["html_plugin"]["head_script"]){
?>
{$_M["html_plugin"]["head_script"]}'."\n".'
<?php } ?>
<style>
body{
<?php if($g["bodybgimg"]){ ?>
    background-image: url({$g.bodybgimg}) !important;background-position: center;background-repeat: no-repeat;
<?php } ?>
    background-color:{$g.bodybgcolor} !important;font-family:{$g.met_font} !important;}
</style>
<!--[if lte IE 9]>
<script src="{$_M["url"]["site"]}public/ui/v2/static/js/lteie9.js"></script>
<![endif]-->
</head>
<!--[if lte IE 8]>
<div class="text-xs-center m-b-0 bg-blue-grey-100 alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>
    {$word.browserupdatetips}
</div>
<![endif]-->
<body>
<?php } ?>';

    return $php;
    }

    public function _met_foot($attr,$content,&$met)
    {
        global $_M;
        $php = '
<?php if($lang_json_file_ok){ ?>
<input type="hidden" name="met_lazyloadbg" value="{$g.lazyloadbg}">
<?php if($c["shopv2_open"]){ ?>
<script>
var jsonurl="{$url.shop_cart_jsonlist}",
    totalurl="{$url.shop_cart_modify}",
    delurl="{$url.shop_cart_del}",
    price_prefix="{$c.shopv2_price_str_prefix}",
    price_suffix="{$c.shopv2_price_str_suffix}";
</script>
<?php
    }
}
$basic_js_name=$metinfover_v2?"":"_web";
?>
<script src="{$c.met_weburl}public/ui/v2/static/js/basic{$basic_js_name}.js?{$met_file_version}"></script>
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
var metpagejs="{$c.met_weburl}templates/{$c.met_skin_user}/cache/{$metpagejs}";
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
<script src="{$c.met_weburl}cache/lang_json_{$data.lang}.js?{$met_lang_time}"></script>
<?php
    if($c["shopv2_open"]){
?>
<script src="{$c.met_weburl}app/app/shop/web/templates/met/js/own.js?{$met_file_version}"></script>
<?php
    }
    if(is_mobile() && $c["met_footstat_mobile"]){
?>
{$c.met_footstat_mobile}'."\n".'
<?php }else if(!is_mobile() && $c["met_footstat"]){?>
{$c.met_footstat}'."\n".'
<?php
    }
    if($_M["html_plugin"]["foot_script"]){
?>
{$_M["html_plugin"]["foot_script"]}'."\n".'
<?php
    }
}
?>
</body>
</html>';

    return $php;
    }

}