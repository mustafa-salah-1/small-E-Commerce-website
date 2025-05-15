<?php  

session_start();

if (!isset($_SESSION["loggedin_customer"]) || $_SESSION["loggedin_customer"] !== true) {
    header("location: login.php");
    exit;
}
