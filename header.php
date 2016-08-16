<?PHP 
include("lib/config.php");
if (strpos($_SERVER['HTTP_HOST'],"myexilir")!==false) {
	if(strpos($_SERVER['REQUEST_URI'],"?") !==false)
	$op="&";
    else
	$op="?";
    header("Location:http://myelixir.in".$_SERVER['REQUEST_URI'].$op."app=1");
	
    exit;
}
if(isset($_GET['app']) && $_GET['app']==1)
$_SESSION['app']=1;
?> 
<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Elixir - Donate Blood. Extend Help. </title>
		<meta name="generator" content="Elixir" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65602358-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>

<nav class="navbar navbar-fixed-top header">
 	<div class="col-md-12">
        <div class="navbar-header">
          
          <a href="http://myelixir.in" class="navbar-brand"><img src="images/Elixir4.png" width="32px" height="32px"/> Elixir</a>

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
          Manage App
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse1">
        
          <ul class="nav navbar-nav navbar-right">
		  <?php if(isset($_SESSION['user_login'])) {?>
		  <li><a><?php  echo $_SESSION['name']; ?></a></li>
		  
             <li><a href="logout.php"><i class="glyphicon  glyphicon-log-out"></i>Logout</a></li>
			 <?php }?>
           </ul>
        </div>	
     </div>	
</nav>
<div class="navbar navbar-default" id="subnav">
    <div class="col-md-12">
      <div class="navbar-header">
          
          <a href="#" style="margin-left:15px;" class="navbar-btn btn btn-default btn-plus dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-home" style="color:#dd1111;"></i> Home <small><i class="glyphicon glyphicon-chevron-down"></i></small></a>
          <ul class="nav dropdown-menu">
              <li><a href="#bankfeed"><i class="glyphicon glyphicon-heart" style="color:#dd1111;"></i> Blood Banks</a></li>
              <li><a href="#blogfeed"><i class="glyphicon glyphicon-pencil" style="color:#dd1111;"></i> Blog</a></li>
              <li><a href="feedback.php"><i class="glyphicon glyphicon-inbox" style="color:#dd1111;"></i> Feedback</a></li>
          </ul>
          
          
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav navbar-right">
             <li <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){?> class="active"<?php } ?> ><a href="index.php">Home</a></li>
			 <?php if(isset($_SESSION['user_login'])) {?>
		  
             <li <?php if(basename($_SERVER['PHP_SELF'])=="post.php"){?> class="active"<?php } ?> ><a href="post.php">Get A Donor</a></li>
			 <?php }
          if(isset($_SESSION['user_login']) && $_SESSION['user_login']=="anshuman"){
	   ?>
	   <li <?php if(basename($_SERVER['PHP_SELF'])=="blood_bank.php"){?> class="active"<?php } ?> ><a role="button" href="blood_bank.php">Add Blood Bank</a></li>
       <li <?php if(basename($_SERVER['PHP_SELF'])=="users.php"){?> class="active"<?php } ?> ><a role="button" href="users.php">Users</a></li>	
	<?php  
   }

			 if(!isset($_SESSION['user_login'])){?>
             <li <?php if(basename($_SERVER['PHP_SELF'])=="login.php"){?> class="active"<?php } ?> ><a id="loginModal" role="button" href="login.php">Login</a></li>
             <li <?php if(basename($_SERVER['PHP_SELF'])=="register.php"){?> class="active"<?php } ?> ><a role="button" href="register.php">Register</a></li>
			 <?php }?>
           </ul>
        </div>	
     </div>	
</div>			
<div class="container" id="main">
	 
			 <?php if(!isset($_SESSION['user_login']) && basename($_SERVER['PHP_SELF']) !="register.php" && basename($_SERVER['PHP_SELF']) !="login.php"){?>
<div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              <strong>Hey There!</strong> <a href="login.php"> Login Now</a> to use this App and be a part of the revolution.</strong>
          </div>
			 <?php } ?>
		  
		