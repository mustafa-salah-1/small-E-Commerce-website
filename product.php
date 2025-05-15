<?php

$title_page = "Game Store - Products";
$file_css = "product.css";

include "app/php/config/config.php";
include "check.php";
include 'components/app.php';

// Include product-related functions
include "app/php/admin/product/functions.php";
include "app/php/admin/brand/functions.php";
include "app/php/admin/category/functions.php";

// Get filter parameters
$brand_id = isset($_GET['brand']) ? $_GET['brand'] : null;
$category_id = isset($_GET['category']) ? $_GET['category'] : null;
$search_term = isset($_GET['search']) ? $_GET['search'] : '';

// Get all brands and categories for filters
$brands = getAllBrands();
$categories = getAllCategories();

// Get filtered products
if ($brand_id || $category_id || !empty($search_term)) {
    $products = getFilteredProducts($brand_id, $category_id, $search_term);
} else {
    $products = getAllProducts();
}

?>

<!-- Product Filters -->
<div class="container mt-4">
    <div class="card bg-dark text-light">
        <div class="card-header">
            <h3>Filter Products</h3>
        </div>
        <div class="card-body">
            <form action="product.php" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label for="brand" class="form-label">Brand</label>
                    <select class="form-select" name="brand" id="brand">
                        <option value="">All Brands</option>
                        <?php foreach ($brands as $brand): ?>
                            <option value="<?php echo $brand['id']; ?>" <?php echo ($brand_id == $brand['id']) ? 'selected' : ''; ?>>
                                <?php echo $brand['brand_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category" id="category">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>" <?php echo ($category_id == $category['id']) ? 'selected' : ''; ?>>
                                <?php echo $category['category_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="search" class="form-label">Search</label>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($search_term); ?>">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100 d-flex align-items-center justify-content-center gap-2">
                        <i class="fas fa-search"></i> Filter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Products Display -->
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="text-light">Our Products</h2>
            <?php if (!empty($search_term) || $brand_id || $category_id): ?>
                <p class="text-light">
                    Showing results for
                    <?php
                    $filter_parts = [];
                    if (!empty($search_term)) $filter_parts[] = "search: \"" . htmlspecialchars($search_term) . "\"";
                    if ($brand_id) {
                        foreach ($brands as $brand) {
                            if ($brand['id'] == $brand_id) $filter_parts[] = "brand: " . $brand['brand_name'];
                        }
                    }
                    if ($category_id) {
                        foreach ($categories as $category) {
                            if ($category['id'] == $category_id) $filter_parts[] = "category: " . $category['category_name'];
                        }
                    }
                    echo implode(", ", $filter_parts);
                    ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <?php if (empty($products)): ?>
        <div class="alert alert-info">No products found matching your criteria.</div>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
            <?php foreach ($products as $product): ?>
                <a href="show_product.php?id=<?= $product['id'] ?>" class="text-decoration-none col">
                    <div class="card h-100 bg-dark text-light product-card d-flex flex-column">
                        <div class="image-container" style="height: 200px; overflow: hidden;">
                            <img src="public/product-images/main/<?php echo $product['product_image']; ?>" class="card-img-top h-100 object-fit-cover" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate"><?php echo htmlspecialchars($product['product_name']); ?></h5>
                            <div class="product-info mb-2">
                                <span class="badge bg-primary me-1"><?php
                                    foreach ($brands as $brand) {
                                        if ($brand['id'] == $product['brand_id']) echo htmlspecialchars($brand['brand_name']);
                                    }
                                ?></span>
                                <span class="badge bg-secondary"><?php
                                    foreach ($categories as $category) {
                                        if ($category['id'] == $product['category_id']) echo htmlspecialchars($category['category_name']);
                                    }
                                ?></span>
                            </div>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="price">IQD <?php echo number_format($product['product_price']); ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>


<?php include 'components/footer.php'; ?>