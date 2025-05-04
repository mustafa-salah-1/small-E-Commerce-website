<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="icon" href="../img/logo.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link  rel="stylesheet" href="../css/login.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
  <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/login.css">
</head>
<body class="page">
  <div class="container">
    <div class="login-container">
      <div class="login-header">
        <h2><i class="fas fa-user-shield"></i> MEMBER LOGIN</h2>
      </div>
      <div class="green-line mx-auto" style="width: 10%; height: 3px; background:rgb(0, 255, 17); margin-top: 30px;"></div>
    <br><br>
      <form action="home.html" method="get">
        <div class="mb-3">
          <input type="text" class="form-control form-control-lg" placeholder="NAME" required >
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>