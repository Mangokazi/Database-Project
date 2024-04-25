
<?php
$dbhost = "localhost";

$dbuser = "root";

$dbpass = "";

$dbname = "management_system";

If(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))

{

	die("failed to connect");

	

}



?>