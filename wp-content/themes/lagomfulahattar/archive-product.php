<?php
get_header();

get_template_part('navbar'); ?>

<main>
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	do_action( 'woocommerce_archive_description' );
	?>
	
<?php
		while ( have_posts() ) {
			the_post();
				
 } ?>
</main>
<?php get_footer();