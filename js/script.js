
$(document).ready(function(){
	$('#login').click(function(){ // Create `click` event function for login
		var username = $('#username'); // Get the username field
		var password = $('#password'); // Get the password field
		var login_result = $('.login_result'); // Get the login result div
		login_result.html('loading..'); // Set the pre-loader can be an animation
		if(username.val() == ''){ // Check the username values is empty or not
			username.focus(); // focus to the filed
			login_result.html('<span class="error">Enter the username</span>');
			return false;
		}
		if(password.val() == ''){ // Check the password values is empty or not
			password.focus();
			login_result.html('<span class="error">Enter the password</span>');
			return false;
		}
		if(username.val() != '' && password.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=login&username='+username.val()+'&password='+password.val();
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'ajax-processor.php',
			success: function(responseText){ 
			login_result.show();
			// Get the result and asign to each cases
				if(responseText == 0){
					login_result.html('<span class="error">Username or Password Incorrect!</span>');
				}
				else if(responseText == 1){
					window.location = 'index.php';
				}
				else{
					alert('Problem with sql query');
				}
			}
			});
		}
		return false;
	});
	$('#register').click(function(){ 
		var username = $('#user'); 
		var password = $('#pass'); 
		var email = $('#em'); 
		var pin = $('#pin'); 
		var mobile = $('#mob'); 
		var bg = $('#blood_group'); 
		var first_name = $('#first_name'); 
		var reg_res = $('.reg_res'); 
		reg_res.show();
		reg_res.html('loading..'); 
		if(username.val() == ''){
			username.focus(); 
			reg_res.html('<span class="error">Enter the username</span>');
			return false;
		}
		if(password.val() == ''){ 
			password.focus();
			reg_res.html('<span class="error">Enter the password</span>');
			return false;
		}
		if(email.val() == ''){ 
			email.focus();
			reg_res.html('<span class="error">Enter E-mail</span>');
			return false;
		}
		
		
		if(username.val() != '' && password.val() != '' && email.val() != '' && mobile.val() != '' && first_name.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToReg = 'action=register&username='+username.val()+'&password='+password.val()+'&email='+email.val()+'&pin='+pin.val()+'&mobile='+mobile.val()+'&bg='+bg.val()+'&name='+first_name.val();
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToReg,
			url  : 'ajax-processor.php',
			success: function(responseText){
				reg_res.html(responseText);
            if(responseText == 0){
					reg_res.html('<span class="error">Error!</span>');
				}
				else if(responseText == 1){
					reg_res.html('<span>Successfully Registered!</span>');
				}
				else if(responseText == 3){
					reg_res.html('<span>Sorry, User with this Username Already Exists</span>');
				}
				else if(responseText == 4){
					reg_res.html('<span>Sorry, User with this E-mail Already Exists</span>');
				}
				else if(responseText == 5){
					reg_res.html('<span>Sorry, User with this Mobile Already Exists</span>');
				}
				else{
					alert('Problem with sql query');
				}
			
			}
			});
		}
		return false;
	});
	
		$('#post').click(function(){ // Create `click` event function for login
		var postname = $('#post_title'); // Get the username field
		var postcont = $('#post_content'); // Get the password field
		var bg = $('#post_blood_group');
		var address = $('#address');
		var pinc= $('#pin_code');
		var city=$('#city');
		var post_result = $('.post_result'); // Get the login result div
		post_result.show();
		post_result.html('loading..'); // Set the pre-loader can be an animation
		if(postname.val() == ''){ // Check the username values is empty or not
			postname.focus(); // focus to the filed
			post_result.html('<span class="error">Please provide a post name</span>');
			return false;
		}
		if(postcont.val() == ''){ // Check the password values is empty or not
			postcont.focus();
			post_result.html('<span class="error">Please provide some details</span>');
			return false;
		}
		
		if(bg.val() == ''){ // Check the password values is empty or not
			bg.focus();
			post_result.html('<span class="error">Please select the Blood group./span>');
			return false;
		}
		if(postname.val() != '' && postcont.val() != ''  && bg.val() != ''){ // Check the username and password values is not empty and make the ajax request
			var UrlToPass = 'action=post&postname='+postname.val()+'&postcont='+postcont.val()+"&bg="+bg.val()+"&address="+address.val()+"&pin="+pinc.val()+"&city="+city.val();
			$.ajax({ // Send the credential values to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'ajax-processor.php',
			success: function(responseText){ // Get the result and asign to each cases
			post_result.html(responseText);
				if(responseText == 0){
					post_result.html('<span class="error">Error Submitting Post</span>');
				}
				else if(responseText == 1){
					post_result.html('<span class="error">Post Submitted</span>');
				}
				else{
					alert('Problem with sql query');
				}
			}
			});
		}
		return false;
	});
}
	
	
	);