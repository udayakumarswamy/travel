<div id="core" class="page-search-results">
	<!-- PAGE HEADER : begin -->
	<div class="page-header">
		<div class="container">
			<div class="page-header-inner clearfix">
				<h1><?php echo $this->lang->line('book_now');?></h1>
				<?php echo $breadcrumbs;?>
			</div>
		</div>
	</div>
	<!-- PAGE HEADER : end -->

	<!-- MAIN WRAPPER : begin -->
	<div class="main-wrapper-container">
		<div class="container">
<div class="row">
<div class="package-detailas">
<table class="table responsive table-hover general-table">
<thead>
<tr><th><h3><?php echo $this->lang->line('booking_details'); ?></h3></th><th></th>
</tr></thead>
<tbody>
<tr>
<td width="300"><?php echo $this->lang->line('booking').' '.$this->lang->line('status'); ?></td>
<td><?php echo $this->lang->line('success'); ?></td>
</tr>
<tr>
<td width="300"><?php echo $this->lang->line('book_pkg_id'); ?></td>
<td><?php echo isset($bookings['booking_code']) && !empty($bookings['booking_code']) ? $bookings['booking_code'] : ''; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('username'); ?> </td>
<td><?php echo isset($bookings['userName']) && !empty($bookings['userName']) ? $bookings['userName'] : ''; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('email'); ?> </td>
<td><?php echo isset($bookings['EmailAddress']) && !empty($bookings['EmailAddress']) ? $bookings['EmailAddress'] : ''; ?></td>
</tr>

<tr>
<td><?php echo $this->lang->line('pkg_name'); ?></td>
<td><?php echo isset($bookings['package_title']) && !empty($bookings['package_title']) ? $bookings['package_title'] : ''; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('total_package_cost'); ?> </td> 
<td><?php echo isset($bookings['package_cost']) && !empty($bookings['package_cost']) ? $bookings['package_cost'] : ''; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('no_adult'); ?> </td>
<td><?php echo isset($bookings['adults']) && !empty($bookings['adults']) ? $bookings['adults'] : 0; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('no_child'); ?></td>
<td><?php echo isset($bookings['children']) && !empty($bookings['children']) ? $bookings['children'] : 0; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('no_infant'); ?></td>
<td><?php echo isset($bookings['infant']) && !empty($bookings['infant']) ? $bookings['infant'] : 0; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('arrival_date'); ?> </td>
<td><?php echo isset($bookings['arr_date']) && !empty($bookings['arr_date']) ? $bookings['arr_date'] : ''; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('departure_date'); ?> </td>
<td><?php echo isset($bookings['dept_date']) && !empty($bookings['dept_date']) ? $bookings['dept_date'] : ''; ?></td>
</tr>

<tr>
<td><?php echo $this->lang->line('list_amenities'); ?> </td>
<td><?php 
    
echo isset($bookings['amenities']) && !empty($bookings['amenities']) ? str_replace('~', ', ', $bookings['amenities']) : ''; ?></td>
</tr>




</tbody>
</table>

<!-- page end--> 
</div>
</div>
</div>
			

	</div>
</div>
<!-- CORE : end --> 