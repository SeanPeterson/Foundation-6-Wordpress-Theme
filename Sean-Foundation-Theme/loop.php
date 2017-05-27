<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="content">
	
		<div id="inner-content" class="row">
		 		
			 <?php get_sidebar(); ?>
				    
			
				<article class="post-tile" id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
					<img src="http://lorempixel.com/1920/1000/sports" />					
					<header class="article-header">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<?php get_template_part( 'parts/content', 'byline' ); ?>
					</header> <!-- end article header -->
									
					<section class="entry-content" itemprop="articleBody">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
						<?php echo custom_excerpt(); ?>
					</section> <!-- end article section -->
										
					<footer class="article-footer">
				    	<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
					</footer> <!-- end article footer -->				    						
				</article> <!-- end article -->
			
			   
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
<?php endwhile; endif; ?>