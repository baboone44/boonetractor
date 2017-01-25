<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include "isLoggedIn.php";

$conn = mysqli_connect("localhost", "php_user", "bad_password",
		       "baboone_db");

$query = 'UPDATE Admins SET isAdmin=0  WHERE username=?';

$stmt = $conn->prepare($query);

$stmt->bind_param("s", $_POST["adminToRemove"]);


$stmt->execute();

$stmt->close();
$conn->close();

?> 