<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    </head>
    <body>
        <div class="container">

<?php

//This checks whether the search box has been left empty or not
if(!empty($_POST['search'])){
    $searchterm = $_POST['search'];
}

else{
    echo '<h1>Please enter a search term</h1>';
    exit();
}

//Creating connection to the database
$connection = mysqli_connect("127.0.0.1","root");

//Checking the database connection
if (mysqli_ping($connection)){
    echo ('MySQL server '. mysqli_get_server_info($connection).' on '.mysqli_get_host_info($connection));
}

//Selecting the database
mysqli_select_db($connection,"website_data") or die("Connection with database has failed!!!");

//Executing the query in order to search the database and bring back the results for the recipe
$result = mysqli_query($connection, "SELECT * FROM recipe_form WHERE RecipeName = '$searchterm';" ) or die ("Invalid Query: ".mysqli_error($connection));;

//closing the connection
mysqli_close($connection);

//displaying the results from the query, and if nothing is returned, a message is displayed letting the user know that the recipe they searched for wasn't in the database
if (mysqli_num_rows($result) > 0 )
{
    
    while($row = mysqli_fetch_array($result))
    {
    echo "<h1>RecipeName</h1>" . $row["RecipeName"] . "<br>"."<br>". "<h1>IngredientList</h1>" . $row["IngredientList"] . "<br>"."<br>". "<h1>CookingMethod</h1>" . $row["CookingMethod"]."<br>"."<br>". "<h1>Calories</h1>" . $row["Calories"] ."<br>"."<br>". "<h1>HealthRating</h1>" . $row["HealthyRating"] . "<br>";
     }
}
else{
    echo "<h1>The recipe which you have searched for is not present in the database. </h1>";
}

?>

</div>

</body>
</html>


