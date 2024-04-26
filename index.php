       
  <html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
         </head>
    <body class="header">
        <div id="form1">
            <h1>Login Details</h1>
            <form name="form1"  method="post" >
                <input type="text" id="username" name="username" placeholder="username"></br></br>
                <input type="password" id="password" name="password" placeholder = "password"></br></br>
               <input type="submit" id="btn" value="Submit" name="submit">

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