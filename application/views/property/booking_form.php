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
					<div id="main-wrapper">
						<div class="row">
							<div class="col-md-12">

								<!-- PROPERTIES LISTING : begin -->
								<div class="properties-listing">

									<div class="row">
										<div class="col-md-6" style="margin-left:100px;">
											<h3><?php echo $this->lang->line('make_reservation_now');?></h3>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6" style="margin-left:30px">
										<div class="panel-item book-form">
													<?php $attributes=array('class'=>"default-form");?>
													<?php echo form_open("index.php/".$folder."package/checkout",$attributes);?>
														
														<input type="hidden" name="package_id" id="package_id" value="<?php echo $package['package_id'];?>" />
														<h4><?php echo stripslashes($package['package_title']);?></h4>
														<h4><?php echo $country['country'];?></h4>
														
														<p class="form-row">
															
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
															
																<h4><?php echo $this->lang->line('total_package_cost');?>:<span style="color:#CC0033">$</span><span id="cost_span" style="color:#CC0033"><?php echo $total_cost=$adults*$package['package_cost_adult']+ $children*$package['package_cost_child'];?></span></h4>
																<input type="hidden" name="cost_hidden" id="cost_hidden" value="<?php echo $total_cost;?>" />
															
														</p>
														
														<p class="form-row">
															<button class="button submit-btn"><i class="fa fa-check"></i><?php echo $this->lang->line('make_reservation');?></button>
														</p>
													<?php echo form_close();?>
												</div>
										</div>	
										
										<div class="col-md-4" style="margin-left:100px">
										<div class="panel-item">
														<h4><?php echo $this->lang->line('package_details');?></h4>
														<!-- <h4><?php echo $country['country'];?></h4> -->
														
														<p class="form-row">
															<h4><?php echo $this->lang->line('arrival_date');?>:<span id="cost_span" style="color:#999"> <?php echo stripslashes($package['dept_date']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('departure_date');?>:<span id="cost_span" style="color:#999">  <?php echo stripslashes($package['arr_date']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('cost_per_adult');?>:<span style="color:#999"> $</span><span id="cost_span" style="color:#999"><?php echo stripslashes($package['package_cost_adult']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('cost_per_child');?>:<span style="color:#999"> $</span><span id="cost_span" style="color:#999"><?php echo stripslashes($package['package_cost_child']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('cost_per_infant');?>:<span style="color:#999"> $</span><span id="cost_span" style="color:#999"><?php echo stripslashes($package['package_cost_infant']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('amenities');?>:<span id="cost_span" style="color:#999"> 
																<?php echo str_replace("~",", ",stripslashes($package['amenities']));?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('country');?>:<span id="cost_span" style="color:#999"> <?php echo stripslashes($package['country']);?></span></h4>
														</p>
														<p class="form-row">
															<h4><?php echo $this->lang->line('description');?>:<span id="cost_span" style="color:#999"> <?php echo stripslashes($package['package_desc']);?></span></h4>
														</p>
												</div>
										</div>			
									</div>

								</div>
								<!-- PROPERTIES LISTING : end -->
								<script type="text/javascript">
									$(document).ready(function(){
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
											
											
										$.ajax({
											type:"POST",
											url:"<?php echo base_url();?>index.php/package/calculate_cost",
											data:{'adult':adult,'child':child,'infant':inf,'package_id':package_id},
											dataType:"json",
											success:function(data){
												$("#cost_span").text(data.result);
												$("#cost_hidden").val(data.result);
											}
										});	
										});
										
									});
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