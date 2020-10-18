<?php
    //Destroying the session
    session_start();
    session_unset();
    session_destroy();
    //Redirecting to buttons page
    header("location:buttons.php");
    exit;
?>
