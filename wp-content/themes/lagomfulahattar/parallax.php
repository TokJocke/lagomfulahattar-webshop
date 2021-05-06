


<?php
 
$loop = new WP_Query( array('post_type' => 'parallax', 'posts_per_page' => 10, 'orderby' => 'date', 'order' => 'ASC' )); 
 
while ( $loop->have_posts() ) : $loop->the_post();
 
?>
 
    <div class="parallax" style="background-image: url(<?= get_the_post_thumbnail_url();?>)">
        <div class="paraBox">
            <h1><?php the_title();?></h1>        
            <?php the_content();?>
        </div>
       
        <i class="fas fa-arrow-down bounce"></i> 
    </div>
  
<?php endwhile; ?>

