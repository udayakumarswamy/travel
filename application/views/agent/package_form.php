<!-- CONTENT SECTION : begin -->
<div class="err"></div>

<section class="content-section">
  <div class="container">
    <div class="row">

      <div class="col-sm-12">
        <div class="st-form-container">
          <h5>
            <?php
              if($package_details['package_id']=='') {
                echo $this->lang->line('add_package');
              }
              else {
                echo $this->lang->line('edit_package');
              }
            ?>
          </h5>
          <div id="error_div" class="alert alert-danger" style="display:none"></div>
          <div id="success_div" class="alert alert-success" style="display:none"></div>

          <?php $attributes = array('class' => 'default-form', 'id' => 'contact-form');
          echo form_open('agent/save_package',$attributes);
          if($package_details['package_id']=='')
            $package_details['package_id']=0;
          ?>
          <input type="hidden" name="package_id" id="package_id" value="<?php echo $package_details['package_id'];?>" />
          <div class="row">
            <div class="col-sm-12">
              <p>
                <input type="text" id="package_title" name="package_title" class="required" value="<?php echo $package_details['package_title'];?>" placeholder="<?php echo $this->lang->line('package_title');?>">
              </p>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-6">
              <p>
                <input type="text" id="dept_date" name="dept_date" value="<?php echo date('n/d/Y', strtotime($package_details['dept_date']));?>" class="required" placeholder="<?php echo $this->lang->line('departure_date');?>">
                <script>
                $(function() {
                  $( "#dept_date" ).datepicker();
                });
                </script>
              </p>
            </div>
            <div class="col-sm-6">
              <p>
                <input type="text" id="arr_date" name="arr_date"  value="<?php echo date('n/d/Y', strtotime($package_details['arr_date']));?>" class="required" placeholder="<?php echo $this->lang->line('arrival_date');?>">
              </p>
              <script>
              $(function() {
                $( "#arr_date" ).datepicker();
              });
              </script>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <p>
                <input type="text" id="package_cost_adult" value="<?php echo $package_details['package_cost_adult'];?>" name="package_cost_adult" class="required" placeholder="<?php echo $this->lang->line('cost_per_adult');?>">
              </p>
              <p>
                <input type="text" id="package_cost_child" value="<?php echo $package_details['package_cost_child'];?>" name="package_cost_child" class="required" placeholder="<?php echo $this->lang->line('cost_per_child');?>">
              </p>
              <p>
                <input type="text" id="package_cost_infant" value="<?php echo $package_details['package_cost_infant'];?>" name="package_cost_infant" class="required" placeholder="<?php echo $this->lang->line('cost_per_infant');?>">
              </p>
            </div>
            <div class="col-sm-6">
              <p>
                <input type="text" id="number_of_seats_adult" value="<?php echo $package_details['number_of_seats_adult'];?>" name="number_of_seats_adult" class="required" placeholder="<?php echo $this->lang->line('no_of_seats_avail_for_adults');?>">
              </p>
              <p>
                <input type="text" id="number_of_seats_child" name="number_of_seats_child" class="required" value="<?php echo $package_details['number_of_seats_child'];?>" placeholder="<?php echo $this->lang->line('no_of_seats_avail_for_childs');?>">
              </p>
              <p>
                <input type="text" id="number_of_seats_infant" value="<?php echo $package_details['number_of_seats_infant'];?>" name="number_of_seats_infant" class="required" placeholder="<?php echo $this->lang->line('no_of_seats_avail_for_infants');?>">
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <p>
                <p> <span class="select-box">
                  <select id="country_id" name="country_id" class="required" data-placeholder="<?php echo $this->lang->line('destination_country');?>">
                    <?php foreach($countries as $country){?>
                    <option value="<?php echo $country['id'];?>" <?php if($package_details['country_id']==$country['id']){?> selected="selected" <?php } ?>><?php echo $country['country'];?></option>
                    <?php } ?>
                  </select>
                </span> </p>
              </p>
            </div>
            <div class="col-sm-6">
              <p>
                <?php 
                $amm_arr=explode('~',$package_details['amenities']);
                // print_r($amenities);

                $amenities_list = $amenities;
                if(count($amenities_list) > 0) 
                {
                  foreach ($amenities_list as $key => $amenity) {
                    $checked = '';
                    if(in_array($amenity['amenities_value'], $amm_arr)) {
                      $checked = 'checked="checked"';
                    }?>
              <input type="checkbox" name="aminity_group" id="<?php echo $key.'_'.$amenity['amenities_value'];?>" value="<?php echo $amenity['amenities_value'];?>" <?php echo $checked;?> class="chkbox">
              <label for="dummy-checkbox"><?php echo $amenity['amenities_value'];?></label>
              <?php }
                }
                ?>
                <!-- <input type="checkbox" name="" id="food" value="food" <?php if(in_array('food',$amm_arr)){?> checked="checked" <?php } ?> class="chkbox">
                <label for="dummy-checkbox">Food</label>

                <input type="checkbox" value="transport" class="chkbox" <?php if(in_array('transport',$amm_arr)){?> checked="checked" <?php } ?>>
                <label for="dummy-checkbox2">Transportation</label>


                <input type="checkbox" name="" value="guide" <?php if(in_array('guide',$amm_arr)){?> checked="checked" <?php } ?> class="chkbox">
                <label for="dummy-checkbox">Guide</label> -->


              </p>
            </div>
          </div>
          <p>
            <textarea id="package_desc"  name="package_desc" class="required" placeholder="<?php echo $this->lang->line('package_description');?>"><?php echo $package_details['package_desc'];?></textarea>
          </p>
          <div class="row">
            <div class="col-sm-6">
              <p class="default-form">
                <div id="fileuploader"><?php echo $this->lang->line('upload');?></div>

                <?php if(!empty($images)){
                  $files='';
                  foreach($images as $img){
                    if($files==''){
                      $files=$img['image_files'];
                      
                    }else{
                      $files.='~'.$img['image_files'];
                    }
                    ?>
                    <div class="img-responsive">
                      <img src="<?php echo base_url();?>uploads/<?php echo $img['image_files'];?>"
                    </div>
                    <?php }} ?> 
                    <input type="hidden" name="hid_upload_file" id="hid_upload_file" value="<?php echo $files;?>"/>
                    <div class="clearfix"></div>
                  </p>
                </div>
                <div class="col-sm-6">


                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <p class="form-note"><?php echo $this->lang->line('all_fields_req');?></p>
                </div>
                <div class="col-sm-6">
                  <p class="form-submit">
                    <button class="button submit-btn" data-loading-label="Sending..."><i class="fa fa-envelope"></i> <?php echo $this->lang->line('save');?></button>
                  </p>
                </div>
              </div>
              <?php echo form_close();?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- CONTENT SECTION : end --> 

  </div>
  <script>
  $(document).ready(function()
  {
    var hid_upload_file;
    $("#fileuploader").uploadFile({
      url:"<?php echo base_url();?>index.php/agent/upload",
      fileName:"myfile",
      onSuccess:function(files,data,xhr)
      {
        
        hid_upload_file=$("#hid_upload_file").val();
        if(hid_upload_file==''){
          hid_upload_file=files;
          $("#hid_upload_file").val(hid_upload_file);
        }   
        else{
          hid_upload_file+='~'+files;
          $("#hid_upload_file").val(hid_upload_file);
        }
      }
    });
    $(".submit-btn").click(function(e){
      var package_title=$("#package_title").val();
      var dept_date=$("#dept_date").val();
      var arr_date=$("#arr_date").val();
      var package_cost_adult=$("#package_cost_adult").val();
      var package_cost_child=$("#package_cost_child").val();
      var package_cost_infant=$("#package_cost_infant").val();
      var number_of_seats_adult=$("#number_of_seats_adult").val();
      var number_of_seats_child=$("#number_of_seats_child").val();
      var number_of_seats_infant=$("#number_of_seats_infant").val();
      var country_id=$("#country_id").val();
      var ameneties='';

      $(".chkbox").each(function(){
        if($(this).is(":checked")){
          if(ameneties==''){
            ameneties+=$(this).val();
          }
          else{
            ameneties+='~'+$(this).val();
          }
        } 
      });
      var package_desc=$("#package_desc").val();
      var valid=1;
      if(package_title=='' && valid==1){
        valid=0;
        $("#error_div").show();
        $("#error_div").text("<?php echo $this->lang->line('enter_pckg_title');?>");
        $('html, body').animate({
          scrollTop: $('.err').offset().top
        }, 500);
      }
  
      if(dept_date=='' && valid==1){
        valid=0;
        $("#error_div").show();
        $("#error_div").text("<?php echo $this->lang->line('enter_departure_date');?>");
        $('html, body').animate({
          scrollTop: $('.err').offset().top
        }, 500);
      }
      if(arr_date=='' && valid==1){
        valid=0;
        $("#error_div").show();
        $("#error_div").text("<?php echo $this->lang->line('enter_arval_date');?>");
        $('html, body').animate({
          scrollTop: $('.err').offset().top
        }, 500);
      }
      if(package_cost_adult=='' && valid==1){
        valid=0;
        $("#error_div").show();
        $("#error_div").text("<?php echo $this->lang->line('enter_pkg_cost_adult');?>")
        $('html, body').animate({
          scrollTop: $('.err').offset().top
        }, 500);
      }
      if(package_cost_child=='' && valid==1){
        valid=0;
        $("#error_div").show();
        $("#error_div").text("<?php echo $this->lang->line('enter_pkg_cost_child');?>")
        $('html, body').animate({
          scrollTop: $('.err').offset().top
        }, 500);
      }
      if(package_cost_infant=='' && valid==1){
        valid=0;
        $("#error_div").show();
        $("#error_div").text("<?php echo $this->lang->line('enter_pkg_cost_infant');?>")
        $('html, body').animate({
          scrollTop: $('.err').offset().top
        }, 500);
      }
      if(number_of_seats_adult=='' && valid==1){
        valid=0;
        $("#error_div").show();
        $("#error_div").text("<?php echo $this->lang->line('enter_noof_seats_adult');?>")
        $('html, body').animate({
          scrollTop: $('.err').offset().top
        }, 500);
      }
      if(number_of_seats_child=='' && valid==1){
        valid=0;
        $("#error_div").show();
        $("#error_div").text("<?php echo $this->lang->line('enter_noof_seats_adult');?>")
        $('html, body').animate({
          scrollTop: $('.err').offset().top
        }, 500);
      }
      if(number_of_seats_infant=='' && valid==1){
        valid=0;
        $("#error_div").show();
        $("#error_div").text("<?php echo $this->lang->line('enter_noof_seats_infant');?>")
        $('html, body').animate({
          scrollTop: $('.err').offset().top
        }, 500);
      }
      if(country_id=='' && valid==1){
        valid=0;
        $("#error_div").show();
        $("#error_div").text("<?php echo $this->lang->line('enter_country');?>")
        $('html, body').animate({
          scrollTop: $('.err').offset().top
        }, 500);
      }
      if(package_desc=='' && valid==1){
        valid=0;
        $("#error_div").show();
        $("#error_div").text("<?php echo $this->lang->line('enter_pkg_dest');?>")
        $('html, body').animate({
          scrollTop: $('.err').offset().top
        }, 500);
      }
      var package_id=$("#package_id").val();
      if(valid==1){
        
        $.ajax({
          type:"POST",
          url:'<?php echo base_url();?>index.php/agent/save_package',
          data:{'package_id':package_id,'package_title':package_title,'dept_date':dept_date,'arr_date':arr_date,'package_cost_adult':package_cost_adult,'package_cost_child':package_cost_child,'package_cost_infant':package_cost_infant,'number_of_seats_adult':number_of_seats_adult,'number_of_seats_child':number_of_seats_child,'number_of_seats_infant':number_of_seats_infant,'country_id':country_id,'amenities':ameneties,'package_desc':package_desc,'files':hid_upload_file},
          dataType:"json",
          success:function(data){
            if(data.result>0){
              $("#error_div").hide();
              $("#success_div").show();
              $("#success_div").html("<?php echo $this->lang->line('data_saved_sucfuly');?>");
              $('html, body').animate({
                scrollTop: $('.err').offset().top
              }, 500);
            }
          }
        });
        e.preventDefault();
      }
    });
});
</script>
<!-- CORE : end --> 
