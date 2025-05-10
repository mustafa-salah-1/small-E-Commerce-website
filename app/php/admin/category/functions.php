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

function getSubcategoriesByParent($parentId) 
{
    global $connect;
    try {
        $sql = "SELECT * FROM categories WHERE parent_id = :parent_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':parent_id', $parentId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting subcategories by parent ID: " . $e->getMessage());
        return false;
    }
}
