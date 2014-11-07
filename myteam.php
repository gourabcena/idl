<!DOCTYPE html>
<html>
  <body>
    <?php
      include "db.php";
      if (!empty($_POST['add'])){		
	 	header('location:addmember.php');
	 	break;
      }
      /*check create team button is presssed or not*/
      if (!empty($_POST['create'])){
	   	$team=$_POST['name'];
		session_start();
		$user=$_SESSION['user'];
		$sql=mysqli_query($con,"select * from user where username='$user'");
                $row=mysqli_fetch_array($sql);
                $uid=strval($row['u_id']);
		//echo "$uid";
		//break;
	   	//$uid=$_POST['uid'];
	   	$sql1="SELECT * FROM team WHERE teamname='$team'";
		$rs=mysqli_query($con,$sql1);
	   	/*check teamname is already existing or not*/
           	if (mysqli_num_rows($rs)== 0) {
	       		/*insert team information into team table*/
	       		mysqli_query($con,"INSERT into team(teamname,u_id) values ('$team','$uid')");
			$_SESSION['remove']="Successfully Team Created";
	       		header('location:team.php');
	   	}
		else{
			 $_SESSION['remove']="Team is already exist";
			 header('location:team.php');
		}
      }
    ?>
  </body>
</html>	              
