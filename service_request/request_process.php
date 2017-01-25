<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$conn = mysqli_connect("localhost", "php_user", "bad_password",
		       "baboone_db");

$stmt = $conn->prepare("SELECT id FROM BT_Customers WHERE
phone_number=?;");

$stmt->bind_param("s", $_POST['phone']);

$stmt->execute();

$stmt->bind_result($customer_id);

if (!$stmt->fetch()) {
  $stmt->close();
  $query = "INSERT INTO BT_Customers(name, business_name,
  street_address, city, state, zip, phone_number, email_address) VALUES
  (?, ?, ?, ?, ?, ?, ?, ?);";


  $stmt = $conn->prepare($query);
  $stmt->bind_param("ssssssss",
		    $_POST['name'],
		    $_POST['business'],
		    $_POST['address'],
		    $_POST['city'],
		    $_POST['state'],
		    $_POST['zip'],
		    $_POST['phone'],
		    $_POST['email']);
  $stmt->execute();
  $customer_id = $conn->insert_id;
 
}

$stmt->close();

$query = "INSERT INTO ServiceRequest(customer_id, description,
request_type, store_id, status, date_submitted) VALUES (?, ?, ?, ?, ?, now());";



print_r($_POST);
$stmt = $conn->prepare($query);
$status_code = 1;
$stmt->bind_param("dsddd",
		  $customer_id,
		  $_POST['desc'],
		  $_POST['request'],
		  $_POST['store'],
		  $status_code);


$stmt->execute();
$conn->close();

header("Location: ../form_success.php");

?>

