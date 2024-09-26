<?php
require_once("../classes/customer_class.php");

function add_customer_ctr($customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact) {
    $customer = new Customer();
    
    // Check if email already exists
    if ($customer->check_email_exists($customer_email)) {
        return ["success" => false, "message" => "Email already exists"];
    }
    
    // Validate email (only Ashesi emails)
    if (!preg_match('/@ashesi\.edu\.gh$/i', $customer_email)) {
        return ["success" => false, "message" => "Invalid email"];
    }
    
    // Add customer
    $result = $customer->add_customer($customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact);
    
    if ($result) {
        return ["success" => true, "message" => "Customer registered successfully"];
    } else {
        return ["success" => false, "message" => "Failed to register customer"];
    }
}

function login_customer_ctr($email, $password) {
    $customer = new Customer();
    return $customer->login_customer($email, $password);
}
?>