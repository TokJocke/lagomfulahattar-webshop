<?php get_header(); ?>  




<?php get_template_part('navbar'); ?>




<main>

<!-- <div class="parallax" style="background-image: url(https://www.geeklawblog.com/wp-content/uploads/sites/528/2018/12/liprofile-656x369.png)">parallax</div>
<div class="parallax" style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMArkDtDBsV7chcoxZTsDBr9xUkWH4hd7wpg&usqp=CAU)">parallax</div>
<div class="parallax" style="background-color:yellow;"> -->
<?php
 
 $loop = new WP_Query( array('post_type' => 'shop_page', 'posts_per_page' => 10 ) ); 
  
 while ( $loop->have_posts() ) : $loop->the_post();
  
 ?>
  
     <div class="shop-content" >
         <h1 class="shop-title"><?php the_title(); ?> </h1>
        
        <div class="taxo-list">
            <?php  
            $terms = get_terms(
                array(
                    'taxonomy'   => 'shop_content',
                    'hide_empty' => false,
                    )
                );
                
                // Check if any term exists
                if ( ! empty( $terms ) && is_array( $terms ) ) {
                    // Run a loop and print them all
                    foreach ( $terms as $term ) { ?>
            
            <a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
                <?php echo $term->name; ?>
            </a><?php
            }
        } 
        ?>
         </div>
        <div class="taxo-content">
            <div class="taxo-info">
                <?php 
                    the_archive_description(); 
                ?>
            </div>
            <div class="taxo-map">
                <?php the_content(); ?>
            </div>
        </div>
         

     </div>
    
 <?php endwhile; ?>
 



</div>

</main>






<?php get_footer(); ?>  