
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="/commun files/contactUsStyles.css">
    <link rel="stylesheet" href="/commun files/HeaderStyles.css">
    <link rel="stylesheet" href="/commun files/slideShow.css">
    <link rel="stylesheet" href="/commun files/footer.css">
</head>
<body>
    <header>
    <h1>Yummy Recipe</h1>
      <nav>
        <ul>
          <li><a href="homeSignedIn.php" class="active">Home</a></li>
          <li><a href="contactUsSignedIn.php">Contact Us</a></li>
          <li><a href="#">View Profile</a></li>
          <li><a href="logOut.php">Log out</a></li>

        </ul>
      </nav>
    </header>

    <div class="container">
        <h1 class="title">Contact Us</h1>
        <form action="mail.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" >
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea>
            </div>
            <button type="submit" name="btn-sent">Send Message</button>

        </form>
    </div>

</body>
  <footer>
      <div class="footer-container">
        <div class="footer-icons">
          <img src="images/instagram.png" alt="ig" class="footer-icon" />
          <img src="images/facebook.png" alt="fb" class="footer-icon" />
          <img src="images/youtube.png" alt="yt" class="footer-icon" />
          <img src="images/twitter.png" alt="tw" class="footer-icon" />
        </div>
        <h1 class="copyrights">Copyrights © 2024 All Rights Reserved. YUMMY RECIPE.</h1>
      </div>
    </footer>
</html>
