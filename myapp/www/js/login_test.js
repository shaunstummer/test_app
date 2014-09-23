		/*Log in Validation - still needs to get rid of any html/sql injections*
		function init()
		{
			var myForm = document.getElementById("myForm");
			myForm.onsubmit = validate;
			}
			
			/********************************
			//bind init() function to onload event
			//onload = init;
			/******************************************
			
			//validate() checks answers from validateRequired()
			//and validatepassword() and displays appropriate messages.
			//If an error occurs program execution is stopped:
			function validate()
			{
			
			var name = document.getElementById("txtName").value;
			var password = document.getElementById("txtPassword").value;
			
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
			//MakeRequest();
			//Server request code to submit form.
			//callServe();
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

		/***********************************************
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

		/**********************************************
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
		}*/

		
	function getXMLHttp()
		{
		  var xmlHttp

		  try
		  {
			//Firefox, Opera 8.0+, Safari
			xmlHttp = new XMLHttpRequest();
		  }
		  catch(e)
		  {
			//Internet Explorer
			try
			{
			  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e)
			{
			  try
			  {
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  catch(e)
			  {
				alert("Your browser does not support AJAX!")
				return false;
			  }
			}
		  }
		  return xmlHttp;
		}
		
	function MakeRequest()
	{
	  var xmlHttp = getXMLHttp();

	  xmlHttp.onreadystatechange = function()
	  {
		if(xmlHttp.readyState == 4)
		{
		  HandleResponse(xmlHttp.responseText);
		}
	  }

	  xmlHttp.open("GET", "file:///D:/ServeWamp/wamp/www/ajax.php", true);  
	  xmlHttp.send(null);
	}
	
	function HandleResponse(response)
	{
	  document.getElementById('res2').innerHTML = response;
	}
		
		/*********************************************
		function callServe()
		{
			var Request = null;
			try
			{
				Request = getXMLHttpRequest();
				alert("WE GOT IT BOYS: " + Request);
			}
			catch(error)
			{
				alert("Cannot run Ajax using this browser");
				//document.write("Cannot run Ajax using this browser: " + Request);
			}
			
			if(Request != null)
			{
				//get input values
				var name1 = document.getElementById("txtName").value;
				//var password1 = document.getElementById("txtPassword").value;
				
				var strUrl = "https://dwarf.ict.griffith.edu.au/~s2804685/login_test/php/login.php?name1=" + name1;
				//var strUrl = "login.php?password1=" + password1;
				Request.onreadystatechange = changePage;
				Request.open("POST", strUrl, true);
				Request.send(null);
			}
		}
		
		function changePage()
		{
			if(xhrequest.readyState == 4 && xhrequest.status == 200)
			{
				var strResponse = xhrequest.responseText;
				doucment.getElementById("res2").innerHTML = str Response;
			}
		}
		/*********************************************
		
		function getXMLHttpRequest()
		{
		 var xhrequest = null;
		 if(window.XMLHttpRequest)
		 {
		 // If IE7, Mozilla, Safari, etc: Use native object
		  try
		  {
		   xhrequest = new XMLHttpRequest();
		   return xhrequest;
		  }
		  catch(exception)
		  {
		  // OK, just carry on looking
		  }
		 }
		 else
		 {

		  // ...otherwise, use the ActiveX control for IE5.x and IE6
		   var IEControls = ["MSXML2.XMLHttp.5.0","MSXML2.XMLHttp.4.0","MSXML2.XMLHttp.3.0","MSXML2.XMLHttp"];
		   for(var i=0; i<IEControls.length; i++)
		   {
			try
			{
			 xhrequest = new ActiveXObject(IEControls[i]);
			 return xhrequest;
			}
			catch(exception)
			{
			 // OK, just carry on looking
			}
		   }
		  // if we got here we didn’t find and matches
		  throw new Error("Cannot create an XMLHttpRequest");
		 }
		} */