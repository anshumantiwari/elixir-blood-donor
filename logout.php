<?php 
include("lib/config.php");
session_destroy();
if(isset($_SESSION['app']))
header("Location: index.php?app=1" );
else
header("Location: index.php" );	

?>