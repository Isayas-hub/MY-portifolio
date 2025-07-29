<html>
<head>
<title></title>
<link rel="stylesheet" href="style.css">
</head>
<body bgcolor="pink">
<h1> Here is your Appointment Date </h1>

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
$query="select * from appointment where ".$searchtype." like '%".$searchterm."%'";
$result=mysqli_query($conn, $query);
$num_results=mysqli_num_rows($result);
if($num_results)
//echo '<p> Number of profile found: '.$num_results.'</p>';

for($i=0;$i<$num_results;$i++)
{
$row=mysqli_fetch_array($result);


echo '<strong><br>&nbsp;&nbsp;&nbsp;&nbsp;Your Email is: ';
echo $row['email'];
echo '<strong><br>&nbsp;&nbsp;&nbsp;&nbsp;Date of this message  is written: ';
echo $row['message_date'];
echo '<strong><br>&nbsp;&nbsp;&nbsp;&nbsp;Date of Your Appointment: ';
echo $row['assigned_date'];

echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;Detail Information: ';
echo $row['feedback'];


echo '<p>';}
?>

</body>
</html>
