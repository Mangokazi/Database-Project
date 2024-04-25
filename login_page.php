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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login_page">
    <div class="cont_principal">
        <div class="cont_centrar">
        <div class="cont_login">
          <form  method="POST">
          <div class="cont_tabs_login">
            <ul class='ul_tabs'>
              <li class="active"><a href="#" onclick="sign_in()">SIGN IN</a>
              </li>
              <li><a href="#up" onclick="sign_up()">SIGN UP</a>
              </li>
              <span class="linea_bajo_nom"></span>
            </ul>
            </div>
        <div class="cont_text_inputs">
            
            
            <input type="text" class="input_form_sign d_block active_inp" placeholder="EMAIL" name="email" />
            <input type="password" class="input_form_sign d_block  active_inp" placeholder="PASSWORD" name="password" />  
            <input type="password" class="input_form_sign" placeholder="CONFIRM PASSWORD" name="confirm_password" />
        </div>
        <div class="cont_btn">
           <button class="btn_sign">SIGN IN</button>
            </div>
           
          </form>
          </div>
         
        </div>
      </div>
</body>

<script>
    function sign_up(){
    var inputs = document.querySelectorAll('.input_form_sign');
    document.querySelectorAll('.ul_tabs > li')[0].className="";
    document.querySelectorAll('.ul_tabs > li')[1].className="active";
    
    for(var i = 0; i < inputs.length ; i++  ) {
    if(i == 2  ){
    
    }else{  
    document.querySelectorAll('.input_form_sign')[i].className = "input_form_sign d_block";
    }
    }
 
    setTimeout( function(){
    for(var d = 0; d < inputs.length ; d++  ) {
    document.querySelectorAll('.input_form_sign')[d].className = "input_form_sign d_block active_inp";  
    }
 
 
   },100 );
    document.querySelector('.link_forgot_pass').style.opacity = "0";
    document.querySelector('.link_forgot_pass').style.top = "-5px";
    document.querySelector('.btn_sign').innerHTML = "SIGN UP";    
    setTimeout(function(){
 
   document.querySelector('.terms_and_cons').style.opacity = "1";
    document.querySelector('.terms_and_cons').style.top = "5px";
   
    },500);
    setTimeout(function(){
      document.querySelector('.link_forgot_pass').className = "link_forgot_pass d_none";
   document.querySelector('.terms_and_cons').className = "terms_and_cons d_block";
    },450);
 
  }
 
 
 
  function sign_in(){
    var inputs = document.querySelectorAll('.input_form_sign');
    document.querySelectorAll('.ul_tabs > li')[0].className = "active";
    document.querySelectorAll('.ul_tabs > li')[1].className = "";
   
    for(var i = 0; i < inputs.length ; i++  ) {
        switch(i) {
            case 1:
                console.log(inputs[i].name);
                break;
            case 2:
                console.log(inputs[i].name);
        default:
            document.querySelectorAll('.input_form_sign')[i].className = "input_form_sign d_block";
        }
    }
 
  setTimeout( function(){
  for(var d = 0; d < inputs.length ; d++  ) {
  switch(d) {
      case 1:
   console.log(inputs[d].name);
          break;
      case 2:
   console.log(inputs[d].name);
 
      default:
   document.querySelectorAll('.input_form_sign')[d].className = "input_form_sign d_block";  
   document.querySelectorAll('.input_form_sign')[2].className = "input_form_sign d_block active_inp";  
 
     }
    }
   },100 );
 
   document.querySelector('.terms_and_cons').style.opacity = "0";
    document.querySelector('.terms_and_cons').style.top = "-5px";
 
    setTimeout(function(){
   document.querySelector('.terms_and_cons').className = "terms_and_cons d_none";
  document.querySelector('.link_forgot_pass').className = "link_forgot_pass d_block";
 
   },500);
 
    setTimeout(function(){
 
   document.querySelector('.link_forgot_pass').style.opacity = "1";
     document.querySelector('.link_forgot_pass').style.top = "5px";
     
 
  for(var d = 0; d < inputs.length ; d++  ) {
 
  switch(d) {
      case 1:
   console.log(inputs[d].name);
          break;
      case 2:
   console.log(inputs[d].name);
 
           break;
      default:
   document.querySelectorAll('.input_form_sign')[d].className = "input_form_sign";  
  }
    }
     },1500);
     document.querySelector('.btn_sign').innerHTML = "SIGN IN";    
  }
 
 
  window.onload =function(){
    document.querySelector('.cont_centrar').className = "cont_centrar cent_active";
 
  }
  </script>


<!--REGISTRATION CONNECTION-!>

<?php
require_once'connection.php';



$username  = $password= " ";



if(isset($_POST['submit']))

{

   $name= $_POST['username'];


   $surname = $_POST['surname'];

   $password= $_POST['password'];


   $confirm_password = $_POST['confirm_password'];



}


if(isset($_POST['submit']))

{



    $query = "INSERT INTO registration (username, surname, password, confirm_password) VALUES ('$username', '$surname', '$password', '$confirm_password')";

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

//LOGIN CONNECTION
