		/*Log in Validation - still needs to get rid of any html/sql injections*/
		function init()
		{
		var myForm = document.getElementById("myForm");
		//Set spend and message - also tell if manual or automated test
		var message = "";
		var correctSpend = 0;
		var incorrectSpend = 0;
		var invalid = "";
		var spend = "";
		//var manual = false;
		//var automated = false;
		//is_Manual_Or_Automated(manual, automated);
		myForm.onsubmit = spendIt;
		}
		
		//bind init() function to onload event
		onload = init;
		
		
		/*function is_Manual_Or_Automated()
		{
			if(document.getElementById("txtName").value != NULL)
			{
				var spend = document.getElementById("txtName").value;
			}
		}*/
		
		function spendIt()
		{
			if(correctSpend == 50) //Test 1
			{
				var spend = correctSpend;
			}
			else if(incorrectSpend == 500) // Test 2
			{
				var spend = incorrectSpend;
			}
			else if(invalid == "B") // Test 3
			{
				var spend = invalid;
			}
			else // Normal user input - Manual Test
			{
				var spend = document.getElementById("txtName").value;
			}
			
		var isRequiredspendSet = false;
		
		//create variable that holds message to display
		//var message = "";
		var message1 = 100;
		writeMessage1(message1);
		isRequiredspendSet = validateRequired(spend);
	
		//if all values are valid, prepare thank you message
		//and allow form submission
		if (isRequiredspendSet)
		{
			if(spend < message1 && spend > 0)
			{
				writeMessage1(message1 - spend);
				message = "Thank you, your points have been successfully used!";
			}
			else if(spend > message1)
			{
				message = "You don't have enough points please try again when you do!";
				writeMessage(message);
				return false;
			}
			else
			{
				message = "Invalid format! Please use numerals.";
				writeMessage(message);
				return false;
			}
		}
		
		//if the spend field is empty, write message to user and stop submission:
		else if (! isRequiredspendSet)
		{
		message = "Please, enter a spend";
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
		
		function writeMessage1(text)
		{
		var paragraph = document.getElementById("result1");
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
		
		
		//AUTOMATED TESTING AREA
		function correctSpend()
			{
				correctSpend = 50;
				spendIt();
				correctSpend = 0; // Reset after test
				//message = "Correct - You spend " + correctSpend + " Points you have " + (100 - correctSpend) + " remaining";
				//writeMessage(message);
				//writeMessage1(100 - correctSpend + " Congratz");
			}
			
		function incorrectSpend()
			{
				incorrectSpend = 500;
				spendIt();
				incorrectSpend = 0; // Reset after test
				//message = "Incorrect Spend Amount - You don't have enough points";
				//writeMessage(message);
				//writeMessage1(100 - incorrectSpend + " Whoops! You over spent :(" )
			}

		function invalid()
			{
				invalid = "B";
				spendIt();
				invalid = ""; // Reset after test
				//message = "Invalid Value " + invalid + " .Please put in numbers only";
				//writeMessage(message);
				//writeMessage1(invalid + " Isn't a number sorry :(");
			}