<?php



ini_set('display_errors', 'On');
error_reporting(E_ALL);

$conn = mysqli_connect("localhost", "php_user", "bad_password", "baboone_db");

$query="SELECT id, title, isVisible FROM Deals WHERE isVisible=1 ORDER BY id DESC;";

$stmt = $conn->prepare($query);


$stmt->execute();

$stmt->bind_result($dealID, $dealTitle, $isVisible);

include "managePost.html";

$stmt->close();
$conn->close();

?>