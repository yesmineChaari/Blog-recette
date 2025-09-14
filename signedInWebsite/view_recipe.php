
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>
    <link rel="stylesheet" href="/commun files/footer.css" />
    <link rel="stylesheet" href="/commun files/viewRecipeStyles.css" />
    <link rel="stylesheet" href="/commun files/HeaderStyles.css" />
</head>
<body>
    <header>
        <h1>Yummy Recipe</h1>
        <nav>
            <ul>
                <li><a href="homeSignedIn.php">Home</a></li>
                <li><a href="contactUsSignedIn.html">Contact Us</a></li>
                <li><a href="viewProfile.php">View Profile</a></li>
                <li><a href="logOut.php">Log Out</a></li>

            </ul>
        </nav>
    </header>

    <main>
         <?php
        require_once("../commun files/GetRecipes.php");
        if(isset($_GET['recipe_id'])) {
            $recipe_id = $_GET['recipe_id'];
            getRecipeDetails($recipe_id);
        }
        ?>
    </main>
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
</body>
</html>
