<?php
 
$title_page = "About Us";
$file_css = "account.css";

include "../components/app.php"; ?>
 
<div class="container">
  <div class="signup-container">
    <div class="signup-header">
      <h2><i class="fas fa-user-plus"></i> CREATE ACCOUNT</h2>
    </div>
    <form>
      <div class="mb-3">
        <input type="text" class="form-control form-control-lg" placeholder="USERNAME" required>
      </div>

      <div class="mb-3">
        <input type="password" class="form-control form-control-lg" placeholder="PASSWORD" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control form-control-lg" placeholder="CONFIRM PASSWORD" required>
      </div>
      <button type="submit" class="btn btn-signup">SIGN UP</button>
      <div class="signup-footer mt-3">
        <a href="login.html"> ← Already have an account? Login</a>
      </div>
    </form>
  </div>
</div> 

<?php include '../components/footer.php'; ?>