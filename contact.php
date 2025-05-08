<?php
 
$title_page = "About Us";
$file_css = "contact.css";

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
            <p>-0750 0900900 <br>Mon-Fri: 9am-6pm<br>Sat: 10am-4pm</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="contact-card text-center p-4 rounded h-100">
            <div class="contact-icon mb-3">
              <i class="fas fa-envelope"></i>
            </div>
            <h3>Email Us</h3>
            <p>Mohamed@ISED.com<br>Dina@ISED.com</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Form and Map Section -->
  <section class="py-5 bg-dark">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-6">
          <h2 class="section-heading mb-4">SEND US A MESSAGE</h2>
          <form>
            <div class="mb-3">
              <label class="form-label">Your Name</label>
              <input type="text" class="form-control" placeholder="Enter your name">
            </div>
            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="mb-3">
              <label class="form-label">Subject</label>
              <input type="text" class="form-control" placeholder="What's this about?">
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea class="form-control" rows="5" placeholder="Your message here..."></textarea>
            </div>
            <button type="submit" class="btn btn-neon px-4 py-2">Send Message <i class="fas fa-paper-plane ms-2"></i></button>
          </form>
        </div>

        <div class="col-lg-6">
          <h2 class="section-heading mb-4">OUR LOCATION</h2>
          <div class="map-container rounded overflow-hidden">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215256751766!2d-73.9878449241646!3d40.74844097932691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1623251234567!5m2!1sen!2sus"
              width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
  
  <?php include 'components/footer.php'; ?>