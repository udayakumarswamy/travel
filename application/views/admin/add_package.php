<!--main content start-->
<style type="text/css">
	.err_msg{color: red;}
	.succ_msg{color: green;}
</style>
<script type="text/javascript">
	function add_pkg(){	
	
	// e.preventDefault();	
	var package_title=$("#package_title").val();
	// alert(package_title);
	var package_title_in_arabic = $("#package_title_in_arabic").val();
	// alert(package_title_in_arabic);
	var dept_date=$("#dept_date").val();
	// alert(dept_date);
	var arr_date=$("#arr_date").val();
	// alert(arr_date);
	var package_cost_adult=$("#package_cost_adult").val();
	// alert(package_cost_adult);
	var package_cost_child=$("#package_cost_child").val();
	// alert(package_cost_child);
	var package_cost_infant=$("#package_cost_infant").val();
	// alert(package_cost_infant);
	var number_of_seats_adult=$("#number_of_seats_adult").val();
	// alert(number_of_seats_adult);
	var number_of_seats_child=$("#number_of_seats_child").val();
	// alert(number_of_seats_child);
	var number_of_seats_infant=$("#number_of_seats_infant").val();
	// alert(number_of_seats_infant);
	var country_id=$("#country_id").val();
	// alert(country_id);
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
	// alert(ameneties);
	var package_desc=$("#package_desc").val();

	
	var valid = 1;
	
	if(package_title==''){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_pckg_title');?>");
		$('#error_div').focus();
		return false;
		/*$('html, body').animate({
			scrollTop: $('#error_div').focus();
			// scrollTop: $('.err').offset().top
		}, 500);*/
	}

	if(package_title_in_arabic==''){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_pckg_title_arabic');?>");
		$('#error_div').focus();
		return false;
		/*$('html, body').animate({
			scrollTop: $('#error_div').focus();
			// scrollTop: $('.err').offset().top
		}, 500);*/
	}

	if(dept_date==''){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_departure_date');?>");
		$('#error_div').focus();
		return false;
	}

	if(arr_date=='' ){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_arval_date');?>");
		$('#error_div').focus();
		return false;
	}
	if(package_cost_adult==''){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_pkg_cost_adult');?>");
		$('#error_div').focus();
		return false;
	}
	if(package_cost_child==''){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_pkg_cost_child');?>")
		$('#error_div').focus();
		return false;
	}
	if(package_cost_infant==''){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_pkg_cost_infant');?>");
		$('#error_div').focus();
		return false;
	}
	if(number_of_seats_adult==''){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_noof_seats_adult');?>");
		$('#error_div').focus();
		return false;
	}
	if(number_of_seats_child==''){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_noof_seats_child');?>");
		$('#error_div').focus();
		return false;
	}
	if(number_of_seats_infant==''){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_noof_seats_infant');?>");
		$('#error_div').focus();
		return false;
	}
	if(country_id==''){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_country');?>");
		$('#error_div').focus();
		return false;
	}
	if(package_desc==''){
		valid=0;
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('enter_pkg_desc');?>");
		$('#error_div').focus();
		return false;
	}

	var package_id=$("#package_id").val();
	var posted_by_id=$("#posted_by_id").val();
	var hid_upload_file=$("#hid_upload_file").val();

	
	
	
	// if(valid==1){
		$.ajax({
			type:"POST",
			url:'<?php echo base_url();?>index.php/admin_package/save_package',
			data:{'package_id':package_id,'package_title':package_title,'package_title_in_arabic':package_title_in_arabic,'dept_date':dept_date,'arr_date':arr_date,'package_cost_adult':package_cost_adult,'package_cost_child':package_cost_child,'package_cost_infant':package_cost_infant,'number_of_seats_adult':number_of_seats_adult,'number_of_seats_child':number_of_seats_child,'number_of_seats_infant':number_of_seats_infant,'country_id':country_id,'amenities':ameneties,'package_desc':package_desc,'files':hid_upload_file,'posted_by_id':posted_by_id},
			dataType:"json",
			success:function(data){
				if(data.result>0){
					$("#error_div").hide();
					$("#success_div").show();
					$("#success_div").html("<?php echo $this->lang->line('data_saved_sucfuly');?>");
					/*$('html, body').animate({
						scrollTop: $('.err').offset().top
					}, 500);*/
					setTimeout(function(){
						pkg_list();
					}, 1500);
				}
			}
		});
	// }
}

