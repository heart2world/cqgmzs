<?php defined('IN_MET') or exit('No permission'); ?>
<?php defined('IN_MET') or exit('No permission');?>
<div class="$uicss met-index-product met-index-body met-index-newproduct"
     <?php if($ui['bg_type']){ ?>style="background:<?php echo $g['bodybgcolor'];?>;background:<?php echo $ui['bgcolor'];?>"<?php }else{ ?>style='background:url(<?php echo $ui['bgpic'];?>) no-repeat;background-size: cover;background-position: center;'<?php } ?>
 m-id='<?php echo $ui['mid'];?>'>
    <div class="container">
        <div class="txt-box" style="text-align:<?php echo $ui['txt_pot'];?>">
                <?php if($ui['title']){ ?>
                <h2 class="invisible" data-plugin="appear" data-animate="slide-left" data-repeat="false"><?php echo $ui['title'];?></h2>
            <?php } ?>
                <?php if($ui['desc']){ ?>
                <p class="desc invisible" data-plugin="appear" data-animate="slide-right" data-repeat="false"><?php echo $ui['desc'];?></p>
            <?php } ?>
                <?php if($ui['a_value']){ ?>
                <p class="invisible a-box" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                    <a href="<?php echo $ui['a_href'];?>" title="<?php echo $ui['a_value'];?>" class="a-btn"><?php echo $ui['a_value'];?></a>
                </p>
            <?php } ?>
        </div>
    </div>
</div>
