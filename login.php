<?php

$title_page = "Game Store Page";
$file_css = "login.css";

include "app/php/config/config.php";


$email = $password = "";
$email_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter email.";
  } else {
    $email = trim($_POST["email"]);
  }

  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  if (empty($email_err) && empty($password_err)) {
    $sql = "SELECT id, customer_email, customer_name, customer_password FROM customers WHERE customer_email = :email";

    if ($stmt = $connect->prepare($sql)) {
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

      $param_email = trim($_POST["email"]);

      if ($stmt->execute()) {
        if ($stmt->rowCount() == 1) {
          if ($row = $stmt->fetch()) {
            $id = $row["id"];
            $email = $row["customer_email"];
            $hashed_password = $row["customer_password"];

            if (password_verify($password, $hashed_password)) {
              session_start();

              $_SESSION["loggedin"] = true;
              $_SESSION["customer_id"] = $id;
              $_SESSION["customer_email"] = $email;
              $_SESSION["customer_name"] = $row["customer_name"];

              header("location: index.php");
            } else {
              $login_err = "Invalid email or password.";
            }
          }
        } else {
          $login_err = "Invalid email or password.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }
  }

  // Close connection
  unset($connect);
}

include "components/app.php"; ?>


<div class="container d-flex py-5 justify-content-center align-items-center">
  <div class="login-container" style="height: auto;">
    <div class="login-header">
      <h2><i class="fas fa-user-shield"></i> MEMBER LOGIN</h2>
    </div>
    <?php
    if (!empty($login_err)) {
      echo '<div class="alert alert-danger">' . $login_err . '</div>';
    }
    ?>
    <div class="green-line mx-auto" style="width: 10%; height: 3px; background:rgb(0, 255, 17); margin-top: 30px;"></div>
    <br><br>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" style="height: auto;">
      <div class="mb-3">
        <input type="email" class="form-control form-control-lg" placeholder="EMAIL" name="email" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control form-control-lg" placeholder="PASSWORD" name="password" required>
      </div>
      <button type="submit" class="btn btn-login">LOGIN</button>
      <div class="green-line mx-auto" style="width: 10%; height: 3px; background:rgb(0, 255, 17); margin-top: 30px;"></div>

      <div class="login-footer mt-3">
        <a href="register.php" id="createAccountLink">Create Account</a> if you don't have account ?!
      </div>
    </form>
  </div>
</div>

<?php include 'components/footer.php'; ?>