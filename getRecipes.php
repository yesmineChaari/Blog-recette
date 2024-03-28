<?php
function getMainPosts(){
    $host = "localhost";
    $dbname = "recipe_blog";
    $username = "yasmine";
    $password = "chaari123??";

    try {
        $db= new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM recipe ORDER BY date DESC LIMIT 20";
        $result = $db->query($query);
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            echo '<div class="recipe-card">
            <div class="recipe-details">
                <h2 class="recipe-title">'.$row['dishName'].'</h2>
                <h3>description</h3>
                <p class="description">
                    '.$row['dishDescription'].'
                </p>
                <p class="recipe-added">'.$row['date'].'</p>
                <button class="recipe-button">View Recipe</button>
            </div>
        </div>';
        }
    } catch(PDOException $e) {
        echo "Failed to connect to the database: " . $e->getMessage();
    }
}
?>
