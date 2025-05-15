<?php


$title_page = "About Us";
$file_css = "about.css";

include "app/php/config/config.php";

include "components/app.php"; ?>
 
 
<!-- Hero Section -->
<section class="about-hero">
  <div class="container">
    <h1 class="display-3" style="font-family: 'Orbitron', sans-serif; text-shadow: 0 0 10px #00ff88;">ABOUT K-Gaming</h1>
    <p class="lead">Powered by gamers, for gamers</p>
  </div>
</section>

<!-- Our Story Section -->
<section class="container py-5">
  <h2 class="text-center section-heading">OUR STORY</h2>
  <div class="row">
    <div class="col-lg-8 mx-auto text-center">
      <p class="lead">Founded in 2023 by a team of passionate gamers, K-Gaming started as a small Discord community and grew into the premier destination for elite gaming gear.</p>
      <p>We've revolutionized the gaming equipment industry by combining cutting-edge technology with community-driven design. Every product in our store is tested and approved by our team of professional gamers.</p>
      <button class="btn btn-neon mt-3">Learn More</button>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="container py-5">
  <h2 class="text-center section-heading">WHY CHOOSE US</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="feature-box">
        <div class="feature-icon">⚡</div>
        <h3>Pro-Tested Gear</h3>
        <p>All products are tested by esports professionals to ensure tournament-grade performance.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="feature-box">
        <div class="feature-icon">🔧</div>
        <h3>Custom Mods</h3>
        <p>Exclusive access to custom modifications you won't find anywhere else.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="feature-box">
        <div class="feature-icon">🎮</div>
        <h3>Community Driven</h3>
        <p>Our products are selected based on feedback from thousands of gamers.</p>
      </div>
    </div>
  </div>
</section>



<?php include 'components/footer.php'; ?> 