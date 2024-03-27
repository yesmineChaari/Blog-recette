<?php
function getMainPosts(){
        $db = mysqli_connect("localhost", "yasmine", "chaari","recipe_blog");
        $query = "SELECT * FROM recipe ORDER BY date DESC LIMIT 20"; // Corrected SQL query syntax
        $result=mysqli_query($db,$query);
        while($row=mysqli_fetch_array($result)){

                echo '<div class="recipe-card">
                <div class="recipe-details">
                    <h2 class="recipe-title">'.$row['dishName'].'</h2>
                    <h3>description</h3>
                    <p class="description">
                        '.$row['description'].'
                    </p>
                    <p class="recipe-added">'.$row['date'].'</p>
                    <button class="recipe-button">View Recipe</button>
                </div>
            </div>';
        }
}

?>