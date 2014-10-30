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
                    <a href="http://idl.com">
                        <strong>Back to the Login page</strong>
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
			$user=$_SESSION['user'];
			$query=mysqli_query($con,"SELECT * from user WHERE username='$user'");
			while($row = mysqli_fetch_array($query)) {
				$_SESSION['u_id']=$row['u_id'];
				echo "<table border='1'>";
  				echo "<tr>";
				echo"<td>User ID</td>";
  				echo "<td>". $row['u_id']."</td>";
				echo "</tr><tr>";
				echo"<td>Name</td>";
  				echo "<td>" . $row['name'] . "</td>";
				echo"</tr><tr>";
				echo"<td>User Name</td>";
  				echo "<td>" . $row['username'] . "</td>";
				echo"</tr><tr>";
				echo"<td>Date Of Birth</td>";
  				echo "<td>" . $row['dob'] . "</td>";
				echo "</tr><tr>";
				echo"<td>Date Of Joining</td>";
  				echo "<td>" . $row['doj'] . "</td>";
				echo "</tr><tr>";
				echo"<td>Phone no</td>";
  				echo "<td>" . $row['phone'] . "</td>";
				echo "</tr><tr>";
				echo"<td>Gender</td>";
  				echo "<td>" . $row['gender'] . "</td>";
				echo "</tr><tr>";
				echo"<td>City</td>";
   				echo "<td>" . $row['city'] . "</td>";
				echo "</tr><tr>";
				echo"<td>Drupal Link</td>";
  				echo "<td>" . $row['drupal'] . "</td>";
				echo "</tr><tr>";
				echo"<td>Email</td>";
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
			$sql=mysqli_query($con,"SELECT r_id from roleuser WHERE u_id IN (SELECT u_id from user WHERE username='$user')");
			$row=mysqli_fetch_array($sql);
			//$u=$row['r_id'];
			//echo $u;
			if($row['r_id']==1)
			{
				
				echo "<br><br><br>";
				echo"<a href='http://idl.com/list.php'>
                        	<strong>Approve user</strong>";
				
			}
			if($row['r_id']==2)
			{
				echo "<br><br><br>";
				echo"<a href='http://idl.com/team.php'>
                        		<strong>Team Management</strong>";
				
			}
			if($row['r_id']==3)
                        {
                                echo "<br><br><br>";
                                 echo"<a href='http://idl.com/history.php'>
                        	<strong>USER HISTORY</strong>";
				//echo "<input class='buttom' name='history' value='Your history' id='history'>";
                        }

			mysqli_close($con);
			?>
			<br><br>
						
	    		<input class="buttom" name="edit" id="edit" value="Edit Profile" type="submit"> 	 
   </form> 
</div>      
</div>
</body>
</html>
