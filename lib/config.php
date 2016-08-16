<?php 
date_default_timezone_set("Asia/Dili"); 
session_start();
$db=mysqli_connect("localhost","thegaqkr_amania","daimenchymasattar1#@","thegaqkr_elixir");

function insert($table,$row=array(),$values=array()){
	global $db;
	  $a=implode(",",$row);
	  $a='('.$a.')';
	  foreach($values as &$value)
	  {
	  mysqli_real_escape_string($db,$value);
	  $value="'".$value."'";
	  
	  }
	  $b=implode(",",$values);
	  $b='('.$b.')';
	  $query="INSERT INTO ".$table." ".$a." VALUES".$b;
	  $result = mysqli_query($db,$query);
	 if($result)
	 return true;
	}
	
function get_sorted_array($table,$sort){
	  global $db;
	  $fields=array();
	  $result = mysqli_query($db,"SELECT * FROM ".$table." ".$sort);
	  if ($result)
	  { if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fields[]=$row;
    }
}
	return $fields;
	  }
	  else
	  {
     return array();		  
	  }
	}
	
	

?>