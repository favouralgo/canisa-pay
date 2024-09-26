<?php
require_once("../settings/db_class.php");

class Customer extends db_connection {
    public function add_customer($customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact, $user_role = 2) {
        // Hash the password
        $hashed_password = password_hash($customer_pass, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO customer (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, user_role) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db_conn()->prepare($sql);
        $stmt->bind_param("ssssssi", $customer_name, $customer_email, $hashed_password, $customer_country, $customer_city, $customer_contact, $user_role);
        
        return $stmt->execute();
    }

    public function check_email_exists($email) {
        $sql = "SELECT COUNT(*) as count FROM customer WHERE customer_email = ?";
        $stmt = $this->db_conn()->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }

    public function login_customer($email, $password) {
        $sql = "SELECT * FROM customer WHERE customer_email = ?";
        $stmt = $this->db_conn()->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $customer = $result->fetch_assoc();

        if ($customer && password_verify($password, $customer['customer_pass'])) {
            return $customer;
        } else {
            return false;
        }
    }
}
?>