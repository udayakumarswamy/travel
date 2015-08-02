	
	    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
				
	            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading"><?php echo $this->lang->line('add_amenities_now');?>
							
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
									<div id="success_div" class="col-lg-offset-2 col-lg-6 succ_msg" style="display:none"></div>
									<div id="error_div" class="col-lg-offset-2 err_msg col-lg-6" style="display:none"></div>
									<input type="hidden" name="am_id" id="am_id" value="<?php echo isset($amenities['id']) && !empty($amenities['id']) ? $amenities['id'] : 0;?>"/>
									<div class="form-group" >
										<div class="col-lg-offset-2 col-lg-6" style="padding-bottom:20px">
                                        <input type="text" class="form-control" id="amenities" name="amenities" style="width:400px;" value="<?php echo isset($amenities['amenities_value']) && !empty($amenities['amenities_value']) ? $amenities['amenities_value']:'';?>" />
										</div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary submit-btn" type="button" onclick="save_eminity()"><?php echo $this->lang->line('save');?></button>
                                            <button class="btn btn-default" type="button" onclick="aminity_list()"><?php echo $this->lang->line('cancel');?></button>
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
/*$(document).ready(function()
{*/
	function save_eminity(){
		// e.preventDefault();
		var amenities=$("#amenities").val();
		if(amenities==''){
			$("#error_div").show();
			$("#error_div").text("<?php echo $this->lang->line('pls_enter_amenity');?>");
		}
		var am_id=$("#am_id").val();
		if(am_id==''){
			am_id=0;
		}
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>index.php/admin_package/save_amenities",
			data:{'amenities':amenities,'id':am_id},
			dataType:"json",
			success:function(data){
				
				$("#error_div").hide();
				$("#success_div").show();

				if(data.result==1)
					$("#success_div").text("<?php echo $this->lang->line('amenity_added_successfully');?>");
				else
					$("#success_div").text("<?php echo $this->lang->line('amenity_updated_successfully');?>");	
				aminity_list();
			}
		});
	}
// });
function aminity_list(){
	location.href="<?php echo base_url();?>index.php/admin_package/list_amenities";
}
</script>
   
   <style type="text/css">
   	.succ_msg{color: green;}
   	.err_msg{color: red;}
   </style>
	
	