<?php
/* This code returns to recentDeals.html deals w/ a title
    in the specified format*/

$conn = mysqli_connect("localhost", "php_user", "bad_password", "baboone_db");

$query = 'SELECT title, body FROM Deals WHERE isVisible=1 ORDER BY id DESC;';

$stmt = $conn->prepare($query);

$stmt->execute();

$stmt->bind_result($title, $body);


while($stmt->fetch()) {
  echo "<div class='col-lg-6'>
	<h3 class='text-left'>".$title."</h3>
	<p>".$body."</p></div>";
    };

$stmt->close();
$conn->close();

?>