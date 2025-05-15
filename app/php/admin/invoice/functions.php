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

function getAllInvoices($status = null)
{
    global $connect;
    try {
        $sql = "SELECT invoices.*, customers.customer_name AS customer_name, 
        customers.customer_email AS customer_email 
        FROM invoices LEFT JOIN customers ON invoices.customer_id = customers.id";
        
        if ($status !== null) {
            $sql .= " WHERE invoices.status = :status";
        }
        
        $stmt = $connect->prepare($sql);
        
        if ($status !== null) {
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        }
        
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
        $sql = "SELECT invoices.*, customers.customer_name AS customer_name, 
        customers.customer_email AS customer_email ,
        customers.customer_phone AS customer_phone
        FROM invoices LEFT JOIN customers ON invoices.customer_id = customers.id 
        WHERE invoices.id = :invoice_id";
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

function getInvoiceStatusClass($status)
{
    switch (strtolower($status)) {
        case 'completed':
            return 'success';
        case 'waiting':
            return 'warning';
        case 'cancelled':
        case 'canceled':
            return 'danger';
        case 'delivering':
            return 'info';
        case 'active':
            return 'secondary';
        default:
            return 'primary';
    }
}

function updateInvoiceStatus($invoiceId, $newStatus)
{
    global $connect;
    try {
        $sql = "UPDATE invoices SET status = :status WHERE id = :invoice_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':status', $newStatus, PDO::PARAM_STR);
        $stmt->bindParam(':invoice_id', $invoiceId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        error_log("Error updating invoice status: " . $e->getMessage());
        return false;
    }
}

function addInvoice($customerId, $totalPrice, $location, $quantity)
{
    global $connect;
    try {
        $sql = "INSERT INTO invoices (customer_id, total_price, location, quantity, delivery_price, status, created_at) 
                VALUES (:customer_id, :total_price, :location, :quantity, '5000', 'waiting', NOW())";

        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
        $stmt->bindParam(':total_price', $totalPrice, PDO::PARAM_STR);
        $stmt->bindParam(':location', $location, PDO::PARAM_STR);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        
        $stmt->execute();
        
        return $connect->lastInsertId();
    } catch (PDOException $e) {
        error_log("Error adding invoice: " . $e->getMessage());
        return false;
    }
}