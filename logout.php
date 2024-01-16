<?php
    require 'config/constants.php';


    // destroy all the sessions and redirect user to home page 
    session_destroy();
    header('location: ' . ROOT_URL);
    die();
?>