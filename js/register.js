/** This script handles the registration form submission and validation.
 * When the document is ready, it attaches a submit event handler to the form with the ID `registerForm`.
 * The form submission is prevented, and the form is validated using the `validateForm` function.
 * If the validation passes, an AJAX POST request is sent to `registerprocess.php` with the form data serialized.
 * On successful response:
 * - If the response indicates success, a success message is displayed, and the user is redirected to the login page after 2 seconds.
 * - If the response indicates failure, an error message is displayed.
*/
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
            url: '../controllers/customer_controller.php',
            type: 'POST',
            data: {
                firstname: firstname,
                lastname: lastname,
                email: email,
                country: country,
                city: city,
                contact_number: contact_number,
                password: password,
                confirm_password: confirm_password
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#message').html(response.message);
                    $('#message').css('color', 'green');
                    $('#registrationForm')[0].reset();
                } else {
                    $('#message').html(response.errors.join('<br>'));
                    $('#message').css('color', 'red');
                    // Repopulate form fields with the previous data
                    $('#firstname').val(response.formData.firstname);
                    $('#lastname').val(response.formData.lastname);
                    $('#email').val(response.formData.email);
                }

                // Display message and hide it after 5 seconds
                $('#message').show();
                setTimeout(function() {
                    $('#message').fadeOut('slow');
                }, 5000); 
            },
            error: function() {
                $('#message').html("An error occurred. Please try again.");
                $('#message').css('color', 'red');

                // Display message and hide it 5 seconds
                $('#message').show();
                setTimeout(function() {
                    $('#message').fadeOut('slow');
                }, 5000); 
            }
        });
    });
});



/**
 * Validates the registration form fields.
 * 
 * @returns {boolean} Returns `false` if any validation fails, otherwise `true`.
 * 
 * Validations performed:
 * - Full name must be between 2 and 50 characters.
 * - Email must be a valid Gmail address.
 * - Password must be at least 8 characters long and include uppercase, lowercase, and number.
 * - Country and city names must be at least 2 characters long.
 * - Contact number must be a valid number (10 to 14 digits, optionally starting with a '+').
 */
function validateForm() {
    var fullName = $('#full_name').val().trim();
    var email = $('#email').val().trim();
    var password = $('#password').val();
    var country = $('#country').val().trim();
    var city = $('#city').val().trim();
    var contactNumber = $('#contact_number').val().trim();
    
    // Validate full name
    if (fullName.length < 2 || fullName.length > 50) {
        alert('Full name must be between 2 and 50 characters.');
        return false;
    }
    
    // Validate email (Gmail only)
    if (!email.match(/^[\w.+-]+@gmail\.com$/)) {
        alert('Please enter a valid Gmail address.');
        return false;
    }
    
    // Validate password (at least 8 characters, including uppercase, lowercase, and number)
    if (!password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/)) {
        alert('Password must be at least 8 characters long and include uppercase, lowercase, and number.');
        return false;
    }
    
    // Validate country and city
    if (country.length < 2 || city.length < 2) {
        alert('Please enter valid country and city names.');
        return false;
    }
    
    // Validate contact number (simple check for now)
    if (!contactNumber.match(/^\+?[0-9]{10,14}$/)) {
        alert('Please enter a valid contact number.');
        return false;
    }
    
    return true;
}



