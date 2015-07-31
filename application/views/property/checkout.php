<!-- CORE : begin -->
<?php 
if($postfix=='')
									  	$folder='';
									  else
									  	$folder='ar/';
?>
<div id="core" class="page-standard">

<!-- CONTENT SECTION : begin -->
<section class="content-section">
<div class="container">
<div class="row">

<div class="col-sm-12">
<div class="st-form-container">
<div class="col-md-6" style="border-right:1px solid #f3f3f3">
	<?php $attributes=array('class'=>"default-form",'id'=>'form2');?>
		<?php echo form_open("index.php/".$folder."package/intermediate_booking",$attributes);?>
		<h3><?php echo $this->lang->line('register');?></h3>
		<div style="color:#ff000; margin-left:auto; margin-right:auto; width:80%" id="error_div"></div>	
		<input type="hidden" name="package_id" id="package_id" value="<?php echo $this->session->userdata("package_id");?>"/>
		<input type="hidden" name="adults" id="adults" value="<?php echo $this->session->userdata("adults");?>"/>
		<input type="hidden" name="children" id="children" value="<?php echo $this->session->userdata("children");?>"/>
		<input type="hidden" name="infant" id="infant" value="<?php echo $this->session->userdata("infant");?>"/>
		<input type="hidden" name="package_cost" id="package_cost" value="<?php echo $this->session->userdata("package_cost");?>"/>
		
		<p class="form-row">
											<input class="required" type="text" placeholder="<?php echo $this->lang->line('username');?>"  id="p_user_name" name="user_name" value="">
										</p>
										<p class="form-row">
											<input class="required email" type="text" placeholder="<?php echo $this->lang->line('email');?>"  id="p_email_address" name="email_address" value="<?php echo set_value('email_address'); ?>">
										</p>
										<p class="form-row">
											<input class="required" type="password" placeholder="<?php echo $this->lang->line('password');?>" id="p_password" name="password" value="<?php echo set_value('password'); ?>">
										</p>
										<p class="form-row">
											<input class="required" type="password" placeholder="<?php echo $this->lang->line('repeat_password');?>" id="p_con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" />
										</p>
										<p class="form-row">
											<input  type="hidden"  name="user_type" id="p_user_type" value="1" checked="checked"  />
										</p>
										<p class="form-row">
											<button class="register-btn button"><i class="fa fa-plus-circle"></i><?php echo $this->lang->line('register');?></button>
										</p>
		<?php echo form_close();?>	
			
</div>
<div class="col-md-6" >
<h3><?php echo $this->lang->line('login');?></h3>

<?php $attributes=array('class'=>"default-form",'id'=>'form1' );?>
		<?php echo form_open("index.php/".$folder."package/intermediate_booking",$attributes);?>
		<input type="hidden" name="package_id" id="package_id" value="<?php echo $this->session->userdata("package_id");?>"/>
		<input type="hidden" name="adults" id="adults" value="<?php echo $this->session->userdata("adults");?>"/>
		<input type="hidden" name="children" id="children" value="<?php echo $this->session->userdata("children");?>"/>
		<input type="hidden" name="infant" id="infant" value="<?php echo $this->session->userdata("infant");?>"/>
		<input type="hidden" name="package_cost" id="package_cost" value="<?php echo $this->session->userdata("package_cost");?>"/>
		<p class="alert-message warning"><i class="ico fa fa-exclamation-circle"></i><span class="error"></span><i class="fa fa-times close"></i></p>	
 <p class="form-row">
		<input class="required email" type="text" placeholder="<?php echo $this->lang->line('email');?>"  id="p_email" name="email" >
	  </p>
	  <p class="form-row">
		<input class="required" type="password" placeholder="<?php echo $this->lang->line('password');?>"  id="p_pass" name="pass" >
	</p>
	<p class="form-row">
	  <button class="submit-btn button" id="btn_submit"><i class="fa fa-power-off"></i><?php echo $this->lang->line('login');?>/button>
	</p>
