<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/custom-login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <!-- Alert area placed outside the login box -->
        <div id="alert-area" style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%); width: 100%; max-width: 600px;"></div>

        <div id="login-row" class="row justify-content-center align-items-center" style="position: relative; top: 50px;">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" onsubmit="return validateLogin()">
                        <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="user">User:</label><br>
                                <select name="user" id="user" class="form-control">
                                    <option value="Admin1">Admin 1</option>
                                    <option value="Admin2">Admin 2</option>
                                    <option value="Content Manager 1">Content Manager 1</option>
                                    <option value="Content Manager 2">Content Manager 2</option>
                                    <option value="System User">System User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                            </div><br>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
    // Predefined users and roles
    const users = {
        'Admin1': { role: 'Admin', username: 'admin1', password: 'pass123' },
        'Admin2': { role: 'Admin', username: 'admin2', password: 'pass123' },
        'Content Manager 1': { role: 'Content Manager', username: 'content1', password: 'pass123' },
        'Content Manager 2': { role: 'Content Manager', username: 'content2', password: 'pass123' },
        'System User': { role: 'System User', username: 'systemuser', password: 'pass123' }
    };

    function showAlert(message, type) {
        const alertArea = document.getElementById('alert-area');
        
        // Clear existing alerts
        alertArea.innerHTML = '';

        // Create alert div
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible`;
        alertDiv.setAttribute('role', 'alert');
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        
        alertArea.appendChild(alertDiv);

        // If the alert is a success alert, keep it for 5 seconds
        if (type === 'success') {
            setTimeout(() => {
                alertDiv.remove();
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    }

    function validateLogin() {
    const selectedUser = document.getElementById('user').value;
    const enteredUsername = document.getElementById('username').value;
    const enteredPassword = document.getElementById('password').value;

    // Check if entered username and password match the selected user role
    if (users[selectedUser] && users[selectedUser].username === enteredUsername && users[selectedUser].password === enteredPassword) {
        showAlert(`Login successful for ${selectedUser}`, 'success');

        // Clear the input fields after successful login
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';
        document.getElementById('user').selectedIndex = 0; // Reset the dropdown to the first option

        return false; // Prevents form submission for demonstration
    } else {
        showAlert('Incorrect username or password, or mismatched role.', 'danger');
        return false; // Prevents form submission for demonstration
    }
}
    </script>
    <script type="text/javascript" src="js/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
