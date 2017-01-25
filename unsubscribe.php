<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$conn = mysqli_connect("localhost", "php_user", "bad_password",
		       "baboone_db");

$query = 'DELETE FROM email_customers WHERE email_address=?';

$stmt = $conn->prepare($query);
echo "Attempting to remove" .  $_GET['emailAddress'];
$stmt->bind_param("s", $_GET["emailAddress"]);
$stmt->execute();

$stmt->close();
$conn->close();



?>