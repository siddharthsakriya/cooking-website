<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Page</title>
    </head>
    <body>
        <form action="delete.php" class="form2" method="POST">
            <h1 id="underline">Delete Recipe</h1>
            <br>
            <br>
            Recipe Name:<br> <input type="text" name="deletevalue" >
            <br><br>
            <input type="submit" name="submit" value="delete">
            
        </form> 

    <div class="container">
        <?php 
        //starting session variable in order to display the name entered in on the login form
        session_start();
        echo "Hi " , $_SESSION["name"] ," click on the link below for instructions on how to use the admin page:";
        ?>
        <a href="instructions.php"><p>instructions</p><a>
        
        <form action="logout.php" class="form2" method="POST">
        
        <input type = "submit" name="logout" value="Go back to the homepage">
    </form> 
    
</div>
    </body>
</html>
