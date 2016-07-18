<?php 
//Database Connection
include_once 'sodetso/scripts/dbConnection.php';
?>
<?php include_once 'session_check.php';?>

<!DOCTYPE html>
<html>
<head>

<link href="style/style_prac2.css" rel="stylesheet" type="text/css" />
<title>Online Based Voting System</title>
<style type="text/css">
<!--
.style3 {font-family: Georgia, "Times New Roman", Times, serif}
.style20 {font-family: Georgia, "Times New Roman", Times, serif; font-size: x-small; }
.style21 {font-size: x-small}
.style22 {font-family: Geneva, Arial, Helvetica, sans-serif}
.style30 {font-family: "Courier New", Courier, monospace}
.style4 {font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style1 {font-size: 50px}
.style2 {font-size: 16px}
.style5 {font-size: 16px; font-weight: bold; }
#Layer1 {position:absolute;
	width:272px;
	height:80px;
	z-index:1;
	left: 289px;
	top: 219px;
}
.style31 {	color: #FF0000;
	font-weight: bold;
}
#Layer2 {	position:absolute;
	left:242px;
	top:415px;
	width:454px;
	height:94px;
	z-index:1;
}
-->
</style>
<script language="javascript">
 function check()
{
 if(f.RegNo.value=="")
    {
     alert("Enter the Registration No");
       return false;
    }
  if(f.Password.value=="")
    {
       alert("Enter your Password");
       return false;
   }
 
return true;
}
</script>
</head>
<body>
<div id="container">
  
  <div id="content">
	
	  <div id="program"></div>
		<div id="right">
		  <center>
		  <p align="center">&nbsp;</p>
          <?php 

include_once 'sodetso/scripts/dbConnection.php';
$id = @$_SESSION['ID'];
$num = @$_SESSION['num'];
$sql= @mysql_query("UPDATE students SET Voted = 1 WHERE ID = '$id' ")or die(mysql_error());

// loops through the number of post
for ($i=1;$i<=$num;$i++){
	$sqlb = @mysql_query ("INSERT INTO voters (id,post,userid,cont_id) VALUES ('', '$i', '$id', '$_POST[$i]')") or die (mysql_error());
}
echo "You have successfully voted for your candidates. Please click <a href='logout.php'>here</a> to log out";
?>
		  </center>
		  <p>&nbsp;</p>
	</div>
		<div id="footerline">
		 
	  </div>
  </div>
	
	<div id="footer">Copyright © 2014 </div>	
</div>
</body>
</html>

