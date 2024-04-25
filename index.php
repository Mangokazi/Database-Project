<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
       
    </head>
    <body class="header">
        <div id="form1">
            <h1>Login Details</h1>
            <form name="form"  method="POST" >
                <input type="text" id="user" name="username" placeholder="username"></br></br>
                <input type="password" id="pass" name="password" placeholder = "password"></br></br>
                <a href="patient-table.php" id="btn" name ="save">Login</a>
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
require_once 'connection.php';

$username = $password = "";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO logging(username, password) VALUES ('$username', '$password')";
    $result = $con->query($query);

    if (!$result) {
        die($con->error);
    } else {
        echo "<script>alert('Information successfully submitted!');</script>";
    }
}
?>