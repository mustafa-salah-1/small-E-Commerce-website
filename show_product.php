<?php

$title_page = "Show product ";
$file_css = "detail.css";

include 'components/app.php';
include "app/php/config/config.php";
include "app/php/admin/product/functions.php";

$product = getProductById($_GET['id']);
?> 

<!-- Product Detail Container -->
<div class="product-detail-container">
    <!-- Back Button -->
    <a class="back-btn" href="index.php">
        <i class="bi bi-arrow-left"></i> BACK TO PRODUCTS
    </a>

    <!-- Product Hero Section -->
    <div class="product-hero">
        <!-- Product Images -->
        <div class="product-image-container">
            <img src="public/img/14.jpg" alt="CyberTech Pro X Headset" class="main-product-image" id="mainProductImage">
            <div class="thumbnail-container">
                <img src="public/img/15.jpg" alt="Thumbnail 1" class="product-thumbnail active"
                    onclick="changeMainImage(this, 'public/img/15.jpg')">
                <img src="public/img/16.jpg" alt="Thumbnail 2" class="product-thumbnail"
                    onclick="changeMainImage(this, 'public/img/16.jpg')">
                <img src="public/img/17.avif" alt="Thumbnail 3" class="product-thumbnail"
                    onclick="changeMainImage(this, 'public/img/17.avif')">
            </div>
        </div>

        <!-- Product Info -->
        <div class="product-info">
            <div class="product-badges">
                <span class="product-badge badge-new">New</span>
                <span class="product-badge badge-bestseller">Bestseller</span>
            </div>

            <h1 class="product-title">Redragon K552 Kumara</h1>
            <p class="product-subtitle">Mechanical Gaming Keyboard with RGB Backlight</p>

            <div class="rating-container">
                <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                </div>
                <span class="review-count">4,326 reviews</span>
                <span class="stock-status">
                    <i class="bi bi-check-circle-fill"></i> In Stock
                </span>
            </div>

            <div class="price-container">
                <span class="current-price">$36</span>
                <span class="original-price">$49</span>
                <span class="discount-badge">Save $13</span>
            </div>

            <p class="product-description">
                The Redragon K552 Kumara features a compact 87-key mechanical design with Outemu Blue switches for tactile feedback and clicky sound. The durable metal construction and rainbow LED backlighting make it perfect for gaming and typing.
            </p>

            <!-- Color Options -->
            <div class="color-options">
                <h5>COLOR OPTIONS</h5>
                <div class="color-selection">
                    <div class="color-option selected" style="background-color: #ff0000;" title="Red Backlight"></div>
                    <div class="color-option" style="background-color: #00ff00;" title="Green Backlight"></div>
                    <div class="color-option" style="background-color: #0000ff;" title="Blue Backlight"></div>
                    <div class="color-option" style="background-color: #ffffff;" title="White Backlight"></div>
                </div>
            </div>

            <!-- Quantity Selector -->
            <div class="quantity-selector">
                <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                <input type="text" class="quantity-input" value="1" id="productQuantity">
                <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                <span class="stock-warning">Only 8 left in stock</span>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn-add-to-cart">
                    <i class="bi bi-cart3"></i> ADD TO CART
                </button>
                <button class="btn-wishlist">
                    <i class="bi bi-heart"></i>
                </button>
            </div>

            <!-- Delivery Info -->
            <div class="delivery-info">
                <div class="delivery-item">
                    <i class="bi bi-truck"></i>
                    <span>Free shipping on orders over $35</span>
                </div>
                <div class="delivery-item">
                    <i class="bi bi-arrow-repeat"></i>
                    <span>30-day free returns</span>
                </div>
                <div class="delivery-item">
                    <i class="bi bi-shield-check"></i>
                    <span>1-year warranty included</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Tabs -->
    <div class="product-tabs">
        <ul class="nav nav-tabs" id="productTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button" role="tab">SPECIFICATIONS</button>
            </li>
        </ul>

        <div class="tab-content" id="productTabsContent">
            <!-- Specifications Tab -->
            <div class="tab-pane fade show active" id="specs" role="tabpanel">
                <div class="specs-grid">
                    <div class="spec-item">
                        <div class="spec-name">Switch Type</div>
                        <div class="spec-value">Outemu Blue (Clicky)</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-name">Keycaps</div>
                        <div class="spec-value">ABS Double-Shot</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-name">Backlight</div>
                        <div class="spec-value">RGB Rainbow (7 Colors)</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-name">Layout</div>
                        <div class="spec-value">87-key Tenkeyless</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-name">Polling Rate</div>
                        <div class="spec-value">1000Hz</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-name">Construction</div>
                        <div class="spec-value">Metal Top Plate</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-name">Dimensions</div>
                        <div class="spec-value">14.2 x 5.1 x 1.5 inches</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-name">Weight</div>
                        <div class="spec-value">2.2 lbs (1 kg)</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    window.onload = function() {
        // Change main product image
        window.changeMainImage = function(thumbnail, newImage) {
            // Remove active class from all thumbnails
            document.querySelectorAll('.product-thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });

            // Add active class to clicked thumbnail
            thumbnail.classList.add('active');

            // Change main image
            document.getElementById('mainProductImage').src = newImage;
        }

        // Quantity controls
        window.increaseQuantity = function() {
            const quantityInput = document.getElementById('productQuantity');
            let quantity = parseInt(quantityInput.value);
            if (quantity < 10) {
                quantityInput.value = quantity + 1;
            }
        }

        window.decreaseQuantity = function() {
            const quantityInput = document.getElementById('productQuantity');
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
            }
        }

        // Color selection
        document.querySelectorAll('.color-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.color-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                this.classList.add('selected');
            });
        });

        // Initialize Bootstrap tabs if needed
        if (typeof bootstrap !== 'undefined') {
            const tabEls = document.querySelectorAll('button[data-bs-toggle="tab"]');
            tabEls.forEach(tabEl => {
                tabEl.addEventListener('click', function(event) {
                    event.preventDefault();
                    const tab = new bootstrap.Tab(this);
                    tab.show();
                });
            });
        }
    }
</script>

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