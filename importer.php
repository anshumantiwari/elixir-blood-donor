<?php 
ini_set('max_execution_time','240');
include("lib/config.php");
$file = "pin.csv";
    $source = fopen($file, 'r') or die("Problem open file");
	$i=0;
    while (($data = fgetcsv($source, 1000, ",")) !== FALSE)
    {
       $i++;
      insert("pins",array("country_code","pin_code","place_name","state","state_code","sub_1","sub_code_1","sub_2","sub_code_2","lat","lang","accuracy"),$data);

    }
	echo $i;
    fclose($source);
    
  
  

?>