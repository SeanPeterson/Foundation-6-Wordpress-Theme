					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="large-12 medium-12 columns">
								<nav role="navigation">
		    						<?php joints_footer_links(); ?>
		    					</nav>
		    				</div>
		    				<div class='partners-footer large-4 medium-4 columns'>
		    				<p>Partners with</p>
		    					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner-logo.png" alt="partner-logo" />
		    				</div>
							<div class="copy-footer large-4 medium-4 columns">
								<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
								<a href="mailto:CYH.information@gmail.com?Subject=Hello%20again" target="_top"><i class="step fi-mail"></i></a>
							</div>
							<div class="author medium-push-1 medium-3 columns">
								<p>Website Designed and Developed by:</p>
								<a href="http://seanpetersonwebdesign.com/">Sean Peterson</a>
							</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .main-content -->
			</div> <!-- end .off-canvas-wrapper-inner -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->