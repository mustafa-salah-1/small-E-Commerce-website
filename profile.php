<?php

$title_page = "Game Store Page";
$file_css = "profile.css";

include "app/php/config/config.php";
include "check.php";
include 'components/app.php';

include "app/php/admin/customer/functions.php";

$customer = getCustomerById($_SESSION['customer_id']);
if (!$customer) {
  echo "<h1>Customer not found</h1>";
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $customer_name = $_POST['customer_name'];
  $customer_email = $_POST['customer_email'];
  $customer_phone = $_POST['customer_phone'];
  $new_password = $_POST['new_password'];

  updateCustomer($_SESSION['customer_id'], $customer_name, $customer_email, $customer_phone, $new_password);

  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

?>

<!-- Profile -->
<div class="profile-container">
  <div class="profile-card">
    <div class="row g-4 align-items-center">
      <div class="col-md-4 text-center">
        <img src="public/avatar/<?php echo $customer['customer_image'] ?>" alt="Profile" class="profile-img">
      </div>
      <div class="col-md-8">
        <h2 class="info-title"><?php echo $customer['customer_name'] ?></h2>
        <p><strong>Email:</strong> <?php echo $customer['customer_email'] ?></p>
        <?php if ($customer['customer_phone']): ?>
          <p><strong>Phone:</strong> <?php echo $customer['customer_phone'] ?></p>
        <?php endif; ?>
      </div>
    </div>

    <hr class="my-4 border-light">

    <div class="row text-md-end">
      <div class="col-md-12 d-flex flex-wrap gap-3 justify-content-md-end justify-content-center">
        <button class="btn btn-neon icon-btn"><i class="fas fa-user-edit"></i> Edit Profile</button>
        <button class="btn btn-neon icon-btn"><i class="fas fa-shopping-cart"></i> Buy List</button>
        <button class="btn btn-neon icon-btn"><i class="fas fa-heart"></i> Favourite</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateProfileForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

          <div class="mb-3">
            <label for="customerName" class="form-label">Name</label>
            <input type="text" class="form-control" id="customerName" name="customer_name" value="<?php echo $customer['customer_name'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="customerEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="customerEmail" name="customer_email" value="<?php echo $customer['customer_email'] ?>" required>
            <div class="mb-3">
              <label for="customerPhone" class="form-label">Phone</label>
              <input type="tel" class="form-control" id="customerPhone" name="customer_phone" value="<?php echo $customer['customer_phone'] ?>">
            </div>
            <div class="mb-3">
              <label for="newPassword" class="form-label">New Password</label>
              <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="Leave blank to keep current password">
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-neon">Save Changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const editProfileBtn = document.querySelector('.btn-neon.icon-btn i.fa-user-edit').parentElement;
    editProfileBtn.addEventListener('click', function() {
      const editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
      editProfileModal.show();
    });
  });
</script>

<?php include 'components/footer.php'; ?>