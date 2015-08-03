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

		<?php
			if($this->session->userdata('language')=='arabic'){
				?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/library/css/skins/ar_default.css">
				<?php
			}
			else {
				?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/library/css/skins/en_default.css">
				<?php

			}
		?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/uploadfile.css">
		
		<!--link rel="stylesheet" type="text/css" href="library/css/custom.css"> uncomment if you want to use custom CSS definitions -->
		<!-- STYLESHEETS : end -->

        <!--[if lte IE 8]>
			<link rel="stylesheet" type="text/css" href="library/css/oldie.css">
			<script src="library/js/respond.min.js" type="text/javascript"></script>
        <![endif]-->
		<script src="<?php echo base_url();?>assets/library/js/modernizr.custom.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
       <script src="<?php echo base_url();?>assets/js/jquery.uploadfile.js" type="text/javascript"></script>
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
		<script type="text/javascript">
		function set_session(lang)
		{
			if(lang != '')
			{
				$.ajax({
					type: "POST",
					// url: "landing/set_session_lang",
					url: "<?php echo base_url();?>index.php/landing/set_session_lang",
					data: "language="+lang,
					success: function(msg) {
						location.reload();
						/*if(lang == 'en')
						{
							$('#li_english').addClass('active');
							$('#li_arabic').removeClass('active');
							$('#btn_active').empty().html('EN <i class="fa fa-angle-down"></i>');
						}
						else
						{
							$('#li_arabic').addClass('active');
							$('#li_english').removeClass('active');
							$('#btn_active').empty().html('AR <i class="fa fa-angle-down"></i>');
						}*/
					}
				});
			
			}
		}

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
							
						</div>
						<!-- HEADER SEARCH : end -->

						<!-- HEADER MENU : begin -->
						<div class="header-menu">
							<button class="header-btn" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('menu');?><i class="fa fa-angle-down"></i></button>
							<nav class="header-nav">
								<ul>
									<li class="has-submenu" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>>
										<a href="/landing" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('home');?></a>
										
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
								<?php 
								$lang = '';
								if(empty($this->session->userdata('language'))){
									$lang = 'EN';
								}
								else
								{
									if(trim($this->session->userdata('language')) == 'arabic'){
										$lang = 'AR';
									}
									else
									{
										$lang = 'EN';
									}
								}
								?>
								<button class="header-btn"><?php echo $lang;?> <i class="fa fa-angle-down"></i></button>
								<nav class="header-nav">
									<ul class="custom-list">
										<?php /*<li class="active"><a href="<?php echo base_url();?>index.php/landing">EN</a></li>
										<li><a href="<?php echo base_url();?>index.php/ar/landing">AR</a></li> */?>
										<li class="active" ><a href="javascript:void(0)" onClick="set_session('en');">EN</a></li>
										<li ><a href="javascript:void(0)" onClick="set_session('ar');">AR</a></li>
										
										
									</ul>
								</nav>
							</div>
							<!-- HEADER LANGUAGE : end -->
							
							<!-- HEADER REGISTER : begin -->
							<?php if($this->session->userdata('userId')){?>
							<a href="<?php echo base_url();?>index.php/landing/welcome">
							<?php echo $this->lang->line('my_account');?>
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
							<a href="<?php echo base_url();?>index.php/landing/logout">
							<?php echo $this->lang->line('log_out');?>
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
											<a href="<?php echo base_url();?>index.php/landing/forgotpassword" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('forgot_password');?></a>
										</p>
                                         </form>
										
										
										
										
											
										
										
								      
									<!--</form>-->
								</div>
							</div>
							<?php } ?>
							<!-- HEADER LOGIN : end -->

							<!-- HEADER ADD OFFER : begin -->
							<?php if($this->session->userdata('userId') && $this->session->userdata('usertype')==2 ){?>
							<span class="header-add-offer"><a href="<?php echo base_url();?>index.php/agent/add_package" class="button"><i class="fa fa-plus"></i> Add Package</a></span>
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
							
				<!-- CORE : begin -->
				<?php $usertype=$this->session->userdata('usertype');?>
				<div id="core" class="page-standard">
					<div class="page-header has-nav">
						<div class="container">
							<div class="page-header-inner">
								<h1 style="color:#666666"><?php echo $this->lang->line('welcome');?>&nbsp;<?php echo $username ?></h1>
								<ul class="custom-list breadcrumbs">
								<li><a href="<?php echo base_url();?>index.php/landing/welcome"><?php echo $this->lang->line('home');?></a> / </li>
								<li><a href="<?php echo base_url();?>index.php/landing/my_account"><?php echo $this->lang->line('my_profile');?></a> / </li>
								<li><a href="<?php echo base_url();?>index.php/landing/changepass"><?php echo $this->lang->line('change_password');?></a>/</li>
								<?php if($usertype==2){ ?>
								<li><a href="<?php echo base_url();?>index.php/agent/add_package"><?php echo $this->lang->line('add_package');?></a>/</li>
								<?php } ?>
								<?php
								if($usertype == 1) {
									?>
								<li><a href="<?php echo base_url();?>index.php/user/list_bookings"><?php echo $this->lang->line('list_bookings');?></a></li>
									<?php
								} else {
									?>
								<li><a href="<?php echo base_url();?>index.php/agent/list_package"><?php echo $this->lang->line('package_listing');?></a></li>

									<?php
								}
								?>
								</ul>
							</div>
						</div>
					</div>
				<!-- PAGE HEADER : end --> 			
