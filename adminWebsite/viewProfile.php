<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../notSignedInWebsite/signIn.php");
    exit;
}

// Fetch user information from the database
$host = "localhost";
$dbname = "recipe_blog";
$username = "yasmine";
$password = "chaari123??";
$mysqli = new mysqli($host, $username, $password, $dbname);

$sql = "SELECT userName, userEmail, bio FROM user WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$stmt->bind_result($userName, $userEmail, $bio);
$stmt->fetch();
$stmt->close();
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/commun files/HeaderStyles.css" />
    <link rel="stylesheet" href="/commun files/contactUsStyles.css" />
    <link rel="stylesheet" href="/commun files/slideShow.css" />
    <link rel="stylesheet" href="/commun files/footer.css" />
    <link rel="stylesheet" href="/signedInWebsite/profileStyles.css" />
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

    <div class="container">
        <img src="/images/user (2).png" alt="user" class="user-icon"/>
        <p><strong>ADMIN</strong></p>
        <p class="user-name"><?php echo $userName; ?></p>
        <p><strong>Bio:</strong> <?php echo $bio; ?></p>
        <p><strong>Email:</strong> <?php echo $userEmail ?></p>
        <a href="/signedInWebsite/logOut.php" class="logout-button">Log out</a>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-icons">
                <img src="/images/instagram.png" alt="ig" class="footer-icon" />
                <img src="/images/facebook.png" alt="fb" class="footer-icon" />
                <img src="/images/youtube.png" alt="yt" class="footer-icon" />
                <img src="/images/twitter.png" alt="tw" class="footer-icon" />
            </div>
            <h1 class="copyrights">Copyrights © 2024 All Rights Reserved. YUMMY RECIPE.</h1>
        </div>
    </footer>
</body>
</html>
