<html>
<head>
<title>deletion form</title>
</head>
<body bgcolor="#ddfaacc"><br><br><br>
<table border="0"width="300" border="0" bordercolor="#3399CC" bordercolor="#FFCCFF" bgcolor="#33CC99" align="center">
  <caption align="center"> <h2><i><b>Deleted Results!!</b></i></h2></caption>
<tr>
    <td>

<?php
$searchtype=$_POST['searchtype'];
#$IDNO=$_POST['IDNO'];
$searchterm=$_POST['searchterm'];
$searchterm=trim($searchterm);
if(!$searchtype || !$searchterm)
{
	echo'<h1><b>Please enter the search details. </b></h1>';
echo'<br>';
echo'<br>';

	exit;
}

$db= mysqli_connect('localhost','root','');
if(!$db)
{
	echo'Database could not connected:';
	exit;
}
mysqli_select_db($db,'bloodbank_db');
include ('db_connect.php');

$query="delete from regrequest where ".$searchtype." = '".$searchterm."'";
$result=mysqli_query($db,$query);
if($result)
{
echo mysqli_affected_rows($db).' <h3><b>record(s) Deleted</b></h3>';
echo'<br>';
echo'<br>';

}
else
{
echo ' <h3><b>No record deleted</b></h3>';
echo'<br>';
echo'<br>';

}
echo "</table>";
?>
</td></tr></table>
</body>
</html>