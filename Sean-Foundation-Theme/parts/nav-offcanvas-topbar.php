<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->
<div class="top-bar-right show-for-large large-12">
		<ul class="header-social">
			<li><a href="https://www.facebook.com/SportainmentTV/"><i class="fa fa-facebook-square fa-md"></i></a></li>
			<li><a href="https://twitter.com/Sportainment_TV"><i class="fa fa-twitter-square fa-md"></i></a></li>
			<li><a href="https://www.instagram.com/sportainment_Tv/"><i class="fa fa-instagram fa-md"></i></a></li>
			<li><a href="https://www.youtube.com/channel/UCUW3wXNmcf6nsIMvfDTEIaQ"><i class="fa fa-youtube-square fa-md"></i></a></li>
		</ul>
	</div>
<div class="top-bar" id="top-bar-menu">
	
	<div class="top-bar-left">
		<a class="logo"  href="<?php echo home_url(); ?>">
  			<span class="fa fa-play-circle fa-lg"></span>
  			Sportainment
		</a>
	

			<?php dynamic_sidebar( 'sidebar1' ); ?>

	
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>	
	</div>
	<div id="toggle-menu" class="top-bar-right show-for-small hide-for-large">
		<a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?><!--<span class="fi-list"></span>--></a>	
	</div>
</div>