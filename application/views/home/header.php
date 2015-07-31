<!DOCTYPE html>
<html>
	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Package</title>
        <link rel="shortcut icon" href="dummies/favicon.ico">

		<!-- GOOGLE FONTS : begin -->
		<link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
		<!-- GOOGLE FONTS : end -->

        <!-- STYLESHEETS : begin -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/library/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/library/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/library/css/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/library/css/animate.custom.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/library/css/magnific-popup.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/library/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/library/css/skins/default.css">
		<!--link rel="stylesheet" type="text/css" href="library/css/custom.css"> uncomment if you want to use custom CSS definitions -->
		<!-- STYLESHEETS : end -->

        <!--[if lte IE 8]>
			<link rel="stylesheet" type="text/css" href="library/css/oldie.css">
			<script src="library/js/respond.min.js" type="text/javascript"></script>
        <![endif]-->
		<script src="<?php echo base_url();?>assets/library/js/modernizr.custom.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
       
		<script src="<?php echo base_url();?>assets/library/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
        <style>
		.verify
		{
			margin-top: 4px;
			margin-left: 9px;
			position: absolute;
			width: 16px;
			height: 16px;
		}
		</style>

<script>
function validateEmail(email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( email );
}
$(document).ready(function(){

	$("#userloginForm").submit(function(e) {
		$(".error").text('');
		$(".warning").css('display','none');
		var email=$("#email").val();
		var pass=$("#pass").val();
		var valid=1;

		if(email == '' && valid == 1) {
			$(".error").text("<?php echo $this->lang->line('please_enter_email_address');?>");
			$(".warning").css('display','block');
			valid=0;
		}
		else if(email!='' && valid==1) {
			if( !validateEmail(email)) {
				$(".error").text("<?php echo $this->lang->line('please_enter_a_valid_email');?>");
				$(".warning").css('display','block');
				valid=0;
			}
		}
		if(pass=='' && valid==1) {
			$(".error").text("<?php echo $this->lang->line('please_enter_password');?>");
			$(".warning").css('display','block');
			valid=0;
		}
		//alert(valid);

		if(valid==1) {
			$.ajax({
				type:"POST",
				url:'<?php echo base_url();?>landing/login',
				data:{'email':email,'pass':pass},
				dataType:"json",
				success: function(data) {
					if(data.result==1) {
						window.location='<?php echo base_url();?>landing/welcome';
					}
					else if(data.result==0) {
						$(".error").text("<?php echo $this->lang->line('please_enter_email_address');?>");
						$(".warning").css('display','block');
					}
					else if(data.result==2) {
						$(".error").text("<?php echo $this->lang->line('account_not_verified');?>");
						$(".warning").css('display','block');
					}
				}
			});
		}
		e.preventDefault();
	});

  $('#userregistrationForm').submit(function(evnt) {
		$(".registration_error").text('');
		$("#registration_success").text("");
    $(".warning").css('display','none');
    $(".success").css('display','none');

		var email_address=$("#email_address").val();
		var user_name=$("#user_name").val();
		var password=$("#password").val();
		var con_password=$("#con_password").val();
		var user_type;
		
		$("input[name='user_type']").each(function() {
			if($(this).is(':checked'))
				user_type=$(this).val();
		});
		
		var valid=1;
		
		if(user_name=='' && valid==1) {
			$("#registration_error").text("<?php echo $this->lang->line('please_enter_username');?>");
			$(".warning").css('display','block');
			valid=0;	
		}
		
		if(email_address=='' && valid==1) {
			$("#registration_error").text("<?php echo $this->lang->line('please_enter_email_address');?>");
			$(".warning").css('display','block');
			valid=0;	
		}
		else if(email_address!=''  && valid==1) {
			if( !validateEmail(email_address)) {
				$("#registration_error").text("<?php echo $this->lang->line('please_enter_a_valid_email');?>");
				$(".warning").css('display','block');
				valid=0;
			}
		}
		
		if(password=='' && valid==1) {
			$("#registration_error").text("<?php echo $this->lang->line('please_enter_password');?>");
			$(".warning").css('display','block');
			valid=0;	
		}

		if(con_password!=password && valid==1) {
			$("#registration_error").text("<?php echo $this->lang->line('password_and_confirm_password_does_not_match');?>");
			$(".warning").css('display','block');
			valid=0;	
		}
		
		if(valid==1){
			$.ajax({
				type: "POST",
			  url: "<?php echo base_url();?>landing/registration",
			  data: {'email_address':email_address,'password':password,"user_name":user_name,"user_type":user_type},
			  dataType:"json",
			  success: function(obj){
				//  var obj = JSON.parse(data);
					var errormsg = obj.error;
				  // alert(obj.success);
				  if(obj.success) {
				  	// alert("The registration processed successfully!")
				  	// $(".warning").css('display','none');
				   	//$("#registration_success").text("The registration processed successfully.Please confirm your mail!");
	          //$(".success").css('display','block');
            window.location='<?php echo base_url();?>landing/thankyou';
          }
          else {
          	$(".success").css('display','none');
				    $(".warning").css('display','block');
						$("#registration_error").text(errormsg);
			   	}
			  }
			});
		}
		evnt.preventDefault(); //Avoid that the event 'submit' continues with its normal execution, so that, we avoid to reload the whole page
	});

	$("#email_address").on( "focusout", function() {
  	$("#registration_error").text();
   	$(".warning").css('display','none');
  
  	$.ajax({
   		type: "POST",
   		url: "<?php echo base_url();?>landing/check_email",
		  data: "email_address="+$("#email_address").val(),
		  success: function(msg) {
		  	if(msg=="true") {
		  		// $("#usr_verify").css({ "background-image": "url('<?php echo base_url();?>images/yes.png')" });
	    		$("#registration_error").text();
					$(".warning").css('display','none');
  			}
    		else {
	    		$("#registration_error").text("<?php echo $this->lang->line('this_email_already_exists');?>");
					$(".warning").css('display','block');
    			// $("#usr_verify").css({ "background-image": "url('<?php //echo base_url();?>images/no.png')" });
  			}
   		}
  	});
  });
});

