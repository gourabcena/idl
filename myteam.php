<!DOCTYPE html>
<html>
<body>
<?php
	include "db.php";
	if(!empty($_POST['add'])){
		
		header('location:add.php');
		break;
	}
	if(!empty($_POST['create']))
	{
		$team=$_POST['name'];
		$uid=$_POST['uid'];
		$sql1="SELECT * FROM team WHERE team='$team' or u_id=$uid";
        	$rs=mysqli_query($con,$sql1);

        	if(mysqli_num_rows($rs)==0) 
		{
			mysqli_query($con,"INSERT into team(teamname,u_id) values ('$team','$uid')");
			header('location:team.php');
		}
			 

	}
?>
</body>
</html>	              
