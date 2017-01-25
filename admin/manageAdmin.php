<?php
/* displays a list of admins in a table with a remove action via button
   manageAdmin.html includes a form to add new admins to the database */
ini_set('display_errors', 'On');
error_reporting(E_ALL);


$conn = mysqli_connect("localhost", "php_user", "bad_password", "baboone_db");

$query="SELECT username, isAdmin FROM Admins WHERE isAdmin=1 ORDER BY username DESC;";

$stmt = $conn->prepare($query);


$stmt->execute();

$stmt->bind_result($username, $isAdmin);

include "manageAdmin.html";

$stmt->close();
$conn->close();

?>