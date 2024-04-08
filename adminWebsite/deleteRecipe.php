<?php
session_start();
if (isset($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];
    $host = "localhost";
    $dbname = "recipe_blog";
    $username = "yasmine";
    $password = "chaari123??";
    $mysqli = new mysqli($host, $username, $password, $dbname);
    if ($mysqli->connect_errno) {
        die("Failed to connect to MySQL: " . $mysqli->connect_error);
    }

    // Delete the recipe from the recipe table
    $delete_recipe_query = "DELETE FROM recipe WHERE id = $recipe_id";
    $delete_recipe_result = $mysqli->query($delete_recipe_query);

    // Delete the associated categories from the has_category table
    $delete_has_category_query = "DELETE FROM has_category WHERE recipe = $recipe_id";
    $delete_has_category_result = $mysqli->query($delete_has_category_query);

    if ($delete_recipe_result && $delete_has_category_result) {
        echo "<script>alert('Recipe and associated categories deleted successfully');</script>";
        header("Location: home.php");
    } else {
        echo "<script>alert('Failed to delete recipe and associated categories');</script>";
        header("Location: home.php");
    }
}
?>
