<?php

function getAllCategoryCount()
{
    global $connect;
    try {
        $sql = "SELECT COUNT(*) AS number_of_categories FROM categories";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['number_of_categories'];
    } catch (PDOException $e) {
        error_log("Error getting category count: " . $e->getMessage());
        return false;
    }
}

function getAllCategories()
{
    global $connect;
    try {
        $sql = "SELECT * FROM categories";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting all categories: " . $e->getMessage());
        return false;
    }
}

function getCategoryById($categoryId)
{
    global $connect;
    try {
        $sql = "SELECT * FROM categories WHERE id = :category_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting category by ID: " . $e->getMessage());
        return false;
    }
}

function addCategory($categoryName, $categoryImage)
{
    global $connect;
    try {
        $sql = "INSERT INTO categories (category_name, category_image) VALUES (:category_name, :category_image)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':category_name', $categoryName, PDO::PARAM_STR);
        $stmt->bindParam(':category_image', $categoryImage, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error inserting category: " . $e->getMessage());
    }
}

function updateCategory($categoryId, $categoryName, $categoryImage)
{
    global $connect;
    try {
        $sql = "UPDATE categories SET category_name = :category_name, category_image = :category_image WHERE id = :category_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->bindParam(':category_name', $categoryName, PDO::PARAM_STR);
        $stmt->bindParam(':category_image', $categoryImage, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error updating category: " . $e->getMessage());
    }
}

function deleteCategory($categoryId)
{
    global $connect;
    try {
        $category = getCategoryById($categoryId);
        if ($category && !empty($category['category_image'])) {
            $imagePath = '../public/categories/' . $category['category_image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $sql = "DELETE FROM categories WHERE id = :category_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error deleting category: " . $e->getMessage());
        return false;
    }
}
