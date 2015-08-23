<?php 
if($postfix=='')
								  	$folder='';
								  else
								  	$folder='ar/';
?>
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
				<div id="main-wrapper">
					<div class="row">
						<div class="col-md-12">

							<!-- PROPERTIES LISTING : begin -->
							<div class="properties-listing">

								<div class="row">
									<div class="col-md-6" style="margin-left:100px;margin-bottom: 32px;">
										<div id="error_div" class="alert alert-danger" style="display:none; color:red;"></div>
										<h3><?php echo trim($package['package_title']);?></h3>
									</div>
									<div class="row">
										<div class="col-md-6 default-form" style="margin-left:30px">
										<div class="panel-item book-form ">
													<?php $attributes=array('class'=>"default-form");?>
													<?php echo form_open("index.php/".$folder."package/checkout",$attributes);?>
															<input type="hidden" name="package_id" id="package_id" value="<?php echo $package['package_id'];?>" />
															<select name="adults" id="adults"  class="person required" data-placeholder="Adults">
																<option><?php echo $this->lang->line('adults');?></option>
																<option value="1" <?php if($adults==1){?> selected="selected" <?php } ?>>1</option>
																<option value="2" <?php if($adults==2){?> selected="selected" <?php } ?>>2</option>
																<option value="3" <?php if($adults==3){?> selected="selected" <?php } ?>>3</option>
																<option value="4" <?php if($adults==4){?> selected="selected" <?php } ?>>4</option>
																<option value="5" <?php if($adults==5){?> selected="selected" <?php } ?>>5</option>
															</select>
														
													</p>
													<p class="form-row">
														
															<select name="children" id="children" class=" person required" data-placeholder="Children">
																<option><?php echo $this->lang->line('child');?></option>
																<option value="1" <?php if($children==1){?> selected="selected" <?php } ?>>1</option>
																<option value="2"<?php if($children==2){?> selected="selected" <?php } ?>>2</option>
																<option value="3" <?php if($children==3){?> selected="selected" <?php } ?>>3</option>
																<option value="4" <?php if($children==4){?> selected="selected" <?php } ?>>4</option>
																<option value="5" <?php if($children==5){?> selected="selected" <?php } ?>>5</option>
															</select>
															
													</p>
													<p class="form-row">
														
															<select name="infant" id="infant" class="person required" data-placeholder="Infant">
																<option><?php echo $this->lang->line('infant');?></option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
															</select>
															
													</p>
														<p class="form-row">

														</p>
													<h4><?php echo $this->lang->line('total_package_cost');?>:<span style="color:#CC0033"><img src="<?php echo base_url();?>assets/images/dinar-icon.jpg" />&nbsp;</span><span id="cost_span" style="color:#CC0033"><?php echo $total_cost=$adults*$package['package_cost_adult']+ $children*$package['package_cost_child'];?></span></h4>
