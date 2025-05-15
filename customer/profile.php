<?php

$title_page = "Game Store Page";
$file_css = "profile.css";

include 'components/app.php'; ?>
  
<!-- Profile -->
<div class="profile-container">
  <div class="profile-card">
    <div class="row g-4 align-items-center">
      <div class="col-md-4 text-center">
        <img src="../img/pedro.avif" alt="Profile" class="profile-img">
      </div>
      <div class="col-md-8">
        <h2 class="info-title">Mohamed Hoshyar Mohamed</h2>
        <p><strong>Email:</strong> mohamed@example.com</p>
        <p><strong>Phone:</strong> +964 750 000 0000</p>
        <p><strong>Location:</strong> Sweden, Iraq</p>
        <p><strong>Bio:</strong> Gamer | Developer | Designer | Explorer of digital worlds 🚀</p>
        <div class="mt-3">
          <a href="#" class="social-icon"><i class="fab fa-discord"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-steam"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <hr class="my-4 border-light">

    <div class="row text-md-end">
      <div class="col-md-12 d-flex flex-wrap gap-3 justify-content-md-end justify-content-center">
        <button class="btn btn-neon icon-btn"><i class="fas fa-user-edit"></i> Edit Profile</button>
        <button class="btn btn-neon icon-btn"><i class="fas fa-shopping-cart"></i> Buy List</button>
        <button class="btn btn-neon icon-btn"><i class="fas fa-heart"></i> Favourite</button>
        <button class="btn btn-neon icon-btn"><i class="fas fa-cog"></i> Settings</button>
        <button class="btn btn-neon icon-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
      </div>
    </div>
  </div>
</div>

<?php include 'components/footer.php'; ?>