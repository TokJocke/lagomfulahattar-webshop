<?php get_header(); ?>  


<?php get_template_part('navbar'); ?>





<main class="kassaMargin">
  <h2 class="mainTitle"><?= wp_title("");?></h2> 
<?php
  while(have_posts()){
    the_post();
    ?>
  <?php do_action('robbans_hook') ?>

    <div class="kassaThecontent">
      <?php the_content(); ?>
    </div>


    <?php } ?>


</main>






<?php get_footer(); ?>  