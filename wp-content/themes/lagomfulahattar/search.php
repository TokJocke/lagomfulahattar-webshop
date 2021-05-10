<?php get_header(); ?>  


<?php get_template_part('navbar'); ?>


<main>

<div id="policy-div"">


<?php while (have_posts()) {
        the_post();
 ?>
        <h1>
        <?php
        the_title();
        ?> 
        </h1>

        <p id="myContent">
        <?php
        the_content();
        ?> 
        </p>

<?php
}
?>
</div>
</main>




<?php get_footer(); ?>  