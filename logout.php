<?php
    session_start();
    if(isset($_SESSION['username'])){
        echo "123";
        unset($_SESSION['username']);//xoa ten session
        session_destroy();//xoa toan bo session
        header("Location: login.php");
        exit();
    }
?>