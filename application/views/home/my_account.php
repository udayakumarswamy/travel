<script>
$(document).ready(function(){
	$("#changePassfrm").submit(function(e){
			$("#error").text('');
			$(".warning").css('display','none');	
			$("#success").text('');
            $(".success").css('display','none');			
			var oldpass=$("#oldpassword").val();
		//	alert(oldpass);
			var newpass=$("#newpassword").val();
			var repeatnewpassword=$("#repeatnewpassword").val();
		
		    var valid=1;
			if(oldpass=='' && valid==1){
				$("#error").text('Please Enter old password');
				$(".warning").css('display','block');
				valid=0;	
			}
		   if(newpass==''  && valid==1){
					$("#error").text('Please Enter new password');
					$(".warning").css('display','block');
					valid=0;
			}
		
		  if(repeatnewpassword!=newpass && valid==1){
				$("#error").text('password and repeat password must be same');
				$(".warning").css('display','block');
				valid=0;	
			}
		//	alert(valid);
			if(valid==1){
			//alert(newpass);
			//alert(oldpass);
			$.ajax({
					type:"POST",
					url:'<?php echo base_url();?>index.php/landing/changepass',
					data:{'oldpassword':oldpass,'newpassword':newpass},
					dataType:"json",
					success: function(data){
					//alert(data.result);
						if(data.result==1){
						//	window.location='<?php //echo base_url();?>index.php/landing/welcome';
						  $("#success").text('Password changed');
				          $(".warning").css('display','none');
					      $("#error").text('');
						  $(".success").css('display','block');
						}else if(data.result==0){					
							$("#success").text('');
							$(".success").css('display','none');
							$("#error").text("Password can't changed");
							$(".warning").css('display','block');
							
						}else if(data.result==2){		
						    $("#success").text('');
							$(".success").css('display','none');			
							$("#error").text('Sorry! Old password not found in our database');
							$(".warning").css('display','block');	
						}
					}
				});		
			}
			e.preventDefault();
		});
});
</script>

<!-- CONTENT SECTION : begin -->
<section class="content-section">
<div class="container">
<div class="row">

<div class="col-sm-12">
<div class="st-form-container">
	 <?php if(isset($upd_success) && $upd_success!=""){ echo $upd_success; }	 
	 if(isset($upd_error) && $upd_error!=""){ echo $upd_error; }
	 ?>
<h5>Update Profile</h5>
<form id="update-form" name="update-form" action="" method="post" class="default-form">
<div class="row">
<div class="col-sm-6">
<p>
<input type="text" id="first_name" name="first_name" class="required" placeholder="First Name" value="<?php echo $userInfo->FirstName; ?>">
</p>
</div>
<div class="col-sm-6">
<p>
<input type="text" id="last_name" name="last_name" class="required" placeholder="Last Name" value="<?php echo $userInfo->LastName; ?>">
</p>
</div>
</div>	
	
<div class="row">
<div class="col-sm-6">
<p>
<input type="text" id="email" name="email" disabled="disabled" placeholder="Email" value="<?php echo $userInfo->EmailAddress; ?>">
</p>
</div>
<div class="col-sm-6">
<p>
<input type="text" id="username" name="username" class="required" placeholder="User Name" value="<?php echo $userInfo->userName; ?>">
</p>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<p class="default-form">
<!-- RADIO INPUTS : begin -->
<input type="text" id="user_code" name="user_code" disabled="disabled" placeholder="User Code" value="<?php echo $userInfo->usercode; ?>">
<!-- RADIO INPUTS : end -->
</p>
</div>
<div class="col-sm-6">
<p>
<input type="text" id="phone" name="phone" class="required" placeholder="Phone" value="<?php echo $userInfo->Mobile; ?>">
</p>
</div>
</div>

<div class="row">
<div class="col-sm-6">

</div>
<div class="col-sm-6">
</div>
</div>
<div class="row">
<div class="col-sm-6">
<p>
<textarea id="address" name="address" class="required" placeholder="Address" ><?php echo $userInfo->Address; ?></textarea>
</p>
</div>
<div class="col-sm-6">
<p class="default-form">
<!-- RADIO INPUTS : begin -->
<span >
<input type="radio"  name="gender" id="dummy-radio3" value="male" <?php if($userInfo->Gender=="male"){ ?>checked="checked" <?php } ?> >
<label for="dummy-radio3">Male</label>
</span>
<span >
<input type="radio" name="gender" id="dummy-radio4" value="female" <?php if($userInfo->Gender=="female"){ ?>checked="checked" <?php } ?>>
<label for="dummy-radio4">Female</label>
</span>
<!-- RADIO INPUTS : end -->

</p>

</div>
</div>
<div class="row">
<div class="col-sm-6">
<p>
	
</p>
</div>
<!--<div class="col-sm-6">
<p>
<input type="text" id="zipcode" name="zipcode" class="required" placeholder="Zip Code">
</p>
</div>-->
</div>
<div class="row">

<div class="col-sm-6">
</div>
<div class="col-sm-6">

</div>
</div>
<div class="row">
<div class="col-sm-6">

</div>
<div class="col-sm-6">
<p class="form-submit">
	<input type="hidden" name="update" value="update" />
<button class="button submit-btn" data-loading-label="Updating..." name="updatebtn"><i class="fa fa-envelope"></i> Update Profile</button>
</p>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<!-- CONTENT SECTION : end --> 

</div>
<!-- CORE : end --> 