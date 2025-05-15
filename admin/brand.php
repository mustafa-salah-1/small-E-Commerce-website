<?php
include "../app/php/config/config.php";
require "check.php";
include "../app/php/admin/brand/functions.php";

if (isset($_POST['delete_brand'])) {
    deleteBrand($_POST['brand_id']);
}

if (isset($_POST['add_brand'])) {
    $errors = [];

    if (empty($_POST['brand_name'])) {
        $errors[] = "Brand name is required";
    }

    if (empty($errors)) {
        $brand_name = $_POST['brand_name'];
        $filename = null;

        // Handle image upload if provided
        if (!empty($_FILES['brand_image']['name'])) {
            $filename = time() . '_' . basename($_FILES["brand_image"]["name"]);
            $target_dir = "../public/brands/";
            $target_file = $target_dir . $filename;

            if (move_uploaded_file($_FILES["brand_image"]["tmp_name"], $target_file)) {
                addBrand($brand_name, $filename);
                $_SESSION['success'] = "Brand added successfully!";
            } else {
                $_SESSION['error'] = "Failed to upload image";
            }
        } else {
            addBrand($brand_name, $filename);
            $_SESSION['success'] = "Brand added successfully!";
        }
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
    }
}

if (isset($_POST['update_brand'])) {
    $errors = [];

    if (empty($_POST['brand_name'])) {
        $errors[] = "Brand name is required";
    }

    if (empty($errors)) {
        $brand_id = $_POST['brand_id'];
        $brand_name = $_POST['brand_name'];
        $current_image = $_POST['current_image'];
        $filename = $current_image;

        // Check if a new image was uploaded
        if (!empty($_FILES['update_brand_image']['name'])) {
            // Delete the old image file if it exists
            if ($current_image && file_exists("../public/brands/" . $current_image)) {
                unlink("../public/brands/" . $current_image);
            }

            $filename = time() . '_' . basename($_FILES['update_brand_image']['name']);
            $target_dir = "../public/brands/";
            $target_file = $target_dir . $filename;

            if (!move_uploaded_file($_FILES['update_brand_image']['tmp_name'], $target_file)) {
                $_SESSION['error'] = "Failed to upload new image";
                header("Location: brand.php");
                exit;
            }
        }

        updateBrand($brand_id, $brand_name, $filename);
        $_SESSION['success'] = "Brand updated successfully!";
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
    }
}

$brands = getAllBrands();

$title_page = "Brands";
include "../components/admin/app.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 p-1 sidebar">
            <?php include "../components/admin/sidebar.php"; ?>
        </div>

        <main role="main" class="col-md-10 ml-sm-auto px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Brand Management</h2>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBrandModal">
                    Add New Brand
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
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Brand Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($brands as $brand): ?>
                            <tr>
                                <td><?php echo $brand['id']; ?></td>
                                <td>
                                    <?php if ($brand['brand_image']): ?>
                                        <img src="../public/brands/<?php echo $brand['brand_image']; ?>"
                                            alt="<?php echo $brand['brand_name']; ?>"
                                            style="width: 60px; object-fit: contain;">
                                    <?php else: ?>
                                        <span>No image</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $brand['brand_name']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateBrandModal"
                                        data-id="<?php echo $brand['id']; ?>"
                                        data-name="<?php echo htmlspecialchars($brand['brand_name']); ?>"
                                        data-image="<?php echo $brand['brand_image']; ?>">
                                        Update
                                    </button>
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="display: inline;">
                                        <input type="hidden" name="brand_id" value="<?php echo $brand['id']; ?>">
                                        <button type="submit" name="delete_brand" class="btn btn-danger btn-sm">Delete</button>
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

<!-- Add Brand Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-secondary">
                <h5 class="modal-title" id="addBrandModalLabel">Add New Brand</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="brand_name" class="form-label">Brand Name</label>
                        <input type="text" class="form-control bg-secondary text-light" id="brand_name" name="brand_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="brand_image" class="form-label">Brand Logo</label>
                        <input type="file" class="form-control bg-secondary text-light" id="brand_image" name="brand_image">
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_brand" class="btn btn-primary">Add Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Brand Modal -->
<div class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="updateBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header border-secondary">
                <h5 class="modal-title" id="updateBrandModalLabel">Update Brand</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="brand_id" id="update_brand_id">
                    <input type="hidden" name="current_image" id="current_image">
                    <div class="mb-3">
                        <label for="update_brand_name" class="form-label">Brand Name</label>
                        <input type="text" class="form-control bg-secondary text-light" id="update_brand_name" name="brand_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_brand_image" class="form-label">Brand Logo</label>
                        <input type="file" class="form-control bg-secondary text-light" id="update_brand_image" name="update_brand_image">
                        <small class="form-text text-muted">Leave empty to keep current logo</small>
                        <div id="current_image_preview" class="mt-2"></div>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_brand" class="btn btn-primary">Update Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const updateModal = document.getElementById('updateBrandModal');
        if (updateModal) {
            updateModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                // Get data attributes from the button
                const brandId = button.getAttribute('data-id');
                const brandName = button.getAttribute('data-name');
                const brandImage = button.getAttribute('data-image');

                // Set values to form fields
                document.getElementById('update_brand_id').value = brandId;
                document.getElementById('update_brand_name').value = brandName;
                document.getElementById('current_image').value = brandImage || '';

                // Show current image preview
                const imagePreview = document.getElementById('current_image_preview');
                if (brandImage) {
                    imagePreview.innerHTML = `<img src="../public/brands/${brandImage}" alt="${brandName}" style="max-width: 100px; max-height: 100px;">`;
                } else {
                    imagePreview.innerHTML = '<p>No image</p>';
                }
            });
        }
    });
</script>

<?php include "../components/admin/footer.php"; ?>