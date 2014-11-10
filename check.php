<!DOCTYPE html>
<html>
  <body>
    <?php
      include "db.php";
      session_start();
      $username=$_GET['username'];
      $pw=$_GET['password'];
      $pa=md5($pw);
      $sql = "SELECT * FROM `user` WHERE username='$username'and password='$pa'";
      $result = mysqli_query($con,$sql);
      $row=mysqli_fetch_array($result);
      if (mysqli_num_rows($result) == 0) {
        $_SESSION['message']="Wrong username/password";
	header('location:login.php');
      }
      else {
        if ($row['status'] == 2) {
	  $_SESSION['message']="you are not approved";
	  header('location:login.php');
	  break;
        }
	else {
	  $_SESSION['user']=$username;
	  header('location:profile.php');
	}
      }
      mysqli_close($con);
    ?>
  </body>
</html>

