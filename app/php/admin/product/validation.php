<?php

// Validate product name
$product_name = trim($_POST['product_name']);
if (empty($product_name)) {
    $errors[] = "Product name is required";
} elseif (strlen($product_name) > 255) {
    $errors[] = "Product name is too long (maximum 255 characters)";
}

// Validate product content
$product_content = trim($_POST['product_content']);
if (empty($product_content)) {
    $errors[] = "Product content is required";
} elseif (strlen($product_content) > 5000) {
    $errors[] = "Product content is too long (maximum 5000 characters)";
}

// Validate product quantity
$product_quantity = trim($_POST['product_quantity']);
if (empty($product_quantity)) {
    $errors[] = "Product quantity is required";
} elseif (!is_numeric($product_quantity) || $product_quantity < 0 || floor($product_quantity) != $product_quantity) {
    $errors[] = "Product quantity must be a non-negative integer";
}

// Validate product price
$product_price = trim($_POST['product_price']);
if (empty($product_price)) {
    $errors[] = "Product price is required";
} elseif (!is_numeric($product_price) || $product_price <= 0) {
    $errors[] = "Product price must be a positive number";
}

// Validate product price sell
$product_price_sell = trim($_POST['product_price_sell']);
if (empty($product_price_sell)) {
    $errors[] = "Selling price is required";
} elseif (!is_numeric($product_price_sell) || $product_price_sell <= 0) {
    $errors[] = "Selling price must be a positive number";
}

// Validate brand
$brand_id = $_POST['brand_id'];
if (empty($brand_id)) {
    $errors[] = "Please select a brand";
}

// Validate category
$category_id = $_POST['category_id'];
if (empty($category_id)) {
    $errors[] = "Please select a category";
}

// Validate image
$product_image = $_FILES['product_image'];
$target_file = "";

if ($product_image['error'] != 0) {
    $errors[] = "Image upload failed. Please try again.";
} else {
    // Check file type
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($product_image['type'], $allowed_types)) {
        $errors[] = "Only JPG, PNG, GIF, and WEBP images are allowed";
    }

    // Check file size (limit to 2MB)
    if ($product_image['size'] > 2 * 1024 * 1024) {
        $errors[] = "Image size should be less than 2MB";
    }
}
