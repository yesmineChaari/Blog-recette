<?php
$host = "localhost";
    $dbname = "recipe_blog";
    $username = "yasmine";
    $password = "chaari123??";
    $mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
            die("Failed to connect to MySQL: " . $mysqli->connect_error);
}  


 if (isset ($_POST['btn-sent'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $steps = $_POST['steps'];
    $imgName = $_POST['imgName'];
     if ( $_FILES['image']['error']===4){
        echo"<script>alert('image dos not exist');</script>";
    }else{
        $fileName=$_FILES['image']['name'];
        $fileSize=$_FILES['image']['size'];
        $tempName=$_FILES['image']['tmp_name'];
        $validImageExtension=['jpg','jpeg','png'];
        $imageExtension=explode('.',$fileName);
        $imageExtension=strtolower(end($imageExtension));
        if (!in_array($imageExtension,$validImageExtension)){
            echo"<script>alert('image extension not valid');</script>";
            }else if($fileSize>1000000)
            {
                echo"<script>alert('image size is too large');</script>";
            }else{
                $newImageName=uniqid();
                $newImageName .='.' . $imageExtension;
                move_uploaded_file($tempName,'../images/'. $newImageName);
                $query = "INSERT INTO recipe (dishName, dishDescription, ingredients, steps, imgName, dishImage) VALUES ('$name', '$description', '$ingredients', '$steps', '$imgName', '$newImageName')";
                mysqli_query($mysqli,$query);
                echo"<scrip>alert('successful');
                window.location.href='home.php';</script>";
                }
            }
        }

?>
                
                


    