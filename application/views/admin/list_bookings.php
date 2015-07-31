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
                            <thead>
                            <tr>
                                <th> #</th>
                                <th>Package Name</th>
                                
								<th>No of People</th>
								<th>Booked By</th>
								<th>Booking Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
							$i=1;
							foreach($bookings as $b){?>
							<tr>
                                <td><?php echo $i;?></td>
                                <td class="hidden-phone"><?php echo stripslashes($b['package_title']);?></td>
                               
								<td>Adults-<?php echo $b['adults'];?><br/>Children-<?php echo $b['children'];?><br/>Infant-<?php echo $b['infant'];?></td>
								<td><?php echo $b['userName'];?></td>
								<td><?php echo date('d/m/Y H:i:s',strtotime($b['booking_time']));?></td>
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
	