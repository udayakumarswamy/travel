<!-- CONTENT SECTION : begin -->
<div class="err"></div>

<section class="content-section">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <div class="st-form-container">
                    <h5><?php echo $this->lang->line('list_bookings'); ?></h5>


                    <div class="row">
                        <div class="col-sm-12">
                            <table width="100%" class="table">
                                <thead>
                                    <th width="5%">
                                        #
                                    </th>
                                    <th>Image</th>
                                    <th><?php echo $this->lang->line('pkg_name'); ?></th>
                                    <th><?php echo $this->lang->line('noof_people'); ?></th>
                                    <th><?php echo $this->lang->line('total_package_cost'); ?></th>
                                    <th><?php echo $this->lang->line('departure_date'); ?></th>
                                    <th><?php echo $this->lang->line('arrival_date'); ?></th>
                                </thead>
                                <tbody>
                                    <?php 
                            $i=1;
                            foreach($bookings as $b){?>
                            <tr>
                                <td><?php echo $b['booking_code'];?></td>
                                <td><img src="<?php echo base_url(); ?>/uploads/<?php echo $b['is_featured_image'];?>" width="100"></td>
                                <td class="hidden-phone"><?php echo stripslashes($b['package_title']);?></td>
                               
                                <td>Adults-<?php echo $b['adults'];?><br/>Children-<?php echo $b['children'];?><br/>Infant-<?php echo $b['infant'];?></td>
                                <td><?php echo $b['package_cost'];?></td>
                                <td><?php echo date('d/m/Y', strtotime($b['dept_date']));?></td>
                                <td><?php echo date('d/m/Y', strtotime($b['arr_date']));?></td>
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