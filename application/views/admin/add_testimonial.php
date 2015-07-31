<?php
//$getAdmin = mysql_fetch_array(mysql_query("SELECT * FROM adminis WHERE admin_id = '".$this->session->userdata('admin_id')."'"));

?>
    
	
	    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
				
	            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
							Add Testiminial
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
									<div id="success_div" class="col-lg-offset-2 col-lg-6" style="display:none"></div>
									<div id="error_div" class="col-lg-offset-2 col-lg-6" style="display:none"></div>
									<input type="hidden" name="testimonial_id" id="testimonial_id" value="<?php echo $testimonial['testimonial_id'];?>"/>
									<div class="form-group" >
										<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                                        <input type="text" class="form-control" id="testimonial_page_name" name="testimonial_page_name" style="width:400px;" value="<?php echo $testimonial['testimonial_page_name'];?>" />
										</div>
                                    </div>
									<div class="form-group" >
										<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                                        <input type="text" class="form-control" id="testimonial_page_name_ar" name="testimonial_page_name_ar" style="width:400px;" value="<?php echo $testimonial['testimonial_page_name_ar'];?>" />
										</div>
                                    </div>
									<div class="form-group" >
										<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                                        <textarea class="form-control" id="testimonial_page_content" name="testimonial_page_content" ><?php echo $testimonial['testimonial_page_content'];?></textarea>
										</div>
                                    </div>
									<div class="form-group" >
										<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                                        <textarea dir="rtl" class="form-control" id="testimonial_page_content_ar" name="testimonial_page_content_ar" ><?php echo $testimonial['testimonial_page_content_ar'];?></textarea>
										</div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                                
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
	$(".submit-btn").click(function(e){
		e.preventDefault();
		var testimonial_page_name=$("#testimonial_page_name").val();
		var testimonial_page_name_ar=$("#testimonial_page_name_ar").val();
		var testimonial_page_content=$("#testimonial_page_content").val();
		var testimonial_page_content_ar=$("#testimonial_page_content_ar").val();
		var testimonial_id=$("#testimonial_id").val();
		var valid=1;
		if(testimonial_page_name==''){
			$("#error_div").show();
			$("#error_div").text("Please Enter Testimonial By");
			valid=0;
		}
		if(testimonial_page_name_ar=='' && valid==1){
			$("#error_div").show();
			$("#error_div").text("Please Enter Testimonial By");
			valid=0;
		}
		var testimonial_id=$("#testimonial_id").val();
		if(testimonial_id==''){
			testimonial_id=0;
		}
		
		if(valid==1){
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>index.php/testimonial/save_testimonial",
			data:{'testimonial_page_name':testimonial_page_name,'testimonial_page_name_ar':testimonial_page_name_ar,'testimonial_page_content':testimonial_page_content,'testimonial_page_content_ar':testimonial_page_content_ar,'testimonial_id':testimonial_id},
			dataType:"json",
			success:function(data){
				
				$("#error_div").hide();
				$("#success_div").show();

				if(data.result==1)
					$("#success_div").text('Content added successfully');
				else
					$("#success_div").text('Content Updated successfully');	
			}
		});
		}
	});
});
</script>
    <!--main content end-->	
	<!------------------------->
	
	