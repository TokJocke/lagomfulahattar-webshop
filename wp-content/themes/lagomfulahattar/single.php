<?php get_header(); ?>  
<?php get_template_part('navbar'); ?>





<main class="aligncard">
<?php
  while(have_posts()){
    the_post();
    ?>

<article class="singlePost">
   <h1><?php the_title(); ?></h1>
   <p><?php the_date(); ?></p>
   <div class="theBlogContent">
      <?php the_content() ?>
  </div>
  <?php wp_link_pages(); ?> 
    <?php } ?>
  </article>

</main>





<?php get_footer(); ?>  