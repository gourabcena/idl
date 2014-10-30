<!DOCTYPE html>
<html>
<body>
<?php
	include "db.php";
	if(!empty($_POST['approve']))
	{
		$id=$_POST['name'];
		mysqli_query($con,"UPDATE user SET status=1 WHERE u_id=$id");
		header('location:list.php');
	}
	if(!empty($_POST['remove']))
        {
                $id=$_POST['name'];
                mysqli_query($con,"DELETE from user, roleuser USING user INNER JOIN roleuser WHERE user.u_id=$id AND user.u_id=roleuser.u_id");
                header('location:list.php');
        }

?>
</body>
</html>
		
