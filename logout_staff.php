<?php
    //Destroying the session when the user log out's
    session_start();
    session_unset();
    session_destroy();
    //Redirecting to Buttons.php when done
    header("location:buttons.php");
    exit;
?>