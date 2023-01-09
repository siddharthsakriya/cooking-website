<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recipe Form</title>
    </head>
    <body>
    <div class = "container">
<?php

//validation to check that the fields haven't been left blank, and to make sure that the health rating is within the range

if(!empty($_POST['recipeName'])){
    $recipeName = $_POST['recipeName'];
}
else{
    echo '<h1>You need to enter your recipe name</h1>';
    exit();
}

if(!empty($_POST['Ingredients'])){
    $ingredients = $_POST['Ingredients'];
}

else{
    echo '<h1>You need to enter the ingredients</h1>';
    exit();
}

if(!empty($_POST['method'])){
    $method = $_POST['method'];
}
else{
    echo '<h1>You need to enter in the method</h1>';
    exit();
    
}

if(!empty($_POST['calories'])){
    $calories = $_POST['calories'];
}
else{
    echo '<h1>You need to enter the number of calories</h1>';
    exit();
}

if(!empty($_POST['rating'])){
    $rating = $_POST['rating'];
}

else{
    echo '<h1>You need to enter a health rating</h1>';
    exit();
}


if($_POST['rating']>=1 and $_POST['rating'] <= 5){
    $rating = $_POST['rating'];
}
else{
    echo '<h1>The number you enter needs to be within the range of 1-5</h1>';
    exit();
}

//Creating the connection to the database
$connection = mysqli_connect("127.0.0.1","root");

//checking the connection 
if (mysqli_ping($connection)){
    echo ('MySQL server '. mysqli_get_server_info($connection).' on '.mysqli_get_host_info($connection));
}

//selcting the database
mysqli_select_db($connection,"website_data") or die("Connection with database has failed!!!");

//executing the queries in order to insert the data which the user entered in the form onto the database
mysqli_query($connection, "INSERT INTO recipe_form (RecipeName, IngredientList, CookingMethod, Calories, HealthyRating) VALUES ('$recipeName','$ingredients','$method','$calories','$rating');") or die("Invalid Query: ".mysqli_error($connection));

//closing the connection
mysqli_close($connection);
        
echo' <h1>Your recipe form entry was successful</h1> ';

?>
   
</div>
</body>

        </html>