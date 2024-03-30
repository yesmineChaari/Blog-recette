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
                
                    <a href="view_recipe.php?recipe_id='.$row['id'].'" class="recipe-button">View Recipe</a>

                    </div>';
        }
    } catch(PDOException $e) {
        echo "Failed to connect to the database: " . $e->getMessage();
    }
}

function getRecipeDetails($recipe_id) {
    $host = "localhost";
    $dbname = "recipe_blog";
    $username = "yasmine";
    $password = "chaari123??";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $recipe_query = "SELECT * FROM recipe WHERE id = :recipe_id";
    $recipe_statement = $db->prepare($recipe_query);
    $recipe_statement->bindParam(':recipe_id', $recipe_id, PDO::PARAM_INT);
    $recipe_statement->execute();
    $recipe_details = $recipe_statement->fetch(PDO::FETCH_ASSOC);
    
    echo '<div class="recipe-details">
        <h2 class="recipe-title">' . $recipe_details['dishName'] . '</h2>
        <h3>Description</h3>
        <p class="description">' . $recipe_details['dishDescription'] . '</p>
        <h3>Ingredients</h3>
        <ul class="ingredients">';
    // Explode ingredients and display as list items
    $ingredients = explode(',', $recipe_details['Ingredients']);
    foreach ($ingredients as $ingredient) {
        echo '<li>' . $ingredient . '</li>';
    }
    echo '</ul>
        <h3>Steps</h3>
        <ol class="steps">';
    // Explode steps and display as ordered list items
    $steps = explode('.', $recipe_details['steps']);
    foreach ($steps as $step) {
        echo '<li>' . $step . '</li>';
    }
    echo '</ol>';


    echo '</div>';

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

    
}

?>


