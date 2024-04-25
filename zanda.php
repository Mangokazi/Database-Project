<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <!--<a href="index.php" class="btn btn--opacity">Login</a>-->
    </head>
    <body class="header">
        <div id="form1">
            <h1>Login Details</h1>
            <form name="form"  method="POST" action="Patient-table.html">
                <input type="text" id="user" name="username" placeholder="username" required></br></br>
                <input type="password" id="pass" name="password" placeholder = "password" required></br></br>
                <input type="submit" id="btn" value="Login" name = "submit"/>
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