</div>
<?php echo form_close();?>
</div>
</div>
</div>
</div>
</section>
<!-- CONTENT SECTION : end --> 
<script type="text/javascript">
	
	$("#form2").submit(function(e){
		
		var package_id=$("#package_id").val();
		var adults=$("#adults").val();
		var children=$("#children").val();
		var infant=$("#infant").val();
		var package_cost=$("#package_cost").val();
		var user_name=$("#p_user_name").val();
		var email=$("#p_email_address").val();
		var password=$("#p_password").val();
		var con_password=$("#p_con_password").val();
		var user_type=$("#p_user_type").val();
		var valid=1;
		
		
		if(user_name==''){
			$("#error_div").show();
			$("#error_div").text('Please enter User Name');
			valid=0;
		}
		
		if(email=='' && valid==1){
			$("#error_div").show();
			$("#error_div").text('Please enter Email Address');
			valid=0;
		}else{
		
			if(!validateEmail(email)){
				$("#error_div").show();
				$("#error_div").text('Please enter Valid Email Address');
				valid=0;
			}else{
				$.ajax({
					type:"POST",
					url:"<?php echo base_url();?>index.php/user/check_email_exists/"+email,
					dataType:"json",
					success:function(data){
						if(data.result==1){
							$("#error_div").show();
							$("#error_div").text('Email Address already exists');
							valid=0;
						}
					}
				});
			}
		}
		
		if(con_password=='' && valid==1){
				$("#error_div").show();
				$("#error_div").text('Please Confirm Password');
				valid=0;
		}else{
			if(password!=con_password)
			{	
				$("#error_div").show();
				$("#error_div").text('Please Confirm Password');
				valid=0;

			}
		}
		
				
		if(valid==1)
		{
			
			$.ajax({
				type:"POST",
				url:"<?php echo base_url()?>index.php/<?php echo $folder;?>landing/registration",
				data:{'user_name':user_name,'email_address':email,'password':password,'user_type':user_type},
				dataType:"json",
				success:function(){
					
					if(data.success==true){
						window.location="<?php echo base_url()?>index.php/<?php echo $folder;?>package/intermediate_booking/"+data.user_id;
					}else{
						$("#error_div").show();
						$("#error_div").text("There is some problem with registration");
					}
				}
				
			});
			
		}
		//alert('valid'+valid);
		e.preventDefault();
	});
	
	$("#form1").submit(function(e){
	$(".error").text('');
	$(".warning").css('display','none');	
	var email=$("#p_email").val();
	var pass=$("#p_pass").val();
	//alert(email)

	var valid=1;
	
	if(email=='' && valid==1){
		$(".error").text('Please Enter Email');
		$(".warning").css('display','block');
		valid=0;	
	}else if(email!=''  && valid==1){
		
	    if( !validateEmail(email)) {
			$(".error").text('Please Enter a valid Email');
		    $(".warning").css('display','block');
		    valid=0;
		}
	}
	if(pass=='' && valid==1){
		$(".error").text('Please Enter Password');
		$(".warning").css('display','block');
		valid=0;	
	}
	//alert(valid);
	if(valid==1){
		$.ajax({
			type:"POST",
			url:'<?php echo base_url();?>index.php/<?php echo $folder;?>landing/login',
			data:{'email':email,'pass':pass},
			dataType:"json",
			success: function(data){
				if(data.result==1){
					window.location='<?php echo base_url();?>index.php/<?php echo $folder;?>package/intermediate_booking/';						
				}else if(data.result==0){					
					$(".error").text('Either email or Password is incorrect');
					$(".warning").css('display','block');	
				}else if(data.result==2){					
					$(".error").text('Sorry! Your Account is not verified');
					$(".warning").css('display','block');	
				}
			}
		});		
	}
	e.preventDefault();
});
</script>
</div>

<!-- CORE : end --> 