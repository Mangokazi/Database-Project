<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        var originalPassword = "";

        function validatePasswords() {
            var password = document.getElementById('pass').value.trim();
            var confirmPassword = document.getElementById('con-pass').value.trim();

            if (password !== confirmPassword) {
                alert("Passwords do not match");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }

        function updateConfirmPassword(value) {
            var conPass = document.getElementById('con-pass');
            if (originalPassword !== "") { // Only update if originalPassword is set
                conPass.value = value.slice(0, originalPassword.length); // Limit the input length to originalPassword length
            }
        }
        
        function setPassword() {
            originalPassword = document.getElementById('pass').value.trim();
        }
          
    </script>
</head>
<body class="header">
    <div id="form1">
        <h1>Register</h1>
        <form name="form" method="post"  onsubmit="return validatePasswords()">
            <input type="email" id="username" name="username" placeholder="Username" required><br><br>
            
            <input type="password" id="pass" name="password" placeholder="Password" oninput="setPassword();"><br><br>
            <input type="password" id="con-pass" name="confirm_password" placeholder="Confirm Password" oninput="updateConfirmPassword(this.value)"><br><br>
            <input type="submit" id="btn" value="Register" name="submit">
            <div id="labels">
                <div>
                    <a href="index.php"><label for="login"><span>Back</span></label></a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
require_once'connection.php';


if(isset($_POST['submit']))

{

   $username= $_POST['username'];


   

   $password= $_POST['password'];


   $confirm_password = $_POST['confirm_password'];



}


if(isset($_POST['submit']))

{



    $query = "INSERT INTO registration (username, password, confirm_password) VALUES ('$username', '$password', '$confirm_password')";

$result = $con->query($query);
if(!$result)

 
{
    die($con->error);

    

}

else

{



echo"alert('Information successfully submitted!')";

}

}

?>