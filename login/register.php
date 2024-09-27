<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h2>User Registration</h2>
        <div id="message"></div>
        <form id="registrationForm">
            <input type="text" id="customer_name" placeholder="Full Name" required>
            <input type="email" id="customer_email" placeholder="Enter your email" required>
            <input type="text" id="customer_country" placeholder="Enter your country" required>
            <input type="text" id="customer_city" placeholder="Enter your city" required>
            <input type="text" id="customer_contact" placeholder="Enter your contact number (e.g., +233XXXXXXXXX)" required>
            <div class="password-container">
                <input type="password" id="customer_pass" placeholder="Enter your password" required>
                <span toggle="#customer_pass" class="fa fa-fw fa-eye toggle-password"></span>
            </div>
            <div class="password-container">
                <input type="password" id="confirm_password" placeholder="Confirm your password" required>
                <span toggle="#confirm_password" class="fa fa-fw fa-eye toggle-password"></span>
            </div>
            <button type="submit">Register</button>
        </form>
        <p>
            Already have an account? <a href="login.php">Login</a>
        </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/register.js"></script>
</body>

</html>