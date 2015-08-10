<div id="core" class="page-about-us">

			<!-- PAGE HEADER : begin -->
			<div class="page-header has-nav">
				<div class="container">
					<div class="page-header-inner">
						<h1><?php echo $title; ?></h1>
						<ul class="custom-list breadcrumbs">
							<li><a href="index.html"><?php echo $this->lang->line('home'); ?></a> / </li>
							<li><a href="<?php echo base_url('index.php/aboutus'); ?>"><?php echo $title; ?></a></li>
						</ul>
						<nav class="page-header-nav">
							<ul class="custom-list clearfix">
								<li><a href="<?php echo base_url('index.php/aboutus'); ?>"><?php echo $this->lang->line('about_us'); ?></a></li>
								<li><a href="<?php echo base_url('index.php/contactus'); ?>"><?php echo $this->lang->line('contact_us'); ?></a></li>
								<li><a href="<?php echo base_url('index.php/privacypolicy'); ?>"><?php echo $this->lang->line('privacy_policy'); ?></a></li>
								<li class="active"><a href="<?php echo base_url('index.php/termsconditions'); ?>"><?php echo $this->lang->line('terms_and_conditions'); ?></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- PAGE HEADER : end -->

			<!-- CONTENT SECTION : begin -->
			<section class="content-section">
				<div class="container">

					<div class="row">
						<div class="col-sm-12">

							<h2><?php echo $title; ?></h2>
							<?php echo htmlspecialchars_decode($content); ?>

						</div>
					</div>

				</div>
			</section>
			<!-- CONTENT SECTION : end -->


		</div>