<!-- CONTENT SECTION : begin -->
<div class="err"></div>

<section class="content-section">
<div class="container">
<div class="row">

<div class="col-sm-12">
<div class="st-form-container">
<h5>Your Package List</h5>


<div class="row">
	<div class="col-sm-12">
		<table width="100%" class="table">
		  <thead>
			<th width="5%">
				#
			</th>
			<th>Package Name</th>
			<th>Package Departure Date</th>
			<th>Status</th>
			<th>Action</th>
		 </thead>
		 <tbody>
			<?php 
			$i=1;
			
			foreach($result as $r){?>
		 	<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $r['package_title'];?></td>
				<td><?php echo $r['dept_date'];?></td>
				<td><?php if($r['is_active']=='Y'){?> Active <?php }else{ ?> Inactive <?php } ?></td>
				<td><a href="<?php echo base_url();?>index.php/agent/add_package/<?php echo $r['package_id'];?>"><span class="fa fa-edit"></span></a>&nbsp;,<a href="#"><span class="fa fa-times"></span></a>&nbsp;<a href="#"><span class="fa fa-book"></span></a></td>
			</tr>
		  <?php 
		  $i++;
		  } ?>	
		 </tbody>	
		</table>
	</div>
</div>




</div>
</div>
</div>
</div>
</section>
<!-- CONTENT SECTION : end --> 

</div>
<script>
$(document).ready(function()
{
	var hid_upload_file;
	$("#fileuploader").uploadFile({
	url:"<?php echo base_url();?>index.php/agent/upload",
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
	
	if(valid==1){
		
		$.ajax({
			type:"POST",
			url:'<?php echo base_url();?>index.php/agent/save_package',
			data:{'package_title':package_title,'dept_date':dept_date,'arr_date':arr_date,'package_cost_adult':package_cost_adult,'package_cost_child':package_cost_child,'package_cost_infant':package_cost_infant,'number_of_seats_adult':number_of_seats_adult,'number_of_seats_child':number_of_seats_child,'number_of_seats_infant':number_of_seats_infant,'country_id':country_id,'amenities':ameneties,'package_desc':package_desc,'files':hid_upload_file},
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
		e.preventDefault();
	}
	});
});
</script>
<!-- CORE : end --> 
