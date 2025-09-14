<?php
$host = "***";
    $dbname = "***";
    $username = "***";
    $password = "***";

//validity of email and password
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    echo'<script>alert("Email is not valid")</script>';
    exit;
}

if (strlen($_POST["password"]) < 8) {
    echo'<script>alert("Password must be at least 8 characters")</script>';
    exit;

}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    echo'<script>alert("Password must contain at least one letter")</script>';
    exit;
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    echo'<script>alert("Password must contain at least one number")</script>';
    exit;

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
    echo'<script>alert("Email already exists")</script>';
    exit;
}
$password_hash=password_hash($_POST["password"], PASSWORD_DEFAULT);
$sql = "INSERT INTO user (userName, userEmail, password, bio)
        VALUES (?, ?, ?, ?)";
$stmt = $mysqli->stmt_init();
if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
$stmt->bind_param("ssss", $_POST["name"], $_POST["email"], $password_hash, $_POST["bio"]);
if ($stmt->execute()) {
    header("Location: signedUp.php");
} else {
    die("Error: " . $stmt->error);
}
$stmt->close();
$mysqli->close();
?>

