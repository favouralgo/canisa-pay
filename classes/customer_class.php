<?php
require_once("../settings/db_class.php");

class Customer extends db_connection {
    public function add_customer($first_name, $last_name, $email, $password, $country, $city, $contact_number, $user_role = 2) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Remove non-digit characters
        $formatted_number = preg_replace('/[^0-9]/', '', $contact_number);
        
        $sql = "INSERT INTO customers (first_name, last_name, email, password, country, city, contact_number, user_role) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db_conn()->prepare($sql);
        $stmt->bind_param("ssssssi", $full_name, $email, $hashed_password, $country, $city, $formatted_number, $user_role);
        
        return $stmt->execute();
    }

    public function check_email_exists($email) {
        $sql = "SELECT COUNT(*) as count FROM customers WHERE email = ?";
        $stmt = $this->db_conn()->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }
}
?>