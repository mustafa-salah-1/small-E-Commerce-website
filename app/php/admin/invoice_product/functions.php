<?php

function getAllInvoiceProductCount()
{
    global $connect;
    try {
        $sql = "SELECT COUNT(*) AS number_of_invoice_products FROM invoice_products";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['number_of_invoice_products'];
    } catch (PDOException $e) {
        error_log("Error getting invoice product count: " . $e->getMessage());
        return false;
    }
}

function getAllInvoiceProducts($year, $month)
{
    global $connect;
    try {
        $sql = "SELECT invoice_products.*, products.product_name
        FROM invoice_products
        JOIN products ON invoice_products.product_id = products.id
        JOIN invoices ON invoice_products.invoice_id = invoices.id
        WHERE invoices.status = 'completed'
        AND YEAR(invoice_products.created_at) = :year
        AND MONTH(invoice_products.created_at) = :month";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting all invoice products: " . $e->getMessage());
        return false;
    }
}

function getTotalInvoiceProducts($year, $month)
{
    global $connect;
    try {
        $sql = "SELECT SUM(invoice_products.price * invoice_products.quantity) AS total_price
         , SUM(invoice_products.quantity) AS total_quantity FROM invoice_products 
         JOIN invoices ON invoice_products.invoice_id = invoices.id 
         WHERE invoices.status = 'completed'
         AND YEAR(invoice_products.created_at) = :year
         AND MONTH(invoice_products.created_at) = :month";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        error_log("Error calculating total invoice products price: " . $e->getMessage());
        return 0;
    }
}

function getInvoiceProductById($invoiceProductId)
{
    global $connect;
    try {
        $sql = "SELECT * FROM invoice_products WHERE id = :invoice_product_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':invoice_product_id', $invoiceProductId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting invoice product by ID: " . $e->getMessage());
        return false;
    }
}

function getInvoiceProductsByInvoiceId($invoiceId)
{
    global $connect;
    try {
        $sql = "SELECT invoice_products.*, invoices.id AS invoice_id, products.product_name
        FROM invoice_products
        LEFT JOIN invoices ON invoice_products.invoice_id = invoices.id
        LEFT JOIN products ON invoice_products.product_id = products.id
        WHERE invoice_products.invoice_id = :invoice_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':invoice_id', $invoiceId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting invoice products by invoice ID: " . $e->getMessage());
        return false;
    }
}

function deleteInvoiceProduct($invoiceProductId)
{
    global $connect;
    try {
        $sql = "DELETE FROM invoice_products WHERE id = :invoice_product_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':invoice_product_id', $invoiceProductId, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error deleting invoice product: " . $e->getMessage());
        return false;
    }
}

function insertInvoiceProduct($invoice_id, $product_id, $quantity, $price)
{
    global $connect;
    try {
        $sql = "INSERT INTO invoice_products (invoice_id, product_id, quantity, price, created_at) 
                VALUES (:invoice_id, :product_id, :quantity, :price, NOW())";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':invoice_id', $invoice_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error inserting invoice product: " . $e->getMessage());
        return false;
    }
}
