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
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);
        $ingredients = htmlspecialchars($_POST['ingredients']);
        $date = htmlspecialchars($_POST['date']);
        $steps = htmlspecialchars($_POST['steps']);
        $categories = htmlspecialchars($_POST['categories']);


        // Image validation
        if ($_FILES['image']['error'] !== 4) { // the admin has the option to not change the image of the recipe
            $fileName = $_FILES['image']['name']; // name of the file
            $fileSize = $_FILES['image']['size']; // size in bytes
            $tempName = $_FILES['image']['tmp_name']; // temporary location
            $validImageExtension = ['jpg', 'jpeg', 'png']; // allowed types
            $imageExtension = explode('.', $fileName); // separate name from extension
            $imageExtension = strtolower(end($imageExtension)); // convert to lowercase
            if (!in_array($imageExtension, $validImageExtension)) {
                echo "<script>alert('Image extension not valid');</script>"; // check extension
            } else if ($fileSize > 1000000) {
                echo "<script>alert('Image size is too large');</script>"; // check size
            } else {
                $newImageName = uniqid() . '.' . $imageExtension; // generate unique id with extension
                move_uploaded_file($tempName, '../images/' . $newImageName); // store uploaded image
            }
        }
        else {
            // No new image uploaded, keep the existing image
            $query = "SELECT dishImage FROM recipe WHERE id = :recipe_id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':recipe_id', $recipe_id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $newImageName = $row['dishImage'];
        }
                // Check if recipe name already exists
        $check_query = "SELECT id FROM recipe WHERE dishName = :name AND id != :recipe_id";
        $check_statement = $db->prepare($check_query);
        $check_statement->bindParam(':name', $name);
        $check_statement->bindParam(':recipe_id', $recipe_id);
        $check_statement->execute();
        if ($check_statement->rowCount() > 0) {
            echo "<script>alert('Recipe name already exists. Please choose a different name.');</script>";
            exit; // Exit script if recipe name already exists
        }
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
        $update_statement->bindParam(':image', $newImageName);
        $update_statement->bindParam(':recipe_id', $recipe_id);
        $update_statement->execute();
        $delete_categories_query = "DELETE FROM has_category WHERE recipe = :recipe_id";
        $delete_categories_statement = $db->prepare($delete_categories_query);
        $delete_categories_statement->bindParam(':recipe_id', $recipe_id);
        $delete_categories_statement->execute();

        $categoryArray = explode(' ', $categories);
        foreach ($categoryArray as $category) {
            $insert_category_query = "INSERT INTO has_category (recipe, category) VALUES (:recipe_id, :category)";
            $insert_category_statement = $db->prepare($insert_category_query);
            $insert_category_statement->bindParam(':recipe_id', $recipe_id);
            $insert_category_statement->bindParam(':category', $category);
            $insert_category_statement->execute();
        }
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
                $category_query = "SELECT category FROM has_category WHERE recipe = :recipe_id";
    $category_statement = $db->prepare($category_query);
    $category_statement->bindParam(':recipe_id', $recipe_id, PDO::PARAM_INT);
    $category_statement->execute();
    $categories_array = [];
    while ($category_row = $category_statement->fetch(PDO::FETCH_ASSOC)) {
        $categories_array[] = $category_row['category'];
    }
    $existing_categories = implode(' ', $categories_array);

    // Display the form to edit the recipe
    echo '
    <div class="container">
      <h1>Edit Recipe</h1>
      <form method="post" enctype="multipart/form-data">
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
          <input type="file" id="image" name="image" accept="image/*"/>
        </div>
        <div class="category">
          <label for="categories">Categories :</label>
          <input type="text" id="categories" name="categories" value="' . $existing_categories . '" required/>
        </div>
        
        <button type="submit" name="btn-sent" class="send-btn">Edit</button>
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
