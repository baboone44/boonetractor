<?php

$conn = mysqli_connect("localhost", "php_user", "bad_password", "baboone_db");

$query = "INSERT INTO email_customers (email_address) VALUES (?);";

$stmt = $conn->prepare($query);

$stmt->bind_param("s", $_GET["emailAddress"]);

$stmt->execute();

$stmt->close();
$conn->close();

?>