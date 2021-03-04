<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>VMS</title>
<link rel="stylesheet" href="<?=base_url()?>resources/css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?=base_url()?>resources/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="<?=base_url()?>resources/css/invalid.css" type="text/css" media="screen">
<!--[if lte IE 7]>
    <link rel="stylesheet" href="<?=base_url()?>resources/css/ie.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 6]>
    <script type="text/javascript" src="<?=base_url()?>resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.png_bg, img, li');
    </script>
<![endif]-->
<script type="text/javascript" src="<?=base_url()?>resources/scripts/jquery-1.11.1.min.js"></script>
</head>

<body id="login">
    <div id="login-wrapper" class="png_bg">
        <div id="login-top">
        	<h1>Company Name</h1>
            <!-- Logo (221px width) -->
            <!--<img id="logo" src="<?=base_url()?>resources/images/logo.png" alt="Simpla Admin logo">-->
        </div> <!-- End #logn-top -->
        
        <div id="login-content">
            
            <form action="<?=site_url('login/authenticate')?>" method="post">
                <div id="error" class="notification information png_bg">
                    <div>
                        Username Password Mismatch!!!
                    </div>
                </div>
                <p>
                    <label>Username</label>
                    <input class="text-input" type="text" name="username" id="username">
                </p>
                <div class="clear"></div>
                <p>
                    <label>Password</label>
                    <input name="password" class="text-input" type="password">
                </p>
                <div class="clear"></div>
                <p id="remember-password">
                    <input class="button" value="Sign In" type="submit">
                </p>
                
            </form>
        </div> <!-- End #login-content -->
        
    </div> <!-- End #login-wrapper -->
    
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$('#username').focus();
	$('#error').hide();
	<?php if($this->session->userdata('error')) { ?>
		$('#error').fadeIn('slow').delay(4000).slideUp('fast');
	<?php $this->session->unset_userdata('error'); } ?>
});
</script>