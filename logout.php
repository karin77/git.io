<?php
	session_start();
   require "admin/config.php";
	unset($_SESSION['start']);
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    unset($_SESSION['surname']);
    unset($_SESSION['avatar']); 
?>