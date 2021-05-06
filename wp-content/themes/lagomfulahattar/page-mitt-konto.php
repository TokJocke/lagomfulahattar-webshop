<?php get_header(); ?>  


<?php get_template_part('navbar'); ?>




<section id="account-section">


<?php get_template_part('parallax'); ?>

<div id="mitt-konto">


<?php while (have_posts()) {
        the_post();
        the_content();
} ?>

</div>




</section>






<?php get_footer(); ?>  