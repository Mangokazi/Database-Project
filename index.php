<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Login Page</title>
    </head>
        <body class="header">
            <div id="form1">
                <h1>Login Details</h1>
                    <form name="form1" method="POST" onsubmit="return validateForm()">
                        <input type="email" id="user" name="username" placeholder="Username" required><br><br>
                        <input type="password" id="pass" name="password" placeholder="Password" required><br><br>
                        <input type="submit" id="btn" value="Login" name="submit">
                            <div id="labels">
                                <div>
                                    <label for="register">Not registered?</label>
                                </div>
                                <div class="account">
                                    <a href="registration.php"><label>Create an account</label></a>
                                </div>
                            </div>
                    </form>
            </div>
        </body>
    </html>

    <script>
        function validatePassword(password) {
            // Check if password length is not more than 10 characters
            if (password.length > 10) {
                alert("Password must be 10 characters or less.");
                return false;
            }
            // Check if password contains at least one special character
            var regex = /[!@#$%^&*()_+{}\[\]:;<>,.?~`\-="']/;
            if (!regex.test(password)) {
                alert("Password must contain at least one special character.");
                return false;
            }
            // Password is valid
            return true;
        }
 
        function validateForm() {
            var password = document.getElementById("pass").value;
            return validatePassword(password);
        }
    </script>

<?php
 require_once'connection.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
   
  

    // Query to check if the username and password match
    $sql = "SELECT * FROM registration WHERE username='$username' AND password='$password'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        // Authentication successful
        // Insert username into the "login" table
        $insert_sql = "INSERT INTO logging (username,password) VALUES ('$username','$password')";
        if ($con->query($insert_sql) === TRUE) {
            // Redirect the user to another page
            header("Location: patient.php");
            exit();
        } else {
            
             // Error inserting login record
             echo "<script>alert('Error inserting login record: " . $con->error . "');</script>";
        }
    } else {
        // Authentication failed
        echo "<script>alert('Invalid username or password. Please try again.');</script>";
    }

    $con->close(); // Close the connection
}
?>