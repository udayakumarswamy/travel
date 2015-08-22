<!-- CONTENT SECTION : begin -->
<div class="err"></div>

<section class="content-section">
	<div class="container">
		<div class="row">

			<div class="col-sm-12">
				<div class="st-form-container">
					<h5><?php echo $this->lang->line('your_pkg_list'); ?></h5>


					<div class="row">
						<div class="col-sm-12">
							<table width="100%" class="table">
								<thead>
									<th width="5%">
										#
									</th>
									<th><?php echo $this->lang->line('pkg_name'); ?></th>
									<th><?php echo $this->lang->line('pkg_dept_date'); ?></th>
									<th><?php echo $this->lang->line('pkg_arr_date'); ?></th>
									<th><?php echo $this->lang->line('status'); ?></th>
									<th><?php echo $this->lang->line('action'); ?></th>
								</thead>
								<tbody>
									<?php 
									$i=1;

									foreach($result as $r){?>
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $r['package_title'];?></td>
										<td><?php echo date('d-m-Y', strtotime($r['dept_date']));?></td>
										<td><?php echo date('d-m-Y', strtotime($r['arr_date']));?></td>
										<td><?php if($r['is_active']=='Y'){?> Active <?php }else{ ?> Inactive <?php } ?></td>
										<?php /*<td><a href="<?php echo base_url();?>index.php/agent/add_package/<?php echo $r['package_id'];?>"><span class="fa fa-edit"></span></a>&nbsp;,<a href="#"  class="del" data-id=<?php echo $r['package_id'];?>><span class="fa fa-times"></span></a>&nbsp;<a href="#"><span class="fa fa-book"></span></a></td>*/?>
										<td><a href="<?php echo base_url();?>index.php/agent/add_package/<?php echo $r['package_id'];?>"><span class="fa fa-edit"></span></a>&nbsp;,<a href="#"  class="del" data-id=<?php echo $r['package_id'];?>><span class="fa fa-times"></span></a>&nbsp;</td>
									</tr>
									<?php 
									$i++;
								} ?>	
							</tbody>	
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- CONTENT SECTION : end --> 

</div>

<script type="text/javascript">
        $(".del").click(function(){
            var package_id=$(this).data('id');
            r=confirm("<?php echo $this->lang->line('are_u_sure_delete');?>");
            if(r==true){
            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>index.php/admin_package/del_package",
                data:{'package_id':package_id},
                dataType:"json",
                success:function(data){
                    if(data.result==1){
                        window.location="<?php echo base_url();?>index.php/agent/list_package";
                    }
                }
                
            });
          } 
        });
    </script>