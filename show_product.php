<?php

$title_page = "Show product ";
$file_css = "detail.css";

include "app/php/config/config.php";
include 'components/app.php';
include "app/php/admin/product/functions.php";
include "app/php/admin/product_image/functions.php";
include "app/php/admin/cart/functions.php";

$product = getProductById($_GET['id']);
$images = getImageByIdProduct($_GET['id']);

if(isset($_POST['submit'])) {
    $productId = $_POST['product_id'];
    if (!isset($_SESSION['customer_id'])) {
        header("Location: login.php");
        exit();
    } else {
        addToCart($productId);
        header("Location: cart.php");
        exit();
    }
}
if (!$product) {
    echo "<h1>Product not found</h1>";
    exit();
}
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
            <?php if (count($images) > 0): ?>
                <img src="public/product-images/images/<?= $images[0]['image_name'] ?>" alt="CyberTech Pro X Headset" class="main-product-image" id="mainProductImage">
                <div class="thumbnail-container">
                    <?php foreach ($images as $image): ?>
                        <img src="public/product-images/images/<?= $image['image_name'] ?>" alt="Thumbnail" class="product-thumbnail" onclick="changeMainImage(this, 'public/product-images/images/<?= $image['image_name'] ?>')">
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <img src="public/product-images/main/<?= $product['product_image'] ?>" class="main-product-image" id="mainProductImage">
            <?php endif; ?>
        </div>

        <!-- Product Info -->
        <div class="product-info">

            <h1 class="product-title"><?= $product['product_name'] ?></h1>
            <p class="product-subtitle"><?= $product['product_content'] ?></p>

            <div class="price-container">
                <span class="current-price">IQD <?= number_format($product['product_price_sell']); ?></span>
            </div>
            <!-- Action Buttons -->
            <div class="action-buttons">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="add-to-cart-form">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit" name="submit" class="btn-add-to-cart">
                        <i class="bi bi-cart3"></i> ADD TO CART
                    </button>
                </form>
                <button class="btn-wishlist">
                    <i class="bi bi-heart"></i>
                </button>
            </div>

            <!-- Delivery Info -->
            <div class="delivery-info">
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