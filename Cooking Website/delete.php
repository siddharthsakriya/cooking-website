<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Page</title>
    </head>
    <body>
        <div class = "container">

<?php 
//validating if the deletevalue field has been left empty or not
if(!empty($_POST['deletevalue'])){
    $deletevalue = $_POST['deletevalue'];
}
else{
    echo '<h1>You need to enter a value into this field</h1>';
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

//executing the queries in order to collect the usename and the password from the database
 mysqli_query($connection, "DELETE FROM recipe_form WHERE RecipeName = '$deletevalue';") or die("Invalid Query: ".mysqli_error($connection));

 
//closing the connection
mysqli_close($connection);

echo '<h1>If the recipe name which you entered existed, it has now been successfully deleted</h1>';

?>
   
</div>
</body>

        </html>
