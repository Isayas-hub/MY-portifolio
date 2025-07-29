<html>
<head>
<title>patient Search</title>
</head>
<body bgcolor=#efdabe>
<table border="0"width="300" border="0" bgcolor="#598a0d" align="center">
  <caption align="center"> <h2><i><b>View Appointment Information!!</b></i></h2></caption>
<tr>
    <td>

<?php
include ('db_connect.php');
$searchtype=$_POST['searchtype'];
$searchterm=$_POST['searchterm'];
$searchterm=trim($searchterm);
if(empty($searchtype) || empty($searchterm))
{
	echo'Please enter search details.';
echo'<br>';
echo'<br>';

	exit;
}
 include ('db_connect.php');
$query="select * from appointment where ".$searchtype."= '".$searchterm."'";
$result=mysql_query($query);
$num_results=mysql_num_rows($result);
if($num_results)
echo '';
else
 {
    echo ' Search Result Not Found in Database';
 }
for($i=0;$i<$num_results;$i++)
{
$row=mysql_fetch_array($result);
echo '<p><strong>'.($i+1).'. First Name: ';
echo $row['firstname'];
echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;Last Name: ';
echo $row['lastname'];
echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;Email: ';
echo $row['email'];


echo'<br>';
echo'<br>';


}
?>
<td></tr></table>
</body>
</html>
