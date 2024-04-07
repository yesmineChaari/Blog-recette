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
    $query = "DELETE FROM recipe WHERE id = $recipe_id";
    if ($mysqli->query($query)) {
        echo "<script>alert('Recipe deleted successfully');</script>";
        header("Location: home.php");
    } else {
        echo "<script>alert('Failed to delete recipe');</script>";
        header("Location: home.php");
    }
}
?>