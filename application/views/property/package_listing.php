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
						<?php if($total_rows=='')
									$total_rows=0;
						?>			
						<h1><?php echo $this->lang->line('search_result');?>- <?php echo $total_rows;?> <?php echo $this->lang->line('packages_found');?></h1>
						<ul class="custom-list breadcrumbs">
							<li><a href="#"><?php echo $this->lang->line('home');?></a> / </li>
							<li><a href="#"><?php echo $this->lang->line('search_result');?></a></li>
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

								<!-- PROPERTIES LISTING : begin -->
								<div class="properties-listing">

									<!-- PROPERTIES LISTING HEADER : begin -->
									<div class="properties-listing-header clearfix">

										<!-- LIST SORTING : begin -->
										<div class="list-sorting">
											<form class="default-form">
												<input type="hidden" name="country_id" id="country_id" value="<?php echo $package_country;?>"/>
												<input type="hidden" name="country_name" id="country_name" value="<?php echo $package_country_name;?>"/>
												<input type="hidden" name="arr_date" id="arr_date" value="<?php echo $arr_date;?>"/>
												<input type="hidden" name="dept_date" id="dept_date" value="<?php echo $dept_date;?>"/>
												<input type="hidden" name="adult" id="adult" value="<?php echo $adult;?>"/>
												<input type="hidden" name="children" id="children" value="<?php echo $children;?>"/>
												
												<h5><?php echo $this->lang->line('sort_by');?></h5>
												<div class="row">
												<div class="col-md-6">
													<select name="sort-alphabetical" id="sort-alpha">
														<option value="asc">A to Z</option>
														<option value="desc">Z to A</option>
													</select></div>
												<div class="col-md-6">
														<select name="sort-price" id="sort-price">
														<option value="asc"><?php echo $this->lang->line('price');?> &uarr;</option>
														<option value="desc"><?php echo $this->lang->line('price');?> &darr;</option>
														</select>
												</div>	
												<div class="clearfix"></div>
												</div>
												<!--<span class="select-box">
													<select name="sort-rating" >
														<option value="asc">Rating &uarr;</option>
														<option value="desc">Rating &darr;</option>
													</select>
												</span>
