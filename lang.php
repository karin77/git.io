<?php
require "admin/config.php";
  session_start();

    if(isset($_SERVER['HTTP_REFERER'])){
        $_SESSION['lang'] = $_GET['lang'];
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
?>