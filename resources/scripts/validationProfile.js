$(document).ready(function(){
	$("#profileForm").submit(function(){	
	requiredProduct = ["oldpassword", "newpassword", "confirm"];
	errornotice = $("#error");
	emptyerror = "Required!";
		for (i=0;i<requiredProduct.length;i++) {
			var input = $('#'+requiredProduct[i]);
			if ((input.val() == "") || (input.val() == emptyerror)) {
				document.getElementById(requiredProduct[i]).setAttribute('type', 'text');
				input.addClass("needsfilled");
				input.val(emptyerror);
				errornotice.fadeIn(1500);
			} else {
				input.removeClass("needsfilled");
			}
		}
		
		if ($('#newpassword').val() != $('#confirm').val()) {
			$('#confirm').addClass("needsfilled");
			document.getElementById($('#confirm').attr('id')).setAttribute('type', 'text');
			$('#confirm').val('Incorrect').blur();
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
			document.getElementById(this.id).setAttribute('type', 'password');
			$(this).removeClass("needsfilled");
	   }
	});
});	