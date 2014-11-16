<!DOCTYPE html>
<html>
  <body>
    <?php
      include "db.php";
      session_start();
      if ($_SESSION['role'] == 1) {
        //get the user id and status of the user from the url
        if (isset( $_GET['u_id']) and isset( $_GET['status'])) { 
          $id = $_GET['u_id'];
	  $status = $_GET['status'];
	  if ($status == 0) {
            mysqli_query($con, "UPDATE user SET status = 1 WHERE u_id = $id");
            header('location:showuser.php');
	  }
	  else {
	    $sql = mysqli_query($con, "SELECT team_id from team WHERE u_id = $id");
	    //check the manager has a team or not
 	    if (mysqli_num_rows($sql) == 0) {
	      mysqli_query($con, "UPDATE user SET status = 2 WHERE u_id = $id");
	      //remove contributor from the team as well
	      mysqli_query($con, "DELETE from contributor WHERE u_id = $id");
              header('location:showuser.php');
	    }
	    else {
	      session_start();
	      $_SESSION['msg'] = "Team Owner cant be removed";
	      header('location:showuser.php');
            }
	  } 	
        }
      }
      else {
        header('location:showuser.php');
      }	
    ?>
  </body>
</html>		
