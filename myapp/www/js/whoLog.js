	function who_is_logged()
	{
		//if(window.localStorage.getItem("username"))
		//{
			//var who_is = "Thank you for logging in: " + (window.localStorage.getItem("username")) + ". Your pass is: " + (window.localStorage.getItem("password"));
		//	writeMessage(who_is);
		//}
		//else
		//{
			var guest = "Welcome Guest";
			writeLogged(guest);
		//}
	}
	
	function writeLogged(text)
		{
			var paragraph = document.getElementById("logger");
			//The content inside the paragraph is the paragraph's
			//first child.  We check if there is any content and remove it:
			if (paragraph.firstChild)
			{
			paragraph.removeChild(paragraph.firstChild);
			}
			
			//Now we can create and append the new
			//message to display to the user:
			paragraph.appendChild(document.createTextNode(text));
		}
	