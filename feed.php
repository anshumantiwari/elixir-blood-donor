<?php 
include("lib/config.php");
if( isset($_GET['user_logged'])&& isset($_GET['lat']) && isset($_GET['bd']))
{
$bd=$_GET['bd'];
$x=$_GET['lat'];
$y=$_GET['lang'];
}
if(isset($_GET['action']) && $_GET['action']=="active")
{
$lim=10;
$arrai=mysqli_query($db,"SELECT * FROM posts ORDER BY time DESC LIMIT 0 , $lim;");	
if(strpos($bd,"p") !==false)
{$anta=preg_replace("/p/","n",$bd);}
else
{$anta=preg_replace("/n/","p",$bd);
}
if( isset($_GET['user_logged'])&& isset($_GET['lat']) && isset($_GET['bd']) && $_GET['bd']!="" && strpos($_GET['bd'],"p")!==false)
{$arrai=mysqli_query($db,"SELECT *, ( 3959 * acos( cos( radians($x) ) * cos( radians( lat ) ) * cos( radians( lang ) - radians($y) ) + sin( radians($x) ) * sin( radians( lat ) ) ) ) AS distance FROM posts WHERE blood_group='$bd' OR blood_group='ab p' ORDER BY time-distance DESC LIMIT 0 , $lim;");	
if(strpos($_GET['bd'],"o") !==false)
$arrai=mysqli_query($db,"SELECT *, ( 3959 * acos( cos( radians($x) ) * cos( radians( lat ) ) * cos( radians( lang ) - radians($y) ) + sin( radians($x) ) * sin( radians( lat ) ) ) ) AS distance FROM posts WHERE blood_group LIKE '%p%' ORDER BY distance DESC LIMIT 0 , $lim;");	
}
elseif(strpos($_GET['bd'],"n")!==false)
{$arrai=mysqli_query($db,"SELECT *, ( 3959 * acos( cos( radians($x) ) * cos( radians( lat ) ) * cos( radians( lang ) - radians($y) ) + sin( radians($x) ) * sin( radians( lat ) ) ) ) AS distance FROM posts WHERE blood_group='$bd' OR blood_group='ab p' OR blood_group='ab n' OR blood_group='$anta' ORDER BY time-distance DESC LIMIT 0 , $lim;");	
if(strpos($_GET['bd'],"o") !==false)
$arrai=mysqli_query($db,"SELECT *, ( 3959 * acos( cos( radians($x) ) * cos( radians( lat ) ) * cos( radians( lang ) - radians($y) ) + sin( radians($x) ) * sin( radians( lat ) ) ) ) AS distance FROM posts ORDER BY time-distance ASC LIMIT 0 , $lim;");	
}
$array=array();
$i=0;
function sort_it($b){
	global $bg;
return similar_text($b['blood_group'],$bg);	
	
}
if ($arrai)
	  { 
  if (mysqli_num_rows($arrai) > 0) {
    while ($row = mysqli_fetch_assoc($arrai)) {
		$array[$i]=$row;
		$i++;
    }
}
	  }
	  else
	  {
		  echo "error";
		  echo mysqli_error();

	  }
	 ?>
	  <?php if($_SERVER['HTTP_X_REQUESTED_WITH'] != "exelir.elixir.my.expressconcernextendhelp" && strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome/') !==true && isset($_GET['app']) && $_GET['app'] !=1 && $_SESSION['app'] !=1) {
   ?>
   <a href="https://play.google.com/store/apps/details?id=exelir.elixir.my.expressconcernextendhelp" class="app-logo navbar-brand"><img class="img-responsive" src="images/google-play.jpg"/></a>
   <div class="clearfix"></div>
   <?php
}?>  
<?php	 
if(isset($_GET['user_logged']) && $_GET['user_logged']!="")
{uasort($array,'sort_it');	  
	 ?>
	 <h3>People You Can Help</h3>
	 <?php
}
else{
	 ?>

	 <h3>Recently Posted</h3>
	 <?php
}
foreach($array as $arr)
{
	?>

 <div class="panel panel-default">
 <?php  $blood_group= preg_replace("/p/","+",$arr['blood_group']);
        $blood_group= preg_replace("/n/","-",$blood_group);
		$blood_group= strtoupper(preg_replace("/ /","",$blood_group));
		$dater=date("F j, Y, g:i a",$arr['time']);
 ?> 

          <div class="panel-heading"><h4><?php echo $arr['title']; ?></h4><button class="btn btn-lg btn-primary pull-right" type="button"><?php echo $blood_group;?></button></div>
   			<div class="panel-body">
			<h6><b><?php echo $dater;?></b></h6>
             <p><?php echo $arr['para'];?></p>
			 <div class="clearfix"></div>
			 <hr>
			 <p class="lead">Contact Details</p>
			 <?php
            $us=$arr['user'];
			$user=get_sorted_array("users","WHERE ID='$us'");
			 
			 ?>
			  <p><b>Name:</b> <?php echo $user[0]['full_name']; ?></p>
			 <p><b>Address:</b> <?php echo $arr['address']; ?></p>
			 <p><b>Contact:</b><a href="tel:<?php echo $arr['phon_number']; ?>"> <?php echo $arr['phon_number']; ?></a> (Tap To Call)</p>
            </div>
   		</div>
</div>
	<?php
	
}
}
if(isset($_GET['action']) && $_GET['action']=="bbanks")
{
$lim=10;
$arrai=mysqli_query($db,"SELECT * FROM banks ORDER BY ID ASC LIMIT 0 , $lim;");	
if( isset($_GET['user_logged'])&& $_GET['user_logged']==1)
	$arrai=mysqli_query($db,"SELECT *, ( 3959 * acos( cos( radians($x) ) * cos( radians( lat ) ) * cos( radians( lang ) - radians($y) ) + sin( radians($x) ) * sin( radians( lat ) ) ) ) AS distance FROM banks ORDER BY distance ASC LIMIT 0 , $lim;");	
$array=array();
$i=0;
if ($arrai)
	  { 
  if (mysqli_num_rows($arrai) > 0) {
    while ($row = mysqli_fetch_assoc($arrai)) {
		$array[$i]=$row;
		$i++;
    }
}
	  }
	  else
	  {
		  echo "error";
		  echo mysqli_error();

	  }
	 
	  
	 ?>
	 <h3>Blood Banks Near You</h3>
	 <?php
	 
foreach($array as $arr)
{	
?>
<div class="panel panel-default">
          <div class="panel-body">
            <p class="lead"><?php echo $arr['name']; ?></p>
            <p><?php echo $arr['address'].", ".$arr['city']." - ".$arr['pin']; ?></p>
			<?php $phones=explode(",",$arr['phone_numbers']); ?>
            <h5><b>Contact: 
			<?php 
			foreach($phones as $xd=>$phone)
            {
           ?>				
			<?php if($xd!=0 && $xd!=count($phones))echo ", "; ?><a href="tel:<?php echo $phone; ?>"> <?php  echo $phone;  ?></a>	
			<?php	
			}
            

			?></b> (Tap To Call)</h5>
            <p><b>Opens <?php echo $arr['time_open'].", ".$arr['days']; ?></b> </p>
        </div>
		</div>
<?php
}	
}
?>