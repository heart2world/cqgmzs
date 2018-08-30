<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss text-xs-center"  m-id="<?php echo $ui['mid'];?>">
    <div class="container">
        <div class="navbg">
            <ul class="imglist" >
                <?php
    $type=strtolower(trim('son'));
    $cid=$ui['service_id'];
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
                    <li class="imgitem">
                            <?php if($ui['navtxt_or']){ ?>
                        <img src="<?php echo $m['indeximg'];?>" alt="<?php echo $m['name'];?>">
                        <?php }else{ ?>
                        <p><?php echo $m['ctitle'];?></p>
                        <?php } ?>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
        <ul class="service-list" >
            <?php
    $type=strtolower(trim('son'));
    $cid=$ui['service_id'];
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
                <li class="item">
                    <div class="mainbox">
                        <img src="<?php echo thumb($m['columnimg'],$ui['imgx'],$ui['imgh']);?>" alt="<?php echo $m['name'];?>">
                        <div class="txtbox" data-bg="<?php echo $ui['contgbgcolor'];?>|<?php echo $ui['side_op'];?>">
                            <h4><?php echo $m['name'];?></h4>
                            <p><?php echo $m['description'];?></p>
                            <div class="link">
                                <a href="<?php echo $m['url'];?>" alt="<?php echo $m['name'];?>"><?php echo $ui['moretxt'];?></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</section>