<?php

$title_page = "Game Store Page";
$file_css = "login.css";

include "components/app.php"; ?>


<div class="container d-flex py-5 justify-content-center align-items-center">
  <div class="login-container">
    <div class="login-header">
      <h2><i class="fas fa-user-shield"></i> MEMBER LOGIN</h2>
    </div>
    <div class="green-line mx-auto" style="width: 10%; height: 3px; background:rgb(0, 255, 17); margin-top: 30px;"></div>
    <br><br>
    <form action="home.html" method="get">
      <div class="mb-3">
        <input type="text" class="form-control form-control-lg" placeholder="NAME" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control form-control-lg" placeholder="PASSWORD" required>
      </div>
      <button type="submit" class="btn btn-login">LOGIN</button>
      <div class="green-line mx-auto" style="width: 10%; height: 3px; background:rgb(0, 255, 17); margin-top: 30px;"></div>

      <div class="login-footer mt-3">
        <a href="account.html" id="createAccountLink">Create Account</a> if you don't have account ?!

      </div>
    </form>
  </div>
</div>

<?php include 'components/footer.php'; ?> 