<?php

$title_page = "Create Account Page";
$file_css = "account.css";

include "app/php/config/config.php";
include "components/app.php";

if (isset($_SESSION["loggedinCustomer"]) && $_SESSION["loggedinCustomer"] === true) {
  header("location: index.php");
  exit; 
}
 
$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $email_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {

  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  }  else {
    $username = trim($_POST["username"]);
  }

  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter an email.";
  } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
    $email_err = "Invalid email format.";
  } else {
    $sql = "SELECT id FROM customers WHERE customer_email = :email";

    if ($stmt = $connect->prepare($sql)) {
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

      $param_email = trim($_POST["email"]);

      if ($stmt->execute()) {
        if ($stmt->rowCount() >= 1) {
          $email_err = "This email is already taken.";
        } else {
          $email = trim($_POST["email"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
  }

  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Password must have atleast 6 characters.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Please confirm password.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Password did not match.";
    }
  }

  if (empty($username_err) && empty($password_err) 
  && empty($confirm_password_err) && empty($email_err)) {

    $sql = "INSERT INTO 
    customers (customer_name, customer_password, customer_email, customer_image) 
    VALUES (:username, :password, :email, :image)";

    if ($stmt = $connect->prepare($sql)) {
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      $stmt->bindParam(":image", $param_image, PDO::PARAM_STR);

      // Set parameters
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT); 
      $param_email = $email;
      $param_image = "default.png";

      // Attempt to execute the prepared statement
      if ($stmt->execute()) {
        // Redirect to login page
        header("location: login.php");
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      unset($stmt);
    }
  }

  // Close connection
  unset($connect);
} 
?>

<div class="container mt-5">
  <div class="signup-container">
    <div class="signup-header">
      <h2><i class="fas fa-user-plus"></i> CREATE ACCOUNT</h2>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="mb-3">
      <input type="text" class="form-control form-control-lg <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" placeholder="USERNAME" name="username" value="<?php echo $username; ?>" required>
      <?php if (!empty($username_err)): ?>
        <div class="invalid-feedback"><?php echo $username_err; ?></div>
      <?php endif; ?>
      </div>
      <div class="mb-3">
      <input type="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" placeholder="EMAIL" name="email" value="<?php echo $email; ?>" required>
      <?php if (!empty($email_err)): ?>
        <div class="invalid-feedback"><?php echo $email_err; ?></div>
      <?php endif; ?>
      </div>

      <div class="mb-3">
      <input type="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="PASSWORD" name="password" required>
      <?php if (!empty($password_err)): ?>
        <div class="invalid-feedback"><?php echo $password_err; ?></div>
      <?php endif; ?>
      </div>
      <div class="mb-3">
      <input type="password" class="form-control form-control-lg <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" placeholder="CONFIRM PASSWORD" name="confirm_password" required>
      <?php if (!empty($confirm_password_err)): ?>
        <div class="invalid-feedback"><?php echo $confirm_password_err; ?></div>
      <?php endif; ?>
      </div>
      <button type="submit" name="register" class="btn btn-signup">SIGN UP</button>
      <div class="signup-footer mt-3">
      <a href="login.php"> ← Already have an account? Login</a>
      </div>
    </form>
  </div>
</div>

</body>

</html>