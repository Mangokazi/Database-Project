<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background-image">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <section class="login-form">
                        <form id="account" method="post" action="New.html">
                            <h2>Welcome back!</h2>
                            <hr />
                            <div class="error-message" style="display: none;">
                                Invalid email or password!
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input id="inputEmail" type="email" name="email" class="form-control" autocomplete="username" aria-required="true" placeholder="name@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input id="inputPassword" type="password" name="password" class="form-control" autocomplete="current-password" aria-required="true" placeholder="password" required>
                            </div>
                            <div class="form-check mb-3">
                                <input id="inputRememberMe" type="checkbox" name="remember_me" class="form-check-input">
                                <label class="form-check-label" for="inputRememberMe">Remember Me</label>
                            </div><br>
                            <div class="text-center">
                             
                                <button id="login-submit" type="submit" class="btn btn-primary">Log in</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
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
