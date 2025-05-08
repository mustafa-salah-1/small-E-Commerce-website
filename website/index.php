<?php

$title_page = "Game Store Page";
$file_css = "home.css";

include '../components/app.php'; ?>
  
  <!-- <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/w2.jpg" class="d-block w-100" alt="Slide 1" />
      </div>
      <div class="carousel-item">
        <img src="../img/w1.webp" class="d-block w-100" alt="Slide 2" />
      </div>
      <div class="carousel-item">
        <img src="../img/w3.jpg" class="d-block w-100" alt="Slide 3" />
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div> -->
   
  <div class="d2" id="d2">
    <!-- Cards Section -->
    <section id="products" class="container-xl py-5">
      <h2 class="text-center mb-5 section-heading">Keyboard Products</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">

        <div class="col">
          <div class="card">
            <img src="../img/11.jpg" class="card-img-top" alt="Mechanical Keyboard">
            <div class="card-body">
              <h5 class="card-title">Razer BlackWidow V4</h5>
              <p class="card-text">Mechanical gaming keyboard with Razer Yellow switches and per-key RGB.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$149</span>
              </div>
            </div>
          </div>
        </div>


        <div class="col">
          <div class="card">
            <img src="../img/14.jpg" class="card-img-top" alt="Mechanical Keyboard">
            <div class="card-body">
              <h5 class="card-title">SteelSeries Apex Pro</h5>
              <p class="card-text">OmniPoint adjustable switches with OLED smart display RGB Color.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="detailkeyboard.html" class="btn btn-outline-warning see-all-btn">Click Me</a>
                <span class="price-tag">$199</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/15.jpg" class="card-img-top" alt="Mechanical Keyboard">
            <div class="card-body">
              <h5 class="card-title">HyperX Alloy Origins</h5>
              <p class="card-text">Aircraft-grade aluminum body with HyperX mechanical switches.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$109</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/16.jpg" class="card-img-top" alt="Mechanical Keyboard">
            <div class="card-body">
              <h5 class="card-title">ASUS ROG Strix Scope</h5>
              <p class="card-text">Cherry MX switches with ergonomic design for FPS gaming.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$129</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/17.avif" class="card-img-top" alt="Mechanical Keyboard">
            <div class="card-body">
              <h5 class="card-title">Ducky One 3</h5>
              <p class="card-text">PBT double-shot keycaps with Cherry MX switch options RGB.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$119</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/18.jpg" class="card-img-top" alt="Mechanical Keyboard">
            <div class="card-body">
              <h5 class="card-title">Keychron Q3</h5>
              <p class="card-text">Custom mechanical keyboard with gasket-mounted design RGB.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$169</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/19.jpg" class="card-img-top" alt="Mechanical Keyboard">
            <div class="card-body">
              <h5 class="card-title">Glorious GMMK Pro</h5>
              <p class="card-text">75% layout with rotary encoder and hot-swappable switches.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$169</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/12.jpg" class="card-img-top" alt="Mechanical Keyboard">
            <div class="card-body">
              <h5 class="card-title">Akko 3068B</h5>
              <p class="card-text">65% compact layout with Akko CS switches and PBT keycaps.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$89</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>
    
 <?php include '../components/footer.php'; ?> 