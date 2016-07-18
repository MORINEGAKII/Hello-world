<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$regno = $_POST['regno'];
$fn = $_POST['fn'];
$sn = $_POST['sn'];
$password = $_POST['password'];
$phone = $_POST['phone'];
if($regno == '' || $fn == '' || $sn == '' || $password == '' || $phone == ''){
echo 'please fill all values';
}else{
require_once('dbConnect.php');
$sql = "SELECT * FROM voters WHERE regno='$regno' OR phone='$phone'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
if(isset($check)){
echo 'Voter already registered';
}else{
$sql = "INSERT INTO voters (regno,phone,fn,sn,password) VALUES('$regno','$phone','$fn','$sn','$password')";
if(mysqli_query($con,$sql)){
echo 'successfully registered';
}else{
echo 'oops! Please try again!';
}
}
mysqli_close($con);
}
}else{
echo 'nothing was sent? network problem';
}