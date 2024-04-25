
    <html>
    <head>
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body class="header">
        <div id="form1">
            <h1>Register</h1>
            <form name="form"  method="post" >
                <input type="text"  name="first_name" placeholder = "First Name"></br></br>
                <input type="text"  name="last_name" placeholder = "Last Name"></br></br>
                <input type="password"  name="password" placeholder="Password"></br></br>
                <input type="password" name="confirm_password" placeholder="Confirm Password"></br></br>
                <input type="submit" id="btn" value="Register" name = "submit" />
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