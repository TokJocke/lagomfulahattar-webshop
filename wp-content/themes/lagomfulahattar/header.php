<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lagom fula hattar</title>
    <script src="https://kit.fontawesome.com/1a5335e8b8.js" crossorigin="anonymous"></script>
 
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



   </header>
 <!--    <main> -->