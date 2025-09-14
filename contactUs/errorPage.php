<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: /notSignedInWebsite/signIn.php");
    exit;
}

// Fetch user information from the database
$host = "***";
$dbname = "***";
$username = "***";
$password = "***";
$mysqli = new mysqli($host, $username, $password, $dbname);

$sql = "SELECT admin FROM user WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$stmt->bind_result($admin);
$stmt->fetch();
$stmt->close();
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <link rel="stylesheet" href="errorPageStyles.css">
</head>
<body>
    <div class="error-container">
        <h1>Error: Required Fields Missing</h1>
        <p>Please make sure all required fields are filled.</p>
        <a <?php
        if ($admin == 1) {
            echo 'href="/adminWebsite/contactUs.html"';
        } else {
            echo 'href="/signedInWebsite/contactUsSignedIn.html"';
        }
        ?>
        class="back-link">Go back to Contact Page</a>
    </div>
</body>
</html>
