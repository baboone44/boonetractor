// This code confirms the username and redirects to createPost.html

$(document).ready(function() {
    $username = $_GET["#usernameInput"];
    $("#login").click( function() {
    $.ajax( {
	url:"confirmCredentials.php",
	DATA: $username,
	success: function ()

    });

    });

});
