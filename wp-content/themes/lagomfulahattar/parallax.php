


<?php
 
$loop = new WP_Query( array('post_type' => 'parallax', 'posts_per_page' => 10 ) ); 
 
while ( $loop->have_posts() ) : $loop->the_post();
 
?>
 
    <div class="parallax">
        <h1><?php the_title(); ?> </h1>
        <?php the_post_thumbnail() ?>
    </div>
 
<?php endwhile; ?>