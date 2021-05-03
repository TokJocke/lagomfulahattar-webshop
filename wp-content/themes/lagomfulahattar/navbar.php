


<div id="navMenu">

<div class="logoWrapper">
    <?php dynamic_sidebar("logo"); ?>
</div>

<?php 

    
    wp_nav_menu( [
        'link_before' => 
            '<div class="linkFloor"></div>
            <p class="linkText">',
        'link_after' => '</p>',
        'container_id' => 'sideNav',
    ]); 
    
    
?>

</div> 




