<!--main content start-->
<style type="text/css">
	.err_msg{color: red;}
	.succ_msg{color: green;}
</style>
<section id="main-content">
	<section class="wrapper">
	<!-- page start-->
	<?php 
		$new_dept_date = '';
		$new_ariv_date = '';
		if(isset($package_details['dept_date']) && !empty($package_details['dept_date']))
		{
			$dept_arr=explode('-',$package_details['dept_date']);
			$new_dept_date=$dept_arr[1].'/'.$dept_arr[2].'/'.$dept_arr[0];
		}
		if(isset($package_details['arr_date']) && !empty($package_details['arr_date']))
		{
			$ariv_arr=explode('-',$package_details['arr_date']);
			$new_ariv_date=$ariv_arr[1].'/'.$ariv_arr[2].'/'.$ariv_arr[0];
		}
	?>
	<div class="row">
	<div class="col-lg-12">
	<section class="panel">
	<header class="panel-heading"><?php echo $this->lang->line('add_package');?>
		<span class="tools pull-right">
			<a class="fa fa-chevron-down" href="javascript:;"></a>
			<a class="fa fa-cog" href="javascript:;"></a>
			<a class="fa fa-times" href="javascript:;"></a>
		</span>
	</header>
	<div class="panel-body">
	<div class=" form">
	<?php $attributes=array('class'=>"cmxform form-horizontal",
	'id'=>'commentForm');				
	echo form_open('index.php/admin_package/save_package',$attributes);
	if(!isset($package_details['package_id']) && empty($package_details['package_id']))
	{
		$package_details['package_id']=0;
		$package_details['posted_by_id']=0;
	}?>
	<input type="hidden" name="package_id" id="package_id" value="<?php echo $package_details['package_id'];?>" />									
	<input type="hidden" name="posted_by_id" id="posted_by_id" value="<?php echo $package_details['posted_by_id'];?>" />										
	<div id="error_div" class="err_msg" style="display:none"></div> 
	<div id="success_div" style="display:none" class="succ_msg"></div>
	<div class="form-group ">
		<label for="cname" class="control-label col-lg-3"><?php echo $this->lang->line('package_title');?> (<?php echo $this->lang->line('required');?>)</label>
		<div class="col-lg-6">
			<input type="text" class="form-control" id="package_title" name="package_title"  value="<?php echo isset($package_details['package_title']) && !empty($package_details['package_title']) ? $package_details['package_title'] : '';?>" placeholder="<?php echo $this->lang->line('package_title');?>" required  minlength="2" >
		</div>
	</div>
	<div class="form-group ">
	<label for="cname" class="control-label col-lg-3"><?php echo $this->lang->line('departure_date');?>(<?php echo $this->lang->line('required');?>)</label>
	<div class="col-lg-6">
	<input type="text" id="dept_date" name="dept_date" value="<?php echo $new_dept_date;?>" class="form-control" placeholder="<?php echo $this->lang->line('departure_date');?>" required>
	<script>
	$(function() {
	$( "#dept_date" ).datepicker();
	});
	</script>

	</div>
	</div>
	<div class="form-group ">
	<label for="cname" class="control-label col-lg-3"><?php echo $this->lang->line('arrival_date');?>(<?php echo $this->lang->line('required');?>)</label>
	<div class="col-lg-6">
	<input type="text" id="arr_date" name="arr_date"  value="<?php echo $new_ariv_date;?>" class="form-control" placeholder="<?php echo $this->lang->line('arrival_date');?>" required>
	<script>
	$(function() {
	$( "#arr_date" ).datepicker();
	});
	</script>
	</div>	  
	</div>
	<div class="form-group ">
	<label for="cemail" class="control-label col-lg-3"><?php echo $this->lang->line('package_description');?>(<?php echo $this->lang->line('required');?>)</label>
	<div class="col-lg-6">
	<textarea class="form-control " id="package_desc"  name="package_desc" required><?php echo isset($package_details['package_desc']) && !empty($package_details['package_desc']) ? $package_details['package_desc'] : '';?></textarea>
	</div>
	</div>
	<div class="form-group ">
	<label for="cname" class="control-label col-lg-3"><?php echo $this->lang->line('package_cost_per_adult');?>($)&nbsp;(<?php echo $this->lang->line('required');?>)</label>
	<div class="col-lg-6">
	<input type="text" id="package_cost_adult" value="<?php echo isset($package_details['package_cost_adult']) && !empty($package_details['package_cost_adult']) ? $package_details['package_cost_adult'] : '';?>" name="package_cost_adult" class="form-control" placeholder="<?php echo $this->lang->line('package_cost_per_adult');?>" autofocus>
	</div>
	</div>
	<div class="form-group ">
	<label for="cemail" class="control-label col-lg-3"><?php echo $this->lang->line('package_cost_per_child');?>($)&nbsp;(<?php echo $this->lang->line('optional');?>) </label>
	<div class="col-lg-6">
	<input type="text" id="package_cost_child" value="<?php echo isset($package_details['package_cost_child']) && !empty($package_details['package_cost_child']) ? $package_details['package_cost_child'] : '';?>" name="package_cost_child" class="form-control" placeholder="<?php echo $this->lang->line('package_cost_per_child');?>" autofocus>
	</div>
	</div>
	<div class="form-group ">
	<label for="cemail" class="control-label col-lg-3"> <?php echo $this->lang->line('package_cost_per_infant');?>($)&nbsp;(<?php echo $this->lang->line('optional');?>) </label>
	<div class="col-lg-6">
	<input type="text" id="package_cost_infant" value="<?php echo isset($package_details['package_cost_infant']) && !empty($package_details['package_cost_infant']) ? $package_details['package_cost_infant'] : '';?>" name="package_cost_infant" class="form-control" placeholder="<?php echo $this->lang->line('package_cost_per_infant');?>" autofocus>
	</div>
	</div>
	<div class="form-group ">
	<label for="curl" class="control-label col-lg-3"><?php echo $this->lang->line('number_beds_for_adult');?></label>
	<div class="col-lg-6">
	<input type="text" id="number_of_seats_adult" value="<?php echo isset($package_details['number_of_seats_adult']) && !empty($package_details['number_of_seats_adult']) ? $package_details['number_of_seats_adult'] : '';?>" name="number_of_seats_adult" class="form-control" placeholder="<?php echo $this->lang->line('number_beds_for_adult');?>" required></div>
	</div>
	<div class="form-group ">
	<label for="ccomment" class="control-label col-lg-3"><?php echo $this->lang->line('no_of_seats_avail_for_childs');?></label>
	<div class="col-lg-6">
	<input type="text" id="number_of_seats_child" name="number_of_seats_child" class="form-control" value="<?php echo isset($package_details['number_of_seats_child']) && !empty($package_details['number_of_seats_child']) ? $package_details['number_of_seats_child'] : '';?>" placeholder="<?php echo $this->lang->line('no_of_seats_avail_for_childs');?>">
	</div>
	</div>
	<div class="form-group ">
	<label for="ccomment" class="control-label col-lg-3"><?php echo $this->lang->line('no_of_seats_avail_for_infants');?></label>
	<div class="col-lg-6">
	<input type="text" id="number_of_seats_infant" value="<?php echo isset($package_details['number_of_seats_infant']) && !empty($package_details['number_of_seats_infant']) ? $package_details['number_of_seats_infant'] : '';?>" name="number_of_seats_infant" class="form-control" placeholder="<?php echo $this->lang->line('no_of_seats_avail_for_infants');?>">
	</div>
	</div>
	<div class="form-group ">
	<label for="ccomment" class="control-label col-lg-3"><?php echo $this->lang->line('country');?></label>
	<div class="col-lg-6">
	<select class="form-control" style="width: 300px" id="country_id" name="country_id">
	<option value="" selected="selected" required>-Select-</option>
	<?php
	foreach($country_list as $key => $country){
	?><option value="<?php echo $key; ?>" <?php if($package_details['country_id']==$key){?> selected="selected" <?php } ?>><?php echo $country; ?></option>
	<?php			
	}
	?>
	</select>
	</div>
	</div>
	<div class="form-group ">
	<label for="ccomment" class="control-label col-lg-3"><?php echo $this->lang->line('amenities');?></label>
	<div class="col-lg-6">
	<?php
		$amm_arr = array(); 
		if(isset($package_details['amenities']) && !empty($package_details['amenities']))
		{
			$amm_arr = explode('~',$package_details['amenities']);
		}
		if(count($amenities_list) > 0) 
		{
			foreach ($amenities_list as $key => $amenity) {
				$checked = '';
				if(in_array($amenity, $amm_arr)) {
					$checked = 'checked="checked"';
				}?>
	<input type="checkbox" name="aminity_group" id="<?php echo $key.'_'.$amenity;?>" value="<?php echo $amenity;?>" <?php echo $checked;?> class="chkbox">
	<label for="dummy-checkbox"><?php echo $amenity;?></label>
	<?php	}
		}
	?>
	</div>
	</div>
	<p class="default-form">
	<div id="fileuploader"><?php echo $this->lang->line('upload');?></div>

	<?php 
		$files='';
	if(!empty($images)) {
		foreach($images as $img) {
			if($files=='') {
				$files=$img['image_files'];
			} else {
				$files.='~'.$img['image_files'];
			}
	?>
	<div class="img-responsive" style="float:left; margin-left:20px; margin-top:20px;">
	<img src="<?php echo base_url();?>uploads/<?php echo $img['image_files'];?>" style="width:200px;"/>
	<input type="hidden" name="img_id" id="img_id_<?php echo $img['file_id'];?>" data-id="<?php echo $img['file_id'];?>" />
	<input type="radio" name="is_featured_image" id="is_featured_image_<?php echo $img['file_id'];?>"  value="<?php echo $img['file_id'];?>" <?php if($package_details['is_featured_image']==$img['image_files']){?> checked="checked" <?php } ?> data-package="<?php echo $package_details['package_id'];?>" /> <?php echo $this->lang->line('is_featured_image');?>
	</div>
	<?php }} ?>	
	<input type="hidden" name="hid_upload_file" id="hid_upload_file" value="<?php echo $files;?>"/>
	<div class="clearfix"></div>
	</p>
	<div class="form-group">
	<div class="col-lg-offset-3 col-lg-6">

	<button class="btn btn-primary submit-btn" type="submit"><?php echo $this->lang->line('save');?></button>
	<button class="btn btn-default" type="button"><?php echo $this->lang->line('cancel');?></button>
	</div>
	</div>
	<?php echo form_close();?>
	</div>

	</div>
	</section>
	</div>
	</div>
	<!-- page end-->
	</section>
