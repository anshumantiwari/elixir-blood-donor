<?php 
include("header.php");
if(isset($_SESSION['user_login']) && $_SESSION['user_login']!="anshuman")
die('<script type="text/javascript">window.location = "index.php"; </script>');
$x=get_sorted_array("users","");

?>
<div class="container">       
<?php 
if(isset($_GET['success-verify']) && $_GET['success-verify']==1 )
{
	?>
	<div class="alert alert-info alert-dismissable">
          <p>Success!</p>  
          </div>
		  <?php 
}
?>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready( function(){
$('#users').DataTable();	
	
	
});
</script>
  <table id="users" class="table table-striped">
    <thead>
      <tr>
        <th>Username</th>
		<th>Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Blood Group</th>
		<th>Verified</th>
      </tr>
    </thead>
    <tbody>
<?php
if(isset($_GET['verify']))
{
$id=$_GET['verify'];
if($_GET['set']==0)
$set=1;
else
$set=0;
$y=mysqli_query($db,"UPDATE users SET verified='$set' WHERE ID='$id'");

if($y)
?>
<script type="text/javascript">
window.location ="<?php echo $_SERVER['PHP_SELF']."?success-verify=1" ?>";
</script>
<?php	
	
}
foreach($x as $y)
{
echo '<tr>';
echo '<td>'.$y['user_login'].'</td>';
echo '<td>'.$y['full_name'].'</td>';
echo '<td>'.$y['mobile'].'</td>';
echo '<td>'.$y['user_email'].'</td>';
echo '<td>'.$y['blood_group'].'</td>';
echo '<td><a href="'.$_SERVER['PHP_SELF']."?verify=".$y['ID'].'&set='.$y['verified'].'">'.($y['verified']==1 ? "Yes" : "No").'</a></td>';
echo '</tr>';	
	
}

 ?>    
    </tbody>
  </table>
</div>
