<?php

// Validate product name
$update_product_name = trim($_POST['product_name']);
if (empty($update_product_name)) {
    $errors[] = "Product name is required";
} elseif (strlen($update_product_name) > 255) {
    $errors[] = "Product name is too long (maximum 255 characters)";
}

// Validate product content
$update_product_content = trim($_POST['product_content']);
if (empty($update_product_content)) {
    $errors[] = "Product content is required";
} elseif (strlen($update_product_content) > 5000) {
    $errors[] = "Product content is too long (maximum 5000 characters)";
}

// Validate product quantity
$update_product_quantity = trim($_POST['product_quantity']);
if (empty($update_product_quantity)) {
    $errors[] = "Product quantity is required";
} elseif (!is_numeric($update_product_quantity) || $update_product_quantity < 0 || floor($update_product_quantity) != $update_product_quantity) {
    $errors[] = "Product quantity must be a non-negative integer";
}

// Validate product price
$update_product_price = trim($_POST['product_price']);
if (empty($update_product_price)) {
    $errors[] = "Product price is required";
} elseif (!is_numeric($update_product_price) || $update_product_price <= 0) {
    $errors[] = "Product price must be a positive number";
}

// Validate product price sell
$update_product_price_sell = trim($_POST['product_price_sell']);
if (empty($update_product_price_sell)) {
    $errors[] = "Selling price is required";
} elseif (!is_numeric($update_product_price_sell) || $update_product_price_sell <= 0) {
    $errors[] = "Selling price must be a positive number";
}
  
// Validate image
$update_product_image = $_FILES['update_product_image'];
$target_file = "";

// Skip validation if no file was uploaded
if (empty($update_product_image['name'])) {
    // No file uploaded, which is allowed (no error)
} elseif ($update_product_image['error'] != 0) {
    $errors[] = "Image upload failed. Please try again.";
} else {
    // Check file type
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($update_product_image['type'], $allowed_types)) {
        $errors[] = "Only JPG, PNG, GIF, and WEBP images are allowed";
    }

    // Check file size (limit to 2MB)
    if ($update_product_image['size'] > 2 * 1024 * 1024) {
        $errors[] = "Image size should be less than 2MB";
    }
}


// Validate brand
$update_brand_id = $_POST['update_brand_id'];
if (empty($update_brand_id)) {
    $errors[] = "Please select a brand";
}

// Validate category
$update_category_id = $_POST['update_category_id'];
if (empty($update_category_id)) {
    $errors[] = "Please select a category";
}
