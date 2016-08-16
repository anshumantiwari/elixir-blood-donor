<?php 
include("header.php");
if(isset($_SESSION['user_login']))
die('<script type="text/javascript">window.location = "index.php"; </script>');
?>
<div class="row">
<div class="col-md-4"></div>
<div id="register-popup">		
<div class="col-md-4">
<div class="panel panel-default">
<div class="panel-heading"> <h4>Register</h4></div>
<div class="panel-body">
<div class="reg_res alert alert-success" id="reg_res"></div>
<div class="center registration_form">
		 <!-- Form -->
			<form id="registration_form"  method="post">
				<div class="form-group">
				
					<label>
						<input class="form-control" placeholder="Full Name" id="first_name" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group">
					<label>
						<input class="form-control" placeholder="Username" id="user" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group">
					<label>
						<input class="form-control" placeholder="Password" id="pass" type="password"  required>
					</label>
					
				</div>						
				<div class="form-group">
					<label>
						<input class="form-control" placeholder="E-Mail" id="em" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group">
				   <label>
						<input  class="form-control"placeholder="Pin Code" id="pin" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group">
				
					<label>
						<input class="form-control" placeholder="Mobile" id="mob" type="tel" tabindex="3" required>
					</label>
				</div>
				   <label>Blood Group</label>
				    <div class="form-group">
					<label>
						<select class="form-control" id="blood_group">
						<option value="a p">A+</option>
						<option value="b p">B+</option>
						<option value="ab p">AB+</option>
						<option value="o p">O+</option>
						<option value="a n">A-</option>
						<option value="b n">B-</option>
						<option value="ab n">AB-</option>
						<option value="o n">O-</option>
						</select>
					</label>
				</div>	
				
				
					<input class="btn btn-danger center-block" type="submit" id="register" value="Register" />
				
				
			</form>
			<!-- /Form -->
			</div>			
			</div>
			</div>
			</div>
			</div>
			</div>