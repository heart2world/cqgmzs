<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title=$_M['word']['pay_upayb2c'];
$_M['pay_nav'][2]['active']='active';
?>
<include file='sys_admin/head_v2'/>
<include file='app/pay_nav'/>
<form method="POST" action="{$_M[url][own_form]}a=dosaveunionpay&type={$data.paytype}" target="_self" enctype="multipart/form-data">
    <div class="metadmin-fmbx">
        <h3 class="example-title">{$word.pay_basiccongi}</h3>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_upay_merid}</label></dt>
            <dd class="form-group">
                <input type="text" name="merid" class="form-control" value="{$data.merid}">
            </dd>
        </dl>
        <h3 class="example-title">{$word.pay_upay_cert_path}</h3>
        <dl>
            <dd class="alert dark alert-primary radius0">
                {$word.pay_upay_tips3}
                <a href="{$_M['url']['site_admin']}index.php?n=safe&c=index&a=doindex&lang={$_M['lang']}" target="_blank">{$word.pay_upay_tips4}</a>
                {$word.pay_upay_tips5}
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_upay_sign_cert_path}</label></dt>
            <dd class='form-group'>
                <!--<div class="form-group clearfix">
                    <input name="sign_cert_path" type="text" data-upload-type="doupfile" class="form-control" value="{$data.sign_cert_path}"/>
                </div>-->
                <div class="input-group input-group-file m-r-10">
                    <input type="text" name="sign_cert_path" readonly="" value="{$data.sign_cert_path}" class="form-control">
                    <span class="input-group-btn">
                        <input type="file" name="sign_cert_path" data-plugin='fileinput'>
                    </span>
                </div>
                <span class="text-help">{$word.pay_upay_fpfx}</span>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_upay_sign_cert_pwd}</label></dt>
            <dd class='form-group'>
                <input type="text" name="sign_cert_pwd" class="form-control" value="{$data.sign_cert_pwd}">
            </dd>
        </dl>
        <!--
        <dl>
            <dt>银联公钥证书</dt>
            <dd class="ftype_upload">
                <div class="fbox">
                    <input name="encrypt_cert_path" type="text" data-upload-type="doupfile" value="{$encrypt_cert_path}"/>
                </div>
            </dd>
        </dl>
        -->
        <!--
        <h3 class="v52fmbx_hr">日志配置</h3>
        <dl>
            <dt>日志级别</dt>
            <dd class="ftype_radio ftype_transverse">
                <div class="fbox">
                    <label><input name="log_level" type="radio" value="1" data-checked="{$log_level}">开启日志</label>
                    <label><input name="log_level" type="radio" value="0">关闭日志</label>
                </div>
            </dd>
        </dl>\
        -->
        <h3 class="example-title">{$word.pay_aipmodset}</h3>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_test_mod}</label></dt>
            <dd>
                <div class="clearfix">
                    <div class="radio-custom radio-primary radio-inline">
                        <input type="radio" name="unipay_test" value="0" id='unipay_test0' data-checked="{$data.unipay_test}" >
                        <label for='unipay_test0'>{$word.close}</label>
                    </div>
                    <div class="radio-custom radio-primary radio-inline" >
                        <input type="radio" name="unipay_test" value="1" id='unipay_test1'>
                        <label for='unipay_test1'>{$word.open}</label>
                    </div>
                </div>
                <span class='m-t-10 text-help'>{$word.pay_upay_tips2}</span>
            </dd>
        </dl>
        <dl>
            <dt></dt>
            <dd>
                <input type="submit" value="{$word.Submit}" class="btn btn-primary">
            </dd>
        </dl>
    </div>
</form>
<include file='sys_admin/foot_v2'/>