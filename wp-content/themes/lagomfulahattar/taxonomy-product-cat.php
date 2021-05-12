<?php get_header(); ?>
<?php get_template_part('navbar'); ?>
<div class="content">
	<?php
		do_action( 'woocommerce_before_main_content' );
	?>
		
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'product' ); ?>

		<?php endwhile; // end of the loop. ?>
		
	<?php
		do_action( 'woocommerce_after_main_content' );
	?>

</div>

<?php
get_footer();
?>