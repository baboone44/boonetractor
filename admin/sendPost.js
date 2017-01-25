// This code adds the contents of managePost.html to the Blog Database

$(document).ready(function() {
    $title = ("#postTitle").val();
    $body  = ("#postBody").val();

    

    $("#postButton").click(function() {
	$.ajax( { 
	    url:"insertPost.php"
	    data: {title: $title, body: $body}
	});
    });

}):
