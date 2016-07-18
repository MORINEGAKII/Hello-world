<?php 
//Database Connection
include_once 'sodetso/scripts/dbConnection.php';
?>

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
  <div id="header">
    <div id="logo_w2" align="left"><img src="images/logo1.jpg" width="715" height="150" /> </div>
    <ul class="cssMenu cssMenum">
	<li class=" cssMenui"><a class="  cssMenui" href="index.php">Home</a></li>
    <li class=" cssMenui"><a class="  cssMenui" href="register.php">Register</a></li>
    <li class=" cssMenui"><a class="  cssMenui" href="enquiry.php">Enquiries</a></li>
     <li class=" cssMenui"><a class="  cssMenui" href="sodetso/login.php">Admin Login</a></li>
	
	</ul>	
		

  </div>
  <div id="content">
	
	  <div id="program"></div>
		<div id="right">
		  <center>
		  <p align="center">&nbsp;</p>
		  <table width="460" border="0" align="center" style="font-size:18px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-weight: bold;">
          <form name="f" action="" method="post"  OnSubmit="return check()">
            <tr>
              <td colspan="2"><h1 align="center">Voter Login</h1></td>
            </tr>
            <tr>
            <?php 
session_start();
if(isset($_POST['RegNo'])&&isset($_POST['Password'])){
 // username and password sent from form
$RegNo = $_POST['RegNo'];
$Password = $_POST['Password'];

$result=mysql_query("SELECT * FROM students WHERE RegNo ='$RegNo' AND Password='$Password' AND Status = 'Active' AND Voted='0'") or die (mysql_error());
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
// set session variable
	while($row=mysql_fetch_array($result)){  
		$_SESSION["ID"]= $row['ID']; 
		$_SESSION['RegNo']= $row['RegNo']; 
		$_SESSION['Password']= $row['Password']; 
		
		// track the log in time of the user
		
		$track = mysql_query("INSERT INTO log_details(userid, date, log) 
		VALUES ('$_SESSION[ID]',now(),'1')") or die(mysql_error());
	}
	header("location: voters.php");
}
else {
	echo '<td colspan="2" align="center"  style="font-size:12px; color: #FF0000;">Wrong Username/Password or maybe your account is not active or maybe you have logged in before. </td>';
}
}
?>
            </tr>
            <tr>
              <td >Registration No:</td>
              <td ><input name="RegNo" id="RegNo" type="text" class="ed" size="40"/>
              </td>
            </tr>
            <tr>
              <td>Password:</td>
              <td><input name="Password" id="Password" type="password" class="ed" size="40" />
              </td>
            </tr>
            <tr>
              <td height="48"><input type="submit" name="submit" id="submit" value="Login" />
              </td>
              <td height="48" align="center"><input type="reset" name="reset" id="reset" value="Reset"></td>
            </tr>
               <tr>
              <td colspan="2" align="center">
              </td>
            </tr>
             </form>
          </table>
		  
		 
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

