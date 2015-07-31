<?php
//$getAdmin = mysql_fetch_array(mysql_query("SELECT * FROM adminis WHERE admin_id = '".$this->session->userdata('admin_id')."'"));

?>
    
	
	    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
				<?php 
				$dept_arr=explode('-',$package_details['dept_date']);
				$new_dept_date=$dept_arr[1].'/'.$dept_arr[2].'/'.$dept_arr[0];
				$ariv_arr=explode('-',$package_details['arr_date']);
				$new_ariv_date=$ariv_arr[1].'/'.$ariv_arr[2].'/'.$ariv_arr[0];
				?>
	            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
							Add Package Now
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
									if($package_details['package_id']=='')
										$package_details['package_id']=0;
								?>
								<input type="hidden" name="package_id" id="package_id" value="<?php echo $package_details['package_id'];?>" />									
								<input type="hidden" name="posted_by_id" id="posted_by_id" value="<?php echo $package_details['posted_by_id'];?>" />										
									<div id="error_div" style="display:none"></div> 
									<div id="success_div" style="display:none"></div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Package Title (required)</label>
                                        <div class="col-lg-6">
										    <input type="text" class="form-control" id="package_title" name="package_title"  value="<?php echo $package_details['package_title'];?>" placeholder="Package Title" required  minlength="2" >
                                        </div>
                                    </div>
									<div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Departure Date(required)</label>
                                        <div class="col-lg-6">
										    <input type="text" id="dept_date" name="dept_date" value="<?php echo $new_dept_date;?>" class="form-control" placeholder="Departure Date" required>
											<script>
											  $(function() {
												$( "#dept_date" ).datepicker();
											  });
											  </script>

                                        </div>
                                    </div>
									<div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Arrival Date (required)</label>
                                        <div class="col-lg-6">
										    <input type="text" id="arr_date" name="arr_date"  value="<?php echo $new_ariv_date;?>" class="form-control" placeholder="Arrival Date" required>
											<script>
											  $(function() {
												$( "#arr_date" ).datepicker();
											  });
											  </script>
										</div>	  
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3"> Package Description(required)</label>
                                        <div class="col-lg-6">
                                          <textarea class="form-control " id="package_desc"  name="package_desc" required><?php echo $package_details['package_desc'];?></textarea>
                                        </div>
                                    </div>
									<div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Package Cost Per Adult($)&nbsp;(required)</label>
                                        <div class="col-lg-6">
										<input type="text" id="package_cost_adult" value="<?php echo $package_details['package_cost_adult'];?>" name="package_cost_adult" class="form-control" placeholder="Package Cost Per Adult" autofocus>
										</div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3"> Package Cost Per Child ($)&nbsp;(optional)</label>
                                        <div class="col-lg-6">
                                        <input type="text" id="package_cost_child" value="<?php echo $package_details['package_cost_child'];?>" name="package_cost_child" class="form-control" placeholder="Package Cost Per Child" autofocus>
                                        </div>
                                    </div>
									<div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3"> Package Cost Per Infant ($)&nbsp;(optional)</label>
                                        <div class="col-lg-6">
                                        <input type="text" id="package_cost_infant" value="<?php echo $package_details['package_cost_infant'];?>" name="package_cost_infant" class="form-control" placeholder="Package Cost Per Infant" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Number of Beds For Adult</label>
                                        <div class="col-lg-6">
											<input type="text" id="number_of_seats_adult" value="<?php echo $package_details['number_of_seats_adult'];?>" name="number_of_seats_adult" class="form-control" placeholder="Number of Seats Available for Adults" required>                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-3">Number of Beds For Child</label>
                                        <div class="col-lg-6">
                                          <input type="text" id="number_of_seats_child" name="number_of_seats_child" class="form-control" value="<?php echo $package_details['number_of_seats_child'];?>" placeholder="Number of Seats Available for Childs">
                                        </div>
                                    </div>
									<div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-3">Number of Beds For Infant</label>
                                        <div class="col-lg-6">
                                           <input type="text" id="number_of_seats_infant" value="<?php echo $package_details['number_of_seats_infant'];?>" name="number_of_seats_infant" class="form-control" placeholder="Number of Seats Available for Infants">
                                        </div>
                                    </div>
									<div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-3">Country</label>
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
                                        <label for="ccomment" class="control-label col-lg-3">Amenities</label>
                                        <div class="col-lg-6">
										<?php 
	$amm_arr=explode('~',$package_details['amenities']);
