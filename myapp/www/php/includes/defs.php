<?php
/*
 * Functionality for database information to be served here.
 */
require "db_defs.php";

//session_start();

//define("MAX_WIDTH", 200);
//define("MAX_HEIGHT", 200);

/* Returns list of all employer names. *
function get_employers() {
    $connection = mysql_open();

    $select_eployer = "select id, name from employers";
    $select_eployer .=  " order by id";
    print "$select_eployer<br>\n";
    $employers = mysql_array_query($select_eployer,$connection);

    mysql_close($connection) or show_error();
    return $employers;
}


/* Returns employer with the given id. *
function get_employer($id) {
    $connection = mysql_open();

    $select_eployer_ifId = "select id, name, industry, description " .
              "from employers where id = $id";
    print "$select_eployer_ifId<br>\n";
    $result = mysql_query($select_eployer_ifId,$connection) or show_error();

    if (mysql_num_rows($result) != 1) {
        echo "Invalid query or result: $queryselect_eployer_ifId\n";
        die();
    }
    $employer = mysql_fetch_array($result);

    mysql_close($connection) or show_error();
    return $employer;
}

/* Adds a new job from form data and returns its id. *
function add_job($employer,$title,$location,$description,$salary) {
    //Sanitise input data
    $employer = $employer;
    $title = mysql_escape_string($title);
    $location = mysql_escape_string($location);
    $description = mysql_escape_string($description);
    $salary = $salary;

    $connection = mysql_open();
    
    // Execute query
    $insert = "insert into jobs (employer,title,description,location,salary) " .
               "values ($employer,'$title','$location','$description',$salary)";
    print "$insert<br>\n";
    $result = mysql_query($insert,$connection) or show_error();
    $id = mysql_insert_id();
    
    mysql_close($connection) or show_error();
    return $id;
}

/* 
 * Returns list of jobs whose job matchs $term, if present.
 * Otherwise returns list of all job titles.
 *
function find_jobs($query) {
    $connection = mysql_open();

    $select = "select id, title from jobs ";
    if ($query) {
	if (is_numeric($query)) {
	    $select .= "where salary >= $query ";
	} else {
	    $select .= "where location like '%$query%' " .
	               "or '$query' in (select industry from employers" .
		                       "where id = employers) ";
	}
    } 
    $select .=  "order by id";
    print "$select<br>\n";
    $jobs = mysql_array_query($select,$connection);

    mysql_close($connection) or show_error();
    return $jobs;
}

/* 
 * Returns list of job titles whose job has the employer with the given id.
 *
function get_jobs($id) {
    $connection = mysql_open();

    $select = "select id, title from jobs" .
              " where employer = $id " .
	      "order by id";
    print "$select<br>\n";
    $jobs = mysql_array_query($select,$connection);

    mysql_close($connection) or show_error();
    return $jobs;
}

/* Returns job with the given id. *
function get_job($id) {
    $connection = mysql_open();

    $select = "select id, employer, title, location, description, salary " .
              "from jobs where id = $id";
    print "$select<br>\n";
    $result = mysql_query($select,$connection) or show_error();

    if (mysql_num_rows($result) != 1) {
        echo "Invalid query or result: $query\n";
        die();
    }
    $job = mysql_fetch_array($result);

    mysql_close($connection) or show_error();
    return $job;
}

/* Updates an job with the given id using the given summary and details. *
function update_job($id,$title,$location,$description,$salary) {
    // Sanitise input data
    $title = mysql_escape_string($title);
    $location = mysql_escape_string($location);
    $description = mysql_escape_string($description);
    $salary = $salary;

    $connection = mysql_open();

    $update = "update jobs " .
              "set title = '$title', location = '$location', " .
	      " description = '$description', salary = $salary " .
	      "where id = $id";
    print "$update<br>\n";
    $result = mysql_query($update,$connection) or show_error();
}

/* Deletes the job with the given id. *
function delete_job($id) {
    $connection = mysql_open();

    $delete = "delete from jobs where id = $id";
    print "$delete<br>\n";
    $result = mysql_query($delete,$connection) or show_error();
}

function pagination($offset, $items_per_page) {
    $connection = mysql_open();
    
    $page = 1;
    //$offset = $page * $items_per_page;
    
    // Construct query, preparing for pagination
    $query = $query = "SELECT SQL_CALC_FOUND_ROWS * from jobs " . "ORDER BY id " . 
            "LIMIT $offset, $items_per_page";

    // Get list of items on this page
    $results = mysql_query($query, $connection) or show_error($query);
    
    // Get total number of items
    $result2 = mysql_query("SELECT FOUND_ROWS()", $connection) or show_error($query);
    $row = mysql_fetch_array($result2);
    $num_items = $row[0];
    
    // Copy result set to array
    $jobs = array();
    while ($row = mysql_fetch_array($results)) {
    $jobs[] = $row;
    }
    mysql_close($connection) or show_error();
    return array($jobs, $num_items);
}

function application_data_pagination($offset, $items_per_pages) {
    $connection = mysql_open();
    
    $page = 1;
    
    // Construct query, preparing for pagination
    $query = $query = "SELECT SQL_CALC_FOUND_ROWS * from  application ". "ORDER BY id " . 
            "LIMIT $offset, $items_per_pages";

    // Get list of items on this page
    $results = mysql_query($query, $connection) or show_error($query);
    
    // Get total number of items
    $result2 = mysql_query("SELECT FOUND_ROWS()", $connection) or show_error($query);
    $row = mysql_fetch_array($result2);
    $num_of_apl = $row[0];
    
    // Copy result set to array
    $apl = array();
    while ($row = mysql_fetch_array($results)) {
    $apl[] = $row;
    }
    mysql_close($connection) or show_error();
    return array($apl,$num_of_apl);
}
function get_application($id) {
    $connection = mysql_open();

    $apl_query = "select * " .
              "from application where id = $id";
    print "$apl_query<br>\n";
    $results = mysql_query($apl_query,$connection) or show_error();

    if (mysql_num_rows($results) != 1) {
        echo "Invalid query or result: $apl_query\n";
        die();
    }
    $apl = mysql_fetch_array($results);

    mysql_close($connection) or show_error();
    return $apl;
}

//Gets user data for current logged in user
function get_userD($user)
{
  $connection = mysql_open();
  
  $user_query = "select * " .
           "from Username WHERE username like '%$user%'";
  
  $logged_result = @ mysql_query($user_query, $connection)
      or show_error();
  $row_of_data = mysql_fetch_array($logged_result);
  mysql_close($connection)
      or show_error();
  return $row_of_data;
}

//Get user details based on applicant name from application_details id.
function get_user($id)
{
  $connection = mysql_open();
  
  $user_query = "select application.id, Username.* " .
           "from Username,application where Username.username = application.applicant 
            && application.id = $id";
  
  $result = @ mysql_query($user_query, $connection)
      or show_error();
  $row_of_data = mysql_fetch_array($result);
  mysql_close($connection)
      or show_error();
  return $row_of_data;
}

/* Image upload and display Start *
function getImage($id)
{
  $connection = mysql_open();
  
  $query = "select imagedata, imagename, imagetype, imagesize " .
           "from Username where id = $id";
  $result = @ mysql_query($query, $connection)
      or show_error();
  $image_data = mysql_fetch_array($result);
  mysql_close($connection)
      or show_error();
  return $image_data;
}
/* Image upload and display End *

//Date and time
//
// Returns an array of all Recent Jobs in the database 
function get_recent_jobs() {
    $connection = mysql_open();
 
    $time_query = "select id, title, unix_timestamp(epoch) as epoch " .
	     "from jobs";
    $time_result = @ mysql_query($time_query, $connection)
        or show_error();
    $num = mysql_num_rows($time_result);
    $recent_jobs = array();
    $curtime = time();
    while ($row = mysql_fetch_array($time_result)) {
        $epoch = $row["epoch"];
        $num_of_secs = $epoch - $curtime;
	if ($num_of_secs >= 0) {
	    $recent_jobs[] = array("name" => $row["name"], 
			      "time" => date("D j M Y @ G:i.s", $epoch),
			      "left" => nsecsToWords($nsecs));
	}
    }
    mysql_close($connection)
        or show_error();
    return $recent_jobs;
}

// Convert a duration in seconds to an equivalent string of words
function nsecsToWords($nsecs) {
    $ndays = (int)($nsecs / 86400); // number of days remaining
    $nsecs = $nsecs % 86400;
    $nhours = (int)($nsecs / 3600); // number of hours remaining
    $nsecs = $nsecs % 3600;
    $nmins = (int)($nsecs / 60);    // number of minutes remaining
    $nsecs = $nsecs % 60;           // number of seconds remaining
    $result = "";
    if ($ndays > 0) $result .= "$ndays days ";
    if ($nhours > 0) $result .= "$nhours hours ";
    if ($nmins > 0) $result .= "$nmins mins ";
    if ($ndays == 0 && $nsecs > 0) $result .= "$nsecs secs ";
    return $result;
}


/*Some functions I didn't used but kept in case.
 * 
function process_uploaded_image_file($image) {
  if (!is_uploaded_file($image['tmp_name']) || $image['size'] == 0) {
    return NULL;
  } 

  // Extract details
  $imagedata = addslashes(file_get_contents($image['tmp_name']));
  $imagename = addslashes(basename($image['name']));
  $imagesize = getimagesize($image['tmp_name']); // an array
  $imagewidthheight = addslashes($imagesize[3]); 
  $imagetype = $imagesize['mime'];

  // Check file is a JPEG
  if ($imagetype != "image/jpeg") {
    return NULL;
  }


  if ($imagesize[0] > MAX_WIDTH || $imagesize[1] > MAX_HEIGHT) {

      resize_image_file($image['tmp_name'], "images/tmp.jpg", 
                        MAX_WIDTH, MAX_HEIGHT);
      list($width,$height) = getimagesize("images/tmp.jpg");
      $imagedata = addslashes(file_get_contents("images/tmp.jpg"));
      $imagewidthheight = "width=\"$width\" height=\"$height\"";
  }
  return array($imagedata, $imagename, $imagetype, $imagewidthheight);
}


function addImg($image) 
{
  $image_details = process_uploaded_image_file($image);

  // add entry to the database
  $connection = @ mysql_connect(HOST, USER, PASSWORD)
      or die("Could not connect");
  mysql_select_db(DATABASE, $connection)
      or show_error();
  if (empty($image_details)) {
      echo "somethings wrong....";
  } else {
      list($imagedata, $imagename, $imagetype, $imagewidthheight) = $image_details;
      $insert = "insert into Username " .
                "(imagedata, imagename, imagetype, imagesize) " . 
                "values ('$imagedata', " . "'$imagename', '$imagetype', '$imagewidthheight')";
  }
  $result = @ mysql_query ($insert, $connection)
      or show_error();
  mysql_close($connection)
      or show_error();
}



//Gets user data for managers same as employer id.
//eg. Is the current user,that is logged in, a manager of Myer?
function get_userData_if_employerId(){
    $connection = mysql_open();
    
    $user_data_query = "SELECT * FROM Username";
    print "$user_data_query<br>\n";
    $user_results = mysql_query($user_data_query,$connection) or show_error();

    if (mysql_num_rows($user_results) != 1) {
        echo "Invalid query or result: $user_data_query\n";
        die();
    }
    $manager = mysql_fetch_array($user_results);

    mysql_close($connection) or show_error();
    return $manager;
}

Unsed tests, kept for back tracking.
function application_job_title() {
    $connection = mysql_open();
    
    
    // Construct query, preparing for pagination
    $query = $query = "SELECT SQL_CALC_FOUND_ROWS * from  application ". "ORDER BY id ";

    // Get list of items on this page
    $results = mysql_query($query, $connection) or show_error($query);
    
    // Copy result set to array
    $apl = array();
    while ($row = mysql_fetch_array($results)) {
    $apl[] = $row;
    }
    mysql_close($connection) or show_error();
    return array($apl);

//Query appl data to find applicant name if = id.
function apl_get_user_firstQ($id)
{
    $applicant_query = "select applicant " .
              "from application where id = $id";
  $apl_results = @ mysql_query($applicant_query, $connection)
      or show_error();
    return $apl_results;
}
}*/

