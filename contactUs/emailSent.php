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
    <title>Email Sent</title>
    <link rel="stylesheet" href="emailSentStyles.css">
</head>
<body>
    <div class="container">
        <h1>Email Sent Successfully</h1>
        <p>Thank you for contacting us. Your email has been sent successfully.</p>
        <a <?php
        if ($admin == 1) {
            echo 'href="/adminWebsite/home.php"';
        } else {
            echo 'href="/signedInWebsite/homeSignedIn.php"';
        }
        ?>
        class="btn">Go back to Home Page</a>
    </div>
</body>
</html>
