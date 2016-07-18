<!DOCTYPE html>
<html>
<head>

<link href="style/style_prac2.css" rel="stylesheet" type="text/css" />
<title>Enquiry - Online Based Voting System </title>
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
 if(f.Name.value=="")
    {
     alert("Enter your Name");
       return false;
    }
  if(f.Email.value=="")
    {
       alert("Enter your Email");
       return false;
   }
  if(f.Message.value=="")
    {
       alert("Enter the Message");
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
		  <center><form action="" method="post" OnSubmit="return check()" name="f">
		  <p align="center">&nbsp;</p>
		  <table align="center" cellpadding="2" cellspacing="2" style="font-size:18px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-weight: bold;">
            <tr>
            
              <td colspan="2"><h1 align="center">Send an Enquiry below</h1></td>
            </tr>
            <tr>
            <?php 
			   include_once 'sodetso/scripts/dbConnection.php';
//Parse the form data and add inventory item to the system
if(isset($_POST['Name'])){
	
	$Name=$_POST['Name'];
	$Email=$_POST['Email'];
	$Message=$_POST['Message'];

$sql=mysql_query("INSERT INTO messages (Name, Email, Message, date_added) VALUES('$Name', '$Email', '$Message', now())") or die(mysql_error());
echo '<td colspan="2" align="center"  style="font-size:12px; color: #00CC00">The message was sent successfuly.... </td>';

}
?>
            </tr>
            <tr>
              <td width="100">Name:</td>
              <td width="286"><input name="Name" type="text"  class="ed" size="40"/>
              </td>
            </tr>
            <tr>
              <td>Email:</td>
              <td><input name="Email" type="email" class="ed" size="40"/></td>
            </tr>
            <tr>
              <td>Message: </td>
              <td><label for="message"></label>
              <textarea name="Message" cols="32" class="ed"></textarea></td>
            </tr>
            <tr>
              <td height="48" colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" />
              </td>
            </tr>
              
          </table>
		  
		  </form>
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

