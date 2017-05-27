
<div class="banner-post" >
	<div class="banner-image-section">
		
		<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
		  <ul class="orbit-container">
		    <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
		    <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>

		    <?php 

			$args = array(
			        'post_type' => 'featured_post',
			        'post_status ' => 'publish',
			        'order' => 'ASC',
			        'posts_per_page' => -1,
			    );

			// The Query
			$the_query = new WP_Query( $args );

			?>
			<?php $counter = 0; //so we know the is-active post ?>
		    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			    <li class='<?php if($counter == 0){echo "is-active ";} ?>orbit-slide'>
				    <?php if(has_post_thumbnail()) : ?>
				    	<a style='background-image: url("<?php the_post_thumbnail_url($size = 'full'); ?>")' href='<?php the_permalink(); ?>'></a>
				    <?php else : ?>
				    	<a style='background-image: url("<?php echo get_template_directory_uri(); ?>/assets/images/post-fallback.png")' href='<?php the_permalink(); ?>'></a>
				    <?php endif; ?>
			      <figcaption class="orbit-caption"><?php the_excerpt(); ?></figcaption>
			    </li>

			<?php $counter++; ?>
			<?php endwhile; ?>

		  </ul>
		  <nav class="orbit-bullets">
		  	<?php for($i = 0; $i < $counter; $i++): ?>

		  		<?php if($i == 0) : ?>
			    	<button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
			    <?php else : ?>
			    	<button data-slide='<?php echo $i; ?>'><span class="show-for-sr">slide details.</span></button>
				<?php endif; ?>

			<?php endfor; ?>
		  </nav>		  
		</div>
	</div>
	
</div>