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
$email=$_POST['email'];
$message_date=$_POST['message_date'];
$assigned_date=$_POST['assigned_date'];
$feedback =$_POST['feedback'];
if(is_numeric($email)&& is_empty($email))
{
	echo 'Please Enter the correct email.'.'<a href="apointment.html">Try again!</a>';
}

else if( !$email || !$feedback)
{
echo '<font color="#FF0000"><h3>Fields can not be Empty.</h3></font>'.'<a href="apointment.html">Try again!</a>';
}
else{
	
	$email=$_POST['email'];
	$message_date=$_POST['message_date'];
	$assigned_date=$_POST['assigned_date'];
	$feedback=($_POST['feedback']);	
	$sql = "INSERT INTO appointment1 (email,message_date, assigned_date, feedback) VALUES ('$email', '$message_date', '$assigned_date','$feedback')";
	if ($conn->query($sql)==TRUE) 
{
echo '<font color="#0000FF"><h3>Your Appointment is successfuly submitted!<a href="homepage.html" title="Home">Go to Home</a></h3></font>';
//include("homepage.html");
echo'<br>';
echo'<br>';
}
else
{
//echo 'Your Appointment is not successfuly inserted.';
echo'<br>';
echo'<br>';
}
}
?>
</td></tr></table>
</body>
</html>
