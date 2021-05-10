<?php
 
$loop = new WP_Query( array('post_type' => 'shop_coupon', 'posts_per_page' => 10, 'orderby' => 'date', 'order' => 'ASC' )); 
 
while ( $loop->have_posts() ) : $loop->the_post();
 
?>
    <h1><?php the_title();?></h1>
<?php the_excerpt();?>


<!-- Googla products category with discount/group discount/bogo / wp commerce -->
<?php endwhile; ?>