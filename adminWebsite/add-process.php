<?php
$host = "localhost";
$dbname = "recipe_blog";
$username = "yasmine";
$password = "chaari123??";
$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

if (isset($_POST['btn-sent'])) {
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);// escape special characters
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $ingredients = mysqli_real_escape_string($mysqli, $_POST['ingredients']);
    $steps = mysqli_real_escape_string($mysqli, $_POST['steps']);
    $categories = mysqli_real_escape_string($mysqli, $_POST['categories']); // Example: breakfast lunch dinner
    $check_query = "SELECT id FROM recipe WHERE dishName = '$name'";
    $check_result = $mysqli->query($check_query);
    if ($check_result->num_rows > 0) {
        echo "<script>alert('Recipe name already exists. Please choose a different name.');</script>";
        header("Location: addRecipe.php");
        exit; // Exit script if recipe name already exists
    }
    if ($_FILES['image']['error'] === 4) {
        echo "<script>alert('image does not exist');</script>";
    } else {
        $fileName = $_FILES['image']['name']; // name of the file
        $fileSize = $_FILES['image']['size']; // size in bytes
        $tempName = $_FILES['image']['tmp_name']; // temporary location
        $validImageExtension = ['jpg', 'jpeg', 'png']; // allowed types
        $imageExtension = explode('.', $fileName); // separate name from extension
        $imageExtension = strtolower(end($imageExtension)); // convert to lowercase
        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('image extension not valid');</script>"; // check extension
        } else if ($fileSize > 1000000) {
            echo "<script>alert('image size is too large');</script>"; // check size
        } else {
            $newImageName = uniqid() . '.' . $imageExtension; // generate unique id with extension
            move_uploaded_file($tempName, '../images/' . $newImageName); // store uploaded image
            $query = "INSERT INTO recipe (dishName, dishDescription, ingredients, steps, dishImage) VALUES ('$name', '$description', '$ingredients', '$steps', '$newImageName')";
            if (!($mysqli->query($query))){
                echo "<script>alert('Failed to add recipe');</script>";
                header("Location: addRecipe.php");
            }
            $query="SELECT id FROM recipe WHERE dishName='$name'";
            $result = $mysqli->query($query);
            $row = mysqli_fetch_array($result);
            $recipeId = $row[0];
            $categoryArray = explode(' ', $categories);
            foreach ($categoryArray as $category) {
                $query = "INSERT INTO  has_category (recipe, category) VALUES ('$recipeId', '$category')";
                if ($mysqli->query($query)) {
                    echo "<script>alert('Recipe added successfully');</scr>";
                    header("Location:  home.php");
                } else {
                    echo "<script>alert('Failed to add recipe');</script>";
                }
                
                    


        }
    }
}
}

?>
  