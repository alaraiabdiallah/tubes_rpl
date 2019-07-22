<?php
    session_start();

    unset($_SESSION['user']);
    unset($_SESSION['carts']);
    header("location: index.php");
?>