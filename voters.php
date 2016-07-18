<?php include_once 'session_check.php';?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Voters Panel - Online Based Electronic Voting System </title>
<link href="yusufishola.css" rel="stylesheet" type="text/css"/>

<style type="text/css">
<!--
body {
	background-color: #a6bf79;
}
-->
</style>
</head>

<body><table width="1000" border="0" align="center" cellspacing="0">
  <tr>
    <td height="77" align="center" bgcolor="#FFFFFF"><img name="banner" src="sodetso/images/13.jpg" width="400" height="180" border="0" id="banner" alt="" /><br/><br/><br/></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="178" valign="top"><form id="form1" name="form1" method="post" action="voters_p.php">
      <table align="center">
      
      <?php 
	  include_once 'sodetso/scripts/dbConnection.php';

// holds the distinct number of positions
$gotten = mysql_query("SELECT DISTINCT post FROM contestants") or die (mysql_error());
$_SESSION['num'] = mysql_num_rows($gotten);
while ($rowss = mysql_fetch_array($gotten)){
	$post = $rowss['post'];
	$posttest = 0;
	$get1 = mysql_query("SELECT ID, Name FROM contestants WHERE Post = '$post'") or die (mysql_error());
	while ($row = mysql_fetch_array($get1)){
		$get2 = mysql_query("SELECT Postname FROM posts WHERE ID = '$post'") or die(mysql_error());
		while ($row2 = mysql_fetch_array($get2)){
			if ($posttest != $post){
				echo "<tr><td align =center><h1><b>".$postname = strtoupper($row2['Postname'])."</b></h1></td></tr>";
			}
			$cont_id = $row['ID'];
			echo "<tr><td>".$name = $row['Name']."</td>";
			echo "<td><input type='radio' name='$post' id='radio' value='$cont_id' /></td>";
			echo '<td><img src="photos/'.$cont_id.'.jpg"." width=100 border=1></td></tr>';
			$posttest = $post;
		}
	}
}
?>
<?php  /*include_once 'sodetso/scripts/dbConnection.php';
session_start();
//holds the distinct number of positions
$gotten = mysql_query("SELECT DISTINCT Post FROM contestants") or die (mysql_error());
$_SESSION['num'] = mysql_num_rows($gotten);
while ($rowss = mysql_fetch_array($gotten)){
	$post = $rowss['Post'];
	$posttest = 0;
	$get1 = mysql_query("SELECT ID, Name FROM contestants WHERE Post = '$post'") or die (mysql_error());
	while ($row = mysql_fetch_array($get1)){
		$get2 = mysql_query("SELECT Postname FROM posts WHERE ID = '$post'") or die(mysql_error());
		while ($row2 = mysql_fetch_array($get2)){
			if ($posttest != $post){
				echo "<tr><td align =center><h1><b>".$postname = strtoupper($row2['Postname'])."</b></h1></td></tr>";
			}
			$cont_id = $row['ID'];
			
			echo "<tr><td  style='font-size:18px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-weight: bold;'>".$name = $row['Name']."</td>";
			echo "<td><input type='radio' name='$post' id='radio' value='$cont_id' /></td>";
			echo '<td><img src="photos/'.$cont_id.'.jpg"." width=100 border=1></td></tr>';
			$posttest = $post;
		}
	}
}*/
?>
<tr><td align="center"><input name="Submit" type="submit" value="Submit Vote" id="Submit" /></td></tr>
</table>
    </form></td>
  </tr>
  </table>
</body>
</html>
