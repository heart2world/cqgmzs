<?php defined('IN_MET') or exit('No permission'); ?>
<main class="$uicss page-content" m-id='{$ui.mid}'>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
            <tag action='job.list' num="$c['met_job_list']" cid="$data['classnow']"></tag>
            <if value="$sub">
            <div class="met-job-list met-pager-ajax" >
            	<main class="$uicss met-download animsition" m-id='{$ui.mid}'>
                    <div class="container">
                        <div class="row">
                        <list data="$result" name="$p">
                            <div class="card col-md-6">
                                <div class="card-body card-shadow">
                                    <h4 class='card-title p-0 font-size-24'><a href="{$p.url}" title="{$p.position}">{$p.position}</a></h4>
                                    <p class="card-metas font-size-12 blue-grey-400">
                                        <span class='m-r-10'>{$p.addtime}</span>
                                        <span class='m-r-10'>
                                            <i class="icon wb-map m-r-5" aria-hidden="true"></i>
                                            {$p.place}
                                        </span>
                                        <span class='m-r-10'>
                                            <i class="icon wb-user m-r-5" aria-hidden="true"></i>
                                            {$p.count}
                                        </span>
                                        <span>
                                            <i class="icon wb-payment m-r-5" aria-hidden="true"></i>
                                            {$p.deal}
                                        </span>
                                    </p>
                                    <div class="met-editor clearfix">
                                        {$p.content}
                                    </div>
                                    <div class="card-body-footer m-t-0">
                                        <a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" href="javascript:;" data-toggle="modal" data-target="#met-job-cv" data-jobid="{$p.id}" data-cvurl="cv.php?lang=cn&selected">{$ui.cvtitle}</a>
                                    </div>
                                </div>
                            </div>
                        </list>
                        </div>
                    </div>
                </main>
            </div>
            <div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
                <pager/>
            </div>
            <div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
                <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
                    <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                </button>
            </div>
            <else/>
            <div class='h-100 text-xs-center font-size-20 vertical-align' >{$word.csvnodata}</div>
            </if>
            </div>
			</div>
		</div>
	</div>
	<if value="$sub">
<div class="modal fade modal-primary" id="met-job-cv" aria-hidden="true" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">{$ui.cvtitle}</h4>
			</div>
			<div class="modal-body">
				<tag action='job.form'></tag>
			</div>
		</div>
	</div>
</div>
</if>
</main>
