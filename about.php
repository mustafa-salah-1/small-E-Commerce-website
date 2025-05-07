<?php


$title_page = "About Us";
$file_css = "about.css";

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



<!-- footer -->
<footer class="py-4">
  <div class="container text-center">
    <!-- Social Media Icons -->
    <div class="social-icons mb-3">
      <a href="https://www.instagram.com/erbil_polytechnic_university?igsh=MXZyM3R5MmR3ZHI4Zg==" target="_blank" class="social-icon me-3">
        <i class="fab fa-instagram fa-lg"></i>
      </a>
      <a href="https://www.facebook.com/share/15z8EEPEdF/?mibextid=wwXIfr" target="_blank" class="social-icon">
        <i class="fab fa-facebook fa-lg"></i>
      </a>
    </div>

    <p>&copy; 2025 Game Store. All rights reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
  function searchRedirect(event) {
    /* search : game , headset , discount pages */
    event.preventDefault(); // Stop the default form submission
    const query = document.getElementById("searchInput").value.trim().toLowerCase();

    if (query === "games" || query === "game") {
      window.location.href = "games.html";
    }

    if (query === "discount" || query === "discounts") {
      window.location.href = "discount.html";
    }
    if (query === "headset" || query === "headsets") {
      window.location.href = "headsetspage.html";
    }
  }
</script>


</body>

</html>