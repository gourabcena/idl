<!DOCTYPE html>

<html>
<body>
<title>My Profile</title>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
<body>
<div class="container">
            <div class="idl-top">
                <a href="http://idl.com" target="_blank">Home</a>
                <span class="right">
                    <a href="http://idl.com/logout.php">
                        <strong>Log Out</strong>
                    </a>
                </span>
                <div class="clr"></div>

            </div>
			<header>
				<h1> Welcome To The World Of Drupal</h1>
                        </header>       

      <div  class="form">
    			<form id="contactform" action="edit.php"> 
			
                    </a>
			<br><br>
			<?php
			include "db.php";
			session_start();
			if(isset($_SESSION['user'])){
				$user=$_SESSION['user'];
				if(isset($_SESSION['alert'])){
                                        //echo $_SESSION['alert'];
					   echo "<p class='all'>".$_SESSION['alert']."<p>";
                                        echo"<br>";
                                        unset($_SESSION['alert']);
                                }

				if(isset($_SESSION['update'])){
					//echo $_SESSION['update'];
					   echo "<p class='all'>".$_SESSION['update']."<p>";
					echo"<br>";
					unset($_SESSION['update']);
				}
				$query=mysqli_query($con,"SELECT * from user WHERE username='$user'");
				//$ro = mysqli_fetch_array($query);
				while($row = mysqli_fetch_array($query)) {
					$_SESSION['u_id']=$row['u_id'];
					echo "<table border='1'>";
  					echo "<tr>";
					echo"<th>User ID</th>";
  					echo "<td>". $row['u_id']."</td>";
					echo "</tr><tr>";
					echo"<th>Name</th>";
  					echo "<td>" . $row['name'] . "</td>";
					echo"</tr><tr>";
					echo"<th>User Name</th>";
  					echo "<td>" . $row['username'] . "</td>";
					echo"</tr><tr>";
					echo"<th>Date Of Birth</th>";
  					echo "<td>" . $row['dob'] . "</td>";
					echo "</tr><tr>";
					echo"<th>Date Of Joining</th>";
  					echo "<td>" . $row['doj'] . "</td>";
					echo "</tr><tr>";
					echo"<th>Phone no</th>";
  					echo "<td>" . $row['phone'] . "</td>";
					echo "</tr><tr>";
					echo"<th>Gender</th>";
					if($row['gender']=='M'){
  					echo "<td>Male</td>";
					}
					if($row['gender']=='F'){
					echo "<td>Female</td>";
					}
					echo "</tr><tr>";
					echo"<th>City</th>";
   					echo "<td>" . $row['city'] . "</td>";
					echo "</tr><tr>";
					echo"<th>Drupal Link</th>";
  					echo "<td>" . $row['drupal'] . "</td>";
					echo "</tr><tr>";
					echo"<th>Email</th>";
					echo "<td>" . $row['email'] . "</td>"; 
  					echo "</tr>";
					}
				echo "</table>";
				//$_SESSION['u_id']=$row['u_id'];
				//$u=$_SESSION['u_id'];
				//echo $row['name'];
				//echo (int);
				//echo $_SESSION['u_id'];
				//echo "gourab";
				//if($row2['status']==1)
				$sql=mysqli_query($con,"SELECT r_id from roleuser WHERE u_id IN (SELECT u_id from user WHERE username='$user')");
				$row=mysqli_fetch_array($sql);
					$_SESSION['role']=$row['r_id'];
					//echo $u;
				if($row['r_id']==1)
				{
				
					echo "<br>";
					echo"<p class='all'>Admin<p><br><br>";
					echo"<a href='http://idl.com/list.php'class='link'>
                        		<strong>Approve user</strong></a>";
					echo"<br><br>";
					echo"<a href='http://idl.com/adreg.php'class='link'>
                                	<strong>Add Another Admin?>> Click Here</strong></a>";
				
				}
				$query=mysqli_query($con,"SELECT * from user WHERE username='$user'");
                                $ro = mysqli_fetch_array($query);
				 if($ro['status']==0 and $row['r_id']!=1){
					echo"<br>";
                                        echo "<p class='all'>Your approval is pending!!<p>";
					echo"<br>";
                                }
				else{

				if($row['r_id']==2)
				{
					echo "<br>";
					echo"<p class='all'>Manager<p><br><br>";
					echo $_SESSION['app'];
					unset($_SESSION['app']);
					echo"<br><br>";
					echo"<a href='http://idl.com/team.php' class='link'>
                        		<strong>Team Management</strong></a>";
				
				}	
				if($row['r_id']==3)
                        	{
                                	echo "<br>";
					echo"<p class='all'>Contributor<p><br><br>";
					echo $_SESSION['app'];
                               	 	unset($_SESSION['app']);
                                	echo"<br><br>";
                                	echo"<a href='http://idl.com/history.php' class='link'>
                        		<strong>USER HISTORY</strong></a>";
					//echo "<input class='buttom' name='history' value='Your history' id='history'>";
                        	}

				//mysqli_close($con);
			
				echo"<br><br>";
						
	    			echo"<input class='buttom' name='edit' id='edit' value='Edit Profile' type='submit'>";
				}
			
				/*else
				{
					echo"Your approval is pending";
				}*/ 
			}
			else{
				$_SESSION['message']="Please Log in to continue";
				header('location:login.php');
			}
			?>	 
   </form> 
</div>      
</div>
</body>
</html>
