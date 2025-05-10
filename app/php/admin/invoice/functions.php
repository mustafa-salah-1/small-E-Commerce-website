<?php

function getAllInvoiceCount()
{
    global $connect;
    try {
        $sql = "SELECT COUNT(*) AS number_of_invoice FROM invoices";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['number_of_invoice'];
    } catch (PDOException $e) {
        error_log("Error getting invoice count: " . $e->getMessage());
        return false;
    }
}

function getAllInvoices()
{
    global $connect;
    try {
        $sql = "SELECT * FROM invoices";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting all invoices: " . $e->getMessage());
        return false;
    }
}

function getInvoiceById($invoiceId)
{
    global $connect;
    try {
        $sql = "SELECT * FROM invoices WHERE id = :invoice_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':invoice_id', $invoiceId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting invoice by ID: " . $e->getMessage());
        return false;
    }
}

function getInvoicesByCustomerId($customerId) 
{
    global $connect;
    try {
        $sql = "SELECT * FROM invoices WHERE customer_id = :customer_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting invoices by customer ID: " . $e->getMessage());
        return false;
    }
}
