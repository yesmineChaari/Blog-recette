<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Recipe</title>
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
            <li><a href="/signedInWebsite/logOut.php">Log Out</a></li>
        </ul>
    </nav>
</header>

<?php
require_once('../commun files/GetRecipes.php');
if(isset($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];
}
$host = "localhost";
$dbname = "recipe_blog";
$username = "yasmine";
$password = "chaari123??";
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST['name'];
        $description = $_POST['description'];
        $ingredients = $_POST['ingredients'];
        $date = $_POST['date'];
        $steps = $_POST['steps'];
        $image = $_POST['image'];

        // Update the recipe in the database
        $update_query = "UPDATE recipe 
                         SET dishName = :name, dishDescription = :description, 
                             ingredients = :ingredients, date = :date, 
                             steps = :steps, dishImage = :image 
                         WHERE id = :recipe_id";
        $update_statement = $db->prepare($update_query);
        $update_statement->bindParam(':name', $name);
        $update_statement->bindParam(':description', $description);
        $update_statement->bindParam(':ingredients', $ingredients);
        $update_statement->bindParam(':date', $date);
        $update_statement->bindParam(':steps', $steps);
        $update_statement->bindParam(':image', $image);
        $update_statement->bindParam(':recipe_id', $recipe_id);
        $update_statement->execute();
        header("Location: home.php");

        // Redirect to the recipe view page after editing
        exit;
    }

    // Fetch recipe details from the database
    $recipe_query = "SELECT * FROM recipe WHERE id = :recipe_id";
    $recipe_statement = $db->prepare($recipe_query);
    $recipe_statement->bindParam(':recipe_id', $recipe_id, PDO::PARAM_INT);
    $recipe_statement->execute();
    $recipe_details = $recipe_statement->fetch(PDO::FETCH_ASSOC);

    // Display the form to edit the recipe
    echo '
    <div class="container">
      <h1>Edit Recipe</h1>
      <form method="post">
        <div class="form-group">
          <label for="name">Recipe Name :</label>
          <input type="text" id="name" name="name" value="' . $recipe_details['dishName'] . '" required/>
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <input type="text" id="description" name="description" value="' . $recipe_details['dishDescription'] . '" required />
        </div>
        <div class="form-group">
          <label for="ingredients">Ingredients :</label>
          <input type="text" id="ingredients" name="ingredients" value="' . $recipe_details['ingredients'] . '" required />
        </div>
        <div class="form-group">
          <label for="date">Date :</label>
          <input type="date" id="date" name="date" value="' . $recipe_details['date'] . '" required />
        </div>
        <div class="form-group">
          <label for="steps">Steps :</label>
          <input type="text" id="steps" name="steps" value="' . $recipe_details['steps'] . '" required/>
        </div>
        <div class="form-group">
          <label for="image">Image :</label>
          <input type="text" id="image" name="image" value="' . $recipe_details['dishImage'] . '"required />
        </div>
        <button type="submit" name="btn-sent">Edit</button>
      </form>
    </div>';
} catch(PDOException $e) {
    echo '"Failed to connect to the database: " . $e->getMessage()' ;
}
?>

</body>
<footer>
    <div class="footer-container">
        <div class="footer-icons">
            <img src="/images/instagram.png" alt="ig" class="footer-icon" />
            <img src="/images/facebook.png" alt="fb" class="footer-icon" />
            <img src="/images/youtube.png" alt="yt" class="footer-icon" />
            <img src="/images/twitter.png" alt="tw" class="footer-icon" />
        </div>
        <h1 class="copyrights">
            Copyrights © 2024 All Rights Reserved. YUMMY RECIPE.
        </h1>
    </div>
</footer>
</html>
