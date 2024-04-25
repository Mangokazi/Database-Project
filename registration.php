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
        <form name="form" method="post" action="index.html" onsubmit="return validatePasswords()">
            <input type="text" id="first" name="first_name" placeholder="First Name" required><br><br>
            <input type="text" id="last" name="last_name" placeholder="Last Name" required><br><br>
            <input type="password" id="pass" name="password" placeholder="Password" oninput="setPassword();"><br><br>
            <input type="password" id="con-pass" name="confirm_password" placeholder="Confirm Password" oninput="updateConfirmPassword(this.value)"><br><br>
            <input type="submit" id="btn" value="Register" name="submit">
            <div id="labels">
                <div>
                    <a href="index.html"><label for="login"><span>Back</span></label></a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
require_once'connection.php';



$username  = $password= " ";



if(isset($_POST['submit']))

{

   $first_name= $_POST['first_name'];


   $last_name = $_POST['last_name'];

   $password= $_POST['password'];


   $confirm_password = $_POST['confirm_password'];



}


if(isset($_POST['submit']))

{



    $query = "INSERT INTO registration (first_name, last_name, password, confirm_password) VALUES ('$first_name', '$last_name', '$password', '$confirm_password')";

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