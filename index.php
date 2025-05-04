<?php

$title_page = "Game Store Page";
$file_css = "home.css";

include 'components/app.php'; ?>
 
 
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

  <div class="d1">
    <!-- Cards Section -->
    <section id="products" class="container-xl py-5">
      <h2 class="text-center mb-5 section-heading">Controller Products</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">

        <div class="col">
          <div class="card">
            <img src="../img/5.jpg" class="card-img-top img-fluid" alt="Xbox Controller">
            <div class="card-body ">
              <h5 class="card-title">Xbox Wireless - Electric Purple</h5>
              <p class="card-text">Official Microsoft controller with textured grip.</p>
              <div class="d-flex justify-content-between" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$59.99</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/4.jpg" class="card-img-top" alt="Xbox Controller">
            <div class="card-body">
              <h5 class="card-title">Xbox Wireless Controller - Pulse Red</h5>
              <p class="card-text">Official controller with hybrid D-pad .</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$59.99</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/2.webp" class="card-img-top" height="250" alt="PS4 Controller">
            <div class="card-body">
              <h5 class="card-title">Green Camouflage - Color RGB</h5>
              <p class="card-text"> ElectricOfficial PlayStation 4 controller with built.</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$64.99</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card" style="display: flex;flex-direction: column;justify-content: space-between;height: 100%;">
            <img src="../img/1.jpeg" class="card-img-top " height="250" alt="PS4 Controller">
            <div class="card-body">
              <h5 class="card-title">DualShock 4 - Glacier White</h5>
              <p class="card-text">Official wireless controller with touch pad and motion.</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$59.99</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/6.jpg" class="card-img-top" alt="PS4 Controller">
            <div class="card-body">
              <h5 class="card-title">DualShock 4 - Sunset Orange</h5>
              <p class="card-text">Limited edition controller with light bar and share button.</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$69.99</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/3.jpg" class="card-img-top" alt="PS5 Controller">
            <div class="card-body">
              <h5 class="card-title">DualSense - White</h5>
              <p class="card-text">Official PS5 controller with haptic feedback and adaptive triggers.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$69.99</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/7.avif" class="card-img-top" alt="PS5 Controller">
            <div class="card-body">
              <h5 class="card-title">DualSense - Cosmic Red</h5>
              <p class="card-text">Premium controller with built-in microphone and touch pad.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$74.99</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/8.webp" class="card-img-top" alt="PS5 Controller">
            <div class="card-body">
              <h5 class="card-title">DualSense - Galactic Purple</h5>
              <p class="card-text">Special edition controller with USB-C charging.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$74.99</span>
              </div>
            </div>
          </div>
        </div>


      </div>
    </section>
  </div>


  <!-- Add this after your product cards in each section -->
  <div class="text-center mt-4">
    <a class="btn btn-outline-light see-all-btn">
      See All Controllers <i class="fas fa-chevron-right"></i>
    </a>
    <br>
    <div class="green-line mx-auto" style="width: 10%; height: 3px; background:rgb(0, 255, 17); margin-top: 30px;"></div>
  </div> <br><br>

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

  <!-- Add this after your product cards in each section -->
  <div class="text-center mt-4">
    <a class="btn btn-outline-light see-all-btn">
      See All Keyboards <i class="fas fa-chevron-right"></i>
    </a>
    <br>
    <div class="green-line mx-auto" style="width: 10%; height: 3px; background:rgb(0, 255, 17); margin-top: 30px;"></div>
  </div> <br><br>

  <div class="d3" id="d3">
    <!-- Cards Section -->
    <section id="products" class="container-xl py-5">
      <h2 class="text-center mb-5 section-heading">Mouse Products</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">

        <div class="col">
          <div class="card">
            <img src="../img/21.jpg" class="card-img-top" alt="Razer Viper Mini">
            <div class="card-body">
              <h5 class="card-title">Razer Viper Mini</h5>
              <p class="card-text">Ultra-light gaming mouse with 8500 DPI optical sensor RGB Gaming.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$39</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/22.webp" class="card-img-top" alt="Logitech G502 Hero">
            <div class="card-body">
              <h5 class="card-title">Logitech G502 Hero</h5>
              <p class="card-text">High-performance wired mouse with 11 programmable buttons.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$49</span>
              </div>
            </div>
          </div>
        </div>



        <div class="col">
          <div class="card">
            <img src="../img/24.jpeg" class="card-img-top" alt="Corsair M65 RGB Ultra">
            <div class="card-body">
              <h5 class="card-title">Corsair M65 RGB Ultra</h5>
              <p class="card-text">Aluminum frame mouse with adjustable weight system RGB Gaming..</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$43</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/25.jpg" class="card-img-top" alt="ASUS ROG Gladius II">
            <div class="card-body">
              <h5 class="card-title">ASUS ROG Gladius II</h5>
              <p class="card-text">Ergonomic mouse with swappable Omron switches RGB Gaming..</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$69</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/26.jpg" class="card-img-top" alt="HyperX Pulsefire Haste">
            <div class="card-body">
              <h5 class="card-title">HyperX Pulsefire Haste</h5>
              <p class="card-text">Lightweight honeycomb shell design with TTC Golden switches RGB Gaming..</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$49</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/27.jpg" class="card-img-top" alt="Razer DeathAdder V2">
            <div class="card-body">
              <h5 class="card-title">Razer DeathAdder V2</h5>
              <p class="card-text">Legendary ergonomic mouse with Focus+ 20K DPI sensor RGB Gaming..</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="detailmouse.html" class="btn btn-outline-warning see-all-btn">Click Me</a>
                <span class="price-tag">$69</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/28.avif" class="card-img-top" alt="Logitech G Pro Wireless">
            <div class="card-body">
              <h5 class="card-title">Logitech G Pro Wireless</h5>
              <p class="card-text">Esports-grade wireless mouse with HERO 16K sensor RGB Gaming..</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$129</span>
              </div>
            </div>
          </div>
        </div>


        <div class="col">
          <div class="card">
            <img src="../img/30.jpg" class="card-img-top" alt="Zowie EC2">
            <div class="card-body">
              <h5 class="card-title">Zowie EC2</h5>
              <p class="card-text">Professional esports mouse with perfect ergonomic shape RGB Gaming..</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$59</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>

  <!-- Add this after your product cards in each section -->
  <div class="text-center mt-4">
    <a class="btn btn-outline-light see-all-btn">
      See All Mouses <i class="fas fa-chevron-right"></i>
    </a>
    <br>
    <div class="green-line mx-auto" style="width: 10%; height: 3px; background:rgb(0, 255, 17); margin-top: 30px;"></div>
  </div> <br><br>


  <div class="d4" id="d4">
    <!-- Cards Section -->
    <section id="products" class="container-xl py-5">
      <h2 class="text-center mb-5 section-heading">Chair Products</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">

        <div class="col">
          <div class="card">
            <img src="../img/31.jpeg" class="card-img-top" alt="Gaming Chair">
            <div class="card-body">
              <h5 class="card-title">Razer Enki Pro</h5>
              <p class="card-text">Premium ergonomic gaming chair with multi-layer synthetic leather.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$499</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/32.jpg" class="card-img-top" alt="Gaming Chair">
            <div class="card-body">
              <h5 class="card-title">Secretlab Titan Evo</h5>
              <p class="card-text">Memory foam lumbar support with 4D armrests and premium PU leather.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$549</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/33.jpg" class="card-img-top" alt="Office Chair">
            <div class="card-body">
              <h5 class="card-title">Herman Miller Embody</h5>
              <p class="card-text">High-end ergonomic chair with pixelated support and breathable fabric.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$1595</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/34.jpeg" class="card-img-top" alt="Gaming Chair">
            <div class="card-body">
              <h5 class="card-title">Noblechairs Hero</h5>
              <p class="card-text">Racing-style chair with cold foam padding and steel frame RGB.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$449</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/35.jpg" class="card-img-top" alt="Gaming Chair">
            <div class="card-body">
              <h5 class="card-title">Corsair T3 Rush</h5>
              <p class="card-text">Soft fabric gaming chair with memory foam head pillow RGB.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$349</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/36.webp" class="card-img-top" alt="Gaming Chair">
            <div class="card-body">
              <h5 class="card-title">AKRacing Masters Series</h5>
              <p class="card-text">Premium leather gaming chair with 4D armrests.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$399</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/39.jpg" class="card-img-top" alt="Gaming Chair">
            <div class="card-body">
              <h5 class="card-title">AndaSeat Kaiser 3</h5>
              <p class="card-text">XL-sized gaming chair with premium PVC leather and lumbar support.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$499</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/40.jpg" class="card-img-top" alt="Gaming Chair">
            <div class="card-body">
              <h5 class="card-title">Cougar Armor One</h5>
              <p class="card-text">Racing-style gaming chair with steel frame and 4D armrests.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$299</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>

  <!-- Add this after your product cards in each section -->
  <div class="text-center mt-4">
    <a class="btn btn-outline-light see-all-btn">
      See All Chairs <i class="fas fa-chevron-right"></i>
    </a>
    <br>
    <div class="green-line mx-auto" style="width: 10%; height: 3px; background:rgb(0, 255, 17); margin-top: 30px;"></div>
  </div> 
  
  <br><br>


  <div class="d5">
    <!-- Cards Section -->
    <section id="products" class="container-xl py-5">
      <h2 class="text-center mb-5 section-heading">Headset Products</h2>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">

        <div class="col">
          <div class="card">
            <img src="../img/50.jpg" class="card-img-top" alt="Gaming Headset">
            <div class="card-body">
              <h5 class="card-title">Razer BlackShark V2 Pro</h5>
              <p class="card-text">Wireless esports headset with TriForce Titanium 50mm.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$179</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/51.jpg" class="card-img-top" alt="Gaming Headset">
            <div class="card-body">
              <h5 class="card-title">SteelSeries Arctis Nova Pro</h5>
              <p class="card-text">Premium wireless headset with active noise cancellation.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$349</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/52.jpg" class="card-img-top" alt="Gaming Headset">
            <div class="card-body">
              <h5 class="card-title">Logitech G Pro X 2</h5>
              <p class="card-text">Lightweight wireless headset with Blue VO!CE microphone RGB.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$249</span>
              </div>
            </div>
          </div>
        </div>


        <div class="col">
          <div class="card">
            <img src="../img/54.jpg" class="card-img-top" alt="Gaming Headset">
            <div class="card-body">
              <h5 class="card-title">Corsair Virtuoso RGB</h5>
              <p class="card-text">High-fidelity wireless headset with broadcast-quality mic RGB.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$179</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/56.jpg" class="card-img-top" alt="Gaming Headset">
            <div class="card-body">
              <h5 class="card-title">Turtle Beach Stealth Pro</h5>
              <p class="card-text">Active noise cancellation with dual wireless connectivity RGB.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$329 </span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/57.webp" class="card-img-top" alt="Gaming Headset">
            <div class="card-body">
              <h5 class="card-title">EPOS H6Pro</h5>
              <p class="card-text">Closed-back design with premium memory foam ear cushions.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$179</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/58.jpg" class="card-img-top" alt="Gaming Headset">
            <div class="card-body">
              <h5 class="card-title">ROG Delta S Wireless</h5>
              <p class="card-text">ESS quad-DAC with AI beamforming microphone RGB.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$229</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../img/59.jpg" class="card-img-top" alt="Gaming Headset">
            <div class="card-body">
              <h5 class="card-title">JBL Quantum 910</h5>
              <p class="card-text">Wireless headset with QuantumSPHERE 360 surround sound RGB.</p>
              <div class="d-flex justify-content-between align-items-center" style="margin-top: auto;">
                <a href="#" class="btn btn-primary">Buy Now</a>
                <span class="price-tag">$249</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>

  <!-- Add this after your product cards in each section -->
  <div class="text-center mt-4">
    <a href="headsetspage.html" class="btn btn-outline-warning see-all-btn" style="font-family:'Orbitron', sans-serif;">
      See All Headsets <i class="fas fa-chevron-right"></i>
    </a>
    <br>
    <div class="green-line mx-auto" style="width: 10%; height: 3px; background:rgb(0, 255, 17); margin-top: 30px;"></div>
  </div> 
  
  <br><br>



  <!-- About Section -->
  <section id="about" class="container py-5">
    <h2 class="text-center mb-4 section-heading">About Game Store</h2>
    <p class="text-center">Game Store is the premier destination for elite gamers seeking the latest and greatest gear.
      From headsets and keyboards to exclusive merchandise, we supply the best to fuel your passion. Our team is made of
      dedicated gamers who know what you want and deliver it fast.</p>
  </section>


 <?php include 'components/footer.php'; ?> 