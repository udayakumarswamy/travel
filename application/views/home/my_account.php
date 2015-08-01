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
	/*******************/
	function update_profile(){
			$("#error").text('');
			$(".warning").css('display','none');	
			$("#success").text('');
            $(".success").css('display','none');			
			
			var first_name=$.trim($("#first_name").val());
			var last_name=$.trim($("#last_name").val());
			var last_name=$.trim($("#last_name").val());
			var email=$.trim($("#email").val());
			var username=$.trim($("#username").val());
			var user_code=$.trim($("#user_code").val());
			var phone=$.trim($("#phone").val());
			var address=$.trim($("#address").val());
			var gender = $("input[name='gender']:checked").val();

			if(first_name == ''){
				$("#error").text("<?php echo $this->lang->line('please_enter_first_name');?>");
				$(".warning").css('display','block');
				return false;
				// valid=0;	
			}
		   if(last_name == ''){
				$("#error").text("<?php echo $this->lang->line('please_enter_last_name');?>");
				$(".warning").css('display','block');
				// valid=0;
				return false;
			}

			/*if(email == '' ){
				$("#error").text("<?php echo $this->lang->line('please_enter_email');?>");
				$(".warning").css('display','block');
				// valid=0;
				return false;
			}*/
			/*if(email != '' ){
				$("#error").text("<?php echo $this->lang->line('please_enter_a_valid_email');?>");
				$(".warning").css('display','block');
				// valid=0;
				return false;
			}*/
			if(username == '' ){
				$("#error").text("<?php echo $this->lang->line('please_enter_user_name');?>");
				$(".warning").css('display','block');
				// valid=0;
				return false;
			}
			if(phone == '' ){
				$("#error").text("<?php echo $this->lang->line('please_enter_phone_no');?>");
				$(".warning").css('display','block');
				// valid=0;
				return false;
			}
			if(address == '' ){
				$("#error").text("<?php echo $this->lang->line('please_enter_address');?>");
				$(".warning").css('display','block');
				// valid=0;
				return false;
			}if(gender == '' || typeof(gender) == 'undefined'){
				$("#error").text("<?php echo $this->lang->line('please_enter_gender');?>");
				$(".warning").css('display','block');
				// valid=0;
				return false;
			}
			
			var post_data =  {'first_name':first_name,'last_name':last_name,'email':email,'username':username,'phone':phone,'address':address,'gender':gender,'update':1}
				
			$.ajax({
				type:"POST",
				url:'<?php echo base_url();?>index.php/landing/my_account',
				data:post_data,
				dataType:"json",
				beforeSend: function(){ 
					$("#loader_img").empty().html("<img align='right' src='<?php echo base_url();?>assets/images/input-spinner.gif' />");
				},
				success: function(data){
					alert(data);
					$("#loader_img").empty()
					if(data == 1)
					{
						$('#sucess').empty().html("<?php echo $this->lang->line('profile_success_msg');?>")
						setTimeout(function(){
							location.reload();
						},2000);
					}
					if(data == 2)
					{
						$('#error').empty().html("<?php echo $this->lang->line('went_wrong');?>")
					}
				}
			});		
		}
</script>
<style type="text/css">
	.err_msg{
		color: red;
	}.succ_msg{
		color: green;
	}
</style>
<!-- CONTENT SECTION : begin -->
<section class="content-section">
<div class="container">
<div class="row">

<div class="col-sm-12">
<div class="st-form-container">
	 <?php if(isset($upd_success) && $upd_success!=""){ echo $upd_success; }	 
	 if(isset($upd_error) && $upd_error!=""){ echo $upd_error; }
	 ?>
<h5><?php echo $this->lang->line('update_profile');?></h5>
<!-- <form id="update_form" name="update_form" class="default-form" > -->
<div class="default-form">
	<div  class="row">
		<div class="col-sm-6">
			<p id="error" class="err_msg"></p>
			<p id="sucess" class="succ_msg"></p>
		</div>
	</div>
	<div class="row">
	<div class="col-sm-6 ">
	<p>
	<input type="text" id="first_name" name="first_name" class="required" placeholder="<?php echo $this->lang->line('first_name');?>" value="<?php echo $userInfo->FirstName; ?>">
	</p>
	</div>
	<div class="col-sm-6">
	<p>
	<input type="text" id="last_name" name="last_name" class="required" placeholder="<?php echo $this->lang->line('last_name');?>" value="<?php echo $userInfo->LastName; ?>">
	</p>
	</div>
	</div>	

	<div class="row">
	<div class="col-sm-6">
	<p>
	<input type="text" id="email" name="email" disabled="disabled" placeholder="<?php echo $this->lang->line('email');?>" value="<?php echo $userInfo->EmailAddress; ?>">
	</p>
	</div>
	<div class="col-sm-6">
	<p>
	<input type="text" id="username" name="username" class="required" placeholder="<?php echo $this->lang->line('user_name');?>" value="<?php echo $userInfo->userName; ?>">
	</p>
	</div>
	</div>

	<div class="row">
	<div class="col-sm-6">
	<p class="default-form">
	<!-- RADIO INPUTS : begin -->
	<input type="text" id="user_code" name="user_code" disabled="disabled" placeholder="<?php echo $this->lang->line('user_code');?>" value="<?php echo $userInfo->usercode; ?>" >
	<!-- RADIO INPUTS : end -->
	</p>
	</div>
	<div class="col-sm-6">
	<p>
	<input type="text" id="phone" name="phone" macxlength="10" class="required" placeholder="<?php echo $this->lang->line('phone');?>" value="<?php echo $userInfo->Mobile; ?>">
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
			<textarea id="address" name="address" class="required" placeholder="<?php echo $this->lang->line('address');?>" ><?php echo $userInfo->Address; ?></textarea>
			</p>
		</div>
		<div class="col-sm-6">
			<p class="default-form">
			<!-- RADIO INPUTS : begin -->
			<span >
			<input type="radio"  name="gender" id="dummy-radio3" value="male" <?php if($userInfo->Gender=="male"){ ?>checked="checked" <?php } ?> >
			<label for="dummy-radio3"><?php echo $this->lang->line('male');?></label>
			</span>
			<span >
			<input type="radio" name="gender" id="dummy-radio4" value="female" <?php if($userInfo->Gender=="female"){ ?>checked="checked" <?php } ?>>
			<label for="dummy-radio4"><?php echo $this->lang->line('female');?></label>
			</span>
			<!-- RADIO INPUTS : end -->
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6"><p></p></div>
		<!--<div class="col-sm-6">
		<p>
		<input type="text" id="zipcode" name="zipcode" class="required" placeholder="Zip Code">
		</p>
		</div>-->
	</div>
	<div class="row">
		<div class="col-sm-6"></div>
		<div class="col-sm-6"></div>
	</div>
	<div class="row">
		<div class="col-sm-6"></div>
		<div class="col-sm-6">
			<p class="form-submit">
				<input type="hidden" name="update" value="update" />
				<button class="button submit-btn" data-loading-label="Updating..." name="updatebtn" onclick="return update_profile();"><i class="fa fa-envelope" ></i> <?php echo $this->lang->line('update_profile');?></button>
			</p>
		<div id="loader_img" class="loader-img"> </div>
		</div>
	</div>
</div>
	<!-- </form> -->
</div>
</div>
</div>
</div>
</section>
<!-- CONTENT SECTION : end --> 

</div>
<!-- CORE : end --> 