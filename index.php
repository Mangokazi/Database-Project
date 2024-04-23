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
require_once'connection.php';



$username  = $password= " ";



if(isset($_POST['username']))

{

   $username= $_POST['username'];


   $password = $_POST['password'];




}


if(isset($_POST['submit']))

{



$query = "INSERT INTO logging(username,password)VALUES('$username','$password')";



$result = $con->query($query);



if(!$result)

 {die($con->error);



}

else

{



echo"alert('Information successfully submitted!')";

}

}

?>