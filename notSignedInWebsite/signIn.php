<?php

$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $host = "***";
    $dbname = "***";
    $username = "***";
    $password = "***";
    $mysqli = new mysqli($host, $username, $password, $dbname);
    
    $email = $mysqli->real_escape_string($_POST["email"]);
    $sql = sprintf("SELECT * FROM user WHERE userEmail = '%s'", $email);
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    if ($user) {
        if (password_verify($_POST["password"], $user["password"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["admin"]=$user["admin"];
            if ($_SESSION["admin"] ==1)
            {
                header("Location: ../adminWebsite/home.php");
                exit;
            }
            else{
              header("Location: ../signedInWebsite/homeSignedIn.php");

            exit;
            }

        }
    }
    $is_invalid = true;

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/commun files/HeaderStyles.css" />
    <link rel="stylesheet" href="/commun files/contactUsStyles.css" />
    <link rel="stylesheet" href="/commun files/footer.css" />
    <link rel="stylesheet" href="sign.css" />
</head>
<body>
  <header>
      <h1>Yummy Recipe</h1>
      <nav>
        <ul>
          <li><a href="home.php" class="active">Home</a></li>
          <li><a href="signIn.php">Sign In</a></li>
          <li><a href="signUp.html">Sign Up</a></li>
        </ul>
      </nav>
    </header>


    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    <div class="container">
    <h1 class="title">Sign in</h1>
    <form method="post">
            <div class="form-group">
        <label for="email">email</label>
        <input type="email" name="email" id="email"
            value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            </div>
        <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        </div>
        
        <button type="submit">Log in</button>
        <a href="signUp.html" class="link">Don't have an account ?Sign up</a>
    </form>
    </div>
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
    
</body>
</html>







