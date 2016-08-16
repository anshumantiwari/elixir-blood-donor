<?php
include("lib/config.php");
include("lib/PasswordHash.php");
$hasher = new PasswordHash(8, false);
if(isset($_POST['action']) && $_POST['action'] == 'register'){
     $table="users";
 // Check the action `login`
	$username 		= htmlentities($_POST['username']); 
	$password 		= $hasher->HashPassword(htmlentities($_POST['password'])); 
	$email          = htmlentities($_POST['email']); 
	$pin            = htmlentities($_POST['pin']);
	$mobile         = htmlentities($_POST['mobile']);
	$ip             = htmlentities($_POST['bg']);
	$full_name      = htmlentities($_POST['name']);
	$array=get_sorted_array($table,"WHERE user_login='".$username."'");
	 $darray=get_sorted_array($table,"WHERE user_email='".$email."'");
	 $marray=get_sorted_array($table,"WHERE mobile=".$mobile);
	$lat_long=get_sorted_array("pins","WHERE pin_code='$pin'");
	 if(!empty($array))
	 die("3");
	 if(!empty($darray))
	 die("4");
     if(!empty($marray))
	 die("5");
	$check = insert($table,array("user_login","user_pass","user_email","pin","mobile","blood_group","full_name","lat","lang"),array($username,$password,$email,$pin,$mobile,$ip,$full_name,$lat_long[0]['lat'],$lat_long[0]['lang']));
	if($check==true)
	{
	echo 1;
	}
	else
	{
	echo 0;
	}
}
if(isset($_POST['action']) && $_POST['action'] == 'login'){
     $table="users";
 // Check the action `login`
	$username 		= htmlentities($_POST['username']); 
	$password 		= htmlentities($_POST['password']); 
	
	if(filter_var($username, FILTER_VALIDATE_EMAIL))
	$array=get_sorted_array($table,"WHERE user_email='".$username."'");
	else
	$array=get_sorted_array($table,"WHERE user_login='".$username."'");
	$check = $hasher->CheckPassword($password, $array[0]['user_pass']);
	$pinner=$array[0]['pin'];
    $lat_long=get_sorted_array("pins","WHERE pin_code='$pinner'");
	if($check==true)
	{
	
	$_SESSION['user_login']=$array[0]['user_login'];
	$_SESSION['name']=$array[0]['full_name'];
	$_SESSION['mobile']=$array[0]['mobile'];
	$_SESSION['ID']=$array[0]['ID'];
	$_SESSION['lat']=$lat_long[0]['lat'];
	$_SESSION['lang']=$lat_long[0]['lang'];
	
	echo 1;
	
	}
	else
	{
	echo 0;
	}
}
if(isset($_POST['action']) && $_POST['action'] == 'post'){
     $table="posts";
    $post = htmlentities($_POST['postname']); 
	$content = htmlentities($_POST['postcont']);  
	$bg=htmlentities($_POST['bg']);  
	$address=htmlentities($_POST['address']); 
	$pin=htmlentities($_POST['pin']); 
	$city=htmlentities($_POST['city']); 
 $check = insert($table,array("user","title","para","blood_group","phon_number","address","pin","time","lat","lang","city"),array($_SESSION['ID'],$post,$content,$bg,$_SESSION['mobile'],$address,$pin,time(),$_SESSION['lat'],$_SESSION['lang'],$city));

	if($check==true)
	{
	
	echo 1;
	
	}
	else
	{
	echo 0;
	}
}



?>