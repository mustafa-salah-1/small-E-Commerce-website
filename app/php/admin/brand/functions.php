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

function addBrand($brandName, $brandImage)
{
    global $connect;
    try {
        $sql = "INSERT INTO brands (brand_name, brand_image) VALUES (:brand_name, :brand_image)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':brand_name', $brandName, PDO::PARAM_STR);
        $stmt->bindParam(':brand_image', $brandImage, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error inserting brand: " . $e->getMessage());
    }
}

function updateBrand($brandId, $brandName, $brandImage)
{
    global $connect;
    try {
        $sql = "UPDATE brands SET brand_name = :brand_name, brand_image = :brand_image WHERE id = :brand_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':brand_id', $brandId, PDO::PARAM_INT);
        $stmt->bindParam(':brand_name', $brandName, PDO::PARAM_STR);
        $stmt->bindParam(':brand_image', $brandImage, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error updating brand: " . $e->getMessage());
    }
}

function deleteBrand($brandId)
{
    global $connect;
    try {
        // Get brand details first to retrieve the image filename
        $brand = getBrandById($brandId);
        if ($brand && !empty($brand['brand_image'])) {
            // Delete the image file from the public folder
            $imagePath = '../public/brands/' . $brand['brand_image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the brand from database
        $sql = "DELETE FROM brands WHERE id = :brand_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':brand_id', $brandId, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error deleting brand: " . $e->getMessage());
        return false;
    }
}
