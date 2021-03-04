<script type="text/javascript" src="<?=base_url()?>resources/scripts/validationProfile.js"></script>
<div class="content-box">
<div class="content-box-header">
        
        <h3><?=$heading?></h3>
        <div class="clear"></div>
        
</div> <!-- End .content-box-header -->
    
    <div class="content-box-content">
    
<div class="tab-content">
<?php 
error_reporting(0);
if($this->session->userdata('message')){ ?>
<div class="notification success png_bg">
                <a href="#" class="close"><img src="<?=base_url()?>resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
    <div><?=$this->session->userdata('message')?></div>
</div>
<? } 
$this->session->unset_userdata('message');
?>
<div class="notification error png_bg" id="error" style="display:none">
                <a href="#" class="close"><img src="<?=base_url()?>resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
    <div>Kindly rectify the errors found in the form!</div>
</div>
<form action="<?=site_url('profile/save')?>" id="profileForm" method="post">
    
    <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
        <p>
            <label>Old Password</label>
                <input class="text-input small-input" type="password" id="oldpassword" name="oldpassword" />
        </p>
        <p>
            <label>New Password</label>
                <input id="newpassword" class="text-input small-input" name="newpassword" type="password" />
        </p>
        <p>
            <label>Confirm New Password</label>
            <input id="confirm" class="text-input small-input" name="confirm" type="password" />
        </p>
        <p>
            <input class="button" type="submit" value="Submit" />
        </p>
        
    </fieldset>
    
    <div class="clear"></div><!-- End .clear -->
    
</form>

		</div> <!-- End #tab2 -->   
	</div>
</div>