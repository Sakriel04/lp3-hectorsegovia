<?php
    session_start();
    unset($_SESSION["id_user"]);
    unset($_SESSION["usuario"]);
    session_destroy();
    header("location: login.php");
?>