<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$conn = mysqli_connect("localhost", "php_user", "bad_password",
		       "baboone_db");

$query = 'SELECT  id, title, visible FROM Blog ORDER BY id DESC WHERE visible=1';

$stmt = $conn->prepare($query);

$stmt->execute();

$stmt->bind_result($dealID, $title, $isVisible);


while($stmt->fetch()) {
echo "<tr id='row$dealID'>";
echo "<td>$title</td>";
echo "<td><button class='btn btn-primary'>Remove</td>";
echo "</tr>";
}


include "managePost.html";
  
?>


