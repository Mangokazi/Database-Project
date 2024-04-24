
    <html>
    <head>
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="form1">
            <h1>Register</h1>
            <form name="form"  method="post" action= "index.php">
                <input type="text" id="first" name="first_name" placeholder = "firstname"></br></br>
                <input type="text" id="last" name="last_name" placeholder = "lastname"></br></br>
                <input type="password" id="pass" name="password" placeholder="password"></br></br>
                <input type="password" id="con-pass" name="confirm_password" placeholder="confirm-password"></br></br>
                <input type="submit" id="btn" value="Register" name = "submit"/>

        <div id="labels">

      <label for="login"><span>Back</span></label>
    </div>
    </body>
    </form>
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