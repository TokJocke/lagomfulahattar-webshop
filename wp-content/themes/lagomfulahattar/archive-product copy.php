<?php get_header(); ?>  


<?php get_template_part('navbar'); ?>




<main>
<ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 6
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</ul><!–/.products–>

</main>






<?php get_footer(); ?>  