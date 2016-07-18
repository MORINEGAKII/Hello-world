<?php 
//Database Connection
include_once 'sodetso/scripts/dbConnection.php';
?>




<!DOCTYPE html>
<html>
<head>

<link href="style/style_prac2.css" rel="stylesheet" type="text/css" />
<title>Register - Online Based Voting System </title>
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

</style>
<script language="javascript">
 function check()
{
 if(f.surname.value=="")
    {
     alert("Enter your Surname");
       return false;
    }
  if(f.othernames.value=="")
    {
       alert("Enter your Othernames");
       return false;
   }
  if(f.RegNo.value=="")
    {
       alert("Enter your RegNo");
       return false;
   }
	if(f.email.value=="")
    {
       alert("Enter your Email");
       return false;
   }
   if(f.course.value=="")
    {
       alert("Enter your Course");
       return false;
   }
   if(f.year.value=="")
    {
       alert("Enter your Year of study");
       return false;
   }
   if(f.semester.value=="")
    {
       alert("Enter your Semester of study");
       return false;
   }
    if(f.password.value=="")
    {
       alert("Enter your password");
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
		  <center><form name="f" action="" method="post" OnSubmit="return check()">
		  <p align="center">&nbsp;</p>
		  <table width="506" height="398" border="0" align="center" cellpadding="2" cellspacing="2" style="font-size:18px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-weight: bold;">
            <tr>
              <td height="57" colspan="2" align="left"><h1 align="center">Register Here</h1></td>
            </tr>
            <tr>
            <?php 

if(isset($_POST['RegNo'])){
	
	$surname=$_POST['surname'];
	$othernames=$_POST['othernames'];
	$RegNo=$_POST['RegNo'];
	$email=$_POST['email'];
	$course=$_POST['course'];
	$year=$_POST['year'];
	$semester=$_POST['semester'];
	$password=$_POST['password'];
//see if the product is an identical match to another product in the system

$sql = mysql_query("SELECT ID FROM students WHERE RegNo='$RegNo' LIMIT 1");
$Match=mysql_num_rows($sql);//Count the output amount

if($Match>0){

	echo 'Sorry you tried to place a duplicate "Student" into the system, <a href="register.php">Click Here</a>';
	exit();
}

//Add this product into the database now

$sql=mysql_query("INSERT INTO students (ID, Surname, Othernames, RegNo, Email, Password, Course, Year, Semester, Status, Voted, date_added) VALUES('', '$surname','$othernames', '$RegNo', '$email','$password', '$course', '$year', '$semester', 'Inactive', '0', now())") or die(mysql_error());
$pid=mysql_insert_id();
 
 echo '<td height="35" colspan="2" style="font-size:12px; color:#00CC00;">Thank you for registering as a voter. Your account will be activated after verification of your details... </td>';

}
?>

              
            </tr>
            <tr>
              <td width="182" height="35">Surname:</td>
              <td width="310"><input name="surname" type="text" class="ed" size="40" />
              </td>
            </tr>
            <tr>
              <td height="33">Othernames:</td>
              <td><label for="othernames"></label>
              <input name="othernames" type="text" class="ed" id="othernames" size="40"></td>
            </tr>
            <tr>
              <td>Registration No:</td>
              <td><input name="RegNo" type="text" class="ed" size="40" />
              </td>
            </tr>
            <tr>
              <td height="34">Email:</td>
              <td height="34"><label for="email"></label>
              <input name="email" class="ed" id="email" size="40" type="email"></td>
            </tr>
            <tr>
              <td height="34">Course:</td>
              <td height="34"><label for="course"></label>
                <select name="course" id="course" class="ed" onChange="showCompany(this.value);">
                <option value="">--Select--</option>

          <?php

        $sql1="select * from courses";

       $sql_row1=mysql_query($sql1);

       while($sql_res1=mysql_fetch_assoc($sql_row1))

       {

       ?>

       <option value="<?php echo $sql_res1["CourseName"]; ?>"  { echo "Selected"; } ?><?php echo $sql_res1["CourseName"]; ?></option>

        <?php

        }

        ?>
              </select></td>
            </tr>
            <tr>
              <td height="34">Year:</td>
              <td height="34"><label for="year"></label>
                <select name="year" id="year" class="ed">
                <option value="">--Select--</option>
                <option>First</option>
                <option>Second</option>
                <option>Third</option>
                <option>Fourth</option>
                <option>Fifth</option>
              </select></td>
            </tr>
            <tr>
              <td height="34">Semestaer/Stage:</td>
              <td height="34"><label for="semester"></label>
                <select name="semester" id="semester" class="ed">
                <option value="">--Select--</option>
                <option>First</option>
                <option>Second</option>
                <option>Third</option>
              </select></td>
            </tr>
            <tr>
              <td height="34">Password:</td>
              <td height="34"><label for="password"></label>
              <input name="password" type="password" class="ed" id="password" size="40"></td>
            </tr>
            <tr>
              <td height="48"><input type="submit" name="submit" value="Register"id="register" />
              </td>
              <td height="48"><input type="reset" name="reset" id="reset" value="Reset"></td>
              
            </tr>
               <tr>
              <td colspan="2" align="center">
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

