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
                        List of Packages
                        <span class="tools pull-right">
						    <a href="<?php echo base_url();?>index.php/admin/add_package/">Add Package</a>
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
                                <th>Package Dept Date</th>
                                <th>Package Arr Date</th>
                                <th>Package Status</th>
								<th>Featured</th>
								<th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
							$i=1;
							foreach($package as $p){?>
							<tr>
                                <td><?php echo $i;?></td>
                                <td class="hidden-phone"><?php echo $p['package_title'];?></td>
                                <td><?php $dept_arr=explode('-',$p['dept_date']);
									echo $dept_date=$dept_arr[1].'/'.$dept_arr[0].'/'.$dept_arr[2];
								?></td>
                                <td><?php $ar_arr=explode('-',$p['arr_date']);
									echo $arr_date=$ar_arr[1].'/'.$ar_arr[0].'/'.$ar_arr[2];
								?></td>
                                <td>
                                    <a href="#" class="status" data-id="<?php echo $p['package_id'];?>" data-status="<?php echo $p['is_active'];?>"><span id="spn_<?php echo $p['package_id'];?>"><?php if($p['is_active']=='Y'){?>Active<?php }else{ ?>Inactive<?php } ?></span></a>
                                </td>
								<td><a href="#" class="featured" data-id="<?php echo $p['package_id'];?>" data-status="<?php echo $p['is_featured'];?>"><span id="fe_<?php echo $p['package_id'];?>"><?php if($p['is_featured']=='Y'){?>YES<?php }else{ ?>NO<?php } ?></span></a></td>
								<td><a href="<?php echo base_url();?>index.php/admin/view_package/<?php echo $p['package_id'];?>"><span class="fa fa-info"></span></a>&nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/admin_package/add_package/<?php echo $p['package_id'];?>"><span class="fa fa-pencil"></span></a>&nbsp;&nbsp;<a href="#"  class="del" data-id=<?php echo $p['package_id'];?>><span class="fa fa-minus"></span></a></td>
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
		$(".status").click(function(){
			var package_id=$(this).data('id');
			var curr_stat=$(this).data('status');
			$.ajax({
				type:"POST",
				url:"<?php echo base_url();?>index.php/admin_package/change_status",
				data:{'package_id':package_id,'curr_stat':curr_stat},
				dataType:"json",
				success:function(data){
					$("#spn_"+package_id).text(data.result);
					if(curr_stat=='Y')
						$(this).attr('data-status','N');
					else
						$(this).attr('data-status','Y');	
				}
			});	
		
		});
	</script>
	<script type="text/javascript">
		$(".featured").click(function(){
			var package_id=$(this).data('id');
			var curr_stat=$(this).data('status');
			$.ajax({
				type:"POST",
				url:"<?php echo base_url();?>index.php/admin_package/change_featured",
				data:{'package_id':package_id,'curr_stat':curr_stat},
				dataType:"json",
				success:function(data){
					$("#fe_"+package_id).html(data.result);
					if(curr_stat=='Y')
						$(this).attr('data-status',"N");
					else
						$(this).attr('data-status',"Y");
				}
			});	
		
		});
	</script>
	<script type="text/javascript">
		$(".del").click(function(){
			var package_id=$(this).data('id');
			r=confirm('Are you sure you want to delete?');
			if(r==true){
			$.ajax({
				type:"POST",
				url:"<?php echo base_url();?>index.php/admin_package/del_package",
				data:{'package_id':package_id},
				dataType:"json",
				success:function(data){
					if(data.result==1){
						window.location="<?php echo base_url();?>index.php/admin/list_package";
					}
				}
				
			});
		  }	
		});
	</script>
	