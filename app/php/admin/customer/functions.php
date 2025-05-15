<?php

function getAllCustomerCount() {
    global $connect;
    try {
        $sql = "SELECT COUNT(*) AS number_of_customer FROM customers";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['number_of_customer'];
    } catch (PDOException $e) {
        error_log("Error getting customer count: " . $e->getMessage());
        return false;
    }
}

function getAllCustomers() {
    global $connect;
    try {
        $sql = "SELECT * FROM customers";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting all customers: " . $e->getMessage());
        return false;
    }
}

function getCustomerById($customerId) {
    global $connect;
    try {
        $sql = "SELECT * FROM customers WHERE id = :customer_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting customer by ID: " . $e->getMessage());
        return false;
    }
}

function getCustomerOrders($customerId) {
    global $connect;
    try {
        $sql = "SELECT * FROM invoices WHERE customer_id = :customer_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting customer orders: " . $e->getMessage());
        return false;
    }
}

function updateCustomer($customerId, $name, $email, $phone, $password) {
 
    global $connect;
    try {
        $sql = "UPDATE customers SET ";
        $updateFields = [];
        $params = [];
        
        if ($name !== null) {
            $updateFields[] = "customer_name = :name";
            $params[':name'] = $name;
        }
        
        if ($email !== null) {
            $updateFields[] = "customer_email = :email";
            $params[':email'] = $email;
        }
        
        if ($phone !== null) {
            $updateFields[] = "customer_phone = :phone";
            $params[':phone'] = $phone;
        }
        
        if (!empty($password)) {
            $updateFields[] = "customer_password = :password";
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $params[':password'] = $hashedPassword;
        }
        
        if (empty($updateFields)) {
            return true;
        }
        
        $sql .= implode(", ", $updateFields);
        $sql .= " WHERE id = :customer_id";
        
        $stmt = $connect->prepare($sql);
        
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        
        $stmt->bindValue(':customer_id', $customerId, PDO::PARAM_INT);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error updating customer: " . $e->getMessage());
        return false;
    }
}