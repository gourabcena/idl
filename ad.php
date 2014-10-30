<!DOCTYPE html>
<html>
	<body>
		<?php
			include"db.php";
			session_start();
			$t_id=$_SESSION['t_id'];
			$sql=mysqli_query($con,"select count(u_id) from contributor where team_id=$t_id");
			$row=mysqli_fetch_array($sql);
			//$s=$row['count(u_id)'];
			//echo $s;
			if($row['count(u_id)']<5)
			{
				$t_id=$_SESSION['t_id'];
				$u=$_POST['name'];
				$result=mysqli_query($con,"SELECT * from contributor WHERE u_id=$u");
				if(mysqli_num_rows($result)==0){
					mysqli_query($con,"INSERT into contributor (u_id,team_id) values ('$u','$t_id')");
					header('location:add.php');
					break;
				}
				else{
						header('location:add.php');
				}
			}
			else{
					header('location:add.php');	
			}
		?>
	</body>
<html>
				

