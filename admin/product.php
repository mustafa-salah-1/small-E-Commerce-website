<?php
require "check.php";
include "../app/php/config/config.php";
include "../app/php/admin/product/functions.php";
include "../app/php/admin/brand/functions.php";
include "../app/php/admin/category/functions.php";

if (isset($_POST['delete_product'])) {
    deleteProductById($_POST['product_id']);
}

if (isset($_POST['add_product'])) {
    $errors = [];

    include "../app/php/admin/product/validate_insert.php";

    if (empty($errors)) {
        $filename = time() . '_' . basename($product_image["name"]);
        $target_dir = "../public/product-images/main/";
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($product_image["tmp_name"], $target_file)) {
            addProduct($product_name, $product_price, $product_price_sell, $category_id, $brand_id, $filename, $product_quantity, $product_content);
            $_SESSION['success'] = "Product added successfully!";
        } else {
            $_SESSION['error'] = "Failed to upload image";
        }
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
    }
}

if (isset($_POST['update_product'])) {
    $errors = [];

    include "../app/php/admin/product/validate_update.php";

    if (empty($errors)) {
        $product_id = $_POST['product_id'];
        $current_image = $_POST['current_image'];
        $filename = $current_image;

        // Check if a new image was uploaded
        if (!empty($_FILES['update_product_image']['name'])) {
            // Delete the old image file if it exists
            $old_image_path = "../public/product-images/main/" . $current_image;
            if (file_exists($old_image_path) && $current_image != "default.jpg") {
            unlink($old_image_path);
            }
            
            $filename = time() . '_' . basename($_FILES['update_product_image']['name']);
            $target_dir = "../public/product-images/main/";
            $target_file = $target_dir . $filename;

            if (!move_uploaded_file($_FILES['update_product_image']['tmp_name'], $target_file)) {
            $_SESSION['error'] = "Failed to upload new image";
            header("Location: product.php");
            exit;
            }
        }

        updateProduct($product_id, $update_product_name, $update_product_price, 
        $update_product_price_sell, $update_category_id, $update_brand_id, $filename, 
        $update_product_quantity, $update_product_content);
        $_SESSION['success'] = "Product updated successfully!";
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
    }
}
$products = getAllProducts();

$title_page = "Products";
include "../components/admin/app.php";



?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-light sidebar">
            <?php include "../components/admin/sidebar.php"; ?>
        </div>

        <main role="main" class="col-md-10 ml-sm-auto px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Product Management</h2>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    Add New Product
                </button>


            </div>
            <div class="mt-4">
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Price Sell</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td>
                                    <img src="../public/product-images/main/<?php echo $product['product_image']; ?>"
                                        alt="<?php echo $product['product_name']; ?>"
                                        style="width: 60px; object-fit: contain;">
                                </td>
                                <td><?php echo $product['product_name']; ?></td>
                                <td><?php echo $product['product_quantity']; ?></td>
                                <td><?php echo $product['category_name']; ?></td>
                                <td>IQD <?php echo number_format($product['product_price_sell'], 2); ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateProductModal"
                                        data-id="<?php echo $product['id']; ?>"
                                        data-name="<?php echo htmlspecialchars($product['product_name']); ?>"
                                        data-price="<?php echo $product['product_price']; ?>"
                                        data-price-sell="<?php echo $product['product_price_sell']; ?>"
                                        data-quantity="<?php echo $product['product_quantity']; ?>"
                                        data-brand="<?php echo $product['brand_id']; ?>"
                                        data-category="<?php echo $product['category_id']; ?>"
                                        data-content="<?php echo htmlspecialchars($product['product_content']); ?>"
                                        data-image="<?php echo $product['product_image']; ?>">
                                        Update
                                    </button>
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="display: inline;">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <button type="submit" name="delete_product" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%; width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="product_price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="product_price" name="product_price" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="product_price_sell" class="form-label">Price sell</label>
                                <input type="number" class="form-control" id="product_price_sell" name="product_price_sell" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="product_quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="product_quantity" name="product_quantity" min="0" required>
                            </div>
                            <div class="mb-3">
                                <label for="brand_id" class="form-label">Brand</label>
                                <select class="form-select" id="brand_id" name="brand_id" required>
                                    <option value="">Select a brand</option>
                                    <?php
                                    $brands = getAllBrands();
                                    foreach ($brands as $brand) {
                                        echo "<option value=\"{$brand['id']}\">{$brand['brand_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="">Select a category</option>
                                    <?php
                                    $categories = getAllCategories();
                                    foreach ($categories as $category) {
                                        echo "<option value=\"{$category['id']}\">{$category['category_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="product_content" class="form-label">Product Description</label>
                                <textarea class="form-control" id="product_content" name="product_content" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="product_image" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="product_image" name="product_image" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Product Modal -->
<div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%; width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProductModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" id="update_product_id">
                    <input type="hidden" name="current_image" id="current_image">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="update_product_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="update_product_name" name="product_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="update_product_price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="update_product_price" name="product_price" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="update_product_price_sell" class="form-label">Price sell</label>
                                <input type="number" class="form-control" id="update_product_price_sell" name="product_price_sell" step="0.01" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="update_product_quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="update_product_quantity" name="product_quantity" min="0" required>
                            </div>
                            <div class="mb-3">
                                <label for="update_brand_id" class="form-label">Brand</label>
                                <select class="form-select" id="update_brand_id" name="update_brand_id" required>
                                    <option value="">Select a brand</option>
                                    <?php
                                    foreach ($brands as $brand) {
                                        echo "<option value=\"{$brand['id']}\">{$brand['brand_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="update_category_id" class="form-label">Category</label>
                                <select class="form-select" id="update_category_id" name="update_category_id" required>
                                    <option value="">Select a category</option>
                                    <?php
                                    foreach ($categories as $category) {
                                        echo "<option value=\"{$category['id']}\">{$category['category_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="update_product_content" class="form-label">Product Description</label>
                                <textarea class="form-control" id="update_product_content" name="product_content" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="update_product_image" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="update_product_image" name="update_product_image">
                                <small class="form-text text-muted">Leave empty to keep current image</small>
                                <div id="current_image_preview" class="mt-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const updateModal = document.getElementById('updateProductModal');
        if (updateModal) {
            updateModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                // Get data attributes from the button
                const productId = button.getAttribute('data-id');
                const productName = button.getAttribute('data-name');
                const productPrice = button.getAttribute('data-price');
                const productPriceSell = button.getAttribute('data-price-sell');
                const productQuantity = button.getAttribute('data-quantity');
                const brandId = button.getAttribute('data-brand');
                const categoryId = button.getAttribute('data-category');
                const productContent = button.getAttribute('data-content');
                const productImage = button.getAttribute('data-image');

                // Set values to form fields
                document.getElementById('update_product_id').value = productId;
                document.getElementById('update_product_name').value = productName;
                document.getElementById('update_product_price').value = productPrice;
                document.getElementById('update_product_price_sell').value = productPriceSell;
                document.getElementById('update_product_quantity').value = productQuantity;
                document.getElementById('update_brand_id').value = brandId;
                document.getElementById('update_category_id').value = categoryId;
                document.getElementById('update_product_content').value = productContent;
                document.getElementById('current_image').value = productImage;

                // Show current image preview
                const imagePreview = document.getElementById('current_image_preview');
                imagePreview.innerHTML = `<img src="../public/product-images/main/${productImage}" alt="${productName}" style="max-width: 100px; max-height: 100px;">`;
            });
        }
    });
</script>

<?php include "../components/admin/footer.php"; ?>