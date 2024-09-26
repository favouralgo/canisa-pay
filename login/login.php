<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <h2>Login</h2>
        <div id="message"></div>
        <form id="loginForm">
            <input type="email" id="customer_email" placeholder="Enter your email" required>
            <div class="password-container">
                <input type="password" id="customer_pass" placeholder="Enter your password" required>
                <span toggle="#customer_pass" class="fa fa-fw fa-eye toggle-password"></span>
            </div>
            <button type="submit">Login</button>
        </form>
        <p class="text-center">
            Don't have an account? <a href="register.php">Register</a>
        </p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/login.js"></script>
</body>

</html>