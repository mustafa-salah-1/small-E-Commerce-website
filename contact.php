<?php

$title_page = "Contact Us";
$file_css = "contact.css";

include "app/php/config/config.php";

include "components/app.php"; ?>

<!-- Hero Section -->
<section class="contact-hero d-flex align-items-center justify-content-center">
  <div class="text-center">
    <h1 class="display-3 fw-bold" style="text-shadow: 0 0 10px var(--neon-green);">CONNECT WITH US</h1>
    <p class="lead">We're here to answer your questions 24/7</p>
  </div>
</section>

<!-- Contact Options -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center section-heading mb-5">CONTACT OPTIONS</h2>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="contact-card text-center p-4 rounded h-100">
          <div class="contact-icon mb-3">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <h3>Visit Us</h3>
          <p>University<br>Near 120m Street<br>ISED</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-card text-center p-4 rounded h-100">
          <div class="contact-icon mb-3">
            <i class="fas fa-phone-alt"></i>
          </div>
          <h3>Call Us</h3>
          <p>-0750 123 2323 <br>Mon-Fri: 9am-6pm<br>Sat: 10am-4pm</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-card text-center p-4 rounded h-100">
          <div class="contact-icon mb-3">
            <i class="fas fa-envelope"></i>
          </div>
          <h3>Email Us</h3>
          <p>game-store12@ISED.com
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Form and Map Section -->
<section class="py-5 bg-dark">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-12">
        <h2 class="section-heading mb-4">OUR LOCATION</h2>
        <div class="map-container rounded overflow-hidden" style="height: 400px;">
          <div id="map" style="height: 100%; width: 100%;"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Social Connections -->
<section class="py-5">
  <div class="container text-center">
    <h2 class="section-heading mb-5">CONNECT WITH US</h2>
    <div class="d-flex justify-content-center flex-wrap gap-4">
      <a href="https://www.facebook.com/share/12HeQvGZ2LH/?mibextid=wwXIfr" class="social-icon fs-1 mx-3"><i class="fab fa-facebook"></i></a>
      <a class="social-icon fs-1 mx-3"><i class="fab fa-twitter"></i></a>
      <a href="https://www.instagram.com/7aamaa?igsh=Y2RxajJ6bGp6eWFl&utm_source=qr" class="social-icon fs-1 mx-3"><i class="fab fa-instagram"></i></a>
      <a class="social-icon fs-1 mx-3"><i class="fab fa-linkedin"></i></a>
      <a class="social-icon fs-1 mx-3"><i class="fab fa-github"></i></a>
      <a class="social-icon fs-1 mx-3"><i class="fab fa-discord"></i></a>
    </div>
  </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        

        const lat = 36.1611;
        const lng = 44.0090;

        if (lat && lng) {
            const map = L.map('map').setView([lat, lng], 12);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([lat, lng]).addTo(map)
                .bindPopup('<?php echo htmlspecialchars('Game Store') ?>')
                .openPopup();
        }
    });
</script>

</body>

 </html>