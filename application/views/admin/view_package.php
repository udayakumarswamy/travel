<!--main content start-->
<section id="main-content">
    <section class="wrapper">
    <!-- page start-->
    <div class="row">
    <div class="col-lg-12">
    <section class="panel">
    <header class="panel-heading"><?php echo $this->lang->line('view_package');?>
        <span class="tools pull-right">
            <a class="fa fa-chevron-down" href="javascript:;"></a>
            <a class="fa fa-cog" href="javascript:;"></a>
            <a class="fa fa-times" href="javascript:;"></a>
        </span>
    </header>
    <div class="panel-body">
        <?php $package_details = $package_details[0]; ?>
        <table class="table  table-hover general-table">
            <tr>
                <td><?php echo $this->lang->line('package_title');?> </td>
                <td><?php echo $package_details['package_title'];?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('pkg_dept_date');?> </td>
                <td><?php echo $package_details['dept_date'];?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('arrival_date');?> </td>
                <td><?php echo $package_details['arr_date'];?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('package_description');?> </td>
                <td><?php echo $package_details['package_desc'];?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('cost_per_adult');?> </td>
                <td><?php echo $package_details['package_cost_adult'];?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('cost_per_child');?> </td>
                <td><?php echo $package_details['package_cost_child'];?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('cost_per_infant');?> </td>
                <td><?php echo $package_details['package_cost_adult'];?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('no_of_seats_avail_for_adults');?> </td>
                <td><?php echo $package_details['number_of_seats_adult'];?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('no_of_seats_avail_for_childs');?> </td>
                <td><?php echo $package_details['number_of_seats_child'];?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('no_of_seats_avail_for_infants');?> </td>
                <td><?php echo $package_details['number_of_seats_infant'];?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('country');?> </td>
                <td><?php echo $country_list[$package_details['country_id']];?></td>
            </tr>
            <tr>
                <td><?php echo $this->lang->line('list_amenities');?> </td>
                <td>
                    <?php
                    $amenities = explode('~', $package_details['amenities']);
                    echo $amenities = implode(', ', $amenities);
                    ?>
                </td>
            </tr>
        </table>

    <!-- page end-->
    </section>
</section>