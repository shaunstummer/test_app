<?php
/*
 * Useful MySQL support functions.
 */
// Include your database access constants here
// require /* to be inserted /*;
require "mysql.php";

/* Show MySQL error. */
function show_error() {
  die("Error ". mysql_errno() . " : " . mysql_error());
}

/* Open connection and select database. */
function mysql_open() {
  $connection = @ mysql_connect(HOST, USER, PASSWORD)
      or die("Could not connect");
  mysql_select_db(DATABASE, $connection)
      or show_error();
  return $connection;
}

/* Execute a query and return an *array* of result. */
function mysql_array_query($query,$connection) {
    $result = mysql_query($query,$connection) or show_error();

    $rows = array();
    while ($row = mysql_fetch_array($result)) {
        $rows[] = $row;
    }

    return $rows;
}
?>
