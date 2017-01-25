

<?php

/* Author:Bronson Boone */
/* This code checks the submitted username and redirects to the appropriate page */
/* either back to index.html or contentManager.php */

ini_set('display_errors', 'On');
error_reporting(E_ALL);

session_start();

$username = $_POST["usernameInput"];

$conn = mysqli_connect("localhost", "php_user", "bad_password", "baboone_db");

$query = "SELECT password_hash FROM Admins WHERE username=? AND isAdmin=1;";


$stmt = $conn->prepare($query);

$stmt->bind_param("s", $username);
$stmt->execute();

$stmt->bind_result($pwHash);

$stmt->fetch();

$stmt->close();
$conn->close();

if (password_verify($_POST["passwordInput"], $pwHash)) {
  $_SESSION["loggedIn"] = $username;
  header("Location: contentManager.php");

}

else {
  $_SESSION["loggedIn"] = "";
  header("Location: index.html");

}

?>