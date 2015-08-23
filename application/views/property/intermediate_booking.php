<div id="core" class="page-search-results">
	<!-- PAGE HEADER : begin -->
	<div class="page-header">
		<div class="container">
			<div class="page-header-inner clearfix">
				<h1><?php echo $this->lang->line('book_now');?></h1>
				<ul class="custom-list breadcrumbs">
					<li><a href="#"><?php echo $this->lang->line('home');?></a> / </li>
					<li><a href="#"><?php echo $this->lang->line('book');?></a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- PAGE HEADER : end -->

	<!-- MAIN WRAPPER : begin -->
	<div class="main-wrapper-container">
		<div class="container">
			<div class="row">

				<div class="col-sm-12">
				<div class="st-form-container">

				<!-- ************ -->
				<table class="table responsive table-hover general-table">
				<thead>
				<tr><th><h3><?php echo $this->lang->line('booking_details'); ?></h3></th><th></th>
				</tr></thead>
				<tbody>
				<tr>
				<td><?php echo $this->lang->line('username'); ?> </td>
				<td><?php 
				$txt = $this->session->userdata('username');
				echo isset($txt) && !empty($txt) ? $txt : ''; ?></td>
				</tr>
				<tr>
				<td><?php echo $this->lang->line('pkg_name'); ?></td>
				<td><?php echo isset($package['package_title']) && !empty($package['package_title']) ? $package['package_title'] : ''; ?></td>
				</tr>
				<tr>
				<td><?php echo $this->lang->line('total_package_cost'); ?> </td> 
				<td><img src="<?php echo base_url();?>assets/images/dinar-icon.jpg" />&nbsp;<?php echo $this->session->userdata("package_cost");?></td>
				</tr>
				<tr>
				<td><?php echo $this->lang->line('no_adult'); ?> </td>
				<td><?php echo $this->session->userdata("adults");?></td>

				</tr>
				<tr>
				<td><?php echo $this->lang->line('no_child'); ?></td>
				<td><?php echo $this->session->userdata("children");?></td>

				</tr>
				<tr>
				<td><?php echo $this->lang->line('no_infant'); ?></td>
				<td><?php echo $this->session->userdata("infant");?></td>

				</tr>
				<tr>
				<td><?php echo $this->lang->line('arrival_date'); ?> </td>
				<td><?php echo isset($package['arr_date']) && !empty($package['arr_date']) ? $package['arr_date'] : ''; ?></td>
				</tr>
				<tr>
				<td><?php echo $this->lang->line('departure_date'); ?> </td>
				<td><?php echo isset($package['dept_date']) && !empty($package['dept_date']) ? $package['dept_date'] : ''; ?></td>
				</tr>

				<tr>
				<td><?php echo $this->lang->line('list_amenities'); ?> </td>
				<td><?php 
				echo isset($package['amenities']) && !empty($package['amenities']) ? str_replace('~', ', ', $package['amenities']) : ''; ?></td>
				</tr>
				</tbody>
				</table>
				<!-- ************ -->
				<?php $attributes=array('class'=>"default-form",'id'=>'form1' );?>
				<?php echo form_open("index.php/package/booking_success",$attributes);?>
				<input type="hidden" name="package_id" id="package_id" value="<?php echo $this->session->userdata("package_id");?>"/>
				<input type="hidden" name="adults" id="adults" value="<?php echo $this->session->userdata("adults");?>"/>
				<input type="hidden" name="children" id="children" value="<?php echo $this->session->userdata("children");?>"/>
				<input type="hidden" name="infant" id="infant" value="<?php echo $this->session->userdata("infant");?>"/>
				<input type="hidden" name="package_cost" id="package_cost" value="<?php echo $this->session->userdata("package_cost");?>"/>
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>"/>
				<p class="form-row">
				<button class="submit-btn button" id="btn_submit"><i class="fa fa-power-off"></i> <?php echo $this->lang->line('submit');?></button>

				</p>

				<?php echo form_close(); ?>		
				<?php $attributes=array('class'=>"default-form",'id'=>'form1' );?>
				<?php echo form_open("/",$attributes);?>
				<input type="hidden" name="package_id" id="package_id" value="<?php echo $this->session->userdata("package_id");?>"/>
				<input type="hidden" name="adults" id="adults" value="<?php echo $this->session->userdata("adults");?>"/>
				<input type="hidden" name="children" id="children" value="<?php echo $this->session->userdata("children");?>"/>
				<input type="hidden" name="infant" id="infant" value="<?php echo $this->session->userdata("infant");?>"/>
				<input type="hidden" name="package_cost" id="package_cost" value="<?php echo $this->session->userdata("package_cost");?>"/>
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>"/>
				<p class="form-row">
				<button class="submit-btn button" id="btn_submit"><i class="fa fa-power-off"></i><?php echo $this->lang->line('cancel');?></button>

				</p>

				<?php echo form_close(); ?>		

				</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- CORE : end --> 