</section>
<script>
$(document).ready(function()
{
	$("input[name='is_featured_image']").click(function(){
		var image_id=$(this).val();
		var package_id=$(this).data('package');
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>index.php/admin_package/set_featured_image",
			data:{'image_id':image_id,'package_id':package_id},
			dataType:"json",
			success:function(data){
				alert("<?php echo $this->lang->line('featured_image_successfully');?>"); 
			}
		});
	});

var hid_upload_file;
	$("#fileuploader").uploadFile({
		url:"<?php echo base_url();?>index.php/admin_package/upload",
		fileName:"myfile",
		onSuccess:function(files,data,xhr)
		{
			hid_upload_file=$("#hid_upload_file").val();
			if(hid_upload_file==''){
				hid_upload_file=files;
				$("#hid_upload_file").val(hid_upload_file);
			}		
			else{
				hid_upload_file+='~'+files;
				$("#hid_upload_file").val(hid_upload_file);
			}
		}
	});

$(".submit-btn").click(function(e){
	//alert(hid_upload_file);
	e.preventDefault();	
	var package_title=$("#package_title").val();
	var dept_date=$("#dept_date").val();
	var arr_date=$("#arr_date").val();
	var package_cost_adult=$("#package_cost_adult").val();
	var package_cost_child=$("#package_cost_child").val();
	var package_cost_infant=$("#package_cost_infant").val();
	var number_of_seats_adult=$("#number_of_seats_adult").val();
	var number_of_seats_child=$("#number_of_seats_child").val();
	var number_of_seats_infant=$("#number_of_seats_infant").val();
	var country_id=$("#country_id").val();
	var ameneties='';
	$(".chkbox").each(function(){
		// alert($(this).val())
		if($(this).is(":checked"))
		{
			if(ameneties==''){
				ameneties+=$(this).val();
			}else{
				ameneties+='~'+$(this).val();
			}
		}		
	});
	var package_desc=$("#package_desc").val();
	var valid=1;
	if(package_title=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_pckg_title');?>");
		$('html, body').animate({
			scrollTop: $('#error_div').focus();
		}, 500);
	}

	if(dept_date=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_departure_date');?>");
		$('html, body').animate({
			// scrollTop: $('.err').offset().top
			scrollTop: $('#error_div').focus();
		}, 500);
	}

	if(arr_date=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_arval_date');?>");
		$('html, body').animate({
			// scrollTop: $('.err').offset().top
			scrollTop: $('#error_div').focus();
		}, 500);
	}
	if(package_cost_adult=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_pkg_cost_adult');?>");
		$('html, body').animate({
			// scrollTop: $('.err').offset().top
			scrollTop: $('#error_div').focus();
		}, 500);
	}
	if(package_cost_child=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_pkg_cost_child');?>")
		$('html, body').animate({
			scrollTop: $('.err').offset().top
		}, 500);
	}
	if(package_cost_infant=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_pkg_cost_infant');?>");
		$('html, body').animate({
			// scrollTop: $('.err').offset().top
			scrollTop: $('#error_div').focus();
		}, 500);
	}
	if(number_of_seats_adult=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_noof_seats_adult');?>");
		$('html, body').animate({
			// scrollTop: $('.err').offset().top
			scrollTop: $('#error_div').focus();
		}, 500);
	}
	if(number_of_seats_child=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_noof_seats_child');?>");
		$('html, body').animate({
			// scrollTop: $('.err').offset().top
			scrollTop: $('#error_div').focus();
		}, 500);
	}
	if(number_of_seats_infant=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_noof_seats_infant');?>");
		$('html, body').animate({
			// scrollTop: $('.err').offset().top
			scrollTop: $('#error_div').focus();
		}, 500);
	}
	if(country_id=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_country');?>");
		$('html, body').animate({
			// scrollTop: $('.err').offset().top
			scrollTop: $('#error_div').focus();
		}, 500);
	}
	if(package_desc=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_pkg_dest');?>");
		$('html, body').animate({
			// scrollTop: $('.err').offset().top
			scrollTop: $('#error_div').focus();
		}, 500);
	}
	var package_id=$("#package_id").val();
	var posted_by_id=$("#posted_by_id").val();
	if(valid==1){

	$.ajax({
	type:"POST",
	url:'<?php echo base_url();?>index.php/admin_package/save_package',
	data:{'package_id':package_id,'package_title':package_title,'dept_date':dept_date,'arr_date':arr_date,'package_cost_adult':package_cost_adult,'package_cost_child':package_cost_child,'package_cost_infant':package_cost_infant,'number_of_seats_adult':number_of_seats_adult,'number_of_seats_child':number_of_seats_child,'number_of_seats_infant':number_of_seats_infant,'country_id':country_id,'amenities':ameneties,'package_desc':package_desc,'files':hid_upload_file,'posted_by_id':posted_by_id},
	dataType:"json",
	success:function(data){
		if(data.result>0){
			$("#error_div").hide();
			$("#success_div").show();
			$("#success_div").html("<?php echo $this->lang->line('data_saved_sucfuly');?>");
			$('html, body').animate({
				scrollTop: $('.err').offset().top
			}, 500);
		}
	}
});

}
});
});
</script>
<!--main content end-->	
<!------------------------->

