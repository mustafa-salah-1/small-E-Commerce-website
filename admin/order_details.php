<?php
require "check.php";
include "../app/php/config/config.php";
include "../app/php/admin/invoice/functions.php";
include "../app/php/admin/invoice_product/functions.php";

$title_page = "Invoices";

// Check if viewing a specific invoice
if (isset($_GET['id'])) {
    $invoice_id = $_GET['id'];
    $invoice = getInvoiceById($invoice_id);
    $invoice_items = getInvoiceProductsByInvoiceId($invoice_id);
    $page_mode = 'details';
}

if (isset($_POST['update_status'])) {
    $invoice_id = $_POST['invoice_id'];
    $status = $_POST['status'];

    if (updateInvoiceStatus($invoice_id, $status)) {
        $_SESSION['success'] = "Invoice status updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update invoice status.";
    }
    $invoice = getInvoiceById($invoice_id);
    $invoice_items = getInvoiceProductsByInvoiceId($invoice_id);
}

include "../components/admin/app.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-light sidebar">
            <?php include "../components/admin/sidebar.php"; ?>
        </div>

        <main role="main" class="col-md-10 ml-sm-auto px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                <a href="orders.php" class="btn btn-secondary">Back to Orders</a>
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

            <?php if ($invoice): ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Order Information</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>Order ID:</strong> <?php echo $invoice['id']; ?></p>
                                <p><strong>Date:</strong> <?php echo date('F d, Y', strtotime($invoice['created_at'])); ?></p>
                                <p><strong>Status:</strong>
                                    <span class="badge bg-<?php echo getInvoiceStatusClass($invoice['status']); ?>">
                                        <?php echo $invoice['status']; ?>
                                    </span>
                                </p>
                                <p><strong>Total quantity:</strong> <?php echo $invoice['quantity']; ?></p>
                                <p><strong>Total Delivery:</strong> IQD <?php echo number_format($invoice['delivery_price']); ?></p>
                                <p><strong>Total Amount:</strong> IQD <?php echo number_format($invoice['total_price'] + $invoice['delivery_price']); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Customer Information</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>Customer Name:</strong> <?php echo $invoice['customer_name']; ?></p>
                                <p><strong>Phone:</strong> <?php echo $invoice['customer_phone']; ?></p>
                                <p><strong>Email:</strong> <?php echo $invoice['customer_email']; ?></p>
                                <?php if (isset($invoice['customer_phone'])): ?>
                                    <p><strong>Phone:</strong> <?php echo $invoice['customer_phone']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Invoice Items -->
                <div class="card">
                    <div class="card-header">
                        <h4>Invoice Items</h4>
                    </div>
                    <div class="card-body">
                        <?php if (count($invoice_items) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($invoice_items as $item): ?>
                                            <tr>
                                                <td><?php echo $item['product_name']; ?></td>
                                                <td><?php echo $item['quantity']; ?></td>
                                                <td>IQD <?php echo number_format($item['price']); ?></td>
                                                <td>IQD <?php echo number_format($item['quantity'] * $item['price']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p>No items found for this invoice.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Actions -->
                <div class="mt-4">
                    <button onclick="window.open('print_invoice.php?id=<?php echo $invoice['id']; ?>', '_blank')" class="btn btn-primary">Print Invoice</button>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateStatusModal">Edit Invoice</button>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>


<!-- Status Update Modal -->
<div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStatusModalLabel">Update Invoice Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="invoice_id" value="<?php echo $invoice['id']; ?>">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="waiting" <?php echo ($invoice['status'] == 'waiting') ? 'selected' : ''; ?>>waiting</option>
                            <option value="active" <?php echo ($invoice['status'] == 'active') ? 'selected' : ''; ?>>active</option>
                            <option value="canceled" <?php echo ($invoice['status'] == 'canceled') ? 'selected' : ''; ?>>canceled</option>
                            <option value="delivering" <?php echo ($invoice['status'] == 'delivering') ? 'selected' : ''; ?>>delivering</option>
                            <option value="completed" <?php echo ($invoice['status'] == 'completed') ? 'selected' : ''; ?>>completed</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include "../components/admin/footer.php"; ?>