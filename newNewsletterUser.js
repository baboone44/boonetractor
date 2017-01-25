$(document).ready(function () {
    $("#newsletterButton").click(function() {
	$email = $("#newsletterEmail").val();
	if($email != "") {
	    $.ajax({url:"newEmail.php",
		    data: {emailAddress: $email},
		    success: function () {
			$("#newsletter").html("Successfully Added, Welcome!");
		    }

		   });
	}
    });

    $("#unsubscribeButton").click(function() {
	$email = $("#newsletterEmail").val();
	if($email != "") {
	    $.ajax({url:"unsubscribe.php",
		    data: {emailAddress: $email},
		    success: function (result) {
			console.log("Testing");
			console.log(result);
			$("#newsletter").html("Sorry to see you go!");
		    }

		   });
	}
    });
});

