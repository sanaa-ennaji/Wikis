
function registerUser(nom, email, pass, role) {
    $.ajax({
        url: 'http://localhost/wikis/user/login',
        type: 'POST',
        dataType: 'json',
        data: JSON.stringify({ nom, email, pass, role }),
        success: function (response) {
            if (response.success) {
               
                console.log('Registration successful', response.user);
            } else {
               
                console.error('Registration failed', response.message);
            }
        },
        error: function (xhr, status, error) {
          
            console.error('AJAX error:', status, error);
        }
    });
}

function loginUser(email, pass) {
    $.ajax({
        url: 'http://localhost/wikis/user/login',
        type: 'POST',
        dataType: 'json',
        data: JSON.stringify({ email, pass }),
        success: function (response) {
            if (response.success) {
                
                console.log('Login successful', response.user);
            } else {
           
                console.error('Login failed', response.message);
            }
        },
        error: function (xhr, status, error) {
            
            console.error('AJAX error:', status, error);
        }
    });
}
