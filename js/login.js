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

    $('#loginForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Validate form
        if (!validateForm()) {
            return;
        }

        // Perform the AJAX request
        $.ajax({
            url: '../actions/loginprocess.php',
            type: 'POST',
            data: {
                email: $('#customer_email').val(),
                password: $('#customer_pass').val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire("Success", response.message, "success").then(() => {
                        window.location.href = '../view/index.php';
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
    var email = $('#customer_email').val().trim();
    var password = $('#customer_pass').val().trim();
    
    // Validate email
    if (!email.match(/^[\w.+-]+@[a-zA-Z\d-]+\.[a-zA-Z\d-.]+$/)) {
        Swal.fire('Error', 'Please enter a valid email address.', 'error');
        return false;
    }
    
    // Validate password
    if (password.length < 8) {
        Swal.fire('Error', 'Password must be at least 8 characters long.', 'error');
        return false;
    }
    
    return true;
}