<?php
$conn = mysqli_connect("localhost", "php_user", "bad_password", "baboone_db");

$query = "SELECT email_address from email_customers;";

$stmt = $conn->prepare($query);

$stmt->execute();

$stmt->bind_result($email);

?>

<html>
<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <td>Email Address</td>
    </tr>
  </thead>
  <tbody>
<?php
while($stmt->fetch()) {
  echo "<tr>";
  echo "<td>".$email."</td>";
  echo "</tr>";
}
?>
 </tbody>
</table>
</div>
</html>