<script type="text/javascript" src="<?=base_url()?>resources/scripts/validation.js"></script>
<div class="content-box">
<div class="content-box-header">
        
        <h3><?=$heading?></h3>
        
        <ul class="content-box-tabs">
            <li><a href="<?=site_url('visitors/index')?>">List</a></li> <!-- href must be unique and match the id of target div -->
            <li><a href="<?=site_url('visitors/add')?>" class="default-tab">Add Visitor</a></li>
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
<form action="<?=site_url('visitors/save')?>" id="visitorForm" method="post">
    
    <fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
        <input value="<?=$visitors[0]->id?>" type="hidden" name="id" />
        <p>
            <label>Title</label>
                <select class="text-input small-input" id="title" name="title">
                	<option value="Mr" <?php if($visitors[0]->title == 'Mr'){ echo 'selected="selected"';}?>>Mr</option>
                    <option value="Ms" <?php if($visitors[0]->title == 'Ms'){ echo 'selected="selected"';}?>>Ms</option>
                    <option value="Mrs" <?php if($visitors[0]->title == 'Mrs'){ echo 'selected="selected"';}?>>Mrs</option>
                </select>
        </p>
        <p>
            <label>Firstname</label>
                <input class="text-input small-input" value="<?=$visitors[0]->firstname?>" type="text" id="firstname" name="firstname" />
        </p>
        <p>
            <label>Lastname</label>
                <input class="text-input small-input" value="<?=$visitors[0]->lastname?>" type="text" id="lastname" name="lastname" />
        </p>
        <p>
            <label>Company</label>
                <input class="text-input small-input" value="<?=$visitors[0]->company?>" type="text" id="company" name="company" />
        </p>
        <p>
            <label>Email Address</label>
                <input class="text-input small-input" value="<?=$visitors[0]->email?>" type="text" id="email" name="email" />
        </p>
        <p>
            <label>Mobile</label>
                <input class="text-input small-input" maxlength="13" value="<?=$visitors[0]->mobile?>" type="text" id="mobile" name="mobile" />
        </p>
        <p>
            <label>Arrival Date</label>
                <input class="text-input small-input datepicker" value="<?=$visitors[0]->arrival_date?>" type="text" id="arrival_date" name="arrival_date" />
        </p>
        <p>
            <label>Arrival Time</label>
                <input class="text-input small-input timepicker" value="<?=$visitors[0]->arrival_time?>" type="text" id="arrival_time" name="arrival_time" />
        </p>
        <p>
            <label>Departure Time</label>
                <input class="text-input small-input timepicker" value="<?=$visitors[0]->departure_time?>" type="text" id="departure_time" name="departure_time" />
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