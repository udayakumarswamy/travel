<section id="main-content">
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/library/css/oldie.css">
<script src="<?php echo base_url();?>assets/library/js/respond.min.js" type="text/javascript"></script>
<![endif]-->
<script src="<?php echo base_url();?>assets/library/js/modernizr.custom.min.js" type="text/javascript"></script>
<style>
.page-standard .page-header {
background-image: url("<?php echo base_url();?>assets/dummies/page_header_02.jpg");
}
#core.page-standard {
padding-top: 0px !important;
}
.header-login > .header-form{
left:-212px;
}
</style>

<body class="enable-fixed-header enable-style-switcher enable-inview-animations">
 

<!-- CONTENT SECTION : begin -->
<section class="content-section">
<div class="container">
<div class="row">

<div class="col-sm-12">
<div class="st-form-container">
<h5>Create Package</h5>
<form id="contact-form" action="contact-form.php" method="post" class="default-form">
<div class="row">
<div class="col-sm-6">
<p>
<input type="text" id="field_name" name="package_name" class="required" placeholder="Package Name">
</p>
</div>
<div class="col-sm-6">
<p>
<input type="text" id="field_email" name="field_email" class="required email" placeholder="Deparature Date">
</p>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<p>
<input type="text" id="field_phone" name="field_phone" class="required" placeholder="Araival date">
</p>
</div>
<div class="col-sm-6">
<p> <span class="select-box">
<select id="field_subject" name="field_subject" class="required" data-placeholder="Cost">
<option>Subject</option>
<option value="lorem-ipsum">Lorem Ipsum</option>
<option value="dolor-sit">Dolor Sit</option>
</select>
</span> </p>
</div>

<div class="col-sm-6">
<p> <span class="select-box">
<select id="field_subject" name="field_subject" class="required" data-placeholder="Adult">
<option>Subject</option>
<option value="lorem-ipsum">1</option>
<option value="lorem-ipsum">2</option>
<option value="lorem-ipsum">3</option>
<option value="lorem-ipsum">4</option>


</select>
</span> </p>
</div>

<div class="col-sm-6">
<p> <span class="select-box">
<select id="field_subject" name="field_subject" class="required" data-placeholder="Child">
<option>Subject</option>
<option value="lorem-ipsum">1</option>
<option value="lorem-ipsum">2</option>
<option value="lorem-ipsum">3</option>
<option value="lorem-ipsum">4</option>
</select>
</span> </p>
</div>

<div class="col-sm-6">
<p> <span class="select-box">
<select id="field_subject" name="field_subject" class="required" data-placeholder="Infant">
<option>Subject</option>
<option value="lorem-ipsum">1</option>
<option value="lorem-ipsum">2</option>
<option value="lorem-ipsum">3</option>
<option value="lorem-ipsum">4</option>

</select>
</span> </p>
</div>

<div class="col-sm-6">
<p>
<input type="text" id="field_email" name="field_email" class="required email" placeholder="Destination Country">
</p>
</div>

</div>
<p>
<textarea id="field_message" name="field_message" class="required" placeholder="Package Description?"></textarea>
</p>
<div class="row">
<div class="col-sm-6">
<p class="default-form">

<!-- RATING : begin -->
<span class="rating-container">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
</span>
<!-- RATING : end -->

<!-- CHECKBOXES : begin -->
<span class="checkbox-input">
<input type="checkbox" name="" id="dummy-checkbox">
<label for="dummy-checkbox">Checkbox</label>
</span>
<span class="checkbox-input active">
<input type="checkbox" checked="checked" name="" id="dummy-checkbox2">
<label for="dummy-checkbox2">Checkbox</label>
</span>
<!-- CHECKBOXES : end -->

</p>
</div>
<div class="col-sm-6">

<p class="default-form">
<!-- RADIO INPUTS : begin -->
<span class="radio-input">
<input type="radio" checked="checked" name="dummy-radio-group" id="dummy-radio1">
<label for="dummy-radio1">Radio 1</label>
</span>
<span class="radio-input active">
<input type="radio" name="dummy-radio-group" id="dummy-radio2">
<label for="dummy-radio2">Radio 2</label>
</span>
<!-- RADIO INPUTS : end -->

</p>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<p class="form-note">All fields are required</p>
</div>
<div class="col-sm-6">
<p class="form-submit">
<button class="button submit-btn" data-loading-label="Sending..."><i class="fa fa-envelope"></i> Save</button>
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
</div>
<!-- CORE : end --> 

<!-- FOOTER : begin -->
<footer id="footer">
<div class="container">
<div class="row">
<div class="col-sm-8"> 

<!-- FOOTER TEXT : begin -->
<p>Copyright 2013 &copy; Casa. All rights reserved. Powered by <a href="http://themeforest.net/user/uouapps/portfolio?ref=uouapps">UOUapps</a></p>
<!-- FOOTER TEXT : end --> 

</div>
<div class="col-sm-4"> 

<!-- FOOTER SOCIAL : begin -->
<ul class="footer-social custom-list">
<li><a href="#" title="Facebook"><i class="fa fa-facebook-square"></i><span>Facebook</span></a></li>
<li><a href="#" title="Twitter"><i class="fa fa-twitter-square"></i><span>Twitter</span></a></li>
<li><a href="#" title="Google+"><i class="fa fa-google-plus-square"></i><span>Google+</span></a></li>
<li><a href="#" title="LinkedIn"><i class="fa fa-linkedin-square"></i><span>LinkedIn</span></a></li>
<li><a href="#" title="Pinterest"><i class="fa fa-pinterest"></i><span>Pinterest</span></a></li>
</ul>
<!-- FOOTER SOCIAL : end --> 

</div>
</div>
</div>
</footer>
<!-- FOOTER : end --> 

<!-- SCRIPTS : begin --> 
<script src="<?php echo base_url();?>assets/library/js/jquery-1.9.1.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/library/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/library/js/jquery.ba-outside-events.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/library/js/jquery.inview.min.js" type="text/javascript"></script> 
<!--[if lte IE 8]>
<script src="<?php echo base_url();?>assets/library/js/jquery.placeholder.js" type="text/javascript"></script>
<![endif]--> 
<script src="<?php echo base_url();?>assets/library/js/owl.carousel.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/library/js/jquery.magnific-popup.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/library/twitter/jquery.tweet.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/library/js/scripts.js" type="text/javascript"></script> 
<!-- SCRIPTS : end -->
</section>
		