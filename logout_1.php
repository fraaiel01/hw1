<?php

    session_start();
    session_destroy();
    header("Location: home_1.php");
    exit;
    
?>