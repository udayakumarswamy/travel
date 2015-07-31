<script>
$(document).ready(function(){
	$("#changePassfrm").submit(function(e){
			$(".errormsg").text('');
			$(".warning").css('display','none');	
			$(".successmsg").text('');
            $(".success").css('display','none');			
			//alert($("#forgotpassemail").val());
			var email= $("#forgotpassemail").val();
		 //	alert(email);		
		    var valid=1;
			if(email==''){
				$(".errormsg").text('Please Enter Email-Id');
				$(".warning").css('display','block');
				valid=0;	
			}
		//	alert(valid);
			if(valid==1){
			//alert(newpass);
			//alert(oldpass);
			$.ajax({
					type:"POST",
					url:'<?php echo base_url();?>index.php/landing/forgotpassword',
					data:{'email':email},
					//dataType:"json",
					success: function(data){
					//alert(data);
						if(data==1){
						//	window.location='<?php //echo base_url();?>index.php/landing/welcome';
						  $(".successmsg").text('Password changed and send to your email.');
				          $(".warning").css('display','none');
					      $(".errormsg").text('');
						  $(".success").css('display','block');
						}else if(data==0){					
							$(".successmsg").text('');
							$(".success").css('display','none');
							$(".errormsg").text("Password can't changed");
							$(".warning").css('display','block');
							
						}else if(data==2){		
						    $(".successmsg").text('');
							$(".success").css('display','none');			
							$(".errormsg").text('Sorry! This email not found in our database');
							$(".warning").css('display','block');	
						}
					}
				});		
			}
			e.preventDefault();
		});
});
</script>
<!-- CORE : begin -->
<div id="core" class="page-standard">

<!-- CONTENT SECTION : begin -->
<section class="content-section">
<div class="container">
<div class="row">

<div class="col-sm-12">
<div class="st-form-container">
<h5>Enter your email address below and click Submit. We will send a new password to you.</h5>
<form id="changePassfrm" name="changePassfrm"  class="default-form">
						<p class="alert-message warning" style="display:none;"><i class="ico fa fa-exclamation-circle"></i><span class="errormsg"></span> <i class="fa fa-times close"></i></p>
						<p class="alert-message success"  style="display:none;"><i class="ico fa fa-exclamation-circle"></i><span class="successmsg"></span> <i class="fa fa-times close"></i></p>
<div class="row">
<div class="col-sm-6">
<p>
<input type="text" id="forgotpassemail" name="forgotpassemail" class="required email" placeholder="Email-Id">
</p>
</div>
<div class="col-sm-6">
</div>
</div>
<div class="row">
<div class="col-sm-6">
<p class="form-note">The above Email field is required</p>
</div>
<div class="col-sm-6">
<p class="form-submit">
<button class="button submit-btn" data-loading-label="Sending..."><i class="fa fa-envelope"></i> Sunmit </button>
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