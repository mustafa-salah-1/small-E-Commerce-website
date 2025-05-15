<?php

$title_page = "Shopping Cart";
$file_css = "cart.css";


include "app/php/config/config.php";

include "check.php";

include 'components/app.php';
include "app/php/admin/cart/functions.php";


if (isset($_POST['delete'])) {
    $cartId = $_POST['id'];
    deleteCart($cartId);
}

if (isset($_POST['increase'])) {
    $cartId = $_POST['id'];
    $quantity = $_POST['quantity'];
    updateCart($cartId, $quantity + 1);
}


if (isset($_POST['decrease'])) {
    $cartId = $_POST['id'];
    $quantity = $_POST['quantity'];
    updateCart($cartId, $quantity - 1);
}


if (isset($_POST['checkout'])) {
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

    echo $lat, $lng;
}

$carts = getCartByCustomerId($_SESSION['customer_id']);

?>

<!-- Cart  -->
<div class="cart-container">
    <!-- Back Button -->
    <a class="back-btn" href="index.php">
        <i class="bi bi-arrow-left"></i> CONTINUE SHOPPING
    </a>

    <h1 class="cart-title">Your Shopping Cart</h1>

    <?php if (empty($carts)): ?>
        <div class="empty-cart">
            <i class="bi bi-cart-x"></i>
            <p>Your cart is empty</p>
            <a href="index.php" class="btn-shop-now">Shop Now</a>
        </div>
    <?php else: ?>
        <!-- Cart Items -->
        <div class="cart-items">
            <?php
            $total = 0;
            foreach ($carts as $item):
                $itemTotal = $item['product_price_sell'] * $item['quantity'];
                $total += $itemTotal;
            ?>
                <div class="cart-item">
                    <div class="item-image">
                        <img src="public/product-images/main/<?= $item['product_image'] ?>" alt="<?= $item['product_name'] ?>">
                    </div>
                    <div class="item-details">
                        <h3><?= $item['product_name'] ?></h3>
                        <p class="item-price">IQD <?= $item['product_price_sell'] ?></p>
                    </div>
                    <div class="item-quantity">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="quantity-controls">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <input type="hidden" name="quantity" value="<?= $item['quantity'] ?>">
                            <button type="submit" name="decrease" <?= $item['quantity'] <= 1 ? 'disabled' : '' ?>>-</button>
                            <span><?= $item['quantity'] ?></span>
                            <button type="submit" name="increase" <?= $item['quantity'] >= $item['product_quantity'] ? 'disabled' : '' ?>>+</button>
                        </form>
                    </div>
                    <div class="item-total">
                        <p>IQD <?= $itemTotal ?></p>
                    </div>
                    <div class="item-remove">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="remove-form">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit" name="delete" class="bg-danger text-white p-1 rounded"><i class="bi bi-trash"></i> delete</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="cart-summary">
            <div class="summary-row">
                <span>Subtotal</span>
                <span>IQD <?= $total ?></span>
            </div>
            <div class="summary-row">
                <span>Shipping</span>
                <span>IQD 5000</span>
            </div>
            <div class="summary-row total">
                <span>Total</span>
                <span>IQD <?= $total + 5000 ?></span>
            </div>

            <button type="button" id="selectLocationBtn" class="btn-checkout">
                <i class="bi bi-geo-alt"></i> Select Delivery Location
            </button>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="checkoutForm" style="display: none;">
                <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lng" id="lng">
                <button type="submit" name="checkout" class="btn-checkout">
                    <i class="bi bi-credit-card"></i> PROCEED TO CHECKOUT
                </button>
            </form>
        </div>
    <?php endif; ?>
</div>

<!-- Map Modal -->
<div id="locationModal" class="modal" style="display: none;">
    <div class="modal-content mt-5 bg-dark" style="width: 90%; max-width: 800px; margin-inline: auto;">
        <div class="modal-header">
            <h2 class="text-white" style="font-size: clamp(1.2rem, 4vw, 1.8rem);">Select Delivery Location</h2>
            <span class="close-modal">&times;</span>
        </div>
        <div class="modal-body">
            <div id="map" style="height: 50vh; min-height: 250px; max-height: 400px;"></div>
            <p class="mt-2 text-white" style="font-size: 0.9rem;">Click on the map to select your delivery location</p>
        </div>
        <div class="modal-footer d-flex flex-column flex-sm-row">
            <button type="button" id="cancelLocation" class="btn btn-secondary mb-2 mb-sm-0 me-sm-2 px-3 py-2 rounded w-100 w-sm-auto">
                <i class="bi bi-x-circle"></i> Cancel
            </button>
            <button type="button" id="confirmLocation" class="btn btn-primary px-3 py-2 rounded w-100 w-sm-auto" disabled>
                <i class="bi bi-check-circle"></i> Confirm Location
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('locationModal');
        const selectLocationBtn = document.getElementById('selectLocationBtn');
        const closeModal = document.querySelector('.close-modal');
        const cancelBtn = document.getElementById('cancelLocation');
        const confirmBtn = document.getElementById('confirmLocation');
        const checkoutForm = document.getElementById('checkoutForm');

        let map, marker;
        let selectedLat = 36.1911;
        let selectedLng = 44.0090;

        selectLocationBtn.addEventListener('click', function() {
            modal.style.display = 'block';
            initMap();
        });

        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        cancelBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        function initMap() {
            if (!map) {
                map = L.map("map").setView([selectedLat, selectedLng], 12);

                L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                    attribution: "&copy; OpenStreetMap contributors"
                }).addTo(map);

                marker = L.marker([selectedLat, selectedLng]).addTo(map);
                confirmBtn.disabled = false;


                map.on("click", function(e) {
                    selectedLat = e.latlng.lat;
                    selectedLng = e.latlng.lng;

                    if (marker) {
                        map.removeLayer(marker);
                    }
                    document.getElementById('lat').value = selectedLat;
                    document.getElementById('lng').value = selectedLng;

                    marker = L.marker([selectedLat, selectedLng]).addTo(map);
                    confirmBtn.disabled = false;
                });
            }

            setTimeout(() => {
                map.invalidateSize();
            }, 300);
        }

        confirmBtn.addEventListener('click', function() {
            if (selectedLat != null && selectedLng != null) {
                modal.style.display = 'none';
                checkoutForm.querySelector('input[name="lat"]').value = selectedLat;
                checkoutForm.querySelector('input[name="lng"]').value = selectedLng;
                checkoutForm.style.display = 'block';
            }
        });
    });
</script>

</body>

</html>