?>
                                           <input type="checkbox" name="" id="food" value="food" <?php if(in_array('food',$amm_arr)){?> checked="checked" <?php } ?> class="chkbox">
<label for="dummy-checkbox">Food</label>

<input type="checkbox" value="transport" class="chkbox" <?php if(in_array('transport',$amm_arr)){?> checked="checked" <?php } ?>>
<label for="dummy-checkbox2">Transportation</label>


<input type="checkbox" name="" value="guide" <?php if(in_array('guide',$amm_arr)){?> checked="checked" <?php } ?> class="chkbox">
<label for="dummy-checkbox">Guide</label>

                                        </div>
                                    </div>
									<p class="default-form">
									<div id="fileuploader">Upload</div>
									
									<?php if(!empty($images)){
											$files='';
											foreach($images as $img){
											if($files==''){
												$files=$img['image_files'];
												
											}else{
												$files.='~'.$img['image_files'];
											}
									?>
										<div class="img-responsive" style="float:left; margin-left:20px; margin-top:20px;">
											<img src="<?php echo base_url();?>uploads/<?php echo $img['image_files'];?>" style="width:200px;"/>
											<input type="hidden" name="img_id" id="img_id_<?php echo $img['file_id'];?>" data-id="<?php echo $img['file_id'];?>" />
											<input type="radio" name="is_featured_image" id="is_featured_image_<?php echo $img['file_id'];?>"  value="<?php echo $img['file_id'];?>" <?php if($package_details['is_featured_image']==$img['image_files']){?> checked="checked" <?php } ?> data-package="<?php echo $package_details['package_id'];?>" /> Is Featured Image
										</div>
									<?php }} ?>	
									<input type="hidden" name="hid_upload_file" id="hid_upload_file" value="<?php echo $files;?>"/>
									<div class="clearfix"></div>
									</p>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
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
				alert('Featured Image set successfully');
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
		alert($(this).val())
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
		$("#error_div").text('Please enter package title');
		 $('html, body').animate({
        scrollTop: $('.err').offset().top
    }, 500);
	}
	
	if(dept_date=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text('Please enter Departure Date');
		 $('html, body').animate({
        scrollTop: $('.err').offset().top
    }, 500);
	}
	if(arr_date=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text('Please enter Arrival Date');
		 $('html, body').animate({
        scrollTop: $('.err').offset().top
    }, 500);
	}
	if(package_cost_adult=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text('Please enter Package Cost for Adult')
		 $('html, body').animate({
        scrollTop: $('.err').offset().top
    }, 500);
	}
	if(package_cost_child=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text('Please enter Package Cost for Childs')
		 $('html, body').animate({
        scrollTop: $('.err').offset().top
    }, 500);
	}
	if(package_cost_infant=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text('Please enter Package Cost for Infants')
		 $('html, body').animate({
        scrollTop: $('.err').offset().top
    }, 500);
	}
	if(number_of_seats_adult=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text('Please enter No of Seats for Adult')
		 $('html, body').animate({
        scrollTop: $('.err').offset().top
    }, 500);
	}
	if(number_of_seats_child=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text('Please enter No of Seats for Childs')
		 $('html, body').animate({
        scrollTop: $('.err').offset().top
    }, 500);
	}
	if(number_of_seats_infant=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text('Please enter No of Seats for Infants')
		 $('html, body').animate({
        scrollTop: $('.err').offset().top
    }, 500);
	}
	if(country_id=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text('Please enter Country')
		 $('html, body').animate({
        scrollTop: $('.err').offset().top
    }, 500);
	}
	if(package_desc=='' && valid==1){
		valid=0;
		$("#error_div").show();
		$("#error_div").text('Please enter Package destination')
		 $('html, body').animate({
        scrollTop: $('.err').offset().top
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
					$("#success_div").html("Data Saved Successfully");
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
	
	