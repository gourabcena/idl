<!DOCTYPE html>
<html>
<body>
<?php
	include "db.php";
	if(isset( $_GET['u_id']) and isset( $_GET['status']))
	{
		$id=$_GET['u_id'];
		$s=$_GET['status'];
		//$id=$_POST['name'];
		if($s==0){
                mysqli_query($con,"UPDATE user SET status=1 WHERE u_id=$id");
                header('location:list.php');
		}
		

		
	/*if(!empty($_POST['approve']))
	{
		$id=$_POST['name'];
		mysqli_query($con,"UPDATE user SET status=1 WHERE u_id=$id");
		header('location:list.php');
	}*/
	//if(!empty($_POST['remove']))
        
                //$id=$_POST['name'];
		else{
			$sql=mysqli_query($con,"SELECT team_id from team WHERE u_id=$id");
 			if(mysqli_num_rows($sql)==0){
			mysqli_query($con,"UPDATE user SET status=2 WHERE u_id=$id");
              		//mysqli_query($con,"DELETE from user, roleuser USING user INNER JOIN roleuser WHERE user.u_id=$id AND user.u_id=roleuser.u_id");
			mysqli_query($con,"DELETE from contributor WHERE u_id=$id");
               		 header('location:list.php');
			}
			else{
				session_start();
				$_SESSION['msg']="Team Owner cant be removed";
				header('location:list.php');
        		}
		}	
	}	
?>
</body>
</html>
		
