<?php 
include("header.php");
if(isset($_SESSION['user_login']) && $_SESSION['user_login']!="anshuman")
die('<script type="text/javascript">window.location = "index.php"; </script>');
?>

<div class="row">
<div class="col-md-4"></div>
<div id="register-popup">		
<div class="col-md-4">
<div class="panel panel-default">
<div class="panel-heading"> <h4>Add a Blood Bank</h4></div>
<div class="panel-body">
<form id="post_form"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal center">
<div class="form-group">
				
					<label>
						<input class="form-control" placeholder="Blood Bank Name" name="name" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group">
					<label>
						<input class="form-control" placeholder="Address" name="address" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group">
					<label>
						<input class="form-control" placeholder="City" name="city" type="text"  required>
					</label>
					
				</div>						
				<div class="form-group">
					<label>
						<input class="form-control" placeholder="Pin" name="pin" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group">
				   <label>
						<input  class="form-control"placeholder="Opening Timings" name="time-open" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group">
				
					<label>
						<input class="form-control" placeholder="Days of Week" name="days" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group">
				
					<label>
						<input class="form-control" placeholder="Phone Numbers" name="p_n" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group">
					<input class="btn btn-danger center-block" type="submit" name="submit" value="Add Blood Bank" />
				</div>
	</form>
	</div>
	</div>
	
	<?php 
	if(!empty($_POST))
	{   
$table="banks";
$name=htmlentities($_POST['name']);
$address=htmlentities($_POST['address']);
$city=htmlentities($_POST['city']);
$pinc=htmlentities($_POST['pin']);
$time_open=htmlentities($_POST['time-open']);
$days=htmlentities($_POST['days']);
$phone_num=htmlentities($_POST['p_n']);
		$dat=get_sorted_array("pins","WHERE pin_code='$pinc'");
		$lat=$dat[0]['lat'];
		$long=$dat[0]['lang'];
	insert($table,array("name","address","city","pin","lat","lang","time_open","days","phone_numbers"),array($name,$address,$city,$pinc,$lat,$long,$time_open,$days,$phone_num));		
   
	}
	
	?>