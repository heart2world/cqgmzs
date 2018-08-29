<?php defined('IN_MET') or exit('No permission'); ?>
<div class="col-lg-3">
	<div class="row">
		<if value="$ui['search']">
		<div class="$uicss-search">
		<form class='sidebar-search' method='get' action="{$c.met_weburl}search/search.php">
			<input type='hidden' name='lang' value='{$data.lang}' />
			<input type='hidden' name='class1' value='{$data.class1}' />
			<div class="form-group">
				<div class="input-search">
					<button type="submit" class="input-search-btn">
						<i class="icon wb-search" aria-hidden="true"></i>
					</button>
					<input type="text" class="form-control" name="searchword" placeholder="{$ui.sidebar_search_placeholder}">
				</div>
			</div>
		</form>
	</div>
	</if>
<aside class="$uicss met-sidebar panel panel-body m-b-0" boxmh-h m-id='{$ui.mid}' m-type='nocontent'>
	<div class="news-list-tab nav-tabs-horizontal" data-plugin="nav-tabs">
        <ul class="nav nav-tabs nav-tabs-solid ulstyle"  role="tablist">
            <li class="nav-item" role="presentation">
                <a data-toggle="tab" href="#news-list1" role="tab" aria-expanded="true" class="nav-link active">
                {$ui.sidebar_title1}
                </a>
            </li>
            <li  class="nav-item" role="presentation" >
                <a data-toggle="tab" href="#news-list2"  role="tab" aria-expanded="false" class="nav-link">
                {$ui.sidebar_title2}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active animation-fade" id="news-list1" role="tabpanel">
            	<ul class="list-group ulstyle">
            		<tag action="list" cid="$ui['list1']" num="$ui['num1']" type="$ui['type1']" name="list1">
	          			<li class="">
	          				<if value="$list1['_index'] lt 3">
	          					<span class="tag tag-pill up tag-warning">
	          						<else/>
	          					<span class="tag tag-pill up tag-default">
	          				</if>
	          					<?php $list1['_index']= $list1['_index']+1;?>
				            	{$list1._index}
				         		</span>
				             <a href="{$list1.url}" title="{$list1.title}" {$g.urlnew}>{$list1.title}</a>
				             <span class="time">{$list1.updatetime}</span>
			             </li>
					</tag>
                </ul>
                </div>
            <div class="tab-pane animation-fade" id="news-list2" role="tabpanel">
	                <ul class="list-group ulstyle">
	                	<tag action="list" cid="$ui['list2']" num="$ui['num2']" type="$ui['type2']" name="list2">
				           <li class="">
	          				<if value="$list2['_index'] lt 3">
	          					<span class="tag tag-pill up tag-warning">
	          						<else/>
	          					<span class="tag tag-pill up tag-default">
	          				</if>
	          					<?php $list2['_index']= $list2['_index']+1;?>
				             	{$list2._index}
				         		</span>
					             <a href="{$list2.url}" title="{$list2.title}" {$g.urlnew}>{$list2.title}</a>
					             <span class="time">{$list2.updatetime}</span>
				            </li>
				        </tag>
	                </ul>
                </div>
              </div>
			</div>
</aside>
</div>
</div>
		</div>
    </div>
</main>