$(document).ready(function() {
    $('.toggle-password').click(function() {
        var input = $($(this).attr('toggle'));
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            $(this).removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            input.attr('type', 'password');
            $(this).removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    $('#registrationForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Validate form
        if (!validateForm()) {
            return;
        }

        // Perform the AJAX request
        $.ajax({
            url: '../actions/registerprocess.php',
            type: 'POST',
            data: {
                customer_name: $('#customer_name').val(),
                customer_email: $('#customer_email').val(),
                customer_country: $('#customer_country').val(),
                customer_city: $('#customer_city').val(),
                customer_contact: $('#customer_contact').val(),
                customer_pass: $('#customer_pass').val(),
                confirm_password: $('#confirm_password').val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire("Success", response.message, "success").then(() => {
                        window.location.href = 'login.php';
                    });
                } else {
                    Swal.fire("Error", response.message, "error");
                }
            },
            error: function() {
                Swal.fire("Error", "An error occurred. Please try again.", "error");
            }
        });
    });
});

function validateForm() {
    var customerName = $('#customer_name').val().trim();
    var customerEmail = $('#customer_email').val().trim();
    var customerPass = $('#customer_pass').val();
    var confirmPassword = $('#confirm_password').val();
    var customerCountry = $('#customer_country').val().trim();
    var customerCity = $('#customer_city').val().trim();
    var customerContact = $('#customer_contact').val().trim();
    
    // Validate full name
    if (customerName.length < 2 || customerName.length > 100) {
        Swal.fire('Error', 'Full name must be between 2 and 100 characters.', 'error');
        return false;
    }
    
    // Validate email (Ashesi only)
    if (!customerEmail.match(/^[\w.+-]+@ashesi\.edu\.gh$/)) {
        Swal.fire('Error', 'Please enter a valid email address.', 'error');
        return false;
    }
    
    // Validate password (at least 8 characters, including uppercase, lowercase, and number)
    if (!customerPass.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/)) {
        Swal.fire('Error', 'Password must be at least 8 characters long and include uppercase, lowercase, and number.', 'error');
        return false;
    }
    
    // Validate confirm password
    if (customerPass !== confirmPassword) {
        Swal.fire('Error', 'Passwords do not match.', 'error');
        return false;
    }
    
    // Validate country and city
    if (customerCountry.length < 2 || customerCity.length < 2) {
        Swal.fire('Error', 'Please enter valid country and city names.', 'error');
        return false;
    }
    
    // Validate contact number (must include country code and be in E.164 format)
    if (!customerContact.match(/^\+[1-9]\d{1,14}$/)) {
        Swal.fire('Error', 'Please enter a valid contact number with country code (e.g., +233XXXXXXXXX).', 'error');
        return false;
    }
    
    return true;
}