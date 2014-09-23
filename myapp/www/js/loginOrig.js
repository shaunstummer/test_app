		/*Log in Validation - still needs to get rid of any html/sql injections*/
		function validateThis()
		{
			//alert("HELLO");
			var myForm = document.getElementById("myForm");
			myForm.onclick = validate;
			//myForm.onsubmit = validate;
			}
			
			/********************************/
			//bind init() function to onload event
			//onload = init;
			/******************************************/
			
			//validate() checks answers from validateRequired()
			//and validatepassword() and displays appropriate messages.
			//If an error occurs program execution is stopped:
			function validate()
			{
			var name = document.getElementById("txtName").value;
			var password = document.getElementById("txtPassword").value;
			
			window.localStorage.setItem("username", name);
			window.localStorage.setItem("password", password);
			//who is logged
			who_is_logged();
			
			//validateRequired() and validatepassword()
			//return true/false values: create
			//variables to store the result
			var isRequiredNameSet = false;
			var isRequiredpasswordSet = false;
			//Set data to be posted
			//var dataString = 'name1=' + name + '&password1=' + password;
			
			//create variable that holds message to display
			var message = "";
			isRequiredNameSet = validateRequired(name);
			isRequiredpasswordSet = validateRequired(password);
		
			//if all values are valid, prepare thank you message
			//and allow form submission
			if (isRequiredNameSet && isRequiredpasswordSet)
			{
			message = "Thank you, your details have been successfully posted!";
			return false;
			//Page redirection.
			//message = "Thank you for logging in: " + (window.localStorage.getItem("username")) + ". Your pass is: " + (window.localStorage.getItem("password"));
			
			}
			
			//if the name field is empty, write message to user and stop submission:
			else if (! isRequiredNameSet)
			{
			message = "Please, enter a name";
			writeMessage(message);	
			return false;
			}
			
			//If the password field is empty, write message to user and stop submission:
			else if (! isRequiredpasswordSet)
			{
			message = "Please, enter an password";
			writeMessage(message);
			return false;
			}
			
			//If we are here validation is successful:
			//display the thank you message with an alertbox:
			alert(message);
		}

		/***********************************************/
		//This function takes an argument
		//that represents the input element and checks
		//that it's not empty - it returns true if input is valid
		//and false if input is not valid:
		function validateRequired(input)
		{
			var isValid = false;
			if (input.length == 0)
			{
			isValid = false;
			}
			else
			{
			isValid = true;
			}
			return isValid;
		}

		/**********************************************/
		//writeMessage(text) has the message to
		//display to the user as argument, clears any previous
		//content from the paragraph with the id of result
		//and inserts the appropriate message for display
		//using DOM compliant techniques (lesson 14):
		
		function writeMessage(text)
		{
			var paragraph = document.getElementById("result");
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
	
	/*function rememberMe()
	{
		if(document.getElementById("myCheck").checked = true;)
		{
		
		}
		else
		{
		
		}
	}*/