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
    header('Location: cart.php');
}

if (isset($_POST['increase'])) {
    $cartId = $_POST['id'];
    $quantity = $_POST['quantity'];
    updateCart($cartId, $quantity + 1);
    header('Location: cart.php');
}


if (isset($_POST['decrease'])) {
    $cartId = $_POST['id'];
    $quantity = $_POST['quantity'];
    updateCart($cartId, $quantity - 1);
    header('Location: cart.php');
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

</body>

</html>