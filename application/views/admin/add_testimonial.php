<script type="text/javascript">
tinymce.init({
    mode : "exact",
	elements:"testimonial_page_content_ar",
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
					<?php echo $this->lang->line('add_testimonial');?>
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                        <a class="fa fa-cog" href="javascript:;"></a>
                        <a class="fa fa-times" href="javascript:;"></a>
                     </span>
                </header>
<div class="panel-body">
	<h2><?php echo $this->lang->line('add_testimonial');?></h2>
    <div class=" form">
			<div id="success_div" class="succ_msg col-lg-offset-2 col-lg-6" style="display:none"></div>
			<div id="error_div" class="err_msg col-lg-offset-2 col-lg-6" style="display:none"></div>
			<input type="hidden" name="testimonial_id" id="testimonial_id" value="<?php echo isset($testimonial['testimonial_id']) && !empty($testimonial['testimonial_id']) ? $testimonial['testimonial_id'] : '';?>"/>
			<div class="form-group" >
				<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                <input type="text" class="form-control" id="testimonial_page_name" name="testimonial_page_name" style="width:400px;" value="<?php echo isset($testimonial['testimonial_page_name']) && !empty($testimonial['testimonial_page_name']) ? $testimonial['testimonial_page_name'] : '';?>"  placeholder="<?php echo $this->lang->line('testimonial_page');?>"/>
				</div>
            </div>
			<div class="form-group" >
				<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                <input type="text" class="form-control" id="testimonial_page_name_ar" name="testimonial_page_name_ar" style="width:400px;" value="<?php echo isset($testimonial['testimonial_page_name_ar']) && !empty($testimonial['testimonial_page_name_ar']) ? $testimonial['testimonial_page_name_ar'] : '';?>" placeholder="<?php echo $this->lang->line('testimonial_page_in_arabic');?>"/>
				</div>
            </div>
			<div class="form-group" >
				<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                <textarea class="form-control" id="testimonial_page_content" name="testimonial_page_content" ><?php echo isset($testimonial['testimonial_page_content']) && !empty($testimonial['testimonial_page_content']) ? $testimonial['testimonial_page_content'] : '';?></textarea>
				</div>
            </div>
			<div class="form-group" >
				<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                <textarea dir="rtl" class="form-control" id="testimonial_page_content_ar" name="testimonial_page_content_ar" ><?php echo isset($testimonial['testimonial_page_content_ar']) && !empty($testimonial['testimonial_page_content_ar']) ? $testimonial['testimonial_page_content_ar'] : '';?></textarea>
				</div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-6">
                    <button class="btn btn-primary submit-btn" type="button" onclick="save_testimonial()"><?php echo $this->lang->line('save');?></button>
                    <button class="btn btn-default" type="button" onclick="list_testimonial()"><?php echo $this->lang->line('cancel');?></button>
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


function save_testimonial()
{
	var testimonial_page_name=$("#testimonial_page_name").val();
	var testimonial_page_name_ar=$("#testimonial_page_name_ar").val();
	var testimonial_page_content=tinymce.get('testimonial_page_content').getContent();
	var testimonial_page_content_ar=tinymce.get('testimonial_page_content_ar').getContent();

	var testimonial_id=$("#testimonial_id").val();
	if(testimonial_page_name==''){
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('pls_enter_testimonial_page_name');?>");
		return false;
	}
	if(testimonial_page_name_ar==''){
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('pls_enter_arabic_testimonial_page_name');?>");
		return false;
	}
	if(testimonial_page_content==''){
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('pls_enter_content_in_english');?>");
		return false;
	}
	if(testimonial_page_content_ar==''){
		$("#error_div").show();
		$("#error_div").text("<?php echo $this->lang->line('pls_enter_content_in_arabic');?>");
		return false;
	}

	var testimonial_id=$("#testimonial_id").val();
	if(testimonial_id==''){
		testimonial_id=0;
	}

	$.ajax({
		type:"POST",
		url:"<?php echo base_url();?>index.php/testimonial/save_testimonial",
		data:{'testimonial_page_name':testimonial_page_name,'testimonial_page_name_ar':testimonial_page_name_ar,'testimonial_page_content':testimonial_page_content,'testimonial_page_content_ar':testimonial_page_content_ar,'testimonial_id':testimonial_id},
		dataType:"json",
		success:function(data){
			$("#error_div").hide();
			$("#success_div").show();
			if(data.result>0)
				$("#success_div").text("<?php echo $this->lang->line('data_saved_sucfuly');?>");
			else
				$("#error_div").text("<?php echo $this->lang->line('went_wrong');?>");	
			setTimeout(function(){
				list_testimonial()
			}, 1500);
		}
	});
}

function list_testimonial() {
	location.href = "<?php echo base_url();?>index.php/testimonial/list_testimonial";
}
</script>
<style type="text/css">
	.err_msg{color:red;}
	.succ_msg{color:green;}
</style>   