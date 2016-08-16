<?php 
include("header.php");
if(isset($_SESSION['user_login']))
die('<script type="text/javascript">window.location = "index.php"; </script>');

?>
<div class="row">
<div class="col-md-4"></div>
<div id="login-popup">

<div class="col-md-4">
<br><br>
<div class="panel panel-default">
<div class="panel-heading"> <h4>Login</h4></div>
<div class="panel-body">
<div class="login_result alert alert-success" id="login_result"></div>
<div class="center registration_form">
		 <!-- Form -->
			<form id="registration_form"  method="post">
				<div class="form-group">
					<label>
						<input class="form-control" placeholder="Username" id="username" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group">
					<label>
						<input class="form-control" placeholder="Password" id="password" type="password"  required>
					</label>
				</div>						
				<div class="form-group">
					<input class="btn btn-danger center-block" type="submit" id="login" value="Sign In" />
				</div>
				
			</form>
			<!-- /Form -->
			</div>
			</div>
			</div>
            </div>
			</div>