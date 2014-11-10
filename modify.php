<!DOCTYPE html>
<html>
  <body>
    <?php
      include"db.php";
      session_start();
      $uid = $_SESSION['u_id'];
      //each of the if blocks are trying to fetch from different index field
      if (!empty($_POST['edit'])) {
        $name = $_POST['edit'];
        $sql = mysqli_query($con, "UPDATE contributor set edit = '$name' WHERE u_id = $uid");
                
      }
      if (!empty($_POST['review'])) { 
        $name = $_POST['review'];
        $sql = mysqli_query($con, "UPDATE contributor SET review = '$name' WHERE u_id = $uid");
      }
      if (!empty($_POST['commit'])) {
        $name = $_POST['commit'];
        $sql = mysqli_query($con, "UPDATE contributor SET commit = '$name' WHERE u_id = $uid");
      }
      header('location:history.php');
    ?>
  </body>
<html>

