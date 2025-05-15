<?php

$title_page = "Shopping Cart";
$file_css = "cart.css";


include "app/php/config/config.php";

include "check.php";

include 'components/app.php';
include "app/php/admin/cart/functions.php";
?>

<!-- Cart Container -->
<div class="cart-container">
    <!-- Back Button -->
    <a class="back-btn" href="index.php">
        <i class="bi bi-arrow-left"></i> CONTINUE SHOPPING
    </a>

    <h1 class="cart-title">Your Shopping Cart</h1>

    <?php if (empty($cartItems)): ?>
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
            foreach ($cartItems as $item): 
                $product = getProductById($item['product_id']);
                $itemTotal = $product['product_price_sell'] * $item['quantity'];
                $total += $itemTotal;
            ?>
                <div class="cart-item">
                    <div class="item-image">
                        <img src="public/product-images/main/<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                    </div>
                    <div class="item-details">
                        <h3><?= $product['product_name'] ?></h3>
                        <p class="item-price">IQD <?= $product['product_price_sell'] ?></p>
                    </div>
                    <div class="item-quantity">
                        <button onclick="updateQuantity(<?= $item['product_id'] ?>, <?= $item['quantity'] - 1 ?>)" <?= $item['quantity'] <= 1 ? 'disabled' : '' ?>>-</button>
                        <span><?= $item['quantity'] ?></span>
                        <button onclick="updateQuantity(<?= $item['product_id'] ?>, <?= $item['quantity'] + 1 ?>)">+</button>
                    </div>
                    <div class="item-total">
                        <p>IQD <?= $itemTotal ?></p>
                    </div>
                    <div class="item-remove">
                        <button onclick="removeItem(<?= $item['product_id'] ?>)"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Cart Summary -->
        <div class="cart-summary">
            <div class="summary-row">
                <span>Subtotal</span>
                <span>IQD <?= $total ?></span>
            </div>
            <div class="summary-row">
                <span>Shipping</span>
                <span><?= $total > 35000 ? 'Free' : 'IQD 5000' ?></span>
            </div>
            <div class="summary-row total">
                <span>Total</span>
                <span>IQD <?= $total > 35000 ? $total : $total + 5000 ?></span>
            </div>
            <button class="btn-checkout">
                <i class="bi bi-credit-card"></i> PROCEED TO CHECKOUT
            </button>
        </div>
    <?php endif; ?>
</div>

<script>
    function updateQuantity(productId, newQuantity) {
        if (newQuantity < 1) return;
        
        // AJAX call to update cart quantity
        fetch('update_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `product_id=${productId}&quantity=${newQuantity}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            }
        });
    }

    function removeItem(productId) {
        // AJAX call to remove item from cart
        fetch('remove_from_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `product_id=${productId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            }
        });
    }
</script>
</body>
</html>
