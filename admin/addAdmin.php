<?php
/* this php takes the username and pw from the form, hashes the pw and 
   inserts it into the database as an active admin by default 
   you must be logged in to access this page
   
   redirects to contentManager.php (admin homepage)*/
include "isLoggedIn.php";

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$conn = mysqli_connect("localhost", "php_user", "bad_password", "baboone_db");

$username = $_POST["newUsername"];
$password_hash = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);

$query = 'INSERT INTO Admins (username, password_hash) VALUES (?, ?);';

$stmt = $conn->prepare($query);

$stmt->bind_param("ss", $username, $password_hash);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location:contentManager.php");


?>