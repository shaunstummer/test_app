function submitForm()
{
	alert("CALLED")
	var uname = $(['name="username"']).val();
	var pword = $(['name="password"']).val();
	
	window.localStorage.setItem("username", uname);
	window.localStorage.setItem("password", pword);
	
	//Implament my own change page functionality
	//$.mobile.changePage("#page2", { reverse: false, transition: "slide" });
	
	$('#output').html("Username: " + window.localStorage.getItem("username") + "<br>" +
						"Password: " + window.localStorage("password"));
	
	
	return false;

}