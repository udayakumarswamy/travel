<section id="main-content">
        <section class="wrapper">
        <!-- page start-->
            <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <?php echo $this->lang->line('list_amenities');?>
                        <span class="tools pull-right">
						    <a href="<?php echo base_url();?>index.php/admin/add_amenities/"><?php echo $this->lang->line('add_amenities');?></a>
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table">
                            <thead>
                            <tr>
                                <th> #</th>
                                <th><?php echo $this->lang->line('amenities_name');?></th>
                                <th><?php echo $this->lang->line('status');?></th>
                                <th><?php echo $this->lang->line('action');?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
							$i=1;
							foreach($amenities as $a){?>
							<tr>
                                <td><?php echo $i;?></td>
                                <td class="hidden-phone"><?php echo stripslashes($a['amenities_value']);?></td>
                                <td class="hidden-phone"><?php echo isset($a['status']) && !empty($a['status']) && $a['status'] == 1 ? "Active" : "Inactive";?></td>
                               <td><a href="<?php echo base_url();?>index.php/admin_package/add_amenities/<?php echo $a['id'];?>"><span class="fa fa-pencil"></span></a>&nbsp;&nbsp;<a href="#"  class="del" data-id=<?php echo $a['id'];?>><span class="fa fa-minus"></span></a></td>
                            </tr>
                            <?php 
								$i++;
							} ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
            
                    <!-- page end-->
        </section>
    </section>
	
	
	<script type="text/javascript">
		$(".del").click(function(){
			var am_id=$(this).data('id');
			r=confirm("<?php echo $this->lang->line('are_u_sure_delete');?>");
			if(r==true){ 
			$.ajax({
				type:"POST",
				url:"<?php echo base_url();?>index.php/admin_package/del_amenity",
				data:{'am_id':am_id},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						window.location="<?php echo base_url();?>index.php/admin_package/list_amenities";
					}
				}
				
			});
		  }	
		});
	</script>
	