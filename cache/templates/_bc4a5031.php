<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss met-news" m-id='<?php echo $ui['mid'];?>'>
    <div class="container">
        <div class="row">
        <div class="news-title-bor">
            <div class="container">
                <div class="news-title-con">
                    <?php
    $type=strtolower(trim('current'));
    $cid=$data[classnow];
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
                        <span class="news-top"><?php echo $m['name'];?></span>
                        <p class="news-desc"><?php echo $m['description'];?></p>
                        <span class="news-hr"></span>
                        <p class="news-xs"><?php echo $m['namemark'];?></p>
                    <?php endforeach;?>
                </div>
            </div>
        </div>

     <?php if($data[index_num]==7 && $data[sub]){ ?>
<!--展示下级栏目-->
    <div class="$uicss"  m-id='<?php echo $ui['mid'];?>'>
        <ul class="service-list blocks-100 blocks-sm-2 blocks-md-3 blocks-xlg-4  clearfix">
            <?php
    $type=strtolower(trim('son'));
    $cid=$data[classnow];
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
	                <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?>>
		                <img src="<?php echo $m['columnimg'];?>" alt="<?php echo $m['name'];?>"/>
		                <h4><?php echo $m['name'];?></h4>
		                <p><?php echo $m['description'];?></p>
	                </a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
<?php }else{ ?>
    <?php
    $cid = 0;
    if($cid == 0){
        $cid = $data['classnow'];
    }
    $num = $c['met_news_list'];
    $order = "no_order";
    $news = load::sys_class('label', 'new')->get('news');
    $news->page_num = $num;
    $result = $news->get_list_page($cid, $data['page']);
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
?><?php endforeach;?>
            <?php if($sub){ ?>
                <?php if($_M['form']['pageset']){ ?>
                    <?php if($sidebar){ ?>
                        <div class="col-md-9 met-news-body">
                            <div class="row">
                    <?php } ?>
                <?php }else{ ?>
                        <?php if($ui[has][sidebar]){ ?>
                        <div class="col-md-9 met-news-body">
                            <div class="row">
                    <?php } ?>
                <?php } ?>
                <?php if($ui['news_headlines'] && $ui['news_listtype']<>3){ ?>
<!--头条-->
                    <?php if(!$data[page] && !$data[class2]){ ?>
    	           <div class="news-headlines imagesize" data-scale='<?php echo $ui['news_headlines_y'];?>x<?php echo $ui['news_headlines_x'];?>'>
    	               <div class="news-headlines-slick cover">
                	        <?php
    $cid = $data[classnow];
    if($cid == 0){
        $cid = $data['classnow'];
    }
    $num = $ui[news_headlines_num];
    $order = "no_order";
    $news = load::sys_class('label', 'new')->get('news');
    $news->page_num = $num;
    $result = $news->get_list_page($cid, $data['page']);
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
?>
                	            <div class='slick-slide'>
                	                <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>
                	                    <img class="cover-image" data-lazy="<?php echo thumb($v['imgurl'],$ui['news_headlines_x'],$ui['news_headlines_y']);?>" data-srcset="<?php echo thumb($v['imgurl'],450,450*$ui['news_headlines_y']/$ui['news_headlines_x']);?> 450w,<?php echo thumb($v['imgurl'],$ui['news_headlines_x'],$ui['news_headlines_y']);?>" sizes='(max-width:479px) 450px' alt="<?php echo $v['title'];?>">
                	                    <div class="headlines-text text-xs-center">
                	                        <h3><?php echo $v['title'];?></h3>
                	                    </div>
                	                </a>
                	            </div>
                	        <?php endforeach;?>
    	               </div>
    	           </div>
                <?php } ?>
            <?php } ?>
            <div class="met-news-list">
                <ul class="ulstyle met-pager-ajax imagesize" data-scale='<?php echo $c['met_newsimg_y'];?>x<?php echo $c['met_newsimg_x'];?>' m-id='<?php echo $ui['mid'];?>'>
                    <?php
    $cid = $data[classnow];
    if($cid == 0){
        $cid = $data['classnow'];
    }
    $num = $c['met_news_list'];
    $order = "no_order";
    $news = load::sys_class('label', 'new')->get('news');
    $news->page_num = $num;
    $result = $news->get_list_page($cid, $data['page']);
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
?>  
                        <?php if($ui['news_listtype']==4){ ?>
                            <?php if(($ui['news_headlines'] && !$data[page] && !$data[class2] && $v['_index']>=$ui[news_headlines_num]) || ($ui['news_headlines'] && !$data[page] && $data[class2]) || $data[page] || !$ui['news_headlines']){ ?>
                        <?php
                            $time = explode('-',$v['updatetime']);
                            $time_year = $time[0];
                            $time_month = $time[1];
                            $time_day = $time[2];
                            switch ($time_month) {
                                case "01":
                                    $time_month = "January";
                                    break;
                                case "02":
                                    $time_month = "February";
                                    break;
                                case "03":
                                    $time_month = "March";
                                    break;
                                case "04":
                                    $time_month = "April";
                                    break;
                                case "05":
                                    $time_month = "May";
                                    break;
                                case "06":
                                    $time_month = "June";
                                    break;
                                case "07":
                                    $time_month = "July";
                                    break;
                                case "08":
                                    $time_month = "August";
                                    break;
                                case "09":
                                    $time_month = "September";
                                    break;
                                case "10":
                                    $time_month = "October";
                                    break;
                                case "11":
                                    $time_month = "November";
                                    break;
                                case "12":
                                    $time_month = "December";
                                    break;
                               default:
                                 echo "null";
                            }
                        ?>
                                <li class='border-bottom1 news-jdf' data-plugin="appear" data-animate="slide-bottom50" data-repeat="false">
                                    <div class="col-sm-3 news-left">

                                        <p class="time-day"><?php echo $time_day;?></p>
                                        <p class="time-my">
                                            <span><?php echo $time_month;?></span>&nbsp;&nbsp;
                                            <span><?php echo $time_year;?></span>
                                        </p>
                                        <span class="time-hr"></span>
                                        <p  class="time-desc"><?php echo $v['issue'];?></p>
                                    </div>
                                    <div class="news-right col-sm-9">
                                        <div class="news-img">
                                            <img src="<?php echo thumb($v['imgurl'],$ui['news_right_w'],$ui['news_right_h']);?>" alt="">
                                        </div>
                                        <div class="news-text">
                                            <h4 class="news-title"><?php echo $v['title'];?></h4>
                                            <span class="news-right-hr"></span>
                                            <p class="news-desc"><?php echo $v['description'];?></p>
                                            <a href="<?php echo $v['url'];?>" class="news-btn"><?php echo $ui['more'];?></a>
                                        </div>
                                    </div>
                                </li>
                        <?php } ?>
                    <?php } ?>
                            <?php if($ui['news_listtype']==1){ ?>
<!-- 极简模式 -->
                                <?php if(($ui['news_headlines'] && !$data[page] && !$data[class2] && $v['_index']>=$ui[news_headlines_num]) || ($ui['news_headlines'] && !$data[page] && $data[class2]) || $data[page] || !$ui['news_headlines']){ ?>
                                <li class='border-bottom1'>
                                    <h4>
                                        <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a>
                                    </h4>
                                    <div class="time">
                            			<span class="author"><?php echo $v['issue'];?> </span>
                            			<span class="times"><?php echo $v['original_addtime'];?> <?php echo $ui['time_txt'];?></span>
                            		</div>
                                    <p class="des font-weight-300"><?php echo $v['description'];?></p>
                                    <p class="info font-weight-300">
                                        <span><i class="icon wb-eye m-r-5 font-weight-300" aria-hidden="true"></i><?php echo $v['hits'];?> <?php echo $ui['hits_txt'];?></span>
                                    </p>
                                </li>
                            <?php } ?>
                        <?php } ?>
                            <?php if($ui['news_listtype']==2){ ?>
<!-- 图文模式 -->
                                <?php if(($ui['news_headlines'] && !$data[page] && !$data[class2] && $v['_index']>=$ui[news_headlines_num]) || ($ui['news_headlines'] && !$data[page] && $data[class2]) || $data[page] || !$ui['news_headlines']){ ?>
                                <li class="media media-lg border-bottom1">
                                    <div class="media-left">
                                        <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>
                                            <img class="media-object"     <?php if($v['_index']>($ui['news_headlines']?2+$ui['news_headlines_num']:3) || $data['page']>1){ ?>data-original<?php }else{ ?>src<?php } ?>="<?php echo thumb($v['imgurl'],$c['met_newsimg_x'],$c['met_newsimg_y']);?>" alt="<?php echo $v['title'];?>" height='100'>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4>
                                            <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a>
                                        </h4>
                                        <div class="time">
                            				<span class="author"><?php echo $v['issue'];?> </span>
                            				<span class="times"><?php echo $v['original_addtime'];?> <?php echo $ui['time_txt'];?></span>
                            			</div>
                                        <p class="des font-weight-300">
                                            <?php echo $v['description'];?>
                                        </p>
                                    <p class="info font-weight-300">
                                        <span><i class="icon wb-eye m-r-5 font-weight-300" aria-hidden="true"></i><?php echo $v['hits'];?> <?php echo $ui['hits_txt'];?></span>
                                    </p>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php } ?>
                            <?php if($ui['news_listtype']==3){ ?>
<!-- 橱窗模式 -->
                        	<li class="card card-shadow">
                        	    <div class="card-header p-0">
                        	        <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>
                        	            <img class="cover-image"     <?php if($v['_index']>3 || $data['page']>1){ ?>data-original<?php }else{ ?>src<?php } ?>="<?php echo thumb($v['imgurl'],$ui['news_ccimg_x'],$ui['news_ccimg_y']);?>" alt="<?php echo $v['title'];?>" height='100'>
                        	        </a>
                        	    </div>
                        	    <div class="card-body">
                        	        <h4 class="card-title">
                        	            <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a>
                        	        </h4>
                        	        <div class="time">
                        				<span class="author"><?php echo $v['issue'];?> </span>
                        				<span class="times"><?php echo $v['original_addtime'];?> <?php echo $ui['time_txt'];?></span>
                        			</div>
                        	        <p class=" font-weight-300"><?php echo $v['description'];?></p>
                        	        <p class="card-metas font-size-12 font-weight-300 info">
                        	            <span><i class="icon wb-eye m-r-5 font-weight-300" aria-hidden="true"></i><?php echo $v['hits'];?> <?php echo $ui['hits_txt'];?></span>
                        	        </p>
                        	    </div>
                        	</li>
                        <?php } ?>
                    <?php endforeach;?>
                    
                </ul>
                        <div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
                                 <?php
     if(!$data['classnow']){
        $data['classnow'] = 2;
     }

     if(!$data['page']){
        $data['page'] = 1;
     }
      $result = load::sys_class('label', 'new')->get('tag')->get_page_html($data['classnow'],$data['page']);

       echo $result;

     ?>
                        </div>
                        <div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
                            <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
                                <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
        <?php }else{ ?>
                    <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='<?php echo $ui['mid'];?>'><?php echo $ui['nodata'];?></div>
        <?php } ?>
<?php } ?>
    <?php if($_M['form']['pageset']){ ?>
        <?php if($sidebar){ ?>
            </div>
        </div>
    <?php }else{ ?>
                </div>
            </div>
        </main>
    <?php } ?>
<?php }else{ ?>
        <?php if($ui[has][sidebar]){ ?>
            </div>
        </div>
    <?php }else{ ?>
            </div>
        </div>
    </main>
    <?php } ?>
<?php } ?>
