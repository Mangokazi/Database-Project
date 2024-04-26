<?php
require_once 'connection.php'; // Include your database connection file

// Check if the connection is established
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Pagination logic
$results_per_page = 6; // Number of results per page
if (!isset($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] < 1) {
    $page = 1; // Default page number
} else {
    $page = $_GET['page'];
}

$start_from = ($page - 1) * $results_per_page; // Calculate starting point for fetching results


// Fetch data from the database
$query = "SELECT * FROM patient LIMIT $start_from, $results_per_page";
$result = $con->query($query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $con->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="header">
   <div class="header">
        <div class="side-nav">
            <div class="user">
                <div>
                    <h2>Ardaciti </br> Medicentre</h2>
                </div>
            </div>
            <ul>
                <li><img src="Images/dashboard.png" alt=""><p>Dashboard</p></li>
                <a href="Patient-table.php"><li><img src="Images/members.png" alt="">
                    <p>Patients</p>
                </li></a>
                <li><img src="Images/reports.png" alt=""><p>Reports</p></li>
                <a href="survey.php"><li><img src="Images/survey.png" alt="">
                    <p>Survey</p>
                </li></a>
            </ul>
            <ul>
                <li><img src="Images/logout.png" alt="">
                    <a href="Landing_Page"><p>Logout</p></a>
                </li>
            </ul>
        </div>
        <div>
            <button class="patients-btn" id="add-patient-btn">
                <img src="Images/add-user.png" alt="" class="add-user-img">
                    <span>Add Patient</span>
            </button>
        </div>
        <div class="patient_container">
            <table class="responsive-table">
                <thead>
                    <tr class="table-header">
                        <th class="col col-1">Name</th>
                        <th class="col col-2">Surname</th>
                        <th class="col col-3">Phone Number</th>
                        <th class="col col-4">Email</th>
                        <th class="col col-5">DOB</th>
                        <th class="col col-6">Gender</th>
                        <th class="col col-7">Diagnosis</th>
                        <th class="col col-8">Address</th>
                        <th class="col col-9">Date</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                        // Check if there are any rows returned
                        if ($result->num_rows > 0) {
                            // Loop through each row and display data
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='table-row'>";
                                echo "<td class='col col-1' data-label='Name'>" . $row['name'] . "</td>";
                                echo "<td class='col col-2' data-label='Surname'>" . $row['surname'] . "</td>";
                                echo "<td class='col col-3' data-label='Phone Number'>" . $row['number'] . "</td>";
                                echo "<td class='col col-4' data-label='Email'>" . $row['email'] . "</td>";
                                echo "<td class='col col-5' data-label='DOB'>" . $row['dob'] . "</td>";
                                echo "<td class='col col-6' data-label='Gender'>" . $row['gender'] . "</td>";
                                echo "<td class='col col-7' data-label='Diagnosis'>" . $row['diagnosis'] . "</td>";
                                echo "<td class='col col-8' data-label='Address'>" . $row['address'] . "</td>";
                                echo "<td class='col col-9' data-label='Date'>" . $row['date'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No data available</td></tr>";
                        }
                        ?>
                    </tbody>
            </table>
        </div>
        <!-- Pagination links -->
        <div class="pagination">
            <?php
            // Determine total number of pages
            $query = "SELECT COUNT(*) AS total FROM patient";
            $result = $con->query($query);
            $row = $result->fetch_assoc();
            $total_pages = ceil($row['total'] / $results_per_page);

            // Display pagination links
            ?>
            <a <?php echo ($page <= 1) ? 'class="disabled"' : ''; ?> href="<?php echo ($page <= 1) ? '#' : 'Patient-table.php?page=' . ($page - 1); ?>">&laquo; Previous</a>
            <a <?php echo ($page >= $total_pages) ? 'class="disabled"' : ''; ?> href="<?php echo ($page >= $total_pages) ? '#' : 'Patient-table.php?page=' . ($page + 1); ?>">Next &raquo;</a></div>
        </div>
    </div>
   <script>
    document.getElementById("add-patient-btn").addEventListener("click", function() {
        window.location.href="Patient.php";
    })
   </script> 
</body>
</html>

