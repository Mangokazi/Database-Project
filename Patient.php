<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="header">
    <div class="header">
        <div class="side-nav">
            <div class="user">
                <div>
                    <h2>Ardaciti</br> Medicentre</h2>
                </div>
            </div>
            <ul>
                <li><img src="Images/dashboard.png" alt="">
                    <p>Dashboard</p>
                </li>
                <a href="Patient-table.php"><li><img src="Images/members.png" alt="">
                    <p>Patients</p>
                </li></a>
                <li><img src="Images/reports.png" alt="">
                    <p>Reports</p>
                </li>
                <a href="survey.php"><li><img src="Images/survey.png" alt="">
                    <p>Survey</p>
                </li></a>
            </ul>
            <ul>
                <li><img src="Images/logout.png" alt="">
                    <a href="Landing_Page.php"><p>Logout</p></a>
                </li>
            </ul>
        </div>
        <div class="form">
            <form id="add-patient-form" method="post">
                <h3>Add Patient</h3>
                <table>
                    <tr>
                        <td><label for="name">Name:</label></td>
                        <td><input type="text" id="name" name="name" required></td>
                    </tr>
                    <tr>
                        <td><label for="surname">Surname:</label></td>
                        <td><input type="text" id="surname" name="surname" required></td>
                    </tr>
                    <tr>
                        <td><label for="phone-number">Phone number:</label></td>
                        <td><input type="number" id="phone-number" name="number" placeholder="071 415 2451" required></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td><label for="dob">Date of Birth:</label></td>
                        <td><input type="date" id="dob" name="dob" required></td>
                    </tr>
                    <tr>
                        <td><label>Gender:</label></td>
                        <td>
                            <input type="radio" id="male" name="gender" value="male" class="gender" required> Male
                            <input type="radio" id="female" name="gender" value="female" required class="gender"> Female
                            
                        </td>
                    </tr>
                    <tr>
                        <td><label for="diagnosis">Diagnosis:</label></td>
                        <td><input type="text" id="diagnosis" name="diagnosis" required></td>
                    </tr>
                    <tr>
                        <td><label for="address">Address:</label></td>
                        <td><textarea id="address" name="address" type="text" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="date">Date:</label></td>
                        <td><input id="date" name="date" type="date" required></input></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" name ='submit' class="add_patient">Submit</button></td>
                    </tr>
                </table>
            
        </div>
    </div>
    </form>
            
</body>
</html>
<?php

require_once'connection.php';



$name = $surname = $number= $email =  $dob = $gender= $diagnosis=$address=" ";



if(isset($_POST['name']))

{

    $name = $_POST['name'];

	$surname = $_POST['surname'];

	$number= $_POST['number'];

	$email= $_POST['email'];
    $dob = $_POST['dob'];

	$gender = $_POST['gender'];

	$diagnosis= $_POST['diagnosis'];

	$address= $_POST['address'];
	$date= $_POST['date'];


}



if(isset($_POST['submit']))

{



$query = "INSERT INTO patient(name,surname,number,email,dob,gender,diagnosis,address, date)VALUES('$name','$surname',' $number','$email',' $dob',' $gender','$diagnosis','$address','$date')";



$result = $con->query($query);



if(!$result)

{die($con->error);


}

else

{



echo"alert('Information successfully submitted!')";

}

}

