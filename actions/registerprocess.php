<?php
require_once("../controllers/customer_controller.php");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_pass = $_POST['customer_pass'];
    $customer_country = $_POST['customer_country'];
    $customer_city = $_POST['customer_city'];
    $customer_contact = $_POST['customer_contact'];

    $response = add_customer_ctr($customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact);

    echo json_encode($response);
}
?>