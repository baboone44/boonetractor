// This code populates the client.html page with the articles from the Blog Database

$(document).ready( function () { 
    $.ajax( { 
	url:"deals/populateArticles.php",
	success: function(result) {
	    $("#blogPosts").append(result);
	}
    });

    

});
