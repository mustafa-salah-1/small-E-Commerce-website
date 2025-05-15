<?php

function getAllCartCount()
{
    global $connect;
    try {
        $sql = "SELECT COUNT(*) AS number_of_carts FROM cart";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['number_of_carts'];
    } catch (PDOException $e) {
        error_log("Error getting cart count: " . $e->getMessage());
        return false;
    }
}

function getCartByCustomerId($customerId)
{
    global $connect;
    try {
        $sql = "SELECT carts.*, products.product_name 
        FROM carts JOIN products ON products.id = carts.product_id 
        WHERE carts.customer_id = :customer_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting cart by customer ID: " . $e->getMessage());
        return false;
    }
}

function addToCart($productId)
{
    if (!isset($_SESSION['customer_id'])) {
        return false;
    } else {
        global $connect;

        $sq = "SELECT COUNT(*) FROM carts WHERE product_id = :id AND customer_id = :customer_id";
        $st = $connect->prepare($sq);
        $st->bindParam(':id', $productId, PDO::PARAM_INT);
        $customerId = $_SESSION['customer_id'];
        $st->bindParam(':customer_id', $customerId, PDO::PARAM_INT);

        try {
            $st->execute();
            if ($st->fetchColumn() > 0) {
                return false;
            }

            $sql = "INSERT INTO carts (product_id, customer_id, quantity) VALUES (:product_id, :customer_id, :quantity)";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
            $customerId = $_SESSION['customer_id'];
            $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
            $quantity = 1;
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error adding to cart: " . $e->getMessage());
        }
    }
}

function updateCart($cartId, $cartName, $cartImage)
{
    global $connect;
    try {
        $sql = "UPDATE carts SET brand_name = :brand_name, brand_image = :brand_image WHERE id = :cart_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':cart_id', $cartId, PDO::PARAM_INT);
        $stmt->bindParam(':brand_name', $cartName, PDO::PARAM_STR);
        $stmt->bindParam(':brand_image', $cartImage, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error updating cart: " . $e->getMessage());
    }
}
