<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>

  <header class="banner">
    <div class="container">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li><a href="Patient-table.html">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</header>
<div id="wrapper" >
    
  <form method = 'post'>
    <input type="radio" id="login" name="action" value="login" checked>
    <input type="radio" id="register" name="action" value="register">
    <input type="radio" id="reset" name="action" value="reset">
    <div id="inputs">
      <div>
        <input type="email" name = "username" placeholder="email" autofocus>
        <div>
          <input type="password" name = "password"placeholder="password">
          <div>
            <input type="password" name="password"placeholder="repeat password ">
            <input type="submit" value="reset password">
            <div>
              <input type="submit"name = "save" value="register">
              <input type="submit" name ="save" value="login">
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div id="labels">
      <label for="login">Already registered? <span>Login</span></label>
      <label for="reset">Password lost? <span>Reset</span></label>
      <label for="login"><span>Back</span></label>
      <label for="register">Not registered? <span>Create an account</span></label>
    </div>
 
  
  </div>
    
  
  </body>
</html>
</form>

<?php



require_once'connection.php';



 $username  = $password= " ";



if(isset($_POST['username']))

{

    $username= $_POST['username'];


	$password = $_POST['password'];




}


if(isset($_POST['save']))

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