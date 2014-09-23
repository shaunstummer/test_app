<?php
//require "Smarty.class.php";
require "includes/defs.php";

$username = $_GET['name1'];
//$password = $_POST['password'];

//Get bool flag
/*
if (isset($_SESSION['flag'])) {
    $flag = $_SESSION['flag'];
} else {
    $flag = 3;
}*/

//$password_error = '';
//$fill = '';
$user_error = '';
$dbusername = '';
$dbcatergory = '';

if(!$username == '') //&& !$password == '')
{
    
    $connection = mysql_open();
    
    $query = mysql_query("SELECT * FROM Username WHERE username='$username'");
    $numrows = mysql_num_rows($query);
    
    if($numrows != 0)
    {
       while ($row = mysql_fetch_array($query))
       {
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
            $dbcatergory = $row['catergory'];
        }
        //$password = md5($password);
        //echo $password = md5($password);
        /*if($password != $dbpassword)
        {
            $password_error = "<p class=register>Incorrect password</p>";
            //set bool flag to positive int so that errors display! Manipulate page location.
            $_SESSION['flag'] = 3;
            
        }
        else*/ if($username == $dbusername)// && $password == $dbpassword)
        {
			echo $username + " worked and is a valid user";
            //$_SESSION['username'] = $dbusername;
			//$_SESSION['catergory'] = $dbcatergory;
            //$_SESSION['flag'] = '';
        }
    }
    else
    {
		echo "User is not in database";
       //$user_error = "<p class=register>That user doesn't exist!</p>";
       //$_SESSION['flag'] = 3;
    }
}
else{
	echo "It didn't work sorry";
    //$fill="<p class=register>Please Fill all fields first. Please register if you hav'nt yet!</p>";
    //$_SESSION['flag'] = 3;
}

 /*$smarty = new Smarty;
 $smarty->assign("user",$dbusername);
 $smarty->assign("catergory",$dbcatergory);
 $smarty->assign("fill",$fill);
 $smarty->assign("flag",$flag);
 $smarty->assign("user_error",$user_error);
 $smarty->assign("password_error",$password_error);
 
 if($flag)
 {
 $smarty->display("index.tpl");
 }
 else
 {
 $smarty->display("user.tpl");  
 }*/
 
?>
