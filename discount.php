<?php
 
$title_page = "Game Store Page";
$file_css = "discount.css";

include 'components/app.php'; ?>

<!-- Grid Overlay -->
<div class="grid-overlay"></div>
 
<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">
        <h1>Discount Page</h1>
        <p class="lead">Discover the hottest discounts in the cyber universe. Limited time offers with futuristic savings!</p>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="search-container">
                    <h3 class="mb-3">FIND YOUR PERFECT DEAL</h3>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="What are you looking for?">
                        <select class="form-select form-select-lg" style="max-width: 180px;">
                            <option selected>All Categories</option>
                            <option>Headsets</option>
                            <option>Games</option>
                            <option>Chairs</option>
                            <option>Keyboards</option>
                            <option>Mouses</option>
                            <option>Controllers</option>
                        </select>
                        <button class="btn btn-primary btn-lg" type="button">
                            <i class="fas fa-bolt me-2"></i>Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Deals Carousel -->
<section class="container my-5">
    <h2 class="section-heading mb-4">FEATURED DEALS</h2>
    <div id="featuredCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/27.jpg" class="d-block w-100" alt="Gaming Setup">
                <div class="carousel-caption">
                    <h5>ULTIMATE GAMING BUNDLE</h5>
                    <p>Save 45% on premium gaming gear</p>
                    <button class="btn btn-primary">Shop Now</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/28.avif" class="d-block w-100" alt="Smartphone">
                <div class="carousel-caption">
                    <h5>SMARTPHONE MEGA SALE</h5>
                    <p>Flagship models at 30% discount</p>
                    <button class="btn btn-primary">Shop Now</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/29.jpg" class="d-block w-100" alt="Laptop">
                <div class="carousel-caption">
                    <h5>LAPTOP CLEARANCE</h5>
                    <p>Up to 55% off select models</p>
                    <button class="btn btn-primary">Shop Now</button>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#featuredCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#featuredCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Flash Deals -->
<section class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="section-heading m-0">FLASH DEALS</h2>
        <div class="countdown">
            <span class="badge bg-danger fs-5">
                <i class="fas fa-clock me-2"></i>
                <span id="countdown-timer">23:59:59</span>
            </span>
        </div>
    </div>
    <div class="products-grid">
        <!-- Product 1 -->
        <div class="card" style="--animation-order: 1;">
            <span class="discount-badge">-65%</span>
            <img src="../img/35.jpg" class="card-img-top" alt="Wireless Headphones">
            <div class="card-body">
                <h5 class="card-title">Chair X7</h5>
                <p class="card-text">Noise-canceling wireless headphones with 40hr battery life and crystal clear sound.</p>
                <div class="price-container">
                    <span class="original-price">$299.99</span>
                    <span class="price-tag">$104.99</span>
                </div>
                <button class="btn btn-primary w-100 mt-3">
                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="card" style="--animation-order: 2;">
            <span class="discount-badge">-50%</span>
            <img src="../img/54.jpg" class="card-img-top" alt="Smart Watch">
            <div class="card-body">
                <h5 class="card-title">Monitor 34X</h5>
                <p class="card-text">Advanced health monitoring, 2-week battery, and premium stainless steel design.</p>
                <div class="price-container">
                    <span class="original-price">$249.99</span>
                    <span class="price-tag">$124.99</span>
                </div>
                <button class="btn btn-primary w-100 mt-3">
                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="card" style="--animation-order: 3;">
            <span class="discount-badge">-60%</span>
            <img src="../img/51.jpg" class="card-img-top" alt="4K Camera">
            <div class="card-body">
                <h5 class="card-title">Headset 57H</h5>
                <p class="card-text">Professional 4K video recording with advanced stabilization and low-light performance.</p>
                <div class="price-container">
                    <span class="original-price">$599.99</span>
                    <span class="price-tag">$239.99</span>
                </div>
                <button class="btn btn-primary w-100 mt-3">
                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="card" style="--animation-order: 4;">
            <span class="discount-badge">-55%</span>
            <img src="../img/40.jpg" class="card-img-top" alt="Bluetooth Speaker">
            <div class="card-body">
                <h5 class="card-title">Ari X34</h5>
                <p class="card-text">360° immersive sound with RGB lighting effects and 20-hour playtime Ari X34 RGB.</p>
                <div class="price-container">
                    <span class="original-price">$179.99</span>
                    <span class="price-tag">$80.99</span>
                </div>
                <a class="btn btn-outline-warning w-100 mt-3" href="detailchair.html">
                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
                </a>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="card" style="--animation-order: 4;">
            <span class="discount-badge">-23%</span>
            <img src="../img/38.webp" class="card-img-top" alt="Bluetooth Speaker">
            <div class="card-body">
                <h5 class="card-title">Chair Razer </h5>
                <p class="card-text">360° immersive sound with RGB lighting effects and 20-hour playtime.</p>
                <div class="price-container">
                    <span class="original-price">$179.99</span>
                    <span class="price-tag">$80.99</span>
                </div>
                <button class="btn btn-primary w-100 mt-3">
                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="card" style="--animation-order: 4;">
            <span class="discount-badge">-70%</span>
            <img src="../img/57.webp" class="card-img-top" alt="Bluetooth Speaker">
            <div class="card-body">
                <h5 class="card-title"> gaming Headset</h5>
                <p class="card-text">360° immersive sound with RGB lighting effects and 20-hour playtime.</p>
                <div class="price-container">
                    <span class="original-price">$179.99</span>
                    <span class="price-tag">$80.99</span>
                </div>
                <button class="btn btn-primary w-100 mt-3">
                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="card" style="--animation-order: 4;">
            <span class="discount-badge">-56%</span>
            <img src="../img/24.jpeg" class="card-img-top" alt="Bluetooth Speaker">
            <div class="card-body">
                <h5 class="card-title">Mouse 45D</h5>
                <p class="card-text">360° immersive sound with RGB lighting effects and 20-hour playtime.</p>
                <div class="price-container">
                    <span class="original-price">$179.99</span>
                    <span class="price-tag">$80.99</span>
                </div>
                <button class="btn btn-primary w-100 mt-3">
                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="card" style="--animation-order: 4;">
            <span class="discount-badge">-20%</span>
            <img src="../img/19.jpg" class="card-img-top" alt="Bluetooth Speaker">
            <div class="card-body">
                <h5 class="card-title">Keyboard X34</h5>
                <p class="card-text">360° immersive sound with RGB lighting effects and 20-hour playtime.</p>
                <div class="price-container">
                    <span class="original-price">$179.99</span>
                    <span class="price-tag">$80.99</span>
                </div>
                <button class="btn btn-primary w-100 mt-3">
                    <i class="fas fa-cart-plus me-2"></i>Add to Cart
                </button>
            </div>
        </div>


    </div>
    <div class="text-center mt-4">
        <button class="btn see-all-btn btn-outline-light">
            View All Flash Deals <i class="fas fa-arrow-right"></i>
        </button>
    </div>
