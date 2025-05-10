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
        $sql = "SELECT * FROM customers WHERE customer_id = :customer_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error getting customer by ID: " . $e->getMessage());
        return false;
    }
}
