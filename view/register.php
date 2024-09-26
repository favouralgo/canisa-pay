<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User AJAX Registration</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <div id="message"></div>
        <form id="registrationForm">
            <input type="text" id="firstname" placeholder="First Name" required>
            <input type="text" id="lastname" placeholder="Last Name" required>
            <input type="email" id="email" placeholder="Enter your email" required>
            <input type="text" id="country" placeholder="Enter your country" required>
            <input type="text" id="city" placeholder="Enter your city" required>
            <input type="text" id="contact_number" placeholder="Enter your contact number" required>
            <div class="password-container">
                <input type="password" id="password" placeholder="Enter your password" required>
                <span toggle="#password" class="fa fa-fw fa-eye toggle-password"></span>
            </div>
            <div class="password-container">
                <input type="password" id="confirm_password" placeholder="Confirm your password" required>
                <span toggle="#confirm_password" class="fa fa-fw fa-eye toggle-password"></span>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="..js/register.js"></script>

</body>
</html>
