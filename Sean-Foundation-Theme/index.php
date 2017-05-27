<?php get_header(); ?>
	
	<div id="content">
	
		<div id="inner-content" class="row">
	
	 		
		    
		    <main class="large-8 columns" id="main" role="main">
		    	

		    	<?php
		    	/*
		    		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
			    	$args = array (
					    'post_type'              => 'post',
					    'post_status' => 'published',
					    'paged' => $paged
					);

					$query = new WP_Query( $args );
					*/
		    	?>
			 	
				<?php get_template_part( 'parts/loop', 'main-post' ); ?>
			 		
			 	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 		<?php get_template_part( 'parts/loop', 'archive' ); ?>	
			 	<?php endwhile; endif; ?>
						
			 	
					
					
					

					
	
					
				
						

																								
		    </main> <!-- end #main -->
		   			
			 			<?php get_sidebar(); ?>
			 		
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>