<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instructions</title>
    </head>
    <body>
        <div class = "container">

        <h1 id = "underline">Admin Deletion Instructions</h1>
        <br>
    <?php 
         //starting session variable in order to display the name entered in on the login form
        session_start();
        echo "Hi " , $_SESSION["name"] ," you are currently logged in as an Admin which allows you to delete recipes from the database";
    ?>

    <p>In order to delete a recipe from the database, simply enter the name of the recipe which you are wanting to delete into the field asking for the recipe name, and then hit the delete button to the right of it. </p>
</div>
</body>

        </html>