<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include "isLoggedIn.php";

$conn = mysqli_connect("localhost", "php_user", "bad_password",
		       "baboone_db");

$query = 'UPDATE Deals SET isVisible=0  WHERE id=?';

$stmt = $conn->prepare($query);

$stmt->bind_param("d", $_POST["dealToRemove"]);



$stmt->execute();

$stmt->close();
$conn->close();


?> 