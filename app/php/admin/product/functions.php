<?php

function getAllProductCount()
{
    global $connect;
    try {
        $sql = "SELECT COUNT(*) AS number_of_product FROM products";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['number_of_product'];
    } catch (PDOException $e) {
        error_log("Error getting product count: " . $e->getMessage());
        return false;
    }
}

function getAllProducts()
{
    global $connect;

    if (!$connect) {
        echo  "Database connection not established";
        return false;
    }

    try {
        $sql = "SELECT p.*, c.category_name, b.brand_name 
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            LEFT JOIN brands b ON p.brand_id = b.id";

        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error getting all products: " . $e->getMessage();
        return false;
    }
}

function getProductsByCategory($categoryName, $limit = 8)
{
    global $connect;
    try {
        $sql = "SELECT p.*, c.category_name
                FROM products p
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE c.category_name = :category_name
                AND p.product_quantity > 0
                LIMIT :limit";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':category_name', $categoryName, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting products by category: " . $e->getMessage());
        return false;
    }
}

function getProductById($productId)
{
    global $connect;
    try {
        $sql = "SELECT p.*, c.category_name, b.brand_name 
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            LEFT JOIN brands b ON p.brand_id = b.id
            WHERE p.id = :product_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting product by ID: " . $e->getMessage());
        return false;
    }
}

function deleteProductById($productId)
{
    global $connect;
    try {
        // First get the product image filename
        $sql = "SELECT product_image FROM products WHERE id = :product_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product && !empty($product['product_image'])) {
            // Define the path to the product image
            $imagePath = '../public/product-images/main/' . $product['product_image'];

            // Delete the image file if it exists
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Now delete the product from the database
        $sql = "DELETE FROM products WHERE id = :product_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error deleting product by ID: " . $e->getMessage());
        return false;
    }
}

function addProduct($productName, $productPrice, $productPriceSell, $categoryId, $brandId, $productImage, $quantity, $content)
{
    global $connect;
    try {
        $sql = "INSERT INTO products (product_name, product_price, product_price_sell, category_id, brand_id, product_image, product_quantity, product_content) 
                VALUES (:name, :price, :price_sell, :category_id, :brand_id, :image, :quantity, :content)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':name', $productName);
        $stmt->bindParam(':price', $productPrice);
        $stmt->bindParam(':price_sell', $productPriceSell);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->bindParam(':brand_id', $brandId);
        $stmt->bindParam(':image', $productImage);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error adding product: " . $e->getMessage());
        return false;
    }
}

function updateProduct($productId, $productName, $productPrice, $productPriceSell, $categoryId, $brandId, $productImage, $quantity, $content)
{
    global $connect;
    try {

        $sql = "UPDATE products SET 
                product_name = :name, 
                product_price = :price, 
                product_price_sell = :price_sell, 
                category_id = :category_id, 
                brand_id = :brand_id, 
                product_image = :image, 
                product_quantity = :quantity, 
                product_content = :content 
                WHERE id = :product_id";

        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $productName);
        $stmt->bindParam(':price', $productPrice);
        $stmt->bindParam(':price_sell', $productPriceSell);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->bindParam(':brand_id', $brandId);
        $stmt->bindParam(':image', $productImage);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':content', $content);

        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error updating product: " . $e->getMessage());
        return false;
    }
}

function decreaseProductQuantity($productId, $amount)
{
    global $connect;
    try {
        $sql = "SELECT product_quantity FROM products WHERE id = :product_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            return false;
        }

        $newQuantity = max(0, $product['product_quantity'] - $amount);

        $sql = "UPDATE products SET product_quantity = :quantity WHERE id = :product_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $newQuantity, PDO::PARAM_INT);

        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error decreasing product quantity: " . $e->getMessage());
        return false;
    }
}
