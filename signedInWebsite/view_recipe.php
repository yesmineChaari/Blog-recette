<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>
    <link rel="stylesheet" href="/commun files/footer.css" />
    <link rel="stylesheet" href="viewRecipeStyles.css" />
    <link rel="stylesheet" href="/commun files/HeaderStyles.css" />
</head>
<body>
    <header>
        <h1>Yummy Recipe</h1>
        <nav>
            <ul>
                <li><a href="homeSignedIn.php">Home</a></li>
                <li><a href="contactUsSignedIn.php">Contact us</a></li>
                <li><a href="#">View Profile</a></li>
                <li><a href="logOut.php">Log out</a></li>

            </ul>
        </nav>
    </header>

    <main>
        <?php
        require_once("GetRecipesSignedIn.php");
        if(isset($_GET['recipe_id'])) {
            $recipe_id = $_GET['recipe_id'];
            $recipe_details = getRecipeDetails($recipe_id);
            if($recipe_details) {
                echo '<div class="recipe-details">
                <h2 class="recipe-title">' . $recipe_details['dishName'] . '</h2>
                <h3>Description</h3>
                <p class="description">' . $recipe_details['dishDescription'] . '</p>
                <h3>Ingredients</h3>
                <ul class="ingredients">
                ';
                foreach($recipe_details['ingredients'] as $ingredient) {
                    echo '<li>' . $ingredient. '</li>';
                }
                echo '</ul>
                <h3>Steps</h3>
                <p class="steps">' . $recipe_details['steps'] . '</p>
                <p class="recipe-added">' . $recipe_details['date'] . '</p>
                </div>';

            }

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
