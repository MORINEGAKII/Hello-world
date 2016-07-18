<?php 
//Database Connection
include_once 'sodetso/scripts/dbConnection.php';
?>
<?php
	
	session_start();
	// track the log in time of the user
	$date = date ('d/m/y h:i:s');
	$track = mysql_query("INSERT INTO log_details (`userid` ,`date`,`log`) 
	VALUES ('$_SESSION[id]','$date','0')") or die(mysql_error());
	//unset session variable
	unset($_SESSION['id']);
	//end session
	session_destroy();
	header ("location:index.php");
?>