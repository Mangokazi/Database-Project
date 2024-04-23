


<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
        <div id="form1">
            <h1>Login Form</h1>
            <form name="form"  method="POST" action="Patient-table.php">
                <label>Username: </label>
                <input type="text" id="user" name="username"></br></br>
                <label>Password: </label>
                <input type="password" id="pass" name="password"></br></br>
                <input type="submit" id="btn" value="Login" name = "submit"/>
        
       
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


}
?>