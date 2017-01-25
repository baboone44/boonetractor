var remove_deal = (function(id) {
	$.ajax({url:"removeDeal.php",
		data: {dealToRemove: id},
		method:"POST",
		success:function(result) {
		    $('#row'+id).remove();
		}
	});
    });