<input type="hidden" name="cost_hidden" id="cost_hidden" value="<?php echo $total_cost;?>" />	
														<p class="form-row sub_btn" style="display:none;">
															<button  class="button submit-btn" onclick="open_popup();"><i class="fa fa-check"></i><?php echo $this->lang->line('continue');?></button>
														</p>
													<?php echo form_close();?>
												</div>
										</div>	
										
										<div class="col-md-4" style="margin-left:100px">
										<div class="panel-item">
														<h4><?php echo $this->lang->line('package_details');?></h4>
														<!-- <h4><?php echo $country['country'];?></h4> -->
														
														<p class="form-row">
															<h4><?php echo $this->lang->line('arrival_date');?>:<span style="color:#999"> <?php echo stripslashes($package['dept_date']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('departure_date');?>:<span style="color:#999">  <?php echo stripslashes($package['arr_date']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('cost_per_adult');?>:<span style="color:#999"> <img src="<?php echo base_url();?>assets/images/dinar-icon.jpg" />&nbsp;</span><span style="color:#999"><?php echo stripslashes($package['package_cost_adult']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('cost_per_child');?>:<span style="color:#999"> <img src="<?php echo base_url();?>assets/images/dinar-icon.jpg" />&nbsp;</span><span style="color:#999"><?php echo stripslashes($package['package_cost_child']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('cost_per_infant');?>:<span style="color:#999"> <img src="<?php echo base_url();?>assets/images/dinar-icon.jpg" />&nbsp;</span><span style="color:#999"><?php echo stripslashes($package['package_cost_infant']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('amenities');?>:<span style="color:#999"> 
																<?php echo str_replace("~",", ",stripslashes($package['amenities']));?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('country');?>:<span style="color:#999"> <?php echo stripslashes($package['country']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('description');?>:<span style="color:#999"> <?php echo stripslashes($package['package_desc']);?></span></h4>
														</p>
												</div>
										</div>			
									</div>

							</div>

<!-- modal start -->							
<!-- Modal --><?php /*
  <div class="modal fade" id="confirmation" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><?php echo $this->lang->line('booking_details'); ?></h3>
        </div>
        <div class="modal-body">
<?php $attributes=array('class'=>"default-form");?>
<?php echo form_open("index.php/".$folder."package/checkout",$attributes);?>
														

          <table class="table responsive table-hover general-table">

<tbody>
<tr>
<td><?php echo $this->lang->line('username'); ?> </td>
<td><?php 
$txt = $this->session->userdata('username');
echo isset($txt) && !empty($txt) ? $txt : ''; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('pkg_name'); ?></td>
<input type="hidden" name="package_id" id="package_id" value="<?php echo $package['package_id'];?>" />
<td><?php echo isset($package['package_title']) && !empty($package['package_title']) ? $package['package_title'] : ''; ?></td>
</tr>
<tr>
<td><?php echo $this->lang->line('total_package_cost'); ?> </td> 
<td><img src="<?php echo base_url();?>assets/images/dinar-icon.jpg" />&nbsp;<span id="cost_hidden_2"></span></td>
<input type="hidden" name="cost_hidden_1" id="cost_hidden_1" value="" />

</tr>
<tr>
<td><?php echo $this->lang->line('no_adult'); ?> </td>
<td><div id="adults_2"></div></td>
<input type="hidden" name="adults_1" id="adults_1" value="" />
</tr>
<tr>
<td><?php echo $this->lang->line('no_child'); ?></td>
<td><div id="children_2"></div></td>
<input type="hidden" name="children_1" id="children_1" value="<?php echo isset($children) && !empty($children) && is_numeric($children) ? $children : 0; ?>" />
</tr>
<tr>
<td><?php echo $this->lang->line('no_infant'); ?></td>
<td><div id="infant_2"></td>
<input type="hidden" name="infant_1" id="infant_1" value="<?php echo isset($infant) && !empty($infant)  && is_numeric($infant)? $infant : 0; ?>" />
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
<p class="form-row sub_btn" >
	<button  class="button submit-btn"><i class="fa fa-check"></i><?php echo $this->lang->line('continue');?></button>
</p>
</tbody>
</table>
<?php echo form_close();?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div> */?>
<!-- modal end -->		
 
							<!-- PROPERTIES LISTING : end -->
							<script type="text/javascript">
								$(document).ready(function(){
									var infa=$("#infant").val();
									var adults=$("#adults").val();
									var childs=$("#children").val();
									var ad_cost = <?php echo intval($package['package_cost_adult']);?>;
									var ch_cost = <?php echo intval($package['package_cost_child']);?>;
									var inf_cost = <?php echo intval($package['package_cost_infant']);?>;

									if(infa=='Infant')
										infa=0;
									if(childs=='Children')
										childs=0;
									if(adults=='Adults')
										adults=0;

									var tot_cost = (adults * ad_cost) + (childs * ch_cost) +  (infa * inf_cost);
									$("#cost_span").text(tot_cost);
									$("#cost_hidden").val(tot_cost);	
									
								$(".person").change(function(){
									var adult=$("#adults").val();
									var child=$("#children").val();
									var inf=$("#infant").val();
									var package_id=$("#package_id").val();
									if(inf=='Infant')
										inf=0;
									if(child=='Children')
										child=0;
									if(adult=='Adults')
										adult=0;	
									if(inf == 0 && adult == 0 && child == 0)	{
										$('.sub_btn').hide();
										$("#cost_span").text(0);
										$("#cost_hidden").val(0);
									}else{
										$('.sub_btn').show();
									}
										
									$.ajax({
										type:"POST",
										url:"<?php echo base_url();?>index.php/package/calculate_cost",
										data:{'adult':adult,'child':child,'infant':inf,'package_id':package_id},
										dataType:"json",
										success:function(data){
											if(data.result != '' && typeof data.result == 'number'){
												$('.sub_btn').show();
												$("#cost_span").text(data.result);
												$("#cost_hidden").val(data.result);
												$("#cost_hidden_1").val(data.result);
												$("#cost_hidden_2").text(data.result);
												$('#error_div').empty().hide();
											}
											if(data.error_msg != '' && typeof data.error_msg != 'undefined') {
												$('#error_div').show();
												$("#cost_span").text('0');
												$('.sub_btn').hide();
												$('#error_div').empty().html(data.error_msg);
											}
										}
									});	
									});
									
								});

function open_popup()
{
	var adult=$("#adults").val();
	var child=$("#children").val();
	var inf=$("#infant").val();
	var pkg_cost = $("#cost_hidden").val();
	$("#cost_hidden_1").val(pkg_cost);
	$("#cost_hidden_2").text(pkg_cost);
	if(inf=='Infant')
		inf=0;
	if(child=='Children')
		child=0;
	if(adult=='Adults')
		adult=0;
	$('#infant_1').val(inf);
	$('#infant_2').empty().text(inf);
	$('#adults_1').val(adult);
	$('#adults_2').empty().text(adult);
	$('#children_1').val(child);
	$('#children_2').empty().text(child);
	$('#confirmation').modal();
}
							</script>
								
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- MAIN WRAPPER : end -->

	</div>
<aside id="bottom-panel">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">

					<!-- ABOUT WIDGET : begin -->
					<div class="widget about-widget">
						<div class="widget-content">
							<p><img src="dummies/logo_footer.png" alt="Casa"></p>
							<p>Casa is a modern way of planning and spending your vacation. Enjoy your holiday the best you can!</p>
						</div>
					</div>
					<!-- ABOUT WIDGET : end -->

				</div>
				<div class="col-sm-3">

					<!-- LINKS WIDGET : begin -->
					<div class="widget links-widget">
						<h3 class="widget-title"><span>Quick Links</span></h3>
						<div class="widget-content">
							<div class="row">
								<div class="col-md-6">
									<ul class="custom-list">
										<li><a href="#">Home</a></li>
										<li><a href="#">Browse</a></li>
										<li><a href="#">About Us</a></li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul class="custom-list">
										<li><a href="#">Register</a></li>
										<li><a href="#">Login</a></li>
										<li><a href="#">Add Offer</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- LINKS WIDGET : end -->

				</div>
				<div class="col-sm-3">

					<!-- TWITTER WIDGET : begin -->
					<div class="widget twitter-widget loading">
						<h3 class="widget-title">
							<span>Latest Tweets</span>
							<span class="tweet-nav">
								<span class="tweet-nav-prev"><i class="fa fa-chevron-left"></i></span>
								<span class="tweet-nav-next"><i class="fa fa-chevron-right"></i></span>								</span>							</h3>
						<div class="widget-content">
							<div class="twitter-feed paginated" data-id="uouapps" data-limit="3" data-interval="0"><span class="loading-anim"><span></span></span></div>
						</div>
					</div>
					<!-- TWITTER WIDGET : end -->

				</div>
				<div class="col-sm-3">

					<!-- NEWSLETTER WIDGET : begin -->
					<div class="widget newsletter-widget">
						<h3 class="widget-title"><span>Newsletter</span></h3>
						<div class="widget-content">
							<p>Sign up for our newsletter!</p>
							<form class="default-form" action="index.html">
								<p class="alert-message warning"><i class="ico fa fa-exclamation-circle"></i> Valid email is required!</p>
								<div class="input-group">
									<input class="required email" type="text" placeholder="Email address ...">
									<button><i class="fa fa-plus-circle"></i></button>
								</div>
							</form>
						</div>
					</div>
					<!-- NEWSLETTER WIDGET : end -->

				</div>
			</div>
		</div>
	</aside>