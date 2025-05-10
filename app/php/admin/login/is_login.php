<?php
 
if (empty($username_err) && empty($password_err)) {
    try { 
        $sql = "SELECT id, admin_name, admin_password FROM admins WHERE admin_name = :username LIMIT 1";
        
        $stmt = $connect->prepare($sql);
         
        $param_username = trim(htmlspecialchars($_POST["username"]));
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

        $stmt->execute();
        
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row["id"];
            $username = $row["admin_name"];
            $hashed_password = $row["admin_password"];
             
            // if (password_verify($password, $hashed_password)) {
                if ( $password === $hashed_password) {  
                 
                session_regenerate_id(true);
                 
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username; 
                 
                header("Location: dashboard.php");
                exit();
            }
        }
         
        $login_err = "Invalid username or password.";
        
    } catch (PDOException $e) { 
        error_log("Login error: " . $e->getMessage());
        $login_err = "An error occurred during login. Please try again later.";
    } finally { 
        $stmt = null;
    }
} 
unset($connect);
