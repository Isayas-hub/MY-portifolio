<?php include('db_connect.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body><br>
<table align="center" cellpadding="4" cellspacing="10" background="images1/bgt_top1.jpg">
<tr> 
<td>
<?php

	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$usertype=$_POST['usertype'];
if(is_numeric($firstname)&& is_empty($firstname))
{
	echo 'Please Enter Only Letters for First Name.'.'<a href="signup.html">Try again!</a>';
}
else if(is_numeric($lastname))
 {
    echo 'Please Enter Only Letters for Last Name.'.'<a href="signup.html">Try again!</a>';
 }
 else if(is_numeric($usertype))
 {
    echo 'Please Enter Only Letters for User Type.'.'<a href="signup.html">Try again!</a>';
 }
else if($password!=$cpassword)
{
	echo 'Please Enter the same password'.'<a href="signup.html">Try again!</a>';
}
else if(!$firstname  || !$lastname || !$usertype || !$email || !$password)
{
echo '<font color="#FF0000"><h3>Fields can not be Empty.</h3></font>'.'<a href="signupl.html">Try again!</a>';
}
else{
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$cpassword=md5($_POST['cpassword']);
	$usertype=$_POST['usertype'];
	$sql = "INSERT INTO createacc (firstname,lastname,email, password, cpassword, usertype)
	VALUES ('$firstname','$lastname','$email', '$password','$cpassword','$usertype')";
	if ($conn->query($sql)==TRUE) 
{
echo '<font color="#0000FF"><h3>Your Information is  successfuly submitted!<a href="homepage.html" title="Home">Go to Home</a>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<a href="drlogin.html" title="Home">LOGIN</a></h3></font>';
//include("homepage.html")
echo'<br>';
echo'<br>';
}
else
{
echo 'Feed Back  information is not successfuly inserted.';
echo'<br>';
echo'<br>';
}
}
?>
</td></tr></table>
</body>
</html>
