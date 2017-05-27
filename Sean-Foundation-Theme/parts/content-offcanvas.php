<div class="off-canvas position-left" id="off-canvas"  data-off-canvas  data-position="left">
		<div id="sidebar-mobile" role="complementary">

			<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
				<ul class="offcanvas-menu">
				<a href="<?php echo home_url(); ?>"><li><h1>Sportainment</h1></li></a>
					<button id="offcanvas-close" data-close><li>Close Menu<span class="fa fa-times" aria-hidden="true"></span></li><button data-close>
				</ul>
				<?php dynamic_sidebar( 'sidebar2' ); ?>

				<ul class="header-social">
					<li><a href="#"><i class="fi-social-twitter"></i></a></li>
					<li><a href="#"><i class="fi-social-instagram"></i></a></li>
					<li><a href="#"><i class="fi-social-youtube"></i></a></li>
				</ul>

			<?php endif; ?>

		</div>
</div>
