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
										<td><?php echo $r['dept_date'];?></td>
										<td><?php if($r['is_active']=='Y'){?> Active <?php }else{ ?> Inactive <?php } ?></td>
										<td><a href="<?php echo base_url();?>index.php/agent/add_package/<?php echo $r['package_id'];?>"><span class="fa fa-edit"></span></a>&nbsp;,<a href="#"><span class="fa fa-times"></span></a>&nbsp;<a href="#"><span class="fa fa-book"></span></a></td>
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