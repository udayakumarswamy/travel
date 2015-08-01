
		<!-- FOOTER : begin -->
		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">

						<!-- FOOTER TEXT : begin -->
						<p>Copyright 2013 &copy; Casa. All rights reserved. Powered by <a href="http://themeforest.net/user/uouapps/portfolio?ref=uouapps">UOUapps</a></p>
						<!-- FOOTER TEXT : end -->

					</div>
					<div class="col-sm-4">

						<!-- FOOTER SOCIAL : begin -->
						<ul class="footer-social custom-list">
							<li><a href="#" title="Facebook"><i class="fa fa-facebook-square"></i><span>Facebook</span></a></li>
							<li><a href="#" title="Twitter"><i class="fa fa-twitter-square"></i><span>Twitter</span></a></li>
							<li><a href="#" title="Google+"><i class="fa fa-google-plus-square"></i><span>Google+</span></a></li>
							<li><a href="#" title="LinkedIn"><i class="fa fa-linkedin-square"></i><span>LinkedIn</span></a></li>
							<li><a href="#" title="Pinterest"><i class="fa fa-pinterest"></i><span>Pinterest</span></a></li>
						</ul>
						<!-- FOOTER SOCIAL : end -->

					</div>
				</div>
			</div>
		</footer>
		<!-- FOOTER : end -->

		<!-- SCRIPTS : begin -->
		
		<script src="<?php echo base_url();?>assets/library/js/jquery.ba-outside-events.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/library/js/jquery.inview.min.js" type="text/javascript"></script>
		<!--[if lte IE 8]>
		<script src="library/js/jquery.placeholder.js" type="text/javascript"></script>
		<![endif]-->
		<script src="<?php echo base_url();?>assets/library/js/owl.carousel.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/library/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/library/twitter/jquery.tweet.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/library/js/scripts.js" type="text/javascript"></script>
		<!-- SCRIPTS : end -->
		<script type="text/javascript">
		function set_session(lang)
		{
			if(lang != '')
			{
				$.ajax({
					type: "POST",
					url: "landing/set_session_lang",
					// url: "<?php echo base_url();?>index.php/landing/set_session_lang",
					data: "language="+lang,
					success: function(msg) {
						location.reload();
						/*if(lang == 'en')
						{
							$('#li_english').addClass('active');
							$('#li_arabic').removeClass('active');
							$('#btn_active').empty().html('EN <i class="fa fa-angle-down"></i>');
						}
						else
						{
							$('#li_arabic').addClass('active');
							$('#li_english').removeClass('active');
							$('#btn_active').empty().html('AR <i class="fa fa-angle-down"></i>');
						}*/
					}
				});
			
			}
		}

		</script>
	</body>
</html>



