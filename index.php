<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <a href="index.php" class="btn btn--opacity">Login</a>
    </head>
    <body>
    <div id="form1">
            <
            <h1>Login Details</h1>
            <form name="form"  method="POST" action="Patient-table.php">

<input type="text" id="user" name="username" placeholder="username"></br></br>

<input type="password" id="pass" name="password" placeholder = "password"></br></br>
<input type="submit" id="btn" value="Login" name = "submit"/>
</form>
</div>


<div id="labels">

<label for="reset">Password lost? <span>Reset</span></label>
<label for="login"><span>Back</span></label>
<label for="register">Not registered? <span>Create an account</span></label>
</div>

</body>
</form> 
</html>

<?php
require_once 'connection.php';

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute SQL statement
    $query = $con->prepare("INSERT INTO logging (username, password) VALUES (?, ?)");
    $query->bind_param("ss", $username, $hashed_password);
    
    if($query->execute()) {
        echo "<script>alert('Information successfully submitted!');</script>";
    } else {
        echo "<script>alert('Error: " . $con->error . "');</script>";
    }
}
?>