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
        $sql = "SELECT * FROM products";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error getting all products: " . $e->getMessage() ;
        return false;
    }
}
function getProductById($productId)
{
    global $connect;
    try {
        $sql = "SELECT * FROM products WHERE id = :product_id";
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