</script>   
		   
		   
	</head>
	<body class="enable-fixed-header enable-style-switcher enable-inview-animations">

		<!-- HEADER : begin -->
		<header id="header">
			<div class="container">
				<div class="header-inner clearfix">

					<!-- HEADER BRANDING : begin -->
					<div class="header-branding">
						<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/dummies/logo.png" alt="Casa"></a>
					</div>
					<!-- HEADER BRANDING : end -->

					<!-- HEADER NAVBAR : begin -->
					<div class="header-navbar">

						<!-- HEADER SEARCH : begin -->
						<div class="header-search">
							&nbsp;
						</div>
						<!-- HEADER SEARCH : end -->

						<!-- HEADER MENU : begin -->
						<div class="header-menu">
							<button class="header-btn" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('menu');?><i class="fa fa-angle-down"></i></button>
							<nav class="header-nav">
								<ul>
									<li class="has-submenu" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>>
										<a href="<?php echo base_url();?>landing" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('home');?></a>
										
									</li>
									
									
									<li <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="about-us.html" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('about_us');?></a></li>
									<li <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="contact-us.html" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('contact_us');?></a></li>
									<li <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="privacy-policy.html" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('privacy_policy');?></a></li>
									<li <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="terms-conditions.html"><?php echo $this->lang->line('terms_and_conditions');?></a></li>
								</ul>
							</nav>
						</div>
						<!-- HEADER MENU : end -->

						<!-- HEADER TOOLS : begin -->
						<div class="header-tools">

							<!-- HEADER LANGUAGE : begin -->
							<div class="header-language">
								<button class="header-btn">EN <i class="fa fa-angle-down"></i></button>
								<nav class="header-nav">
									<ul class="custom-list">
										<li class="active"><a href="<?php echo base_url();?>landing">EN</a></li>
										<li><a href="<?php echo base_url();?>ar/landing">AR</a></li>
										
									</ul>
								</nav>
							</div>
							<!-- HEADER LANGUAGE : end -->
							
							<!-- HEADER REGISTER : begin -->
							<?php if($this->session->userdata('userId')){?>
							<a href="<?php echo base_url();?>landing/welcome">
							My Account
							</a>
							<?php } ?>
							<div class="header-register">
								
								<?php if($this->session->userdata('userId')==''){
?><button class="register-toggle header-btn" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><i class="fa fa-plus-circle"></i><?php echo $this->lang->line('register');?></button><?php }?>
								<div class="header-form">
								<?php if($this->session->userdata('userId')==''){?>

									<!--<form action="index.html" class="default-form">-->
										<form name="userregistrationForm" id="userregistrationForm"  class="default-form" >
										<p class="alert-message warning"><i class="ico fa fa-exclamation-circle"></i><span id="registration_error"></span> <i class="fa fa-times close"></i></p>
										<p class="alert-message success"><i class="ico fa fa-exclamation-circle"></i><span id="registration_success"></span> <i class="fa fa-times close"></i></p>
										<p class="form-row">
											<input class="required" type="text" placeholder="<?php echo $this->lang->line('username');?>"  id="user_name" name="user_name" value="<?php echo set_value('user_name'); ?>" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>>
										</p>
										<p class="form-row">
											<input class="required email" type="text" placeholder="<?php echo $this->lang->line('email');?>"  id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>>
										</p>
										<p class="form-row">
											<input class="required" type="password" placeholder="<?php echo $this->lang->line('password');?>" id="password" name="password" value="<?php echo set_value('password'); ?>" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>>
										</p>
										<p class="form-row">
											<input class="required" type="password" placeholder="<?php echo $this->lang->line('repeat_password');?>" id="con_password" name="con_password" value="<?php echo set_value('con_password'); ?>" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>/>
										</p>
										<p class="form-row">
											<?php echo $this->lang->line('user');?><input  type="radio"  name="user_type" value="1" checked="checked" id="user" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?> />&nbsp;<?php echo $this->lang->line('agent');?><input  type="radio"  name="user_type" value="2" id="agent" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?> />
										</p>
										<p class="form-row">
											<button class="submit-btn button" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><i class="fa fa-plus-circle"></i> <?php echo $this->lang->line('register');?></button>
										</p>
									</form>
									<?php } ?>
								</div>
							</div>
							<!-- HEADER REGISTER : end -->

							<!-- HEADER LOGIN : begin -->
							<?php if($this->session->userdata('userId')){?>
							<a href="<?php echo base_url();?>landing/logout">
							Log Out
							</a>
							<?php } ?>
							<?php if($this->session->userdata('userId')==''){?>
							<div class="header-login">
								<button class="login-toggle header-btn" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?> ><i class="fa fa-power-off"></i><?php echo $this->lang->line('login');?></button>
								<div class="header-form">
									<form name="userloginForm" id="userloginForm" class="default-form">
 											
										 <p class="alert-message warning"><i class="ico fa fa-exclamation-circle"></i><span class="error"></span><i class="fa fa-times close"></i></p>	
                                          <p class="form-row">
											<input class="required email" type="text" placeholder="<?php echo $this->lang->line('email');?>"  id="email" name="email" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?> >
										  </p>
                                          <p class="form-row">
											<input class="required" type="password" placeholder="<?php echo $this->lang->line('password');?>"  id="pass" name="pass" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?> >
										</p>
                                        <p class="form-row">
                                          <button class="submit-btn button" id="btn_submit"><i class="fa fa-power-off"></i><?php echo $this->lang->line('login');?></button>
                                        </p>
                                        <p class="form-row forgot-password">
											<a href="<?php echo base_url();?>landing/forgotpassword" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('forgot_password');?></a>
										</p>
                                         </form>
										
										
										
										
											
										
										
								      
									<!--</form>-->
								</div>
							</div>
							<?php } ?>
							<!-- HEADER LOGIN : end -->

							<!-- HEADER ADD OFFER : begin -->
							<?php if($this->session->userdata('userId') && $this->session->userdata('usertype')==2 ){?>
							<span class="header-add-offer"><a href="<?php echo base_url();?>agent/add_package" class="button"><i class="fa fa-plus"></i> Add Package</a></span>
							<?php } ?>
							<!-- HEADER ADD OFFER : end -->

						</div>
						<!-- HEADER TOOLS : end -->

					</div>
					<!-- HEADER NAVBAR : end -->

					<!-- SEARCH TOGGLE : begin -->
					<button class="search-toggle button"><i class="fa fa-search"></i></button>
					<!-- SEARCH TOGGLE : end -->

					<!-- NAVBAR TOGGLE : begin -->
					<button class="navbar-toggle button"><i class="fa fa-bars"></i></button>
					<!-- NAVBAR TOGGLE : end -->

				</div>
			</div>
		</header>
		<!-- HEADER : end -->