<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="/commun files/contactUsStyles.css" />
    <link rel="stylesheet" href="/commun files/HeaderStyles.css" />
    <link rel="stylesheet" href="/commun files/slideShow.css" />
    <link rel="stylesheet" href="/commun files/footer.css" />
  </head>
  <body>
    <header>
      <h1>Yummy Recipe</h1>
      <nav>
        <ul>
          <li><a href="home.php" class="active">Home</a></li>
          <li><a href="contactUs.html">Contact Us</a></li>
          <li><a href="viewProfile.php">View Profile</a></li>
            <li><a href="addRecipe.php">Add Recipe</a></li>
          <li><a href="/signedInWebsite/logOut.php">Log out</a></li>
        </ul>
      </nav>
    </header>

    <div class="container">
      <h1 class="title">Add Recipe</h1>
      <form action="add-process.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Recipe name :</label>
          <input type="text" id="name" name="name" />
        </div>
        <div class="form-group">
          <label for="name">Description :</label>
          <input type="text" id="description" name="description" />
        </div>
        <div class="form-group">
          <label for="ingredients">Ingredients :</label>
          <input type="text" id="ingredients" name="ingredients" />
        </div>
        <div class="form-group">
          <label for="steps">Steps :</label>
          <input type="text" id="steps" name="steps" />
        </div>
        <div class="form-group">
          <label for="imgName">image name :</label>
          <input type="text" id="imgName" name="imgName" />
        </div>
        <div class="form-group">
      <label for="image">Image :</label>
      <input type="file" id="image" name="image" accept="image/*" />
    </div>
        <button type="submit" name="btn-sent" value="Upload">Submit</button>
      </form>
    </div>
  </body>
  <footer>
    <div class="footer-container">
      <div class="footer-icons">
        <img src="images/instagram.png" alt="ig" class="footer-icon" />
        <img src="images/facebook.png" alt="fb" class="footer-icon" />
        <img src="images/youtube.png" alt="yt" class="footer-icon" />
        <img src="images/twitter.png" alt="tw" class="footer-icon" />
      </div>
      <h1 class="copyrights">
        Copyrights © 2024 All Rights Reserved. YUMMY RECIPE.
      </h1>
    </div>
  </footer>
</html>
