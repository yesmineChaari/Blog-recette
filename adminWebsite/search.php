<?php 
function getSearchPosts(){
    $host = "localhost";
    $dbname = "recipe_blog";
    $username = "yasmine";
    $password = "chaari123??";
    $mysqli = new mysqli($host, $username, $password, $dbname);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    if (isset($_POST["submit-search"]) && !empty($_POST["search"])) {
        $search = mysqli_real_escape_string($mysqli, $_POST["search"]);
        // Convert search term to lowercase
        $search = strtolower($search);
        
        // Check if the search term is a category
        $category_query = "SELECT id FROM category WHERE LOWER(name) LIKE '%$search%'";
        $category_result = $mysqli->query($category_query);
        $category_row = $category_result->fetch_assoc();
        if ($category_row) {
            // If the search term is a category, fetch recipes belonging to that category
            $category_id = $category_row['id'];
            $sql = "SELECT r.* FROM recipe r
                    INNER JOIN has_category hc ON r.id = hc.recipe
                    WHERE hc.category = $category_id";
        } else {
            // If the search term is not a category, search recipes by name (case-insensitive)
            $sql = "SELECT r.* FROM recipe r
                    WHERE LOWER(r.dishName) LIKE '%$search%'";
        }
        
        $result = $mysqli->query($sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0) {
            // Display the recipes
            while ($row = $result->fetch_assoc()) {
                // Your code to display recipe cards
                $timestamp = strtotime($row['date']);
                $date = date('d-m-Y', $timestamp);
                echo '<div class="recipe-card">
                    <div class="image-container">
                    <img class="recipe-image" src="../images/'.$row['dishImage'].'" alt="recipe image">
                    </div>
                    <div class="card-body">
                            <div class="card-header"> 
                                <h2 class="recipe-title">'.$row['dishName'].'</h2>
                                <p class="recipe-added">'.$date.'</p>
                                <p class="recipe-categories">'; // Display categories here
                                
                // Fetch categories for the recipe
                $category_query = "SELECT name FROM category
                                    INNER JOIN has_category ON category.id = has_category.category
                                    WHERE has_category.recipe= ".$row['id'];
                $category_result = $mysqli->query($category_query);
                while($category = $category_result->fetch_assoc()) {
                    echo '<span class="category">'.$category['name'].'</span>';
                }
                
                echo '</p>
                            </div>
                            <p class="descriptionRecipe">'.$row['dishDescription'].'</p>
                        <a href="view_recipe.php?recipe_id=' . $row['id'].'"class="recipe-button">View recipe</a>
            </div>
            </div>';
        }
        } else {
            echo "There are no results matching your search!";
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Yummy Recipe</title>
        <link rel="stylesheet" href="/commun files/RecipeCardStyles.css" />
        <link rel="stylesheet" href="/commun files/HeaderStyles.css" />
        <link rel="stylesheet" href="/commun files/slideShow.css" />
        <link rel="stylesheet" href="/commun files/footer.css" />
    </head>
    <body>
    <header>
      <h1>Yummy Recipe</h1>
            <form class="search-form" action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search recipes/categories" />
        <button type="submit" name="submit-search">Search</button>
      </form>
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
<?php
        getSearchPosts();
?>
    </body>
</html>
