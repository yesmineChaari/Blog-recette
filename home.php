<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delicious Recipes</title>
    <link rel="stylesheet" href="HeaderStyles.css" />
    <link rel="stylesheet" href="RecipeCardStyles.css" />
  </head>
  <body>
    <header>
      <h1>Yummy Recipe</h1>
      <nav>
        <ul>
          <li><a href="home.php" class="active">Home</a></li>
          <li><a href="contactUs.php">Contact Us</a></li>
          <li><a href="#">Sign In</a></li>
          <li><a href="#">Sign Up</a></li>
        </ul>
      </nav>
    </header>

    <main>
      

<?php
      require_once("getRecipes.php");
      getMainPosts();
      ?>

    </main>


  </body>
</html>
