<?php
include ('db_connect.php');
         $email = $_POST['email'];
        $password = $_POST['password'];
        $npassword = $_POST['npassword'];
        $cpassword = $_POST['cpassword'];
        $result = mysqli_query("SELECT password FROM createacc WHERE email='$email'");
        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        else if($password!= mysqli_result($result, 0))
        {
        echo "You entered an incorrect password";
        }
        if($npassword=$cnpassword)
        $conn=mysqli_query("UPDATE createacc SET password='$npassword' where email='$email'");
        if($conn)
        {
        echo "Congratulations You have successfully changed your password";
        }
       else
        {
       echo "Passwords do not match";
       }
      ?>
