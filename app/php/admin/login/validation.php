<?php
 
// Check if username is empty
if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter username.";
} else {
    $username = trim($_POST["username"]);
}

// Check if password is empty
if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
} else {
    $password = trim($_POST["password"]);
}
