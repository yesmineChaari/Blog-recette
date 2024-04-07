<?php

function getMainPosts(){
    $host = "localhost";
    $dbname = "recipe_blog";
    $username = "yasmine";
    $password = "chaari123??";

    try {
        $db= new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM recipe ORDER BY date DESC";
        $result = $db->query($query);
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            $query = "SELECT name FROM category
            INNER JOIN has_category ON category.id = has_category.category
            WHERE has_category.recipe= ".$row['id'];
            $category_result = $db->query($query);
            $categories = '';
            while($category=$category_result->fetch(PDO::FETCH_ASSOC)){
                $categories .= '<span class="category">'.$category['name'].'</span>';
            } 
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
                        <p class="recipe-categories">'.$categories.'</p>

                    </div>
                    <p class="descriptionRecipe">'.$row['dishDescription'].'</p>
            <a href="../notSignedInWebsite/signIn.php" class="recipe-button">Sign in to view recipe</a>
            </div>
            </div>';
        }
    } catch(PDOException $e) {
        echo '"Failed to connect to the database: " . $e->getMessage()' ;
    }
}