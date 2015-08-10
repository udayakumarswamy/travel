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
						<?php echo $this->lang->line('add_cms');?>
	                    <span class="tools pull-right">
	                        <a class="fa fa-chevron-down" href="javascript:;"></a>
	                        <a class="fa fa-cog" href="javascript:;"></a>
	                        <a class="fa fa-times" href="javascript:;"></a>
	                     </span>
	                </header>
	                <div class="panel-body">
	                	<h2><?php echo $this->lang->line('add_cms');?></h2>
	                    <div class=" form">
								<div id="success_div" class="succ_msg col-lg-offset-2 col-lg-6" style="display:none"></div>
								<div id="error_div" class="err_msg col-lg-offset-2 col-lg-6" style="display:none"></div>
								<input type="hidden" name="cms_id" id="cms_id" value="<?php echo isset($cms['cms_id']) && !empty($cms['cms_id']) ? $cms['cms_id'] : 0;?>"/>
								<div class="form-group" >
									<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
	                                <input type="text" class="form-control mceEditor" id="cms_page_name" name="cms_page_name" style="width:400px;" value="<?php echo isset($cms['cms_page_name']) && !empty($cms['cms_page_name']) ? $cms['cms_page_name'] : '';?>" placeholder="<?php echo $this->lang->line('cms_page');?>" />
									</div>
	                            </div>
								<div class="form-group" >
									<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
	                                <input type="text" class="form-control" id="cms_page_name_ar" name="cms_page_name_ar" style="width:400px;" value="<?php echo isset($cms['cms_page_name_ar']) && !empty($cms['cms_page_name_ar']) ? $cms['cms_page_name_ar'] : '';?>" placeholder="<?php echo $this->lang->line('cms_page_in_arabic');?>"/>
									</div>
	                            </div>
								<div class="form-group" >
									<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
	                                <textarea class="form-control" id="cms_page_content" name="cms_page_content" placeholder="<?php echo $this->lang->line('cms_page_content_in_english');?>"><?php echo isset($cms['cms_page_content']) && !empty($cms['cms_page_content']) ? $cms['cms_page_content'] : '';?></textarea>
									</div>
	                            </div>
								<div class="form-group" >
									<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
	                                <textarea dir="rtl" class="form-control" id="cms_page_content_ar" name="cms_page_content_ar" placeholder="<?php echo $this->lang->line('cms_page_content_in_arabic');?>"><?php echo isset($cms['cms_page_content_ar']) && !empty($cms['cms_page_content_ar']) ? $cms['cms_page_content_ar'] : '';?></textarea>
									</div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-lg-offset-3 col-lg-6">
	                                    <button class="btn btn-primary submit-btn" type="button" onclick="return save_cms();"><?php echo $this->lang->line('save');?></button>
	                                    <button class="btn btn-default" type="button" onclick="return list_cms();"><?php echo $this->lang->line('cancel');?></button>
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

	function save_cms(){
		var cms_page_name=$("#cms_page_name").val();
		var cms_page_name_ar=$("#cms_page_name_ar").val();
		var cms_page_content = tinymce.get('cms_page_content').getContent();
		var cms_page_content_ar= tinymce.get('cms_page_content_ar').getContent();
		var cms_id=$("#cms_id").val();
		var valid=1;
		if(cms_page_name==''){
			$("#error_div").show();
			$("#error_div").text("<?php echo $this->lang->line('pls_enter_cms_page_name');?>");
			return false;
		}
		if(cms_page_name_ar==''){
			$("#error_div").show();
			$("#error_div").text("<?php echo $this->lang->line('pls_enter_arabic_cms_page_name');?>");
			return false;
		}
		if(cms_page_content==''){
			$("#error_div").show();
			$("#error_div").text("<?php echo $this->lang->line('pls_enter_content_in_english');?>");
			return false;
		}
		if(cms_page_content_ar==''){
			$("#error_div").show();
			$("#error_div").text("<?php echo $this->lang->line('pls_enter_content_in_arabic');?>");
			return false;
		}
		var cms_id=$("#cms_id").val();
		if(cms_id==''){
			cms_id=0;
		}
	
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>index.php/cms/save_cms",
			data:{'cms_page_name':cms_page_name,'cms_page_name_ar':cms_page_name_ar,'cms_page_content':cms_page_content,'cms_page_content_ar':cms_page_content_ar,'cms_id':cms_id},
			dataType:"json",
			success:function(data){
				$("#error_div").hide();
				$("#success_div").show();
				if(data.result=='success')
				{
					$("#success_div").text("<?php echo $this->lang->line('data_saved_sucfuly');?>");	
				} else {
					$("#error_div").text("<?php echo $this->lang->line('went_wrong');?>");	
				}
				setTimeout(function(){
					list_cms();
				},1500);
			}
		});
		
	}
	function list_cms()
	{
		location.href = "<?php echo base_url();?>index.php/cms/list_cms";
	}
</script>
    <style type="text/css">
    .err_msg{color: red;}
    .succ_msg{color: green;}
    </style>