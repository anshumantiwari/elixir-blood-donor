<?php 
include("header.php");
 $logged=isset($_SESSION['user_login']);
 $lat="";
 $lang="";
 $bd="";
 if($logged)
 {   $id=$_SESSION['ID'];
	 $lat=$_SESSION['lat'];
	 $lang=$_SESSION['lang'];
	 $abc=get_sorted_array("users","WHERE ID='$id'");
	 $bd=$abc[0]['blood_group'];
 }
?>
   <div class="row">
   <div class="col-md-4 col-sm-6 home-feed" id="homefeed">
 <script type="text/javascript">
 <?php 

 
 ?>
 $(document).ready(function(){
	 var UrlToPass ='action=active&user_logged=<?php echo $logged;?>&lat=<?php echo $lat;?>&lang=<?php echo $lang;?>&bd=<?php echo $bd; ?>&app=<?php echo $_GET['app']; ?>';
	 var UrlTo ='action=bbanks&user_logged=<?php echo $logged;?>&lat=<?php echo $lat;?>&lang=<?php echo $lang;?>&bd=<?php echo $bd; ?>';
	 var feeder=$('.home-feed');
	 var beeder=$('.bank-feed');

	 $.ajax({ 
			type : 'GET',
			data : UrlToPass,
			url  : 'feed.php',
			success: function(responseText){
				feeder.html(responseText);
			}
			});

  $.ajax({ 
			type : 'GET',
			data : UrlTo,
			url  : 'feed.php',
			success: function(responseText){
				beeder.html(responseText);
			}
			});
 });
 
 
 </script>
 </div>
    <div class="col-md-4 col-sm-6 bank-feed" id="bankfeed">
	</div>
	
	<div class="col-md-4 col-sm-6">
	 <h3>Facts about Blood</h3>
	<div class="panel panel-default">
          <div class="panel-body">
		  <p>One pint of donated blood can save up to 3 lives.</p>
		  </div>
	</div>
	
	<div class="panel panel-default">
          <div class="panel-body">
		  <p>
A newborn baby has about one cup of blood in his body.</p>
		  </div>
	</div>
	
   
  <div class="panel panel-default">
          <div class="panel-body">
		  <p>HP Printer black ink is more expensive than blood.</p>
		  </div>
	</div>
	
	<div class="panel panel-default">
          <div class="panel-body">
		  <p>Only female
mosquitoes
drink blood.
Males are vegetarians.</p>
		  </div>
	</div>
	
	<div class="panel panel-default">
          <div class="panel-body">
		  <p>James Harrison has donated blood over 1,000 times saving over 2 million unborn babies from Rhesus disease.
</p>
		  </div>
	</div>
	
	<div class="panel panel-default">
          <div class="panel-body">
		  <p>A red blood cell can make a complete circuit of your body in 30 seconds.
</p>
		  </div>
	</div>
	
	
	<div class="panel panel-default">
          <div class="panel-body">
		  <p>
Coconut water can be used (in emergencies) as a substitute for blood plasma.</p>
		  </div>
	</div>
	
	
	<div class="panel panel-default">
          <div class="panel-body">
		  <p>One pint of donated blood can save up to 3 lives.</p>
		  </div>
	</div>
	
 </div>
 <?php 
