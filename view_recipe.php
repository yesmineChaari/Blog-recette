<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>
    <link rel="stylesheet" href="viewRecipeStyles.css" />
</head>
<body>
    <header>
        <h1>Yummy Recipe</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="contactUs.php">Contact us</a></li>
                <li><a href="#">Sign In</a></li>
                <li><a href="#">Sign Up</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        require_once("getRecipes.php");
        if(isset($_GET['recipe_id'])) {
            $recipe_id = $_GET['recipe_id'];
            $recipe_details = getRecipeDetails($recipe_id);
            if($recipe_details) {
                echo '<div class="recipe-details">';
                echo '<h2 class="recipe-title">' . $recipe_details['dishName'] . '</h2>';
                echo '<h3>Description</h3>';
                echo '<p class="description">' . $recipe_details['dishDescription'] . '</p>';
                echo '<h3>Ingredients</h3>';
                echo '<ul class="ingredients">';
                foreach($recipe_details['ingredients'] as $ingredient) {
                    echo '<li>' . $ingredient. '</li>';
                }
                echo '</ul>';
                echo '<h3>Steps</h3>';
                echo '<p class="steps">' . $recipe_details['steps'] . '</p>';
                echo '<p class="recipe-added">' . $recipe_details['date'] . '</p>';
                echo '</div>';
            } else {
                echo 'Recipe not found';
            }
        } else {
            echo 'Recipe ID not provided';
        }
        ?>
    </main>
</body>
</html>
