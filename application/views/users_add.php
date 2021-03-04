<div class="content-box">
<div class="content-box-header">
        
        <h3><?=$heading?></h3>
        
        <ul class="content-box-tabs">
            <li><a href="<?=site_url('users/index')?>">List</a></li> <!-- href must be unique and match the id of target div -->
            <li><a href="<?=site_url('users/add')?>" class="default-tab">Add Users</a></li>
        </ul>
        
        <div class="clear"></div>
        
</div> <!-- End .content-box-header -->
    
    <div class="content-box-content">
    
<div class="tab-content">
<?php 
error_reporting(0);
?>
<div class="notification error png_bg" id="error" style="display:none">
                <a href="#" class="close"><img src="<?=base_url()?>resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
    <div>Kindly rectify the errors found in the form!</div>
</div>
<form action="<?=site_url('users/save')?>" onSubmit="return verify()" method="post">
    
    <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
        <input value="<?=$users[0]->id?>" type="hidden" name="id" />
        <input value="subadmin" type="hidden" name="role" />
        <p>
            <label>Name</label>
                <input class="text-input small-input" value="<?=$users[0]->name?>" type="text" id="name" name="name" />
        </p>
        <p>
            <label>Username</label>
                <input class="text-input small-input" value="<?=$users[0]->username?>" type="text" id="username" name="username" />
        </p>
        <p>
            <label>Password</label>
                <input class="text-input small-input" value="<?=$users[0]->password?>" type="password" id="password" name="password" />
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
<script type="text/javascript">
$(document).ready(function(){
	$('#name, #username, #password').focus(function(){
		if ($(this).hasClass("needsfilled")) {
		$(this).val("");
		$(this).removeClass("needsfilled");
	   }		
	});
});
function verify(){
	if($('#name').val() == "" || $('#name').val() == 'Required!')
	{
		$('#name').addClass('needsfilled');
		$('#name').val('Required!');
		$('#error').fadeIn(1500);
		return false;			
	}
	if($('#username').val() == "" || $('#username').val() == 'Required!')
	{
		$('#username').addClass('needsfilled');
		$('#username').val('Required!');
		$('#error').fadeIn(1500);
		return false;			
	}
	if($('#password').val() == "" || $('#password').val() == 'Required!')
	{
		$('#password').addClass('needsfilled');
		$('#password').val('Required!');
		$('#error').fadeIn(1500);
		return false;			
	}
}
</script>