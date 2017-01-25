<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$current_id = $_GET['id'];

$conn = mysqli_connect("localhost", "php_user", "bad_password",
		       "baboone_db");
$query = "SELECT name, phone_number, description, request_type,
		       status, notes FROM ServiceRequest JOIN BT_Customers ON
		       ServiceRequest.customer_id = BT_Customers.id
                       WHERE service_id=?;";
$stmt = $conn->prepare($query);

$stmt->bind_param("d", $current_id);

$stmt->execute();

$stmt->bind_result($name, $phone, $description,
		   $request, $status, $notes);
$stmt->fetch();
?>
<html>
  <head>
    <title>Service Request</title>
    <link rel="stylesheet" type="text/css"
	  href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
	  href="../../bootstrap/css/bootstrap-theme.min.css">
    <script type="text/javascript"
	    src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script type="text/javascript"
	    src="../../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript"
	    src="../../form-validation/dis/jquery.validate.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="panel panel-primary">
	<div class="panel-heading">
	  <div class="panel-title">
	    Service Request
	  </div>
	</div>
	<div class="panel-body">
	  <div class="row">
	    <div class="col-md-6">
	      <dl class="dl-horizontal">
		<dt>Name</dt>
		<dd><?php echo $name; ?></dd>
		
		<dt>Phone</dt>
		<dd><?php echo $phone; ?></dd>
	      </dl>
	    </div>
	    <div class="col-md-6">
	      <strong>Description</strong>
	      <p>
		<?php echo $description; ?>
	      </p>
	    </div>
	  </div><!-- Description Row -->
  <hr/>
	  <div class="row">
	    <form id="request_update" method="POST" action="??">
	      <div class="form-group">
		<label for="status">
		  Status
		</label>
		<div class="radio">
		  <label>
		    <input type="radio" name="status" id="status1"
			   value="1"
			   <?php if($status == 1) { echo "checked";}?>/>
		    New
		  </label>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="status" id="status2"
			   value="2"
			   <?php if($status == 2) { echo "checked";}?>/>
		    Ongoing
		  </label>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="status" id="status3"
			   value="3"
			   <?php if($status == 3) { echo "checked"; }?>/>
		    Resolved
		  </label>
		</div>
	      </div><!-- Status Row -->
	      <div class="form-group">
		<label for="notes">
		  Notes
		</label>
		<textarea name="notes" id="notes" class="form-control"><?php echo $notes; ?></textarea>
	      </div>
	      <div class="form-group">
		<button class="btn btn-default">Save</button>
	      </div>
	    </form>
	  </div>
	</div>
      </div>
    </div>
  </body>
</html>
