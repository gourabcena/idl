<!DOCTYPE html>
<html>
  <?php
    include "db.php";
    session_start();
    if ( $_SESSION['otp'] == $_SESSION['otp1'] and $_SESSION['otp']!="") {
       if (isset($_POST['reset'])) {
         if (isset($_POST['password'])) {
           $password = md5($_POST['password']);
           $email = $_SESSION['email'];
	   //echo $email;
	   //echo $_SESSION['otp'];
           $sql = mysqli_query($con, "UPDATE user SET password = '$password' WHERE email = '$email'");
	   unset($_SESSION['otp']);
           unset($_SESSION['otp1']);
	   unset($_SESSION['email']);
	   $_SESSION['error'] = "Password is changed successfully please log in to continue";
           header('location:login.php');
         }
       }
     }
     else {
       header('location:forgot.php');
     }
   ?>
</html>
      

