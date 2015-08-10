	
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
                        	<h2><?php echo $this->lang->line('add_amenities');?></h2>
                            <div class=" form">
									<div id="success_div" class="col-lg-offset-2 col-lg-12 succ_msg" style="display:none"></div>
									<div id="error_div" class="col-lg-offset-2 err_msg col-lg-6" style="display:none"></div>
									<input type="hidden" name="am_id" id="am_id" value="<?php echo isset($amenities['id']) && !empty($amenities['id']) ? $amenities['id'] : 0;?>"/>
									<div class="form-group" >
											<label class="control-label col-lg-3" for="cemail"><?php echo $this->lang->line('pkg_name');?> </label>
										<div class="col-lg-offset-2 col-lg-12" style="padding-bottom:20px">
                                        <input type="text" class="form-control" id="amenities" name="amenities" style="width:400px;" value="<?php echo isset($amenities['amenities_value']) && !empty($amenities['amenities_value']) ? $amenities['amenities_value']:'';?>" placeholder="<?php echo $this->lang->line('amenity_name');?>" />
										</div>
                                    </div>
                                    <!--  -->
<?php 
$act_checked = '';
$inact_checked = '';
if(isset($amenities['status']) ){
	if($amenities['status'] == 1){
		$act_checked = 'checked="checked"';
	}if($amenities['status'] == 0){
		$inact_checked = 'checked="checked"';
	}
} ?>                                    
                                    <div class="form-group ">
	<label class="control-label col-lg-3" for="cemail"><?php echo $this->lang->line('status');?> </label>
	<div class="col-lg-3">
	<input type="radio" class="" name="aminity_status" value="1" id="active_1" <?php echo $act_checked;?>/>  <?php echo $this->lang->line('active');?>&nbsp;&nbsp;&nbsp;
	<input type="radio" class="" name="aminity_status" value="0" id="active_0" <?php echo $inact_checked;?>/>  <?php echo $this->lang->line('in_active');?>
	</div>
	</div>
                                    <!--  -->
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
		var status_amt = $("input[name='aminity_status']:checked").val();
		if(amenities==''){
			$("#error_div").show();
			$("#error_div").text("<?php echo $this->lang->line('pls_enter_amenity');?>");
			return false;
		}
		 if(typeof(status_amt) == 'undefined' || status_amt == '')
		 {
			$("#error_div").show();
			$("#error_div").text("<?php echo $this->lang->line('pls_select_amenity_status');?>");
			return false;
		 }

		var am_id=$("#am_id").val();
		if(am_id==''){
			am_id=0;
		}
		$.ajax({
			type:"POST",
			url:"<?php echo base_url();?>index.php/admin_package/save_amenities",
			data:{'amenities':amenities,'amenity_status':status_amt,'id':am_id},
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
	
	