<?php 
include("header.php");
?>
<div class="row">
<div class="col-md-4"></div>
<div id="postup">
<div class="col-md-4">
<div class="well"> 
           
<form id="post_form"  method="post" class="form-horizontal center" role="form">
             <div class="post_result  alert alert-success"></div>
				<div >
					<label>
						<input class="form-control" placeholder="Tell us your need?" id="post_title" type="text" tabindex="3" required>
					</label>
				</div>
				<div class="form-group" style="padding:14px;">
					
						<textarea  class="form-control" id="post_content" type="text"  placeholder="Please explain briefly" required></textarea>
					
				</div>	
				<label>Blood Group</label>
                    <div class="form-group">
					<label>
						<select class="form-control" id="post_blood_group">
						<option value="a p">A +</option>
						<option value="b p">B +</option>
						<option value="ab p">AB +</option>
						<option value="o p">O +</option>
						<option value="a n">A -</option>
						<option value="b n">B -</option>
						<option value="ab n">AB -</option>
						<option value="o n">O -</option>
						</select>
					</label>
				</div>
                				
              <div class="form-group">
					<label>
						<input class="form-control" placeholder="Address" id="address" type="text" />
					</label>
				</div>	
				<div class="form-group">
					<label>
						<input class="form-control" placeholder="City" id="city" type="text" />
					</label>
				</div>	
               <div class="form-group">
					<label>
						<input class="form-control" placeholder="Pin Code" id="pin_code" type="text" />
					</label>
				</div>							
				<div class="form-group">
					<input class="btn btn-danger center-block" type="submit" id="post" value="Post" />
				</div>
			</form>
</div>
</div>
</div>
</div>