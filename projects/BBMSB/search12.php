<html>
<head>
<title></title>
<link rel="stylesheet" href="style.css">
</head>
<body bgcolor="pink">
<h1> Here is your profile </h1>

<?php
 include ('db_connect.php');
$searchtype=$_POST['searchtype'];
$searchterm=$_POST['searchterm'];
$searchterm=trim($searchterm);
if(empty($searchtype) || empty($searchterm))
{
	echo'Please enter search details.';
	exit;
}

 include ('db_connect.php');
$query="select * from createacc where ".$searchtype." like '%".$searchterm."%'";
$result=mysqli_query($conn, $query);
$num_results=mysqli_num_rows($result);
if($num_results)
//echo '<p> Number of profile found: '.$num_results.'</p>';

for($i=0;$i<$num_results;$i++)
{
$row=mysqli_fetch_array($result);


echo '<strong><br>&nbsp;&nbsp;&nbsp;&nbsp;Your First Name is: ';
echo $row['firstname'];
echo '<strong><br>&nbsp;&nbsp;&nbsp;&nbsp;Your Last Name is: ';
echo $row['lastname'];
echo '<strong><br>&nbsp;&nbsp;&nbsp;&nbsp;Your Email is: ';
echo $row['email'];
echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;Your Password is: ';
echo $row['password'];
echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;Your User Type is: ';
echo $row['usertype'];


echo '<p>';}
?>

</body>
</html>
