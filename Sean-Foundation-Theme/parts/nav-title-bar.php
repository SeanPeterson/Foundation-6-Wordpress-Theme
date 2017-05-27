<?php
// Adjust the breakpoint of the title-bar by adjusting this variable
$breakpoint = "medium"; ?>

<div class="title-bar" data-responsive-toggle="top-bar-menu" data-hide-for="<?php echo $breakpoint ?>">
  		<a href="<?php echo home_url(); ?>"><h1>Sportainment</h1></a>
</div>

<div class="top-bar" id="top-bar-menu">
	<div class="top-bar-left show-for-<?php echo $breakpoint ?>">
		<ul class="menu">
			<li><a href="<?php echo home_url(); ?>"><h2>Sportainment</h2></a></li>
		</ul>
	</div>
	<div class="top-bar-right">
	<ul class="header-social">
		<li><a href="#"><i class="fi-social-twitter"></i></a></li>
		<li><a href="#"><i class="fi-social-instagram"></i></a></li>
		<li><a href="#"><i class="fi-social-youtube"></i></a></li>
	</ul>
		<?php joints_top_nav(); ?>
	</div>
</div>