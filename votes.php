<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$regno = $_POST['regno'];
$chairman = $_POST['chairman'];
$vicechairman = $_POST['vicechairman'];
$ent = $_POST['ent'];
if($regno == ''){
echo 'No vote selected, kuna shida mahali';
}else{
require_once('dbConnect.php');
$sql = "SELECT * FROM vote WHERE regno='$regno'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
echo 'Voter already voted';
}else{
$sql = "INSERT INTO vote (regno,chairman,vicechairman,ent) VALUES('$regno','$chairman','$vicechairman','$ent')";
if(mysqli_query($con,$sql)){
echo 'successfully voted';
}else{
echo 'oops! Please try again!';
}
}
mysqli_close($con);
}
}else{
echo 'nothing was sent? network problem';
}