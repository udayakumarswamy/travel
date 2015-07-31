<?php 
if($postfix=='')
									  	$folder='';
									  else
									  	$folder='ar/';
?>
<!-- CORE : begin -->
		<div id="core" class="page-property-details">

			<!-- PAGE HEADER : begin -->
			<div class="page-header">
				<div class="container">
					<div class="page-header-inner clearfix">
						<h1><?php echo $package['package_title'];?></h1>
						<ul class="custom-list breadcrumbs">
							<li><a href="#"><?php echo $this->lang->line('home');?></a> / </li>
							<li><a href="#"><?php echo $this->lang->line('search_result');?></a> /</li>
							<li><a href="#"><?php echo $this->lang->line('property_details');?></a></li>
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
							<div class="col-md-8 col-md-push-4">

								<!-- PROPERTY DETAILS : begin -->
								<div class="property-details">

									<!-- PROPERTY IMAGES : begin -->
									<div class="property-images">
										<div class="image-list">
											<?php 
											
											foreach($package_images as $img){?>
											<div class="image"><img src="<?php echo base_url();?>uploads/<?php echo $img['image_files'];?>" alt="Short photo description should go right here"></div>
											<?php } ?>
										</div>
										<div class="images-footer">
											<div class="images-footer-inner">
												<div class="image-description"></div>
												<div class="image-counter"></div>
											</div>
											<button class="prev-btn"><i class="fa fa-chevron-left"></i></button>
											<button class="next-btn"><i class="fa fa-chevron-right"></i></button>
										</div>
									</div>
									<!-- PROPERTY IMAGES : end -->

									<div class="row">
										<div class="col-md-8">

											<!-- PROPERTY DESCRIPTION : begin -->
											<div class="property-description">

												<!-- DESCRIPTION TEXT : begin -->
												<div class="description-text">
													<h4><?php echo $this->lang->line('description');?></h4>
													<p><?php echo stripslashes($package['package_desc']);?></p>
													
												</div>
												<!-- DESCRIPTION TEXT : end -->

												<!-- TABS : begin -->
												<div class="tabs-container">
													<ul class="tab-title-list">
														<li class="tab-title active"><a href="#information"><?php echo $this->lang->line('information');?></a></li>
														<li class="tab-title"><a href="#reviews"><?php echo $this->lang->line('reviews');?></a></li>
													</ul>
													<ul class="tab-content-list">

														<!-- INFORMATION TAB : begin -->
														<li class="tab-content active" id="information">

															<div class="row">
																<div class="col-lg-12">
																	<table>
																		<tr>
																			<td><?php echo $this->lang->line('cost_per_adult');?></td>
																			<td class="textalign-right">$<?php echo $package['package_cost_adult'];?></td>
																		</tr>
																		<tr>
																			<td><?php echo $this->lang->line('cost_per_child');?></td>
																			<td class="textalign-right">$<?php echo $package['package_cost_child'];?></td>
																		</tr>
																		<tr>
																			<td><?php echo $this->lang->line('cost_per_infant');?></td>
																			<td class="textalign-right">$<?php echo $package['package_cost_infant'];?></td>
																		</tr>
																	</table>
																</div>
																
															</div>

														</li>
														<!-- INFORMATION TAB : end -->

														<!-- COMMENTS TAB : begin -->
														<li class="tab-content">

															<div class="comments">
																<ul class="custom-list comment-list">

																	<!-- COMMENT 1 : begin -->
																	<li class="comment">
																		<div class="author"><strong>Jenny &amp; Tom </strong> - <span class="date">Nov. 14, 2013</span></div>
																		<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></div>
																		<div class="review">
																			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi.</p>
																		</div>
																	</li>
																	<!-- COMMENT 1 : end -->

																	<!-- COMMENT 2 : begin -->
																	<li class="comment">
																		<div class="author"><strong>Tom &amp; Jerry </strong> - <span class="date">Nov. 4, 2013</span></div>
																		<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
																		<div class="review">
																			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi.</p>
																		</div>
																	</li>
																	<!-- COMMENT 2 : end -->

																	<!-- COMMENT 3 : begin -->
																	<li class="comment">
																		<div class="author"><strong>Kate </strong> - <span class="date">Nov. 1, 2013</span></div>
																		<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
																		<div class="review">
																			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi.</p>
																		</div>
																	</li>
																	<!-- COMMENT 3 : end -->

																</ul>
															</div>

														</li>
														<!-- COMMENTS TAB : end -->

													</ul>
												</div>
												<!-- TABS : end -->

											</div>
											<!-- PROPERTY DESCRIPTION : end -->

										</div>
										<div class="col-md-4">

											<!-- PROPERTY PANEL : begin -->
											<div class="property-panel">

												<!-- OBJECT PRICE : begin -->
												<div class="panel-item object-price">
													<h4 class="panel-item-title"><?php echo $this->lang->line('price');?></h4>
													<p class="price"><?php echo $this->lang->line('from');?> <strong>$<?php echo round($package['package_cost_adult']);?></strong></p>
													<button class="button submit-btn reserve"  data-package="<?php echo $package['package_id'];?>" data-country="<?php echo $package['country_id'];?>" ><i class="fa fa-check"></i><?php echo $this->lang->line('make_reservation');?></button>		
												</div>
												<!-- OBJECT PRICE : end -->

												

												<!-- BOOK FORM : begin -->
												
												<!-- BOOK FORM : end -->

											</div>
											<!-- PROPERTY PANEL : end -->

										</div>
									</div>

								</div>
								<!-- PROPERTY DETAILS : end -->

							</div>
							<div class="col-md-4 col-md-pull-8">

								<!-- PROPERTY LOCATION DETAILS : begin -->
								<aside class="property-location-details">
									<h3 class="property-location-title"><?php echo $this->lang->line('location_details');?></h3>

									<!-- PROPERTY MAP : begin -->
									<!--<div class="property-map">
										<iframe src="https://maps.google.com/maps?q=32.524526,-117.12392&amp;num=1&amp;ie=UTF8&amp;ll=32.514104,-117.110953&amp;spn=0.007843,0.013937&amp;t=m&amp;z=14&amp;output=embed"></iframe>
										<a href="#" class="map-btn"><i class="fa fa-search-plus"></i></a>
									</div>-->
									<!-- PROPERTY MAP : end -->

									<!-- PROPERTY INFO : begin -->
									<div class="property-info">
										

										<!-- ADDRESS : begin -->
										<div class="toggle-container property-address">
											<h5 class="toggle-title"><?php echo $this->lang->line('country');?></h5>
											<div class="toggle-content">

												<p><?php echo $package['country'];?></p>

											</div>
										</div>
										<!-- ADDRESS : end -->

										

										<!-- ADDITIONAL : begin -->
										<div class="toggle-container property-additional">
											<h5 class="toggle-title"><?php echo $this->lang->line('package_include');?></h5>
											<div class="toggle-content">

												<ul class="custom-list check-list">
													<?php $pkg_include=explode('~',$package['amenities']);
													  foreach($pkg_include as $k=>$v){?>

													  <li><?php echo $v;?></li>
													<?php  } ?>
												</ul>

											</div>
										</div>
										<!-- ADDITIONAL : end -->

									</div>
									<!-- PROPERTY INFO : end -->

								</aside>
								<!-- PROPERTY LOCATION DETAILS : end -->

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- MAIN WRAPPER : end -->

		</div>
		<!-- CORE : end -->

		<!-- BOTTOM PANEL : begin -->
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
									<span class="tweet-nav-next"><i class="fa fa-chevron-right"></i></span>
								</span>
							</h3>
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
		<script type="text/javascript">
										$(".reserve").click(function(e){
											var country_id=$(this).data('country');
											var package_id=$(this).data('package');
											var adults=0;
											var children=0;
											var param=package_id+'/'+country_id+'/'+adults+'/'+children;
											
											window.location="<?php echo base_url();?>index.php/<?php echo $folder;?>package/book_my_package/"+param;
										});
									</script>
		<!-- BOTTOM PANEL : end -->