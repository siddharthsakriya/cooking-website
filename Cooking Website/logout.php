<?php

//Ending the session and clearing it out
session_start();
session_unset();
session_destroy();


header("Location: homepage.html");
exit();

?>