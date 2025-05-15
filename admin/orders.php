<?php
include "../app/php/config/config.php";
require "check.php";
include "../app/php/admin/invoice/functions.php";

$invoices = getAllInvoices();
if (isset($_POST['update_status'])) {
    $status = $_POST['status'];
    if ($status) {
        $invoices = getAllInvoices($status);
    } else {
        $invoices = getAllInvoices();
    }
}

$title_page = "Invoices";
include "../components/admin/app.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 p-1 sidebar">
            <?php include "../components/admin/sidebar.php"; ?>
        </div>

        <main role="main" class="col-md-10 ml-sm-auto px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Orders Management</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                    class="d-flex align-items-center">
                    <select class="form-select" id="status" name="status">
                        <option value="" selected>All</option>
                        <option value="waiting">waiting</option>
                        <option value="active">active</option>
                        <option value="canceled">canceled</option>
                        <option value="delivering">delivering</option>
                        <option value="completed">completed</option>
                    </select>
                    <button type="submit" name="update_status" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Invoice ID</th>
                            <th>Customer</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($invoices as $invoice): ?>
                            <tr>
                                <td><?php echo $invoice['id']; ?></td>
                                <td><?php echo $invoice['customer_name']; ?></td>
                                <td><?php echo $invoice['total_price']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($invoice['created_at'])); ?></td>
                                <td>
                                    <span class="p-2 text-white bg-<?php echo getInvoiceStatusClass($invoice['status']); ?> rounded">
                                        <strong>
                                            <?php echo $invoice['status']; ?>
                                        </strong>
                                    </span>
                                </td>
                                <td>
                                    <a href="order_details.php?id=<?php echo $invoice['id']; ?>" class="btn btn-info btn-sm">View Details</a>
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