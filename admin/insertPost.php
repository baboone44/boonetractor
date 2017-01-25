<?php
/* Author:Bronson Boone */
/* This code adds the specified title and body to the Blog Database */

ini_set('display_errors', 'On');
error_reporting(E_ALL);

include "isLoggedIn.php";

$conn = mysqli_connect("localhost", "php_user", "bad_password", "baboone_db");

$title = $_POST["postTitle"];
$body = $_POST["postBody"];

$query = 'INSERT INTO Deals (title, body) VALUES (?, ?);';

$stmt = $conn->prepare($query);

$stmt->bind_param("ss", $title, $body);

$stmt->execute();

$stmt->close();
$conn->close();

header("Location: managePost.php");


?>