<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$conn = mysqli_connect("localhost", "php_user", "bad_password",
		       "baboone_db");
$query = "SELECT
        View1.service_id,
	business_name,
	ServiceRequestType.description as category,
	store_id,
	status,
	date_submitted
FROM (
     SELECT service_id, business_name, description, store_id, status,
     	    date_submitted, request_type
     FROM ServiceRequest JOIN BT_Customers
     ON ServiceRequest.customer_id = BT_Customers.id
     )
AS View1
JOIN ServiceRequestType
ON View1.request_type = ServiceRequestType.id_type;";
$stmt = $conn->prepare($query);

$stmt->execute();

$stmt->bind_result($id, $name, $category, $store_id, $status, $date);

?>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <script type="text/javascript"
	    src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
	    src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

  </head>
  <body>
  <div class="container-fluid">
      <div class="panel panel-primary">
	<div class="panel-heading">
	  <div class="panel-title">
	    Service Request
	  </div>
	</div>
	<div class="panel-body">
	  <table class="table display" id="request_list">
  <thead>
	    <tr>
	      <th>Name</th>
	      <th>Category</th>
	      <th>Store</th>
	      <th>Status</th>
	      <th>Date</th>
	    </tr>
  </thead>
  <tbody>
	    <?php
  while($stmt->fetch()){
	       echo "<tr>";
	       echo "<td><a href='../service_request/view_request.php?id=$id'>$name</a></td>";
	       echo "<td>$category</td>";
	       echo "<td>$store_id</td>";
	       echo "<td>$status</td>";
	       echo "<td>$date</td>";
	       echo "</tr>";
  }
	    ?>
</tbody>
</table>
</div><!-- panel body -->
</div>
</div>

<script>$('#request_list').DataTable();</script>
