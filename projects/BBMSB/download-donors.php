<?php 
include('db_connect.php');

?>
<table border="1">
									<thead>
										<tr>
										<th>#</th>
											<th>ID</th>
											<th>BLOOD GROUP</th>
											<th>NAME</th>
											<th>ADDRESS</th>
											<th>CONTACT</th>
											<th>EMAIL</th>
											<th>DATE CREATED</th>
											
										</tr>
									</thead>

<?php 
$filename="Donor list";
$sql = "SELECT * from  donors ";
$query = $conn -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)

{				

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$id= $result->id.'</td> 
<td>'.	$blood_group= $result->blood_group.'</td> 
<td>'.$name= $result->name.'</td> 
<td>'.$address= $result->address.'</td> 
<td>'.$contact= $result->contact.'</td> 
 <td>'.$email=$result->email.'</td>	
  <td>'.$date_created=$result->date_created.'</td>	 
   	 					
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<?php  ?>