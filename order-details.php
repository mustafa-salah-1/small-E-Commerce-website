<?php

$title_page = "Order Details";
$file_css = "order-details.css";

include "app/php/config/config.php";
include "check.php";
include 'components/app.php';

include "app/php/admin/invoice/functions.php";
include "app/php/admin/invoice_product/functions.php";

// Get order ID from URL parameter
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('Order ID is required'); window.location.href = 'profile.php';</script>";
    exit();
}

$order_id = $_GET['id'];
$invoice = getInvoiceById($order_id);

if (!$invoice || $invoice['customer_id'] != $_SESSION['customer_id']) {
    echo "<script>alert('Order not found or access denied'); window.location.href = 'profile.php';</script>";
    exit();
}

$order_items = getInvoiceProductsByInvoiceId($order_id);

?>

<!-- Order Details -->
<div class="profile-container container">
    <div class="profile-card">
        <h2 class="mb-4">Order #<?php echo $invoice['id']; ?></h2>

        <div class="row mb-4">
            <div class="col-md-6">
                <h5>Order Information</h5>
                <p><strong>Order Date:</strong> <?php echo date('M d, Y', strtotime($invoice['created_at'])); ?></p>
                <p><strong>Status:</strong>
                    <span class="badge bg-<?php
                                            echo strtolower($invoice['status']) == 'paid' ? 'success' : (strtolower($invoice['status']) == 'pending' ? 'warning' : (strtolower($invoice['status']) == 'cancelled' ? 'danger' : 'info'));
                                            ?>">
                        <?php echo $invoice['status']; ?>
                    </span>
                </p>
                <p><strong>delivery:</strong> <?php echo 'IQD ' . number_format($invoice['delivery_price']); ?></p>
                <p><strong>Total:</strong> <?php echo 'IQD ' . number_format($invoice['total_price'] + $invoice['delivery_price'], 2); ?></p>
            </div>
        </div>

        <h5>Order Items</h5>
        <div style="display: block; width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch;">
            <table class="table table-dark table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($order_items as $index => $item):
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo $item['product_name']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo 'IQD ' . number_format($item['price'], 2); ?></td>
                            <td><?php echo 'IQD ' . number_format($subtotal, 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total:</strong></td>
                        <td><strong><?php echo 'IQD ' . number_format($total, 2); ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="profile.php" class="btn btn-neon">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
        </div>
    </div>
</div>

</body>

</html>