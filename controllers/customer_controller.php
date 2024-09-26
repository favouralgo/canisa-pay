<?php
require_once("../classes/customer_class.php");

function add_customer_ctr($full_name, $email, $password, $country, $city, $contact_number) {
    $customer = new Customer();
    
    // Check if email already exists
    if ($customer->check_email_exists($email)) {
        return ["success" => false, "message" => "Email already exists"];
    }
    
    // Validate email (only gmail)
    if (!preg_match('/@gmail\.com$/i', $email)) {
        return ["success" => false, "message" => "Only Gmail addresses are allowed"];
    }
    
    // Add customer
    $result = $customer->add_customer($full_name, $email, $password, $country, $city, $contact_number);
    
    if ($result) {
        return ["success" => true, "message" => "Customer registered successfully"];
    } else {
        return ["success" => false, "message" => "Failed to register customer"];
    }
}
?>