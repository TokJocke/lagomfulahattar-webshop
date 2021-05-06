<?php get_header(); ?>  
<?php get_template_part('navbar');?>





<main class="alignCard">
  <h2 class="mainTitle"><?= wp_title("");?></h2> 
<?php
  while(have_posts()){
    the_post();
    ?>

<article id="book" onClick="location.href='<?php the_permalink();?>'" class="card">
  <div class="photoDiv">
    <img class="postThumbnail" src="<?= get_the_post_thumbnail_url(); ?>" >
  </div>
  <div class="desc">
      <?= get_the_date('Y-d-m'); ?>
      <div class="newsTitle">
        <h1><?php the_title(); ?></h1>
      </div>
      <p><?php the_excerpt(); ?></p>
    </div>
    </article>

    <?php } ?>
</main>





<?php get_footer(); ?>  