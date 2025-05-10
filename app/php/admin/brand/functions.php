<?php

function getAllBrandCount()
{
    global $connect;
    try {
        $sql = "SELECT COUNT(*) AS number_of_brands FROM brands";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['number_of_brands'];
    } catch (PDOException $e) {
        error_log("Error getting brand count: " . $e->getMessage());
        return false;
    }
}

function getAllBrands()
{
    global $connect;
    try {
        $sql = "SELECT * FROM brands";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting all brands: " . $e->getMessage());
        return false;
    }
}

function getBrandById($brandId)
{
    global $connect;
    try {
        $sql = "SELECT * FROM brands WHERE id = :brand_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':brand_id', $brandId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting brand by ID: " . $e->getMessage());
        return false;
    }
}

function getBrandsByCategory($categoryId) 
{
    global $connect;
    try {
        $sql = "SELECT * FROM brands WHERE category_id = :category_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting brands by category ID: " . $e->getMessage());
        return false;
    }
}
