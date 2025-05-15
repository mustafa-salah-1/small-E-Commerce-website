<?php


include "../app/php/config/config.php";
include "check.php";

include "../app/php/admin/customer/functions.php";
include "../app/php/admin/invoice/functions.php";
include "../app/php/admin/product/functions.php";
 

$title_page = "Dashboard";
include "../components/admin/app.php";
?> 

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-light sidebar">
               <?php include "../components/admin/sidebar.php";?>
            </div>

            <main role="main" class="col-md-10 ml-sm-auto px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1>Dashboard</h1>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Products</h5>
                                <p class="card-text h2"><?php echo getAllProductCount() ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text h2"><?php echo getAllCustomerCount() ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Orders</h5>
                                <p class="card-text h2"><?php echo getAllInvoiceCount() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
 
<?php include "../components/admin/footer.php";?>