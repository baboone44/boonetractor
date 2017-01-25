<?php
$conn = mysqli_connect("localhost", "php_user", "bad_password", "baboone_db");

$query = 'SELECT title, body FROM Blog ORDER BY id DESC;';

$stmt = $conn->prepare($query);

$stmt->execute();

/* Author:Bronson Boone */
/* This code returns to client.html blog posts and titles in the specified format*/

$stmt->bind_result($title, $body);


while($stmt->fetch()) {
  echo "<div class='col-sm-6 col-md-4 col-lg-3'>
	<h3 class='text-left'>".$title."</h3>
	<p>".$body."</p></div>";
    };

?>