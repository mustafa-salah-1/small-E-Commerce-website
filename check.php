<?php
if (!isset($_SESSION["loggedinCustomer"]) || $_SESSION["loggedinCustomer"] !== true) {
    header("location: login.php");
    exit;
}
