<?php
$con=mysqli_connect("localhost","root","","voting");
if(!$con)
	echo "cant connect to network";
$em=$_POST["email"];
$pw=$_POST["password"];

if($em=="e_admin@gmail.com" && $pw=="123"){
	echo '<script>alert("WELCOME ADMIN");';
	echo 'setTimeout(function() { window.location.href = "./ballet.html"; }, 1000);</script>';
	return;
}
$sql = "select * from users where email= '$em' and pass= '$pw'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
	echo '<script>alert("login successfully!");';
	echo 'setTimeout(function() { window.location.href = "vote.html"; }, 1000);</script>';
}else{
	echo '<script>alert("login failed!");';
	echo 'setTimeout(function() { window.location.href = "login.html"; }, 1000);</script>';
}

?>
