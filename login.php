<?php 
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values 
 $username = $_POST['regno'];
 $password = $_POST['password'];
 
 //Creating sql query
 $sql = "SELECT * FROM voters WHERE regno='$username' AND password='$password'";
 
 //importing dbConnect.php script 
 require_once('dbConnect.php');
 
 //executing query
 $result = mysqli_query($con,$sql);
 
 //fetching result
 $check = mysqli_fetch_array($result);
 
 //if we got some result 
 if(isset($check)){
 //displaying success 
 echo "success";
 }else{
 //displaying failure
 echo "failure";
 }
 mysqli_close($con);
 }