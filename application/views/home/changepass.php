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
				$("#error").text("<?php echo $this->lang->line('enter_old_pwd');?>");
				$(".warning").css('display','block');
				valid=0;	
			}
		   if(newpass==''  && valid==1){
					$("#error").text("<?php echo $this->lang->line('enter_new_pwd');?>");
					$(".warning").css('display','block');
					valid=0;
			}
		
		  if(repeatnewpassword!=newpass && valid==1){
				$("#error").text("<?php echo $this->lang->line('old_new_pwd_same');?>");
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
						  $("#success").text("<?php echo $this->lang->line('pwd_changed');?>");
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
<h5><?php echo $this->lang->line('change_pwd_here');?></h5>
<form id="changePassfrm" name="changePassfrm"  class="default-form">
<p class="alert-message warning" style="display:none;"><i class="ico fa fa-exclamation-circle"></i><span id="error"></span> <i class="fa fa-times close"></i></p>
<p class="alert-message success"  style="display:none;"><i class="ico fa fa-exclamation-circle"></i><span id="success"></span> <i class="fa fa-times close"></i></p>
<div class="row">
<div class="col-sm-6">
<p>
<input type="password" id="oldpassword" name="oldpassword" class="required" placeholder="<?php echo $this->lang->line('old_pwd');?>">
</p>
</div>
<div class="col-sm-6">
<!--<p>
<input type="password" id="field_email" name="field_email" class="required " placeholder="New Password">
</p>-->
</div>
</div>
<div class="row">
<div class="col-sm-6">
<p>
<input type="password" id="newpassword" name="newpassword" class="required " placeholder="<?php echo $this->lang->line('new_pwd');?>">
</p>
</div>
<div class="col-sm-6">
<p> <input type="password" id="repeatnewpassword" name="repeatnewpassword" class="required " placeholder="<?php echo $this->lang->line('repeat_pwd');?>"> </p>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<p class="form-note"><?php echo $this->lang->line('all_fields_req');?></p>
</div>
<div class="col-sm-6">
<p class="form-submit">
<button class="button submit-btn" data-loading-label="Sending...">
sub
	<i class="fa fa-envelope"></i> <?php echo $this->lang->line('submit');?> </button>
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