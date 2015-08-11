<section class="content-section">
<div class="container">
<div class="row">
<div class="package-detailas">
<table class="table responsive table-hover general-table">
<thead>
<tr><th><h3><?php echo $this->lang->line('booking_details'); ?></h3></th><th></th>
</tr></thead>
<tbody>
<tr>
<td width="300"><?php echo $this->lang->line('book_pkg_id'); ?></td>
<td><?php echo isset($bookings['booking_code']) && !empty($bookings['booking_code']) ? $bookings['booking_code'] : ''; ?></td>
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
<td><?php echo isset($bookings['adults']) && !empty($bookings['adults']) ? $bookings['adults'] : ''; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('no_child'); ?></td>
<td><?php echo isset($bookings['children']) && !empty($bookings['children']) ? $bookings['children'] : ''; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('no_infant'); ?></td>
<td><?php echo isset($bookings['infant']) && !empty($bookings['infant']) ? $bookings['infant'] : ''; ?></td>
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

<tr>
<td>&nbsp;</td>
<td><button data-loading-label="Sending..." class="button submit-btn" onclick="back_booking_list()"><i class="fa fa-envelope"></i> Back</button></td>
</tr>


</tbody>
</table>

<!-- page end--> 
</div>
</div>
</div>
</section>


<script type="text/javascript">
function  back_booking_list(){
    location.href = "<?php echo base_url();?>index.php/landing/welcome";
}
</script>