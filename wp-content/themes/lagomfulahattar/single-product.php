<?php get_header(); ?>  


<?php get_template_part('navbar'); ?>

	<main>

	<?php
	
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : ?> 
			<?php the_post(); ?>
		
			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	
	</main>
	
<?php get_footer(); 

