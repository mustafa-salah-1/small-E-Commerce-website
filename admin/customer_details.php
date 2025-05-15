<?php
include "../app/php/config/config.php";
require "check.php";
include "../app/php/admin/customer/functions.php";
include "../app/php/admin/invoice/functions.php";

$title_page = "Customers";

// Check if viewing a specific customer
if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];
    $customer = getCustomerById($customer_id);
    $customer_orders = getCustomerOrders($customer_id);
    $page_mode = 'details';
} else {
    $customer = null;
    $customer_orders = [];
    $page_mode = 'list';
}

include "../components/admin/app.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 p-1 sidebar">
            <?php include "../components/admin/sidebar.php"; ?>
        </div>

        <main role="main" class="col-md-10 ml-sm-auto px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2><?php echo $page_mode == 'details' ? 'Customer Details' : 'Customer Management'; ?></h2>
                <?php if ($page_mode == 'details'): ?>
                    <a href="customer.php" class="btn btn-secondary">Back to List</a>
                <?php endif; ?>
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

            <?php if ($page_mode == 'details' && $customer): ?>
                <!-- Customer Details View -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 bg-dark text-white">
                            <div class="card-header">
                                <h4>Personal Information</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>Customer ID:</strong> <?php echo $customer['id']; ?></p>
                                <p><strong>Name:</strong> <?php echo $customer['customer_name']; ?></p>
                                <p><strong>Email:</strong> <?php echo $customer['customer_email']; ?></p>
                                <p><strong>Registered On:</strong> <?php echo date('F d, Y', strtotime($customer['created_at'])); ?></p>
                                <?php if (isset($customer['customer_phone'])): ?>
                                    <p><strong>Phone:</strong> <?php echo $customer['customer_phone']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 bg-dark text-white">
                            <div class="card-header">
                                <h4>Account Statistics</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>Total Orders:</strong> <?php echo count($customer_orders); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Orders -->
                <div class="card bg-dark text-white mb-4">
                    <div class="card-header">
                        <h4>Order History</h4>
                    </div>
                    <div class="card-body">
                        <?php if (count($customer_orders) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($customer_orders as $order): ?>
                                            <tr>
                                                <td><?php echo $order['id']; ?></td>
                                                <td><?php echo date('Y-m-d', strtotime($order['created_at'])); ?></td>
                                                <td><?php echo $order['quantity']; ?></td>
                                                <td>$<?php echo number_format($order['total_price'], 2); ?></td>
                                                <td>
                                                    <span class="badge bg-<?php echo getInvoiceStatusClass($order['status']); ?>">
                                                        <?php echo $order['status']; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="order_details.php?id=<?php echo $order['id']; ?>" class="btn btn-info btn-sm">View Order</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p>This customer has not placed any orders yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<?php include "../components/admin/footer.php"; ?>
