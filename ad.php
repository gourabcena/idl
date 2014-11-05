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
			/*if(!empty($_POST['add'])){
				$u=$_POST['name'];
				$sql1=mysqli_query($con,"select * from roleuser where u_id=$u AND r_id=3");
				if(mysqli_num_rows($sql1)>0){
					if($row['count(u_id)']<5)
					{	
					$t_id=$_SESSION['t_id'];
					//$u=$_POST['name'];
					$result=mysqli_query($con,"SELECT * from contributor WHERE u_id=$u");
					if(mysqli_num_rows($result)==0){
						mysqli_query($con,"INSERT into contributor (u_id,team_id) values ('$u','$t_id')");
						$_SESSION['re']="Successfully added to your team";
						header('location:add.php');
						break;
					}
					else{
						$_SESSION['er']="User is not available";
						header('location:add.php');
					}	
				}	
				else{
					$_SESSION['er']="You have maximum no of members in your team";
					header('location:add.php');	
				}
				}
			else{
				 $_SESSION['er']="He/She is not a contributor";
				header('location:add.php');
				}
			}*/
			if(isset($_GET['id'])and isset($_GET['status'])){
				
				$u=$_GET['id'];
				$s=$_GET['status'];
				if($s==0){
                                //$result=mysqli_query($con,"SELECT * from contributor WHERE u_id=$u AND team_id=$t_id");
				//if(mysqli_num_rows($result)==0){
						//$_SESSION['er']="User does not exist or does not belong to yor team";
                                                //mysqli_query($con,"INSERT into contributor (u_id,team_id) values ('$u','$t_id')");
                                                //header('location:add.php');
                                                //break;
                                        //}
                                        
						mysqli_query($con,"DELETE from contributor WHERE u_id=$u");
						$_SESSION['re']="Successfully removed from your team";
                                                header('location:team.php');
						break;
				}
				else{
				
				$sql1=mysqli_query($con,"select * from roleuser where u_id=$u AND r_id=3");
                                if(mysqli_num_rows($sql1)>0){
                                        if($row['count(u_id)']<5)
                                        {
                                        $t_id=$_SESSION['t_id'];
                                        //$u=$_POST['name'];
                                        $result=mysqli_query($con,"SELECT * from contributor WHERE u_id=$u");
                                        if(mysqli_num_rows($result)==0){
                                                mysqli_query($con,"INSERT into contributor (u_id,team_id) values ('$u','$t_id')");
                                                $_SESSION['re']="Successfully added to your team";
                                                header('location:add.php');
                                                break;
                                        }
                                        else{
                                                $_SESSION['er']="User is not available";
                                                header('location:add.php');
                                        }       
                                }       
                                else{
                                        $_SESSION['er']="You have maximum no of members in your team";
                                        header('location:add.php');     
                                }
                                }
                        else{
                                 $_SESSION['er']="He/She is not a contributor";
                                header('location:add.php');
                                }

			}
                                        
			}

		?>
	</body>
<html>
				