-->												
													
												
											</form>
										</div>
										<script type="text/javascript">
											$("#sort-alpha").change(function(){
												$.ajax({
														type:"POST",
														url:"<?php echo base_url();?>index.php/package/search_package_ajax",
														data:{'country_id':$("#country_id").val(),'country_name':$("#country_name").val(),'arr_date':$("#arr_date").val(),'dept_date':$("#dept_date").val(),'adults':$("#adults").val(),'children':$("#children").val(),'sort':$(this).val(),'sort_type':'alpha'},
														success:function(data){
															$("#package_list").html(data);
														}
												});
											});
										</script>
										<script type="text/javascript">
											$("#sort-price").change(function(){
												$.ajax({
														type:"POST",
														url:"<?php echo base_url();?>index.php/package/search_package_ajax",
														data:{'country_id':$("#country_id").val(),'country_name':$("#country_name").val(),'arr_date':$("#arr_date").val(),'dept_date':$("#dept_date").val(),'adults':$("#adults").val(),'children':$("#children").val(),'sort':$(this).val(),'sort_type':'price'},
														success:function(data){
															$("#package_list").html('');
															$("#package_list").html(data);
														}
												});
											});
										</script>
										<!-- LIST SORTING : end -->

										<!-- LIST LAYOUT : begin -->
										<div class="list-layout">
											<button class="button active" data-layout="grid"><i class="fa fa-th"></i></button>
											<button class="button" data-layout="list"><i class="fa fa-list-ul"></i></button>
										</div>
										<!-- LIST LAYOUT : end -->

									</div>
									<!-- PROPERTIES LISTING HEADER : end -->

									<!-- PROPERTY LIST : begin -->
									<ul class="custom-list clearfix property-list layout-grid" id="package_list">

										<!-- PROPERTY 1 : begin -->
										
										<?php
										 $i=1; 
										 
										 foreach($package as $p){
										 $class='property';
										 
										 if($i==1){
										 	$class=$class.' first-in-row odd';
										 }
										 if($i%3==0)
										 {
										 	$class=$class.' odd';
										 }
										 ?>
										<li class="<?php echo $class;?>">
											<a href="<?php echo base_url();?>index.php/<?php echo $folder;?>package/package_details/<?php echo $p['package_id'];?>" class="property-thumb">
												<img src="<?php echo base_url();?>uploads/<?php echo $p['is_featured_image'];?>" alt="">
												<span class="overlay"><span><i class="fa fa-search"></i> View More</span></span>
											</a>
											<div class="property-content">
												<h4 class="property-title"><a href="<?php echo base_url();?>index.php/<?php echo $folder;?>package/package_details/<?php echo $p['package_id'];?>"><?php echo stripslashes($p['package_title']);?></a></h4>
												<h5 class="property-location"><?php echo $p['package_country'];?></h5>
												<p class="property-description"><?php echo substr(stripslashes($p['package_desc']),0,120);?></p>
													<div class="property-price-rating">
													<div class="property-price"><strong>$ <?php echo $p['total_cost'];?></strong></div>
													<!--<div class="property-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
-->												</div>
												
												<button class="button submit-btn reserve"  data-package="<?php echo $p['package_id'];?>"><i class="fa fa-check"></i> <?php echo $this->lang->line('make_reservation');?></button>	
											</div>
										</li>
										<?php 
										
										$i++;
										if($i%4==0){
											$i=1;
										}
										} ?>
										<!-- PROPERTY 1 : end -->


									</ul>
									<!-- PROPERTY LIST : end -->
									<script type="text/javascript">
										$(".reserve").click(function(e){
											var country_id=$("#country_id").val();
											var arr_date=$("#arr_date").val();
											
											var dept_date=$("#dept_date").val();
											var adults=$("#adult").val();
											var children=$("#children").val();
											var package_id=$(this).data('package');
											var param=package_id+'/'+country_id+'/'+encodeURI(arr_date)+'/'+encodeURI(dept_date)+'/'+adults+'/'+children;
											
											window.location="<?php echo base_url();?>index.php/package/book_my_package/"+param;
										});
									</script>
									<!-- PROPERTIES LISTING FOOTER : begin -->
									<!-- <div class="properties-listing-footer clearfix">
										<div class="default-form">
											<span class="select-box links">
												<select name="listing-pagination">
													<option value="properties-listing-grid.html?page=1">Page 1</option>
													<option value="properties-listing-grid.html?page=2">Page 2</option>
													<option value="properties-listing-grid.html?page=3">Page 3</option>
													<option value="properties-listing-grid.html?page=4">Page 4</option>
													<option value="properties-listing-grid.html?page=5">Page 5</option>
													<option value="properties-listing-grid.html?page=6">Page 6</option>
													<option value="properties-listing-grid.html?page=7">Page 7</option>
													<option value="properties-listing-grid.html?page=8">Page 8</option>
													<option value="properties-listing-grid.html?page=9">Page 9</option>
													<option value="properties-listing-grid.html?page=10">Page 10</option>
												</select>
											</span>
										</div>
									</div> -->
									<!-- PROPERTIES LISTING FOOTER : end -->

								</div>
								<!-- PROPERTIES LISTING : end -->

							</div>
							<div class="col-md-4 col-md-pull-8">

								<!-- PROPERTIES SEARCH : begin -->
								<aside class="properties-search">
									<h3 class="properties-search-title"><?php echo $this->lang->line('search_filter');?></h3>

									<!-- PROPERTIES SEARCH BASIC : begin -->
									<div class="properties-search-basic">

										<!-- TYPE : begin -->
										<p class="form-row textalign-center default-form properties-search-type">
											<!--<span class="radio-input">
												<input id="filter_type_swap" type="radio" name="filter_type" value="swap" data-type="swap" checked="checked">
												<label for="filter_type_swap">Swap</label>
											</span>
											<span class="radio-input">
												<input id="filter_type_book" type="radio" name="filter_type" value="book" data-type="book">
												<label for="filter_type_book">Book</label>
											</span>
											<span class="radio-input">
												<input id="filter_type_rent" type="radio" name="filter_type" value="rent" data-type="rent">
												<label for="filter_type_rent">Rent</label>
											</span>-->
										</p>
										<!-- TYPE : end -->

										<!-- FORM SWAP : begin -->
										<?php $attributes=array('id'=>'properties-search-form-swap','class'=>'default-form', 'method'=>'GET');
											
											 echo form_open('index.php/'.$folder.'package/search_package', $attributes);
										?>
											<input type="hidden" id="cn_id" name="cn_id"  value="<?php echo $package_country;?>"/>
											<!-- SEARCH INPUT : begin -->
											<p class="search-input">
												<select name="country" data-placeholder="<?php echo $this->lang->line('destination_country');?>">
													<option value="">Select Country</option>
													<?php
													foreach ($countries as $key => $country) {
														?>
														<option value="<?php echo $key; ?>" <?php echo ($key == $package_country) ? 'selected' : '' ; ?>><?php echo $country; ?></option>
														<?php
													}
													?>
												</select>
												<!-- <input type="text" name="country" id="c_id" placeholder="Destination Country" value="<?php echo $package_country_name;?>">
												<div id="suggesstion-box" style=" position: absolute;left: 50px;top:175px;z-index: 100000; background-color:#fff;width:70%; padding-left:10px; color:#666666"></div> -->
											</p>
											<!-- SEARCH INPUT : end -->
											<script type="text/javascript">
									/*$(document).ready(function(){
										$("#c_id").keyup(function(){
											
											$.ajax({
											type: "POST",
											url: "<?php echo base_url();?>index.php/landing/get_country_by_abv",
											data:'keyword='+$(this).val(),
											beforeSend: function(){
												$("#c_id").css("background","#fff url(LoaderIcon.gif) no-repeat 165px");
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
									
									$("#c_id").val(val);
									$("#cn_id").val(id);
									$("#suggesstion-box").hide();
									
									}*/
								</script>
											<!-- ARRIVAL DATE, DEPARTURE DATE : begin -->
											<p class="form-row clearfix">
												<span class="calendar-input input-left" title="Departure">
													<?php 
														  $new_dept_date= date('m/d/Y', strtotime($dept_date));
													?>	 
													<input type="text" name="departure" placeholder="Departure" data-dateformat="m/d/yy" value="<?php echo $new_dept_date;?>">
													<i class="fa fa-calendar"></i>
												</span>
												<span class="calendar-input input-right" title="Arrival">
													<?php 
														  $new_arr_date=date('m/d/Y', strtotime($arr_date));
													?>	  
													<input type="text" name="arrival" placeholder="Arrival" data-dateformat="m/d/yy" value="<?php echo $new_arr_date;?>">
													<i class="fa fa-calendar"></i>
												</span>
											</p>
											<!-- ARRIVAL DATE, DEPARTURE DATE : end -->

											<!-- NUMBER OF ADULTS AN CHILDREN : begin -->
											<p class="form-row clearfix">
												<span class="select-box1 input-left" title="Adults" value='1'>
													<select name="adults" data-placeholder="Adults">
														<option><?php echo $this->lang->line('adults');?></option>
														<?php
														for ($i=1; $i <= 5; $i++) { 
															?>
														<option value="<?php echo $i; ?>" <?php if($adult == $i) { echo "selected"; } ?>><?php echo $i; ?></option>
															<?php
														}
														?>
													</select>
												</span>
												<span class="select-box1 input-right" title="Children">
													<select name="children" data-placeholder="Children">
														<option><?php echo $this->lang->line('children');?></option>
														<?php
														for ($i=1; $i <= 5; $i++) { 
															?>
														<option value="<?php echo $i; ?>" <?php if($children == $i) { echo "selected"; } ?>><?php echo $i; ?></option>
															<?php
														}
														?>
														</select>
												</span>
											</p>
											<!-- NUMBER OF ADULTS AN CHILDREN : end -->

											<p class="form-row">
												<button class="button submit-btn"><i class="fa fa-search"></i><?php echo $this->lang->line('search');?></button>
											</p>

										</form>
										<!-- FORM SWAP : begin -->

										<!-- FORM BOOK : begin -->
										<form class="default-form" action="index.html" id="properties-search-form-book" style="display: none;">

											<!-- SEARCH INPUT : begin -->
											<p class="search-input">
												<input type="text" placeholder="Where do you want to book?">
											</p>
											<!-- SEARCH INPUT : end -->

											<!-- ARRIVAL DATE, DEPARTURE DATE : begin -->
											<p class="form-row clearfix">
												<span class="calendar-input input-left" title="Arrival">
													<input type="text" name="arrival" placeholder="Arrival" data-dateformat="m/d/y">
													<i class="fa fa-calendar"></i>
												</span>
												<span class="calendar-input input-right" title="Departure">
													<input type="text" name="departure" placeholder="Departure" data-dateformat="m/d/y">
													<i class="fa fa-calendar"></i>
												</span>
											</p>
											<!-- ARRIVAL DATE, DEPARTURE DATE : end -->

											<!-- NUMBER OF ADULTS AN CHILDREN : begin -->
											<p class="form-row clearfix">
												<span class="select-box input-left" title="Adults">
													<select name="adults" data-placeholder="Adults">
														<option><?php echo $this->lang->line('adults');?></option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</span>
												<span class="select-box input-right" title="Children">
													<select name="children" data-placeholder="Children">
														<option><?php echo $this->lang->line('children');?></option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</span>
											</p>
											<!-- NUMBER OF ADULTS AN CHILDREN : end -->

											<p class="form-row">
												<button class="button submit-btn"><i class="fa fa-search"></i> <?php echo $this->lang->line('search');?></button>
											</p>

										</form>
										<!-- FORM BOOK : begin -->

										<!-- FORM RENT : begin -->
										<form class="default-form" action="index.html" id="properties-search-form-rent" style="display: none;">

											<!-- SEARCH INPUT : begin -->
											<p class="search-input">
												<input type="text" placeholder="Where do you want to rent?">
											</p>
											<!-- SEARCH INPUT : end -->

											<!-- ARRIVAL DATE, DEPARTURE DATE : begin -->
											<p class="form-row clearfix">
												<span class="calendar-input input-left" title="Arrival">
													<input type="text" name="arrival" placeholder="Arrival" data-dateformat="m/d/y">
													<i class="fa fa-calendar"></i>
												</span>
												<span class="calendar-input input-right" title="Departure">
													<input type="text" name="departure" placeholder="Departure" data-dateformat="m/d/y">
													<i class="fa fa-calendar"></i>
												</span>
											</p>
											<!-- ARRIVAL DATE, DEPARTURE DATE : end -->

											<!-- NUMBER OF ADULTS AN CHILDREN : begin -->
											<p class="form-row clearfix">
												<span class="select-box input-left" title="Adults">
													<select name="adults" data-placeholder="Adults">
														<option>Adults</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</span>
												<span class="select-box input-right" title="Children">
													<select name="children" data-placeholder="Children">
														<option>Children</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</span>
											</p>
											<!-- NUMBER OF ADULTS AN CHILDREN : end -->

											<p class="form-row">
												<button class="button submit-btn"><i class="fa fa-search"></i> Search</button>
											</p>

										</form>
										<!-- FORM RENT : begin -->

									</div>
									<!-- PROPERTIES SEARCH BASIC : end -->

									<hr class="form-divider">

									<!-- PROPERTIES SEARCH FILTER : begin -->
									<div class="properties-search-filter">
										<form class="default-form" action="index.html">

											<h4 class="filter-title"><?php echo $this->lang->line('filter_results');?></h4>

											<!-- PRICE FILTER : begin -->
											<!-- <div class="price-filter toggle-container">
												<h5 class="toggle-title"><?php echo $this->lang->line('by_price');?></h5>
												<div class="toggle-content">

													<div class="slider-range-container">
														<div class="slider-range" data-min="1000" data-max="50000" data-step="1000" data-default-min="1000" data-default-max="50000" data-currency="$"></div>
														<script type="text/javascript">
														 $(document).ready(function(){
															$(".range-to").change(function(){
																// alert('A');
															});
														 });	
														</script>
														<div class="clearfix">
															<input type="text" class="range-from" value="$1000">
															<input type="text" class="range-to" id="aa" value="$ 50000">
														</div>
													</div>

												</div>
											</div> -->
											<!-- PRICE FILTER : end -->

											<!-- RATING FILTER : begin -->
											<!--<div class="rating-filter toggle-container">
												<h5 class="toggle-title">By Rating</h5>
												<div class="toggle-content">

													<ul class="custom-list rating-filter-list">
														<li>
															<span class="checkbox-input">
																<input type="checkbox" id="rating-filter-5star" checked="checked">
																<label for="rating-filter-5star">
																	<span class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span>
																	<span class="label">5 stars</span>
																</label>
															</span>
														</li>
														<li>
															<span class="checkbox-input">
																<input type="checkbox" id="rating-filter-4star">
																<label for="rating-filter-4star">
																	<span class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></span>
																	<span class="label">4 stars</span>
																</label>
															</span>
														</li>
														<li>
															<span class="checkbox-input">
																<input type="checkbox" id="rating-filter-3star">
																<label for="rating-filter-3star">
																	<span class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
																	<span class="label">3 stars</span>
																</label>
															</span>
														</li>
														<li>
															<span class="checkbox-input">
																<input type="checkbox" id="rating-filter-2star">
																<label for="rating-filter-2star">
																	<span class="stars"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
																	<span class="label">2 stars</span>
																</label>
															</span>
														</li>
														<li>
															<span class="checkbox-input">
																<input type="checkbox" id="rating-filter-1star">
																<label for="rating-filter-1star">
																	<span class="stars"><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
																	<span class="label">1 star</span>
																</label>
															</span>
														</li>
													</ul>

												</div>
											</div>-->
											<!-- RATING FILTER : end -->

											<!-- ADDITIONAL FILTER : begin -->
											<div class="additional-filter toggle-container">
												<h5 class="toggle-title"><?php echo $this->lang->line('additional');?></h5>
												<div class="toggle-content">

													<ul class="custom-list additional-filter-list">
														<script type="text/javascript">
															$(document).ready(function(){
															$("input[name='additional']").click(function(){
																var filter='';
																$("input[name='additional']").each(function(){
																	if($(this).is(":checked")){
																	if(filter=='')
																		filter=$(this).val();
																	else
																		filter+='~'+$(this).val();
																	}		
																});
																$.ajax({
																			type:"POST",
																			url:"<?php echo base_url();?>index.php/package/search_package_ajax",
																			data:{'country_id':$("#country_id").val(),'country_name':$("#country_name").val(),'arr_date':$("#arr_date").val(),'dept_date':$("#dept_date").val(),'adults':$("#adults").val(),'children':$("#children").val(),'filter':filter},
																			success:function(data){
																				$("#package_list").html(data);
																			}
																	});
																});
															});
														 </script>
														 <?php foreach($amenities as $k=>$v){?>
														<li>
															<span class="checkbox-input">
																<input type="checkbox" name="additional" id="additional-filter-<?php echo $v['id'];?>" value="<?php echo $v['amenities_value'];?>">
																<label for="additional-filter-<?php echo $v['id'];?>"><?php echo $v['amenities_value'];?></label>
															</span>
														</li>
														<?php } ?>
														
														
													</ul>

												</div>
											</div>
											<!-- ADDITIONAL FILTER : end -->

										</form>
									</div>
									<!-- PROPERTIES SEARCH FILTER : end -->

								</aside>
								<!-- PROPERTIES SEARCH : end -->

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