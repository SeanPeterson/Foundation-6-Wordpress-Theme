<?php
/*
 * Template Name: Contact Page
 */
?>
<?php get_header(); ?>
			
	<div id="content" class="contact-page">	
		<div id="inner-content" class="row">    
		    <main class="large-8 columns" id="main" role="main">

	 			<h1>Contact</h1>
	 			<h3>Get in touch with Sportainment!</h3>
	 			<?php echo do_shortcode("[contact-form to='lindsay@sportainment.ca ' subject='Sportainment Contact Form'][contact-field label='Name' type='name' required='1'/][contact-field label='Email' type='email' required='1'/][contact-field label='Comment' type='textarea' required='1'/][/contact-form] "); 
	 			?>
																											
		    </main> <!-- end #main -->

			<?php get_sidebar(); ?>
	
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>