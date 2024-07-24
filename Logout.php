<?php

    session_start();
    session_destroy();
    setcookie("login" ,'');
    setcookie("username" ,'');
    header("Location: index.php");

?>