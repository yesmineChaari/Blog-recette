<?php
$host = "localhost";
    $dbname = "recipe_blog";
    $username = "yasmine";
    $password = "chaari123??";
    if (empty($_POST["name"])) {
    die("Name is required");
}
//validity of email and password
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}
if (empty($_POST["bio"])) {
    die("Bio is required");
}


$mysqli = new mysqli($host, $username, $password, $dbname);
if ($mysqli->connect_errno) {
            die("Failed to connect to MySQL: " . $mysqli->connect_error);
}
//check if email is unique 
$email = $_POST["email"];
$check_email_query = "SELECT COUNT(*) as count FROM user WHERE userEmail = ?";
$stmt_check_email = $mysqli->prepare($check_email_query);
$stmt_check_email->bind_param("s", $email);
$stmt_check_email->execute();
$result = $stmt_check_email->get_result();
$row = $result->fetch_assoc();
$email_count = $row['count'];

if ($email_count > 0) {
    die("Email already exists");
}

$sql = "INSERT INTO user (userName, userEmail, password, bio)
        VALUES (?, ?, ?, ?)";
$stmt = $mysqli->stmt_init();
if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
$stmt->bind_param("ssss", $_POST["name"], $_POST["email"], $_POST["password"], $_POST["bio"]);
if ($stmt->execute()) {
    header("Location: signedUp.php");
} else {
    die("Error: " . $stmt->error);
}
$stmt->close();
$mysqli->close();
?>

