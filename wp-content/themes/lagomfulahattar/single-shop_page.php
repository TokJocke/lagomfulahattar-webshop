




<?php get_template_part('navbar'); ?>




<main>

<!-- <div class="parallax" style="background-image: url(https://www.geeklawblog.com/wp-content/uploads/sites/528/2018/12/liprofile-656x369.png)">parallax</div>
<div class="parallax" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMArkDtDBsV7chcoxZTsDBr9xUkWH4hd7wpg&usqp=CAU)">parallax</div>
<div class="parallax" style="background-color:yellow;"> -->
<?php
 
 $loop = new WP_Query( array('post_type' => 'shop_page', 'posts_per_page' => 10 ) ); 
  
 while ( $loop->have_posts() ) : $loop->the_post();
  
 ?>
  
     <div class="parallax">
         <h1><?php the_title(); ?> </h1>
         <?php the_post_thumbnail(); ?>
         <?php the_content(); ?>

     </div>
  
 <?php endwhile; ?>
 <?php get_header(); ?>  



</div>

</main>






<?php get_footer(); ?>  