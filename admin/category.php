<?php
include "../app/php/config/config.php";
require "check.php";
include "../app/php/admin/category/functions.php";

if (isset($_POST['delete_category'])) {
    deleteCategory($_POST['category_id']);
}

if (isset($_POST['add_category'])) {
    $errors = [];

    if (empty($_POST['category_name'])) {
        $errors[] = "Category name is required";
    }

    if (empty($errors)) {
        $category_name = $_POST['category_name'];
        $filename = null;
        
        // Handle image upload if provided
        if (!empty($_FILES['category_image']['name'])) {
            $filename = time() . '_' . basename($_FILES["category_image"]["name"]);
            $target_dir = "../public/categories/";
            $target_file = $target_dir . $filename;

            if (move_uploaded_file($_FILES["category_image"]["tmp_name"], $target_file)) {
                addCategory($category_name, $filename);
                $_SESSION['success'] = "Category added successfully!";
            } else {
                $_SESSION['error'] = "Failed to upload image";
            }
        } else {
            addCategory($category_name, $filename);
            $_SESSION['success'] = "Category added successfully!";
        }
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
    }
}

if (isset($_POST['update_category'])) {
    $errors = [];
    
    if (empty($_POST['category_name'])) {
        $errors[] = "Category name is required";
    }

    if (empty($errors)) {
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        $current_image = $_POST['current_image'];
        $filename = $current_image;

        // Check if a new image was uploaded
        if (!empty($_FILES['update_category_image']['name'])) {
            // Delete the old image file if it exists
            if ($current_image && file_exists("../public/categories/" . $current_image)) {
                unlink("../public/categories/" . $current_image);
            }
            
            $filename = time() . '_' . basename($_FILES['update_category_image']['name']);
            $target_dir = "../public/categories/";
            $target_file = $target_dir . $filename;

            if (!move_uploaded_file($_FILES['update_category_image']['tmp_name'], $target_file)) {
                $_SESSION['error'] = "Failed to upload new image";
                header("Location: category.php");
                exit;
            }
        }

        updateCategory($category_id, $category_name, $filename);
        $_SESSION['success'] = "Category updated successfully!";
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
    }
}

$categories = getAllCategories();

$title_page = "Categories";
include "../components/admin/app.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-light sidebar">
            <?php include "../components/admin/sidebar.php"; ?>
        </div>

        <main role="main" class="col-md-10 ml-sm-auto px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Category Management</h2>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    Add New Category
                </button>
            </div>
            <div class="mt-4">
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?php echo $category['id']; ?></td>
                                <td>
                                    <?php if ($category['category_image']): ?>
                                    <img src="../public/categories/<?php echo $category['category_image']; ?>"
                                        alt="<?php echo $category['category_name']; ?>"
                                        style="width: 60px; object-fit: contain;">
                                    <?php else: ?>
                                    <span>No image</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $category['category_name']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateCategoryModal"
                                        data-id="<?php echo $category['id']; ?>"
                                        data-name="<?php echo htmlspecialchars($category['category_name']); ?>"
                                        data-image="<?php echo $category['category_image']; ?>">
                                        Update
                                    </button>
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="display: inline;">
                                        <input type="hidden" name="category_id" value="<?php echo $category['id']; ?>">
                                        <button type="submit" name="delete_category" class="btn btn-danger btn-sm">Delete</button>
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

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_image" class="form-label">Category Image</label>
                        <input type="file" class="form-control" id="category_image" name="category_image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Category Modal -->
<div class="modal fade" id="updateCategoryModal" tabindex="-1" aria-labelledby="updateCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateCategoryModalLabel">Update Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" id="update_category_id">
                    <input type="hidden" name="current_image" id="current_image">
                    <div class="mb-3">
                        <label for="update_category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="update_category_name" name="category_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="update_category_image" class="form-label">Category Image</label>
                        <input type="file" class="form-control" id="update_category_image" name="update_category_image">
                        <small class="form-text text-muted">Leave empty to keep current image</small>
                        <div id="current_image_preview" class="mt-2"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update_category" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const updateModal = document.getElementById('updateCategoryModal');
        if (updateModal) {
            updateModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                // Get data attributes from the button
                const categoryId = button.getAttribute('data-id');
                const categoryName = button.getAttribute('data-name');
                const categoryImage = button.getAttribute('data-image');

                // Set values to form fields
                document.getElementById('update_category_id').value = categoryId;
                document.getElementById('update_category_name').value = categoryName;
                document.getElementById('current_image').value = categoryImage || '';

                // Show current image preview
                const imagePreview = document.getElementById('current_image_preview');
                if (categoryImage) {
                    imagePreview.innerHTML = `<img src="../public/categories/${categoryImage}" alt="${categoryName}" style="max-width: 100px; max-height: 100px;">`;
                } else {
                    imagePreview.innerHTML = '<p>No image</p>';
                }
            });
        }
    });
</script>

<?php include "../components/admin/footer.php"; ?>