</section>

<!-- Categories -->
<section class="container categories my-5">
    <h2 class="section-heading mb-4">SHOP BY CATEGORY</h2>
    <div class="row g-4">
        <!-- Category 1 -->
        <div class="col-md-4 col-sm-6">
            <div class="category-card text-center p-4" style="--animation-order: 1;">
                <img src="../img/29.jpg" alt="Gaming" class="img-fluid rounded">
                <h4 class="category-title mt-3">Gaming Mouses</h4>
                <p class="text-light">Consoles, accessories & more</p>
                <button class="btn btn-outline-light btn-sm">View Deals</button>
            </div>
        </div>

        <!-- Category 2 -->
        <div class="col-md-4 col-sm-6">
            <div class="category-card text-center p-4" style="--animation-order: 2;">
                <img src="../img/60.png" alt="Smartphones" class="img-fluid rounded">
                <h4 class="category-title mt-3">SmartHeadphones</h4>
                <p class="text-light">Latest models & accessories</p>
                <button class="btn btn-outline-light btn-sm">View Deals</button>
            </div>
        </div>

        <!-- Category 3 -->
        <div class="col-md-4 col-sm-6">
            <div class="category-card text-center p-4">
                <img src="../img/38.webp" alt="Laptops" class="img-fluid rounded">
                <h4 class="category-title mt-3">Chairs</h4>
                <p class="text-light">Powerful machines for work & play</p>
                <button class="btn btn-outline-light btn-sm">View Deals</button>
            </div>
        </div>

        <!-- Category 4 -->
        <div class="col-md-4 col-sm-6">
            <div class="category-card text-center p-4">
                <img src="../img/25.jpg" alt="Wearables" class="img-fluid rounded">
                <h4 class="category-title mt-3">Mouses</h4>
                <p class="text-light">Smartwatches & fitness trackers</p>
                <button class="btn btn-outline-light btn-sm">View Deals</button>
            </div>
        </div>

        <!-- Category 5 -->
        <div class="col-md-4 col-sm-6">
            <div class="category-card text-center p-4">
                <img src="../img/17.avif" alt="Home Tech" class="img-fluid rounded">
                <h4 class="category-title mt-3">Keyboards</h4>
                <p class="text-light">Smart home devices & gadgets</p>
                <button class="btn btn-outline-light btn-sm">View Deals</button>
            </div>
        </div>

        <!-- Category 5 -->
        <div class="col-md-4 col-sm-6">
            <div class="category-card text-center p-4">
                <img src="../img/54.jpg" alt="Home Tech" class="img-fluid rounded">
                <h4 class="category-title mt-3">Home HeadSets</h4>
                <p class="text-light">Smart home devices & gadgets</p>
                <button class="btn btn-outline-light btn-sm">View Deals</button>
            </div>
        </div>

    </div>
</section>
 
<?php include 'components/footer.php'; ?> 