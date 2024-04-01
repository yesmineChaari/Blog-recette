<?php
$host = "localhost";
    $dbname = "recipe_blog";
    $username = "yasmine";
    $password = "chaari123??";
if(empty($_POST["name"]) || empty($_POST["ingredients"]) || empty($_POST["steps"])){
    echo'<script>alert("Please fill all the fields")</script>';
    exit();
}
    $name = $_POST["name"];
    $description = $_POST["description"];
    $ingredients= $_POST["ingredients"];
    $steps = $_POST["steps"];
$mysqli = new mysqli($host, $username, $password, $dbname);
if ($mysqli->connect_errno) {
            die("Failed to connect to MySQL: " . $mysqli->connect_error);
}    
$sql = "INSERT INTO recipe (dishName, dishDescription, Ingredients, steps)
        VALUES (?, ?, ?, ?)";
$stmt = $mysqli->stmt_init();
if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
$stmt->bind_param("ssss", $name, $description, $ingredients, $steps);
if (empty($description)) {
    $description = null;
}
if ($stmt->execute()) {
    header("Location: /adminWebsite/home.php");
} else {
    die("Error: " . $stmt->error);
}
$stmt->close();
$mysqli->close();
?>

exit();
?>
