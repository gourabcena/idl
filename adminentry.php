<!DOCTYPE html>
<html>
  <body>
    <?php
      include "db.php";//include the database connection file
      session_start();
      $role = 1;
      $name = mysqli_real_escape_string($con, $_POST['name']);
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $username = mysqli_real_escape_string($con, $_POST['username']);
      $password = mysqli_real_escape_string($con, $_POST['password']);
      $url = mysqli_real_escape_string($con, $_POST['url']);
      $city = mysqli_real_escape_string($con, $_POST['city']);
      $dob = mysqli_real_escape_string($con, $_POST['dob']);
      $doj = mysqli_real_escape_string($con, $_POST['doj']);
      $gen = mysqli_real_escape_string($con, $_POST['gen']);
      $phone = mysqli_real_escape_string($con, $_POST['phone']);
      $pw = md5($password);
      $sql1 = "SELECT * FROM user WHERE username = '$username' or email = '$email'";
      $rs = mysqli_query($con, $sql1);
      if (mysqli_num_rows($rs) == 0) {
	$sql = "INSERT INTO user (name,username,dob,doj,phone,gender,city,password,drupal,email)VALUES ('$name', '$username','$dob','$doj','$phone','$gen','$city','$pw','$url','$email')";
	if (mysqli_query($con,$sql)) {	
          $rs = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
	  $row = mysqli_fetch_array($rs);
	  $us = $row['u_id'];
	  $sql1 = "INSERT INTO roleuser(u_id,r_id) VALUES('$us', '$role')";
	  mysqli_query($con, $sql1);
	  $_SESSION['update'] = "Add another admin successfully";
	  header('location:profile.php');
	}
      }
      else {
	$_SESSION['error'] = "Username/email already exists";
	header('location:adminreg.php');
      }	
      mysqli_close($con);
    ?>
  </body>
</html>



