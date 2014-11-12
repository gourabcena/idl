<!DOCTYPE html>
<html>
  <body>
    <?php
      include "db.php";
      session_start();
      $id = $_SESSION['u_id'];
      //queries here will update the values in database
      if (!empty($_POST['name'])) {
        $name = $_POST['name'];
	$sql = mysqli_query($con, "UPDATE user set name = '$name' WHERE u_id = $id");
      }
      if (!empty($_POST['city'])) {
        $name = $_POST['city'];
        $sql = mysqli_query($con, "UPDATE user SET city = '$name' WHERE u_id = $id");
      }
      if (!empty($_POST['phone'])) {
        $name = $_POST['phone'];
        $sql = mysqli_query($con, "UPDATE user SET phone = '$name' WHERE u_id = $id");               
      }
      if (!empty($_POST['password'])) {
         $name = $_POST['password'];
	 $pw = md5($password);
         $sql = mysqli_query($con, "UPDATE user SET password = '$pw' WHERE u_id = $id");
      }
      if (!empty($_POST['url'])) {
         $name = $_POST['url'];
         $sql = mysqli_query($con, "UPDATE user SET drupal = '$name' WHERE u_id = $id");
      }
      if (!empty($_POST['name'])){
         $name = $_POST['name'];
         $sql = mysqli_query($con, "UPDATE user set name = '$name' WHERE u_id = $id");
      }
      //set the session variable value
      $_SESSION['update'] = "Profile is updated";
      header('location:profile.php');
      mysqli_close($con);
    ?>
  </body>
</html>