function pkg_list(){
	location.href="<?php echo base_url();?>index.php/admin/list_package";
}
</script>

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
	<header class="panel-heading">
		<span class="tools pull-right">
			<a class="fa fa-chevron-down" href="javascript:;"></a>
			<a class="fa fa-cog" href="javascript:;"></a>
			<a class="fa fa-times" href="javascript:;"></a>
		</span>
	</header>
	<div class="panel-body">
	<div class=" form">
		<h2><?php echo $this->lang->line('add_package');?></h2>
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
			<input type="text" class="form-control" id="package_title" name="package_title"  value="<?php echo isset($package_details['package_title']) && !empty($package_details['package_title']) ? $package_details['package_title'] : '';?>" placeholder="<?php echo $this->lang->line('package_title');?>" required  minlength="2" autofocus>
		</div>
	</div>
	<div class="form-group ">
		<label for="cname" class="control-label col-lg-3"><?php echo $this->lang->line('package_title_in_arabic');?> (<?php echo $this->lang->line('required');?>)</label>
		<div class="col-lg-6">
			<input type="text" class="form-control" id="package_title_in_arabic" name="package_title_in_arabic"  value="<?php echo isset($package_details['package_title_in_arabic']) && !empty($package_details['package_title_in_arabic']) ? $package_details['package_title_in_arabic'] : '';?>" placeholder="<?php echo $this->lang->line('package_title_in_arabic');?>" required  minlength="2" autofocus>
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
	<input type="text" id="package_cost_adult" value="<?php echo isset($package_details['package_cost_adult']) && !empty($package_details['package_cost_adult']) ? $package_details['package_cost_adult'] : '';?>" name="package_cost_adult" class="form-control number_only" placeholder="<?php echo $this->lang->line('package_cost_per_adult');?>"  required>
	</div>
	</div>
	<div class="form-group ">
	<label for="cemail" class="control-label col-lg-3"><?php echo $this->lang->line('package_cost_per_child');?>($)&nbsp;(<?php echo $this->lang->line('required');?>) </label>
	<div class="col-lg-6">
	<input type="text" id="package_cost_child" value="<?php echo isset($package_details['package_cost_child']) && !empty($package_details['package_cost_child']) ? $package_details['package_cost_child'] : '';?>" name="package_cost_child" class="form-control number_only" placeholder="<?php echo $this->lang->line('package_cost_per_child');?>"  required>
	</div>
	</div>
	<div class="form-group ">
	<label for="cemail" class="control-label col-lg-3"> <?php echo $this->lang->line('package_cost_per_infant');?>($)&nbsp;(<?php echo $this->lang->line('required');?>) </label>
	<div class="col-lg-6">
	<input type="text" id="package_cost_infant" value="<?php echo isset($package_details['package_cost_infant']) && !empty($package_details['package_cost_infant']) ? $package_details['package_cost_infant'] : '';?>" name="package_cost_infant" class="form-control number_only" placeholder="<?php echo $this->lang->line('package_cost_per_infant');?>"  required>
	</div>
	</div>
	<div class="form-group ">
	<label for="curl" class="control-label col-lg-3"><?php echo $this->lang->line('number_beds_for_adult');?>(<?php echo $this->lang->line('required');?>)</label>
	<div class="col-lg-6">
	<input type="text" id="number_of_seats_adult" value="<?php echo isset($package_details['number_of_seats_adult']) && !empty($package_details['number_of_seats_adult']) ? $package_details['number_of_seats_adult'] : '';?>" name="number_of_seats_adult" class="form-control number_only" placeholder="<?php echo $this->lang->line('number_beds_for_adult');?>" required></div>
	</div>
	<div class="form-group ">
	<label for="ccomment" class="control-label col-lg-3"><?php echo $this->lang->line('no_of_seats_avail_for_childs');?>(<?php echo $this->lang->line('required');?>)</label>
	<div class="col-lg-6">
	<input type="text" id="number_of_seats_child" name="number_of_seats_child" class="form-control number_only" value="<?php echo isset($package_details['number_of_seats_child']) && !empty($package_details['number_of_seats_child']) ? $package_details['number_of_seats_child'] : '';?>" placeholder="<?php echo $this->lang->line('no_of_seats_avail_for_childs');?>" required>
	</div>
	</div>
	<div class="form-group ">
	<label for="ccomment" class="control-label col-lg-3"><?php echo $this->lang->line('no_of_seats_avail_for_infants');?>(<?php echo $this->lang->line('required');?>)</label>
	<div class="col-lg-6">
	<input type="text" id="number_of_seats_infant" value="<?php echo isset($package_details['number_of_seats_infant']) && !empty($package_details['number_of_seats_infant']) ? $package_details['number_of_seats_infant'] : '';?>" name="number_of_seats_infant" class="form-control number_only" placeholder="<?php echo $this->lang->line('no_of_seats_avail_for_infants');?>" required>
	</div>
	</div>
	<div class="form-group ">
	<label for="ccomment" class="control-label col-lg-3"><?php echo $this->lang->line('country');?>(<?php echo $this->lang->line('required');?>)</label>
	<div class="col-lg-6">
	<select class="form-control" style="width: 300px" id="country_id" name="country_id">
	<option value="" selected="selected" required>-Select-</option>
	<?php
	foreach($country_list as $key => $country){
		$select = '';
		if(isset($package_details['country_id']) && !empty($package_details['country_id']) && $package_details['country_id'] == $key){
			$select = 'selected="selected"';
		}
	?><option value="<?php echo $key; ?>" <?php echo $select;?>><?php echo $country; ?></option>
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

	<button class="btn btn-primary submit-btn" type="button" onclick="return add_pkg();"><?php echo $this->lang->line('save');?></button>
	<button class="btn btn-default" type="button" onclick="pkg_list();"><?php echo $this->lang->line('cancel');?></button>
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
});


</script>
<script>
	$(function() {
		$( "#arr_date" ).datepicker(

			/* beforeShow: function() {
	            $(this).datepicker('option', 'minDate', '08/10/2015');
            },*/
		);
	});
	$(".number_only").each(function()
{
    $(this).keypress(function(e)
    {
        //if the letter is not digit then don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57))
        {
            return false;
        }
    });
});
	</script>