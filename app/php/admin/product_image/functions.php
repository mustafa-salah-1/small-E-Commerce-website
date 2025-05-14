<?php

function deleteProductById($productId)
{
    global $connect;
    try {
        // First get all the product images
        $sql = "SELECT image_name FROM product_images WHERE product_id = :product_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Delete each image file if it exists
        foreach ($images as $image) {
            if (!empty($image['image_name'])) {
                $imagePath = '../public/product-images/main/' . $image['image_name'];
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        // Delete the image records from product_images table
        $sql = "DELETE FROM product_images WHERE product_id = :product_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();

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

function addProductImage($productId, $productImage)
{
    global $connect;
    try {
        $connect->beginTransaction();

        $sql = "INSERT INTO product_images (product_id, image_name) VALUES (:product_id, :image_name)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':image_name', $productImage);
        $stmt->execute();

        $connect->commit();
        return true;
    } catch (PDOException $e) {
        $connect->rollBack();
        error_log("Error adding product: " . $e->getMessage());
        return false;
    }
}

function getImageByIdProduct($productId)
{
    global $connect;
    try {
        $sql = "SELECT image_name FROM product_images WHERE product_id = :product_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $images;
    } catch (PDOException $e) {
        error_log("Error getting product by ID: " . $e->getMessage());
        return false;
    }
}
