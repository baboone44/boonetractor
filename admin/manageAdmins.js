var remove_admin = (function(id) {
	$.ajax({url: "removeAdmin.php",
		data: {adminToRemove: id},
		method:"POST",
		success:function(result) {
		    console.log(result);
		    $('#row'+id).remove();
		}
	});
    });
