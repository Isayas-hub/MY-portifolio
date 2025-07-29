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
$id=$_POST['id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$usertype=$_POST['usertype'];
$email=$_POST['email'];
$feedback =$_POST['feedback'];
if(is_numeric($firstname)&& is_empty($firstname))
{
	echo 'Please Enter Only Letters for First Name.'.'<a href="commenthtml.html">Try again!</a>';
}
else if(is_numeric($lastname))
 {
    echo 'Please Enter Only Letters for Last Name.'.'<a href="commenthtml.html">Try again!</a>';
 }
 else if(is_numeric($usertype))
 {
    echo 'Please Enter Only Letters for User Type.'.'<a href="commenthtml.html">Try again!</a>';
 }
else if(!$firstname  || !$lastname || !$usertype || !$email || !$feedback)
{
echo '<font color="#FF0000"><h3>Fields can not be Empty.</h3></font>'.'<a href="commenthtml.html">Try again!</a>';
}
else{
	$id=$_POST['id'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$usertype=$_POST['usertype'];
	$email=$_POST['email'];
	$feedback=($_POST['feedback']);	
	$sql = "INSERT INTO comment (id,firstname,lastname,email, usertype, feedback)
	VALUES ('$id','$firstname','$lastname','$email','$usertype','$feedback')";
	if ($conn->query($sql)==TRUE) 
{
echo '<font color="#0000FF"><h3>Feedback information is successfuly submitted!<a href="homepage.html" title="Home">Go to Home</a></h3></font>';
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
