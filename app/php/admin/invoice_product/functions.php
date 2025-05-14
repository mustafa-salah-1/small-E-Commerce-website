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

function getAllInvoiceProducts()
{
    global $connect;
    try {
        $sql = "SELECT invoice_products.*, products.product_name
        FROM invoice_products
        JOIN products ON invoice_products.product_id = products.id";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting all invoice products: " . $e->getMessage());
        return false;
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