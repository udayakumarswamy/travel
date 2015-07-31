<!-- CORE : begin -->
<div id="core" class="page-standard">

<!-- CONTENT SECTION : begin -->
<section class="content-section">
<div class="container">
<div class="row">

<div class="col-sm-12">
<div class="st-form-container">
<!--<h5>The registration processed successfully.A confirmatiomn email is sent to your email.Please confirm your mail for login !</h5>-->
<?php if(isset($errormsg['error']) && $errormsg['error']!=""){ ?>
							<p class="alert-message warning"><i class="ico fa fa-exclamation-circle"></i>
							<span><?php echo $errormsg['error']; ?></span>
							<i class="fa fa-times close"></i></p>	
							<?php } ?>
							<?php if(isset($errormsg['success']) && $errormsg['success']!=""){ ?>
							<p class="alert-message success"><i class="ico fa fa-exclamation-circle"></i>
							<span><?php echo $errormsg['success']; ?></span>
							<i class="fa fa-times close"></i></p>	
							<?php } ?>
							

</div>
</div>
</div>
</div>
</section>
<!-- CONTENT SECTION : end --> 

</div>
<!-- CORE : end --> 

