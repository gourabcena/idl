<!DOCTYPE html>
<html>
  <body>
    <?php
    	include"db.php";
	session_start();
	$t_id=$_SESSION['t_id'];
	/*count the no of team members*/
	$sql=mysqli_query($con,"select count(u_id) from contributor where team_id=$t_id");
	$row=mysqli_fetch_array($sql);
	/*get the id and status from the url*/
	if (isset ($_GET['id']) and isset ($_GET['status'])){
		$uid=$_GET['id'];
		$status=$_GET['status'];
		if ($status == 0){
                	mysqli_query($con,"DELETE from contributor WHERE u_id=$uid");
			$_SESSION['remove']="Successfully removed from your team";
                        header('location:team.php');
			break;
		}
		else{
			/*select the information about the selected user*/
			$sql1=mysqli_query($con,"select * from roleuser where u_id = $uid AND r_id = 3");
                        if (mysqli_num_rows($sql1)>0){
				/*check the no of members in the team*/
                        	if ($row['count(u_id)']<5){
                                	$t_id=$_SESSION['t_id'];
                                        //$u=$_POST['name'];
                                    	$result = mysqli_query($con,"SELECT * from contributor WHERE u_id = $uid");
                                        if (mysqli_num_rows($result) == 0){
						/*insert the data about new user of the team into the contributor*/
                                                mysqli_query($con,"INSERT into contributor (u_id,team_id) values ('$uid','$t_id')");
                                                $_SESSION['remove']="Successfully added to your team";
                                                header('location:addmember.php');
                                                break;
                                        }
                                        else{
                                                $_SESSION['max']="User is not available";
                                                header('location:addmember.php');
                                        }       
                                }       
                                else{
                                        $_SESSION['max']="You have maximum no of members in your team";
                                        header('location:addmember.php');     
                                }
                         }
                         else{
                                 $_SESSION['max']="He/She is not a contributor";
                                 header('location:addmember.php');
                         }

		}
                                        
	}

    ?>
  </body>
<html>
				

