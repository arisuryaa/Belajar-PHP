<?php

    session_start();
    session_destroy();
    setcookie("login" ,'');
    header("Location: index.php");

?>