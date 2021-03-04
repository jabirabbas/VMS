$(document).ready(function(){
$("#visitorForm").submit(function(){
	required = ["firstname","lastname","company","email","mobile","arrival_date","arrival_time","departure_time"];
	errornotice = $("#error");
	emptyerror = "Required";
	email = $("#email");
	mobile = $("#mobile");
	
		for (i=0;i<required.length;i++) {
			var input = $('#'+required[i]);
			if (($.trim(input.val()) == "") || ($.trim(input.val()) == emptyerror)) {
				input.addClass("needsfilled");
				input.val(emptyerror);
				errornotice.fadeIn(1500);
			} else {
				input.removeClass("needsfilled");
			}
		}
		
		if(isNaN(mobile.val())){
			mobile.addClass("needsfilled").val('Invalid');
		}
		
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    	if (!filter.test(email.val())) {
			email.addClass("needsfilled").val('Invalid');	
		}


		//if any inputs on the page have the class 'needsfilled' the form will not submit
		if ($(":input").hasClass("needsfilled")) {
			return false;
		} else {
			errornotice.hide();
			return true;
		}
	});
	
	// Clears any fields in the form when the user clicks on them
	$(":input").focus(function(){		
	   if ($(this).hasClass("needsfilled") ) {
			$(this).val("");
			$(this).removeClass("needsfilled");
	   }
	});
});	