<?php
session_start();
require_once("../controllers/customer_controller.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(["success" => false, "message" => "Email and password are required"]);
        exit;
    }

    $customer = login_customer_ctr($email, $password);

    if ($customer) {
        $_SESSION['customer_id'] = $customer['customer_id'];
        $_SESSION['user_role'] = $customer['user_role'];
        echo json_encode(["success" => true, "message" => "Login successful"]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid email or password"]);
    }
}
?>