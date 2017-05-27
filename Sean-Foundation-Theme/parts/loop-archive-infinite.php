<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="horizontal-article" id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
				<?php if(has_post_thumbnail()) : ?>
					<a style='background-image: url("<?php the_post_thumbnail_url($size = 'full'); ?>")' class="segue" href='<?php the_permalink(); ?>'></a>
				<?php else :?>
					<a style='background-image: url("<?php echo get_template_directory_uri(); ?>/assets/images/post-fallback.png")' class="segue" href='<?php the_permalink(); ?>'></a>
				<?php endif; ?>		
				<header class="article-header">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><h2><?php the_title(); ?></h2></a>
					<?php get_template_part( 'parts/content', 'byline' ); ?>
				</header> <!-- end article header -->

				<section class="entry-content" itemprop="articleBody">
					<p><?php echo custom_excerpt(); ?></p>
				</section> <!-- end article section -->

				<footer class="article-footer">
			    	<a class="read-more-link" href="<?php the_permalink() ?>"><span class="fa fa-play-circle fa-lg"></span></a>
				</footer> <!-- end article footer -->
				
			</article>


<?php endwhile; endif; ?>