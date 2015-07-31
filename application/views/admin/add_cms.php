<script type="text/javascript">
tinymce.init({
    mode : "exact",
	elements:"cms_page_content_ar",
    directionality :"rtl",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
	
	    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
				
	            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
							Add CMS
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
									<input type="hidden" name="cms_id" id="cms_id" value="<?php echo $cms['cms_id'];?>"/>
									<div class="form-group" >
										<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                                        <input type="text" class="form-control mceEditor" id="cms_page_name" name="cms_page_name" style="width:400px;" value="<?php echo $cms['cms_page_name'];?>" />
										</div>
                                    </div>
									<div class="form-group" >
										<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                                        <input type="text" class="form-control" id="cms_page_name_ar" name="cms_page_name_ar" style="width:400px;" value="<?php echo $cms['cms_page_name_ar'];?>" />
										</div>
                                    </div>
									<div class="form-group" >
										<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                                        <textarea class="form-control" id="cms_page_content" name="cms_page_content" ><?php echo $cms['cms_page_content'];?></textarea>
										</div>
                                    </div>
									<div class="form-group" >
										<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                                        <textarea dir="rtl" class="form-control" id="cms_page_content_ar" name="cms_page_content_ar" ><?php echo $cms['cms_page_content_ar'];?></textarea>
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
		var cms_page_name=$("#cms_page_name").val();
		var cms_page_name_ar=$("#cms_page_name_ar").val();
		var cms_page_content=$("#cms_page_content").val();
		var cms_page_content_ar=$("#cms_page_content_ar").val();
		var cms_id=$("#cms_id").val();
		var valid=1;
		if(cms_page_name==''){
			$("#error_div").show();
			$("#error_div").text("Please Enter Amenity");
			valid=0;
		}
		if(cms_page_name_ar=='' && valid==1){
			$("#error_div").show();
			$("#error_div").text("Please Enter Amenity");
			valid=0;
		}
		var cms_id=$("#cms_id").val();
		if(cms_id==''){
			cms_id=0;
		}
		
		if(valid==1){
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>index.php/cms/save_cms",
			data:{'cms_page_name':cms_page_name,'cms_page_name_ar':cms_page_name_ar,'cms_page_content':cms_page_content,'cms_page_content_ar':cms_page_content_ar,'cms_id':cms_id},
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
	
	