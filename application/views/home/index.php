		<!-- BANNER : begin -->
		<div id="banner">

			<!-- BANNER BG : begin -->
			<div class="banner-bg">
				<div class="banner-bg-item"><img src="<?php echo base_url();?>assets/dummies/banner_bg_01.jpg" alt=""></div>
				<div class="banner-bg-item"><img src="<?php echo base_url();?>assets/dummies/banner_bg_02.jpg" alt=""></div>
				<div class="banner-bg-item"><img src="<?php echo base_url();?>assets/dummies/banner_bg_03.jpg" alt=""></div>
			</div>
			<!-- BANNER BG : end -->	

			<!-- BANNER SEARCH : begin -->
			<div class="banner-search">
				<div class="container">
					<div class="banner-search-inner">
						<ul class="custom-list tab-title-list clearfix">
							<li class="tab-title active" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="#swap" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('search_heading');?></a></li>
							
						</ul>
						<ul class="custom-list tab-content-list">

							<!-- SWAP : begin -->
							<li class="tab-content active">
								<?php $attributes=array('class'=>'default-form','method' =>'GET');
									  if($postfix=='')
									  	$folder='';
									  else
									  	$folder='ar/';		
								      echo form_open('index.php/'.$folder.'package/search_package', $attributes);
								?>	  

									<!-- SEARCH INPUT : begin -->
									<span class="search-input">
										<select name="country" data-placeholder="<?php echo $this->lang->line('destination_country');?>">
											<option value="">Select Country</option>
											<?php
											foreach ($countries as $key => $country) {
												?>
												<option value="<?php echo $key; ?>"><?php echo $country; ?></option>
												<?php
											}
											?>
										</select>
										<!-- <input type="text" id="country_id" name="country" placeholder="<?php echo $this->lang->line('destination_country');?>" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>>
										<div id="suggesstion-box" style=" position: absolute;left: 25px;top:50px;z-index: 100000; background-color:rgba(0,0,0,0.5);width:25%; padding-left:10px; color:#FFFFFF"></div>
										<input type="hidden" name="cn_id" id="cn_id" value=""/> --> 
									</span>
									<!-- SEARCH INPUT : end -->

									<!-- ARRIVAL DATE : begin -->
									<span class="calendar-input input-left" title="Arrival">
										<input type="text" name="departure" placeholder="<?php echo $this->lang->line('departure_date');?>" data-dateformat="m/d/yy" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>>
										<i class="fa fa-calendar"></i>
										
									</span>
									<!-- ARRIVAL DATE : end -->

									<!-- DEPARTURE DATE : begin -->
									<span class="calendar-input input-right" title="Departure">
										<input type="text" name="arrival" placeholder="<?php echo $this->lang->line('arrival_date');?>" size="20" data-dateformat="m/d/yy" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>>
										<i class="fa fa-calendar"></i>
									</span>
									<!-- DEPARTURE DATE : end -->

									<!-- ADULTS : begin -->
									<span class="select-box" title="Adults">
										<select name="adults" data-placeholder="<?php echo $this->lang->line('adults');?>" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>>
											<option>Adults</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</span>
									<!-- ADULTS : end -->

									<!-- CHILDREN : begin -->
									<span class="select-box" title="Children">
										<select name="children" data-placeholder="<?php echo $this->lang->line('child');?>">
											<option>Children</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</span>
									<!-- CHILDREN : end -->

									<!-- SUBMIT : begin -->
									<span class="submit-btn">
										<button class="button" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><i class="fa fa-search"></i> <?php echo $this->lang->line('search');?></button>
									</span>
									<!-- SUBMIT : end -->

								<?php echo form_close();?>
							</li>
							<!-- SWAP : end -->

							<!-- BOOK : begin -->
							<li class="tab-content">
								<form class="default-form" action="index.html">

									<!-- SEARCH INPUT : begin -->
									<span class="search-input">
										<input type="text" placeholder="Where do you want to book?">
									</span>
									<!-- SEARCH INPUT : end -->

									<!-- ARRIVAL DATE : begin -->
									<span class="calendar-input input-left" title="Arrival">
										<input type="text" name="arrival" placeholder="Arrival" data-dateformat="m/d/y">
										<i class="fa fa-calendar"></i>
									</span>
									<!-- ARRIVAL DATE : end -->

									<!-- DEPARTURE DATE : begin -->
									<span class="calendar-input input-right" title="Departure">
										<input type="text" name="departure" placeholder="Departure" data-dateformat="m/d/y">
										<i class="fa fa-calendar"></i>
									</span>
									<!-- DEPARTURE DATE : end -->

									<!-- ADULTS : begin -->
									<span class="select-box" title="Adults">
										<select name="adults" data-placeholder="Adults">
											<option>Adults</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</span>
									<!-- ADULTS : end -->

									<!-- CHILDREN : begin -->
									<span class="select-box" title="Children">
										<select name="children" data-placeholder="Children">
											<option>Children</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</span>
									<!-- CHILDREN : end -->

									<!-- SUBMIT : begin -->
									<span class="submit-btn">
										<button class="button"><i class="fa fa-search"></i> Search</button>
									</span>
									<!-- SUBMIT : end -->

								</form>
								<script type="text/javascript">
									$(document).ready(function(){
										$("#country_id").keyup(function(){
											
											$.ajax({
											type: "POST",
											url: "<?php echo base_url();?>index.php/landing/get_country_by_abv",
											data:'keyword='+$(this).val(),
											beforeSend: function(){
												$("#country_id").css("background","#241C1F url(LoaderIcon.gif) no-repeat 165px");
											},
											success: function(data){
												$("#suggesstion-box").show();
												$("#suggesstion-box").html(data);
												
											}
											});
										});
									});
									//To select country name
									function selectCountry(val,id) {
									
									$("#country_id").val(val);
									$("#cn_id").val(id);
									$("#suggesstion-box").hide();
									
									}
								</script>
							</li>
							<!-- BOOK : end -->

							<!-- RENT : begin -->
							<li class="tab-content">
								<form class="default-form" action="index.html">

									<!-- SEARCH INPUT : begin -->
									<span class="search-input">
										<input type="text" placeholder="Where do you want to rent?">
									</span>
									<!-- SEARCH INPUT : end -->

									<!-- ARRIVAL DATE : begin -->
									<span class="calendar-input input-left" title="Arrival">
										<input type="text" name="arrival" placeholder="Arrival" data-dateformat="m/d/y">
										<i class="fa fa-calendar"></i>
									</span>
									<!-- ARRIVAL DATE : end -->

									<!-- DEPARTURE DATE : begin -->
									<span class="calendar-input input-right" title="Departure">
										<input type="text" name="departure" placeholder="Departure" data-dateformat="m/d/y">
										<i class="fa fa-calendar"></i>
									</span>
									<!-- DEPARTURE DATE : end -->

									<!-- ADULTS : begin -->
									<span class="select-box" title="Adults">
										<select name="adults" data-placeholder="Adults">
											<option>Adults</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</span>
									<!-- ADULTS : end -->

									<!-- CHILDREN : begin -->
									<span class="select-box" title="Children">
										<select name="children" data-placeholder="Children">
											<option>Children</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</span>
									<!-- CHILDREN : end -->

									<!-- SUBMIT : begin -->
									<span class="submit-btn">
										<button class="button"><i class="fa fa-search"></i> Search</button>
									</span>
									<!-- SUBMIT : end -->

								</form>
							</li>
							<!-- RENT : end -->

						</ul>
					</div>
				</div>
			</div>
			<!-- BANNER SEARCH : end -->

		</div>
		<!-- BANNER : end -->

		<!-- CORE : begin -->
		<div id="core">

			<!-- CONTENT SECTION - SERVICES : begin -->
			<section class="content-section services">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">

							<!-- SERVICE 1 : begin -->
							<div class="service-container">
								<p class="service-icon"><i class="fa fa-refresh"></i></p>
								<h3 class="service-title">Swap House</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in.</p>
								<p><a href="#" class="button"><i class="fa fa-refresh"></i> Get Started!</a></p>
							</div>
							<!-- SERVICE 1 : end -->

						</div>
						<div class="col-sm-4">

							<!-- SERVICE 2 : begin -->
							<div class="service-container">
								<p class="service-icon"><i class="fa fa-book"></i></p>
								<h3 class="service-title">Book a Stay</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in.</p>
								<p><a href="#" class="button"><i class="fa fa-book"></i> Get Started!</a></p>
							</div>
							<!-- SERVICE 2 : end -->

						</div>
						<div class="col-sm-4">

							<!-- SERVICE 3 : begin -->
							<div class="service-container">
								<p class="service-icon"><i class="fa fa-money"></i></p>
								<h3 class="service-title">Rent</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in.</p>
								<p><a href="#" class="button"><i class="fa fa-money"></i> Get Started!</a></p>
							</div>
							<!-- SERVICE 3 : end -->

						</div>
					</div>
				</div>
			</section>
			<!-- CONTENT SECTION - SERVICES : end -->

			<!-- BROWSE : begin -->
			<section id="browse">
				<div class="container">
					<h2 <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?> style="width:10%"><?php echo $this->lang->line('browse');?></h2>
					<div class="browse-inner">
						<div class="tabs-container browse-tabs-container">
							<ul class="custom-list tab-title-list">
								<li class="tab-title active" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="#featured-properties" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('featured_package');?></a></li>
								<li class="tab-title"><a href="#top-destinations" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?> ><?php echo $this->lang->line('top_destination');?></a></li>
								<li class="tab-title"><a href="#our-members" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('our_members');?></a></li>
							</ul>
							<ul class="custom-list tab-content-list browse-contents">
								<li class="tab-content active">

									<!-- BROWSE PROPERTIES : begin -->
									<div class="browse-properties">

										
										<ul class="custom-list tab-content-list">
											<li class="tab-content active">
												<div class="browse-destinations">
												  <?php 
												  $i=1;
												  $j=0;
												  foreach($featured as $f){?>
													<?php if($i==1){?>
													<div class="row">
													<?php } ?>
														<div class="col-sm-4">
			
															<!-- TOP DESTINATION 1 : begin -->
															<div class="top-destination">
																<img class="destination-thumb" src="<?php echo base_url();?>uploads/<?php echo $f['is_featured_image'];?>" alt="">#
																<div class="top-destination-inner">
																	<h3><?php echo stripslashes($f['package_title']);?></h3>
																	<a href="<?php echo base_url();?>index.php/package/package_details/<?php echo $f['package_id'];?>" class="button"><i class="fa fa-list-ul"></i> Browse</a>
																</div>
															</div>
															<!-- TOP DESTINATION 1 : end -->
			
														</div>
														
													<?php 
													$j++;$i++;
													if($i%4==0 && $j==3){?>
													</div>
													<?php  
													$j=0;
													$i=1;
													} 
													}
													?>
													
												</div>
											</li>
											
										
										</ul>

									</div>
									<!-- BROWSE PROPERTIES : end -->

								</li>
								<li class="tab-content">

									<!-- BROWSE DESTINATIONS : begin -->
									<div class="browse-destinations">

										<?php 
												  $i=1;
												  $j=0;
												  foreach($destination as $d){?>
													<?php if($i==1){?>
													<div class="row">
													<?php } ?>
														<div class="col-sm-4">
			
															<!-- TOP DESTINATION 1 : begin -->
															<div class="top-destination">
																<img class="destination-thumb" src="<?php echo base_url();?>uploads/<?php echo $d['country_pic'];?>" alt="">
																<div class="top-destination-inner">
																	<h3><?php echo stripslashes($d['country']);?></h3>
																	<a href="#" class="button"><i class="fa fa-list-ul"></i> Browse</a>
																</div>
															</div>
															<!-- TOP DESTINATION 1 : end -->
			
														</div>
														
													<?php 
													$j++;$i++;
													if($i%4==0 && $j==3){?>
													</div>
													<?php  
													$j=0;
													$i=1;
													} 
													}
													?>

									</div>
									<!-- BROWSE DESTINATIONS : end -->

								</li>
								<li class="tab-content">

									<!-- BROWSE MEMBERS : begin -->
									<div class="browse-members">

										<!-- BROWSE MEMBERS HEADER : begin -->
										<div class="browse-members-header clearfix">

											<!-- SEARCH : begin -->
											<div class="browse-members-search">
												<form action="index.html" class="default-form">
													<input type="text">
													<button><i class="fa fa-search"></i></button>
												</form>
											</div>
											<!-- SEARCH : end -->

											<!-- PAGINATION : begin -->
											<div class="browse-members-pagination">
												<form action="index.html" class="default-form">
													<span class="select-box">
														<select name="adults">
															<option value="1">Page 1</option>
															<option value="2">Page 2</option>
															<option value="3">Page 3</option>
															<option value="4">Page 4</option>
															<option value="5">Page 5</option>
														</select>
													</span>
												</form>
											</div>
											<!-- PAGINATION : end -->

										</div>
										<!-- BROWSE MEMBERS HEADER : end -->

										<!-- BROWSE MEMBERS LIST : begin -->
										<ul class="custom-list browse-members-list clearfix">

											<!-- MEMBER 1 : begin -->
											<li class="member first-in-row">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_04_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">John Smith</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 1 : end -->

											<!-- MEMBER 2 : begin -->
											<li class="member">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_05_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">John Smith</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 2 : end -->

											<!-- MEMBER 3 : begin -->
											<li class="member">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_06_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">Jane Smith</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 3 : end -->

											<!-- MEMBER 4 : begin -->
											<li class="member">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_07_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">John Smith</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 4 : end -->

											<!-- MEMBER 5 : begin -->
											<li class="member first-in-row-medium">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_08_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">Jane Smith</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 5 : end -->

											<!-- MEMBER 6 : begin -->
											<li class="member">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_09_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">Jane Smith</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 6 : end -->

											<!-- MEMBER 7 : begin -->
											<li class="member first-in-row">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_10_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">John &amp; Jane</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 7 : end -->

											<!-- MEMBER 8 : begin -->
											<li class="member">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_11_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">Felix &amp; Maria</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 8 : end -->

											<!-- MEMBER 9 : begin -->
											<li class="member first-in-row-medium">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_12_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">John Smith</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 9 : end -->

											<!-- MEMBER 10 : begin -->
											<li class="member">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_13_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">John &amp; Jane</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 10 : end -->

											<!-- MEMBER 11 : begin -->
											<li class="member">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_14_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">Jane Smith</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 11 : end -->

											<!-- MEMBER 12 : begin -->
											<li class="member">
												<a href="#" class="member-portrait"><img src="<?php echo base_url();?>assets/dummies/portrait_15_160.jpg" alt=""></a>
												<h4 class="member-name"><a href="#">Jane Smith</a></h4>
												<h5 class="member-place">New York</h5>
											</li>
											<!-- MEMBER 12 : end -->

										</ul>
										<!-- BROWSE MEMBERS LIST : end -->

									</div>
									<!-- BROWSE MEMBERS : end -->

								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- BROWSE : end -->

			<!-- CONTENT SECTION: begin -->
			<section class="content-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							
							<h2 <?php if($postfix!=''){?> dir="rtl" <?php }?>><?php echo $cms_about['cms_page_name'.$postfix];?></h2>
							
							<p <?php if($postfix!=''){?> dir="rtl" <?php }?>><?php echo htmlspecialchars_decode($cms_about['cms_page_content'.$postfix]);?></p>
							<!--<p class="cta-button">
								<a href="#" class="button"><i class="fa fa-heart"></i> Get Started!</a>
							</p>-->

						</div>
						<div class="col-sm-6">

							<p><img src="<?php echo base_url();?>assets/dummies/content_img_01.jpg" alt=""></p>

						</div>
					</div>
				</div>
			</section>
			<!-- CONTENT SECTION : end -->

		</div>
		<!-- CORE : end -->

		<!-- TESTIMONIALS : begin -->
		<div id="testimonials">
			<div class="container">
				<div class="testimonials-inner">

					<!-- TESTIMONIAL LIST : begin -->
					<div class="testimonial-list">

						<!-- TESTIMONIAL 1 : begin -->
						<?php foreach($testimonials as $t){?>
						<div class="testimonial">
							<p class="portrait" ><img src="<?php echo base_url();?>assets/dummies/portrait_01_200.jpg" alt="Jenny"></p>
							<blockquote class="quote">
								<p <?php if($postfix!=''){?> dir="rtl" <?php }?>><?php echo stripslashes($t['testimonial_page_content'.$postfix]);?></p>
								<footer><cite <?php if($postfix!=''){?> dir="rtl" <?php }?>><?php echo $t['testimonial_page_name'.$postfix];?></cite></footer>
							</blockquote>
						</div>
						<?php } ?>
						<!-- TESTIMONIAL 1 : end -->

						
						<!-- TESTIMONIAL 3 : end -->

					</div>
					<!-- TESTIMONIAL LIST : end -->

					<!-- NAVIGATION : begin -->
					<div class="navigation">
						<button class="button prev"><i class="fa fa-chevron-left"></i></button>
						<button class="button next"><i class="fa fa-chevron-right"></i></button>
					</div>
					<!-- NAVIGATION : end -->

				</div>
			</div>
		</div>
		<!-- TESTIMONIALS : end -->

		<!-- BOTTOM PANEL : begin -->
		<aside id="bottom-panel">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">

						<!-- ABOUT WIDGET : begin -->
						<div class="widget about-widget">
							<div class="widget-content">
								<p><img src="<?php echo base_url();?>assets/dummies/logo_footer.png" alt="Casa"></p>
								<p>Casa is a modern way of planning and spending your vacation. Enjoy your holiday the best you can!</p>
							</div>
						</div>
						<!-- ABOUT WIDGET : end -->

					</div>
					<div class="col-sm-3">

						<!-- LINKS WIDGET : begin -->
						<div class="widget links-widget">
							<h3 class="widget-title" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><span><?php echo $this->lang->line('quick_links');?></span></h3>
							<div class="widget-content">
								<div class="row">
									<div class="col-md-6">
										<ul class="custom-list">
											<li <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="<?php echo base_url(); ?>" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('home');?></a></li>
											<li <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="<?php echo base_url(); ?>" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('browse');?></a></li>
											<li <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="<?php echo base_url('index.php/aboutus'); ?>" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('about_us');?></a></li>
										</ul>
									</div>
									<div class="col-md-6">
										<ul class="custom-list">
											<li <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="#" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('register');?></a></li>
											<li <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="#" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('login');?></a></li>
											<li <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><a href="#" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('add_offer');?></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- LINKS WIDGET : end -->

					</div>
					<div class="col-sm-3">

						<!-- TWITTER WIDGET : begin -->
						
						<!-- TWITTER WIDGET : end -->

					</div>
					<div class="col-sm-3">

						<!-- NEWSLETTER WIDGET : begin -->
						<div class="widget newsletter-widget">
							<h3 class="widget-title" <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><span><?php echo $this->lang->line('newsletter');?></span></h3>
							<div class="widget-content">
								<p <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>><?php echo $this->lang->line('sign_up_newsletter');?></p>
								<form class="default-form" action="index.html">
									<p class="alert-message warning"><i class="ico fa fa-exclamation-circle"></i> Valid email is required!</p>
									<div class="input-group">
										<input class="required email" type="text" placeholder="<?php echo $this->lang->line('email');?>..." <?php if($this->session->userdata('language')=='arabic'){?> dir="rtl" <?php } ?>>
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
		<!-- BOTTOM PANEL : end -->
