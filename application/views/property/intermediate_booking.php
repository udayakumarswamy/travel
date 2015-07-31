<!-- CORE : begin -->
<div id="core" class="page-standard">
<?php ?>
<!-- CONTENT SECTION : begin -->
<section class="content-section">
<div class="container">
<div class="row">

<div class="col-sm-12">
<div class="st-form-container">

<?php $attributes=array('class'=>"default-form",'id'=>'form1' );?>
		<?php echo form_open("index.php/package/booking_success",$attributes);?>
		<input type="hidden" name="package_id" id="package_id" value="<?php echo $this->session->userdata("package_id");?>"/>
		<input type="hidden" name="adults" id="adults" value="<?php echo $this->session->userdata("adults");?>"/>
		<input type="hidden" name="children" id="children" value="<?php echo $this->session->userdata("children");?>"/>
		<input type="hidden" name="infant" id="infant" value="<?php echo $this->session->userdata("infant");?>"/>
		<input type="hidden" name="package_cost" id="package_cost" value="<?php echo $this->session->userdata("package_cost");?>"/>
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>"/>
		<p class="form-row">
	  <button class="submit-btn button" id="btn_submit"><i class="fa fa-power-off"></i> Success</button>
	  
	</p>
	
<?php echo form_close(); ?>		
<?php $attributes=array('class'=>"default-form",'id'=>'form1' );?>
		<?php echo form_open("index.php/package/booking_faliure",$attributes);?>
		<input type="hidden" name="package_id" id="package_id" value="<?php echo $this->session->userdata("package_id");?>"/>
		<input type="hidden" name="adults" id="adults" value="<?php echo $this->session->userdata("adults");?>"/>
		<input type="hidden" name="children" id="children" value="<?php echo $this->session->userdata("children");?>"/>
		<input type="hidden" name="infant" id="infant" value="<?php echo $this->session->userdata("infant");?>"/>
		<input type="hidden" name="package_cost" id="package_cost" value="<?php echo $this->session->userdata("package_cost");?>"/>
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>"/>
		<p class="form-row">
	  <button class="submit-btn button" id="btn_submit"><i class="fa fa-power-off"></i>Failure</button>
	  
	</p>
	
<?php echo form_close(); ?>		

</div>
</div>
</div>
</div>
</section>
<!-- CONTENT SECTION : end --> 

</div>
<!-- CORE : end --> 