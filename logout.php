<?php
    include ("Modules/connect.php");
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: login.php");
?>