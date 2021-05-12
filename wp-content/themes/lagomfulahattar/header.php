<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagom fula hattar</title>
    <script src="https://kit.fontawesome.com/1a5335e8b8.js" crossorigin="anonymous"></script> <!-- Borde flyttas till function -->
 
     <?php wp_head(); ?>
</head>

<body>
   <header id="topHeader">

      <div class="headerDiv">
         <a class="logo" href="<?=get_bloginfo("url");?>">
            <h2><?=get_bloginfo("name");?></h2> 
         </a>
         <?php dynamic_sidebar("search_bar"); ?>
      </div>



      <div class="mobileHeaderDiv">

         <div id="menuDropDown" class="fas fa-bars">
         
         </div>

         <div id="mobileLogoWrapper">
            <div class="mobileLogo">
               <?php dynamic_sidebar("logo"); ?>
            </div>
         </div>
              
      </div>
      



   </header>
 <!--    <main> -->