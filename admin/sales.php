<?php
require "check.php";
include "../app/php/config/config.php";
include "../app/php/admin/invoice/functions.php";
include "../app/php/admin/invoice_product/functions.php";


if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $delete = deleteInvoiceProduct($id);
    if ($delete) {
        $_SESSION['success'] = "Product deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete product.";
    }
}


$currentYear = date('Y');
$currentMonth = date('m');

if (isset($_POST['date'])) {
    $month_year = $_POST['month_year'];
    $currentYear = date('Y', strtotime($month_year));
    $currentMonth = date('m', strtotime($month_year));
}

$invoice_products = getAllInvoiceProducts($currentYear, $currentMonth);
$total_invoice_products = getTotalInvoiceProducts($currentYear, $currentMonth);

$title_page = "Invoice Products";
include "../components/admin/app.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-light sidebar">
            <?php include "../components/admin/sidebar.php"; ?>
        </div>

        <main role="main" class="col-md-10 ml-sm-auto px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Invoice Products Management</h2>
            </div>

            <div class="mt-4 d-flex justify-content-around p-2 bg-light rounded">
                <h5>Total Quantity: <?php echo number_format($total_invoice_products['total_quantity']); ?></h5>
                <h5>Total Price: <?php echo number_format($total_invoice_products['total_price']); ?> IQD</h5>

                <div>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <input type="month" name="month_year" value="<?php echo $currentYear . '-' . $currentMonth; ?>">
                        <button type="submit" name="date" class="btn btn-primary btn-sm ml-2">Filter</button>
                    </form>

                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Subtotal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($invoice_products as $item): ?>
                            <tr>
                                <td><?php echo $item['id']; ?></td>
                                <td><?php echo $item['product_name']; ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo $item['price']; ?></td>
                                <td><?php echo number_format($item['price'] * $item['quantity']); ?></td>
                                <td>
                                    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                                        style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
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

<?php include "../components/admin/footer.php"; ?>