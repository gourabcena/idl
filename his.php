<!DOCTYPE html>
<html>
	<body>
		<?php
			include"db.php";
			session_start();
			$u=$_SESSION['u_id'];
			if(!empty($_POST['edit'])){
                	$name=$_POST['edit'];
                	$sql=mysqli_query($con,"UPDATE contributor set edit='$name' WHERE u_id=$u");
                //$row=mysqli_fetch_array($sql);
                //$name = $row['name'];
        	}
        	if(!empty($_POST['review'])){
                $name=$_POST['review'];
                $sql=mysqli_query($con,"UPDATE contributor SET review='$name' WHERE u_id=$u");
                }
                
        	if(!empty($_POST['commit'])){
                $name=$_POST['commit'];
                $sql=mysqli_query($con,"UPDATE contributor SET commit='$name' WHERE u_id=$u");
                //$row=mysqli_fetch_array($sql);
                //$name = $row['name'];
        }
	header('location:history.php');
	?>
	</body>
<html>

