<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delicious Recipes</title>

    <link rel="stylesheet" href="/commun files/HeaderStyles.css" />
    <link rel="stylesheet" href="/commun files/slideShow.css" />
    <link rel="stylesheet" href="/commun files/RecipeCardStyles.css" />
    <link rel="stylesheet" href="/commun files/footer.css" />
  </head>
  <body>
    <header>
      <h1>Yummy Recipe</h1>
            <form class="search-form" action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search recipes/categories" />
        <button type="submit" name="submit-search">Search</button>
      </form>
      <nav>
        <ul>
          <li><a href="Home.php" class="active">Home</a></li>
          <li><a href="contactUs.html">Contact Us</a></li>
          <li><a href="viewProfile.php">View Profile</a></li>
          <li><a href="addRecipe.php">Add Recipe</a></li>
          <li><a href="/signedInWebsite/logOut.php">Log Out</a></li>
        </ul>
      </nav>
    </header>
    <main>
          <section class="mySlides">
      <div class="slideshow-container">
        <div class="slideContent">
          <div
            class="img+title"
            style="width: 25%; margin-left: 15%; margin-bottom: 10%;"
          >
            <img
              class="fade"
              src="/images/img1 (1).jpg"
              style="margin-left: 15%;"
            />
            <div class="text translate">VIBRANT<br />& WHOLESOME</div>
          </div>
          <div class="description">
            <div class="intro">
              <h1>CRAFTED CULINARY CREATIONS</h1>
              <br />
              <h2>WHERE EVERY RECIPE TELLS A STORY</h2>
            </div>
            <p class="descriptionText">
            Dive into a world of vibrant flavors and wholesome ingredients with our collection of recipes, designed to nourish your body and delight your senses.
            </p>

          </div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
    </section>
    <section class="mySlides">
      <div class="slideshow-container">
        <div class="slideContent">
          <div
            class="img+title"
            style="width: 35%; margin-left: 15%; margin-bottom: 10%;"
          >
            <img class="fade" src="/images/img2 (1).jpg" style="margin-left: 15%;" />
            <div class="text translate">Satisfying<br />& Fresh</div>
          </div>
          <div class="description">
            <div class="intro">
              <h1>CRAFTED CULINARY CREATIONS</h1>
              <br />
              <h2>WHERE EVERY RECIPE TELLS A STORY</h2>
            </div>
            <p class="descriptionText">
              Experience the satisfaction of a well-rounded meal bursting with freshness, as our recipes provide a delicious blend of flavors and nutritious ingredients to leave you feeling revitalized.
            </p>
          </div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
    </section>
    <section class="mySlides">
      <div class="slideshow-container">
        <div class="slideContent">
          <div
            class="img+title"
            style="width: 35%; margin-left: 15%; margin-bottom: 10%;"
          >
            <img
              class="fade"
              src="/images/img4 (1).jpg"
              style="margin-left: 15%;"
            />
            <div class="text translate">Delicious <br />& Nutritious</div>
          </div>
          <div class="description">
            <div class="intro">
              <h1>CRAFTED CULINARY CREATIONS</h1>
              <br />
              <h2>WHERE EVERY RECIPE TELLS A STORY</h2>
            </div>
            <p class="descriptionText">
            Our recipes strike the perfect balance between flavor and nourishment, ensuring each bite is both delicious and packed with essential nutrients for your well-being.
            </p>

          </div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
    </section>
<?php
      require_once("../commun files/GetRecipes.php");
      getMainPosts();
      ?>

    </main>


  </body>
  <footer>
      <div class="footer-container">
        <div class="footer-icons">
          <img src="/images/instagram.png" alt="ig" class="footer-icon" />
          <img src="/images/facebook.png" alt="fb" class="footer-icon" />
          <img src="/images/youtube.png" alt="yt" class="footer-icon" />
          <img src="/images/twitter.png" alt="tw" class="footer-icon" />
        </div>
        <h1 class="copyrights">Copyrights © 2024 All Rights Reserved. YUMMY RECIPE.</h1>
      </div>
    </footer>
    <script src="/commun files/home.js"></script>

</html>