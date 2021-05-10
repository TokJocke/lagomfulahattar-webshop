<?php get_header(); ?>  

<?php get_template_part('navbar'); ?>

	<main>
		<div>
			<?php while ( have_posts() ) : ?> 
				<?php the_post(); ?>
			
				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>
		</div>
	</main>
	
<?php get_footer(); 

