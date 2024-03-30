<?php


function getMainPosts(){
    $host = "localhost";
    $dbname = "recipe_blog";
    $username = "yasmine";
    $password = "chaari123??";

    try {
        $db= new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM recipe ORDER BY date ";
        $result = $db->query($query);
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            $timestamp = strtotime($row['date']);
            $date = date('d-m-Y', $timestamp);
            echo '<div class="recipe-card">
                    <div class="card-header"> 
                        <h2 class="recipe-title">'.$row['dishName'].'</h2>
                        <p class="recipe-added">'.$date.'</p>
                    </div>
                    <p class="descriptionRecipe">'.$row['dishDescription'].'</p>
                
                    <a href="#" class="recipe-button">Sign in to view recipe</a>

                    </div>';
        }
    } catch(PDOException $e) {
        echo "Failed to connect to the database: " . $e->getMessage();
    }
}
?>

