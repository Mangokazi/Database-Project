<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="header">
        <div class="side-nav">
            <div class="user">
                <img src="Images/user.png" class="user-img">
                <div>
                    <h2>David M</h2>
                    <p>davidm@xyz.com</p>
                </div>
                <img src="Images/star.png" class="star-img">
            </div>
            <ul>
                <li><img src="Images/dashboard.png" alt=""><p>Dashboard</p></li>
                <li><img src="Images/members.png" alt=""><p>Patients</p></li>
                <li><img src="Images/reports.png" alt=""><p>Reports</p></li>
                <li><img src="Images/setting.png" alt=""><p>Settings</p></li>
            </ul>
            <ul>
                <li><img src="Images/logout.png" alt=""><p>Logout</p></li>
            </ul>
        </div>
        <div>
            <button class="patients-btn" id="add-patient-btn">
                <img src="Images/add-user.png" alt="" class="add-user-img">
                    <span>Add Patient</span>
            </button>
        </div>
        <div class="patient_container">
            <ul class="responsive-table">
                <li class="table-header">
                    <div class="col col-1">Name</div>
                    <div class="col col-2">Surname</div>
                    <div class="col col-3">Age</div>
                    <div class="col col-4">Gender</div>
                    <div class="col col-5">Address</div>
                    <div class="col col-6">Phone Number</div>
                    <div class="col col-7">Diagnosis</div>
                </li>
                <li class="table-row">
                    <div class="col col-1" data-label="Name">Larry</div>
                    <div class="col col-2" data-label="Surname">Smith</div>
                    <div class="col col-3" data-label="Age">40</div>
                    <div class="col col-4" data-label="Gender">Male</div>
                    <div class="col col-5" data-label="Address">19 Durham Avenue, Salt River</div>
                    <div class="col col-6" data-label="Phone Number">+27 765 7992</div>
                    <div class="col col-7" data-label="Diagnosis">Hypertension</div>
                </li>
                <li class="table-row">
                    <div class="col col-1" data-label="Name">Maggy</div>
                    <div class="col col-2" data-label="Surname">Steward</div>
                    <div class="col col-3" data-label="Age">30</div>
                    <div class="col col-4" data-label="Gender">Female</div>
                    <div class="col col-5" data-label="Address">11 Salt River Rd, Salt River</div>
                    <div class="col col-6" data-label="Phone Number">+27 725 7932</div>
                    <div class="col col-7" data-label="Diagnosis">Heart Disease</div>
                </li>
            </ul>
        </div>
   </div>
   <script>
    document.getElementById("add-patient-btn").addEventListener("click", function() {
        window.location.href="Patient.php";
    })
   </script> 
</body>
</html>