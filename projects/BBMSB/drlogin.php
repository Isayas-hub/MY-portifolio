<html>
<head>
<style type="text/css">
h3 {background-color:#FF0000; color:#FFFF33; text-decoration:blink;}
</style>
</head>
<body style="background-image:url(images/bgtable.jpg)" text="Black">
	<?php
require('db_connect.php');

   	$email=$_POST['email'];
   	$password=$_POST['password'];
   	$usertype=$_POST['usertype'];
 	//$conn=mysqli_connect("localhost","root","");
	//mysqli_select_db("bloodbank_db",$conn);
	$q="SELECT * FROM createacc WHERE email='".$email."'"; 
	$row=$q;
	if($email==$email && $password!=$password)
       {
			
        echo'<script type="text/javascript"> alert("Please Reenter correct password again!"); location.href="drlogin.html"; </script>'; 
		}
      else if($email!=$email && $password==$password)
       {
	
         echo'<script type="text/javascript"> alert("Please Reenter correct userName again!"); location.href="drlogin.html"; </script>'; 
	
		}
		else if($email!=$email && $password!=$password)
       {
	
         echo'<script type="text/javascript"> alert("Please Reenter correct userName and pass word again!"); location.href="drlogin.html"; </script>'; 
	
		}
		elseif($email==$email && $password==$password)
       {
			if($usertype=="Blood Donor" && $usertype==$usertype)
       {
			require_once'home-Copy1.html';
             
		}
		else if($usertype=="Blood Requester" && $usertype==$usertype)
       {
			require_once'home-Copy2.html';
             
		}
		
	
		else
			{
			echo'Your User name or Password is not correct';
			echo'<script type="text/javascript"> alert("Please Enter the Correct User name or Password"); location.href="drlogin.html"; </script>';
			}

		}
?>
	
</body>
</html>