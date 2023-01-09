
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
<?php 

//initialising session
session_start();

//checking that the user hasn't left any of the fields blank
if(!empty($_POST['adminname'])){
    $_SESSION["name"] = $_POST['adminname'];
}
else{
    echo '<h1>You need to enter your name in</h1>';
    exit();
}

if(!empty($_POST['username'])){
    $username = $_POST['username'];
}
else{
    echo '<h1>You need to enter in a username</h1>';
    exit();
}
if(!empty($_POST['password'])){
    $password = $_POST['password'];
}
else{
    echo '<h1>You need to enter in a password</h1>';
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
$dbusername = mysqli_query($connection, "SELECT Username FROM login_data") or die("Invalid Query: ".mysqli_error($connection));
$dbpassword = mysqli_query($connection, "SELECT UserPassword FROM login_data") or die("Invalid Query: ".mysqli_error($connection));


//closing the connection
mysqli_close($connection);

$resultarr1 = mysqli_fetch_assoc($dbusername);
$db_username = $resultarr1["Username"];

$resultarr2 = mysqli_fetch_assoc($dbpassword);
$db_password = $resultarr2["UserPassword"];




//checking what the user has entered matches the details in the database
if ($username == $db_username and $password == $db_password){

    header("Location: deletepage.php");
    exit();

}
else {
  echo '<h1>You have entered the incorrect information please try again</h1>';
}



//https://forums.phpfreaks.com/topic/51369-solved-catchable-fatal-error-object-of-class-mysqli_result-could-not-be-converted-to-s/   - link to fixing error
?>
</div>
</body>

        </html>