<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VMS</title>
<link rel="stylesheet" href="<?=base_url()?>resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>resources/css/invalid.css" type="text/css" media="screen" />

<link rel="stylesheet" media="all" type="text/css" href="<?=base_url()?>resources/css/jquery-ui.css" />
<link rel="stylesheet" href="<?=base_url()?>resources/css/timepicker.css" type="text/css" media="screen" />

<!--[if lte IE 7]>
    <link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
<![endif]-->

<script type="text/javascript" src="<?=base_url()?>resources/scripts/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resources/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="<?=base_url()?>resources/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resources/scripts/jquery-ui-sliderAccess.js"></script>
<script type="text/javascript" src="<?=base_url()?>resources/scripts/timepicker.js"></script>

<!--[if IE]><script type="text/javascript" src="<?=base_url()?>resources/scripts/jquery.bgiframe.js"></script><![endif]-->
<!--[if IE 6]>
    <script type="text/javascript" src="<?=base_url()?>resources/resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.png_bg, img, li');
    </script>
<![endif]-->
<script type="text/javascript">
$(document).ready(function(){
	$("#top").click(function(){
		$("html, body").animate({ scrollTop: 0 }, "slow");
	});
	
	//sliding up message div
	if($(".success").is(':visible')){
		$(".success").delay(4000).slideUp('fast');	
	}
});

</script>
</head>
  
<body>
<?php $user = $this->session->userdata('user');
if(!$user) header('Location: '.site_url('login/index'));
?>
<div id="body-wrapper">
    <div id="sidebar">
    <div id="sidebar-wrapper">
        <h1 id="sidebar-title"><a href="<?=site_url('home/index')?>">Company Name</a></h1>
        <h3>&nbsp;</h3><h3>&nbsp;</h3>
        <?php 
			$role = $this->session->userdata['user'][0]->role;
			include 'menu.php';
		?>
        
        
    </div></div> <!-- End #sidebar -->
    
    <div id="main-content"> <!-- Main Content Section with everything -->
        
        <noscript> <!-- Show a notification if the user has disabled javascript -->
            <div class="notification error png_bg">
                <div>
                    Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
                </div>
            </div>
        </noscript>
        
        <!-- Page Head -->
        <h2>Welcome <?=ucwords($user[0]->username)?></h2>
        
        <div class="clear"></div> <!-- End .clear -->
        <div id="content" style="min-height:495px">
        <?php 
			echo '<br /><br />'; include $filename;
		?>
        <!-- End Notifications -->
        </div>
        <div id="footer">
            <medium> <!-- Remove this notice or replace it with whatever you want -->
                    Developed By : <a href="http://www.jacdeveloper.in" target="_blank">JAC Developer</a> | <a href="javascript:void()" id="top">Top</a>
            </medium>
        </div><!-- End #footer -->
        
    </div> <!-- End #main-content -->
    
</div></body>
  
</html>
<script type="text/javascript">
<?php if($this->session->userdata('error')){ ?>
$("#error div").html('<?=$this->session->userdata('error')?>');
$("#error").fadeIn('fast').delay(4000).slideUp('fast');
<? 
$this->session->unset_userdata('error');
} ?>
</script>