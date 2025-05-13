<?php
require "check.php";
include "../app/php/config/config.php";
include "../app/php/admin/invoice/functions.php";

$title_page = "Invoices";

// Check if viewing a specific invoice
if (isset($_GET['id'])) {
    $invoice_id = $_GET['id'];
    $invoice = getInvoiceById($invoice_id);
    $invoice_items = getInvoiceItems($invoice_id);
    $page_mode = 'details';
} else {
    $invoice = null;
    $invoice_items = [];
    $page_mode = 'list';
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
                <h2><?php echo $page_mode == 'details' ? 'Invoice Details' : 'Invoice Management'; ?></h2>
                <?php if ($page_mode == 'details'): ?>
                    <a href="invoices.php" class="btn btn-secondary">Back to Invoices</a>
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

            <?php if ($page_mode == 'details' && $invoice): ?>
                <!-- Invoice Details View -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Invoice Information</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>Invoice ID:</strong> <?php echo $invoice['id']; ?></p>
                                <p><strong>Date:</strong> <?php echo date('F d, Y', strtotime($invoice['created_at'])); ?></p>
                                <p><strong>Status:</strong> 
                                    <span class="badge bg-<?php echo getInvoiceStatusClass($invoice['status']); ?>">
                                        <?php echo $invoice['status']; ?>
                                    </span>
                                </p>
                                <p><strong>Total Amount:</strong> $<?php echo number_format($invoice['total_price'], 2); ?></p>
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
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($invoice_items as $item): ?>
                                            <tr>
                                                <td><?php echo $item['product_name']; ?></td>
                                                <td><?php echo $item['description']; ?></td>
                                                <td><?php echo $item['quantity']; ?></td>
                                                <td>$<?php echo number_format($item['unit_price'], 2); ?></td>
                                                <td>$<?php echo number_format($item['quantity'] * $item['unit_price'], 2); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-end"><strong>Subtotal:</strong></td>
                                            <td>$<?php echo number_format($invoice['subtotal'], 2); ?></td>
                                        </tr>
                                        <?php if (isset($invoice['tax_amount']) && $invoice['tax_amount'] > 0): ?>
                                        <tr>
                                            <td colspan="4" class="text-end"><strong>Tax:</strong></td>
                                            <td>$<?php echo number_format($invoice['tax_amount'], 2); ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <td colspan="4" class="text-end"><strong>Total:</strong></td>
                                            <td><strong>$<?php echo number_format($invoice['total_price'], 2); ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        <?php else: ?>
                            <p>No items found for this invoice.</p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Actions -->
                <div class="mt-4">
                    <a href="print_invoice.php?id=<?php echo $invoice['id']; ?>" class="btn btn-primary" target="_blank">Print Invoice</a>
                    <a href="edit_invoice.php?id=<?php echo $invoice['id']; ?>" class="btn btn-warning">Edit Invoice</a>
                </div>
            <?php endif; ?>
        </main>
    </div>
</div>

<?php include "../components/admin/footer.php"; ?>
