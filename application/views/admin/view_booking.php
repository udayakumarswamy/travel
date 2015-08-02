<?php
//$getAdmin = mysql_fetch_array(mysql_query("SELECT * FROM adminis WHERE admin_id = '".$this->session->userdata('admin_id')."'"));
?>
<section id="main-content">
        <section class="wrapper">
        <!-- page start-->
            <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        List of Bookings
                        <span class="tools pull-right">
						    
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <table class="table  table-hover general-table">
                            <tbody>
                            <?php 
		  		  			$b = $bookings[0];
                            ?>
							<tr>
                                <td>Booking ID</td>
                                <td><?php echo $b['booking_code'];?></td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td><img src="<?php echo base_url(); ?>/uploads/<?php echo $b['is_featured_image'];?>" width="100"></td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('pkg_name'); ?></td>
                                <td class="hidden-phone">
                                    <a href="<?php echo base_url(); ?>admin/view_package/<?php echo $b['package_id']; ?>">
                                        <?php echo stripslashes($b['package_title']);?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('booked_by'); ?></td>
                               <td><?php echo $b['userName']; ?></td>
                           </tr>
                           <tr>
                                <td><?php echo $this->lang->line('noof_people'); ?></td>
                                <td>Adults-<?php echo $b['adults'];?><br/>Children-<?php echo $b['children'];?><br/>Infant-<?php echo $b['infant'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('cost_per_adult'); ?></td>
                                <td><?php echo $b['package_cost_adult'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('cost_per_child'); ?></td>
                                <td><?php echo $b['package_cost_child'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('cost_per_infant'); ?></td>
                                <td><?php echo $b['package_cost_infant'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('total_package_cost'); ?></td>
                                <td><?php echo $b['package_cost'];?></td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('departure_date'); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($b['dept_date']));?></td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('arrival_date'); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($b['arr_date']));?></td>
                            </tr>
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
			r=confirm('Are you sure you want to delete?');
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
	