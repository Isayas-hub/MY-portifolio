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
$middlename=$_POST['middlename'];
$lastname=$_POST['lastname'];
$woreda=$_POST['woreda'];
$kebele=$_POST['kebele'];
$bloodtype=$_POST['bloodtype'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$email=$_POST['email'];
if(is_numeric($firstname)&& is_empty($firstname))
{
	echo 'Please Enter Only Letters for First Name.'.'<a href="donateform.html">Try again!</a>';
}
else if(is_numeric($lastname))
 {
    echo 'Please Enter Only Letters for Last Name.'.'<a href="donateform.html">Try again!</a>';
 }
 else if(is_numeric($firstname))
 {
    echo 'Please Enter Only Letters for User Type.'.'<a href="donateform.html">Try again!</a>';
 }
else if(!$firstname  || !$middlename || !$lastname || !$woreda || !$kebele || !$bloodtype || !$gender ||!$age || !$phone || !$email)
{
echo '<font color="#FF0000"><h3>Fields can not be Empty.</h3></font>'.'<a href="donateform.html">Try again!</a>';
}
else{

$sql = "INSERT INTO regdonors (firstname,middlename, lastname,woreda, kebele, bloodtype, gender, age, phone,email)
	VALUES ('$firstname','$middlename','$lastname', '$woreda', '$kebele', '$bloodtype', '$gender', '$age', '$phone','$email')";
	if ($conn->query($sql)==TRUE) 
{
echo '<font color="#0000FF"><h3>Your information is successfuly submitted! Thank you!<a href="homepage.html">Hompe Page!</a></h3></font>';

//include("homepage.html");
echo'<br>';
echo'<br>';
}
else
{
echo 'Your  information is not successfuly inserted.';
echo'<br>';
echo'<br>';
}
}
?>
</td></tr></table>
</body>
</html>
