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
		if(email=='') {
			$(".errormsg").text("<?php echo $this->lang->line('please_enter_email_address');?>");
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
					  $(".successmsg").text("<?php echo $this->lang->line('forgot_success_msg');?>");
		        $(".warning").css('display','none');
			      $(".errormsg").text('');
					  $(".success").css('display','block');
					}
					else if(data==0){
						$(".successmsg").text('');
						$(".success").css('display','none');
						$(".errormsg").text("<?php echo $this->lang->line('forgot_cant_changed');?>");
						$(".warning").css('display','block');
									
					}
					else if(data==2){		
				    $(".successmsg").text('');
						$(".success").css('display','none');			
						$(".errormsg").text("<?php echo $this->lang->line('forgot_email_not_found');?>");
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
					<h5><?php echo $this->lang->line('forgot_password_title');?></h5>
					<form id="changePassfrm" name="changePassfrm"  class="default-form">
						<p class="alert-message warning" style="display:none;"><i class="ico fa fa-exclamation-circle"></i><span class="errormsg"></span> <i class="fa fa-times close"></i></p>
						<p class="alert-message success"  style="display:none;"><i class="ico fa fa-exclamation-circle"></i><span class="successmsg"></span> <i class="fa fa-times close"></i></p>
						<div class="row">
							<div class="col-sm-6">
								<p>
									<input type="text" id="forgotpassemail" name="forgotpassemail" class="required email" placeholder="<?php echo $this->lang->line('email');?>">
								</p>
							</div>
							<div class="col-sm-6">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<p class="form-note"><?php echo $this->lang->line('forgot_email_required');?></p>
							</div>
							<div class="col-sm-6">
								<p class="form-submit">
									<button class="button submit-btn" data-loading-label="Sending..."><i class="fa fa-envelope"></i> 
										<?php echo $this->lang->line('submit');?> </button>
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