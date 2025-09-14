<?php



function getMainPosts(){

    $host = "***";
    $dbname = "***";
    $username = "***";
    $password = "***";

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
                    <p class="descriptionRecipe">'.$row['dishDescription'].'</p>';
            if (isset($_SESSION["user_id"]) && isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
                $href = '../adminWebsite/view_recipe.php?recipe_id=' . $row['id'];
                $hrefEdit = '../adminWebsite/editRecipe.php?recipe_id=' . $row['id'];
                $hrefDelete = '../adminWebsite/deleteRecipe.php?recipe_id=' . $row['id'];
                echo '
                    <a href="' .$hrefEdit. '" class="recipe-button">Edit Recipe</a>
                    <a href="' .$hrefDelete. '" class="recipe-button">Delete Recipe</a>
                    <a href="' . $href . '" class="recipe-button">View Recipe</a>
            </div>
            </div>';
            } else if (isset($_SESSION["user_id"]) && isset($_SESSION["admin"]) && $_SESSION["admin"] == 0){
                $href = 'view_recipe.php?recipe_id=' . $row['id'];
                            echo '<a href="' . $href . '" class="recipe-button">View Recipe</a>
            </div>
            </div>';
            }
            else{
            echo'<a href="../notSignedInWebsite/signIn.php" class="recipe-button">Sign in to view recipe</a>
            </div>
            </div>';
            }


        }
    } catch(PDOException $e) {
        echo '"Failed to connect to the database: " . $e->getMessage()' ;
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
        
        echo'<div class="recipe-details">
        <div class="recipe-header">
        <div class="image-container">
            <img src="../images/' . $recipe_details['dishImage'] . '" alt="' . $recipe_details['dishName'] . '" class="recipe-image" />
        </div>
            <div class="recipe-info">
            <h2 class="recipe-title">' . $recipe_details['dishName'] . '</h2>
            <h3>Description</h3>
            <p class="description">' . $recipe_details['dishDescription'] . '</p>
            </div>
        </div>
            <h3 class="ingredients_title">Ingredients</h3>
            <ul class="ingredients">';

        $ingredients = explode('.', $recipe_details['ingredients']);
        foreach ($ingredients as $ingredient) {
            echo'<li>' . $ingredient . '</li>';
        }
        echo'</ul>
            <h3>Steps</h3>
            <ol class="steps">';
        $steps = explode('.', $recipe_details['steps']);
        foreach ($steps as $step) {
        echo' <li>' . $step . '</li>';
        }
        echo' </ol>
        </div>
';
        if (isset($_SESSION["user_id"]) && isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
                $hrefEdit = '../adminWebsite/editRecipe.php?recipe_id=' . $recipe_id;
                $hrefDelete = '../adminWebsite/deleteRecipe.php?recipe_id=' . $recipe_id;
                echo '

                    <a href="../commun files/generate-pdf.php?recipe_id=' . $recipe_id . '" class="download_button">Download PDF</a>
                    <a href="' .$hrefEdit. '" class="download_button">Edit Recipe</a>
                    <a href="' .$hrefDelete. '" class="download_button">Delete Recipe</a>
            </div>
            </div>';
            }else{
                echo '
                        <a href="../commun files/generate-pdf.php?recipe_id=' . $recipe_id . '" class="download_button">Download PDF</a>
            </div>
            </div>';
            };
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}
?>
