<?php get_header(); ?>  




<?php get_template_part('navbar'); ?>




<main class="align-center margin-left">
<div class="main-content">

<?php
 
 
  
 while ( have_posts() ) {
     the_post();
     the_content();
 }
  
 ?>
  
    
</div>
</main>






<?php get_footer(); ?>  