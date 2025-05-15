<?php
include "../app/php/config/config.php";
require "check.php";
include "../app/php/admin/customer/functions.php";

$customers = getAllCustomers();

$title_page = "Customers";
include "../components/admin/app.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-light sidebar">
            <?php include "../components/admin/sidebar.php"; ?>
        </div>

        <main role="main" class="col-md-10 ml-sm-auto px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Customer Management</h2>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $customer): ?>
                            <tr>
                                <td><?php echo $customer['id']; ?></td>
                                <td><?php echo $customer['customer_name']; ?></td>
                                <td><?php echo $customer['customer_email']; ?></td>
                                <td><?php echo $customer['customer_password'] ?? 'N/A'; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($customer['created_at'])); ?></td>
                                <td>
                                    <a href="customer_details.php?id=<?php echo $customer['id']; ?>" class="btn btn-info btn-sm">View Details</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>


<?php include "../components/admin/footer.php"; ?>