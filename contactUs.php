
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    
    <link rel="stylesheet" href="contactUsStyles.css">
    <link rel="stylesheet" href="headerStyles.css">

    <link rel="stylesheet" href="slideShow.css">
</head>
<body>
    <header>
    <h1>Yummy Recipe</h1>
      <nav>
        <ul>
          <li><a href="home.php" class="active">Home</a></li>
          <li><a href="contactUs.php">Contact Us</a></li>
          <li><a href="#">Sign In</a></li>
          <li><a href="#">Sign Up</a></li>
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
</html>
